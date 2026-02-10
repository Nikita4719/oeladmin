@extends('frontend.layouts.main')
@section('title', 'About Oel')
@section('content')
 <section>
    <div class="proto-title mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="virtual-proto">
                        <h1>Get a virtual consultation at the comfort of <br>
                        your home!</h1>
                        <span class="mt-4">Follow these 3 simple steps:</span>
                        <ul class="mt-2">
                            <li>Select the nearest AECC office</li>
                            <li>Pick a suitable date and time</li>
                            <li>Fill the details and schedule the appointment!</li>
                        </ul>
                    </div>
                    <div class="free-code  mt-4">
                                    <button class="apply-btn fn border-0 px-4 py-2 ">Get Started for Free<i class='fas fa-long-arrow-alt-right mx-3'></i></button>
                                </div>
                </div>
                <div class="col-lg-6">
                    <div class="telecom-virtual">
                    <img src="http://127.0.0.1:8000/frontend/img/Group 257.png" alt="gif">"
                    </div>
                </div>
            </div>
        </div>
        <div class="closure">
                    <div class="col-lg-12">
                        <div class="closure-title text-center pt-5 pb-5">
                            <h2 class="fw-bold">We're closer than you think!</h2>
                            <p>To book an appointment, select our nearest office to you!</p>
                            <div class="input-group mb-3 li-max mx-auto ">
                                    <select class="form-select " id="inputGroupSelect01">
                                        <option selected="">Choose Your Location</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
    </div>
 </section>



@endsection