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
                                <h3>Edit Sub Service</h3>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if (isset($subservice))
                            <form class="row" action="{{ route('subservice.update',$subservice->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-12 input-group-adss">
                                    <label>Service<span class="text-danger">*</span></label>
                                    <select name="service_id" class="form-control" required>
                                        <option>Select Service</option>

                                        @foreach ($services as $service)
                                        <option value="{{ $service->id }}" {{ $service->id == $subservice->service_id ? 'selected' : '' }}>{{ $service->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 input-group-adss">
                                    <label>main title <span class="text-danger">*</span></label>
                                    <input type="text" name="main_title" class="form-control " required maxlength="200" value="{{ $subservice->main_title }}" />
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 input-group-adss">
                                    <label>h1 <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control " required maxlength="200" value="{{ $subservice->name }}" />
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 input-group-adss">
                                    <label>h2 <span class="text-danger">*</span> </label>
                                    <input type="text" name="name_one" class="form-control" value="{{ $subservice->name_one }}" maxlength="200" required placeholder="Enter Name one " />
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 input-group-adss">
                                    <label>Details<span class="text-danger">*</span></label>
                                    <textarea name="content" class="form-control" id="summernote1" required cols="30">{!! $subservice->content !!}</textarea>
                                    @error('text')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 input-group-adss">
                                    <label>Details One<span class="text-danger">*</span></label>
                                    <textarea name="content_one" class="form-control" id="summernote2" required cols="30">{!! $subservice->content_one !!}</textarea>
                                    @error('text')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 input-group-adss">
                                    <label>Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control file-input-adss">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <img src="{{ asset('imagesapi/' . $subservice->image) }}" alt="{{ $subservice->name }}" width="150px" height="100px" class="mt-3">
                                </div>

                                <div class="col-md-12 input-group-adss">
                                    <label>Image One <span class="text-danger">*</span></label>
                                    <input type="file" name="image_one" class="form-control file-input-adss">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <img src="{{ asset('imagesapi/' . $subservice->image_one) }}" alt="{{ $subservice->name }}" width="150px" height="100px" class="mt-3">
                                </div>
                                <div class="col-md-12 input-group-adss">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="1" @if($subservice->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($subservice->status == 0) selected @endif>InActive</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 d-flex justify-content-center"><button type="submit" class="btn btn-info w-25">Submit</button>
                                </div>
                            </form>
                            @endif
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
    ['#summernote1'].forEach(function(id) {
        $(id).summernote({
            placeholder: ' Write Here',
            tabsize: 2,
            height: 100
        });
    });

    ['#summernote2'].forEach(function(id) {
        $(id).summernote({
            placeholder: ' Write Here',
            tabsize: 2,
            height: 100
        });
    });
</script>
@endsection