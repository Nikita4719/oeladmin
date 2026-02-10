<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserDailyReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $report;

    public function __construct($name, $report)
    {
        $this->name = $name;
        $this->report = $report;
    }

    public function build()
    {
        

                      return $this->subject('Daily Admin Summary Report - ' . $this->report['date'])
            ->view('emails.user_daily_report')
            ->with(['report' => $this->report]);
    
    }
}
