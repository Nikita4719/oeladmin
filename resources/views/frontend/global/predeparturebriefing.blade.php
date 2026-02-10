
@extends('frontend.layouts.main')
@section('title', "Pre Departure Briefing")
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
                        <h1 class="fw-bold mx_rounded text-black"> Pre-Departure Briefing Overview</h1>
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
                        <h4>Your Guide to a Smooth Transition:Pre Departure Briefing</h4>
                        <p class="about-content">
                       At OEL, we believe that thorough preparation is key to a successful
                       study abroad experience. Our Pre-Departure Briefing Sessions are designed to
                       equip students with essential information and insights before
                       they embark on their international journey.
                        </p>
<h4>Why Attend Our Pre-Departure Briefing?</h4>
<P>Studying abroad is an exciting adventure, but it 
can also be overwhelming. Our comprehensive sessions aim to alleviate
concerns and ensure you feel confident as you prepare for this significant
transition. Here’s what you can expect:</P>
<h4>Key Topics Covered</h4>
<ul>
    <ol>
        <li>Cultural Orientation
Learn about the culture, customs, and social norms of your host country. Understanding local etiquette and behaviors can enhance your experience and help you integrate smoothly.</li>
        <li>Practical Information
Receive vital information about your destination, including transportation options, local amenities, and safety tips. We cover everything from how to navigate public transport to finding essential services.</li>
        <li>Academic Preparation
Understand what to expect academically in your new environment. We discuss the education system, classroom dynamics, and how to adapt to different teaching styles.</li>
        <li>Health and Safety
Learn about health services available in your host country, as well as tips for staying safe. We also provide guidance on managing health insurance and accessing medical care.</li>
        <li>Financial Management
Get insights into budgeting for your time abroad, including tips on managing currency exchange and setting up a local bank account.</li>
        <li>Packing Essentials
Discover what to pack for your new adventure, including essential items you might overlook. We offer a comprehensive checklist to ensure you're fully prepared.</li>
        <li>Q&A Session
Have your questions answered by our experienced counselors. This interactive segment allows you to clarify any doubts and gather personalized advice.</li>
    
    </ol>
</ul>
<h4>Prepare with Confidence</h4>
<p>Our Pre-Departure Briefing Sessions are designed to provide you with the tools and knowledge needed to thrive in your new environment. By attending, you’ll gain valuable insights that will enhance your study abroad experience and help you navigate challenges effectively.</p>
<P>Ready to embark on your adventure?<a href="{{ url('contact-us') }}">Enquire today</a>  to learn more about our Pre-Departure Briefing Sessions and secure your spot!</P>
                        </div>
                    </div>
                @include('frontend.global.query')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
