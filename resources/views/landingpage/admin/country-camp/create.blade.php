@extends('admin.include.app')
@section('main-content')
<div class="row">
    <!-- Lightbox -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0"> Manage Country Campaign</h4>
            </div>
            @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
            <div class="card-body">
                <div class="wizard">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" role="tabpanel" id="step1"
                            aria-labelledby="step1-tab">
                            <div class="mb-4">
                                <h3>
                                    Add Country Campaign</h3>
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
                            <form action="{{route('store.country_campaign')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Country</label>
                                            <select class="form-control" name="country_id" id="country">
                                                @foreach ($ads as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country_id')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label class="form-label">Country Link</label>
                                            <textarea name="meta_description" id="" cols="20" rows="5" placeholder="link" disabled class="form-control">{{"https://www.overseaseducationlane.com/landing-page?country="}}</textarea>
                                        </div>
                                        @error('meta_description')
                                        {{$message}}
                                        @enderror
                                    </div>

                                </div>
                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-primary w-25 mx-auto">Save</button>
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
@endsection

