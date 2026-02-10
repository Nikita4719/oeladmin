<?php
// app/Services/SendGridService.php
namespace App\Services;

use SendGrid;
use SendGrid\Mail\Mail;

class SendGridService
{
    protected $sendGrid;

    public function __construct()
    {
        $this->sendGrid = new SendGrid(env('SENDGRID_API_KEY'));
    }

    public function sendEmail($from, $to, $subject, $plainTextContent, $htmlContent)
    {
        $email = new Mail();
        $email->setFrom($from['email'], $from['name']);
        $email->setSubject($subject);
        $email->addTo($to['email'], $to['name']);
        $email->addContent("text/plain", $plainTextContent);
        $email->addContent("text/html", $htmlContent);

        try {
            $response = $this->sendGrid->send($email);
            return [
                'status' => $response->statusCode(),
                'headers' => $response->headers(),
                'body' => $response->body(),
            ];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
