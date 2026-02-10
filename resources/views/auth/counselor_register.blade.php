@extends('frontend.layouts.main')
@section('content')
<section class="register-section loaded">
    <div class="container">
       <div class="register-box">
          <div class="sec-title text-center mb-30">
             <h2 class="title mb-10">Counselor Registration</h2>
          </div>
           @if (session('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         @endif
         @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <!-- Login Form -->
          <div class="styled-form1">
             <form id="contact-form" method="POST" action="{{route('counselor-register-store')}}" aria-label="Register">
                <div class="row clearfix">
                   <!-- Name -->
                   @csrf
                   <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                         <label for="name">Name <span class="required">*</span></label>
                         <input type="text" name="name" value="" class="form-control " id="name_input" placeholder="Enter Name">
                         <span id="name_error" class="invalid-feedback" role="alert">
                         <strong></strong>
                         </span>
                      </div>
                   </div>
                   <!-- Email -->
                   <div class="col-md-6 col-sm-12">
                      <div class="form-group">
                         <label for="exampleInputEmail1">Email address <span class="required">*</span></label>
                         <input type="email" name="email" value="" class="form-control " id="email" aria-describedby="emailHelp" placeholder="Enter email">
                         <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                         <span id="email_error" class="invalid-feedback" role="alert">
                         <strong></strong>
                         </span>
                      </div>
                   </div>
                   <!-- Mobile Number -->
                   <div class="col-md-6 col-sm-12 " style="margin-top: -7px;">
                      <label for="phone_number_input">Mobile No. <span class="required">*</span></label>
                      <div class="form-group">
                         <input type="tel" maxlength="10" name="phone_number" value="" class="form-control  phone_number" id="phone_number_input" placeholder="Phone Number">
                         <span id="phone_number_error" class="invalid-feedback" role="alert">
                         <strong></strong>
                         </span>
                      </div>
                   </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                   <button type="submit" class="readon submit-btn" id="send_otp">Register</button>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                   <div class="users">Already have an account? <a href="{{route('user-login')}}">Login</a></div>
                   <hr>
                   <div>
                      <a href="{{route('franchise-register')}}" class="url_link">Register as a Franchise</a>
                   </div>
                   {{-- <div>
                      <a href="{{route('counselor_register')}}" class="url_link current">Register as a Counselor</a>
                   </div> --}}
                   <hr>
                   <div class="users">
                      By joining OEL, you agree to OEL's <a href="{{url('privacy-policy')}}">Privacy Policy</a>
                   </div>
                </div>
             </form>
          </div>
       </div>
    </div>
 </section>
@endsection
