@extends('admin.include.app')
@section('main-content')
<style>
    .showw-content-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    padding: 2rem;
    margin: 0 auto;
}

.showw-info-container {
    margin-bottom: 2rem;
}

.showw-info-item {
    margin-bottom: 1rem;
    padding: 0.8rem;
    border-radius: 8px;
    background: #f8f9fa;
    
    display: flex; 
    align-items: center; 
}

.showw-label {
    font-weight: 600;
    color: #495057;
    margin-right: 0.5rem;
    flex: 0 0 150px; 
    text-align: left; 
}

.showw-value {
    color: #212529;
    flex: 1; 
    text-align: left; 
}


.showw-carousel-container {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    position: relative;
}

.showw-carousel {
    background: #f8f9fa;
}

.showw-carousel-img {
    border-radius: 15px;
    object-fit: cover;
    height: 400px;
}

.carousel-control-prev,
.carousel-control-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    opacity: 0.8;
}

.carousel-control-prev {
    left: 20px;
}

.carousel-control-next {
    right: 20px;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 20px;
    height: 20px;
    position: static;
    transform: none;
}

</style>
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href=""> Home</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Manage Slider
                        </li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('create.slider') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create New Slider</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="card-body showw-content-card">
            <div class="form-validation">
                <div class="row">
                    <div class="col">
                        @php
                        $country = DB::table('country')->find($slider->country_id);
                        $state = App\Models\Province::find($slider->state_id);
                        @endphp
                        <div class="showw-info-container">
                            <div class="showw-info-item">
                                <span class="showw-label">Country Name</span>
                                <span class="showw-value">: {{Str::ucfirst($country->name)}}</span>
                            </div>
                            <div class="showw-info-item">
                                <span class="showw-label">State Name</span>
                                <span class="showw-value">: {{Str::ucfirst($state->name)}}</span>
                            </div>
                            @if (!empty($slider->title))
                            <div class="showw-info-item">
                                <span class="showw-label">Title</span>
                                <span class="showw-value">: {{ ucfirst($slider->title) }}</span>
                            </div>
                            @endif
                        </div>

                        @if (!empty($slider->images))
                        <div class="showw-carousel-container">
                            <div id="carouselExampleControls" class="carousel slide showw-carousel" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($slider->images as $key => $image)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img class="d-block w-100 showw-carousel-img" src="{{ asset($image->filepath) }}" alt="Slide {{ $key + 1 }}">
                                    </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev showw-carousel-control" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next showw-carousel-control" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection