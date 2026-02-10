@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Master Service</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4 title-section-adss">
                                    <h3>
                                        Edit Master Service</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row" action="{{ route('update-master-service', $master_service->id) }}" method="POST" enctype="multipart/form-master_service">
                                    @csrf
                                    <div class="col-md-12 input-group-adss">
                                        <label>Enter Master Service Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="name" value="{{ $master_service->name }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 input-group-adss">
                                        <label>Enter Amount<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control " name="amount" value="{{ $master_service->amount }}">
                                        @error('amount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 input-group-adss">
                                        <label>Select Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option value="1" {{ $master_service->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $master_service->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-center"><button type="submit" class="btn btn-info  w-25">Submit</button>
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
