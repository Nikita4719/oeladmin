<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Mail;
use Log;
use App\Models\{
    User,
    Student,
    StudentByAgent,
    MasterLeadStatus,
    ProgramPaymentCommission,
    Caste,
    Subject,
    Country,
    Currency,
    Province,
    Setting,
    Pincode,
    UserFollowUp,
    EducationHistory,
    Source,
    EducationLevel,
    PaymentsLink,
    Intrested,
    Fieldsofstudytype,
    University,
    Program,
    ApplicationsApplied,
    StudentScholorship,
    Exam
};

use App\Mail\FranchiseCreatedStudentProfileMail;
use App\Mail\StudentProfileCreatedMail;
use App\Mail\NewLeadAssignedMail;
use App\Mail\StudentPaymentMail;

use App\Jobs\SendOTPJob;
use App\Models\Agent;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('role_or_permission:dashboard.view', ['only' => ['index']]);
        view()->share('page_title', 'Dashboard');
    }

    public function index( Request $request)
    {
        $id = Auth::user()->id;
        $users = User::WHERE('id', $id)->first();
        $data = [   
            'users' => $users,
        ];
      
        return view('dashboard', compact('data'));
    }
    public function dashboard_data(Request $request)
    {

        if ($request->key == 'total-members') {
           $total_members = User::paginate(12);
           $dash_name = 'Total Members';
        }
        $dash_data = [

            'dash' => $total_members,
            'dash_name' => $dash_name,
        ];
       
       return view('dashboard-data', compact('dash_data'));
    }
}
