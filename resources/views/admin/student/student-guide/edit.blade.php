@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Manage   Popular Student Guide</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4">
                                    <h3>
                                        Edit   Popular Student Guide</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (isset($studentGuide))
                                    <form class="row g-4" action="{{ route('update-student-guide', $studentGuide->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12">
                                            <label>Title </label>
                                            <input type="text" name="title" class="form-control " value="{{ $studentGuide->title }}" />
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label>Details</label>
                                            <textarea name="text" class="form-control" id="summernote1" cols="30" rows="10">{{ $studentGuide->text }}</textarea>
                                            @error('text')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label>Guide Image</label>
                                            <input type="file" name="image" class="form-control" />
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label>Guide Document</label>
                                            <input type="file" name="doc_url" class="form-control" />
                                            @error('doc_url')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12"><button type="submit" class="btn btn-info  py-6">Submit</button>
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
