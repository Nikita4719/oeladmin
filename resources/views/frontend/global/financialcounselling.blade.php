@extends('frontend.layouts.main')
@section('title', "Financial Counseling")
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
                        <h1 class="fw-bold mx_rounded text-black">Financial Counseling for Studying Abroad</h1>
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

                        <h4>Financial Counseling</h4>
                        <p>Studying abroad is an exciting opportunity, but understanding the financial implications is crucial for a successful experience. At OEL, we provide comprehensive financial counseling to help you navigate the costs associated with your international education and make informed decisions.</p>
                        <h4>Why Financial Counseling Matters</h4>
                        <P>Investing in education abroad involves various expenses, including tuition, living costs, travel, and insurance. Our financial counseling services are designed to help you create a clear financial plan that aligns with your academic goals, ensuring you can focus on your studies without financial stress.</P>
                        <h4>Our Services</h4>

                        <ol>
                            <li>Cost Assessment: We help you analyze the total cost of studying abroad, including tuition fees, accommodation, daily living expenses, and additional costs, so you have a complete understanding of your financial needs.</li>
                            <li>Budget Planning: Our experts will assist you in creating a realistic budget tailored to your lifestyle and needs. We’ll provide tips on how to manage your finances effectively while studying overseas..</li>
                            <li>Scholarship and Grant Guidance: Discover various scholarship and grant opportunities available for international students. We’ll guide you through the application process to increase your chances of securing funding.</li>
                            <li>Loan Assistance: If you’re considering educational loans, we can help you explore options, understand repayment plans, and identify the best financial products suited to your situation.</li>
                            <li>Financial Aid Resources: Stay informed about available financial aid options from universities and external organizations. Our team will provide resources and support to help you access these funds.</li>
                            <li>Crisis Management: Unexpected financial challenges can arise while studying abroad. We offer strategies and resources to help you manage any financial crises effectively.</li>
                        </ol>

                        <h4>Your Financial Journey Starts Here</h4>
                        <p>At OEL, we believe that financial planning is key to a successful study abroad experience. Our dedicated counselors are here to support you in making informed financial decisions that empower you to focus on your education and future.</p>
                        <P>Ready to take control of your finances for studying abroad?<a href="{{ url('contact-us') }}"><strong> Enquire today </strong></a>to schedule a consultation and start planning your financial journey!</P>
                       
                    </div>


                      @include('frontend.global.query')

                </div>
            </div>
        </div>
    </div>
</section>
@endsection