@extends('frontend.layouts.main')
@section('title', 'Login')
@section('content')
<style>
    .form-control {
        width: 100% !important;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        margin-bottom: 5px;
    }

    .login_next_button {
        border: none;
        background: #112958;
        width: 100%;
        padding: 6px;
        border-radius: 6px;
    }

    login_next_button sapn {
        color: #fff
    }
</style>
<style>
    #google_sign_in>div:first-child {
        width: 100% !important;
    }

    .abcRioButtonContentWrapper {
        width: 100%;
    }

    .login_label {
        font-style: normal;
        font-weight: 600;
        font-size: 20px;
        line-height: 32px;
        text-align: center;
        margin-bottom: 20px;
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

    #password_section,
    #otp_section {
        display: none;
    }

    .google_sign_in_custom_button {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .google_sign_in_custom_button svg {
        margin-right: 10px;
    }

    .last-password {
        padding-top: 15px;
    }

    .last-password p {
        margin-bottom: 0 !important;
    }

    .main-part {
        padding: 20px;
        margin-right: 90px !important;
    }

    /*.noticedbg{background:#f9f8f8 url(/home/images/loginbg.jpg) no-repeat left !important; background-size:cover;}*/
    .noticedbg.noticed.\32 nd {
        background: #f9f8f8 url(frontend/images/n6.png) no-repeat left !important;
        background-size: cover;
    }

    .noticedbg.noticed.\33 3 {
        background: #f9f8f8 url(frontend/images/agnet2.png) no-repeat left !important;
        background-size: cover;
    }

    .noticedbg.noticed.\34 4 {
        background: #f9f8f8 url(frontend/images/cn2.png) no-repeat left !important;
        background-size: cover;
    }

        {
        background: #f9f8f8 url(frontend/images/agnet2.png) no-repeat left !important;
        background-size: cover;
    }

    .loginform {
        background: #fff;
        padding: 30px;
        border: 1px solid #cccccc;
        border-radius: 10px;
    }

    @media only screen and (max-width: 760px) {
        #otpDiv .radio label {
            text-align: left !important;
        }

        .main-part {
            padding: 0px;
            margin-right: 0px !important;
        }

        h2 {
            font-size: 27px !important;
        }

        .loginform {
            background: #fff;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 10px;
        }
    }

    .btn-become {
        background: #3567f1;
        border-radius: 5px;
        text-align: center;
        color: #fff;
        display: block;
        float: right;
        padding: 2px 8px;
        max-width: 100%;
        float: none;
    }

    /*
       CSS for the main interaction
       */
    .tabset>input[type="radio"] {
        position: absolute;
        left: -200vw;
    }

    .tabset .tab-panel {
        display: none;
    }

    .tabset>input:first-child:checked~.tab-panels>.tab-panel:first-child,
    .tabset>input:nth-child(3):checked~.tab-panels>.tab-panel:nth-child(2),
    .tabset>input:nth-child(5):checked~.tab-panels>.tab-panel:nth-child(3),
    .tabset>input:nth-child(7):checked~.tab-panels>.tab-panel:nth-child(4),
    .tabset>input:nth-child(9):checked~.tab-panels>.tab-panel:nth-child(5),
    .tabset>input:nth-child(11):checked~.tab-panels>.tab-panel:nth-child(6) {
        display: block;
    }

    /*
       Styling
       */
    .tabset>label {
        position: relative;
        display: inline-block;
        padding: 15px 15px 25px;
        border: 1px solid transparent;
        border-bottom: 0;
        cursor: pointer;
        font-weight: 600;
        color: #4c5669 !important;
    }

    .tabset>label::after {
        content: "";
        position: absolute;
        left: 15px;
        bottom: 10px;
        width: 69px;
        height: 4px;
        background: #8d8d8d;
    }

    .tabset>label:hover,
    .tabset>input:focus+label {
        color: #06c;
    }

    .tabset>label:hover::after,
    .tabset>input:focus+label::after,
    .tabset>input:checked+label::after {
        background: #06c;
    }

    .tabset>input:checked+label {
        /*border-color: #ccc;*/
        /*border-bottom: 1px solid #fff;*/
        margin-bottom: -1px;
    }

    .tab-panel {
        /*padding: 30px 0;*/
        border-top: 1px solid #ccc;
    }

    /*
       Demo purposes only
       */
    *,
    *:before,
    *:after {
        box-sizing: border-box;
    }

    .tabset {
        max-width: 100%;
        text-align: center;
        background: #f9f8f8;
        /*border-top: 1px solid #ccc;*/
        margin-top: 15px;
    }

    .lb {
        margin-bottom: 0px;
    }

    .lb {
        border-radius: 20px 1px 38px 23px;
        background: #f4f4f4;
        /*border: 1px solid #ccc !important;*/
        margin: 10px 35px;
        margin-bottom: 10px !important;
    }

    .tabset>label:hover,
    .tabset>input:focus+label {
        color: #0066cc !important;
    }

    /*
       .rs-login, .register-section { background:url(/home/images/banner_01.jpg); background-repeat: no-repeat;
       background-position: center; background-size: cover; position: relative; z-index:1;}
       */
    @media only screen and (max-width: 600px) {
        .lb2 {
            height: 24px !important;
        }
    }

    @media only screen and (max-width: 600px) {
        .noticedbg {
            background: none !important;
        }

        .noticedbg.noticed.\32 nd {
            background: none !important;
        }

        .noticedbg.noticed.\34 4 {
            background: none !important;
        }

        .noticedbg.noticed.\33 3 {
            background: none !important;
        }
    }
</style>
<section>
    <div class="tabing-tab">
        <div class=" ">
            <div class="cards ">
                <!-- <h2 class=" text-center p-3">Card with Tabs</h2> -->
                <nav class=" d-flex justify-content-center gap-r">
                    <div class="nav nav-tabs tabs-mp  mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link nav-con-link  active position-relative p-3 mt-3" id="nav-home-tab"
                            data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab"
                            aria-controls="nav-home" aria-selected="true">
                            <div class="st-title-login">
                                <img src="{{ asset('frontend/img/stu2.png') }}" alt="student">
                                <span>Student Login</span>
                            </div>
                        </button>
                        <button class="nav-link nav-con-link  position-relative p-3 mt-3" id="nav-profile-tab"
                            data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab"
                            aria-controls="nav-profile" aria-selected="false">
                            <div class="st-title-login">
                                <img src="{{ asset('frontend/img/fr.png') }}" alt="student">
                                <span>Franchise Agent Login</span>
                            </div>
                        </button>
                        <button class="nav-link nav-con-link  position-relative p-3 mt-3" id="nav-contact-tab"
                            data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab"
                            aria-controls="nav-contact" aria-selected="false">
                            <div class="st-title-login">
                                <img src="{{ asset('frontend/img/coun.png') }}" alt="student">
                                <span>Counselor Login</span>
                            </div>
                        </button>
                    </div>
                </nav>
                <div class="tab-content " id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                        aria-labelledby="nav-home-tab">
                        <div class="login-title-portal">
                            <div class="container">
                                <div class="login-bold-title">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="one-sight-bold">
                                                <img src="{{ asset('frontend/img/stu2.png') }}" alt="n6">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-app bg-white">
                                                <div class="st-lg-login ">
                                                    <h1>Student Login</h1>
                                                </div>
                                                <hr>
                                                @if (session('status'))
                                                <div class="alert alert-danger">
                                                    {{ session('status') }}
                                                </div>
                                                @endif

                                             @include('auth.loginform')
                                             <div class="last-password">
                                                <p>Not registered? <a href="{{ route('register') }}">Create an account</a></p>
                                            </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="studentloging-title">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 d-flex align-items-center justify-content-center">
                                        <div class="admission-login">
                                            <img src="{{ asset('frontend/img/stu.png') }}" class="w-100" alt="admission">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 ps-lg-5">
                                        <div class="student-loging-title--">
                                            <div class="lg-student-bt">
                                                <h2 class="text-center">Student</h2>
                                                <P>We are dedicated to advancing international higher education by offering exceptional counseling
                                                    services to students aspiring to study abroad. With over a decade of experience, we have consistently
                                                    provided the support and expert guidance essential for a successful overseas education journey. At Overseas
                                                    Education Lane (OEL), we simplify the process for students and individuals seeking global educational opportunities.</P>
                                                <P>We enhance admission processes by connecting international students, recruitment partners,
                                                    and academic institutions through a cohesive platform. Our ambition is to establish the largest
                                                    online hub for international student registration and educational assistance worldwide.

                                                </P>
                                                <P>Our educational programs are designed to seamlessly fit into students' work, personal commitments
                                                    , and academic goals. Depending on their aspirations,
                                                    students can select from a variety of options, including
                                                    certificate courses, diploma programs, specialized training, PG diplomas, or master’s degrees.

                                                </P>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="st-benifits">
                            <div class="container">
                                <div class="bn-part--student">
                                    <div class="bn--img ">
                                        <h2 class="text-center fw-bold">Benefits Offered to Students</h2>
                                    </div>
                                    <div class="bn-st--student d-flex gap-4 bg-white ">
                                        <div class="cn-counselling">
                                            <img src="{{ asset('frontend/img/counse.png') }}" alt="brand">
                                        </div>
                                        <div class="right-brand-st mt-2 py-lg-3 px-lg-4">
                                            <h3 class="fw-bold text-uppercase">COUNSELING</h3>
                                            <P>An overseas education advisor plays a vital role in guiding students through the application
                                                and paperwork process, ensuring a seamless experience. At OEL, we are recognized by various government
                                                regulatory bodies nationwide, which underscores our commitment to quality service. Our consultants collaborate closely with students and universities to facilitate admissions. They provide comprehensive support in areas such as profile evaluation, university selection, admission processing, and documentation. Additionally, our counselors
                                                assist in securing education loans when necessary and help you craft a compelling Statement of Purpose (SOP) or Letter of Recommendation (LOR).</P>
                                        </div>
                                    </div>
                                </div>
                                <div class="bn-part--student">
                                    <div class="bn-st--student d-flex gap-4 bg-white mt-5 flp ">
                                        <div class="cn-counselling">
                                            <img src="{{ asset('frontend/img/stu1.png') }}" alt="brand">
                                        </div>
                                        <div class="right-brand-st mt-2 py-lg-3 px-lg-4">
                                            <h3 class="fw-bold text-end text-uppercase">ADMISSION</h3>
                                            <P> Studying abroad offers a transformative opportunity for personal
                                                and professional growth. It allows you to immerse yourself in a new culture, forge lifelong
                                                friendships, and significantly enhance your global employability. While not every overseas college is
                                                prestigious, it’s important to navigate your options strategically to strengthen your resume. At OEL,
                                                our counselors help you identify the best-fit colleges and programs that align with your career aspirations,
                                                guiding you toward new heights in your professional journey.

                                            </P>
                                        </div>
                                    </div>
                                </div>
                                <div class="bn-part--student">
                                    <div class="bn-st--student d-flex gap-4 bg-white mt-5 ">
                                        <div class="cn-counselling">
                                            <img src="{{ asset('frontend/img/visaa.png') }}" alt="brand">
                                        </div>
                                        <div class="right-brand-st mt-2 py-lg-3 px-lg-4">
                                            <h3 class="fw-bold text-uppercase">VISA ASSISTANCE</h3>
                                            <P>Applying for a student visa involves several critical steps. We ensure that you are well-informed
                                                about the latest visa requirements and regulations. Our team helps simplify the process by assisting with document certification, translation, and submission. Whether you’re aiming for Australia, Ireland, Canada,
                                                New Zealand, the UK, the US or any other country, we support you throughout the entire visa application journey.
                                            </P>
                                        </div>
                                    </div>
                                </div>
                                <div class="bn-part--student">
                                    <div class="bn-st--student d-flex gap-4 bg-white mt-5 flp">
                                        <div class="cn-counselling">
                                            <img src="{{ asset('frontend/img/acco.png') }}" alt="brand">
                                        </div>
                                        <div class="right-brand-st mt-2 py-lg-3 px-lg-4">
                                            <h3 class="text-end fw-bold text-uppercase">ACCOMMODATION</h3>
                                            <P>Relocating to a new country, especially at a young age,
                                                can be daunting, and we recognize the importance of finding the right accommodation.
                                                Our counselors help students and their families choose housing options that best suit
                                                their needs. We take into account key factors such as safety, commuting time, affordability,
                                                quality of life, and college schedules when advising on on-campus or off-campus living arrangements.
                                                Additionally, we assist in locating areas within your chosen city that are welcoming to international students,
                                                ensuring a smoother transition to your new home.
                                            </P>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="login-title-portal">
                            <div class="container">
                                <div class="login-bold-title">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="one-sight-bold">
                                                <img src="{{ asset('frontend/img/agnet2.png') }}" alt="n5">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-app bg-white">
                                                @include('flash::message')
                                                <div class="st-lg-login text-center rounded mt-4 mb-4">
                                                    <h1>Franchise Login</h1>
                                                </div>
                                                <hr>
                                                @include('auth.loginform')
                                                <div class="last-password">
                                                <p>Not registered? <a href="{{ route('franchise-register') }}">Create an account</a></p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="studentloging-title">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 d-flex align-items-center justify-content-center">
                                        <div class="admission-login ">
                                            <img src="{{ asset('frontend/img/f1.png') }}" alt="admission">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 ps-lg-5">
                                        <div class="student-loging-title--">
                                            <div class="lg-student-bt">
                                                <h2 class="text-center">Seize the Market: Join the OEL Franchise Network</h2>
                                                <P class="text-start">India represents a significant opportunity in the overseas education sector. However, the complexities of launching a new business are often greater than simply starting a partnership office. Establishing a network of offices nationwide and achieving a widespread presence is a daunting task for large corporations and nearly impossible for medium and smaller enterprises. This unique business model allows equitable organizations to pursue national growth and effectively reach clients across all regions of the country.

                                                </P>
                                            </div>
                                            <div class="franchise-button text-center mt-2">
                                                <a href="{{ url('franchise-register') }}"> <button class=" border-0">Become Franchise</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="st-benifits">
                            <div class="container">
                                <div class="bn-part--student">
                                    <div class="bn--img ">
                                        <h2 class="text-center fw-bold">Franchise Benefits</h2>
                                    </div>
                                    <div class="main-brand  gap-5">
                                        <div class="bn-st--student d-flex  bg-white ">
                                            <div class="cn-counselling liabrary-size">
                                                <img src="{{ asset('frontend/img/Comprehensive Information Access.png') }}" alt="brand">
                                            </div>
                                            <div class="right-brand-st mt-2 py-lg-3 px-lg-4">
                                                <h3 class="fw-bold text-uppercase">Comprehensive Information Access</h3>
                                                <P>Franchisees gain exclusive access to a robust database featuring over
                                                    800+ colleges and more than 20,000+ programs. This resource includes presentations, learning materials
                                                    , and essential documentation needed for daily overseas enrollment activities.</P>
                                            </div>
                                        </div>
                                        <div class="bn-part--student mt-5">
                                            <div class="bn-st--student d-flex  bg-white  ">
                                                <div class="cn-counselling liabrary-size">
                                                    <img src="{{ asset('frontend/img/Revenue Potential.png') }}" alt="brand">
                                                </div>
                                                <div class="right-brand-st mt-2 py-lg-3 px-lg-4">
                                                    <h3 class="fw-bold text-uppercase ">Revenue Potential</h3>
                                                    <P>Our industry offers one of the highest returns on investment.
                                                        Franchisees receive timely commission payments following the successful enrollment of students in partner colleges.</P>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-brand  gap-5">
                                        <div class="bn-part--student">
                                            <div class="bn-st--student d-flex  bg-white mt-5 ">
                                                <div class="cn-counselling liabrary-size">
                                                    <img src="{{ asset('frontend/img/Operational Support.png') }}" alt="brand">
                                                </div>
                                                <div class="right-brand-st mt-2 py-lg-3 px-lg-4">
                                                    <h3 class="fw-bold text-uppercase">Operational Support</h3>
                                                    <P>We provide extensive support to franchisees, including hands-on training and onboarding
                                                        at our Noida headquarters. We assist with infrastructure setup, marketing strategies across various channels (including digital, social media,
                                                        and print), enrollment guidance, standardized procedures, operational guidelines, and ongoing updates</P>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bn-part--student">
                                            <div class="bn-st--student d-flex  bg-white mt-5 ">
                                                <div class="cn-counselling liabrary-size">
                                                    <img src="{{ asset('frontend/img/Holistic Client Management.png') }}"
                                                        alt="brand">
                                                </div>
                                                <div class="right-brand-st mt-2 py-lg-3 px-lg-4">
                                                    <h3 class=" fw-bold text-uppercase">Holistic Client Management</h3>
                                                    <P>We assist franchisees throughout the entire client
                                                        lifecycle, from lead management to college and program selection, admissions, applications,
                                                        and visa assistance, along with pre-departure orientations and additional value-added services.</P>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="login-title-portal">
                            <div class="container">
                                <div class="login-bold-title">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="one-sight-bold">
                                                <img src="{{ asset('frontend/img/cn2.png') }}" alt="n6">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-app bg-white">
                                                @include('flash::message')
                                                <div class="st-lg-login text-center rounded mt-4 mb-4">
                                                    <h1>Counselor Login</h1>
                                                </div>
                                                <hr>
                                                @include('auth.loginform')
                                                <div class="last-password">
                                                <p>Not registered? <a href="{{ url('counselor-register') }}">Create an account</a></p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="studentloging-title">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 d-flex align-items-center justify-content-center">
                                        <div class="admission-login">
                                            <img src="{{ asset('frontend/img/couns1.png') }}" width="400px" alt="admission">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 ps-lg-5">
                                        <div class="student-loging-title--">
                                            <div class="lg-student-bt">
                                                <h2 class="text-center">Join OEL: Empower Futures as a Counselor
                                                </h2>
                                                <P>Becoming a counselor at OEL offers you an incredible opportunity to
                                                    make a meaningful impact in the lives of students seeking international education.
                                                    As a part of our team, you will play a crucial role in guiding individuals through their
                                                    educational journeys, helping them navigate the complexities of studying abroad.
                                                </P>
                                                <P>At OEL, we provide comprehensive training and resources to empower you with the
                                                    knowledge and skills necessary for success. You’ll gain access to a wealth of information about global
                                                    educational institutions, programs, and application
                                                    processes, allowing you to offer personalized guidance to each student.
                                                </P>
                                                <P>Joining OEL as a counselor offers a unique blend of
                                                    personal fulfillment and financial rewards, with the flexibility to work
                                                    from any location, either online or offline. Whether you're a language
                                                    counselor helping students master communication, a career counselor guiding individuals toward their professional goals, an education counselor assisting in course and college selection, or an essay writing counselor shaping impactful admission essays, OEL provides a supportive platform for your growth. With competitive compensation,
                                                    performance-based bonuses, and the opportunity to work on your own terms, you'll not only help students achieve their dreams but also benefit from a rewarding career. </P>
                                                <P>If you’re passionate about helping students achieve their dreams
                                                    and are looking for a fulfilling career path, OEL is the perfect place
                                                    for you to thrive. Together, let’s empower the next generation of global learners!</P>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="st-benifits">
                            <div class="container">
                                <div class="bn-part--student">
                                    <div class="bn--img ">
                                        <h2 class="text-center fw-bold">Counselors for Every Path: Language, Career, Education, and More
                                        </h2>
                                    </div>
                                    <div class="bn-st--student d-flex gap-4 bg-white ">
                                        <div class="cn-counselling">
                                            <img src="{{ asset('frontend/img/LANGUAGE COUNSELLOR.png') }}" alt="brand">
                                        </div>
                                        <div class="right-brand-st mt-2 py-lg-3 px-lg-4">
                                            <h3 class="fw-bold text-uppercase">LANGUAGE COUNSELOR</h3>
                                            <P>Language counselors provide education to students in order to assist them understand the
                                                fundamentals of a specific language. They typically begin with the fundamentals of basic
                                                grammar and format, then progress to more complex stuff, eventually aiming to become
                                                comfortable speaking and understanding conversational conversations. They may deliver this
                                                instruction onsite in a classroom setting or remotely via a remote learning platform. They
                                                choose a curriculum, teach topics, and assess students' progress.</P>
                                        </div>
                                    </div>
                                </div>
                                <div class="bn-part--student">
                                    <div class="bn-st--student d-flex gap-4 bg-white mt-5 flex-row-reverse">
                                        <div class="cn-counselling">
                                            <img src="{{ asset('frontend/img/Career Counsellor.png') }}" alt="brand">
                                        </div>
                                        <div class="right-brand-st mt-2 py-lg-3 px-lg-4">
                                            <h3 class="fw-bold text-end text-uppercase">CAREER COUNSELOR</h3>
                                            <P>
                                                Career counselors are professionals dedicated to guiding individuals in selecting a
                                                career path and achieving their professional goals. They assist clients in entering the job market,
                                                transitioning between roles, and conducting job searches. These counselors work in diverse environments,
                                                including schools, government agencies, corporate settings, and community organizations. With the complexities of
                                                career choice, a career counselor provides valuable support to help individuals navigate their options and find fulfilling employment.
                                            </P>
                                        </div>
                                    </div>
                                </div>
                                <div class="bn-part--student">
                                    <div class="bn-st--student d-flex gap-4 bg-white mt-5 flex-row-reverse">
                                        <div class="cn-counselling">
                                            <img src="{{ asset('frontend/img/EDUCATION COUNSELOR.png') }}" alt="brand">
                                        </div>
                                        <div class="right-brand-st mt-2 py-lg-3 px-lg-4">
                                            <h3 class="fw-bold text-uppercase">EDUCATION COUNSELOR</h3>
                                            <P>Education counselors focus on providing guidance and career advice to
                                                students, helping them choose the right courses and colleges. They assist in addressing various academic
                                                challenges and support students in achieving their goals. Their primary responsibilities include aiding students
                                                in course selection, adapting to new educational environments, and planning for their future careers. Education counselors
                                                also monitor personal, social, and behavioral issues that may impact academic performance. This
                                                role is not just a job; it’s an opportunity to make a significant
                                                difference in students’ lives by helping them shape their futures.
                                                Each day brings new challenges and adventures in this rewarding career.</P>
                                        </div>
                                    </div>
                                </div>
                                <div class="bn-part--student">
                                    <div class="bn-st--student d-flex gap-4 bg-white mt-5 flex-row-reverse">
                                        <div class="cn-counselling">
                                            <img src="{{ asset('frontend/img/ESSAY WRITING COUNSELORS.png') }}"
                                                alt="brand">
                                        </div>
                                        <div class="right-brand-st mt-2 py-lg-3 px-lg-4">
                                            <h3 class="text-end fw-bold text-uppercase">ESSAY WRITING COUNSELORS</h3>
                                            <P>
                                                Admission essays are a critical component of the application process,
                                                allowing institutions to gain insight into a student's personality and aspirations.
                                                Essay writing counselors assist students in crafting impactful application essays that effectively
                                                communicate key messages, such as "How Studying Abroad Will Enhance My Academic Journey"
                                                or "Reasons for Choosing My Study Location." These counselors help students articulate their
                                                thoughts in a compelling manner, showcasing their unique
                                                qualities and potential throughout the writing process.
                                                <a href="{{route('register')}}">Login Counselors</a>
                                            </P>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection


@section('javascript_section')
    <script type="text/javascript">
        var account_type = '{{ Session::get('account_type') }}';
        if (account_type == 'agent') {
            $('#tab2').click();
        } else if (account_type == 'sub_agent') {
            $('#tab4').click();
        } else {
            $('#tab1').click();
        }

        function triggerGoogleLogin() {
            console.log("Loggin with Google !");
            document.getElementById("google_sign_in").click();
        }
        let buttons = document.querySelectorAll(".loading_button");
        for (let i = 0; i < buttons.length; i++) {
            let button = buttons[i];
            button.addEventListener("click", function() {
                button.firstElementChild.style.display = "inline-block";
            });
        }

        function toggleLoginType(type) {
            const passwordSections = document.getElementsByClassName("password_section");
            const otpSections = document.getElementsByClassName("otp_section");
            if (type === "password") {
                for (let i = 0; i < passwordSections.length; i++) {
                    passwordSections[i].style.display = 'block';
                }
                for (let i = 0; i < otpSections.length; i++) {
                    otpSections[i].style.display = 'none';
                }
            } else if (type === "otp") {
                for (let i = 0; i < passwordSections.length; i++) {
                    passwordSections[i].style.display = 'none';
                }
                for (let i = 0; i < otpSections.length; i++) {
                    otpSections[i].style.display = 'block';
                }
            }
        }

        toggleLoginType("{{ old('login_type') }}");
        window.onbeforeunload = function(e) {
            gapi.auth2.getAuthInstance().signOut();
        };
        let email = "";
        let name = "";
        let flag = false;
        let profile_id = "";
        let image_url = "";

        let element = document.getElementById("google_sign_in");

        function authenticate() {
            console.log("ok");
            if (email == "") {
                return;
            }
            let message = document.getElementById("google_login_error");
            $.ajax({
                type: 'POST',
                url: "/login_with_google",
                data: {
                    profile_id: profile_id,
                    name: name,
                    email: email,
                    image_url: image_url,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == true) {
                        console.log(data);
                        window.location.href = data.link;
                    } else {
                        message.style.display = "block";
                        message.textContent = "User not registered !";
                    }
                },
                error: function(data) {

                }
            });
        }
        if (element) {
            element.addEventListener("click", function(event) {
                if (flag == false) {
                    flag = true;
                }
            })
        }


        function onSignIn(googleUser) {
            console.log("ok");
            var profile = googleUser.getBasicProfile();
            email = profile.getEmail();
            name = profile.getName();
            profile_id = profile.getId();
            image_url = profile.getImageUrl();
            if (flag == true) {
                authenticate();
            }
        }

        function send_otp() {
            $('.otp_failed').text('');
            $('.otp_failed').hide();
            var email = $('#email').val();
            $.ajax({
                type: 'GET',
                url: "{{ url('login/send-otp') }}",
                data: {
                    email: email
                },
                //dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    toggleLoginType('otp');
                    if (data == "Email Not Registered") {
                        document.getElementById("get_otp_button").firstElementChild.style.display = "none";
                        document.querySelector(".otp_failed").textContent = data;
                        $('.otp_failed').show();
                        $('.sub_dis').html('Send OTP');
                        $('.sub_dis').removeAttr("disabled");
                        return;
                    }
                    document.getElementById("get_otp_button").style.display = "none";
                    $('.otp_success').css("display", "block");
                    $('#otpDiv').show();
                    $('#send_otp').replaceWith(
                        '<button type="submit" class="btn btn-primary" id="login">Log In</button>');

                    // Resend OTP --
                    let resend_otp = document.getElementById("resend_otp");
                    let resendOTPText = document.getElementById("resendOTPText");

                    $('.otp_success').css("display", "block");
                    resend_otp.style.display = "none";
                    resendOTPText.style.display = "block";

                    let seconds = 15;
                    resendOTPText.innerHTML = "Resend OTP after " + seconds + " Seconds";
                    let interval = setInterval(function() {
                        resendOTPText.innerHTML = "Resend OTP after " + seconds + " Seconds";
                        seconds--;
                        if (seconds == -1) {
                            resend_otp.style.display = "block";
                            resendOTPText.style.display = "none";
                            resendOTPText.innerHTML = "";
                            clearInterval(interval);
                        }
                    }, 1000);

                },
                error: function() {
                   
                    document.getElementById("send_otp").firstElementChild.style.display = "none";
                    $('.otp_failed').text('Error in sending OTP');
                    $('.otp_failed').show();
                    $('.sub_dis').html('Send OTP');
                    $('.sub_dis').removeAttr("disabled");
                }
            });
        }
        $('#resend_otp').click(function(e) {
            $('.otp_failed').text('');
            $('.otp_failed').hide();
            e.preventDefault();
            var email = $('#email').val();
            $(".success_messages").css("display", "none");
            $.ajax({
                type: 'GET',
                url: "{{ url('login/send-otp') }}",
                data: {
                    email: email
                },
                //dataType: 'JSON',
                success: function() {
                    $(".success_messages").css("display", "block");
                    $('.otp_success').css("display", "block");
                    $('#otpDiv').show();
                    $('#send_otp').replaceWith(
                        '<button type="submit" class="btn btn-primary btn-lg" id="login">Log In</button>'
                    );

                    let seconds = 15;

                    // Resend OTP --
                    let resend_otp = document.getElementById("resend_otp");
                    let resendOTPText = document.getElementById("resendOTPText");

                    document.getElementById("resend_otp").firstElementChild.style.display = "none";
                    $('.otp_success').css("display", "block");
                    resend_otp.style.display = "none";
                    resendOTPText.style.display = "block";
                    resendOTPText.innerHTML = "Resend OTP after " + seconds + " Seconds";

                    let interval = setInterval(function() {
                        resendOTPText.innerHTML = "Resend OTP after " + seconds + " Seconds";
                        seconds--
                        if (seconds == -1) {
                            resend_otp.style.display = "block";
                            resendOTPText.style.display = "none";
                            clearInterval(interval);
                        }
                    }, 1000);

                },
                error: function() {
                    $(".success_messages").css("display", "block");
                    document.getElementById("resend_otp").firstElementChild.style.display = "none";
                    $('.otp_failed').text('Error in sending OTP');
                    $('.otp_failed').show();
                    $('.sub_dis').html('Send OTP');
                    $('.sub_dis').removeAttr("disabled");
                    // bootbox.alert('{{ __('There is a temporary error sending OTP please try later') }}');
                }
            });
        });
        $(document).ready(function() {
            $(document).on('click', '.sub_dis', function() {
                $('.sub_dis').html('<i class="fa fa-spinner fa-spin"></i> Send OTP');
                $('.sub_dis').attr('disabled', 'disabled');

            });
        });
        $(".login_next_button").on('click', function(event) {
            $(".otpDiv").show();
            setTimeout(function() {
                $(".login_next_button").attr("type", 'submit');
            }, 1000);
        });
    </script>
   <script>
    document.querySelectorAll('.togglePassword').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const passwordInput = this.closest('.form-group').querySelector('.password_input');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            this.innerHTML = type === 'password'
                ? '<i class="fa fa-eye"></i>'
                : '<i class="fa fa-eye-slash"></i>';
        });
    });
</script>
@endsection