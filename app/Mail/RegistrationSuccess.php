<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected  $student_data;

    public function __construct($student_data)
    {
        $this->student_data = $student_data;
    }

    public function build()
    {
        return $this->view('emails.registration_success_franchise')
                    ->with([
                        'student_data' => $this->student_data,
                    ])
                    ->subject('Registration Successful');
    }

}
