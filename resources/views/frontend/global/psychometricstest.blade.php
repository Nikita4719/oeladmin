@extends('frontend.layouts.main')
@section('title', 'Psychometricstest')
@section('content')
<section>
    <div class="university_title ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="university_airplane d-flex justify-content-center ">
                        <!--<img src="{{asset('frontend/img/gif in blue (1)_1 1.png')}}" alt="gif">-->
                    </div>
                    <div class="universities_heading text-center">
                        <h1 class="fw-bold mx_rounded text-black">Psychometrics Test</h1>
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
                <div class="row clearfix">
                    <!-- Content Column -->
                    <div class="col-lg-8 md-mb-50">
                        <h4>Unlock Your Potential with Our Psychometric Test!</h4>
                        <p>Are you ready to discover your unique strengths and interests? Our Psychometric Test is a specially designed
                            tool that goes beyond traditional
                            assessments to provide a comprehensive look at your abilities, personality traits, and passions.</p>

                        <h4>Why Take the Psychometric Test?</h4>
                        <ul>
                            <li><strong>Personalized Insights:</strong> Gain a deeper understanding of your mindset and natural inclinations.</li>
                            <li><Strong>Identify Strengths:</Strong> Learn about your key skills and how they can guide your future choices.</li>
                            <li> <strong>Explore Interests:</strong> Uncover fields and subjects that truly excite you, opening doors to new opportunities.</li>
                        </ul>

                        <h4>How It Works</h4>
                        <p>Our experienced counselors will guide you through the process, ensuring
                            you feel comfortable and supported every step of the way. After completing the
                            test, you'll receive a detailed analysis that highlights
                            your potential and suggests courses and career paths that align with your unique profile.</p>
                        <h4>Your Journey Starts Here</h4>
                        <P>Empower yourself with knowledge! Taking the Psychometric Test is your
                            first step toward a fulfilling academic and professional future. Ready to embark on this journey of self-discovery?</P>
                        <P> <strong><a href="{{ url('contact-us') }}">Enquire today</a></strong> to schedule your test and unlock the doors to your future!</P>

                    </div>

                    <!-- Video Column -->
                    @include('frontend.global.query')
                </div>

            </div>
        </div>
    </div>
</section>
@endsection