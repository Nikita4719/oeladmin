@extends('frontend.layouts.main')

@section('content')
<div class="main-content">

<section class="register-section">
<div class="container">
<div class="register-box">

<div class="styled-form">
<form id="contact-form">

    @csrf

    <h2 class="text-center mb-4">Student Registration</h2>

    <div class="row g-3">

        <!-- NAME -->
        <div class="col-md-6">
            <label>Name *</label>
            <input type="text" name="name" class="form-control form-input" id="name_input">
            <span id="name_error" class="text-danger"></span>
        </div>

        <!-- EMAIL -->
        <div class="col-md-6">
            <label>Email *</label>
            <input type="email" name="email" class="form-control form-input" id="email_input">
            <span id="email_error" class="text-danger"></span>
        </div>

        <!-- PHONE -->
        <div class="col-md-6">
            <label>Phone *</label>
            <input type="text" name="phone_number" class="form-control form-input" id="phone_input" maxlength="10">
            <span id="phone_number_error" class="text-danger"></span>
        </div>

        <!-- PASSWORD -->
        <div class="col-md-6">
            <label>Password *</label>
            <input type="password" name="password" class="form-control form-input" id="password_input">
            <span id="password_error" class="text-danger"></span>
        </div>

        <!-- CONFIRM PASSWORD -->
        <div class="col-md-6">
            <label>Confirm Password *</label>
            <input type="password" name="password_confirmation" class="form-control form-input">
        </div>

        <!-- EMPTY COLUMN -->
        <div class="col-md-6"></div>

        <!-- OTP BOX -->
        <div class="col-md-6" id="otpDiv" style="display:none;">
            <label>Enter OTP</label>
            <input type="text" id="VerifyOtp" class="form-control form-input" maxlength="6">
            <p class="otp_failed text-danger"></p>
        </div>

        <!-- SEND OTP -->
        <div class="col-md-12 text-center">
            <button type="button" id="send_otp" class="btn btn-primary">Register</button>
        </div>

</form>
</div>

</div>
</div>
</section>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

/* -------------------------------
   FRONT-END VALIDATION
-------------------------------- */

// PHONE VALIDATION 10 DIGIT
$("#phone_input").on("input", function () {
    this.value = this.value.replace(/[^0-9]/g, ''); // only numbers
    if (this.value.length !== 10) {
        $("#phone_number_error").text("Phone number must be exactly 10 digits.");
    } else {
        $("#phone_number_error").text("");
    }
});

// GMAIL VALIDATION
$("#email_input").on("input", function () {
    let email = $(this).val();
    let gmailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

    if (!gmailRegex.test(email)) {
        $("#email_error").text("Only valid Gmail address allowed (example@gmail.com)");
    } else {
        $("#email_error").text("");
    }
});


/* -------------------------------
   SEND OTP AJAX
-------------------------------- */

$("#send_otp").click(function (e) {
    e.preventDefault();

    // final frontend check
    let phone = $("#phone_input").val();
    let email = $("#email_input").val();
    let gmailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

    if (phone.length !== 10) {
        $("#phone_number_error").text("Phone number must be exactly 10 digits.");
        return;
    }
    if (!gmailRegex.test(email)) {
        $("#email_error").text("Only valid Gmail address allowed.");
        return;
    }

    $.ajax({
        url: "{{ route('send.otp') }}",
        method: "POST",
        data: $("#contact-form").serialize(),
        success: function (res) {
            if (res.status) {
                $("#otpDiv").show();
                $("#send_otp").html("Enter OTP Below");
                $("#send_otp").prop("disabled", true);
                alert("OTP Sent Successfully");
            }
        },
        error: function (xhr) {
            let errors = xhr.responseJSON.errors;
            if (errors) {
                $("#name_error").text(errors.name);
                $("#email_error").text(errors.email);
                $("#phone_number_error").text(errors.phone_number);
                $("#password_error").text(errors.password);
            }
        }
    });
});


/* -------------------------------
   VERIFY OTP
-------------------------------- */

$("#VerifyOtp").keyup(function () {
    let otp = $(this).val();

    if (otp.length === 6) {
        $.ajax({
            url: "{{ route('verify.otp') }}",
            method: "POST",
            data: {
                otp: otp,
                _token: "{{ csrf_token() }}"
            },
            success: function (res) {
                if (res.status) {
                    window.location.href = res.redirect;
                } else {
                    $(".otp_failed").text(res.message);
                }
            }
        });
    }
});

</script>

@endsection
