@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Education Lane </h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4">
                                    <h3>
                                        Edit Education Lane</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row g-4" action="{{ route('update-education-lane', $education_lane->id) }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label>Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " name="name" value="{{ $education_lane->name }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label>Details<span class="text-danger">*</span></label>
                                    <textarea class="form-control " name="details">{!! $education_lane->details !!}</textarea>
                                    @error('details')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12"><button type="submit" class="btn btn-info  py-6">Update</button>
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
