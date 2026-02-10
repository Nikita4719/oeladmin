<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Services\FacebookTokenService;
use App\Models\Lead;
use App\Models\GoogleLead;
use App\Models\StudentByAgent;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class FacebookLeadController extends Controller
{
    protected $fb;

    public function __construct(FacebookTokenService $fb)
    {
        $this->fb = $fb;
    }

    /**
     * Verify webhook endpoint for Facebook
     */
    public function verify(Request $request)
    {
        $verifyToken = env('FACEBOOK_VERIFY_TOKEN', 'overseas');

        if ($request->hub_mode === 'subscribe' && $request->hub_verify_token === $verifyToken) {
            Log::info('WEBHOOK VERIFY OK');
            return response($request->hub_challenge, 200);
        }

        Log::warning('WEBHOOK VERIFY FAILED');
        return response('Invalid verify token', 403);
    }

    /**
     * Main webhook handler for Facebook & Google leads
     */
    public function webhook(Request $request)
    {
        Log::info('NEW WEBHOOK HIT');
        Log::info('RAW WEBHOOK PAYLOAD: ' . json_encode($request->all()));

        $payload = $request->all();

        // -----------------------
        // 1) Google Leads
        // -----------------------
        if (isset($payload['leadId']) || isset($payload['gcl_id']) || isset($payload['api_version'])) {
            $this->handleGoogleLead($payload);
            return response('GOOGLE_LEAD_RECEIVED', 200);
        }

        // -----------------------
        // 2) Facebook Leads
        // -----------------------
        foreach ($request->entry ?? [] as $entry) {
            foreach ($entry['changes'] ?? [] as $change) {

                if (($change['field'] ?? '') !== 'leadgen') continue;

                $value = $change['value'] ?? [];
                Log::info('FB CHANGE VALUE: ' . json_encode($value));

                $leadgenId    = $value['leadgen_id'] ?? null;
                $pageId       = $value['page_id'] ?? null;
                $webhookAdId  = $value['ad_id'] ?? null;
                $formId       = $value['form_id'] ?? null;
                $incomingCreated = $value['created_time'] ?? null;

                if (!$leadgenId) {
                    Log::warning('Skipping change — no leadgen_id present');
                    continue;
                }

                // Test webhook check
                if ($this->isTestWebhook($pageId, $leadgenId)) {
                    Log::warning('⚠ TEST WEBHOOK RECEIVED (skipping)');
                    continue;
                }

                Log::info("REAL FACEBOOK LEAD RECEIVED: $leadgenId");

                // Get Page Token
                $pageToken = $this->fb->getPageToken($pageId);

                if (!$pageToken) {
                    Log::error("❌ Page token not available for page_id: $pageId — saving minimal lead record");
                    Lead::updateOrCreate(
                        ['lead_id' => $leadgenId],
                        [
                            'page_id'      => $pageId,
                            'form_id'      => $formId,
                            'ad_id'        => $webhookAdId ?? null,
                            'lead_data'    => json_encode($value, JSON_UNESCAPED_UNICODE),
                            'created_time' => $this->convertFbTime($incomingCreated) ?? now(),
                        ]
                    );
                    continue;
                }

                // Fetch Lead Details
                try {
                    $leadDataResp = Http::timeout(10)->get("https://graph.facebook.com/v24.0/{$leadgenId}", [
                        'fields'       => 'field_data,created_time,ad_id,adset_id,campaign_id',
                        'access_token' => $pageToken,
                    ]);

                    $leadData = $leadDataResp->json();
                    Log::info('FACEBOOK LEAD DATA: ' . json_encode($leadData));

                } catch (Exception $e) {
                    Log::error('❌ Error fetching lead details: ' . $e->getMessage());
                    Lead::updateOrCreate(
                        ['lead_id' => $leadgenId],
                        [
                            'page_id'      => $pageId,
                            'form_id'      => $formId,
                            'ad_id'        => $webhookAdId ?? null,
                            'lead_data'    => json_encode(['error' => $e->getMessage(), 'webhook_value' => $value], JSON_UNESCAPED_UNICODE),
                            'created_time' => $this->convertFbTime($incomingCreated) ?? now(),
                        ]
                    );
                    continue;
                }

                if (isset($leadData['error'])) {
                    Log::warning("⚠ FB API returned ERROR for lead {$leadgenId}: " . json_encode($leadData['error']));
                    Lead::updateOrCreate(
                        ['lead_id' => $leadgenId],
                        [
                            'page_id'      => $pageId,
                            'form_id'      => $formId,
                            'ad_id'        => $webhookAdId ?? ($leadData['ad_id'] ?? null),
                            'lead_data'    => json_encode($leadData, JSON_UNESCAPED_UNICODE),
                            'created_time' => $this->convertFbTime($leadData['created_time'] ?? $incomingCreated) ?? now(),
                        ]
                    );
                    continue;
                }

                $fbCreatedTime = $leadData['created_time'] ?? $incomingCreated ?? null;
                $mysqlCreatedTime = $this->convertFbTime($fbCreatedTime);

                $lead = Lead::updateOrCreate(
                    ['lead_id' => $leadgenId],
                    [
                        'page_id'      => $pageId,
                        'form_id'      => $formId,
                        'ad_id'        => $webhookAdId ?? ($leadData['ad_id'] ?? null),
                        'lead_data'    => json_encode($leadData, JSON_UNESCAPED_UNICODE),
                        'created_time' => $mysqlCreatedTime ?? now(),
                    ]
                );

                Log::info("🎯 Lead saved/updated in DB: lead_id={$lead->lead_id}");

                // Save StudentByAgent
                $this->saveStudentFromLead($leadData);

                // Save ad identifiers
                $realAdId = $webhookAdId ?? ($leadData['ad_id'] ?? null);
                $adsetId  = $leadData['adset_id'] ?? null;
                $campId   = $leadData['campaign_id'] ?? null;

                $lead->update([
                    'ad_id'       => $realAdId ?? $lead->ad_id,
                    'adset_id'    => $adsetId ?? $lead->adset_id,
                    'campaign_id' => $campId ?? $lead->campaign_id,
                ]);

                Log::info('AD IDENTIFIERS', [
                    'webhook_ad_id' => $webhookAdId,
                    'lead_ad_id'    => $leadData['ad_id'] ?? null,
                    'adset_id'      => $adsetId,
                    'campaign_id'   => $campId
                ]);

                // Fetch Insights (spend + CPL)
                $this->fetchLeadInsights($lead);

            } // end changes loop
        } // end entry loop

        return response('EVENT_RECEIVED', 200);
    }

    // -----------------------
    // Helper Functions
    // -----------------------

    private function handleGoogleLead($payload)
    {
        try {
            Log::info('📩 GOOGLE ADS LEAD RECEIVED', $payload);

            $googleLeadId = $payload['leadId'] ?? $payload['lead_id'] ?? $payload['gcl_id'] ?? uniqid('google_');

            GoogleLead::create([
                'lead_id'      => $googleLeadId,
                'page_id'      => null,
                'form_id'      => $payload['formId'] ?? $payload['form_id'] ?? null,
                'ad_id'        => $payload['creative_id'] ?? null,
                'lead_data'    => json_encode($payload, JSON_UNESCAPED_UNICODE),
                'created_time' => now(),
            ]);

            $googleData = collect($payload['user_column_data'] ?? [])
                ->mapWithKeys(fn($i) => [$i['column_name'] => $i['string_value']]);

            StudentByAgent::create([
                'name'         => trim(($googleData['First Name'] ?? '') . ' ' . ($googleData['Last Name'] ?? '')),
                'email'        => $googleData['User Email'] ?? null,
                'phone_number' => $googleData['User Phone'] ?? null,
                'source'       => 'google-ads',
                'lead_status'  => 1,
            ]);

            Log::info('🎯 Google Lead Saved Successfully');
        } catch (Exception $e) {
            Log::error('❌ Google Lead Processing Error: ' . $e->getMessage());
        }
    }

    private function saveStudentFromLead($leadData)
{
    try {
        if (empty($leadData['field_data']) || !is_array($leadData['field_data'])) return;

        $fields = collect($leadData['field_data'])
            ->mapWithKeys(fn($i) => [$i['name'] => $i['values'][0] ?? null]);

        $fullName = $fields['full_name'] 
            ?? trim(($fields['first_name'] ?? '') . ' ' . ($fields['last_name'] ?? ''));

        $email = $fields['email'] ?? null;
        $phone = $fields['phone_number'] ?? null;

        if ($phone || $email) {

            // 👉 Check if student already exists by phone
            $existing = StudentByAgent::where('phone_number', $phone)->first();

            if ($existing) {
                // 👉 Update existing record
                $existing->update([
                    'name'         => $fullName ?: $existing->name,
                    'email'        => $email ?: $existing->email,
                ]);

                Log::info('🔄 Student already exists — updated (facebook lead): ' . $phone);
            } else {
                // 👉 Create new student
                StudentByAgent::create([
                    'name'         => $fullName,
                    'email'        => $email,
                    'phone_number' => $phone,
                    'source'       => 'facebook-leads',
                    'lead_status'  => 1,
                ]);

                Log::info('🎉 New student saved (facebook lead)');
            }
        }

    } catch (Exception $e) {
        Log::error('❌ Error saving student record: ' . $e->getMessage());
    }
}
  
  private function fetchLeadInsights($lead)
{
    Log::info("🔔 fetchLeadInsights START", [
        'lead_id'      => $lead->lead_id,
        'campaign_id' => $lead->campaign_id,
        'ad_id'       => $lead->ad_id,
    ]);

    $token = env('FACEBOOK_SYSTEM_USER_TOKEN');

    if (!$token) {
        Log::critical("❌ SYSTEM TOKEN MISSING");
        return;
    }

    if (!$lead->ad_id || !$lead->campaign_id) {
        Log::error("❌ Missing ad_id or campaign_id", [
            'ad_id' => $lead->ad_id,
            'campaign_id' => $lead->campaign_id
        ]);
        return;
    }

    /**
     * ------------------------------------------------------
     * STEP 1️⃣ DETECT REAL AD ACCOUNT USING AD ID
     * ------------------------------------------------------
     */
    try {
        Log::info("🔍 Detecting Ad Account via Ad ID", [
            'ad_id' => $lead->ad_id
        ]);

        $adNodeResponse = Http::retry(3, 2000)
            ->timeout(30)
            ->get("https://graph.facebook.com/v24.0/{$lead->ad_id}", [
                'fields' => 'account_id',
                'access_token' => $token
            ]);

    } catch (\Exception $e) {
        Log::critical("🔥 NETWORK / DNS ERROR (Ad Node)", [
            'message' => $e->getMessage()
        ]);
        return;
    }

    if (!$adNodeResponse->successful()) {
        Log::error("❌ Ad Node HTTP ERROR", [
            'status' => $adNodeResponse->status(),
            'body'   => $adNodeResponse->body()
        ]);
        return;
    }

    $adNode = $adNodeResponse->json();

    Log::info("🧪 Ad Node Response", $adNode);

    if (isset($adNode['error'])) {
        Log::error("❌ Ad fetch FAILED — permission issue", [
            'ad_id' => $lead->ad_id,
            'error' => $adNode['error']
        ]);
        return;
    }

    if (empty($adNode['account_id'])) {
        Log::error("❌ account_id missing in Ad node", $adNode);
        return;
    }

    $adAccountId = 'act_' . $adNode['account_id'];

    Log::info("✅ REAL Ad Account DETECTED", [
        'ad_account' => $adAccountId
    ]);

    /**
     * ------------------------------------------------------
     * STEP 2️⃣ FETCH CAMPAIGN INSIGHTS
     * ------------------------------------------------------
     */
    try {
        Log::info("📊 Fetching Campaign Insights", [
            'campaign_id' => $lead->campaign_id,
            'ad_account'  => $adAccountId
        ]);

        $insightsResponse = Http::retry(3, 2000)
            ->timeout(30)
            ->get("https://graph.facebook.com/v24.0/{$adAccountId}/insights", [
                'level'       => 'campaign',
                'fields'      => 'campaign_id,spend,cost_per_action_type',
                'date_preset' => 'maximum',
                'filtering'   => json_encode([
                    [
                        'field'    => 'campaign.id',
                        'operator' => 'EQUAL',
                        'value'    => $lead->campaign_id
                    ]
                ]),
                'access_token'=> $token
            ]);

    } catch (\Exception $e) {
        Log::critical("🔥 NETWORK / DNS ERROR (Insights)", [
            'message' => $e->getMessage()
        ]);
        return;
    }

    if (!$insightsResponse->successful()) {
        Log::error("❌ Insights HTTP ERROR", [
            'status' => $insightsResponse->status(),
            'body'   => $insightsResponse->body()
        ]);
        return;
    }

    $insights = $insightsResponse->json();

    Log::info("🧪 Campaign Insights RAW", $insights);

    $row = $insights['data'][0] ?? null;

    /**
     * ------------------------------------------------------
     * STEP 3️⃣ NO SPEND CASE
     * ------------------------------------------------------
     */
    if (!$row) {
        Log::warning("⚠ Campaign exists but NO SPEND yet", [
            'campaign_id' => $lead->campaign_id
        ]);

        $lead->update([
            'spend' => 0,
            'cpl'   => 0,
        ]);

        return;
    }

    /**
     * ------------------------------------------------------
     * STEP 4️⃣ SAVE SPEND & CPL
     * ------------------------------------------------------
     */
    $spend = (float) ($row['spend'] ?? 0);

    $cpl = collect($row['cost_per_action_type'] ?? [])
        ->where('action_type', 'lead')
        ->pluck('value')
        ->first() ?? 0;

    $lead->update([
        'spend' => $spend,
        'cpl'   => (float) $cpl,
    ]);

    Log::info("✅ FINAL Spend/CPL SAVED", [
        'lead_id'      => $lead->lead_id,
        'campaign_id' => $lead->campaign_id,
        'ad_account'  => $adAccountId,
        'spend'       => $spend,
        'cpl'         => $cpl,
    ]);
}

  
 


/**
 * Helper: fetch insights for an object (ad/adset/campaign) and save spend/cpl
 */
private function fetchInsightsAndSave($lead, $objectId, $token, $level)
{
    try {
        $ins = Http::get(
            "https://graph.facebook.com/v24.0/{$objectId}/insights",
            [
                'fields'        => 'spend,cost_per_action_type',
                'date_preset'  => 'maximum',
                'access_token' => $token,
            ]
        )->json();

        Log::info("📊 Insights fetched", [
            'level' => $level,
            'object_id' => $objectId,
            'resp' => $ins
        ]);

        if (empty($ins['data'][0])) return false;

        $row   = $ins['data'][0];
        $spend = (float) ($row['spend'] ?? 0);
        $cpl   = 0;

        foreach ($row['cost_per_action_type'] ?? [] as $act) {
            if (($act['action_type'] ?? '') === 'lead') {
                $cpl = (float) $act['value'];
            }
        }

        $lead->update([
            'spend' => $spend,
            'cpl'   => $cpl,
        ]);

        Log::info("✅ Spend/CPL saved from {$level}", compact('spend','cpl'));
        return true;

    } catch (\Exception $e) {
        Log::warning("⚠ {$level} insights failed: ".$e->getMessage());
        return false;
    }
}








    private function isTestWebhook($pageId, $leadgenId)
    {
        $fake = ['0','1','2','123456789','444444444444'];
        return in_array($pageId, $fake) || in_array($leadgenId, $fake);
    }

    private function convertFbTime($time)
    {
        if (!$time) return null;
        try {
            return is_numeric($time)
                ? Carbon::createFromTimestamp((int)$time)->format('Y-m-d H:i:s')
                : Carbon::parse($time)->format('Y-m-d H:i:s');
        } catch (Exception $e) {
            Log::error("Invalid FB timestamp: {$time} - " . $e->getMessage());
            return null;
        }
    }
}
