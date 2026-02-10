@extends('frontend.layouts.main')

@section('title', "Visa Interview Assistance")
@section('content')
<section>
    <div class="university_title ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="university_airplane d-flex justify-content-center ">
                        <!-- <img src="{{asset('frontend/img/gif in blue (1)_1 1.png')}}" alt="gif"> -->
                    </div>
                    <div class="universities_heading text-center">
                        <h1 class="fw-bold mx_rounded text-black">Visa Application & Interview Assistance</h1>
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

                        <p>Navigating the visa application process can be a complex and often daunting
                            task for students aspiring to study abroad. At OEL, we provide comprehensive Visa
                            Application and Interview Assistance to ensure you’re well-prepared and confident every step of the way.</p>
                        <h4>Why Visa Assistance Is Essential</h4>
                        <p>Securing a student visa is a crucial part of your journey to studying
                            overseas. It requires careful attention to detail, proper documentation, and an understanding of
                            the specific requirements of your destination country. Our goal is to simplify this process for you, so you
                        <h4>Our Services</h4>
                        <ol>
                            <li> <strong>Personalized Consultation:</strong> Our experienced counselors will guide you through the visa application process, offering tailored advice based on your specific situation and the requirements of your chosen country.</li>
                            <li><strong>Document Preparation:</strong> We assist you in gathering and organizing all necessary documents, including application forms, financial statements, admission letters, and proof of accommodation, ensuring everything is in order for submission.</li>
                            <li><strong>Interview Preparation:</strong> Preparing for a visa interview can be nerve-wracking. We provide mock interview sessions to help you practice common questions, improve your confidence, and present your case effectively.</li>
                            <li><strong>Timeline Management:</strong> We help you establish a clear timeline for your visa application process, ensuring you meet all deadlines and submit your application in a timely manner.</li>
                            <li><strong>Updates on Regulations</strong>: Visa regulations can change frequently. Our team stays up-to-date on the latest immigration policies and requirements to provide you with accurate and relevant information.</li>
                            <li><strong>Ongoing Support:</strong> From the initial consultation to the day of your interview, we’re here to answer your questions and provide continuous support throughout the visa application process.</li>
                        </ol>
                        <h4>Start Your Journey with Confidence</h4>
                        <P>With OEL's Visa Application and Interview Assistance,
                            you can navigate the complexities of the visa process with ease.
                            We’re committed to helping you secure your student visa so you can embark on your
                            international education journey without worry.</P>
                        <p>Ready to begin?
                            <a href=" {{ url('contact-us') }}"><strong> Enquire today </strong></a>
                            to learn more about our visa assistance services and take the first step toward your future  and start planning your financial journey!
                        </p>
                        

                    </div>


                    <div class="col-md-4">
                        <div class="expert-form">
                            <div class="exp-header mb-25">
                                <h5>Quick Query</h5>
                                <p class="dis">I can help you with your admission to University of York today.</p>
                            </div>
                            <hr>
                            <div class="exp-form mt-25">



                                <form id="application_guidance" method="post" action="https://laravel.overseaseducationlane.com/submitApplicationGuidance">
                                    <input type="hidden" name="_token" value="OiZlEqsWolgvIMb5v0gTnZgWr970tUqRO4HRocY7">
                                    <div class="row">
                                        <div class="col-md-12 mb-25">
                                            <input class="from-control" type="text" id="agfirst_name" name="agfirst_name" placeholder="First Name *" value="" required="">
                                        </div>
                                        <div class="col-md-12 mb-25">
                                            <input class="from-control" type="text" id="aglast_name" name="aglast_name" placeholder="Last Name *" required="" value="">
                                        </div>
                                        <div class="col-md-12 mb-25">
                                            <input class="from-control" type="text" id="agemailId" name="agemailId" placeholder="Email ID *" required="" value="">

                                        </div>

                                        <div class="col-md-12 mb-25">
                                            <input class="from-control" type="text" id="agMobileno" name="agMobileno" placeholder="Mobile Number *" required="" value="">


                                        </div>
                                        <div class="col-md-12 mb-25">
                                            <textarea row="10" class="from-control" id="agMessage" name="agMessage" placeholder=" Message"></textarea>
                                        </div>

                                        <input type="hidden" name="source" value="website">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn nillp mt-4">Submit</button>

                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection