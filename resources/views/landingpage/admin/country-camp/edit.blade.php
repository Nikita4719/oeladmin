@extends('admin.include.app')
@section('main-content')
<div class="row">
    <!-- Lightbox -->
    <div class="col-lg-12">
        <div class="card form-container-adss p-0">
            <div class="card-header header-style-adss">
                <h4 class="card-title mb-0"> Manage Country Campaign</h4>
            </div>
            <div class="card-body">
                <div class="wizard">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                            <div class="mb-4 title-section-adss">
                                <h3>Edit Country Campaign</h3>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success notification-adss">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if ($errors->any())
                            <div class="alert alert-danger notification-adss">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{route('update.country_campaign',[$ads->id])}}" method="post" enctype="multipart/form-data" class="ads-form-adss">
                                @csrf
                                <div class="row form-row-adss">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Country</label>
                                            <select class="form-control" name="country_id" id="country">
                                                @foreach ($countrys as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country_id')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group input-group-adss">
                                            <!-- apply Seki Editor -->
                                            <label class="form-label">Country Link</label>
                                            <textarea name="meta_description" id="" cols="20" rows="5" placeholder="Meta Description" class="form-control textarea-field-adss">{{$ads->meta_description}}</textarea>
                                        </div>
                                        @error('meta_description')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-info btn-primary px-5 fs-5 mx-auto submit-button-adss">Update</button>
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