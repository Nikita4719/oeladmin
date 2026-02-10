@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Manage   Blogs</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4 title-section-adss">
                                    <h3>Edit Blogs</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (isset($blogs))
                                <form class="row" action="{{ route('update-blogs',$blogs->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6 input-group-adss">
                                        <label>Title <span class="text-danger">*</span> </label>
                                        <input type="text" name="title" class="form-control " maxlength="200" required placeholder="Enter Title " value="{{ $blogs->title }}" />
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 input-group-adss">
                                        <label>Alt Tag <span class="text-danger">*</span> </label>
                                        <input type="text" name="alt_tag" class="form-control " maxlength="200" required placeholder="Enter Alt Tag " value="{{ $blogs->alt_tag }}" />
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 input-group-adss">
                                        <label>Slug <span class="text-danger">*</span> </label>
                                        <input type="text" name="slug" class="form-control " maxlength="200" required placeholder="Enter Slug " value="{{ $blogs->slug }}" />
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                   <div class="col-md-6 input-group-adss">
                                        <label>Meta Keywords  </label>
                                     
                                        <textarea type="text" name="meta_tags" class="form-control " cols="30" required placeholder="Meta Keywords " />{{ $blogs->meta_tags }}</textarea>
                                        @error('meta_tags')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 input-group-adss">
                                        <label>Meta Title  </label>
                                        <input type="text" name="meta_title" class="form-control " maxlength="200" required placeholder="Meta Title " value="{{ $blogs->meta_title }}" />
                                        @error('meta_tags')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 input-group-adss">
                                        <label>Meta Description  </label>
                                        <input name="meta_description"  class="form-control" placeholder="Enter Meta Description"  value="{{ $blogs->meta_description }}">
                                        @error('meta_description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 input-group-adss">
                                        <label>Details<span class="text-danger">*</span></label>
                                        <textarea name="text" class="form-control" id="summernote1" required cols="30" >{{ $blogs->text }}</textarea>
                                        @error('text')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 input-group-adss">
                                        <label>Image<span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="form-control file-input-adss"/>
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 input-group-adss">
                                        <label>Status<span class="text-danger">*</span></label>
                                        <select name="status" class="form-control" required>
                                            <option value="1" {{ $blogs->status == 1 ? 'selected' : '' }}>Publish</option>
                                            <option value="0" {{ $blogs->status == 0 ? 'selected' : '' }}>Unpublish</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-center"><button type="submit" class="btn btn-info  w-25">Submit</button>
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
    </script>
@endsection
