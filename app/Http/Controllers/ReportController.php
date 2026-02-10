<?php

namespace App\Http\Controllers;

use App\Mail\UserDailyReportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ReportController extends Controller
{
    

    public function sendDailyUserReport()
    {
        $today = now()->toDateString();

        // 1️⃣ Total follow-ups today
        $totalFollowUps = DB::table('user_follow_up')
            ->whereDate('updated_at', $today)
            ->count();

        // 2️⃣ Total successful payments today
        $totalPayments = DB::table('payments')
            ->where('payment_status', 'success')
            ->whereDate('created_at', $today)
            ->sum('amount');

        // 3️⃣ Total pending payments (from PaymentsLink)
        $totalPending = DB::table('payments_link')
            ->where('is_panding', 1)
            ->whereDate('created_at', $today)
            ->sum('panding');

        // 4️⃣ Total closed leads (lead_status = closed)
        // Adjust status value as per your DB (e.g., 3 = closed)
        $totalClosedLeads = DB::table('student_by_agent')
            ->whereDate('updated_at', $today)
            ->where('lead_status', 3) // change 3 to your “closed” status ID if different
            ->count();

                $totalNewLeads = DB::table('student_by_agent')
            ->whereDate('created_at', $today)
            ->where('lead_status', 1) // change 1 to your “new” status ID if different
            ->count();

        // 5️⃣ Combine data for the report
        $report = [
            'date' => $today,
            'total_followups' => $totalFollowUps,
            'total_payments' => $totalPayments,
            'total_pending' => $totalPending,
            'total_closed' => $totalClosedLeads,
            'total_new_leads' => $totalNewLeads,
            'generated_at' => now()->format('Y-m-d H:i:s'),
        ];

        // 6️⃣ Send report to admin via email
        $adminEmail = 'skp@skylabstech.com'; // update if needed
        Mail::to($adminEmail)->send(new UserDailyReportMail('admin',$report));

        return response()->json(['message' => 'Admin daily report sent successfully', 'data' => $report]);
    }
}
