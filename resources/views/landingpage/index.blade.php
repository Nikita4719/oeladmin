@extends('landingpage.layouts.app')
@section('style')
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css
" rel="stylesheet">
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

<style>
    .uniimage {
        max-height: 105px;
        height: 100%;
        object-fit: cover;
        min-height: 105px;

    }

    .flag-icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        border: 1px solid #ccc;
    }

    .flag-icon img {
        width: 100%;
        height: auto;
    }
    .blockMsg,
    .blockPage,
    .blockUI {
        background-color: transparent !important;
        border: none !important;
    }

    .spinner {
        border-top: 4px solid #333;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        animation: spin 1s linear infinite;
        margin: auto;
        margin-top: 15px;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
@endsection
@section('content')

<div class="wraper">
    <div class="banner">
        <div class="treeSectins">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-3">
                    <div class="form-group col-md-12 mb-0 bannerbutton rounded">
                        <div class="row " style="display: flex;margin-top:40px;border-radius:10px">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 " style="text-align: center;">
                    <div class="bannergirl">
                        <img src="{{ asset('assets/images1/redgirl.png') }}" style="height:440px" />
                    </div>
                </div>
                <div class="col-md-4" style="text-align: center;">
                    <div class="formcontent BannerFOrm">
                        <h3 class="study-in">
                            Study in {{ $countryName->name }}
                        </h3>
                        <p class="get-admission"> Secure admission to a highly-ranked university in {{ $countryName->name }}
                        </p>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                        <script>
                            setTimeout(function() {
                                window.location.href = "{{ route('index') }}"; 
                            }, 5000); 
                        </script>
                        @endif
                        <form action="{{ route('send-mail') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class=" mb-15 col-md-12">
                                    <input class="from-control" type="hidden" id="country" name="country" value="{{ $countryName->name }}">
                                </div>
                                <div class=" mb-15 col-md-6">
                                    <input class="from-control" type="text" id="first_name" name="first_name" placeholder="First Name" value="">
                                </div>
                                @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class=" mb-15 col-md-6">
                                    <input class="from-control" type="text" required name="last_name" placeholder="Last Name" value="">
                                </div>
                                @error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class=" mb-15 col-md-12">
                                    <input class="from-control" type="text" required name="email_id" placeholder="Email" value="">
                                </div>
                                @error('email_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class=" mb-15 col-md-12">
                                    <input class="from-control" type="number"  pattern="[0-9]{10}" required name="phone_no" placeholder="Phone" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                                 </div>
                                @error('phone_no')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class=" mb-15 col-md-12">
                                    <input class="from-control" type="text" required name="location" placeholder="Location" value="" >
                                </div>
                                @error('location')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class=" mb-15 col-md-12">
                                    <input class="from-control" type="text" required name="city" placeholder="City" value="">
                                </div>
                                @error('city')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class=" mb-15 col-md-12 ">
                                    <input type="checkbox" class="float-left " style="margin-top:5px" required>
                                    <label class="form-check-label float-left px-2" for="defaultCheck1">I have <a href='https://overseaseducationlane.com/privacy-policy'>read T&C's</a></label>
                                </div>


                                <div class="form-group col-md-12 mb-0">
                                    <button type="submit" class="apply-btn" style="background-image: linear-gradient(to right, #0452b8, #38d0da);padding: 5px 20px;display: inline-block;margin-top: 6px;border-radius: 6px;color: white;width: 100%;text-align: center;border:2px solid #38d0da;">
                                        Submit now <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-1">
                </div>
            </div>
        </div>
        <div id="demo" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner sliderData">
                @if (!empty($sliderImages[0]) && count($sliderImages[0]) > 0)
                @foreach ($sliderImages[0] as $key => $item)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }} ">
                    <img src="{{ asset($item->filepath) }}" width="100%" height="529px !important">
                </div>
                @endforeach
                @else
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images1/banner/banner1.png') }}" width="100%" height="529px !important">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images1/banner/banner2.png') }}" width="100%" height="529px !important">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images1/banner/banner3.png') }}" width="100%" height="529px !important">
                </div>
                @endif
            </div>        
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <section class="snddiv">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h5 class="studyStudent" style="    font-size: 23px;
                    font-weight: 700;
                    color: #1086f3;">
                        66,000+ Indian students choose to study in {{ $countryName->name }}
                    </h5>
                    <div class="row">
                        <div class="col-md-4">
                            <h5 style="    font-size: 25px;
                            font-weight: 700;
                            color: #1086f3;">
                                You could be the <br>
                                NEXT!</h5>
                        </div>

                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
    </section>
    <section class="bluebackgrouns">
        <div class="container">
            <h4 class="whycanada"> Why Overseas Education Lane?
            </h4>
            </h4>
            <div class="flex-container">

                @if ($aboutcountry->count() > 0)
                @foreach ($aboutcountry as $item)
                <div class="whyimg text-white text-capitalize " style="font-size: 15px;">
                    <img src="{{ asset('admin/uploads/aboutcountry') }}/{{ $item->image }}" style="border-radius:100%;">
                    {!! $item->aboutcountry !!}
                </div>
                @endforeach
                @else
                <div class="whyimg">
                    <img src="{{ asset('assets/images1/why1.png') }}">
                    <p class="whycanadapara"> 37 universities ranked in the top 500 universities in the world.
                    </p>
                </div>
                <div class="whyimg">
                    <img src="{{ asset('assets/images1/why2.png') }}">
                    <p class="whycanadapara"> Get guaranteed scholarships and explore affordable options with the guidance of OEL counselors.</p>
                </div>
                <div class="whyimg">
                    <img src="{{ asset('assets/images1/why3.png') }}">
                    <p class="whycanadapara">A large student network across 27+ countries in diverse courses and portfolios.
                    </p>
                </div>
                <div class="whyimg">
                    <img src="{{ asset('assets/images1/why4.png') }}">
                    <p class="whycanadapara"> Explore top universities offering your preferred courses in the UK, USA, Canada, France, South Korea, and more.</p>
                </div>
                <div class="whyimg">
                    <img src="{{ asset('assets/images1/why5.png') }}">
                    <p class="whycanadapara"> End-to-end services, from profile evaluation to visa consultation.
                    </p>
                </div>
                @endif
            </div>
        </div>
    </section>
    <section class="">
        <div class="container">
            <div class="sec-title text-center">
                <h4 class="univerheading universitycount"> Over {{ count($universities) }} + Universities and Colleges to study in
                    {{ $countryName->name }}
                </h4>
                <p class="findourheading"> Find out which
                    {{ $countryName->name }} universities are a good match for your academic
                    profile
                </p>
                <br>
            </div>
            <div class="row">
            </div>
        </div>
    </section>
    <section class="pinkback">
        <div class="container">
            <div class="sec-title text-center">
                <div class="row universityData">

                    @foreach ($universities as $index => $item)
                    @if ($index >= 11)
                    @break
                    @endif

                    <div class="col-md-4 ">
                        <div class="card">
                            @if (!empty($item->thumbnail))
                            <img class="card-img-top uniimage" src="{{asset($item->thumbnail )}}" alt="Card image cap">
                            @endif
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-3 unipd">
                                        @if (!empty($item->logo))
                                        <img src="{{asset( $item->logo) }}">
                                        @endif
                                    </div>
                                    <div class="col-md-9 align-self-center">
                                        <h5 class="unihd"> {{ str_replace(["\r", "\n", "\r\n"], '', substr($item->university_name, 0, 22)) }}</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <ul class="deslist">
                                            <li>
                                                <i class="fa fa-map"></i>
                                                Location-{{ str_replace(["\r", "\n", "\r\n"], '', substr($item->university_location, 0, 22)) }}
                                            </li>
                                            <li>
                                                <i class="fa fa-flag"></i>
                                                Country - {{$item->country->name}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group col-md-12 mb-0">
                                    <a class="apply-btn" href="#" style="background-image: linear-gradient(to right, #0452b8 , #38d0da);padding: 5px 20px;
                                    display: inline-block;  margin-top: 6px;  border-radius: 6px;color: white;width: 100%;
                                    text-align: center;">
                                        View now </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-md-4">
                        <div class="card bluecard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <h4 class="bluediv"> {{ count($universities) }} + Universities </h4>
                                        <p class="bluepara"> Find out more about fees, eligibility,
                                            intakes &amp; admission process.
                                            Know the perfect university or college
                                            that suits you!
                                        </p>
                                        <a class="apply-btn" href="#" style="background:white;display: inline-block;  margin-top: 6px;  border-radius: 6px;color: blue;width: 100%;  padding: 10px 0px;text-align: center;"> Contact us <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="">
        <div class="container">
            <div class="sec-title text-center">
                <p class="Indianstudentheading"> More than 42,000 Indian students studying <br> in
                    {{ $countryName->name }}
                </p>
            </div>
            <div class="row">
                @foreach ($testimonials as $key =>$data)
                <div class="col-md-4" @if($key==1)  @endif>
                    <div class="card customcard ">
                        @if (!empty($data->profile_picture))
                        <img class="card-img-top" src="{{ asset('imagesapi/'.$data->profile_picture )}}" alt="Card image cap" style="height: 250px; width: 100%; object-fit: fill;">
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 align-self-center">
                                    <h5 class="unihd"> {{ $data->name }}</h5>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <p class="manpreet-para" style="text-align: justify;">{!! $data->testimonial_desc !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bluebackgrouns loaded">
        <div class="container">
            <h4 class="whycanada">Why Choose Overseas Education Lane?
            </h4>
            <div class="row">
                <div class="col-md-6">
                    <ul class="checklist">
                        <li> <i class="fa fa-check cmcheck" aria-hidden="true"></i> Expert Guidance for the Right Course & Path.
                        </li>
                        <li> <i class="fa fa-check cmcheck" aria-hidden="true"></i> Comprehensive Study Abroad Services.</li>
                        <li> <i class="fa fa-check cmcheck" aria-hidden="true"></i> Unbiased & Personalized Counselling.</li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <ul class="checklist">
                        <li> <i class="fa fa-check cmcheck" aria-hidden="true"></i> Proven Test-Prep Success.
                        </li>
                        <li> <i class="fa fa-check cmcheck" aria-hidden="true"></i> Thousands of Successful Placements.</li>
                        <li> <i class="fa fa-check cmcheck" aria-hidden="true"></i> Post-Study Employment Support.</li>
                    </ul>
                </div>
            </div>
            <div class="row">

                <div class="form-group col-md-5">
                </div>

                <div class="form-group col-md-2">
                    <br> <br>
                    <a class="apply-btn" href="https://www.overseaseducationlane.com/about-oel" style="background:white;
                display: inline-block;  margin-top: 6px;  border-radius: 6px;color: blue;width: 100%;  padding: 10px 0px;
                text-align: center;">
                        About page <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                    <br> <br>
                </div>
                <div class="form-group col-md-5">
                </div>
            </div>
        </div>
    </section>
    <h4 class="weare"> We are EVERYWHERE </h4>
    <div class="mainlogodiv mb-10 mt-10">
        <div class="slick marquee">
            @foreach ($country as $item)
            <div class="slick-slide">
                <div class="inner logobkl">
                    <div class="row">

                        <div class="col-md-6 crlimg">
                            <h4 class="aus text-nowrap" style="text-align: center">
                                {{ substr($item->name, 0, 10) }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>      
        <div dir="rtl">
            <div class="slick marquee_rtl">
                @foreach ($country as $item)
                <div class="slick-slide">
                    <div class="inner logobkl">
                        <div class="row">
                           
                        <div class="col-md-6 crlimg">
                            <h4 class="ausleft text-nowrap"> {{ substr($item->name, 0, 10) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<section class="girlback">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="girldiv">
                    <h4 class="Chooseheading"> Choose the right course &<br>achieve your goals </h4>
                    <div class="row">
                        <div class="col-md-6 col-12 btmpoint">
                            <li class="dash"> </li> Business Administration
                        </div>
                        <div class="col-md-6 col-12 btmpoint">
                            <li class="dash"> </li> Computer Science & IT
                        </div>
                        <div class="col-md-6 col-12 btmpoint">
                            <li class="dash"> </li> Engineering
                        </div>
                        <div class="col-md-6 col-12 btmpoint">
                            <li class="dash"> </li> Natural Sciences
                        </div>
                        <div class="col-md-6  col-12 btmpoint">
                            <li class="dash"> </li> Medicine
                        </div>
                        <div class="col-md-6  col-12 btmpoint">
                            <li class="dash"> </li> Teaching
                        </div>
                        <div class="col-md-6 col-12 btmpoint">
                            <li class="dash"> </li> Law
                        </div>
                        <div class="col-md-6 col-12 btmpoint">
                            <li class="dash"> </li> Computer Science
                        </div>
                        <div class="col-md-6 col-12 btmpoint">
                            <li class="dash"> </li> Social Work
                        </div>
                        <div class="col-md-6 col-12 btmpoint">
                            <li class="dash"> </li> Mathematics
                        </div>
                        <div class="col-md-6 col-12 btmpoint">
                            <li class="dash"> </li> Nursing
                        </div>
                        <div class="col-md-6 col-12 btmpoint">
                            <li class="dash"> </li> MBBS
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
</section>
<div class="rs-newsletter">
    <div class="container">
        <div class="newsletter-wrap">
            <div class="row ">
                <div class=" col-md-8">
                    <div class="content-part">
                        <div class="sec-title">
                            <h3 class="title mb-0 white-color"> Discover OEL . It's easier than you think.</h3>
                        </div>
                        <p class="footerp"> Stay assured, we are always available. </p>
                    </div>
                </div>
                <div class="col-md-2">
                </div>

                <div class="form-group col-md-2">
                    <a class="apply-btn" href="#" style="background:white;
                                display: inline-block;  margin-top: 6px;  border-radius: 6px;color: blue;width: 100%;  padding: 10px 0px;
                                text-align: center;">
                        Contact us <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>

<script>
    $(document).ready(function() {
        $('#inputGroupSelect04').select2({
            placeholder: 'Search...'
        });
        $('#inputGroupSelect04').on('change', function() {
            var countryId = $(this).val();
            $.blockUI({
                message: '<div class="spinner"></div><h4>Loading...</h4>'
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('get-country-data') }}",
                type: 'POST',
                data: {
                    countryId: countryId
                },
                success: function(response) {
                    if (response.success) {
                        if (response.countryName) {
                            $('.countryName').text(response.countryName);
                            $('.study-in').text(`Study in ${ response.countryName }`);
                            $('.studyStudent').text(`66,000+ Indian students choose to study in ${ response.countryName }`);
                            $('.get-admission').text(`Secure admission to a highly-ranked university in  ${ response.countryName }`);
                            $('.whycanada').text(`Why ${ response.countryName }`);
                            $('.findourheading').text(`Find out which ${ response.countryName } universities are a good match for your academic profile`);
                            $('.Indianstudentheading').text(`More than 42,000 Indian students studying in ${ response.countryName }`);
                        }
                        if (response.universities) {
                            $('.universityData').empty();
                            var count = 0;
                            $.each(response.universities, function(index, item) {
                                if (count > 10) {
                                    return false; 
                                }
                                var html = generateUniversityCardHtml(item);
                                $('.universityData').append(html);
                                count++;
                            });
                            var blueCardHtml = generateBlueCardHtml();
                            $('.universityData').append(blueCardHtml);
                        }

                        function generateUniversityCardHtml(item) {
                            var html = `<div class="col-md-4">
                                                    <div class="card">`;
                            if (item.thumbnail) {
                                html += `<img class="card-img-top uniimage" src="${item.thumbnail}" alt="Card image cap">`;
                            }
                            html += `<div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-3 unipd">`;
                            if (item.logo) {
                                html += `<img src="${item.logo}">`;
                            }
                            html += ` </div>
                                                        <div class="col-md-9 align-self-center">
                                                            <h5 class="unihd">${item.university_name}</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <ul class="deslist">
                                                                <li><i class="fa fa-map"></i>
                                                                    Location - ${item.university_location}</li>
                                                                <li>
                                                                    <i class="fa fa-flag"></i>
                                                                    Country -  ${item.country.name}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group col-md-12 mb-0">
                                                        <a class="apply-btn" href="#" style="background-image: linear-gradient(to right, #0452b8 , #38d0da);padding: 5px 20px; display: inline-block; margin-top: 6px; border-radius: 6px;color: white;width: 100%;text-align: center;">View now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                            return html;
                        }

                        function generateBlueCardHtml() {
                            var html = `<div class="col-md-4">
                                                    <div class="card bluecard">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12 ">
                                                                    <h4 class="bluediv"> 112 + Universities </h4>
                                                                    <p class="bluepara"> Find out more about fees, eligibility,
                                                                        intakes &amp; admission process.
                                                                        Know the perfect university or college
                                                                        that suits you!
                                                                    </p>
                                                                    <a class="apply-btn" href="#" style="background:white;display: inline-block;  margin-top: 6px;  border-radius: 6px;color: blue;width: 100%;  padding: 10px 0px;text-align: center;"> Contact us  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;
                            return html;
                        }
                        if (response.totalUniversity || response.countryName) {
                            var data = `Over ${response.totalUniversity} + Universities and Colleges to study in ${response.countryName}`;
                            $('.universitycount').text(data);
                        }
                        if (response.sliderimage && response.sliderimage.length > 0) {
                            $('.sliderData').empty();
                            $.each(response.sliderimage[0], function(key, imageitem) {
                                var slider = '<div class="carousel-item ' + (key === 0 ? 'active' : '') + '">' +
                                    '<img src="' + imageitem.filepath + '" width="100%" height="529px !important">' +
                                    '</div>';
                                $('.sliderData').append(slider);
                            });
                        } else {
                            $('.sliderData').empty();
                            var slider = ` <div class="carousel-item active">
                                                <img src="{{ asset('assets/images1/banner/banner1.png') }}" width="100%"
                                                    height="529px !important">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{ asset('assets/images1/banner/banner2.png') }}" width="100%"
                                                        height="529px !important">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{ asset('assets/images1/banner/banner3.png') }}" width="100%"
                                                        height="529px !important">
                                                </div>`;
                            $('.sliderData').append(slider);

                        }
                    } else {
                      
                    }
                    $.unblockUI();
                },
                error: function(xhr, status, error) {
                    $.unblockUI();
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

@endsection