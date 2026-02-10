@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title mb-0"> Student Learning</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4 title-section-adss">
                                    <h3> Add Student  </h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row d-flex justify-content-center" action="{{ route('learning-student.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="col-6 input-group-adss">
                                        <label>Enter  Name</label>
                                        <input type="text" class="form-control " name="name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 input-group-adss" style="display: none">
                                        <label>Learning User</label>
                                        <input type="text" class="form-control " name="learning_user" value="student">
                                        @error('learning_user')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 input-group-adss">
                                        <label>PDF</label>
                                        <input type="file" class="form-control file-input-adss" name="pdf" accept=".pdf">
                                        @error('pdf')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 input-group-adss">
                                        <label>Video</label>
                                        <input type="file" class="form-control file-input-adss " name="video">
                                        @error('video')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 input-group-adss">
                                        <label>Youtube Link</label>
                                        <input type="text" class="form-control " name="youtube_link">
                                        @error('youtube_link')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-2 mt-md-3"><button type="submit" class="btn btn-info  w-100">Submit</button>
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

