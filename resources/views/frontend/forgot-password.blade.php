@extends('frontend.layouts.main')
@section('content')
<div class="form-bg p-80 w-50 mx-auto mt-5">
    <div class="container">
       <div class="simple-login-container forgot_password_form">
          <h2>Forgot Password</h2>
          <hr>
          <div class="">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
             <form method="POST" action="{{route('password.email')}}">
                @csrf
                <div class="form-group">
                   <p>Please provide your email, we will send you an OTP in your registered email or phone number !</p>
                   <label for="exampleInputEmail1">Email address</label>
                   <input id="email" type="email" placeholder="Enter Email Address" class="form-control" name="email" value="" required="" autofocus="">
                   <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                {{-- <p class="otp_failed text-danger"></p>
                <div style="display :none;" id="otpDiv">
                   <div class="form-group" style="display: none;">
                      <div style="display: flex;">
                         <div class="radio" style="margin-right: 20px;">
                            <label><input onchange="toggleLoginType('password')" type="radio" name="login_type" value="password">
                            Login with Password
                            </label>
                         </div>
                         <div class="radio">
                            <label><input onchange="toggleLoginType('otp')" type="radio" checked="" name="login_type" value="otp">
                            Login with OTP
                            </label>
                         </div>
                      </div>
                   </div>
                   <div id="otp_section">
                      <div class="form-group">
                         <label for="exampleInputPassword1">Enter Otp</label>
                         <input type="text" name="otp" class="form-control " id="VerifyOtp" placeholder="">
                      </div>
                      <div class="otp_success">
                         <p class="success_messages">One Time Password Sent To Your Email  &amp; Phone No.</p>
                         <p>
                            <a type="button" class="loading_button" id="resend_otp">
                            <span style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span>Resend OTP</span>
                            </a>
                         </p>
                         <p id="resendOTPText"></p>
                      </div>
                   </div>
                   <div class="form-group" id="password_section">
                      <label for="exampleInputPassword1">Enter Password</label>
                      <input type="text" name="password" class="form-control " id="password_input" placeholder="Password">
                   </div>
                </div> --}}
                <button type="submit" class="btn btn-primary sub_dis" id="send_otp">Send OTP</button>
             </form>
          </div>
       </div>
    </div>
 </div>
@endsection
