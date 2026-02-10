<?php

namespace App\Jobs;

use App\Mail\UserNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;
use App\Models\Outbox;
use Illuminate\Support\Facades\Auth;

class SendMailtoUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subject;
    protected $body;
    protected $attachmentData;
    protected $attachmentName;
    protected $users;
    protected $user_id;

    public function __construct($users, $subject, $body, $attachmentData = null, $attachmentName = null, $user_id = null)
    {
        $this->users = $users;
        $this->subject = $subject;
        $this->body = $body;
        $this->attachmentData = $attachmentData;
        $this->attachmentName = $attachmentName;
        $this->user_id = $user_id;
    }

    public function handle()
    {
        $failedEmails = [];
        foreach ($this->users as $email) {
            if (!empty($email)) {
                $message = new Message();
                $message->subject = $this->subject;
                $message->body = $this->body;
                $message->attachment = $this->attachmentName;
                $message->type = 'mail';
                $message->recepients = $email;
                $message->author_id = $this->user_id;
                $message->save();
                try {
                    Mail::to($email)->send(new UserNotification($this->subject, $this->body, $this->attachmentData, $this->attachmentName));
                } catch (\Exception $e) {
                    $failedEmails[] = $email;
                }
            }
        }
        if (!empty($failedEmails)) {
            foreach ($failedEmails as $email) {
                Outbox::create([
                    'email' => $email,
                    'subject' => $this->subject,
                    'body' => $this->body,
                ]);
            }
        }
    }
}
