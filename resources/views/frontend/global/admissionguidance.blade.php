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
                        <h1 class="fw-bold mx_rounded text-black"> University Application Assistance</h1>
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
                            <h4>University Application Assistance: Showcase Your Best Self!</h4>
                            <p class="about-content">
                                Your university application is your chance to tell your unique story! It reflects not just your academic achievements and interests, but also your personality and aspirations. Key elements like your Statement of Purpose (SOP), Letters of Recommendation (LOR), Motivation Letter, Resume, and essays provide universities with a glimpse into who you are and why you stand out. </p>
                            <h4>How We Work</h4>
                            <ul>
                                <li><h6 style="font-weight: 600;">Personalized Support:</h6> Our team is dedicated to helping you craft compelling documents that resonate with admissions committees. We’ll guide you in expressing your passion and potential effectively.</li>
                                <li><h6 style="font-weight: 600;">Quick Turnaround:</h6> We understand the importance of timely submissions. That’s why we aim to finalize and submit your application within 24 to 48 hours after confirming your eligibility.</li>
                            </ul>
                            <h4>Ready to Shine?</h4>
                            <P>Let us help you transform your application into a powerful reflection of your journey and goals. Together, we’ll ensure you’re ready to make a lasting impression!</P>
                            <P> <strong><a href="{{ url('contact-us') }}">Enquire today</a></strong> to kickstart your application process and take the next step towards your future! </P>


                        </div>
                    </div>


                    @include('frontend.global.query')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection