@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Manage Testimonial</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4 title-section-adss">
                                    <h3>Add Testimonial</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row" action="{{ route('store-testimonial') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-4 input-group-adss">
                                        <label> Name : <span class="required_mark">*</span></label>
                                        <input type="text" class="form-control " name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 input-group-adss ">
                                        <label> Designation : <span class="required_mark">*</span></label>
                                        <input type="text" class="form-control " name="designation" value="{{ old('designation') }}" placeholder="Enter Designation">
                                        @error('designation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 input-group-adss ">
                                        <label> Location : <span class="required_mark">*</span></label>
                                        <input type="text" class="form-control " name="location" value="{{ old('location') }}" placeholder="Enter Location">
                                        @error('location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Details -->
                                    <div class="col-md-4 input-group-adss">
                                        <label> Upload profile Picture : <span class="required_mark">*</span></label>
                                        <input type="file" name="profile_picture" class="form-control file-input-adss" accept="image/x-png,image/gif,image/jpeg">
                                        @error('profile_picture')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 input-group-adss">
                                        <label>Review Link : <span class="required_mark">*</span></label>
                                        <input type="text" class="form-control " name="review_link" value="{{ old('review_link') }}" placeholder="Enter Review link">
                                        @error('review_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 input-group-adss">
                                        <label>Status : <span class="required_mark">*</span></label>
                                        <select class="form-control " name="status">
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 input-group-adss">
                                        <label>Meta Tags : <span class="required_mark">*</span></label>
                                        <input type="text" class="form-control " name="meta_tags" value="{{ old('meta_tags') }}" placeholder="Enter Meta Tags">
                                        @error('meta_tags')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 input-group-adss">
                                        <label class="control-label">Meta Description :<span class="required_mark">*</span></label>
                                        <textarea name="meta_description" id="summernote2" style="visibility: hidden; display: none;">{{ old('meta_description') }}</textarea>
                                        @error('meta_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 input-group-adss">
                                        <label class="control-label">Details :<span class="required_mark">*</span></label>
                                        <textarea name="testimonial_desc" id="summernote1" style="visibility: hidden; display: none;">{{ old('testimonial_desc') }}</textarea>
                                        @error('testimonial_desc')
                                            <span class="text-danger">{{ $message }}</span>
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
@section('scripts')
    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        ['#summernote1','#summernote2'].forEach(function(id) {
            $(id).summernote({
                placeholder: ' Write Here',
                tabsize: 2,
                height: 100
            });
        });
    </script>
@endsection
