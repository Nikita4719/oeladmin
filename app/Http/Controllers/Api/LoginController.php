<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->accessToken;

            return response()->json([
                'status' => 'true',
                'token' => $token,
                'admin_type' => $user->admin_type,
            ], 200);
        }

        return response()->json([
            'status' => 'false',

            'message' => 'Invalid credentials',
        ], 401);
    }

    public function student_register(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => 'required|min:6',
            'phone_number' => 'required|string|max:20',
            'admin_type'=>'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'false',
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password), 
                'phone_number'=> $request->phone_number,
                'admin_type'=>$request->admin_type
            ]);

            $token = $user->createToken('API Token')->accessToken;

            return response()->json([
                'status'  => 'true',
                'token'   => $token,
                'admin_type' => $user->admin_type,
            ], 201);
        } catch (Exception $e) {
            
            return response()->json([
                'status'  => 'false',
                'message' => 'Registration failed: ' . $e->getMessage(),
            ], 500);
        }
    }

   
    public function student_login(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'false',
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
           
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                $token = $user->createToken('API Token')->accessToken;

                return response()->json([
                    'status'  => 'true',
                    'token'   => $token,
                    'admin_type' => $user->admin_type,
                ], 200);
            } else {
                return response()->json([
                    'status'  => 'false',
                    'message' => 'Invalid credentials',
                ], 401);
            }
        } catch (Exception $e) {
           
            return response()->json([
                'status'  => 'false',
                'message' => 'Login failed: ' . $e->getMessage(),
            ], 500);
        }
    }
}
    
         
 
