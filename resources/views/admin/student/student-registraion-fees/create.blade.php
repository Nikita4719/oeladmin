@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Manage Student Registration Fees</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4">
                                    <h3>
                                        Add Student Registration Fees</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row g-4" action="{{ route('store-student-registration-fees') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label>Fee Type</label>
                                        <input type="text" class="form-control " name="fees_type" >
                                        @error('fees_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label>Enter Fees Amount</label>
                                        <input type="number" class="form-control " name="fees_amount" placeholder="" >
                                        @error('fees_amount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12"><button type="submit" class="btn btn-info  py-6">Submit</button>
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
        ['#summernote1', '#summernote2', '#summernote4','#summernote3','#summernote5'].forEach(function(id) {
            $(id).summernote({
                placeholder: ' Write Here',
                tabsize: 2,
                height: 100
            });
        });
    </script>
@endsection
