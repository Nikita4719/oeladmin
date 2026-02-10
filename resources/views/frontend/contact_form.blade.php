<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
<style>
    .select2-container {
        width: 100% !important;
        margin-bottom: 10px;
    }

    .iti {
        width: 100%;
    }

    input[name="phone"] {
        width: 100%;
    }
</style>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pb-5">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="universities_heading ">
                            <h3 class="fw-bold">Contact OEL</h3>
                            <p> We offer numerous way for you to connect with us.</p>
                        </div>
                        <div class="attractive-bar">
                            <img src="{{asset('frontend/img/contact1.jpg')}}" alt="gif">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="universities_heading ">
                            <p>Book your FREE consultation with Certified Counselors.</p>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                        <form id="contact-form" action="{{route('contact_us.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <!-- First Name -->
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control delete rounded" name="first_name" placeholder="First name" required>
                                    </div>

                                    <!-- Last Name -->
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control delete rounded" name="last_name" placeholder="Last name" required>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-12 mb-3">
                                        <input type="tel" id="phone" class="form-control delete rounded" name="phone_display" placeholder="Mobile Number" required  oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                                        <input type="hidden" id="phone-number" name="phone">
                                        <div id="phone-error" style="color: red; display: none;">Please enter a valid phone number.</div>
                                    </div>

                                    <!-- Load intl-tel-input -->
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

                                    <script>
                                        const phoneInput = document.querySelector("#phone");
                                        const hiddenPhone = document.querySelector("#phone-number");
                                        const phoneError = document.querySelector("#phone-error");
                                        const form = document.querySelector("#contact-form");

                                        const iti = window.intlTelInput(phoneInput, {
                                            initialCountry: "in",
                                            separateDialCode: true,
                                            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                                        });

                                        form.addEventListener('submit', function(e) {
                                            if (iti.isValidNumber()) {
                                                hiddenPhone.value = iti.getNumber(); // Full international format
                                                phoneError.style.display = "none";
                                            } else {
                                                e.preventDefault(); // Stop form submission
                                                phoneError.style.display = "block";
                                            }
                                        });
                                    </script>

                                    <!-- Study Destination -->
                                    <div class="col-12 mb-3">
                                        <select class="form-control delete rounded" name="preferred_study_destination" required>
                                            <option value="" disabled selected>Preferred Study Destination</option>
                                            @foreach(App\Models\Country::select('name', 'id')->where('is_active', 1)->get() as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Study Year -->
                                    <div class="col-12 mb-3">
                                        <select class="form-control delete rounded" name="preferred_study_year" required>
                                            <option value="" disabled selected>Preferred Study Year</option>
                                            @for($year = 2025; $year <= 2035; $year++)
                                                <option value="{{$year}}">{{$year}}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <!-- Study Intake -->
                                    <div class="col-12 mb-3">
                                        <select class="form-control delete rounded" name="preferred_study_intake" required>
                                            <option value="" disabled selected>Preferred Study Intake</option>
                                            <option value="Fall">Fall</option>
                                            <option value="Spring">Spring</option>
                                            <option value="Summer">Summer</option>
                                        </select>
                                    </div>

                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            By clicking you agree to our 
                                            <a href="{{url('/privacy-policy')}}" target="_blank">Privacy Policy</a> and 
                                            <a href="{{url('terms-and-conditions')}}" target="_blank">Terms & Conditions</a>
                                        </label>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="free-code text-center mt-3">
                                        <button class="apply-btn fn border-0 px-4 py-2" type="submit">Get Started for Free</button>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>