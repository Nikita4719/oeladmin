<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class OtpController extends Controller
{
   
    public function sendOtp(Request $request)
    {
        $rules = [
            'phone_number' => 'required|numeric|digits:10'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $user = User::where('phone_number', $request->phone_number)->first();

        if ($user) {
            $user->phone_number = $request->phone_number;
            $user->email = $request->email ?? '';
            $user->name = $request->name ?? '';
            $user->save();

            $result = $this->resend_otp($request->phone_number);

            if ($result === true) {
                return response()->json([
                    'status' => true,
                    'message' => 'otp_sent',
                    'profile_status' => false
                ], 200);
            } else {
                return response()->json(['status' => true, 'message' => 'otp sent successfully'], 200);
            }
        } else {
            $user = new User();
            $user->phone_number = $request->phone_number;
            $user->email = $request->email ?? '';
            $user->name = $request->name ?? '';

            if ($user->save()) {
                $result = $this->resend_otp($request->phone_number);

                if ($result === true) {
                    return response()->json([
                        'status' => true,
                        'message' => 'otp_sent',
                        'profile_status' => false
                    ], 200);
                } else {
                    return response()->json(['status' => falae, 'message' => 'otp not sent'], 200);
                }
            }
        }
    }

     public function resend_otp($phone_number)
    {
        $otp = rand(100000, 999999);
        $client = new \GuzzleHttp\Client();
        $url = "https://connectexpress.in/api/v3/index.php";
        $params = [
            'method' => 'sms',
            'api_key' => '05c05017988bc8087a13f2c950e9f33fb1cfd38a',
            'to' => $phone_number,
            'sender' => 'CELIGN',
            'message' => "Your celigin account login OTP is $otp. CELIGN",
            'format' => 'php'
        ];

        try {
            $response = $client->request('GET', $url, ['query' => $params]);
            $responseBody = json_decode($response->getBody(), true);

            $user = User::where('phone_number', $phone_number)->first();

            if ($user) {
                $user->otp = $otp;
                $user->otp_expire = now()->addMinutes(10);
                $user->save();
            } else {
                User::create([
                    'phone_number' => $phone_number,
                    'otp' => $otp,
                    'otp_expire' => now()->addMinutes(10),
                ]);
            }

            if (isset($responseBody['status']) && $responseBody['status'] == 'success') {
                return true;
            } else {
                return false;
            }

        }
     catch (\Exception $e) {
        return false;  
    }
}

   

public function verifyOtp(Request $request)
{
    $request->validate([
        'phone_number' => 'required|numeric|digits:10',
        'otp' => 'required|numeric|digits:6',
    ]);

    $user = User::where('phone_number', $request->phone_number)->first();

    if (!$user) {
        return response()->json([
            'status' => false,
            'message' => 'User not found',
        ], 404);
    }

    $otpExpire = Carbon::now()->addMinutes(10);

    if ($otpExpire->isPast()) {
        return response()->json([
            'status' => false,
            'message' => 'OTP has expired',
        ], 400);
    }

    if ((int) $user->otp !== (int) $request->otp) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid OTP',
        ], 401);
    }

    $user->otp = null;
    $user->otp_expire = null;
    $user->save();
    $token = $user->createToken('API Token')->accessToken;

    return response()->json([
        'status' => true,
        'message' => 'OTP verified successfully',
        'token' => $token,
    ], 200);
}

    
    
}
