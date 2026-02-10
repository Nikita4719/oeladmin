@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Visa Type</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4 title-section-adss">
                                    <h3>
                                        Edit Visa Type</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row" action="{{ route('update-faq',$faq->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12 input-group-adss">
                                        <label>FAQ Question<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="faq_question" value="{{ $faq->faq_question }}">
                                        @error('faq_question')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 input-group-adss">
                                        <label>FAQ Answer<span class="text-danger">*</span></label>
                                        <textarea class="form-control " name="faq_answer">{{ $faq->faq_answer }}</textarea>
                                        @error('faq_answer')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 input-group-adss">
                                        <label>Status<span class="text-danger">*</span></label>
                                        <select name="status" class="form-control ">
                                            <option value="1" {{ $faq->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $faq->status == 0 ? 'selected' : '' }}>Inactive</option>
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
