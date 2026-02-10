@extends('frontend.layouts.main')

@section('title', "OverseasEducationLane")
@section('content')
<section>
    <div class="university_title ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="university_airplane d-flex justify-content-center ">
                        
                    </div>
                    <div class="universities_heading text-center">
                        <h1 class="fw-bold mx_rounded text-black">Psychometricstest</h1>
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
                <div class="row clearfix">
                    <!-- Content Column -->
                    <div class="col-lg-8 md-mb-50">
                        <p>Psychometric Test is a test researched and designed to assess the aptitude and tendency of the
                            students. It is a holistic method implemented to measure potential based on ability, personality
                            and interests.</p>

                        <p>Our counsellors put students through this test and figure out their mind-set and aptitude. They
                            identify the areas of interest and recommend right courses and destinations.</p>
                     
                    </div>

                      @include('frontend.global.query')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
