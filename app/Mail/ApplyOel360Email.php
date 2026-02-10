<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplyOel360Email extends Mailable
{
    use Queueable, SerializesModels;

    protected $three_sixtee_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($three_sixtee_data)
    {
        $this->three_sixtee_data = $three_sixtee_data;
    }


    public function build()
    {
        return $this->view('emails.oel_360_email')
            ->with(['threesixteeddata' => $this->three_sixtee_data]);
    }
}
