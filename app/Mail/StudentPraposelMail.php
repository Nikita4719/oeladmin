<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentPraposelMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected  $studentData;
    public $attachmentPath;
    public $attachmentName;
    public function __construct($studentData, $attachmentPath, $attachmentName)
    {
        $this->studentData = $studentData;
        $this->attachmentPath = $attachmentPath;
        $this->attachmentName = $attachmentName;
    }

    public function build()
    {
        return $this->view('emails.student_praposel')
        ->attach($this->attachmentPath)
            ->with([
                'studentData' => $this->studentData,
            ]);
             

    }
}
