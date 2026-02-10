@extends('frontend.layouts.main')
@section('title', "Foreign Exchange")
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
                        <h1 class="fw-bold mx_rounded text-black">Forex Assistance for Students Studying Abroad</h1>
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
                            <h4>Foreign Exchange</h4>
                            <p class="about-content">
                                Managing finances effectively while studying abroad is essential, and understanding
                                foreign exchange (FOREX) is a key part of that process. At OEL, we provide tailored Forex
                                assistance to help students navigate currency exchange and optimize their financial
                                resources during their international studies.
                            </p>
                            <h4>Why Forex Assistance Matters</h4>
                            <p>Studying in a foreign country often involves dealing with different
                                currencies, which can be confusing and costly without the right knowledge.
                                Our Forex assistance ensures you make informed decisions, saving you time and money.</p>
                            <h4>Our Forex Services</h4>
                            <ol>

                                <li>Currency Exchange Guidance We help you understand the best times and methods for exchanging your currency to maximize value. Our team provides insights into current exchange rates andtrends to help you make strategic decisions
</li>
                                <li>Setting Up a Foreign Currency Account
                                    We guide you through the process of opening a foreign currency account, allowing you to manage your funds more efficiently and reduce conversion fees while studying abroad.</li>
                                <li>Transfer Options
                                    Learn about different methods for transferring money internationally, from bank transfers to online platforms. We help you compare options to find the most cost-effective and reliable solutions.</li>
                                <li>Financial Planning Workshops
                                    Participate in our workshops that cover essential topics related to Forex, including currency risks, budgeting strategies, and effective money management while studying abroad.</li>
                                <li>Ongoing Support
                                    Our team is available to answer your questions and provide ongoing support as you navigate the financial aspects of studying in a different country.</li>
                            </ol>
                            <h4>Start Your Financial Journey with Confidence</h4>
                            <p>At OEL, we understand the importance of managing your finances while studying abroad. Our Forex assistance equips you with the knowledge and tools you need to handle currency exchange effectively, allowing you to focus on your studies and enjoy your international experience.</p>
                            <p>Ready to learn more about our Forex assistance? <a href="{{ url('contact-us') }}">Enquire today</a> to discover how we can support your financial journey while studying abroad!</p>
                        </div>
                    </div>

                    @include('frontend.global.query')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection