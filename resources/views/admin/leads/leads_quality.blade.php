@extends('admin.include.app')

@section('style')
@endsection

@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-muted"> Manage Leads</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="row leads-container">
                    <div class="col-md-12 col-sm-12">
                        <div class="student_section leads-student-info">
                            <div class="col-md-12">
                                <h3 class="leads-section-header mb-4">Student Details</h3>
                            </div>
                            <p><strong>Name:</strong> {{ $studentAgentData->name ?? 'N/A' }}</p>
                            <p><strong>Phone Number:</strong> {{ $studentAgentData->phone_number ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <div class="container">
                            <div class="main-container">
                                <form action="{{ route('lead-quality-store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="student_id" value="{{ $studentAgentData->id }}">

                                    <div class="container p-4 bg-white shadow-sm rounded">
                                        <h3 class="mb-3 text-center">Select Lead Quality</h3>

                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-12">

                                                <!-- Name -->
                                                <div class="d-flex align-items-center gap-4">
                                                    <label class="fw-bold w-50 text-start">Name:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="name" value="1" id="nameYes">
                                                        <label class="form-check-label" for="nameYes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="name" value="0" id="nameNo">
                                                        <label class="form-check-label" for="nameNo">No</label>
                                                    </div>
                                                </div>

                                                <!-- Phone -->
                                                <div class="d-flex align-items-center gap-4 mt-2">
                                                    <label class="fw-bold w-50 text-start">Phone:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="phone" value="1" id="phoneYes">
                                                        <label class="form-check-label" for="phoneYes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="phone" value="0" id="phoneNo">
                                                        <label class="form-check-label" for="phoneNo">No</label>
                                                    </div>
                                                </div>

                                                <!-- Father Working -->
                                                <div class="d-flex align-items-center gap-4 mt-2">
                                                    <label class="fw-bold w-50 text-start">Father Working:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="father_working" value="1" id="fatherYes">
                                                        <label class="form-check-label" for="fatherYes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="father_working" value="0" id="fatherNo">
                                                        <label class="form-check-label" for="fatherNo">No</label>
                                                    </div>
                                                </div>

                                                <!-- Mother Working -->
                                                <div class="d-flex align-items-center gap-4 mt-2">
                                                    <label class="fw-bold w-50 text-start">Mother Working:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="mother_working" value="1" id="motherYes">
                                                        <label class="form-check-label" for="motherYes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="mother_working" value="0" id="motherNo">
                                                        <label class="form-check-label" for="motherNo">No</label>
                                                    </div>
                                                </div>

                                                <!-- Age -->
                                                <div class="d-flex align-items-center gap-4 mt-2">
                                                    <label class="fw-bold w-50 text-start">Age:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="age" value="0.25" id="age18_25">
                                                        <label class="form-check-label" for="age18_25">18-25</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="age" value="0.50" id="age26_35">
                                                        <label class="form-check-label" for="age26_35">26-35</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="age" value="0.75" id="age36_45">
                                                        <label class="form-check-label" for="age36_45">36-45</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="age" value="1" id="age46_55">
                                                        <label class="form-check-label" for="age46_55">46-55</label>
                                                    </div>
                                                </div>

                                                <!-- English Efficiency -->
                                                <div class="d-flex align-items-center gap-4 mt-2">
                                                    <label class="fw-bold w-50 text-start">English Efficiency:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="english_efficiency" value="0.25" id="engBad">
                                                        <label class="form-check-label" for="engBad">Bad</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="english_efficiency" value="0.50" id="engGood">
                                                        <label class="form-check-label" for="engGood">Good</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="english_efficiency" value="0.75" id="engIntermediate">
                                                        <label class="form-check-label" for="engIntermediate">Intermediate</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="english_efficiency" value="1" id="engAdvanced">
                                                        <label class="form-check-label" for="engAdvanced">Advanced</label>
                                                    </div>
                                                </div>

                                                <!-- Sibling -->
                                                <div class="d-flex align-items-center gap-4 mt-2">
                                                    <label class="fw-bold w-50 text-start">Sibling:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sibling" value="1" id="siblingYes">
                                                        <label class="form-check-label" for="siblingYes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sibling" value="0" id="siblingNo">
                                                        <label class="form-check-label" for="siblingNo">No</label>
                                                    </div>
                                                </div>

                                                <!-- Financial Conditions -->
                                                <div class="d-flex align-items-center gap-4 mt-2">
                                                    <label class="fw-bold w-50 text-start">Financial Conditions:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="financial_condition" value="1" id="financialYes">
                                                        <label class="form-check-label" for="financialYes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="financial_condition" value="0" id="financialNo">
                                                        <label class="form-check-label" for="financialNo">No</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center gap-4 mt-2">
                                                    <label class="fw-bold w-50 text-start">Education:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="education" value="1" id="educationYes">
                                                        <label class="form-check-label" for="educationYes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="education" value="0" id="educationNo">
                                                        <label class="form-check-label" for="educationNo">No</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center gap-4 mt-2">
                                                    <label class="fw-bold w-50 text-start">Intrested:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="intrested" value="1" id="intrestedYes">
                                                        <label class="form-check-label" for="intrestedYes">Yes</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="intrested" value="0" id="intrestedNo">
                                                        <label class="form-check-label" for="intrestedNo">No</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- End col-md-12 -->
                </div> <!-- End row leads-container -->
            </div> <!-- End card-body -->
        </div> <!-- End card -->
    </div> <!-- End card-group -->
</div> <!-- End row -->

<br>

@endsection

@section('scripts')
<script>
    // Ensure only one checkbox is selected at a time
    document.querySelectorAll('.lead-quality-checkbox').forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                document.querySelectorAll('.lead-quality-checkbox').forEach((otherCheckbox) => {
                    if (otherCheckbox !== this) {
                        otherCheckbox.checked = false;
                    }
                });
            }
        });
    });
</script>
@endsection