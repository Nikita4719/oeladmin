@extends('frontend.layouts.main')
@section('title', 'About Oel')
@section('content')
<section>
    <div class="free-consultation-title mt-5">
                    <h2 class="text-center fw-bold">Contact Us</h2>
                </div>
    @include('frontend.contact_form')
    <div class="info-title mx-auto pt-5 pb-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="noida-title-address p-3">
                    <div class="head-text-noida text-center" >
                        <p class="fw-bold">Noida, Uttar Pradesh</p>
                    </div>
                    <div class="location-visit mb-4 d-flex gap-4">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span  class="fw-bold">Corporate office
                 B-37, 1st FLOOR, -Sector 2 Noida, 201301</span>
                    </div>
                    <!-- <div class="google-title mb-4">
                        <span  class="fw-bold">Open on Google Maps</span>
                    </div> -->
                    <div class="location-visit mb-4 d-flex gap-1">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span  class="fw-bold">+(91) 892 992 2525</span>
                    </div>
                    <div class="location-visit mb-4 d-flex gap-4">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span  class="fw-bold">info@overseaseducationlane.com</span>
                    </div>
                    <!-- <div class="free-codes text-center mt-3">
                                    <button class="apply-btn fn border px-4 py-2">Schedule a virtual consultation </button>
                                </div> -->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="noida-title-address p-3">
                    <div class="head-text-noida text-center">
                        <p class="fw-bold"> Nagaland</p>
                    </div>
                    <div class="location-visit mb-4 d-flex gap-4">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span  class="fw-bold">3rd floor, Providence Abode, 4th mile, Near Green Park, Chumoukedima, Nagaland, 797103</span>
                    </div>
                    <!-- <div class="google-title mb-4">
                        <span  class="fw-bold">Open on Google Maps</span>
                    </div> -->
                    <div class="location-visit mb-4 d-flex gap-1">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span  class="fw-bold">+(91) 892 992 2525</span>
                    </div>
                    <div class="location-visit mb-4 d-flex gap-4">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span  class="fw-bold">info@overseaseducationlane.com</span>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


@endsection

@section('script')



@endsection