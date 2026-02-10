@extends('admin.include.app')
@section('style')
    <style>
        .octicon.octicon-light-bulb {
            position: absolute;
            left: 31px;
            top: 43px;
            font-size: 12px;
            width: 99%;
            text-align: center;
        }
        .dropdown-menu{
        min-width: 900px !important;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}">
@endsection
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Student Profile</h4>
                </div>
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        <h4 class="text-center">{{ session('message') }}</h4>
                    </div>
                @endif

                <div class="card-body">
                    <div class="wizard">
                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title=" General Information ">
                                <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step1" id="step1-tab"   data-bs-toggle="tab" role="tab" aria-controls="step1"
                                    aria-selected="true"> 1 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">General Information </span>
                            </li>
                            <li class="nav-item flex-fill education_data" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Educaton History">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step2" id="step2-tab"   data-bs-toggle="tab" role="tab" aria-controls="step2"
                                    aria-selected="false"> 2 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Educaton History</span>
                            </li>
                            <li class="nav-item flex-fill experience" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Work Experience">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step3" id="step3-tab"   data-bs-toggle="tab" role="tab" aria-controls="step3"
                                    aria-selected="false"> 3 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Work Experience</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Test Score">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step4" id="step4-tab"    data-bs-toggle="tab" role="tab" aria-controls="step4"
                                    aria-selected="false"> 4 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Test Score</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="BackGround Information">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step5" id="step5-tab"   data-bs-toggle="tab" role="tab" aria-controls="step5"
                                    aria-selected="false"> 5 </a>
                                <br>
                                <span class="octicon octicon-light-bulb">BackGround Information</span>
                            </li>
                            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Document">
                                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center"
                                    href="#step6" id="step6-tab"   data-bs-toggle="tab" role="tab" aria-controls="step6"
                                    aria-selected="false"> 6
                                </a>
                                <br>
                                <span class="octicon octicon-light-bulb">Document</span>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4">
                                    <h5>General Information</h5>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input
                                                    value="{{ $about_student->first_name ?? old('first_name') }}"
                                                    name="first_name" type="text" class="form-control"
                                                    placeholder="Name" autocomplete="first_name">
                                                <label for="lead-first_name" class="form-label text-danger">First Name *</label>
                                                <span class="text-danger first_name"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input type="hidden" name="tab1" value="tab1">
                                                <input  name="middle_name" type="text"
                                                    class="form-control"
                                                    value="{{ $about_student->middle_name ?? old('middle_name') }}"
                                                    placeholder="Middle Name" autocomplete="middle_name">
                                                <label for="lead-middle_name" class="form-label">Middle Name</label>
                                                <span class="text-danger middle_name"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input  name="last_name" type="text"
                                                    class="form-control"
                                                    value="{{ $about_student->last_name ?? old('last_name') }}"
                                                    placeholder="Last Name" autocomplete="last_name">
                                                <label for="lead-last_name" class="form-label">Last Name*</label>
                                                <span class="text-danger last_name"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input  name="email" type="text"
                                                    class="form-control"
                                                    value="{{ $about_student->email ?? old('email') }}"
                                                    placeholder="Email" autocomplete="Email">
                                                <label for="lead-last_name" class="form-label text-danger">Email*</label>
                                                <span class="text-danger email-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <select class="form-control" name="gender" >
                                                    <option value="">-- Select Gender --</option>
                                                    <option value="Male"
                                                        {{ ($about_student->gender ?? old('gender')) == 'Male' ? 'selected' : '' }}>
                                                        Male</option>
                                                    <option value="Female"
                                                        {{ ($about_student->gender ?? old('gender')) == 'Female' ? 'selected' : '' }}>
                                                        Female</option>
                                                    <option value="Other"
                                                    {{ ($about_student->gender ?? old('gender')) == 'Other' ? 'selected' : '' }}>
                                                    Other</option>
                                                </select>
                                                <span class="text-danger gender"></span>
                                                <label for="lead-source" class="form-label text-danger">Gender *</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <select class="form-control" name="maritial_status" >
                                                    <option value="">-- Maritial Status --</option>
                                                    <option value="Single"
                                                        {{ ($about_student->maritial_status ?? old('maritial_status')) == 'Single' ? 'selected' : '' }}>
                                                        Single</option>
                                                    <option value="Married"
                                                        {{ ($about_student->maritial_status ?? old('maritial_status')) == 'Married' ? 'selected' : '' }}>
                                                        Married</option>
                                                    <option value="Widowed"
                                                        {{ ($about_student->maritial_status ?? old('maritial_status')) == 'Widowed' ? 'selected' : '' }}>
                                                        Widowed</option>
                                                    <option value="Divorced"
                                                        {{ ($about_student->maritial_status ?? old('maritial_status')) == 'Divorced' ? 'selected' : '' }}>
                                                        Divorced</option>
                                                </select>
                                                <label for="lead-source" class="form-label">Maritial Status</label>
                                                <span class="text-danger maritial_status"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4 mt-3">
                                            <div class="form-floating">
                                                <select class="form-control" name="passport_status" id="passport_status"
                                                    placeholder="Passport Status">
                                                    <option value="">-- Select --</option>
                                                    <option value="I have"
                                                        {{ ($about_student->passport_status ?? old('passport_status')) == 'I have' ? 'selected' : '' }}>
                                                        I have</option>
                                                    <option value="I do not have"
                                                        {{ ($about_student->passport_status ?? old('passport_status')) == 'I do not have' ? 'selected' : '' }}>
                                                        I do not have</option>
                                                    <option value="I have applied"
                                                        {{ ($about_student->passport_status ?? old('passport_status')) == 'I have applied' ? 'selected' : '' }}>
                                                        I have applied</option>
                                                </select>
                                                <label for="lead-source" class="form-label">Passport Status</label>
                                                <span class="text-danger passport_status"></span>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-3" style="display: none" id="passport_number">
                                            <div class="form-floating">
                                                <input  name="passport_number"
                                                    value="{{ $about_student->passport_number ?? old('passport_number') }}"
                                                    type="text" class="form-control" placeholder="Middle Name"
                                                    autocomplete="passport-number" pattern="[A-Za-z0-9]" title="Only letters and numbers are allowed">
                                                <label for="lead-passport-number" class="form-label">Passport
                                                    Number</label>
                                                <span class="text-danger passport_number"></span>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-3" style="display: none" id="passport_document">
                                            <div class="form-floating">
                                                <input  name="passport_document"
                                                    value="{{ $about_student->passport_document ?? old('passport_document') }}"
                                                    type="file" class="form-control"
                                                    >

                                                    @if($about_student->passport_document)
                                                        <img src="{{asset( $about_student->passport_document)}}" alt="Passport Document" class="img-thumbnail mt-2" style="max-width: 100%; height: 40px;">
                                                    @endif
                                                    <label for="lead-passport-number" class="form-label">Passport
                                                    Document</label>
                                                <span class="text-danger passport_document"></span>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-3" style="display: none" id="passport_expiry">
                                            <div class="form-floating">
                                                <input  name="passport_expiry"
                                                    value="{{ $about_student->passport_expiry ?? old('passport_expiry') }}"
                                                    type="date" class="form-control" placeholder="Passport Expiry Date"
                                                    autocomplete="off" min="{{ now()->toDateString() }}">
                                                <label for="passport_expiry" class="form-label">Passport Expiry Date</label>
                                                <span class="text-danger">{{ $errors->first('passport_expiry') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-3">
                                            <div class="form-floating">
                                                <input name="dob" type="date" class="form-control"
                                                    value="{{ $about_student->dob ?? old('dob') }}" max="{{ now()->subYears(12)->toDateString() }}" >
                                                <label for="lead-passport-number" class="form-label text-danger">Date of Birth *</label>
                                                <span class="text-danger dob"></span>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-3">
                                            <div class="form-floating">
                                                <input name="first_language" type="text"
                                                    value="{{ $about_student->first_language ?? old('first_language') }}"
                                                    class="form-control" >
                                                <label for="lead-passport-number" class="form-label">First
                                                    Language</label>
                                                <span class="text-danger first_language "></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 mt-3">
                                        <h5>Address Details</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <select class="form-control country" name="country_id" >
                                                    <option value="">-- Select Country --</option>
                                                    @foreach ($countries as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ ($about_student->country_id ?? old('country_id')) == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="lead-source" class="form-label">Country</label>
                                                <span class="text-danger country_id "></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                @php
                                                    $state = DB::table('province')
                                                        ->where('id', $about_student->province_id)
                                                        ->first();
                                                @endphp
                                                <select name="province_id"
                                                    class="form-control province_id" required>
                                                    @if (!empty($about_student->province_id))
                                                        <option value="{{ $about_student->province_id }}"
                                                            {{ ($about_student->province_id ?? old('province_id')) == $state->id ? 'selected' : '' }}>
                                                            {{ $state->name }}</option>
                                                    @endif
                                                </select>
                                                <label for="lead-source" class="form-label">State/Provision </label>
                                            </div>
                                            <span class="text-danger province_id_error"></span>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input name="city" type="text"
                                                    value="{{ $about_student->city ?? old('city') }}"
                                                    class="form-control" >
                                                <label for="lead-city" class="form-label">City</label>
                                                <span class="text-danger city"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input name="address" type="text"
                                                    value="{{ $about_student->address ?? old('address') }}"
                                                    class="form-control" >
                                                <label for="lead-address" class="form-label">Address</label>
                                                <span class="text-danger address"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating">
                                                <input name="zip" type="text" class="form-control"
                                                    value="{{ $about_student->zip ?? old('zip') }}" >
                                                <label for="lead-address" class="form-label">Pincode</label>
                                                <span class="text-danger zip"></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex float-end">
                                    <a class="btn btn btn-primary next px-5 mt-4">Continue<span
                                            class="spinner-grow spinner-grow-sm d-none " role="status"
                                            aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade " role="tabpanel" id="step2" aria-labelledby="step2-tab">
                                <div class="mb-4">
                                    <h5>Education History</h5>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="col-6 mt-2">
                                            <div class="form-floating">
                                                <select class="form-control selected-country" name="pref_countries">
                                                    <option value="">-- Select Country --</option>
                                                    @foreach ($countries as $item)
                                                        <option value="{{ $item->id }}"
                                                        {{ (isset($about_student->pref_countries) &&  $about_student->pref_countries == $item->id) || (old('pref_countries') == $item->id) ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="lead-source text-danger" class="form-label">Country*</label>
                                                <span class="text-danger pref_countries"></span>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <div class="form-floating">
                                                <select class="form-control education_level_id" name="education_level_id"
                                                    >
                                                    <option value="">-- Highest Education Level--</option>
                                                    @foreach ($progLabel as $item)
                                                        <option value="{{ $item->id }}" {{ (isset($education_history->education_level_id) && $education_history->education_level_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="lead-source" class="form-label text-danger">Highest Education Level*</label>
                                                <span class="text-danger education_level_id_error"></span>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-12 m-2 program_sub_level">

                                    </div>
                                    <div class="col-12 m-2 program_sub_level_error">
                                        <span class="text-danger program_sub_level_error"></span>
                                    </div>

                                    <div class="col-12 m-2">
                                        <label> <input type="checkbox" name="graduated_recently" value="Yes">Graduated
                                            from most recent school</label>
                                    </div>
                                </form>
                                <div class="school-attended">

                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="card-stretch-full">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4>Schools Attended</h4>
                                                </div>
                                                <div class="col-md-6 ">
                                                     {{-- class="last_attended" --}}
                                                    <div data-tour="search"
                                                        data-bs-toggle="offcanvas" data-bs-target="#viewlead"
                                                        aria-controls="viewlead"
                                                        student-id="{{ $about_student->user_id ?? null }}">
                                                        <button type="button" class="btn btn-primary float-end last_attended_school"
                                                            aria-controls="exampleOffcanvas">
                                                            Last Attended School <i
                                                                class="las la-hands-helping"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-modern table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="1"> SNo</th>
                                                        <th>Documents</th>
                                                        <th> Name</th>
                                                        <th> Language</th>
                                                        <th> AttendedFrom</th>
                                                        <th> AttendedTo</th>
                                                        <th> Degree</th>
                                                        <th> DegreeOn</th>
                                                        <th> Country</th>
                                                        <th> Province</th>
                                                        <th> City/Town</th>
                                                        <th> Address</th>
                                                        <th> Postal/Zip</th>
                                                        <th> Grading Scheme</th>
                                                        <th> Grading Score</th>
                                                        <th> Edit </th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                <tbody class="last-attended-school">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex float-end mt-3">
                                    <a class="btn btn btn-warning previous px-5 mx-2"> Back</a>
                                    <a class="btn btn btn-primary next school px-5">Continue
                                        <span class="spinner-grow spinner-grow-sm d-none" role="status"
                                            aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade " role="tabpanel" id="step3" aria-labelledby="step3-tab">
                                <div class="mb-4">
                                    <h5>Work Experience</h5>
                                </div>
                                <form>
                                    <div class="row mb-3">
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input " type="radio" name="work_experience" id="work_experience_1" value="1"  @if ($about_student->work_experience == 1) checked @endif>
                                                <label class="form-check-label" for="work_experience_1">Yes, I have work experience</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="work_experience" id="work_experience_0" value="0" @if ($about_student->work_experience == 0) checked @endif >
                                                <label class="form-check-label" for="work_experience_0">No, I have not any work experience</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 experience_details" style="display: none">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input
                                                    value="{{ $about_student->organization_name ?? old('organization_name') }}"
                                                    name="organization_name" type="text" class="form-control"
                                                    placeholder="Name of Organization" autocomplete="organization_name">
                                                <label for="organization_name" class="form-label">Name of Organization</label>
                                                <span class="text-danger organization_name"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="hidden" name="tab3" value="tab3">
                                                <input  name="position" type="text"
                                                    class="form-control"
                                                    value="{{ $about_student->position ?? old('position') }}"
                                                    placeholder="Position" autocomplete="position">
                                                <label for="position" class="form-label">Position</label>
                                                <span class="text-danger position"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 experience_details"  style="display: none">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input
                                                    value="{{ $about_student->job_profile ?? old('job_profile') }}"
                                                    name="job_profile" type="text" class="form-control"
                                                    placeholder="Job Profile" autocomplete="job_profile">
                                                <label for="job_profile" class="form-label">Job Profile</label>
                                                <span class="text-danger job_profile"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input  name="working_from" type="date"
                                                    class="form-control"
                                                    value="{{ $about_student->working_from ?? old('working_from') }}"
                                                    placeholder="Working From" autocomplete="working_from">
                                                <label for="working_from" class="form-label">Working From</label>
                                                <span class="text-danger working_from"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 experience_details"  style="display: none">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input
                                                    value="{{ $about_student->working_upto ?? old('working_upto') }}"
                                                    name="working_upto" type="date" class="form-control"
                                                    placeholder="Working Upto" autocomplete="working_upto">
                                                <label for="lead-working_upto" class="form-label">Working Upto</label>
                                                <span class="text-danger working_upto"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input  name="mode_of_selary" type="text"
                                                    class="form-control"
                                                    value="{{ $about_student->mode_of_selary ?? old('mode_of_selary') }}"
                                                    placeholder="Middle Name" autocomplete="mode_of_selary">
                                                <label for="mode_of_selary" class="form-label">Mode Of Salary</label>
                                                <span class="text-danger mode_of_selary"></span>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-3">
                                            <div class="form-floating">
                                                <input  name="working_experience_document" type="file"
                                                    class="form-control"
                                                    value="{{ $about_student->working_experience_document ?? old('working_experience_document') }}"
                                                    >
                                                <label for="working_experience_document" class="form-label">Working Experience Document</label>
                                                <span class="text-danger working_experience_document"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 experience_details"  style="display: none">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="working_status" id="working_status1" value="1" {{ isset($about_student->working_status) && $about_student->working_status == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="working_status1">
                                                  I am working here
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="working_status" id="working_status2" value="2" {{ isset($about_student->working_status) && $about_student->working_status == 2 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="working_status2">
                                                  I am not working here
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex float-end mt-4">
                                    <a class="btn btn btn-warning previous me-2 px-4"> Back</a>
                                    <a class="btn btn btn-primary next px-4">Continue
                                        <span class="spinner-grow spinner-grow-sm d-none" role="status"
                                            aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step4" aria-labelledby="step4-tab">
                                <div class="mb-4">
                                    <h5>Test Score</h5>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="card-stretch-full">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4>Test Score</h4>
                                                </div>
                                                <div class="col-md-8 ">
                                                    <div class="d-flex float-end">
                                                        <a href="" class="btn btn-primary btn-sm mx-1" class="last_attended" data-tour="search"
                                                        data-bs-toggle="offcanvas" data-bs-target="#gre_exam"
                                                        aria-controls="gre_exam">GRE exam scores</a>
                                                        <a href="" class="btn btn-primary btn-sm mx-1"  data-tour="search"
                                                        data-bs-toggle="offcanvas" data-bs-target="#gmat"
                                                        aria-controls="gmat">GMAT exam scores</a>
                                                        <a href="" class="btn btn-primary btn-sm mx-1"
                                                        data-tour="search"  data-bs-toggle="offcanvas" data-bs-target="#testscrores"
                                                        aria-controls="testscrores">Add Test Score</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-modern table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>Exam Type</th>
                                                        <th>Date of Exam</th>
                                                        <th>Listening/Verbal</th>
                                                        <th>Writing</th>
                                                        <th>Reading/Quantitative</th>
                                                        <th>Speaking</th>
                                                        <th>Average</th>
                                                        <th></th>
                                                        <th>Document</th>
                                                        <th>Action</th>
                                                       

                                                    </tr>
                                                </thead>
                                                <tbody class="test-score">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex float-end mt-4">
                                    <a class="btn btn-warning previous me-2 px-4">Previous</a>
                                    <a class="btn btn-primary skipform px-4" data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none"
                                            role="status" aria-hidden="true"></span> continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step5" aria-labelledby="step5-tab">
                                <div class="mb-4">
                                    <h5>Background Information</h5>
                                </div>
                                <div class="alert-image-error"> </div>
                            <form>
                                <div class="col-12">
                                    <label>
                                        <b>Have you been refused a visa from Canada, the USA, the United Kingdom, New Zealand or Australia?</b>
                                    </label>
                                        <div class="col-12">
                                            <label>
                                                <input type="radio" name="ever_refused_visa" value="Yes"  {{ $about_student->ever_refused_visa === "Yes" ? 'checked' : '' }} onclick="showVisaDetails(this.value)">
                                                &nbsp; Yes &nbsp;&nbsp;&nbsp;</label><label>
                                                <input type="radio" name="ever_refused_visa" value="No" {{ $about_student->ever_refused_visa === "No" ? 'checked' : '' }} onclick="showVisaDetails(this.value)">&nbsp; No</label>
                                                <span class="text-danger ever_refused_visa"></span>
                                        </div>
                                        <div class="col-12 visa_details_info" style="display: {{ $about_student->ever_refused_visa === "Yes" ? 'block' : 'none' }};">
                                            <div class="form-floating">
                                                <input name="visa_details" value="{{ $about_student->visa_details ?? null }}"  type="text" class="form-control" >
                                                <label for="lead-address" class="form-label">Visa Details</label>
                                                <span class="text-danger visa_details"></span>
                                            </div>
                                        </div>
                                        <div class="col-12 visa_details_info mt-2" style="display: {{ $about_student->ever_refused_visa === "Yes" ? 'block' : 'none' }};" >
                                            <div class="form-floating">
                                                <input name="visa_documents" value="{{ $about_student->visa_documents ?? null }}"  type="file" class="form-control" >
                                                <label for="lead-address" class="form-label">Upload Documents</label>
                                                <span class="text-danger visa_details"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-2">
                                        <input type="hidden" name="tab5" value="tab5" >
                                        <label><b>Do you have a valid Study Permit / Visa?</b></label>
                                        <label>
                                        <input type="radio" name="has_visa" value="1" {{ $about_student->has_visa == "1" ? 'checked' : '' }} onclick="studypermit(this.value)">&nbsp; Yes &nbsp;&nbsp;&nbsp;</label><label>
                                        <input type="radio" name="has_visa" value="0" {{ $about_student->has_visa == "0" ? 'checked' : '' }} onclick="studypermit(this.value)">&nbsp; No</label>
                                        <span class="text-danger has_visa"></span>
                                    </div>
                                    <br>
                                    <div class="col-12 study_permit" style="display: {{ $about_student->has_visa == "1" ? 'block' : 'none' }};">
                                        <div class="form-floating">
                                            <input name="study_permit" value="{{ $about_student->study_permit ?? null }}"  type="text" class="form-control" >
                                            <label for="lead-address" class="form-label">Study Permit  Details</label>
                                            <span class="text-danger study_permit"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 study_permit mt-2" style="display: {{ $about_student->has_visa == "1" ? 'block' : 'none' }};">
                                        <div class="form-floating">
                                            <input name="study_permit_documents" value="{{ $about_student->study_permit_documents ?? null }}"  type="file" class="form-control" >
                                            <label for="lead-address" class="form-label">Upload Documents</label>
                                            <span class="text-danger visa_details"></span>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- <div class="col-12 mb-3">
                                        <div class="form-floating">
                                            <select class="form-control  selectpicker" name="subject_input"
                                                id="lead-subject_input" multiple placeholder="Education Level">
                                                @foreach ($all_subject as $item)
                                                    @php
                                                        $selected = '';
                                                        if ($about_student->pref_subjects !== null && $about_student->pref_subjects !== '') {
                                                            $selected = in_array($item->id, explode(',', $about_student->pref_subjects)) ? 'selected' : '';
                                                        }
                                                    @endphp
                                                    <option value="{{ $item->id }}" {{ $selected }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="lead_documents_id" class="form-label">Subject</label>
                                            <span class="text-danger subject_input"></span>
                                        </div>
                                    </div> --}}
                                </form>
                                <div class="d-flex float-end">
                                    <a class="btn btn-warning previous me-2 px-4">Previous</a>
                                    <a class="btn btn-primary next  px-4" data-bs-toggle="modal"
                                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none"
                                            role="status" aria-hidden="true"></span>Continue</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="step6" aria-labelledby="step6-tab">
                                <div class="mb-4">
                                    <h5>Documents</h5>
                                </div>

                                <form id="document">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <select class="form-control " name="visa_document_type" id="lead-visa_document_type" placeholder="Document Type">
                                                    <option value="">--Select--</option>
                                                   

                                                 </select>
                                                <label for="lead-source" class="form-label">Document Type</label>
                                                <span class="text-danger visa_document_type"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="file"  class="form-control " name ="document[]" id="lead-document" multiple placeholder="Document">
                                                <input type="hidden" name="tab6" value="tab6">
                                                <label for="lead-address" class="form-label">Document</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-md-12 mt-2">
                                    <div class="card-stretch-full">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4>Document List</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="responseMessage"></div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-modern table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Student Id</th>
                                                        <th>Type</th>
                                                        <th>Image Name</th>
                                                        <th>Image</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="documents-data">
                                                    @foreach ($student_document as $item)

                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex float-end mt-4">
                                    <a class="btn btn-warning previous me-2 px-4">Previous</a>
                                    <a class="btn btn-primary documentForm px-5"><span class="spinner-grow spinner-grow-sm d-none"
                                            role="status" aria-hidden="true"></span>Save</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="offcanvas offcanvas-end border-0 " style="width: 40%" tabindex="-1" id="viewlead">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>Last Attended School</h5>
            </div>
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div id="responseMessage"></div>
                <div class="card-stretch-full">
                    <div class="row g-4">
                        <form id="myForm">
                            <div class="col-12 ">
                                <div class="form-floating">
                                    <select class="form-control lead_documents_id" name="lead_documents_id"
                                        id="lead_documents_id" placeholder="Education Level">
                                        <option> --Select Document--</option>
                                    </select>
                                    <label for="lead_documents_id" class="form-label"> Select Documents</label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="name" type="text" id="institue_name"
                                        class="form-control " placeholder="Institute Name" autocomplete="name"
                                        value=""><label for="lead-name" class="form-label">Institute Name</label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="primary_language" type="text"
                                        class="form-control " id="primary_language" placeholder="Primary Language for Instruction"
                                        autocomplete="primary_language" value=""><label for="lead-primary_language"
                                        class="form-label">Primary Language for Instruction</label></div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="attended_from" type="date" class="form-control" id="attended_from"
                                           placeholder="Attended Institute From" autocomplete="attended_from" value="">
                                    <label for="lead-attended_from" class="form-label">Attended Institute From</label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="attended_to" type="date" class="form-control" id="attended_to"
                                           placeholder="Attended Institute To" autocomplete="attended_to" value="">
                                    <label for="lead-attended_to" class="form-label">Attended Institute To</label>
                                </div>
                            </div>



                            <div class="col-12 mt-2">
                                <div class="form-floating"><input name="degree_awarded" type="text"
                                        class="form-control " id="degree_awarded" placeholder="Degree Awarded"
                                        autocomplete="degree_awarded" value=""><label for="lead-degree_awarded"
                                        class="form-label">Degree Awarded</label></div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="degree_awarded_on" type="date"
                                        class="form-control " id="degree_awarded_on" placeholder="Degree Awareded On"
                                        autocomplete="degree_awarded_on" value=""><label
                                        for="lead-degree_awarded_on" class="form-label">Degree Awareded On</label></div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    @php
                                    $grading_scheme = DB::table('grading_scheme')
                                            ->where('id', $education_history->grading_scheme_id ?? null)
                                            ->first();
                                    @endphp
                                <select name="grading_scheme_id" id="grading_scheme_id"
                                    class="form-control grading_scheme_id grading-scheme" >
                                        <option value="0-100"  grading-data= "0-100">out of 100</option>
                                        <option value="0-45"  grading-data= "0-45">out of 45</option>
                                        <option value="0-10"  grading-data="0-10">out of 10</option>
                                        <option value="0-7"  grading-data="0-7">out of 7</option>
                                        <option value="0-5"  grading-data="0-5">out of 5</option>
                                        <option value="0-4"  grading-data="0-4">out of 4</option>
                                        <option value="other" grading-data="other">Other</option>
                                </select>
                                     <label for="lead-source" class="form-label text-danger">Grading Scheme*</label>
                                    <span class="text-danger grading_scheme_id_error"></span>
                                </div>
                            </div>
                            <div class="col-12 mt-2" style="display: none" id="max_score" >
                                <div class="form-floating">
                                    <input name="max_score"  value="" type="number" class="form-control">
                                    <label for="lead-address" class="form-label">Max Score </label>
                                    <span class="text-danger max_score"></span>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="grading_average" id="lead-grading_number" value="" type="number" class="form-control">
                                    <input type="hidden" name="tab2" value="tab2">
                                    <label for="lead-address" class="form-label">Grading Score</label>
                                    <span class="text-danger grading_average"></span>
                                    <div id="grading_input_error" class="text-danger"  style="display: none;">Invalid grade. Please enter a value within the selected grading scheme.</div>
                                </div>
                            </div>
                            <h4 class="m-2">School Address</h4>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <select class="form-control country " name="country_id" id="country_id">
                                        <option value="">-- Select Country --</option>
                                        @foreach ($countries as $item)
                                            <option value="{{ $item->id }}"
                                                {{ (old('country_id')) == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="lead-country" class="form-label">Country Name</label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <select name="province_id" class="form-control province_id" id="province_id">
                                    <option value="">-State/Provision -</option>
                                </select>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating"><input name="city" type="text" id="city"
                                        class="form-control " placeholder="City/Town" autocomplete="city"
                                        value=""><label for="lead-city" class="form-label">City/Town</label></div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating"><input name="address" id="address" type="text"
                                        class="form-control " placeholder="Address" autocomplete="address"
                                        value=""><label for="lead-address" class="form-label">Address</label></div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating"><input name="postal_zip" id="postal_zip" type="text"
                                        class="form-control " placeholder="Postal Code/Zip"
                                        autocomplete="postal_zip" value=""><label for="lead-postal_zip"
                                        class="form-label">Postal Code/Zip</label></div>
                            </div>
                        </form>
                        <div class="col-md-12"><button type="button"
                        class="btn btn-info  py-6 last_attendence px-4 float-end">Submit<span
                                    class="spinner-grow spinner-grow-sm d-none" role="status"
                                    aria-hidden="true"></button>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- gre exam score  --}}
    <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="gre_exam">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>GRE exam scores</h5>
               <div class="responseMessage"></div>
            </div>
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div class="card-stretch-full">
                    <div class="row g-4">
                        <form id="greExam">
                            <label class="form-check-label" for="result_receive">Result Receive</label><br>
                            <div class="col-lg-12">
                                <div class="form-check ">
                                    <input class="form-check-input " id="result_receive1" type="radio" name="result_receive"  value="1"  @if (isset($additional_qualification) && $additional_qualification->result_receive == 1) checked @endif>
                                    <label class="form-check-label" for="result_receive1">Yes</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="result_receive"  value="0" @if (isset($additional_qualification) && $additional_qualification->result_receive  == 0) checked @endif >
                                    <label class="form-check-label" for="result_receive">No</label>
                                </div>
                            </div>

                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="date_of_exam" type="date" value="{{ $additional_qualification->date_of_exam ?? \Carbon\Carbon::now()->toDateString() }}" class="form-control ">
                                    <label for="lead-name" class="form-label">Exam Date</label>
                                </div>
                            </div>
                            <div class="row result_receive_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input type="hidden" name="type" value="GRE">
                                        <input name="verbal_score" type="number"  class="form-control gre_score"  value="{{$additional_qualification->verbal_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Verbal Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="verbal_rank" type="number"  class="form-control gre_score" value="{{$additional_qualification->verbal_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Verbal Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row result_receive_details" style="display:none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="quantitative_score" type="number"  class="form-control gre_score" value="{{$additional_qualification->quantitative_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Quantitative Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="quantitative_rank" type="number"  class="form-control gre_score" value="{{$additional_qualification->quantitative_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Quantitative Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row result_receive_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="writing_score" type="number"  class="form-control gre_score"  value="{{$additional_qualification->writing_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Writing Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="writing_rank" type="number"  class="form-control gre_score" value="{{$additional_qualification->writing_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Writing Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row result_receive_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="total_score" type="number"  class="form-control " value="{{$additional_qualification->total_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Total Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="total_rank" type="number"  class="form-control " value="{{$additional_qualification->total_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Total Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row result_receive_details" style="display: none">
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <input name="exam_document" type="file"  class="form-control gre_score" value="{{$additional_qualification->exam_document  ?? null}}">
                                        <label for="lead-name" class="form-label">Gre Exam Document</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12 float-end"><button type="button"
                            class="btn btn-info  py-6 greExam px-4 mt-2">Submit</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- gmat score  --}}
    <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="gmat">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>GMAT exam scores</h5>
               <div class="responseMessage"></div>
            </div>
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div class="card-stretch-full">
                    <div class="row g-4">
                        <form id="gmatform">
                            <label class="form-check-label" for="gmat_result_receive">Result Receive</label><br>
                            <div class="col-lg-12">
                                <div class="form-check ">
                                    <input class="form-check-input " id="gmat_result_receive1" type="radio" name="gmat_result_receive"  value="1"  @if ($gmat && $gmat->result_receive == 1) checked @endif>
                                    <label class="form-check-label" for="gmat_result_receive1">Yes</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="gmat_result_receive"  value="0" @if ($gmat && $gmat->result_receive == 0) checked @endif >
                                    <label class="form-check-label" for="gmat_result_receive">No</label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating">
                                    <input name="date_of_exam" type="date" value="{{ $gmat->date_of_exam ?? \Carbon\Carbon::now()->toDateString() }}" class="form-control ">
                                    <label for="lead-name" class="form-label">Exam Date</label>
                                </div>
                            </div>
                            <div class="row gmat_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input type="hidden" name="type" value="GMAT">
                                        <input name="verbal_score" type="number"  class="form-control gmat_score" value="{{$gmat->verbal_score ?? null}}">
                                        <label for="lead-name" class="form-label">Verbal Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="verbal_rank" type="number"  class="form-control gmat_score" value="{{$gmat->verbal_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Verbal Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row gmat_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="quantitative_score" type="number"  class="form-control gmat_score" value="{{$gmat->quantitative_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Quantitative Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="quantitative_rank" type="number"  class="form-control gmat_score" value="{{$gmat->quantitative_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Quantitative Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row gmat_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="writing_score" type="number"  class="form-control gmat_score"  value="{{$gmat->writing_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Writing Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="writing_rank" type="number"  class="form-control gmat_score" value="{{$gmat->writing_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Writing Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row gmat_details" style="display: none">
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="total_score" type="number"  class="form-control " value="{{$gmat->total_score  ?? null}}">
                                        <label for="lead-name" class="form-label">Total Score</label>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="form-floating">
                                        <input name="total_rank" type="number"  class="form-control " value="{{$gmat->total_rank  ?? null}}">
                                        <label for="lead-name" class="form-label">Total Rank</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row gmat_details" style="display: none">
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <input name="exam_document" type="file"  class="form-control gmat_score" value="{{$gmat->exam_document  ?? null}}">
                                        <label for="lead-name" class="form-label">Exam Document</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12"><button type="button"
                            class="btn btn-info  py-6 gmat">Submit</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{-- test Score --}}
     <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="testscrores">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>Add Test Score</h5>
                <div class="responseMessage"></div>
            </div>
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div class="card-stretch-full">
                    <div class="row g-4">
                        <form id="testscore">
                            <label class="form-check-label" for="eng_prof_level_result">Result Receive</label><br>
                            <div class="col-lg-12">
                                <div class="form-check ">
                                    <input class="form-check-input " id="eng_prof_level_result1" type="radio" name="eng_prof_level_result"  value="1"  >
                                    <label class="form-check-label" for="eng_prof_level_result1">Yes</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="eng_prof_level_result"  value="0"  >
                                    <label class="form-check-label" for="eng_prof_level_result">No</label>
                                </div>
                            </div>
                            <label class="form-check-label" for="result_receive">TOEFL/IELTS/PTE/DET Waiver</label><br>
                            <div class="col-lg-12">
                                <div class="form-check ">
                                    <input class="form-check-input "  type="radio" name="ielts_waiver"  value="1" >
                                    <label class="form-check-label" for="ielts_waiver">Yes</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" id="ielts_waiver" type="radio" name="ielts_waiver"  value="0" >
                                    <label class="form-check-label" for="ielts_waiver">No</label>
                                </div>
                            </div>
                            <div class="row " >
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <select class="form-control eng_prof_level" name="type" id="lead-type" placeholder="Exam Type">
                                            <option value="">--Select--</option>
                                            @foreach ($eng_prof_level as $item)
                                              <option value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="lead-name" class="form-label">Exam Type</label>
                                        <span class="text-danger type"></span>
                                    </div>
                                </div>
                                <input type="hidden" name="eng_prof_level_score" value="" id="eng_prof_level_score">
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <input id="lead-exam_date" name="exam_date" type="date" class="form-control " placeholder="Date of Exam" autocomplete="exam_date" value="">
                                        <label for="lead-name" class="form-label">Exam Date</label>
                                        <span class="text-danger exam_date"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-listening_score" name="listening_score" type="number" class="form-control eng_prof_score" placeholder="Listening" autocomplete="listening_score" value="">
                                        <label for="lead-name" class="form-label">Listening</label>
                                        <span class="text-danger listening_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-writing_score" name="writing_score" type="number" class="form-control eng_prof_score" placeholder="Writing" autocomplete="writing_score" value="">
                                        <label for="lead-name" class="form-label">Writing</label>
                                        <span class="text-danger writing_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-reading_score" name="reading_score" type="number" class="form-control eng_prof_score" placeholder="Reading" autocomplete="reading_score" value="">
                                        <label for="lead-name" class="form-label">Reading</label>
                                        <span class="text-danger reading_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-speaking_score" name="speaking_score" type="number" class="form-control eng_prof_score" placeholder="Speaking" autocomplete="speaking_score" value="">
                                        <label for="lead-name" class="form-label">Speaking</label>
                                        <span class="text-danger speaking_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-average_score" name="average_score" type="number" class="form-control eng_prof_score" placeholder="Average" autocomplete="average_score" value="">
                                        <label for="lead-name" class="form-label">Average</label>
                                        <span class="text-danger average_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-total_score" name="total_score" type="number" class="form-control " placeholder="Total Score" autocomplete="total_score" value="">
                                        <label for="lead-name" class="form-label">Total Score</label>
                                        <span class="text-danger total_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-exam_document" name="exam_document" type="file" class="form-control eng_prof_score" placeholder="Average" autocomplete="exam_document" value="">
                                        <label for="lead-name" class="form-label">Exam Document</label>
                                        <span class="text-danger exam_document"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 ielts_waiver_details" style="display: none">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  name="english_marks_check" value="1">
                                        <label class="form-check-label" for="checkbox12"> 12th English Marks </label>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 ielts_waiver_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="input_moi" name="english_marks"  type="number" class="form-control" placeholder="Out of 100" >
                                        <span class="text-danger english_marks"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 ielts_waiver_details" style="display: none">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  name="moi" value="1">
                                        <label class="form-check-label" for="moi"> Medium of Instruction (MOI)</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12"><button type="button"
                            class="btn btn-info  py-6 testscore">Submit</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- edit test score  --}}
      <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="testscroresedit">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>Edit Test Score</h5>
                <div class="responseMessage"></div>
            </div>
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div class="card-stretch-full">
                    <div class="row g-4">
                        <form id="testscoreedit">
                            <label class="form-check-label" for="eng_prof_level_result">Result Receive</label><br>
                            <div class="col-lg-12">
                                <div class="form-check ">
                                    <input class="form-check-input " id="eng_prof_level_result1_edit" type="radio" name="eng_prof_level_result_edit" value="1"   @if ($about_student && $about_student->eng_prof_level_result == 1) checked @endif>
                                    <label class="form-check-label" for="eng_prof_level_result1_edit">Yes</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input"  id="eng_prof_level_result0_edit" type="radio" name="eng_prof_level_result_edit" value="0"  @if ($about_student && $about_student->eng_prof_level_result == 0) checked @endif >
                                    <label class="form-check-label" for="eng_prof_level_result">No</label>
                                </div>
                            </div>
                            <label class="form-check-label" for="result_receive">IELTS Waiver</label><br>
                           
                            <div class="col-lg-12">
                                <div class="form-check ">
                                    <input class="form-check-input "  type="radio" id="ielts_waiver1_edit" name="ielts_waiver_edit"  value="1" @if (isset($about_student) && $about_student->ielts_waiver == 1) checked @endif>
                                    <label class="form-check-label" for="ielts_waiver">Yes</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" id="ielts_waiver_edit" type="radio" name="ielts_waiver_edit" value="0"  @if (isset($about_student) && $about_student->ielts_waiver  == 0) checked @endif >
                                    <label class="form-check-label" for="ielts_waiver">No</label>
                                </div>      
                            </div>

                            <div class="row " >
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <select class="form-control eng_prof_level" name="type_edit" id="lead_type_edit" placeholder="Exam Type">

                                        </select>
                                        <label for="lead-name" class="form-label">Exam Type</label>
                                        <span class="text-danger type"></span>
                                    </div>
                                </div>
                                <input type="hidden" name="eng_prof_level_score_edit" value="" id="eng_prof_level_score_edit">
                                <input type="hidden" name="update_test_score" value="update_test_score" >
                                <input type="hidden" name="test_score_id" id="test_score_id" >
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <input id="lead_exam_date_edit" name="exam_date_edit" type="date" class="form-control" placeholder="Date of Exam" autocomplete="exam_date" value="">
                                        <label for="lead-name" class="form-label">Exam Date</label>
                                        <span class="text-danger exam_date"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details_edit" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead_listening_score_edit" name="listening_score_edit" type="number" class="form-control eng_prof_score_edit" placeholder="Listening" autocomplete="listening_score" value="">
                                        <label for="lead-name" class="form-label">Listening</label>
                                        <span class="text-danger listening_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details_edit" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead_writing_score_edit" name="writing_score_edit" type="number" class="form-control eng_prof_score_edit" placeholder="Writing" autocomplete="writing_score" value="">
                                        <label for="lead-name" class="form-label">Writing</label>
                                        <span class="text-danger writing_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details_edit" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-reading_score_edit" name="reading_score_edit" type="number" class="form-control eng_prof_score_edit" placeholder="Reading" autocomplete="reading_score" value="">
                                        <label for="lead-name" class="form-label">Reading</label>
                                        <span class="text-danger reading_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details_edit" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead_speaking_score_edit" name="speaking_score_edit" type="number" class="form-control eng_prof_score_edit" placeholder="Speaking" autocomplete="speaking_score" value="">
                                        <label for="lead-name" class="form-label">Speaking</label>
                                        <span class="text-danger speaking_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details_edit" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead_average_score_edit" name="average_score_edit" type="number" class="form-control eng_prof_score_edit" placeholder="Average" autocomplete="average_score" value="">
                                        <label for="lead-name" class="form-label">Average</label>
                                        <span class="text-danger average_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead-total_score_edit" name="total_score_edit" type="number" class="form-control " placeholder="Total Score" autocomplete="total_score" value="">
                                        <label for="lead-name" class="form-label">Total Score</label>
                                        <span class="text-danger total_score"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 eng_prof_level_details_edit" style="display: none">
                                    <div class="form-floating">
                                        <input id="lead_exam_document_edit" name="exam_document_edit" type="file" class="form-control eng_prof_score_edit" placeholder="Average" autocomplete="exam_document" value="">
                                        <label for="lead-name" class="form-label">Exam Document</label>
                                        <span class="text-danger exam_document"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 ielts_waiver_details" style="display: none">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="english_marks_check" name="english_marks_check" value="1">
                                        <label class="form-check-label" for="checkbox12"> 12th English Marks </label>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 ielts_waiver_details" style="display: none">
                                    <div class="form-floating">
                                        <input  name="english_marks" type="number" id="english_marks" class="form-control" placeholder="Out of 100" >
                                        <span class="text-danger english_marks"></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 ielts_waiver_details" style="display: none">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="moi" name="moi" value="1">
                                        <label class="form-check-label" for="moi"> Medium of Instruction (MOI)</label>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <div class="col-md-12"><button type="button"
                            class="btn btn-info  py-6 testscore_edit">Submit</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const attendedFrom = document.getElementById('attended_from');
        const attendedTo = document.getElementById('attended_to');
        attendedFrom.addEventListener('change', function () {
            if (attendedFrom.value) {
                attendedTo.min = attendedFrom.value;
            } else {
                attendedTo.removeAttribute('min');
            }
        });
        attendedTo.addEventListener('change', function () {
            if (attendedTo.value < attendedFrom.value) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'The "Attended To" date cannot be earlier than the "Attended From" date.',
                });
                attendedTo.value = '';
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
          const gradingSchemeSelect = document.getElementById('grading_scheme_id');
          const gradingInput = document.getElementById('lead-grading_number');

          gradingSchemeSelect.addEventListener('change', function () {
              validateInput();
          });
          gradingInput.addEventListener('input', function () {
              validateInput();
          });
          function extractMaxGrade(value) {
              const match = value.match(/(\d+)$/);
              return match ? parseInt(match[0], 10) : null;
          }

          function validateInput() {
              const selectedOption = gradingSchemeSelect.options[gradingSchemeSelect.selectedIndex];
              const selectedScheme = selectedOption.getAttribute('grading-data');
              if(selectedScheme == 'other'){
                $('#max_score').show();
              }else{
                $('#max_score').hide();
              }
              const inputValue = gradingInput.value;
              if (selectedScheme && inputValue !== '') {
                  const maxGrade = extractMaxGrade(selectedScheme);
                  if (maxGrade && inputValue > maxGrade) {
                      gradingInput.classList.add('is-invalid');
                      $('#grading_input_error').show();
                  } else {
                      gradingInput.classList.remove('is-invalid');
                      $('#grading_input_error').hide();
                  }
              } else {
                  gradingInput.classList.remove('is-invalid');
                  $('#grading_input_error').hide();
              }
          }
          validateInput();
    });
    function showVisaDetails(value) {
        var visaDetails = document.getElementsByClassName('visa_details_info');
        if (value == 'Yes') {
            for (var i = 0; i < visaDetails.length; i++) {
                visaDetails[i].style.display = 'block';
            }
        } else {
            for (var i = 0; i < visaDetails.length; i++) {
                visaDetails[i].style.display = 'none';
            }
        }
    }
    function studypermit(value) {
        var visaDetails = document.getElementsByClassName('study_permit');
        if (value == '1') {
            for (var i = 0; i < visaDetails.length; i++) {
                visaDetails[i].style.display = 'block';
            }
        } else {
            for (var i = 0; i < visaDetails.length; i++) {
                visaDetails[i].style.display = 'none';
            }
        }
    }

    $(document).ready(function() {
        var passport_status = $('#passport_status').val();
        if(passport_status == 'I have') {
            $('#passport_number').show();
            $('#passport_expiry').show();
            $('#passport_document').show();
        }
    });
    $('#passport_status').change(function() {
        var passport_stauts=$(this).val();
        if($(this).val() == 'I have') {
            $('#passport_number').show();
            $('#passport_expiry').show();
            $('#passport_document').show();
        } else {
            $('#passport_number').hide();
            $('#passport_expiry').hide();
            $('#passport_document').hide();
        }
    });
</script>
    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script>
        $(document).ready(function() {
            var assetBaseUrl = "{{ asset('') }}/";
            function setupCSRF() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }
            function ajaxRequest(url, type, data, successFunction) {
                setupCSRF();
                $.ajax({
                    url: url,
                    method: type,
                    data: data,
                    success: successFunction
                });
            }

            function fetchStates(country_id) {
                ajaxRequest("{{ route('states.get') }}", 'get', { country_id: country_id }, function(data) {
                    $('.province_id').empty();
                    if ($.isEmptyObject(data)) {
                        $('.province_id').append('<option value="">No records found</option>');
                    } else {
                        $.each(data, function(key, value) {
                            $('.province_id').append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    }
                });
            }
            $('.country').change(function() { fetchStates($(this).val()); });
            function student_test_score(){
                var student_id = $('.last_attended').attr('student-id');
                setupCSRF();
                $.post('{{ route('get-student-test-score') }}', { student_id: student_id }, function(response) {
                    var tableRow = '';
                    response.test_score.forEach(function(item,index) {
                        var key = index + 1;
                        tableRow += `<tr>
                            <td>${key}</td>
                            <td>${item.type}</td>
                            <td>${item.exam_date ? item.exam_date : item.date_of_exam}</td>
                            <td>${item.listening_score ? item.listening_score : item.verbal_score}</td>
                            <td>${item.writing_score}</td>
                            <td>${item.reading_score ? item.reading_score : item.quantitative_score}</td>
                            <td>${item.speaking_score}</td>
                            <td>${item.average_score}</td>
                            <td>${item.total_score}</td>
                            <td>${item.exam_document ? `<a target="_blank" href="${assetBaseUrl}${item.exam_document ?? ''}"><img src="${assetBaseUrl}${item.exam_document ?? ''}" alt="${item.type}" width="100" height="100"></a>` : ''}</td>
                            <td>${item.type == 'GRE' ? `<a href="javascript:void(0)" class="btn btn-primary btn-sm mx-1"  data-bs-toggle="offcanvas" data-bs-target="#gre_exam" aria-controls="gre_exam"><i class="las la-pen"></i></a>` : (item.type == 'GMAT' ? `<a href="javascript:void(0)" class="btn btn-primary btn-sm mx-1"  data-bs-toggle="offcanvas" data-bs-target="#gmat" aria-controls="gmat"><i class="las la-pen"></i></a>` : `<a href="javascript:void(0)" class="btn btn-primary btn-sm mx-1 test-score-edit"  data-bs-toggle="offcanvas" data-bs-target="#testscroresedit" aria-controls="testscroresedit" data-id="${item.id}"><i class="fa-solid fa-pen"></i></a><a href="javascript:void(0)" class="btn btn-primary btn-sm mx-1 test-score-delete"  data-id="${item.id}"><i class="fa-solid fa-trash"></i></a>`)}</td>
                        </tr>`;
                    });
                    $('.test-score').html(tableRow);
                }).fail(function(xhr, status, error) {
                    console.error(xhr.responseText);
                });
            }
            $(document).on('click', '.test-score-delete', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                }).then(r => {
                    if (r.isConfirmed) {
                        $.get(`{{ url('student/delete-student-test-score') }}/${id}`)
                            .then(() => {
                                Swal.fire('Deleted!', 'Test Score has been deleted.', 'success');
                                student_test_score();
                            });
                    }
                });
            });
            student_test_score();
            $('.education_level_id').change(function() {
                var program_level_id = $(this).val();
                var student_id = $('.last_attended').attr('student-id');
                setupCSRF();
                $.get(`{{ route('fetch-documents') }}?program_level_id=${program_level_id}&student_id=${student_id}`, function(data) {
                    $('.school-attended').empty();
                    $('.program_sub_level').empty();
                    $('#lead-visa_document_type').empty();
                    data.documents.forEach(function(doc) {
                        $('#lead-visa_document_type').append(`<option value="${doc.id}">${doc.name}</option>`);
                        var isChecked = data.school_attended.includes(String(doc.id)) ? 'checked' : '';
                        $('.school-attended').append(`
                            <div class="form-check">
                                <input class="form-check-input already_filled_data" ${isChecked} name="education_level_id[]" disabled type="checkbox" id="education_level_id_${doc.id}" value="${doc.id}">
                                <label class="form-check-label" for="education_level_id_${doc.id}">${doc.name}</label>
                            </div>`);
                    });
                    data.program_sublevel.forEach(function(sublevel) {
                        var isChecked = data.selected_program_sublevel.includes(String(sublevel.id)) ? 'checked' : '';
                        $('.program_sub_level').append(`
                            <div class="form-check">
                                <input class="form-check-input already_filled_data" ${isChecked} name="program_sub_level[]"  type="checkbox" id="program_sublevel_id_${sublevel.id}" value="${sublevel.id}">
                                <label class="form-check-label" for="program_sublevel_id_${sublevel.id}">${sublevel.name}</label>
                            </div>`);
                    });
                });
            });
            function school_data(){
                var program_level_id = $('.education_level_id').val();
                var student_id = $('.last_attended').attr('student-id');

                const staticOptions = [
    { value: "provisional_final_degree", name: "Provisional/Final Degree Certificate" },
    { value: "consolidated_marksheets", name: "Consolidated Mark Sheets" },
    { value: "statement_of_purpose", name: "Statement of Purpose/Essay" },
    { value: "application_form", name: "Application Form" },
    { value: "cv", name: "CV" },
    { value: "letter_of_recommendation", name: "Letter of Recommendation" },
    { value: "work_experience_letter", name: "Work Experience Letter" },
    { value: "online_submission_confirmation", name: "Online Submission Confirmation Page" },
    { value: "portfolio", name: "Portfolio" },
    { value: "power_of_attorney", name: "Power of Attorney" },
    { value: "additional_documents", name: "Additional Documents" }
];
                if(program_level_id){
                    $.get(`{{ route('fetch-documents') }}?program_level_id=${program_level_id}&student_id=${student_id}`, function(data) {
                        $('.school-attended, .program_sub_level, #lead-visa_document_type').empty();
                        $.each(staticOptions, function(index, option) {
    $('#lead-visa_document_type').append(`<option value="${option.value}">${option.name}</option>`);
});
                        data.documents.forEach(function(doc) {
                            $('#lead-visa_document_type').append(`<option value="${doc.name}">${doc.name}</option>`);
                            var isChecked = data.school_attended.includes(String(doc.id)) ? 'checked' : '';
                            $('.school-attended').append(`
                                <div class="form-check">
                                    <input class="form-check-input already_filled_data" ${isChecked} name="education_level_id[]" disabled type="checkbox" id="education_level_id_${doc.id}" value="${doc.id}">
                                    <label class="form-check-label" for="education_level_id_${doc.id}">${doc.name}</label>
                                </div>`);
                        });
                        data.program_sublevel.forEach(function(sublevel) {
                            var isChecked = data.selected_program_sublevel.includes(String(sublevel.id)) ? 'checked' : '';
                            $('.program_sub_level').append(`
                                <div class="form-check">
                                    <input class="form-check-input already_filled_data" ${isChecked} name="program_sub_level[]"  type="checkbox" id="program_sublevel_id_${sublevel.id}" value="${sublevel.id}">
                                    <label class="form-check-label" for="program_sublevel_id_${sublevel.id}">${sublevel.name}</label>
                                </div>`);
                        });
                    });
                }
            }
            function checkEducationAttended(){
                school_data();
                let checkedCount = $('.school-attended input[type="checkbox"]:checked').length;
                $.get(`{{ route('check-education-attended') }}?program_level_id=${$('.education_level_id').val()}&checkedCount=${checkedCount}`, (r) => {
                    $('.school').toggleClass('disabled', r.document == 0 || !r.status);
                });
            }
            $('.education_data').click(checkEducationAttended);
            function lead_education_level_id() {
                var program_level_id = $('.education_level_id').val();
                setupCSRF();
                $.get(`{{ route('fetch-documents') }}?program_level_id=${program_level_id}`, function(data) {
                    var optionsHtml = `<option>--Select Document--</option>`;
                    $.each(data.documents, function(key, value) {
                        var disabled = data.disabled_education_history.includes(String(value.id)) ? 'disabled' : '';
                        optionsHtml += `<option ${disabled} value="${value.id}">${value.name}</option>`;
                    });
                    $('.lead_documents_id').html(optionsHtml);
                    $('#myForm')[0].reset();
                });
            }
            $('.last_attended_school').on('click', lead_education_level_id);
            // $('.selected-country, .education_level_id').change(function() {
            //     var country_id = $('.selected-country').val();
            //     var education_level_id = $('.education_level_id').val();
            //     fetchData(country_id, education_level_id);
            // });
            // function fetchData(country_id, education_level_id) {
            //     setupCSRF();
            //     $.ajax({
            //         url: '{{ route('grading-scheme-list') }}',
            //         method: 'Post',
            //         data: {
            //             country_id: country_id,
            //             education_level_id: education_level_id
            //         },
            //         success: function(response) {
            //             var optionsHtml = '<option value="">-- Select --</option>';
            //             $.each(response.data, function(index, item) {
            //                 optionsHtml += '<option value="' + item.id + '">' + item.name +
            //                     '</option>';
            //             });
            //             $('.grading-scheme').html(optionsHtml);
            //         },
            //         error: function(xhr, status, error) {
            //             console.error(error);
            //         }
            //     });
            // }
            function handleNext() {
                const activeTab = $('.tab-pane.active');
                const nextTab = activeTab.next('.tab-pane');
                if (nextTab.length) {
                    activeTab.removeClass('active');
                    activeTab.removeClass('show');
                    nextTab.addClass('active show');
                    const nextTabLink = nextTab.attr('id') + '-tab';
                    $('#' + nextTabLink).tab('show');
                }
            }
            function handlePrevious() {
                const activeTab = $('.tab-pane.active');
                const previousTab = activeTab.prev('.tab-pane');
                if (previousTab.length) {
                    activeTab.removeClass('active');
                    activeTab.removeClass('show');
                    previousTab.addClass('active show');
                    const previousTabLink = previousTab.attr('id') + '-tab';
                    $('#' + previousTabLink).tab('show');
                }
            }
            $('.previous').on('click', handlePrevious);
            $('.skipform').on('click', function(event) {
                handleNext();
            });
            function deleteDocument(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(({ isConfirmed }) => {
                    if (isConfirmed) {
                        setupCSRF();
                        $.get("{{ route('delete-student-document') }}", { id }, () => {
                            Swal.fire('Deleted!', 'Document has been deleted.', 'success');
                            documents_list();
                        }).fail(error => console.error(error));
                    }
                });
            }
            function documents_list() {
                var student_id = $('.last_attended').attr('student-id');
                setupCSRF();
                ajaxRequest("{{ route('get-student-document') }}", "GET", { student_id }, function(response) {
                    var tableBody = $('.documents-data');
                    tableBody.empty();
                    var assetBaseUrl = "{{ asset('') }}/";
                    $.each(response.student_documents_data.concat(response.documents), function(index, item) {
                        var tr = $('<tr>');
                        tr.append($('<td>').text(item.student_id ?? null));
                        tr.append($('<td>').text(item.name ?? item.document_type ?? null));
                        tr.append($('<td>').text(item?.image_name?.toUpperCase() ?? ''));
                        tr.append($('<td>').html(item.image_url && item.image_url.endsWith('.pdf')
                            ? `<a href="${assetBaseUrl}${item.image_url}" target="_blank" class="badge badge-success">View PDF</a>`
                            : `<img src="${assetBaseUrl}${item.image_url ?? ''}" style="width:150px;height:150px">`
                        ));
                        tr.append($('<td>').html(`<a href="#" class="btn btn-warning delete-document" data-id="${item.id}"><i class="fa-solid fa-trash"></i></a>`));
                        tableBody.append(tr);
                    });
                }, function(xhr, status, error) {
                    console.error(error);
                });
            }
            $(document).on('click', '.delete-document', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                deleteDocument(id);
            });
            documents_list();
            $('.next').on('click', function(event) {
                event.preventDefault();
                var spinner = this.querySelector('.spinner-grow');
                spinner.classList.remove('d-none');
                $('.next').addClass('disabled');
                var activeTab = document.querySelector('.tab-pane.fade.show.active');
                var activeForm = activeTab.querySelector('form');
                var formData = new FormData(activeForm);
                formData.append('subject_input', $('#lead-subject_input').val());
                setupCSRF();
                $.ajax({
                    url: '{{route('student/student-store')}}',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false
                }).done(response => {
                    if (response.status) {
                        Swal.fire({
                            title: 'Success',
                            text: response.success,
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                    spinner.classList.add('d-none');
                    $('.next').removeClass('disabled');
                    checkEducationAttended();
                    handleNext();
                }).fail(xhr => {
                    spinner.classList.add('d-none');
                    $('.next').removeClass('disabled');
                    var response = JSON.parse(xhr.responseText);
                    Object.keys(response.errors).forEach(key => $(`.${key}`).html(response.errors[key] ?? ''));
                });
            });
            function get_school_attendend(){
                var student_id = $('.last_attended').attr('student-id');
                $.get(`{{ route('get-school-attendaned') }}?student_id=${student_id}`, function(response) {
                    $('.last-attended-school').empty();
                    response.school_attendend.forEach((data,i)=> {
                        $('.last-attended-school').append(`
                            <tr>
                                <td>${i+1}</td>
                                <td>${data.documents?.name ?? null}</td>
                                <td>${data.student?.first_name ?? null}</td>
                                <td>${data.primary_language ?? null}</td>
                                <td>${data.attended_from ?? null}</td>
                                <td>${data.attended_to ?? null}</td>
                                <td>${data.degree_awarded ?? null}</td>
                                <td>${data.degree_awarded_on ?? null}</td>
                                <td>${data.country?.name ?? null}</td>
                                <td>${data.province?.name ?? null}</td>
                                <td>${data.city ?? null}</td>
                                <td>${data.address ?? null}</td>
                                <td>${data.postal_zip ?? null}</td>
                                <td>${data.grading_scheme_id ?? null}</td>
                                <td>${data.grading_average ?? null}</td>
                                <td>
                                    <div class="last_attended" data-tour="search"
                                        data-bs-toggle="offcanvas" data-bs-target="#viewlead"
                                        aria-controls="viewlead"
                                        student-id="${data.id}">
                                            <i class="las la-pen"></i>
                                    </div>
                                </td>
                                <td><a href="javascript:void(0)" class="text-danger delete-attendance" data-id="${data.id}"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        `);
                    });
                    checkEducationAttended();
                });
            }
            get_school_attendend();
            $('.education_level_id').change(function() {
                $.post('{{ url('admin/check-student-attendend') }}', {
                    'program_level_id': $(this).val(),
                    'student_id': $('.last_attended').attr('student-id')
                }, function(response) {
                    response.success ? get_school_attendend() : $('.last-attended-school').empty();
                });
            });
            $(document).on('click', '.last_attended', function(event){
                event.preventDefault();
                var student_id = $(this).attr('student-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to edit this page!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, edit it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        lead_education_level_id_edit();
                        setupCSRF();
                        $.ajax({
                            url: '{{ url('student/get-student-attendence')}}/'+student_id,
                            type: 'GET',
                            success: function(response){
                                console.log(response.school_attended);
                                var selectedValues = response.school_attended?.documents;
                                if (!Array.isArray(selectedValues)) {
                                    selectedValues = selectedValues ? [selectedValues] : [];
                                }
                                selectedValues.forEach(function(value) {
                                    $('.lead_documents_id option[value="' + value + '"]').prop('disabled', false);
                                });
                                $('.lead_documents_id').val(selectedValues);
                                $('#institue_name').val(response.school_attended?.name);
                                $('#primary_language').val(response.school_attended?.primary_language);
                                $('#attended_from').val(response.school_attended?.attended_from);
                                $('#attended_to').val(response.school_attended?.attended_to);
                                $('#degree_awarded').val(response.school_attended?.degree_awarded);
                                $('#degree_awarded_on').val(response.school_attended?.degree_awarded_on);
                                $('#country_id').val(response.school_attended?.country_id);
                                fetchStates(response.school_attended?.country_id);
                                $('#province_id').val(response.school_attended?.province_id);
                                $('#postal_zip').val(response.school_attended?.postal_zip);
                                $('#city').val(response.school_attended?.city);
                                $('#address').val(response.school_attended?.address);
                                $('#grading_scheme_id').val(response.school_attended?.grading_scheme_id);
                                $('#lead-grading_number').val(response.school_attended?.grading_average);
                            }
                        });
                    }
                })
            });
            function lead_education_level_id_edit(){
                $.get(`{{ route('fetch-documents') }}?program_level_id=${$('.education_level_id').val()}`, function({documents}) {
                    $('.lead_documents_id').html(`<option disabled>--Select Document--</option>${documents.map(({id, name}) => `<option value="${id}">${name}</option>`).join('')}`);
                });
            }
            $(document).on('click', '.delete-attendance', function(){
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        school_data();
                        setupCSRF();
                        $.ajax({
                            url: '{{ url('student/delete-student-attendence')}}/'+id,
                            type: 'GET',
                            success: function(response){
                                Swal.fire(
                                    'Deleted!',
                                    'Schools Attended deleted successfully.',
                                    'success'
                                );
                                get_school_attendend();
                                lead_education_level_id();
                                checkEducationAttended();
                            }
                        });
                    }
                })
            });
            $('.last_attendence').on('click', function(event) {
                var document_id =$('.lead_documents_id').val();
                var program_level_id = $('.education_level_id').val();
                if(!document_id){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please Select Document  level'
                    });
                    return false;
                }
                var spinner = this.querySelector('.spinner-grow');
                spinner.classList.remove('d-none');
                var student_id = $('.last_attended').attr('student-id');
                var formData = $('#myForm').serialize();
                formData += '&student_id=' + student_id + '&program_level_id=' + program_level_id;
                setupCSRF();
                $('.last_attendence').addClass('disabled');
                $.ajax({
                    url: '{{ route('update-attended-school') }}',
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        spinner.classList.add('d-none');
                        school_data();
                        if (response.status) {
                            Swal.fire(
                                'Updated!',
                                response.success,
                                'success'
                            );
                            // setTimeout(() => {
                            //     location.reload();
                            // }, 1000);
                        }
                        get_school_attendend();
                        lead_education_level_id();
                        $('.last_attendence').removeClass('disabled');
                        $('#myForm')[0].reset();
                    },
                    error: function(xhr) {
                        $('.last_attendence').removeClass('disabled');
                        spinner.classList.add('d-none');
                        lead_education_level_id();
                        var response = JSON.parse(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message
                        });
                    }
                });
            });
            $('.gre_score').on('input', function(){
                var gre_score =$(this).val();
                if(gre_score < 0){
                    $(this).val(0);
                }
                if(gre_score > 340){
                    $(this).val(340);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Sorry! You cannot enter greater than 340'
                    });
                }
            });
            $('.greExam').on('click', function(event) {
                $('.greExam').addClass('disabled');
                var student_id = $('.last_attended').attr('student-id');
                var formData = new FormData($('#greExam')[0]);
                formData.append('student_id', student_id);
                setupCSRF();
                $.ajax({
                    url: '{{ route('update-gre-exam-data') }}',
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('.greExam').removeClass('disabled');
                        $('#greExam')[0].reset();
                        student_test_score();
                        if (response.status) {
                            Swal.fire(
                                'Updated!',
                                response.success,
                                'success'
                            );
                            setTimeout(() => {
                                // location.reload();
                            }, 1000);
                        }
                    },
                    error: function(xhr) {
                        $('.greExam').removeClass('disabled');
                        var response = JSON.parse(xhr.responseText);
                    }
                });
            });
            $('.eng_prof_level').on('change', function(){
                var eng_prof_level =$(this).val();
                $.ajax({
                    url: '{{ route('fetch-eng-prof-level-score') }}',
                    type: 'post',
                    data: {eng_prof_level: eng_prof_level},
                    success: function(response) {
                        $('#eng_prof_level_score').val(response.score.number);
                        $('#eng_prof_level_score_edit').val(response.score.number);
                    },
                    error: function(xhr) {
                        var response = JSON.parse(xhr.responseText);
                    }
                });
            });
            $('.eng_prof_score, .eng_prof_score_edit').on('input', function(e) {
                var eng_prof_level = $('#lead-type').val() || $('#lead_type_edit').val();
                var currentThis = $(e.currentTarget);
                if (eng_prof_level) {
                    var eng_prof_score = parseFloat(currentThis.val());
                    var eng_score = parseFloat($('#eng_prof_level_score').val() || $('#eng_prof_level_score_edit').val());
                    console.log(eng_prof_score, eng_score);
                    if (eng_prof_score < 0) {
                        currentThis.val(0);
                    }
                    if (eng_prof_score > eng_score) {
                        currentThis.val(eng_score);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Sorry! You cannot enter greater than ' + eng_score
                        });
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please Select English Proficiency Level'
                    });
                    return false;
                }
            });
            $('.gmat_score').on('input', function() {
                var gmat_score = $(this).val();
                if (gmat_score < 0) {
                    $(this).val(0);
                }
                if (gmat_score > 805) {
                    $(this).val(805);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Sorry! You cannot enter greater than 805'
                    });
                }
            });
            $('.gmat').on('click', function(event) {
                $('.gmat').addClass('disabled');
                var student_id = $('.last_attended').attr('student-id');
                var formData = new FormData($('#gmatform')[0]);
                formData.append('student_id', student_id);
                setupCSRF();
                $.ajax({
                    url: '{{ route('update-gmat-exam-data') }}',
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('.gmat').removeClass('disabled');
                        student_test_score();
                        if (response.status) {
                            Swal.fire(
                                'Updated!',
                                response.success,
                                'success'
                            );
                            setTimeout(() => {
                                // location.reload();
                            }, 1000);
                        }
                    },
                    error: function(response) {
                        $('.gmat').removeClass('disabled');
                    }
                });
            });
            $('.testscore').on('click', function(event) {
                $('.testscore').addClass('disabled');
                var student_id = $('.last_attended').attr('student-id');
                var formData = new FormData($('#testscore')[0]);
                formData.append('student_id', student_id);
                setupCSRF();
                $.ajax({
                    url: '{{ route('update-test-score') }}',
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('.testscore').removeClass('disabled');
                        student_test_score();
                        $('#testscore')[0].reset();
                        if (response.status) {
                            Swal.fire(
                                'Updated!',
                                response.success,
                                'success'
                            );
                        }
                    },
                    error: function(xhr) {
                        $('.testscore').removeClass('disabled');
                        var response = JSON.parse(xhr.responseText);
                        if(response.errors.exam_date){
                            $('.exam_date').html(response.errors.exam_date);
                        }else{
                            $('.exam_date').html('');
                        }
                        if(response.errors.listening_score){
                            $('.listening_score').html(response.errors.listening_score);
                        }else{
                            $('.listening_score').html('');
                        }
                        if(response.errors.speaking_score){
                            $('.speaking_score').html(response.errors.speaking_score);
                        }else{
                            $('.speaking_score').html('');
                        }
                        if(response.errors.reading_score){
                            $('.reading_score').html(response.errors.reading_score);
                        }else{
                            $('.reading_score').html('');
                        }
                        if(response.errors.type){
                            $('.type').html(response.errors.type);
                        }else{
                            $('.type').html('');
                        }
                        if(response.errors.writing_score){
                            $('.writing_score').html(response.errors.writing_score);
                        }else{
                            $('.writing_score').html('');
                        }
                    }
                });
            });
            $('.testscore_edit').on('click', function(event) {
                $('.testscore_edit').addClass('disabled');
                var id = $('.test-score-edit').data('id');
                var student_id = $('.last_attended').attr('student-id');
                var formData = new FormData($('#testscoreedit')[0]);
                formData.append('student_id', student_id);
                formData.append('id', id);
                setupCSRF();
                $.ajax({
                    url: '{{ route('update-test-score') }}',
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('.testscore_edit').removeClass('disabled');
                        student_test_score();
                        $('#testscoreedit')[0].reset();
                        if (response.status) {
                            Swal.fire(
                                'Updated!',
                                response.success,
                                'success'
                            );
                        }
                    },
                    error: function(xhr) {
                        $('.testscore_edit').removeClass('disabled');
                        var response = JSON.parse(xhr.responseText);
                        if(response.errors.exam_date){
                            $('.exam_date_edit').html(response.errors.exam_date);
                        }else{
                            $('.exam_date_edit').html('');
                        }
                        if(response.errors.listening_score){
                            $('.listening_score_edit').html(response.errors.listening_score);
                        }else{
                            $('.listening_score_edit').html('');
                        }
                        if(response.errors.speaking_score){
                            $('.speaking_score_edit').html(response.errors.speaking_score);
                        }else{
                            $('.speaking_score_edit').html('');
                        }
                        if(response.errors.reading_score){
                            $('.reading_score_edit').html(response.errors.reading_score);
                        }else{
                            $('.reading_score_edit').html('');
                        }
                        if(response.errors.type){
                            $('.type_edit').html(response.errors.type);
                        }else{
                            $('.type_edit').html('');
                        }
                        if(response.errors.writing_score){
                            $('.writing_score_edit').html(response.errors.writing_score);
                        }else{
                            $('.writing_score_edit').html('');
                        }
                    }
                });
            });
            $(document).on('click', '.test-score-edit', function(){
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ url('student/edit-test-score')}}/'+id,
                    type: 'GET',
                    success: function(response){
                        $('#lead_type_edit').html('<option value="'+response.type+'">'+response.type+'</option>');
                        $('#lead_exam_date_edit').val(response.exam_date);
                        $('#lead_listening_score_edit').val(response.listening_score);
                        $('#lead_writing_score_edit').val(response.writing_score);
                        $('#lead-reading_score_edit').val(response.reading_score);
                        $('#lead_speaking_score_edit').val(response.speaking_score);
                        $('#lead_average_score_edit').val(response.average_score);
                        $('#lead-total_score_edit').val(response.total_score);
                        $('#test_score_id').val(response.id).change();
                        if (response.english_marks_check == 1) {
                            $('#english_marks_check').prop('checked', true);
                        } else {
                            $('#english_marks_check').prop('checked', false);
                        }
                        if (response.moi == 1) {
                            $('#moi').prop('checked', true);
                        } else {
                            $('#moi').prop('checked', false);
                        }
                        $('#english_marks').val(response.english_marks);
                        if (response.ielts_waiver == 1) {
                            $('#ielts_waiver1_edit').prop('checked', true);
                            $('#ielts_waiver0_edit').prop('checked', false);
                            $('.eng_prof_level_details_edit').hide();
                            $('.ielts_waiver_details').show();
                        } else if (response.ielts_waiver == 0) {
                            $('#ielts_waiver_edit').prop('checked', true);
                            $('#ielts_waiver1_edit').prop('checked', false);
                            $('.eng_prof_level_details_edit').show();
                            $('.ielts_waiver_details').hide();
                        }
                        if (response.eng_prof_level_result == 1) {
                            $('#eng_prof_level_result1_edit').prop('checked', true);
                            $('#eng_prof_level_result0_edit').prop('checked', false);
                            $('.eng_prof_level_details_edit').show();
                        } else if (response.ielts_waiver == 0) {
                            $('#eng_prof_level_result0_edit').prop('checked', true);
                            $('#eng_prof_level_result1_edit').prop('checked', false);
                            $('.eng_prof_level_details_edit').show();
                        }
                    }
                });
            });

            $('.documentForm').on('click', function(event) {
                event.preventDefault();
                $('.documentForm').addClass('disabled');
                var student_id = $('.last_attended').attr('student-id');
                var formData = new FormData($('#document')[0]);
                formData.append('student_id', student_id);
                setupCSRF();
                $.ajax({
                    url: '{{ route('student/student-store') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#document')[0].reset();
                        documents_list();
                        if (response.status) {
                            Swal.fire({
                                title: 'Success!',
                                text: response.success,
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            }).then(function() {
                                if(response.redirect){
                                    setTimeout(() => {
                                        window.location.href = "{{ route('student-profile') }}";
                                    }, 2000);
                                }
                            });
                        }
                        $('.documentForm').removeClass('disabled');
                    },
                    error: function(xhr) {
                        $('.documentForm').removeClass('disabled');
                        var response = JSON.parse(xhr.responseText);
                    }
                });
            });
            function toggleDetails(inputName, inputId, detailClass) {
                $(`input[name="${inputName}"]`).on('change', function() {
                    if ($(`#${inputId}`).is(':checked')) {
                        $(`.${detailClass}`).show();
                    } else {
                        $(`.${detailClass}`).hide();
                    }
                }).trigger('change');
            }
            toggleDetails('work_experience', 'work_experience_1', 'experience_details');
            toggleDetails('result_receive', 'result_receive1', 'result_receive_details');
            toggleDetails('gmat_result_receive', 'gmat_result_receive1', 'gmat_details');
            toggleDetails('ielts_waiver', 'ielts_waiver', 'eng_prof_level_details');
            toggleDetails('eng_prof_level_result', 'eng_prof_level_result1', 'eng_prof_level_details');
            toggleDetails('eng_prof_level_result_edit', 'eng_prof_level_result1_edit', 'eng_prof_level_details_edit');
            toggleDetails('ielts_waiver_edit', 'ielts_waiver_edit', 'eng_prof_level_details_edit');
            $('input[name="eng_prof_level_result"], input[name="ielts_waiver"]').on('change', function () {
                var engProfValue = $('input[name="eng_prof_level_result"]:checked').val();
                var ieltsWaiverValue = $('input[name="ielts_waiver"]:checked').val();
                if (engProfValue == 1 && ieltsWaiverValue == 1) {
                    $(this).attr('name') === 'eng_prof_level_result'
                        ? $('input[name="ielts_waiver"][value="0"]').prop('checked', true)
                        : $('input[name="eng_prof_level_result"][value="0"]').prop('checked', true);
                    }
                var engProfValue = $('input[name="eng_prof_level_result"]:checked').val();
                var ieltsWaiverValue = $('input[name="ielts_waiver"]:checked').val();
                if (ieltsWaiverValue == 1) {
                    $('.ielts_waiver_details').show();
                    $('.ielts_waiver_details').removeClass('d-none');
                } else {
                    $('.ielts_waiver_details').hide();
                    $('.ielts_waiver_details').addClass('d-none');
                }
                if (engProfValue == 1) {
                    $('.ielts_waiver_details').addClass('d-none');
                    $('.ielts_waiver_details').hide();
                } else {
                    $('.ielts_waiver_details').show();
                }

            });
            $('input[name="eng_prof_level_result_edit"], input[name="ielts_waiver_edit"]').on('change', function () {
                var engProfValue = $('input[name="ielts_waiver_edit"]:checked').val();
                var ieltsWaiverValue = $('input[name="eng_prof_level_result_edit"]:checked').val();
                if (engProfValue == 1 && ieltsWaiverValue == 1) {
                    $(this).attr('name') === 'eng_prof_level_result_edit'
                        ? $('input[name="ielts_waiver_edit"][value="0"]').prop('checked', true)
                        : $('input[name="eng_prof_level_result_edit"][value="0"]').prop('checked', true);
                }
                var engProfValue = $('input[name="ielts_waiver_edit"]:checked').val();
                var ieltsWaiverValue = $('input[name="eng_prof_level_result_edit"]:checked').val();
                if (ieltsWaiverValue == 1) {
                    $('.ielts_waiver_details').hide();
                    $('.ielts_waiver_details').addClass('d-none');
                } else if(ieltsWaiverValue == 0) {
                    $('.ielts_waiver_details').show();
                    $('.ielts_waiver_details').removeClass('d-none');
                }
                if (engProfValue == 1) {
                    $('.ielts_waiver_details').removeClass('d-none');
                    $('.ielts_waiver_details').show();
                } else if(engProfValue == 0) {
                    $('.ielts_waiver_details').hide();
                }
            });
        });
    </script>
@endsection
