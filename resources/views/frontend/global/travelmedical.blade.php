@extends('frontend.layouts.main')

@section('title', "OverseasEducationLane")
@section('content')


<style>
    .search-slt {
        display: block;
        width: 100%;
        font-size: 0.875rem;
        line-height: 1.5;
        color: #55595c;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        height: calc(3rem + 2px) !important;
        border-radius: 0;
    }

    /*--------*/
    .consultant-info-div ul {
        list-style: circle;
        padding-left: 20px;
    }

    .consultant-info-div label {
        display: block;
        font-size: 14px;
        color: #9b9b9b;
        font-weight: 500;
    }

    .consultant-info-div span {
        color: #4a4a4a;
        font-weight: 500;
        font-size: 16px;
    }

    .consultant-image {
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto;
        width: 180px;
        height: 180px;
    }

    textarea {
        height: 100px !important;
    }
</style>
<!-- body content start here -->

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-course-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <!-- <img src="{{asset('frontend/img/2 (1).jpg')}}" alt="meet"> -->
            <!-- <img src="{{asset('frontend/pages/faq/faq_banner.jpg')}}" alt="Breadcrumbs Image"> -->
        </div>
        <!-- <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Travel & Medical Insurance</h1>


        </div> -->
        <div class="universities_heading text-center">
            <h1 class="fw-bold mx_rounded text-black"> Travel Arrangements & Medical Insurance</h1>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- About Section Start -->
    <div id="rs-about" class="rs-popular-courses style3 pb-40 pt-100 md-mt--140 md-pt-70 md-pb-30">
        <div class="container">
            <div class="row">

                <div class="col-md-8">


                    <p><b>Travel Smart:</b>
                    Comprehensive Support for Your Journey and Health Insurance, Or
                    Travel Prepared: Complete Support for Your Journey and Medical Insurance Needs

                    Embarking on your study abroad journey is an exciting step toward achieving your academic and career goals. At OEL, we offer comprehensive support for travel arrangements and medical insurance, ensuring a smooth transition to your new adventure.
                    .</p>

                    <p><b>Travel Arrangements Made Easy
                        </b> <br>
                        Planning your travel can be a complex task, but we’re here to simplify the process</p>

                    <p><b>Our team provides guidance on</b> <br>
                        <b> Flight Booking:</b> We assist you in finding the best flight options tailored to your schedule and budget. Our experts will help you compare prices and choose the most convenient routes.
                    </p>
                    <p><b>Travel Documentation:</b> Ensure you have all the necessary documents ready, including your passport, visa, and admission letters.
                        We guide you through the documentation process, making sure everything is in order before you depart.</p>

                    <p><b>Airport Transfers:</b>
                    We can help arrange transportation from the airport to your accommodation, providing you with peace of mind as you arrive in a new country.
                        Medical Insurance Guidance


                        Health and safety are paramount when studying abroad. We assist you in navigating the medical insurance landscape, ensuring you have the right coverage for your needs:
                        Understanding Insurance Options: We explain different types of medical insurance plans available to international students, helping you choose one that best fits your
                        requirements.
                    </p>
                    <p><b>Policy Selection:</b>
                    Our counselors will guide you in selecting a policy that covers essential services such as hospitalization, outpatient care, and emergency services.
                    </p>
                    <p><b>Claims Assistance:</b>
                    If you encounter any health issues while studying abroad, we provide support in understanding how to file claims and access medical services.


                    </p>
                    <p><b>Emergency Contacts:</b>
                    We equip you with a list of emergency contacts, including local hospitals and clinics, so you’re prepared for any situation.</p>
                    <p><b>Start Your Journey with Confidence:</b>
                    At OEL, we believe that thorough preparation is key to a successful study abroad experience. Our dedicated support for travel arrangements and medical insurance ensures you can focus on your studies and enjoy your time in a new country.


                    </p>
                    <p>Ready to take the next step? <a href=" {{ url('contact-us') }}"><strong> Enquire today </strong></a>to learn more about our travel and medical insurance assistance, and let us help you embark on your dream journey! </p>




                    <!--

							<div class="consultant-info-div ">
							<h4>Travel & Medical Insurance</h4>
							<p class="about-content">
							OEL provide travel insurance for student who are going for study in foreign country.it provide coverage against medical expenses, baggage-related risk, stay disruption and other travel-related risk that students may face during their trip. <br>
OEL travel insurance policy comes loaded with unique features such as policy extension and auto renewal facilities. <br>
The coverage under student travel insurance plan not just aids students to pay their hospital and medical bills, but also takes care of visits from Family in case of emergency hospitalization and medical evaluation
							</p>
                            <u>Why do you Need Student Travel Insurance?</u>
                            <p>If you are studying abroad and living alone, there might be possibilities for things to go wrong and you would require support or a back-up to tackle the situation.<br>
Students living outside India may also have visitor from their Families during an emergency medical condition, which require financial back up as well. <br>
Student travel insurance cover all such eventualities and ensures that you don't have to bear the out of the packet expense.</p>

              <h5><u>Other Than these, student travel insurance comes in handy in covering those non-medical expense as well such as:</u></h5>
                            <p><b>Expense arising out of emergency hospitalization due to an accident or illness
Unfortunate events like loss of checked –in baggage etc.</b></p>
                            <ul>
                            <li>Bail bonds and tuition fee.</li>
                            <li>Delay in take-off or cancellation of flight.</li>
                            <li>Loss of Passport</li>
                            <li>Compassionate visit</li>
                            <li>Bail Bond cover</li>

                            </ul>


							</div>
							-->
                </div>

                @include('frontend.global.query')
            </div>
        </div>
    </div>
    <!-- About Section End -->

</div>


@endsection