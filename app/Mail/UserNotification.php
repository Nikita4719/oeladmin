<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $email_body;
    public $attachmentData;
    public $attachmentName;

    public function __construct($subject, $email_body, $attachmentData = null, $attachmentName = null)
    {
        $this->subject = $subject;
        $this->email_body = $email_body;
        $this->attachmentData = $attachmentData;
        $this->attachmentName = $attachmentName;
    }

    public function build()
    {
        $email = $this->subject($this->subject)
                      ->view('admin.email.lead-user-email')
                      ->with([
                          'email_body' => $this->email_body,
                          'subject' => $this->subject,
                      ]);

        if ($this->attachmentData) {
            $email->attachData(
                base64_decode($this->attachmentData),
                $this->attachmentName
            );
        }

        return $email;
    }
}
