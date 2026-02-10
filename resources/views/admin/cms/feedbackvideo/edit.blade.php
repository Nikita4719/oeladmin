@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Edit Feedback Video</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4 title-section-adss">
                                    <h3>Edit Feedback Video</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row" action="{{ route('update-feedbackvideo', $feedbackvideo->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12 input-group-adss">
                                        <label>Category <span class="text-danger">*</span></label>
                                        <select name="category" class="form-control" required>
                                            <option value="">Select Category</option>
                                            <option value="Students" {{ $feedbackvideo->category == 'Students' ? 'selected' : '' }}>Students</option>
                                            <option value="Recruitment Partners" {{ $feedbackvideo->category == 'Recruitment Partners' ? 'selected' : '' }}>Recruitment Partners</option>
                                            <option value="Partner Institutions" {{ $feedbackvideo->category == 'Partner Institutions' ? 'selected' : '' }}>Partner Institutions</option>
                                        </select>
                                        @error('category')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 input-group-adss">
                                        <label>Video <span class="text-danger">*</span> </label>
                                        <input type="file" name="video" class="form-control file-input-adss mb-4" maxlength="200"  />
                                        @error('video')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        @if ($feedbackvideo->video_url)
                                         <video width="240" height="340" controls>
                                            <source src="{{ asset('video/'.$feedbackvideo->video_url) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                          </video>
                                        @endif
                                    </div>
                                    <div class="col-md-12 input-group-adss">
                                        <label>Youtube Link  </label>
                                        <input type="text" name="youtube_link" class="form-control " maxlength="200" required placeholder="Enter youtube link " value="{{ $feedbackvideo->youtube_link }}" />
                                        @error('youtube_link')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 input-group-adss">
                                        <label>Meta Tags  </label>
                                        <input type="text" name="meta_tag" class="form-control " maxlength="200" required placeholder="Enter Meta Tags " value="{{ $feedbackvideo->meta_tag }}" />
                                        @error('meta_tag')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 input-group-adss">
                                        <label>Meta Description  </label>
                                        <textarea name="meta_description"  class="form-control" placeholder="Enter Meta Description"  cols="20" rows="5">{{ $feedbackvideo->meta_description }}</textarea>
                                        @error('meta_description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 input-group-adss">
                                        <label>Status<span class="text-danger">*</span></label>
                                        <select name="status" class="form-control" required>
                                            <option value="1" {{ $feedbackvideo->status == 1 ? 'selected' : '' }}>Publish</option>
                                            <option value="0" {{ $feedbackvideo->status == 0 ? 'selected' : '' }}>Unpublish</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 d-flex justify-content-center"><button type="submit" class="btn btn-info w-25">Submit</button>
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

