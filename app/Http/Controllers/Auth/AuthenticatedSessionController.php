<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\View\View;
use App\Jobs\SendOTPJob;
use App\Mail\SendOtp;
use App\Models\VerificationOtp;
use Hash;
use Log;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        // dd($request->all());
        $request->authenticate();
        $request->session()->regenerate(); // VERY IMPORTANT for 419 error fix
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken(); // regenerate CSRF to avoid 419

        return redirect('/');
    }

    public function user_login()
    {
        return view('auth.user-login');
    }

    public function send_otp_job($details)
    {
        dispatch(new SendOTPJob($details));
    }

    public function sendOTP(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $input = $request->email;

        $user = User::where('email', $input)
                    ->orWhere('phone_number', $input)
                    ->first();

        if (!$user) {
            return response()->json(['error' => 'Email/Phone not registered'], 404);
        }

        $otp = rand(100000, 999999);

        VerificationOtp::where('email', $user->email)
            ->orWhere('phone_number', $user->phone_number)
            ->delete();

        VerificationOtp::create([
            'email'        => $user->email,
            'phone_number' => $user->phone_number,
            'email_otp'    => $otp,
            'type'         => 'login',
        ]);

        // SMS data
        $smsMessage = "Your overseas education lane login OTP is " . $otp;
        $data = [
            'method'  => 'sms',
            'api_key' => env('SMS_API_KEY'),
            'to'      => $user->phone_number,
            'sender'  => env('SMS_SENDER'),
            'unicode' => 'auto',
            'message' => $smsMessage,
            'format'  => 'json'
        ];

        // Email OTP
        try {
            if (!empty($user->email)) {
                Mail::mailer('bravo')->to($user->email)->send(new SendOtp($otp));
            }
        } catch (\Exception $ex) {
            Log::error("Email OTP send failed: " . $ex->getMessage());
        }

        // SMS OTP
        try {
            if (!empty($user->phone_number)) {
                $this->send_otp_job($data);
            }
            session()->put('WithdrawEmailOtp', $otp);

            return response()->json(['success' => 'OTP sent successfully']);
        } catch (\Exception $e) {

            session()->put('WithdrawEmailOtp', $otp);
            return response()->json(['warning' => 'OTP sent to email only']);
        }
    }

    public function verifyOTP(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();

        Session::put('account_type', $request->account_type);

        if (!$user) {
            flash()->error('Email not registered. Register your account.');
            return redirect()->back()->withInput();
        }

        if ($request->login_type == "otp") {

            $otpData = VerificationOtp::where('email', $email)
                ->where('type', 'login')
                ->where('created_at', '>=', Carbon::now()->subMinutes(15))
                ->latest()
                ->first();

            if (!$otpData || $otpData->email_otp != $request->otp) {
                flash()->error('Please enter correct OTP');
                return redirect()->back()->withInput();
            }

            if ($user->is_active == 0) {
                flash()->error('Your account is disabled !');
                return redirect()->back()->withInput();
            }

            Auth::loginUsingId($user->id);
            $request->session()->regenerate(); // FIX for 419

            VerificationOtp::where('email', $email)->delete();

            return redirect()->route('dashboard');
        }

        // PASSWORD LOGIN
        if ($request->login_type == "password") {

            if ($user->is_active == 0) {
                flash()->error('Your account is disabled !');
                return redirect()->back()->withInput();
            }

            if (!Hash::check($request->password, $user->password)) {
                flash()->error('Please enter correct password !');
                return redirect()->back()->withInput();
            }

            Auth::loginUsingId($user->id);
            $request->session()->regenerate(); // FIX for 419

            Session::put('notify_lead', true);

            VerificationOtp::where('email', $email)->delete();

            return redirect()->route('dashboard');
        }

        flash()->error('Something went wrong');
        return redirect()->back();
    }
}
