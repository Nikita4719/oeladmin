<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SendOTPJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function handle()
    {
        $apiUrl = "https://connectexpress.in/api/v3/";
        $postData = http_build_query($this->data);
    
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    
        $response = curl_exec($ch);
    
        if (curl_errno($ch)) {
            Log::error('Curl error: ' . curl_error($ch));
        }
        curl_close($ch);
    
        // First decode
        $decoded = json_decode($response, true);
    
        // If still JSON string inside → decode again
        if (isset($decoded['response']) && is_string($decoded['response'])) {
            $decoded['response'] = json_decode($decoded['response'], true);
        }
    
        // Log clean structured array
        Log::info('Response from API:', $decoded);
    
        // Example: only log status/message
        if (isset($decoded['response']['status'])) {
            Log::info("API Status: " . $decoded['response']['status']);
        }
        if (isset($decoded['response']['message'])) {
            Log::info("API Message: " . $decoded['response']['message']);
        }
    }
    
}
