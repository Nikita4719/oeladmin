<?php
// app/Services/TwilioService.php
namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;

    // public function __construct()
    // {
    //     $this->client = new Client(config('twilio.sid'), config('twilio.token'));
    // }

    // public function sendSms($to, $message)
    // {
    //     return $this->client->messages->create($to, [
    //         'from' => config('twilio.from'),
    //         'body' => $message,
    //     ]);
    // }
}
