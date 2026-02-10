<form method="POST" action="{{ route('login.verifyOTP') }}" aria-label="{{ __('Login') }}">
    @csrf

    <input type="hidden" name="account_type" value="student">

    <!-- Email / Phone -->
    <div class="form-group">
        <input id="email" type="email" placeholder="Enter Email or Phone Number"
            class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
            name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <small class="form-text text-muted">
            We'll never share your email with anyone else.
        </small>
    </div>

    <p class="otp_failed text-danger" style="display:none; margin-bottom:0;"></p>

    @php $selected_login_type = old('login_type', 'password'); @endphp

    <!-- Login Type Toggle -->
    <div class="form-group text-center mt-3">
        <label class="mr-4">
            <input onchange="toggleLoginType('password')" type="radio"
                name="login_type" value="password"
                {{ $selected_login_type == 'password' ? 'checked' : '' }}>
            Login with Password
        </label>

        <label>
            <input onchange="toggleLoginType('otp')" type="radio"
                name="login_type" value="otp"
                {{ $selected_login_type == 'otp' ? 'checked' : '' }}>
            Login with OTP
        </label>
    </div>

    <!-- Password Section -->
    <div class="password_section" style="display: {{ $selected_login_type == 'password' ? 'block' : 'none' }};">
        <div class="form-group position-relative">
            <label for="password_input">Enter Password</label>

            <input type="password" id="password_input" name="password"
                   class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                   placeholder="Password"
                   style="padding-right:40px;">

            <!-- Eye Icon -->
            <span class="togglePassword"
                  style="position:absolute; right:12px; top:38px; cursor:pointer; color:#666;">
                <i class="fa fa-eye" id="toggleEyeIcon"></i>
            </span>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <div class="mt-3 text-center">
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            </div>
        </div>
    </div>

    <!-- OTP Section -->
    <div class="otp_section" style="display: {{ $selected_login_type == 'otp' ? 'block' : 'none' }};">
        <div class="form-group">
            <label for="VerifyOtp">Enter OTP</label>

            <input type="text" name="otp" id="VerifyOtp"
                   class="form-control {{ $errors->has('otp') ? ' is-invalid' : '' }}"
                   placeholder="Enter OTP"
                   oninput="this.value = this.value.replace(/[^0-9]/g,'').slice(0,6);">

            @if ($errors->has('otp'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('otp') }}</strong>
                </span>
            @endif
        </div>

        @if (!old('otp'))
            <div class="text-center">
                <a id="get_otp_button" onclick="send_otp()"
                   style="color:#0066cc; cursor:pointer;">
                    <span style="display:none;" class="spinner-border spinner-border-sm"></span>
                    Get OTP
                </a>
            </div>
        @endif

        <div class="otp_success" style="{{ old('otp') ? 'display:block;' : 'display:none;' }};">
            <p class="success_messages">One Time Password Sent To Your Email & Phone No.</p>

            <p class="text-center">
                <a id="resend_otp" style="cursor:pointer;">
                    <span style="display:none;" class="spinner-border spinner-border-sm"></span>
                    <span style="color:#0066cc;">Resend OTP</span>
                </a>
            </p>

            <p id="resendOTPText"></p>
        </div>
    </div>

    <!-- FINAL LOGIN BUTTON -->
    <button type="submit" id="login" class="readon submit-btn w-100 mt-3"
        onclick="this.disabled=true; this.innerHTML='Processing...'; this.form.submit();">
    Log In
</button>

</form>


<!-- JS -->
<script>
function toggleLoginType(type) {
    const otpSection = document.querySelector('.otp_section');
    const passwordSection = document.querySelector('.password_section');
    const otpInput = document.getElementById('VerifyOtp');
    const passwordInput = document.getElementById('password_input');

    if (type === 'otp') {
        otpSection.style.display = 'block';
        passwordSection.style.display = 'none';
        otpInput.required = true;
        passwordInput.required = false;
    } else {
        otpSection.style.display = 'none';
        passwordSection.style.display = 'block';
        passwordInput.required = true;
        otpInput.required = false;
    }
}

// PASSWORD SHOW/HIDE
document.querySelector(".togglePassword").addEventListener("click", function () {
    const passwordInput = document.getElementById("password_input");
    const icon = document.getElementById("toggleEyeIcon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});
</script>
