@extends('frontend.layouts.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
<div class="main-content">
   <style type="text/css">
      .url_link {
         position: relative;
         color: #3a67f0;
         font-weight: 600;
         text-decoration: underline;
      }

      .form-group label {
         margin-bottom: 0 !important;
      }

      #send_otp,
      #register {
         height: unset !important;
      }

      .invalid-feedback {
         display: block !important;
      }

      #resendOTP {
         display: flex;
      }

      .otp_success {
         display: none;
         padding: 10px;
         background: #e0ffe7;
         border-radius: 4px;
         margin-bottom: 10px;
      }

      .otp_success p {
         font-size: 13px;
         margin-bottom: 13px;
      }

      #resend_otp {
         text-decoration: underline;
         cursor: pointer;
         color: #007bff;
      }

      .required {
         color: red;
      }
   </style>


   <style>
      .form-input {
         width: 100%;
         padding: 4px 20px;
         font-size: 18px;
         font-weight: 500;
         color: #070758 !important;
         background-color: #f7f9ff !important;
         border: 2px solid #07075857 !important;
         border-radius: 0px !important;
         box-shadow: 0 4px 6px rgba(7, 7, 88, 0.1);
      }

      .form-input:focus {
         outline: none;
         border-color: #070758 important;
         background-color: #eef2ff important;
         box-shadow: 0 6px 10px rgba(7, 7, 88, 0.2);
      }

      .form-input:hover {
         background-color: #eef2ff important;
         border-color: #4a4eff important;
         box-shadow: 0 6px 12px rgba(134, 135, 160, 0.3);
      }

      .form-input::placeholder {
         color:rgba(7, 7, 88, 0.27);
         font-weight: 600;
         font-size: 16px;
      }

      .radio-input {
         appearance: none;
        width: 16px;
        height: 16px;
        border: 1px solid #070758;
        border-radius: 50%;
        outline: none;
      }

      .styled-form {
         background-color: #f5f7fa;
         padding: 30px;
         border-radius: 1px;
         box-shadow: 0 8px 5px rgba(0, 0, 0, 0.1);

      }

      .form-button {
         background: #070758 !important;
         color: #ffff;
         padding: 12px 30px !important;
         border-radius: 6px;
         border: none;
         font-size: 16px !important;
      }
      .form-footer {
        padding: 10px; 
        font-family: Arial, sans-serif;
        color: #333;
    }

    .form-footer .footer-link {
        color: #070758;
        font-weight: bold;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .form-footer .footer-link:hover {
        color: #4a4eff;
    }


   </style>

   <section class="register-section loaded">
      <div class="container">
         <div class="register-box">

            <!-- Login Form -->
            @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif
            <div class="styled-form ">
               <div class="sec-title text-center mb-30 ">
                  <h2 class="title mb-10 fw-bold fs-md-1">Franchise Registration</h2>
               </div>
               {{-- <form id="contact-form" method="POST" action="{{route('franchise-user-store')}}" aria-label="Register"> --}}
               <form id="frenchise-contact-form" method="POST" aria-label="Register">
                  <div class="row g-3 clearfix px-md-4">
                     @csrf
                     <!-- Name -->
                     <div class="col-md-6 px-md-3 ">
                        <div class="form-group ">
                           <label class="pb-2 fw-bold" for="name_input">Name <span class="required">*</span></label>
                           <input type="text" name="name" value="{{old('name')}}" class="form-control form-input" id="name_input" placeholder="Enter Name">
                           @error('name')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <div class="form-group">
                           <label class="pb-2 fw-bold" for="exampleInputEmail1">Email address <span class="required">*</span></label>
                           <input type="email" name="email" value="{{old('email')}}" class="form-control form-input" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                           @error('email')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3" style="padding-bottom: 20px;">
                        <label class="pb-2 fw-bold" for="exampleInputEmail1">Select Gender <span class="required">*</span></label><br>
                        <div style="display: flex;">
                           <div class="form-check" style="margin-right: 15px;">
                              <input class="form-check-input radio-input" type="radio" value="{{old('gender')}}" name="gender" id="flexRadioDefault1" value="Male">
                              <label class="pb-2 fw-bold" class="form-check-label" for="flexRadioDefault1">
                                 Male
                              </label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input radio-input" type="radio" value="{{old('gender')}}" name="gender" id="flexRadioDefault2" value="Female">
                              <label class="pb-2 fw-bold" class="form-check-label" for="flexRadioDefault2">
                                 Female
                              </label>
                           </div>
                           @error('gender')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <div class="form-group">
                           <label class="pb-2 fw-bold" for="phone_number_input">Mobile No. <span class="required">*</span></label>
                           <input type="text" maxlength="10" id="mobile_number" name="phone" value="{{old('phone')}}" class="form-control form-input phone" id="phone" placeholder="Phone Number">
                           @error('phone')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <div class="form-group">
                           <label class="pb-2 fw-bold" for="exampleInputEmail1">Select Country <span class="required">*</span></label>
                           @php
                           $country=App\Models\Country::select('name','id')->get();
                           @endphp
                           <select name="country_id" class="form-control form-input country" id="country_select" style="height: 45px;">
                              <option value="">--Select Country--</option>
                              @foreach ($country as $item)
                              <option value="{{$item->id}}" {{ old('country_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                              @endforeach
                           </select>
                           @error('country_id')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <div class="form-group">
                           <label class="pb-2 fw-bold">Select State <span class="required">*</span></label>
                           <select name="state_id" class="form-control form-input province_id" id="state_id" style="height: 45px;">
                              <option value="">--Select State--</option>
                           </select>
                           @error('state_id')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <div class="form-group">
                           <label class="pb-2 fw-bold">City<span class="required">*</span></label>
                           <input type="text" class="form-control form-input" value="{{old('city')}}" placeholder="Enter City" name="city">
                           @error('city')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <div class="form-group">
                           <label class="pb-2 fw-bold" for="pincode_input">Business Name</label>
                           <input type="text" class="form-control form-input" placeholder="Enter Business Name" name="business_name" value="{{old('business_name')}}">
                           @error('business_name')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <div class="form-group">
                           <label class="pb-2 fw-bold" for="zip">Pincode <span class="required">*</span></label>
                           <input type="text" class="form-control form-input" id="zip" placeholder="Enter Pincode" name="zip" value="{{old('zip')}}">
                           @error('zip')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <div class="form-group">
                           <label class="pb-2 fw-bold" for="exampleInputEmail1"> Current Profession<span class="required">*</span></label>
                           <select name="profession" class="form-control form-input" id="profession">
                              <option value="">--Select Current Profession--</option>
                              <option value="JOB" {{ old('profession') == 'JOB' ? 'selected' : '' }}>JOB</option>
                              <option value="BUSINESS" {{ old('profession') == 'BUSINESS' ? 'selected' : '' }}>BUSINESS</option>
                              <option value="FREELANCER" {{ old('profession') == 'FREELANCER' ? 'selected' : '' }}>FREELANCER</option>
                              <option value="OTHERS" {{ old('profession') == 'OTHERS' ? 'selected' : '' }}>OTHERS</option>
                           </select>
                           @error('profession')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3" style="display: none;">
                        <div class="form-group">
                           <label class="pb-2 fw-bold" for="expertise_input">Expertise <span class="required">*</span></label>
                           <input type="text" name="expertise" class="form-control form-input" id="expertise_input" value="{{old('expertise')}}" placeholder="Enter Your Specialization">
                           @error('expertise')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <div class="form-group">
                           <label class="pb-2 fw-bold" for="address">Address 1 <span class="required">*</span></label>
                           <input type="text" class="form-control form-input" id="address" value="{{old('address')}}" placeholder="Enter Address" name="address">
                           @error('address1')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <div class="form-group">
                           <label class="pb-2 fw-bold" for="address2">Address 2</label>
                           <input value="" type="text" class="form-control form-input" id="address2" value="{{old('address2')}}" placeholder="Enter Address" name="address2">
                           @error('address2')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <div class="form-group">
                           <label class="pb-2 fw-bold">Password</label>
                           <input type="password" name="password" value="{{old('password')}}" class="form-control form-input" placeholder="Password" id="password_box">
                           @error('password')
                           <span class="text-danger invalid-feedback">{{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <div class="form-group">
                           <label class="pb-2 fw-bold">Confirm Password <span class="required">*</span></label>
                           <input type="password" name="password_confirmation" value="" class="form-control form-input" placeholder="Confirm Password">
                           @error('password_confirmation')
                           <span class="text-danger"> {{$message}}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <p class="otp_failed text-danger"></p>
                     </div>
                     <div class="col-md-6 px-md-3">
                        <div class="form-group" style="display :none;" id="otpDiv">
                           <label class="pb-2 fw-bold" for="VerifyOtp">Enter OTP</label>
                           <input type="text" class="form-control form-input" name="otp" id="VerifyOtp" placeholder="OTP">
                        </div>
                     </div>
                     <span class="text-danger error-phone"></span>
                     <div class="col-md-12">
                        <div class="otp_success">
                           <p class="success_messages">One Time Password Sent To Your Email &amp; Phone No.</p>
                           <p>
                              <a type="button" class="loading_button" id="resend_otp">
                                 <span style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                              </a>
                           </p>
                           <p id="resendOTPText"></p>
                        </div>
                     </div>
                     <div class="form-group col-md-12 text-center verify_otp">
                        <button type="button" class="readon form-button" id="send_otp">
                           <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>Verify Otp</button>
                     </div>
                     <div class="form-group col-md-12 text-center register">
                        <button type="button" class="readon form-button">
                           <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                           Register</button>
                     </div>
                     <div class="form-group col-md-12  form-footer">
                        <div class="users text-center">
                           Already have an account?
                           <a href="{{route('user-login')}}" class="footer-link">Login</a>
                        </div>
                        
                        <!-- <div class="text-center">
                           <a href="{{route('franchise-register')}}" class="url_link current footer-link">Register as a Franchise</a>
                        </div> -->
                        <div class="users text-center">
                           By joining OEL, you agree to OEL's
                           <a href="{{url('privacy-policy/')}}" class="footer-link">Privacy Policy</a>
                        </div>
                     </div>

                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>
</div>
<script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
<script>
   $('.register').hide();
   $(document).ready(function() {
      function setupCSRF() {
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
      }

      function fetchStates(country_id) {
         $('.province_id').empty();
         setupCSRF();
         $.ajax({
            url: "{{ route('fetch-states.get') }}",
            method: 'get',
            data: {
               country_id: country_id
            },
            success: function(data) {
               if ($.isEmptyObject(data)) {
                  $('.province_id').append(
                     '<option value="">No records found</option>');
               } else {
                  $.each(data, function(key, value) {
                     $('.province_id').append('<option value="' + key + '">' + value +
                        '</option>');
                  });
               }
            }
         });
      }
      fetchStates($('.country').val());
      $('.country').change(function() {
         var country_id = $(this).val();
         fetchStates(country_id);
      });
   });
   $(document).on('click', '#send_otp', function(e) {
      $('.error-phone').html('');
      e.preventDefault();
      let mobile_number = $('#mobile_number').val();
      if (!mobile_number || mobile_number.length != 10 || !/^\d+$/.test(mobile_number)) {
         Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter valid mobile number',
         });
         return false;
      }
      var spinner = this.querySelector('.spinner-grow');
      spinner.classList.remove('d-none');
      $.ajax({
         url: '{{route("send-otp")}}',
         type: 'POST',
         data: {
            phone_number: mobile_number,
            _token: '{{csrf_token()}}'
         },
         success: function(data) {
            spinner.classList.add('d-none');
            if (data.success) {
               $('#otpDiv').show();
               $('.verify_otp').hide();
               $('.register').show();
            } else {
               $('.error-phone').html(data.message);
            }
         }
      })
   })
   $('.register').on('click', function(e) {
      e.preventDefault();
      var data = $('#frenchise-contact-form').serialize();
      var spinner = this.querySelector('.spinner-grow');
      spinner.classList.remove('d-none');
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $.ajax({
         url: '{{route("franchise-user-store")}}',
         type: 'POST',
         data: data,
         success: function(data) {
            spinner.classList.add('d-none');
            if (data.success) {
               window.location.href = '{{route("frenchise-edit")}}' + '/' + data.frenchise_id;
            } else if (data.errors) {
               let error_message = '';
               $.each(data.errors, function(key, value) {
                  error_message += value.join("<br>") + "<br>";
               });
               Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  html: error_message,
               });
            } else {
               Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: data.message,
               });
            }
         },
         error: function(xhr, status, error) {
            var response = JSON.parse(xhr.responseText);
            spinner.classList.add('d-none');
            if (xhr.status == 401) {
               Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: xhr.responseJSON.message,
               });
            }
            if (xhr.status == 422) {
               if (response.errors) {
                  let error_message = '';
                  $.each(response.errors, function(key, value) {
                     error_message += value.join("<br>") + "<br>";
                  });
                  Swal.fire({
                     icon: 'error',
                     title: 'Oops...',
                     html: error_message,
                  });
               }
            }
         }
      })
   })
</script>
@endsection