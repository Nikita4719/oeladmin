<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentsLink;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentByAgent;
use Carbon\Carbon;

class AccountingController extends Controller
{

    public function getFeesByMasterService($master_service)
    {

        $user = Auth::user();
        $query = PaymentsLink::with('payments')
            ->whereHas('payments', function ($query)     {
                $query->where('payment_status', 'success');
            })
            ->wherein('master_service', [$master_service]);

            // dd($query  );
        if ($user->hasRole('Administrator')) {
            return $query->sum('amount');
        }

        $userId = $user->id;
        if ($user->hasRole('agent')) {
            $usersId = StudentByAgent::where('added_by_agent_id', $userId)
                // ->whereNotIn('admin_type', ['student'])
                ->orWhere('added_by_agent_id', null)
                ->pluck('email')
                ->toArray();
            if (!empty($usersId)) {
                $usersId[] = $userId;
            }
            return $query->whereIn('email', $usersId)->sum('amount');
        }

        if ($user->hasRole('sub_agent')) {
            $usersId = StudentByAgent::where('assigned_to', $userId)
                // ->whereNotIn('admin_stype', ['student'])
                ->pluck('email')
                ->toArray();
                
               
            if (!empty($usersId)) {
                $usersId[] = $userId;
            }

          // $value=$query->whereIn('email', $usersId)->sum('amount');
           // dd($value);
            return $query->whereIn('email', $usersId)->sum('amount');
        }


        return $query->where('email', $userId)->sum('amount');
    }

    public function getFeesByMasterServiceByMonth($master_service, $month = 1)
    {
        $user = Auth::user();
        $query = PaymentsLink::with('payments')
            ->whereHas('payments', function ($query) use ($month) {
                $query->where('payment_status', 'success')
                ;
                if ($month) {
                    $query->whereMonth('created_at', $month);
                }
            })
            ->wherein('master_service', [$master_service]);
        if ($user->hasRole('Administrator')) {
            return $query->sum('amount');
        }
        $userId = $user->id;
        if ($user->hasRole('agent')) {
            return $query->whereIn('email', function ($subquery) use ($userId) {
                $subquery->select('email')
                    ->from('student_by_agent')
                    ->orWhere('added_by_agent_id', null)
                    ->where('added_by_agent_id', $userId);
            })->orWhere('email', $user->email)->sum('amount');
        }
        
        if ($user->hasRole('sub_agent')) {
            $usersId = StudentByAgent::where('assigned_to', $userId)
                // ->whereNotIn('admin_type', ['student'])
                ->pluck('email')
                ->toArray();
            if (!empty($usersId)) {
                $usersId[] = $userId;
            }

            return $query->whereIn('email', $usersId)->sum('amount');
        }
        return $query->where('email', $userId)->sum('amount');

        // return $query->where('user_id', $userId)->sum('amount');
    }
    public function index()
    {
        $query = PaymentsLink::whereHas('payments', function ($query) {
            $query->where('payment_status', 'success');
        })
            // ->whereIn('master_service', [$master_service])
            ->join('payments', 'payments.fallowp_unique_id', '=', 'payments_link.fallowp_unique_id') // Example join
            ->sum('payments_link.panding'); // Sum the 'pending_amount' in the 'payments' table

        
        $fees = [
            'oel_registration_fees' => $this->getFeesByMasterService(1),
            'university_application_fees' => $this->getFeesByMasterService(2),
            'course_tution_fees' => $this->getFeesByMasterService(3),
            'visa_processing_fees' => $this->getFeesByMasterService(4),
            'embassy_fees' => $this->getFeesByMasterService(5),
            'accommodation_fees' => $this->getFeesByMasterService(6),
            'ticket_fees' => $this->getFeesByMasterService(7),
            'english_test' => $this->getFeesByMasterService(8),
            'total_amount' => $this->getFeesByMasterService(1) + $this->getFeesByMasterService(2) + $this->getFeesByMasterService(3) + $this->getFeesByMasterService(4) + $this->getFeesByMasterService(5) + $this->getFeesByMasterService(6) + $this->getFeesByMasterService(7) + $this->getFeesByMasterService(8),
            'panding_amount' => $query
        ];
       
        
        $feesMonthly = [];
        for ($i = 1; $i <= 12; $i++) {
            $feesMonthly[$i] = [
                'oel_registration_fees' => $this->getFeesByMasterServiceByMonth(1, $i),
                'university_application_fees' => $this->getFeesByMasterServiceByMonth(2, $i),
                'course_tution_fees' => $this->getFeesByMasterServiceByMonth(3, $i),
                'visa_processing_fees' => $this->getFeesByMasterServiceByMonth(4, $i),
                'embassy_fees' => $this->getFeesByMasterServiceByMonth(5, $i),
                'accommodation_fees' => $this->getFeesByMasterServiceByMonth(6, $i),
                'ticket_fees' => $this->getFeesByMasterServiceByMonth(7, $i),
                'english_test' => $this->getFeesByMasterServiceByMonth(8, $i),
            ];
        }


        return view('admin.accounting.index', compact('fees', 'feesMonthly'));
    }
    
     public function student_reviewold(Request $request)
    {
        $user = Auth::user();

        // Base Query WITH JOIN FIRST
        $query = Payment::query()
            ->join('student_by_agent', 'student_by_agent.email', '=', 'payments.customer_email');

        // ------------------------
        // ROLE FILTERS
        // ------------------------
        if ($user->hasRole('agent')) {
            $query->where(function ($q) use ($user) {
                $q->where(function ($qq) use ($user) {
                    $qq->where('student_by_agent.added_by_agent_id', $user->id)
                        ->where('payments.payment_status', 'success');
                })
                    ->orWhereNull('student_by_agent.added_by_agent_id');
            });
        }

        if ($user->hasRole('sub_agent')) {
            $query->where('student_by_agent.assigned_to', $user->id);
        }

        // ------------------------
        // SEARCH FILTERS
        // ------------------------
        if ($request->first_name) {
            $query->where('student_by_agent.name', 'like', '%' . $request->first_name . '%');
        }

        if ($request->email) {
            $query->where('student_by_agent.email', 'like', '%' . $request->email . '%');
        }

        if ($request->phone_number) {
            $query->where('student_by_agent.phone_number', 'like', '%' . $request->phone_number . '%');
        }

        // ------------------------
        // RESULT
        // ------------------------
        $students = $query
            ->select('student_by_agent.*',
                    'payments.created_at as payment_date' )
            ->distinct('student_by_agent.email')
           ->orderBy('student_by_agent.id', 'DESC')   // 👈 DESC ORDER ADDED
            ->paginate(15);

        return view('admin.accounting.student-reviews', compact('students'));
    }
  
