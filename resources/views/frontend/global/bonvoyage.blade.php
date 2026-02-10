@extends('frontend.layouts.main')
@section('title', 'CBon Voyage')
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
                        <h1 class="fw-bold mx_rounded text-black"> Bon Voyage!</h1>
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

                    <div class="col-lg-8">

                        <div class="consultant-info-div ">
                            <h4>Cheers to Your Next Chapter:Bon Voyage</h4>
                            <P>As you embark on this exciting journey to study
                                abroad, we at OEL want to wish you a heartfelt Bon Voyage!
                                This is more than just a trip; it's an opportunity for personal
                                growth, cultural exploration, and academic achievement.</P>

                            <P>As you embark on this exciting journey to study abroad, we at OEL want to wish you
                                a heartfelt Bon Voyage! This is more than just a trip;
                                it's an opportunity for personal growth, cultural exploration, and academic achievement.</P>
                            <h4>Embrace the Journey</h4>

                            <P>Studying abroad will open doors to new experiences, friendships, and perspectives. Embrace each moment, from attending classes
                                and exploring your new city to immersing yourself in
                                different cultures. Every challenge you face is an opportunity to learn and grow.</P>
                            <h4>Stay Connected</h4>
                            <p>Remember, while you’re away, you’re never alone. OEL is here to assist you whenever
                                you need support or guidance. Don’t hesitate to reach out to us with any questions or concerns during your time abroad.</p>
                            <h4>We Can’t Wait to Hear Your Stories!</h4>
                            <p>As you set forth on this incredible journey, know that we are cheering for you! We can’t wait to hear about your experiences and the memories you’ll create. Safe travels, and Bon Voyage!</p>
                        </div>
                    </div>
                    @include('frontend.global.query')
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
