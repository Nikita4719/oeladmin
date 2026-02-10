@extends('frontend.layouts.main')
@section('title', 'Meet OEL Counselors')
@section('content')
<section>
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-course-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset('frontend/img/2 (1).jpg')}}" alt="meet">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Meet OEL Counselors ...</h1>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="university_title ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="university_airplane d-flex justify-content-center ">
                        <!--<img src="{{asset('frontend/img/gif in blue (1)_1 1.png')}}" alt="gif">-->
                    </div>
                    <div class="universities_heading text-center">
                        <h1 class="fw-bold mx_rounded text-black">Personalized Counseling for Your International Study Journey</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="quick_selection_title  mt-5">
        <div class="rs-inner-blog orange-color">
            <div class="container">
                <div class="row">

                    <div class="col-md-8">

                        <div class="consultant-info-div ">
                            <h4>Meet Counselors </h4>
                            <p>Counseling for studying abroad involves a specialized overseas education expert guiding students in
                                evaluating their options, developing a tailored plan, and selecting the ideal program to achieve their dream
                                of studying overseas. This initial step is crucial, as it provides clarity to students,
                                especially those fresh out of
                                school or college. It empowers them to identify the best universities and academic
                                destinations aligned with their individual aspirations.</p>

                            <p>At OEL, our dedicated and experienced counselors streamline this process,
                                drawing on their extensive knowledge in the field. Through one-on-one consultations,
                                they gain insight into each student’s interests, enabling them to recommend suitable
                                courses and destinations that match their inclinations. </p>

                            <p>Since our inception, our counselors have successfully guided over 10,000+ students,
                                opening pathways to high-quality education and promising careers abroad.
                            </p>

                            <p>To reach counselors at OEL, you can simply Call/WhatsApp/Mail to Overseas education Lane. We
                                will provide the best counseling to you with all options.</p>


                        </div>

                        <div class="conseller-title">
                            <h1 class="text-center my-4">Choose Your Counselor Today</h1>
                            <div class="counseller-image-section mb-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="counseller-discuss">
                                            <img src="{{asset('frontend/img/Group 179.png')}}" alt="counseller">
                                        </div>

                                        <div class="name-text-number mt-3 ">
                                            <div class="shubh-name">
                                                <p class="fw-bold">Ms. Methy </p>
                                                <p class="fw-bold ">Language Trainer </p>
                                                <p class="fw-light ">Certified IELTS Trainer with 7 years of industry experience. </p>

                                            </div>
                                            <div class="m-no">
                                                <a href="tel:8929922525">
                                                    <p class="fw-bold">Contact Now</p>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="counseller-discuss">
                                            <img src="{{asset('frontend/img/Group 180.png')}}" alt="counseller">
                                        </div>

                                        <div class="name-text-number mt-3 ">
                                            <div class="shubh-name">
                                                <p class="fw-bold ">Mr. Thomas</p>

                                                <p class="fw-bold">Education Counselor</p>
                                                <p class="fw-light ">UK Education Specialist, British Council certified with 3 years of experience.</p>
                                            </div>
                                            <div class="m-no">
                                                <a href="tel:8929922525">
                                                    <p class="fw-bold">Contact Now</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="counseller-discuss">
                                            <img src="{{asset('frontend/img/Group 181.png')}}" alt="counseller">
                                        </div>
                                        <div class="name-text-number mt-3 ">
                                            <div class="shubh-name">
                                                <p class="fw-bold">Mr. David</p>

                                                <p class="fw-bold">Visa Consultant</p>
                                                <p class="fw-light">Visa Application Specialist with 4 years of experience in securing student visas.

                                                </p>
                                            </div>
                                            <div class="m-no">
                                                <a href="tel:8929922525">
                                                    <p class="fw-bold">Contact Now</p>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('frontend.global.query')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection