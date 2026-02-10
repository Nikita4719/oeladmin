<?php

namespace App\Jobs;

use App\Mail\StudentRegistraionMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendStudentRegistrationMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $student_data;

    public function __construct($email, $student_data)
    {
        $this->email = $email;
        $this->student_data = (array) $student_data;

        Log::info("📩 Queued: Student registration mail job for {$email}");
    }

    public function handle()
    {
        try {
            Log::info("📨 Sending registration email to: {$this->email}");
            Log::info("📘 STUDENT DATA:", $this->student_data);

            Mail::to($this->email)->send(new StudentRegistraionMail($this->student_data));

            Log::info("✅ Mail sent successfully to: {$this->email}");

        } catch (\Exception $e) {

            Log::error("❌ Mail failed for {$this->email} | Error: " . $e->getMessage());
        }
    }
}
