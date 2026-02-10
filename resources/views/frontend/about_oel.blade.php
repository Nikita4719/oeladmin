@extends('frontend.layouts.main')
@section('title', 'About Oel')
@section('content')
<section>
    <div class="university_title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-mg-12 col-xs-12 col-sm-12">
                    
                    <div class="universities_heading text-center">
                        <h1 class="fw-bold mx_rounded ">We are Overseas Education Lane</h1>
                        <P class="fw-medium text-black">
                            Empowering people around the world to study abroad and access the best education</P>
                    </div>
                </div>
                <div class="row my-lg-4">
                    <div class="col-lg-7  pe-lg-5">
                        <div class="over_edu_title">
                            <h2 class="fw-medium  text-uppercase">Overseas Education Lane</h2>
                            <P class="fw-bold">One of the biggest challenges students of tier 2 and tier 3 cities in India face is accessibility to quality international education unlike their counterparts in Metros and Tier 1 cities.</P>
                            <span class="fw-light">Overseas Education Lane, a venture of Ekon Solutions India Pvt
                                Ltd was
                                incepted to bridge this divide and provide equal opportunities of higher
                                education. We are a one-stop-solution, facilitating assistance to the students
                                and simplify the hassled process of college selection, admission, test, VISA and
                                Accommodation. We help students make the right choice when it comes to
                                pursuing education abroad.</sapn>
                                <br>
                                <sapn class="fw-light">
                                    Our innovative approach has filled this gap by making over 3000 global
                                    educational institutions and their programs accessible to the students living in
                                    smaller towns and cities. We’ve counseled and placed over 1000 students in
                                    some reputed institutions all over the world with 100% success rate.
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-5 ">
                        <di class="lane_edu_right">
                            <img src="{{asset('frontend/img/abotoel.png')}}" data-aos="fade-up"
                                data-aos-duration="3000" alt="edu">
                        </di>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="mission_title mt-5">
        <div class="container">
            <div class="row mt-lg-5">
                <div class="col-lg-5">
                    <div class="mission_title_img">
                        <img src="{{asset('frontend/img/miss.png')}}" data-aos="fade-up"
                            data-aos-duration="3000" alt="img">
                    </div>
                </div>
                <div class="col-lg-7 ps-lg-5">
                    <div class="mission_title_orgo1 over_edu_title">
                        <h2 class="fw-medium">MISSION</h2>
                        <span class="fw-light">To alleviate students' uncertainties by providing personalized counseling and guidance. We carefully analyze their interests and financial situations to recommend the most suitable courses and institutions. We strive to simplify the entire journey, from application submission to visa acquisition, ensuring a smooth and stress-free experience for every student.</span>
                    </div>
                    <div class="mission_title_orgo1 over_edu_title mt-lg-4">
                        <h2 class="fw-medium">VISION</h2>
                        <span class="fw-light">We envision a world where higher education abroad is attainable for everyone. For over a decade, we have dedicated ourselves to guiding individuals through the process of applying for international studies. Our commitment is to deliver comprehensive support and expert consultation, ensuring that every aspiring student receives the assistance they need to pursue their dreams of studying overseas.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.contact_form')


@endsection