   public function student_review(Request $request)
    {
        $user = Auth::user();

        // ===================== STUDENT TABLE QUERY =====================
        $studentsQuery = Payment::query()
            ->join('student_by_agent', 'student_by_agent.email', '=', 'payments.customer_email');

        // Role Filters
        if ($user->hasRole('agent')) {
            $studentsQuery->where(function ($q) use ($user) {
                $q->where(function ($qq) use ($user) {
                    $qq->where('student_by_agent.added_by_agent_id', $user->id)
                        ->where('payments.payment_status', 'success');
                })->orWhereNull('student_by_agent.added_by_agent_id');
            });
        }
        if ($user->hasRole('sub_agent')) {
            $studentsQuery->where('student_by_agent.assigned_to', $user->id);
        }

        // Search Filters
        if ($request->first_name) {
            $studentsQuery->where('student_by_agent.name', 'like', '%' . $request->first_name . '%');
        }
        if ($request->email) {
            $studentsQuery->where('student_by_agent.email', 'like', '%' . $request->email . '%');
        }
        if ($request->phone_number) {
            $studentsQuery->where('student_by_agent.phone_number', 'like', '%' . $request->phone_number . '%');
        }
        if ($request->day) {
            $studentsQuery->whereDate('payments.created_at', $request->day);
        }
        if ($request->month) {
            $studentsQuery->whereMonth('payments.created_at', \Carbon\Carbon::parse($request->month)->month)
                ->whereYear('payments.created_at', \Carbon\Carbon::parse($request->month)->year);
        }

        $students = $studentsQuery
            ->select('student_by_agent.*', 'payments.amount', 'payments.created_at as payment_date')
            ->orderBy('payments.created_at', 'DESC')
            ->paginate(15);

        // ===================== TOTALS ONLY IF FILTER APPLIED =====================
        $dailyTotal = collect();
        $monthlyTotal = collect();

        if ($request->day || $request->month) {
            $totalQuery = Payment::query()
                ->join('student_by_agent', 'student_by_agent.email', '=', 'payments.customer_email');

            if ($user->hasRole('agent')) {
                $totalQuery->where(function ($q) use ($user) {
                    $q->where(function ($qq) use ($user) {
                        $qq->where('student_by_agent.added_by_agent_id', $user->id)
                            ->where('payments.payment_status', 'success');
                    })->orWhereNull('student_by_agent.added_by_agent_id');
                });
            }
            if ($user->hasRole('sub_agent')) {
                $totalQuery->where('student_by_agent.assigned_to', $user->id);
            }

            if ($request->first_name) {
                $totalQuery->where('student_by_agent.name', 'like', '%' . $request->first_name . '%');
            }
            if ($request->email) {
                $totalQuery->where('student_by_agent.email', 'like', '%' . $request->email . '%');
            }
            if ($request->phone_number) {
                $totalQuery->where('student_by_agent.phone_number', 'like', '%' . $request->phone_number . '%');
            }
            if ($request->day) {
                $totalQuery->whereDate('payments.created_at', $request->day);
            }
            if ($request->month) {
                $totalQuery->whereMonth('payments.created_at', \Carbon\Carbon::parse($request->month)->month)
                    ->whereYear('payments.created_at', \Carbon\Carbon::parse($request->month)->year);
            }

            // Daily total
            $dailyTotal = (clone $totalQuery)
                ->selectRaw('DATE(payments.created_at) as day, SUM(payments.amount) as total')
                ->groupBy('day')
                ->orderBy('day', 'DESC')
                ->get();

            // Monthly total
            $monthlyTotal = (clone $totalQuery)
                ->selectRaw("DATE_FORMAT(payments.created_at,'%Y-%m') as month, SUM(payments.amount) as total")
                ->groupBy('month')
                ->orderBy('month', 'DESC')
                ->get();
        }

        return view('admin.accounting.student-reviews', compact('students', 'dailyTotal', 'monthlyTotal'));
    }

    public function student_view($id)
    {
        // $student=Student::with('country')->where('user_id',$id)->first();
        $student = StudentByAgent::where('id', $id)->first();

        $payments = Payment::with(['PaymentLink' => function ($query) {
            $query->with(['master_services' => function ($query) {

                $query->select('name', 'id', 'amount');
            }]);
        }])->where('payment_status', 'success')->where('customer_email', $student->email)->get();

        
        return view('admin.accounting.student-view', compact('student', 'payments'));
    }

    public function student_invoice($id)
    {

       $student = StudentByAgent::where('id', $id)->first();

          if (!$student) {
             
              $payments = collect();

              
          } else {
              $payments = Payment::with(['PaymentLink' => function ($query) {
                  $query->with(['master_services' => function ($query) {
                      $query->select('name', 'id', 'amount', 'created_at', 'updated_at');
                  }]);
              }])
              ->where('payment_status', 'success')
              ->where('customer_email', $student->email)
              ->get();
          }


        // dd($payments->PaymentLink);
        return view('admin.invoice', compact('student', 'payments'));
    }


    public function due_amount_student(Request $request)
    {

        $query = Payment::join('student', 'student.email', '=', 'payments.customer_email')
            ->join('payments_link', 'payments_link.email', '=', 'payments.customer_email')
            ->select(
                'student.first_name',
                'student.last_name',
                'student.email',
                'student.phone_number',
                'payments_link.due_date',
                'payments_link.amount'
            )
            ->whereDate('payments_link.due_date', '<', Carbon::now())
            ->distinct('student.email');

        // Filters
        if ($request->filled('first_name')) {
            $query->where('student.first_name', 'like', '%' . $request->first_name . '%');
        }
        if ($request->filled('email')) {
            $query->where('student.email', 'like', '%' . $request->email . '%');
        }
        if ($request->filled('phone_number')) {
            $query->where('student.phone_number', 'like', '%' . $request->phone_number . '%');
        }

        // Paginate results
        $students = $query->paginate(15);
        // You can change the page size if needed



        return view('admin.accounting.pandingamount', compact('students'));
    }
}
