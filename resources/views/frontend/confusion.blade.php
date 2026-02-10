@extends('frontend.layouts.main')
@section('title', 'CBon Voyage')
@section('content')
<section>
    <div class="canva-title" id="canva-title">
        <div class="canva-heading mt-5 mb-5">
            <h1 class="text-center fw-bold">Clearing the Confusion About Studying Abroad <br>
                Your Path to Global Education</h1>
        </div>
        <div class="section-canva">
            <div class="row">
                <div class="col-lg-6">
                    <div class="Destination-title">
                        <h2 class=" fw-bold">
                            Clearing the Confusion About
                            Studying Abroad
                        </h2>
                        <li class="mt-4 mb-4 fw-bold">How to Choose the Right Destination and
                            Course?</li>
                    </div>
                    <div class=" dilemmas-title">
                        <p>One of the biggest dilemmas students face is deciding where to study. Each country offers different benefits. The U.S. is known for its world-class universities and cutting-edge technology programs, while Europe provides affordable tuition and rich cultural experiences. Meanwhile, countries like Australia and Canada are popular for their quality of life and welcoming environment for international students.</p>
                        <p>Choosing the right course is equally important. It should align with your career goals and personal interests, as well as consider job prospects post-graduation. While this decision can be overwhelming, researching universities, understanding program strengths, and seeking professional advice can make the process smoother.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="dt-canva">
                        <img src="{{asset('frontend/img/see.jpg')}}" alt="see">
                    </div>
                </div>
                <div class="col-lg-6 mt-5">
                    <div class="dt-canva">
                        <img src="{{asset('frontend/img/see2.jpg')}}" alt="see">
                    </div>
                </div>
                <div class="col-lg-6 mt-5">
                    <div class="Destination-title">
                        <h2>
                            Navigating the Application Process and
                            Adapting to a New Culture
                        </h2>
                        <p>The application process involves standardized tests, language proficiency exams, and visa procedures—each with its own set of rules depending on the country. Though it might seem daunting, a step-by-step approach can make it manageable.

                            Living in a new country can also bring its share of worries. Adapting to a different culture, learning new customs, and dealing with homesickness are common concerns. However, studying abroad offers opportunities for personal growth, building resilience, and expanding your worldview.</p>
                    </div>
                    <div class=" dilemmas-title">
                        <p>At Overseas Education Lane, we are here to simplify the process. From helping you select the right destination to guiding you through applications and settling into your new environment, we ensure your study abroad journey is smooth and successful. Let us help you clear the confusion and take the next step toward your global future!.</p>
                    </div>
                </div>
                <!--<div class="free-consultation-title mt-5">-->
                <!--    <h2 class="text-center fw-bold">Book your <span> FREE consultation </span> with Certified Counsellors.</h2>-->
                <!--</div>-->
               @include('frontend.contact_form')

            </div>
        </div>
    </div>
</section>
@endsection