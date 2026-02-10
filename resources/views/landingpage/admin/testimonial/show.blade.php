@include('admin.common.header')
@include('admin.common.sidebar')

<style>
    #results {
        display: flex;
        flex-flow: wrap;
    }
</style>

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        {{-- <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Validation</a></li>
            </ol>
        </div> --}}
        <!-- row -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <span id="responseMessage" class="pd-2"></span>
                    <div class="card-header">
                        <h4 class="card-title">Slider</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <div class="row">
                                <div class="col-xl-8">
                                    @php
                                    $country = DB::table('country')->find($slider->country_id);
                                    $state = App\Models\State::find($slider->state_id);
                                    @endphp
                                     <p class="bold"><b>Country Name</b> : {{Str::ucfirst($country->name)}} </p>
                                     <p class="bold"><b>State Name</b> : {{Str::ucfirst($state->name)}} </p>
                                     @if (!empty($slider->title))
                                       <p><b>Title</b> : {{ ucfirst($slider->title) }}</p>
                                     @endif
                                     @if (!empty($slider->images))
                                     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ($slider->images as $key => $image)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                    <img class="d-block w-100" src="{{ asset($image->filepath) }}" alt="Slide {{ $key + 1 }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
@include('admin.common.footer')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

