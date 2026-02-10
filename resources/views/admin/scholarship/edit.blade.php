@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Manage Student Scholarship</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4">
                                    <h3>
                                        Edit Student Scholarship</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="row g-4" method="POST" action="{{ route('update-scholarship', $scholarship->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-4 col-sm-4">
                                        <label class="control-label">Scholarship name <span style="color:#F00">*</span></label>
                                        <input type="text" class="form-control " name="heading" value="{{ $scholarship->heading }}" placeholder="Enter scholarship name">
                                        @error('heading')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label class="control-label">University / College Name <span style="color:#F00">*</span></label>
                                        <select name="universty_id" id="universty_id" class="form-control ">
                                            <option value=""> --Select University / College Name--</option>
                                            @foreach ($university as $item)
                                                <option value="{{ $item->id }}" {{ ($item->id == $scholarship->universty_id) ? 'selected' : '' }}>{{ $item->university_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('universty_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label class="control-label">Program Name</label>
                                        <select name="course_id" class="form-control " id="program_id_select">
                                            <option value="">--Select Program Name--</option>
                                            @foreach ($program as $program)
                                                <option value="{{ $program->id }}" {{ ($program->id == $scholarship->course_id) ? 'selected' : '' }}>{{ $program->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('course_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label">Scholarship Details <span style="color:#F00">*</span></label>
                                        <textarea id="summernote1" name="content" class="form-control " >{{ $scholarship->content }}</textarea>
                                        @error('content')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label class="control-label">Scholarship type <span style="color:#F00">*</span></label>
                                        <input type="text" class="form-control " name="scholarship_type" value="{{ $scholarship->scholarship_type }}" placeholder="Enter scholarship type eg: Private/Goverment" >
                                        @error('scholarship_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-4 ">
                                        <label class="control-label">Offered By <span style="color:#F00">*</span></label>
                                        <input type="text" class="form-control " name="offered_by" value="{{ $scholarship->offered_by }}" placeholder="Enter offered by" >
                                        @error('offered_by')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label class="control-label">Application Dead Line</label>
                                        <input type="date" class="form-control" name="application_dead_line" value="{{ $scholarship->application_dead_line }}" placeholder="Enter application dead line e.g: Date / NA">
                                        <span class="text-danger">@error('application_dead_line'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label class="control-label">Number Of Scholarship</label>
                                        <input type="number" class="form-control " name="no_of_scholarship" value="{{ $scholarship->no_of_scholarship }}" placeholder="Enter number of scholarship">
                                        <span class="text-danger">@error('no_of_scholarship'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label class="control-label">Scholarship Amount</label>
                                        <input type="number" class="form-control " name="scholarship_amount" value="{{ $scholarship->scholarship_amount }}" placeholder="Enter scholarship amount e.g : $100 OR Variable Amount">
                                        <span class="text-danger">@error('scholarship_amount'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label class="control-label">Level Of Study</label>
                                        <input type="text" class="form-control " name="level_of_study" value="{{ $scholarship->level_of_study }}" placeholder="Enter Level Of Study">
                                        @error('level_of_study')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label class="control-label">Organization</label>
                                        <input type="text" class="form-control " name="organization" value="{{ $scholarship->organization }}" placeholder="Enter Organizationt name">
                                        @error('organization')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label class="control-label">Renewability</label>
                                        <select name="renewability" class="form-control ">
                                        <option value="Yes" {{ ($scholarship->renewability == 'Yes') ? 'selected' : '' }}>Yes</option>
                                        <option value="No" {{ ($scholarship->renewability == 'No') ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('renewability')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label class="control-label">International Student Eligibility</label>
                                        <select name="international_student_eligibility" class="form-control ">
                                            <option value="Yes" {{ ($scholarship->international_student_eligibility == 'Yes') ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ ($scholarship->international_student_eligibility == 'No') ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Eligibility Criteria</label>
                                        <textarea class="form-control " name="eligibility_criteria" rows="8" id="summernote2" placeholder="Enter Eligibility Criteria">{{ $scholarship->eligibility_criteria }}</textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Application Process</label>
                                        <textarea class="form-control " name="application_process" id="summernote3" rows="8" placeholder="Enter Application Process">{{ $scholarship->application_process }}</textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Selection Process</label>
                                        <textarea class="form-control " name="selection_process" id="summernote4" rows="8" placeholder="Enter Selection Process">{{ $scholarship->selection_process }}</textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <label class="control-label">Grant Process</label>
                                        <textarea class="form-control " name="grant_process" id="summernote5" rows="8" placeholder="Enter Grant Process">{{ $scholarship->grant_process }}</textarea>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <label class="control-label">Status</label>
                                        <select name="status" id="status" class="form-control ">
                                            <option value=""> --Select Status--</option>
                                            <option value="1" {{ ($scholarship->status == '1') ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ ($scholarship->status == '0') ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-8 mt-5"><button type="submit" class="btn btn-info  py-6">Submit</button>
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
