@extends('frontend.layouts.main')
@section('title', "OverseasEducationLane")
@section('content')


<!-- Services Section Start -->
<div class="rs-subject style1">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="subject-wrap bgc1">
                    <a href="{{ url('quick_search?recommended_sort=&search_education_level=1&search_tution_fees=100000&search_program_intake=&exam_type%5B%5D=&exam_date%5B%5D=&listening_score%5B%5D=&writing_score%5B%5D=&reading_score%5B%5D=&speaking_score%5B%5D=&last_education_level=&education_country=&grading_scheme_id=&search_min_gpa=') }}">
                        <img src="{{asset('public/home/images/subject/icons/1.png')}}" alt="">
                    <h4 class="title">Undergraduate</h4></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="subject-wrap bgc2 text-light">
                    <a href="{{ url('quick_search?recommended_sort=&search_education_level=2&rangeInput=100000&search_tution_fees=100000&search_program_intake=&school_search_button=1&exam_type%5B%5D=&exam_date%5B%5D=&listening_score%5B%5D=&writing_score%5B%5D=&reading_score%5B%5D=&speaking_score%5B%5D=&last_education_level=&education_country=&grading_scheme_id=&search_min_gpa=') }}">
    			    <img src="{{asset('public/home/images/subject/icons/4.png')}}" alt="">
                    <h4 class="title">Graduate</h4></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="subject-wrap bgc3">
                    <a href="{{ url('quick_search?recommended_sort=&search_education_level=5&rangeInput=100000&search_tution_fees=100000&search_program_intake=&school_search_button=1&exam_type%5B%5D=&exam_date%5B%5D=&listening_score%5B%5D=&writing_score%5B%5D=&reading_score%5B%5D=&speaking_score%5B%5D=&last_education_level=&education_country=&grading_scheme_id=&search_min_gpa=') }}">
    			    <img src="{{asset('public/home/images/subject/icons/3.png')}}" alt="">
                    <h4 class="title">Post Graduate</h4></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="subject-wrap bgc4">
                    <a href="{{ url('quick_search?recommended_sort=&search_education_level=6&rangeInput=100000&search_tution_fees=100000&search_program_intake=&school_search_button=1&exam_type%5B%5D=&exam_date%5B%5D=&listening_score%5B%5D=&writing_score%5B%5D=&reading_score%5B%5D=&speaking_score%5B%5D=&last_education_level=&education_country=&grading_scheme_id=&search_min_gpa=') }}">
    			    <img src="{{asset('public/home/images/subject/icons/2.png')}}" alt="">
                    <h4 class="title">Professionals</h4></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rs-services style6 pb-60 pt-80 md-pb-70">
    <div class="container">
        <div class="sec-title text-center mb-35">
            <h2 class="title title-color mb-21">We take STUDENTS from a stage of</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 md-mb-30">
                <div class="services-wrap bg1">
                    <div class="services-item ">
                        <div class="services-icon"> <img src="{{asset('public/home/images/confusion.png')}}" alt="images"> </div>
                        <div class="services-desc">
                            <h3 class="title">Confusion</h3>
                            <p> Most students start off being unclear or unsure about opportunities. They need exposure that is both constant and engaging. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pt-40 col-md-6 md-pt-0 md-mb-30">
                <div class="services-wrap bg2">
                    <div class="services-item ">
                        <div class="services-icon"> <img src="{{asset('public/home/images/clarity.png')}}" alt="images"> </div>
                        <div class="services-desc">
                            <h3 class="title">Clarity</h3>
                            <p> We help the school introduce multiple perspectives through counselors, alumni cases, psychometric assessments, and university interactions. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 sm-mb-30">
                <div class="services-wrap bg3">
                    <div class="services-item ">
                        <div class="services-icon"> <img src="{{asset('public/home/images/admission.png')}}" alt="images"> </div>
                        <div class="services-desc">
                            <h3 class="title">Admission</h3>
                            <p> We recommend suitable course and destination on the basis of student’s interest and eligibility. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pt-40 col-md-6 md-pt-0">
                <div class="services-wrap bg4">
                    <div class="services-item">
                        <div class="services-icon"> <img src="{{asset('public/home/images/contribution.png')}}" alt="images"> </div>
                        <div class="services-desc">
                            <h3 class="title">Visa</h3>
                            <p>The Visa application could be rejected no matter how good your documentation is. Our experience in this area ensure student Visa with almost 100% success rate.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-page-bottom-content"></div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url:"{{url('get-main-page-data')}}",
            type:'get',
            dataType:'json',
            beforeSend: function() {
                $('.loader').hide();
            },
            success:function(res){
                $('.main-page-bottom-content').html(res.html);
                $('.owl-carousel').owlCarousel();
            }
        });
    });
</script>



@endpush
