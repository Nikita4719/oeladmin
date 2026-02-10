<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class FacebookTokenService
{
    protected $appId;
    protected $appSecret;
    protected $shortUserToken;

    public function __construct()
    {
        $this->appId         = env('FACEBOOK_APP_ID');
        $this->appSecret     = env('FACEBOOK_APP_SECRET');

        /**
         * ⚠ IMPORTANT
         * Use a real USER ACCESS TOKEN (not page token)
         * Permissions needed:
         * - pages_show_list
         * - pages_read_engagement
         * - pages_manage_metadata
         * - leads_retrieval
         */
        $this->shortUserToken = env('FACEBOOK_USER_TOKEN');
    }

    /**
     * Get Page Access Token (refresh if expired)
     */
    public function getPageToken($pageId)
    {
        Log::info("🔍 Fetching Page Token", ['page_id' => $pageId]);

        $record = DB::table('fb_tokens')->where('page_id', $pageId)->first();

        if ($record && $record->expires_at > now()) {
            return $record->token; // valid token
        }

        return $this->refreshToken($pageId);
    }

    /**
     * Refresh Page Token using long-lived user token
     */
    protected function refreshToken($pageId)
    {
        Log::info("♻ Refreshing Long-Lived USER Token...");

        // STEP 1 → Convert short-lived token to long-lived
        $response = Http::get("https://graph.facebook.com/oauth/access_token", [
            'grant_type'        => 'fb_exchange_token',
            'client_id'         => $this->appId,
            'client_secret'     => $this->appSecret,
            'fb_exchange_token' => $this->shortUserToken,
        ])->json();

        if (!isset($response['access_token'])) {
            Log::error("❌ Could not get long-lived user token", $response);
            return null;
        }

        $longUserToken = $response['access_token'];
        Log::info("Long-lived USER token obtained");

        // STEP 2 → Fetch pages managed by the user
        $pages = Http::get("https://graph.facebook.com/v24.0/me/accounts", [
            'access_token' => $longUserToken
        ])->json();

        if (isset($pages['error'])) {
            Log::error("❌ ERROR Fetching Pages:", $pages['error']);
            return null;
        }

        if (empty($pages['data'])) {
            Log::error("❌ USER TOKEN DOES NOT HAVE pages_show_list permission");
            return null;
        }

        // STEP 3 → Find PAGE TOKEN
        foreach ($pages['data'] as $page) {
            if ($page['id'] == $pageId) {

                DB::table('fb_tokens')->updateOrInsert(
                    ['page_id' => $pageId],
                    [
                        'token'      => $page['access_token'],
                        'expires_at' => Carbon::now()->addDays(55),
                        'updated_at' => now(),
                    ]
                );

                Log::info("✅ PAGE TOKEN SAVED");
                return $page['access_token'];
            }
        }

        Log::error("❌ User does NOT manage this page: $pageId");
        return null;
    }
}
