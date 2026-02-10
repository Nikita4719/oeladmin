@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Manage Sub Service</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4 title-section-adss">
                                    <h3>
                                        Add Sub Service</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row" action="{{ route('store-sub-service') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="col-md-12 input-group-adss">
                                        <label>Master Service <span class="text-danger">*</span></label>
                                        <select class="form-control" name="master_service_id">
                                            <option value="">Select Master Service</option>
                                            @foreach ($master_service as $item)
                                                <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('master_service_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 input-group-adss">
                                        <label>Enter Sub Service Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 input-group-adss">
                                        <label>Select Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
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

