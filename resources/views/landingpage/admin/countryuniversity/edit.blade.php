@extends('admin.include.app')
@section('main-content')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<div class="row">
    <!-- Lightbox -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0"> Manage  About Country University</h4>
            </div>
            <div class="card-body">
                <div class="wizard">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" role="tabpanel" id="step1"
                            aria-labelledby="step1-tab">
                            <div class="mb-4 title-section-adss">
                                <h3>Edit About Country University</h3>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{route('update.country.university',[$aboutCountry->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group input-group-adss">
                                            <label class="form-label">Select Country</label>
                                            <select class="form-control" name="country_id" id="country" >
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" @if ($aboutCountry->country_id == $country->id) @selected(true)   @endif>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country_id')
                                                    {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group input-group-adss">
                                            <label class="form-label">Feature Image</label>
                                            <input type="file" name="image" class="form-control file-input-adss" >
                                        </div>
                                        <div>
                                            <img src="{{asset($aboutCountry->image) }}" width="200px" height="150px">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group input-group-adss">
                                            <label class="form-label">About Country University</label>
                                            <textarea name="aboutcountry" required>{!! $aboutCountry->aboutcountry !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-2">
                                    <button  type="submit" class="btn btn-primary w-25 mx-auto">Update</button>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace( 'aboutcountry' );
</script>
@endsection
