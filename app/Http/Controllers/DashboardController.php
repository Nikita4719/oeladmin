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
        $user_type = $users->admin_type;
        $user_ids = $users->id;
        $total_leads = 0;
        if ($user_type == 'Administrator') {
            $total_leads = StudentByAgent::count();
        } else if ($user_type == 'agent') {
            $total_leads = StudentByAgent::where(function ($q) use ($user_ids) {
                return $q->where("added_by_agent_id", $user_ids)->orwhere('user_id',$user_ids)->orWhere('assigned_to', $user_ids);
            })->count();
        } else if ($user_type == 'sub_agent' || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $total_leads = StudentByAgent::where("assigned_to", $user_ids)->orwhere('user_id',$user_ids)->count();
        }
        // Total Assigned Leads --
        $total_assigned_leads = 0;
        if ($user_type == 'Administrator') {
            $total_assigned_leads = StudentByAgent::whereNotNull("assigned_to")->count();
        } else if ($user_type == 'agent' || $user_type == 'sub_agent'  || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $total_assigned_leads = StudentByAgent::where("assigned_to", $user_ids)->count();
        }
        // Total non-allocated Leads --
        $total_non_allocated_leads = 0;
        if ($user_type == 'Administrator') {
            $total_non_allocated_leads = StudentByAgent::whereNull('assigned_to')->count();
        } else if ($user_type == 'agent' || $user_type == 'sub_agent' || $user_type == 'visa' || $user_type == 'Digital Marketing' || $user_type == 'Data oprator') {
            $total_non_allocated_leads = StudentByAgent::where('user_id',$user_ids)->whereNull('assigned_to')->count();
        }
        // Total Members
        if ($user_type == 'Administrator') {
           
            $total_members = User::whereNotIn('admin_type', ['student'])->count();
            $total_student = Student::where('profile_complete', 1)->count();
            $total_student_id =Student::pluck('user_id');
            $total_school_manager = User::where('admin_type', 'school_manager')->count();
            $total_frenchise =  User::where('admin_type', 'agent')->count();
            $total_active_frenchise = Agent::where('is_active', 1)->count();
            $total_inactive_frenchise = Agent::whereNull('is_active')->orwhere('is_active', 0)->count();
            $total_approve_frenchise = Agent::where('is_approve', 1)->count();
            $total_unapprove_frnchise = Agent::where('is_approve', 0)->count();
            $total_sub_agent = User::where('admin_type', 'sub_agent')->count();
        } 
        
        else {
            $total_members = User::where('added_by', $user_ids)->count();
            $total_student = Student::where('added_by', $user_ids)->where('profile_complete', 1)->count();
            $authuser = Auth::user();
            if (($authuser->hasRole('agent'))) {
                $userId = Auth::id();
                $usersId=User::where('added_by',$userId)->whereNotIn('admin_type',['student'])
                          ->pluck('id')->toArray();

                         
                if (!empty($usersId)) {
                    array_push($usersId, $authuser->id);
                }
            }else{
                $usersId = [$authuser->id];
            }
            $total_student_id = Student::whereIn('added_by', $usersId)->pluck('user_id');

            $total_school_manager = User::where('admin_type', 'school_manager')->where('added_by', $usersId)->count();
            $total_frenchise =  User::where('admin_type', 'agent')->where('id', $usersId)->count();
            $total_active_frenchise = Agent::where('is_active', 1)->where('id', $usersId)->count();
            $total_inactive_frenchise = Agent::where('user_id', $user_ids)->where(function ($query) {
                                            $query->whereNull('is_active')
                                                ->orWhere('is_active', 0);
                                         })
                                        ->count();
            $total_approve_frenchise = Agent::where('is_approve', 1)->where('user_id', $user_ids)->count();
            $total_unapprove_frnchise = Agent::where('is_approve', 0)->where('user_id', $user_ids)->count();
            $total_sub_agent = User::where('admin_type', 'sub_agent')->where('added_by', $user_ids)->count();
        }
        if ($user_type == 'Administrator') {
            $total_university = University::count();
            $total_program = Program::count();
            $total_application = ApplicationsApplied::count();
            $total_unapprove_universties = University::where(function ($query) {
                                            $query->whereNull('is_approved')->orWhere('is_approved',0);
                                        })->count();
            $total_approve_universties = University::where('is_approved', 1)->count();
            $total_unapprove_program = Program::where(function ($query) {
                                    $query->whereNull('is_approved')->orWhere('is_approved',0);
                                })->count();
            $total_approve_program=Program::where('is_approved', 1)->count();
            $total_unapprove_counceler = User::where('admin_type', 'counselor')->where('profile_verify_for_agent', 0)->count();
            $total_approve_counceler = User::where('admin_type', 'counselor')->where('profile_verify_for_agent', 1)->count();
        }else{
            $total_university = University::where('user_id', $user_ids)->count();
            //$total_program = Program::where('user_id', $user_ids)->count();
            $total_program = Program::count();
            $total_application = ApplicationsApplied::count();
            $total_unapprove_universties = University::where(function ($query) {
                                            $query->whereNull('is_approved')->orWhere('is_approved',0);
                                        })->where('user_id', $user_ids)->count();
            $total_approve_universties = University::where('is_approved', 1)->where('user_id', $user_ids)->count();
            $total_unapprove_program = Program::where(function ($query) {
                                        $query->whereNull('is_approved')->orWhere('is_approved',0);
                                    })->where('user_id', $user_ids)->count();
            $total_approve_program=Program::where('is_approved', 1)->where('user_id', $user_ids)->count();
            $total_unapprove_counceler = User::where('admin_type', 'counselor')->where('added_by', $user_ids)->where('profile_verify_for_agent', 0)->count();
            $total_approve_counceler = User::where('admin_type', 'counselor')->where('added_by', $user_ids)->where('profile_verify_for_agent', 1)->count();
     
     
        }

        if($user_type == 'student') {
            $student_user =Auth::user();
            $student_id=Student::where('user_id',$student_user->id)->first();
            if(empty($student_id)) {
                abort(404);
            }

            $program_applied = PaymentsLink::with([
                'program:id,name,school_id',
                'program.university_name:id,university_name',
                'payments'
            ])
            ->when(auth()->user()->role == 'student', function ($query) {
                $query->orWhere('payment_type_remarks', 'applied_program_pay_later')
                      ->orWhere('payment_type_remarks', 'applied_program');
            })
            ->where('user_id', $student_id->user_id)
            ->get() // Retrieve all records
            ->unique('program_id') // Get unique program_id values
            ->count(); // Count the unique programs



               
        }else{
            $program_applied = null;
        }
        if(count($total_student_id)>0){
            // $total_program_applied = PaymentsLink::with([
            //     'program:id,name,school_id',
            //     'program.university_name:id,university_name',
            //     'payments'
            // ])
            // ->when(auth()->user()->role == 'student', function ($query) {
            //     $query->orWhere('payment_type_remarks', 'applied_program_pay_later')
            //           ->orWhere('payment_type_remarks', 'applied_program');
            // })
            // ->whereIn('user_id', $total_student_id)
            // ->get() // Retrieve all records
            // ->unique('program_id') // Get unique program_id values
            // ->count(); // Count the unique programs



            

            //  dd($total_program_applied);
            $total_program_applied = PaymentsLink::with([
                'program:id,name,school_id',
                'program.university_name:id,university_name',
                'payments',
            ])
                ->when(auth()->user()->role == 'student', function ($query) {
                    $query->Where('payment_type_remarks', 'applied_program_pay_later')
                        ->orWhere('payment_type_remarks', 'applied_program');
                })
                ->join('users', 'users.id', '=', 'payments_link.user_id')
                ->join('student_by_agent', 'student_by_agent.email', '=', 'payments_link.email')

                ->whereIn('payments_link.user_id', $total_student_id)
                ->groupBy('payments_link.program_id', 'student_by_agent.assigned_to', 'student_by_agent.added_by_agent_id', 'users.name')
                ->select(
                    'student_by_agent.assigned_to',
                    'student_by_agent.added_by_agent_id',
                    'users.name',
                    \DB::raw('MAX(payments_link.id) as id'),
                    \DB::raw('MAX(payments_link.program_id) as program_id'),
                    \DB::raw('MAX(payments_link.payment_type) as payment_type'),
                    \DB::raw('MAX(payments_link.payment_type_remarks) as payment_type_remarks'),
                    \DB::raw('MAX(payments_link.payment_date) as payment_date'),
                    \DB::raw('MAX(payments_link.app_id) as app_id'),
                    \DB::raw('MAX(payments_link.status) as status'),
                    \DB::raw('MAX(payments_link.user_id) as user_id'),
                    \DB::raw('MAX(payments_link.fallowp_unique_id) as fallowp_unique_id'),
                    \DB::raw('MAX(payments_link.email) as email'),
                    \DB::raw('MAX(payments_link.created_at) as latest_payment_date')
                )
                ->get();
            $total_program_applied = $total_program_applied->count();

          



        }else{
            $total_program_applied = 0;
        }
        $user_ids = User::where('admin_type', 'sub_agent')
                    ->where('status', 1);
        if(auth::user()->hasRole('agent') || auth::user()->hasRole('sub_agent')) {
            $user_ids = $user_ids->where('id', auth::user()->id)->orwhere('added_by', auth::user()->id);
        }
        $user_follow_up = DB::table('user_follow_up as uf')
                          ->select('uf.student_id', DB::raw('MAX(uf.created_at) as latest_followup'), 'u.name','uf.user_id')
                          ->join('users as u', 'uf.user_id', '=', 'u.id')
                          ->whereIn('uf.user_id', $user_ids->pluck('id'))
                          ->whereDate('uf.created_at', Carbon::today())
                          ->groupBy('uf.student_id', 'u.name','uf.user_id')
                          ->get();
                          $studentData = Student::query();

                          $studentData = $studentData
                          ->join('users', 'users.id', '=', 'student.added_by')
                          ->join('student_by_agent', 'student_by_agent.student_user_id', '=', 'student.user_id')
                          ->join('payments', 'payments.customer_email', '=', 'student.email')
                          ->join('payments_link', 'payments_link.fallowp_unique_id', '=', 'payments.fallowp_unique_id')
                          ->where('student.status_threesixty', 1)
                          ->where('student.profile_complete', 1)
                          ->where('student.added_by_agent_id', auth::user()->id)
                          ->select(
                              'student.email',
                              'student.user_id',
                              'student.first_name',
                              'student.last_name',
                              'student.status_threesixty',
                              'student.profile_complete',
                              DB::raw('MAX(users.name) as added_by_name'),
                              DB::raw('MAX(users.email) as added_by_email'),
                              DB::raw('MAX(payments.id) as payment_id'),
                              DB::raw('MAX(payments.amount) as payment_amount'),
                              DB::raw('MAX(payments.payment_status) as payment_status')
                          )
                          ->groupBy(
                              'student.email',
                              'student.user_id',
                              'student.first_name',
                              'student.last_name',
                              'student.status_threesixty',
                              'student.profile_complete'
                          )
                          ->get();
                         $complete360= $studentData->count();
                       
        
        $data = array(
            "user_follow_up"=>$user_follow_up,
            "program_applied"=>$program_applied,
            "total_program_applied"=>$total_program_applied,
            "total_leads" => $total_leads,
            "total_assigned_leads" => $total_assigned_leads,
            "total_non_allocated_leads" => $total_non_allocated_leads,
            "total_members" => $total_members,
            "total_student" => $total_student,
            "total_school_manager" => $total_school_manager,
            "total_frenchise" => $total_frenchise,
            "total_active_frenchise" => $total_active_frenchise,
            "total_inactive_frenchise" => $total_inactive_frenchise,
            "total_approve_frenchise" => $total_approve_frenchise,
            "total_approve_universties"=>$total_approve_universties,
            "total_unapprove_frnchise" => $total_unapprove_frnchise,
            "total_sub_agent" => $total_sub_agent,
            "total_university" => $total_university,
            "total_program" => $total_program,
            "total_application" => $total_application,
            "total_unapprove_universties" => $total_unapprove_universties,
            "total_unapprove_program" => $total_unapprove_program,
            "total_approve_program" => $total_approve_program,
            "total_unapprove_counceler" => $total_unapprove_counceler,
            "total_approve_counceler" => $total_approve_counceler,
            "complete360" => $complete360

        );

      
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
