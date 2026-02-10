@extends('frontend.layouts.main')
@section('title', 'Country, Program & University Selection')
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
                        <h1 class="fw-bold mx_rounded text-black">Country, Program & University Selection</h1>
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
                            <h4>Discover Your Path:Country, Program & University Selection</h4>
                            <p class="about-content">
                                Choosing the right country, program, and university is crucial for your academic journey. With partnerships with over 900+ universities and colleges worldwide, we at OEL are here to help you navigate this exciting decision-making process. </p>
                            <p>Our counselors evaluate student’s profile and provide recommendations on courses, colleges/universities and destinations suitable for them according to their interest, making it easier to choose a destination and a college. They give students choices that fit both, their career aspirations and budget.</p>

                            <h4>Why Choose OEL?</h4>
                            <ul>
                                <li>Expert Guidance: Our knowledgeable counselors stay up-to-date on global education trends, ensuring you receive the most relevant advice tailored to your needs.</li>
                                <li>Personalized Recommendations: We assess your unique profile to suggest programs and institutions that align with your interests, career goals, and budget.</li>
                            </ul>
                            <h4>Our Process</h4>
                            <ol>
                                <li>Profile Evaluation: Our counselors take the time to understand your aspirations and preferences, helping you identify the best-fit courses and universities.</li>
                                <li>Comprehensive Choices: We provide a range of options that balance your ambitions with financial considerations, making the selection process easier and more informed.</li>
                                <li>Eligibility Check: Once you’ve chosen a university, we ensure you meet all admission requirements, guiding you through the necessary steps for a smooth application process.</li>
                            
                            </ol>

                            <h6 style="font-weight: 600;">
                            Take the Next Step!

                            </h6>
                            <p>At OEL, we’re committed to helping you find the right path for your future. With our expert guidance, you’ll be empowered to make confident decisions that set you on the road to success.
                            </p>
                        <P> <strong><a href="{{ url('contact-us') }}">Enquire today</a></strong> and let’s embark on this journey together! </P>

                        </div>
                    </div>


                    @include('frontend.global.query')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection