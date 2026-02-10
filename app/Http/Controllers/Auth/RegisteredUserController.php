<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Student;
use App\Models\StudentByAgent;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationSuccess;
use Illuminate\Support\Facades\Log;

use App\Jobs\SendOTPJob;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.student_registration');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $validate=  $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'admin_type' => 'super_admin',
            'status' => 1,
            'password' => Hash::make($request->password),
        ]);
//        $user->assignRole(['Administrator']);

        //event(new Registered($user));
        //Auth::login($user);

        //return redirect(RouteServiceProvider::HOME);
        //return redirect('login');
        return redirect('login')->with('status', __('Congratulations, Your account has been successfully created.'));
    }

    public function franchise_register()
    {
        return view('auth.franchise_register');
    }

    public function student_registration()
    {
        return view('auth.student_registration');
    }

    public function student_store(Request $request)
    {
       $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|confirmed',
        'phone_number'=>'required',
       ]);
       $student = StudentByAgent::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
       ]);
       $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'admin_type'=>'student',
            'phone_number'=>$request->phone_number,
            'status'=>1,
            'is_active'=>1,
            'password'=>Hash::make($request->password),
       ]);
       Student::create([
            'user_id'=>$user->id,
            'first_name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
        ]);
        $role = Role::where('name','student')->first();
        if ($role) {
            $user->assignRole([$role->id]);
        }
       $student->user_id = $user->id;
       $student->save();
       $student_data = [
        'first_name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
    ];
       //Mail::mailer('bravo')->to($data['email'])->send(new RegistrationSuccess($student_data));
       //Mail::to($request->email,)->send(new RegistrationSuccess($student_data));
       Auth::login($user);
       return redirect()->route('dashboard');
       return redirect()->route('user-login')->with('success', 'You have successfully registered. Please login to continue.');
    }
    public function counselor_register()
    {
        return view('auth.counselor_register');
    }

    public function franchise_user_store_old(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:255'],
            'country_id' => ['nullable', 'integer'],
            'state_id' => ['nullable', 'integer'],
            'city' => ['nullable', 'string', 'max:255'],
            'business_name' => ['nullable', 'string', 'max:255'],
            'zip' => ['nullable', 'string', 'max:255'],
            'profession' => ['nullable', 'string', 'max:255'],
            'expertise' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'address2' => ['nullable', 'string', 'max:255'],
           'password'=>'required|confirmed',
           'otp' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        $storedOtp = session('otp');
        if ($request->otp == $storedOtp) {
            session()->forget('otp');
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'admin_type' => 'agent',
                'phone_number' => $request->phone,
                'status' => 1,
                'is_active' => 1,
                'is_active' => 0,
                'is_approve' => 0,
                'password' => Hash::make($request->password),
            ]);
            $role = Role::where('name','agent')->first();
            if ($role) {
                $user->assignRole([$role->id]);
            }
            $agent = new Agent();
            $agent->user_id = $user->id;
            $agent->legal_first_name = $request->name;
            $agent->email = $request->email;
            $agent->phone = $request->phone;
            $agent->country_id = $request->country_id;
            $agent->state_id = $request->state_id;
            $agent->city = $request->city;
            $agent->business_name = $request->business_name;
            $agent->zip = $request->zip;
            $agent->profession = $request->profession;
            $agent->expertise = $request->expertise;
            $agent->address = $request->address;
            $agent->address2 = $request->address2;
            $agent->save();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];
             Mail::mailer('bravo')->to($data['email'])->send(new RegistrationSuccess($data));

            //Mail::to($data['email'])->send(new RegistrationSuccess($data));
            Auth::login($user);
            return response()->json(['message' => 'OTP verified successfully.','success'=>true,'frenchise_id'=>$agent->id]);
        } else {
            return response()->json(['message' => 'Invalid OTP.','success'=>false], 401);
        }
        return redirect()->route('dashboard');
    }
  
  public function franchise_user_store(Request $request)
    {
        // First validate OTP and email early
        $otp = $request->input('otp');
        $storedOtp = session('otp');

        if ($otp != $storedOtp) {
            return response()->json(['message' => 'Invalid OTP.', 'success' => false], 401);
        }

        // Now proceed with validation
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:255'],
            'country_id' => ['nullable', 'integer'],
            'state_id' => ['nullable', 'integer'],
            'city' => ['nullable', 'string', 'max:255'],
            'business_name' => ['nullable', 'string', 'max:255'],
            'zip' => ['nullable', 'string', 'max:255'],
            'profession' => ['nullable', 'string', 'max:255'],
            'expertise' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'address2' => ['nullable', 'string', 'max:255'],
            'password' => ['required', 'confirmed'],
            'otp' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }

        // OTP is valid and data is validated, clear session OTP
        session()->forget('otp');

        // Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'admin_type' => 'agent',
            'phone_number' => $request->phone,
            'status' => 1,
            'is_active' => 0,
            'is_approve' => 0,
            'password' => Hash::make($request->password),
        ]);

        // Assign Role
        $role = Role::where('name', 'agent')->first();
        if ($role) {
            $user->assignRole([$role->id]);
        }

        // Create Agent
        $agent = new Agent();
        $agent->user_id = $user->id;
        $agent->legal_first_name = $request->name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->country_id = $request->country_id;
        $agent->state_id = $request->state_id;
        $agent->city = $request->city;
        $agent->business_name = $request->business_name;
        $agent->zip = $request->zip;
        $agent->profession = $request->profession;
        $agent->expertise = $request->expertise;
        $agent->address = $request->address;
        $agent->address2 = $request->address2;
        $agent->save();

        // Send confirmation email
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        Mail::mailer('bravo')->to($data['email'])->send(new RegistrationSuccess($data));

        // Log in the user
        Auth::login($user);

        return response()->json([
            'message' => 'OTP verified successfully.',
            'success' => true,
            'frenchise_id' => $agent->id
        ]);

    }

    public function counselor_register_store(Request $request)
    {
        // Step 1: Validate the incoming data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone_number' => 'required|string|max:20|unique:users,phone_number',
            // 'password' => 'required|string|min:6|confirmed', // If you have a password field
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['status' => false, 'errors' => $validator->errors()], 422);
        }

        // Step 2: Store user with counselor role
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'admin_type' => 'sub_agent', // assuming this differentiates user type
            'status' => 1,
            'is_active' => 0,
            'is_approve' => 0,

        ]);

        // Step 3: Assign counselor role (optional)
        $role = Role::where('name', 'sub_agent')->first();
        if ($role) {
            $user->assignRole([$role->id]);
        }

        return redirect()->back()->with('success', 'Counselor registered successfully. An admin will contact you within 24 hours.');
    }
  
   public function sendOtp(Request $request)
    {
        // Debug: log request input
        Log::info("OTP Request Received", $request->all());

        $request->validate([
            'name'     => 'required',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|max:255|unique:users,email',
            'phone_number' => 'required|string|max:20|unique:users,phone_number',
        ]);

        $otp = rand(100000, 999999);

        session([
            'register_temp' => [
                'name'         => $request->name,
                'email'        => $request->email,
                'phone_number' => $request->phone_number,
                'password'     => $request->password,
                'otp'          => $otp,
            ]
        ]);

        // SMS Body
        $smsMessage = "Your overseas education lane registration OTP is " . $otp;

        $smsData = [
            'method'  => 'sms',
            'api_key' => env('SMS_API_KEY'),
            'to'      => $request->phone_number,
            'sender'  => env('SMS_SENDER'),
            'unicode' => 'auto',
            'message' => $smsMessage,
            'format'  => 'json'
        ];

        // FULL LOGGING
        Log::info("SMS Sending Started", [
            'smsData' => $smsData,
            'phone'   => $request->phone_number
        ]);

        try {

            // Call your SMS Job
            $response = $this->send_otp_job($smsData);

            // Log response of SMS API
            Log::info("SMS API Response", [
                'response' => $response
            ]);
        } catch (\Exception $e) {

            // Log full error
            Log::error("SMS OTP FAILED", [
                'error_message' => $e->getMessage(),
                'file'          => $e->getFile(),
                'line'          => $e->getLine(),
                'smsData'       => $smsData
            ]);

            return response()->json([
                'status'  => false,
                'message' => 'SMS sending failed. Check logs.'
            ]);
        }

        session()->put('WithdrawEmailOtp', $otp);

        return response()->json([
            'status'  => true,
            'message' => 'OTP sent successfully.'
        ]);
    }



    // STEP 2: VERIFY OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        $data = session('register_temp');


        if (!$data) {
            return response()->json(['status' => false, 'message' => 'Session expired']);
        }

        if ($data['otp'] != $request->otp) {
            return response()->json(['status' => false, 'message' => 'Invalid OTP']);
        }

        return $this->studentStoreAfterOtp($data);
    }

    // STEP 3: SAVE STUDENT AFTER OTP MATCH
    private function studentStoreAfterOtp($data)
    {
        // Create Lead
        $student = StudentByAgent::create([
            'name'         => $data['name'],
            'email'        => $data['email'],
            'phone_number' => $data['phone_number'],
            'source'       => 'website',
            'lead_status'  => 1,
        ]);

        // Create User
        $user = User::create([
            'name'         => $data['name'],
            'email'        => $data['email'],
            'admin_type'   => 'student',
            'phone_number' => $data['phone_number'],
            'status'       => 1,
            'is_active'    => 1,
            'password'     => Hash::make($data['password']),
        ]);

        // Create Student
        Student::create([
            'user_id'      => $user->id,
            'first_name'   => $data['name'],
            'email'        => $data['email'],
            'phone_number' => $data['phone_number'],
        ]);

        // Assign Role
        $role = Role::where('name', 'student')->first();
        if ($role) {
            $user->assignRole([$role->id]);
        }

        // Update Lead record
        $student->user_id = $user->id;
        $student->save();

        // Login
        Auth::login($user);

        session()->forget('register_temp');

        return response()->json([
            'status'   => true,
            'message'  => 'Registration Successful',
            'redirect' => route('dashboard')
        ]);
    }

    public function send_otp_job($details)
    {
        dispatch(new SendOTPJob($details));
    }
}
