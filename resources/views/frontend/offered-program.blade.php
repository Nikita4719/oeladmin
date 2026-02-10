
@extends('frontend.layouts.main')
@section('content')
<div class="row m-5">
    @if(count($programs) > 0)
    @foreach ($programs as $item)
        <div class="col-lg-4">
            <div class="card" >
                 <div class="card-body d-flex align-items-center justify-content-center">
                    <img class="img-fluid mx-auto d-block" src="{{asset($item->university_name->logo ?? null)}}" alt="Card image cap">
                </div>
                
                <div class="card-body">
                  <h5 class="card-title">{{$item->name ?? null}}</h5>
                    <p>Program level - {{$item->programLevel->name ?? null}}
                    <br> Duration  - {{$item->length ?? null}}.
                    <br> Tution Fees  - {{$item->currency}} {{$item->tution_fee ?? null}}.
                    <br> Application Fees  - {{$item->currency}} {{$item->application_fee ?? null}}.
                    </p>
                  <a href="{{route('course-details',[$item->id])}}" class="btn btn-primary">Course Details</a>
                </div>
            </div>
        </div>
    @endforeach
    @else
        <div class="col-md-12 text-center">
            <h3>No course found</h3>
        </div>
    @endif
</div>
@endsection