@extends('frontend.layouts.main')
@section('title', 'CBon Voyage')
@section('content')

@php
       // Safe fallback – prevents "Undefined array key 0"
       $service = $service_detials[0] ?? null;
@endphp

<section>
    <div class="canva-title py-5 container" id="canva-title">
        <div class="canva-heading mt-lg-5 mb-lg-5">
            <h1 class="text-center fw-bold">
                {{ $service->main_title ?? '' }}
            </h1>
        </div>

        <div class="section-canva">
            <div class="row">

                <div class="col-lg-8 pe-lg-5">
                    <div class="Destination-title">
                        <h2 class="fw-bold">
                            {{ strip_tags($service->sub_name ?? '') }}
                        </h2>
                    </div>

                    <div class="dilemmas-title">
                        <p>{{ strip_tags($service->content ?? '') }}</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="dt-canva">
                        @if(!empty($service->image_one))
                            <img src="{{ asset('imagesapi/'.$service->image_one) }}" alt="see">
                        @endif
                    </div>
                </div>

                <div class="col-lg-4 mt-5">
                    <div class="dt-canva">
                        @if(!empty($service->image))
                            <img src="{{ asset('imagesapi/'.$service->image) }}" alt="see">
                        @endif
                    </div>
                </div>

                <div class="col-lg-8 ps-lg-5 mt-5">
                    <div class="Destination-title">
                        <h2 class="fw-bold">
                            {{ strip_tags($service->sub_name_one ?? '') }}
                        </h2>

                        <p>{{ strip_tags($service->content_one ?? '') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
