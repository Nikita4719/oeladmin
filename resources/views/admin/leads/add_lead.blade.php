@extends('admin.include.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
@section('main-content')
<div class="page-header">
    <div class="row">
       <div class="card card-buttons">
          <div class="card-body">
             <div class="row">
                <div class="col-md-10">
                   <ol class="breadcrumb text-muted mb-0">
                      <li class="breadcrumb-item">
                      <a href="{{route('dashboard')}}"> Dashboard</a>
                      </li>
                      <li class="breadcrumb-item text-muted">Add lead</li>
                   </ol>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
<div clas="row">
    <div class="col-md-12">
       <div class="card bg-white px-0 mx-0 ">
          <div class="card-header table_heading mx-0 mt-0">
             <h4 class="card-title text-white"> Add Lead</h4>
          </div>
          <div id="responseMessage"></div>
          <div class="card-body">
             <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation" >
                   <a class="nav-link active  disabled" id="personal_information" href="#basictab1"  data-bs-toggle="tab" aria-selected="true" role="tab" >Personal Information</a>
                </li>
                <li class="nav-item" role="presentation">
                   <a class="nav-link disabled" id="basic_info" href="#basictab2" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"  >Basic Information</a>
                </li>
                <li class="nav-item" role="presentation">
                   <a class="nav-link disabled" id="educational_information" href="#basictab3" href="#basictab3" data-bs-toggle="tab" aria-selected="true" role="tab">Educational Information</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link disabled" id="intake" href="#basictab4" href="#basictab3" data-bs-toggle="tab" aria-selected="true" role="tab">Intake</a>
                 </li>
             </ul>
             <div class="tab-content">
                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                   <form  class="row g-4" id="tab1DataForm">
                      <div class="col-4">
                         <div class="form-floating">
                            <select class="form-control" name="source"  placeholder="Source">
                               <option value="">-- Select Source --</option>
                               @foreach ($source as $item)
                                  <option value="{{$item->name}}">{{$item->name}}</option>
                               @endforeach
                            </select>
                            <span class="text-danger source"></span>
                            <label for="lead-source" class="form-label">Source<span class="text-danger">*</span></label>
                         </div>
                      </div>
                      <div class="col-4">
                             <div class="form-floating">
                                <select class="form-control" name="lead_status"  placeholder="Source">
                                   <option value="">-- Lead Status --</option>
                                   @foreach ($lead_status as $data)
                                     <option value="{{$data->id}}">{{$data->name}}</option>
                                   @endforeach
                                </select>
                                <label for="lead-source" class="form-label">Lead Status</label>
                             </div>
                          </div>
                      <div class="col-4">
                         <div class="form-floating">
                            <input id="lead-name" name="first_name" type="text" class="form-control" placeholder="First Name" autocomplete="name" required>
                            <input id="lead-name" type="hidden" name="tab1"  value="tab1">
                            <input  type="hidden" name="id"  class="uniquevalue" value="">
                            <label for="lead-name" class="form-label">First Name <span class="text-danger">*</span></label>
                            <span class="text-danger first_name"></span>
                         </div>
                      </div>
                      <div class="col-4">
                         <div class="form-floating">
                            <input id="lead-middle_name" name="middle_name" type="text" class="form-control" placeholder="Middle Name" autocomplete="middle_name" >
                            <label for="lead-middle_name" class="form-label">Middle Name</label>
                            <span class="text-danger middle_name"></span>
                         </div>
                      </div>
                      <div class="col-4">
                         <div class="form-floating">
                            <input id="lead-last_name" name="last_name" type="text" class="form-control" placeholder="Last Name" autocomplete="last_name" >
                            <label for="lead-last_name" class="form-label">Last Name</label>
                            <span class="text-danger last_name"></span>
                         </div>
                      </div>
                      <div class="col-4">
                         <div class="form-floating">
                            <input id="lead-father_name" name="father_name" type="text" class="form-control" placeholder="Father Name" autocomplete="father_name" >
                            <label for="lead-father_name" class="form-label">Father Name</label>
                            <span class="text-danger father_name"></span>
                         </div>
                      </div>
                     <div class="col-4">
                        <div class="form-floating">
                          <input
                            id="lead-email"
                            name="email"
                            type="email"
                            class="form-control"
                            placeholder="Email"
                            autocomplete="email"
                            required
                          >
                          <label for="lead-email" class="form-label">
                            Email <span class="text-danger">*</span>
                          </label>
                          <span id="email-error" class="text-danger email"></span>
                        </div>
                      </div>
                      <div class="col-4">
                         <div class="form-floating">
                            <input id="lead-phone_number" name="phone_number" type="number" class="form-control" placeholder="Phone" autocomplete="phone_number" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                            <label for="lead-phone_number" class="form-label">Phone <span class="text-danger">*</span></label>
                            <span class="text-danger phone_number"></span>
                         </div>
                      </div>
                      <div class="col-4">
                         <div class="form-floating">
                            <input id="lead-phone_number1" name="phone_number1" type="number" class="form-control" placeholder="Phone 1" autocomplete="phone_number1" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" >
                            <label for="lead-phone_number1" class="form-label">Phone 1</label>
                            <span class="text-danger phone_number1"></span>
                         </div>
                      </div>
                       <div class="col-4">
                           <div class="form-floating">
                              <input  
                                 name="dob" 
                                 id="lead-dob"
                                 type="date" 
                                 class="form-control" 
                                 placeholder="Date of Birth" 
                                 autocomplete="dob"
                                 style="background: #f8f9fa !important"
                              >
                              <label for="lead-dob" class="form-label">Date of Birth</label>
                              <span class="text-danger dob"></span>
                           </div>
                        </div>

                   

                      <div class="col-12">
                         <button type="button" id="tab1datasubmit" class="btn btn-info btn-sm" >Save &amp; Continue</button>
                      </div>
                   </form>
                </div>
                <div class="tab-pane" id="basictab2" role="tabpanel" style="display: ">
                   <div class="tab-pane show active" id="basictab2" role="tabpanel">
                      <form class="row g-4"  id="tab2DataForm">
                         <div class="col-4">
                            <div class="form-floating">
                               <select class="form-control"   name="cand_working" >
                                  <option value="">-- Select Candidate Working --</option>
                                  <option value="student">Student </option>
                                  <option value="working">Working </option>
                                  <option value="student+working">Student +Working </option>
                               </select>
                               <label for="lead-source" class="form-label">Working Type</label>
                            </div>
                         </div>
                         <div class="col-4">
                            <div class="form-floating">
                               <select class="form-control" name="caste"  >
                                  <option value="">-- Select Gender --</option>
                                   @foreach ($castes as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                               </select>
                               <label for="lead-source" class="form-label">Select Gender</label>
                            </div>
                         </div>
                         <div class="col-4">
                            <div class="form-floating">
                               <select class="form-control country" name="country_id" >
                                  <option value="">-- Select Country  --</option>
                                    @foreach ($countries as $item)
                                       <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                               </select>
                               <label for="lead-source" class="form-label">Country</label>
                            </div>
                         </div>
                         <div class="col-4">
                            <div class="form-floating">
                                <select  name="province_id"  class="form-control province_id">
                                    <option value="">-State/Provision -</option>
                                </select>
                               <label for="lead-source" class="form-label">State/Provision </label>
                            </div>
                         </div>
                         <div class="col-4">
                            <div class="form-floating">
                               <input id="lead-name" name="zip" type="text" class="form-control"  value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);" >
                               <input id="lead-name" type="hidden" name="tab2"  value="tab2">
                               <input  type="hidden" name="id"  class="uniquevalue" value="">
                               <label for="lead-name" class="form-label">PinCode</label>
                            </div>
                         </div>
                         <div class="col-6">
                            <button type="button" class="btn btn-info btn-sm" id="gotab1">Previous</button>
                         </div>
                         <div class="col-4">
                            <button type="button" id="tab2datasubmit" class="btn btn-info btn-sm">Save &amp; Continue</button>
                         </div>
                      </form>
                   </div>
                </div>
                <div class="tab-pane" id="basictab3" role="tabpanel">
                   <div class="tab-pane show active" id="basictab3" role="tabpanel">
                      <form class="row g-4" id="tab3DataForm">
                         <div class="col-4">
                            <div class="form-floating">
                               <select class="form-control" name="program"  placeholder="Source">
                                  <option value="">-- Highest Level Program --</option>
                                  @foreach ($progLabel as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                  @endforeach
                               </select>
                               <label for="lead-source" class="form-label">Highest Level Of Program</label>
                            </div>
                         </div>
                         <div class="col-4">
                            <div class="form-floating">
                               <select class="form-control" name="subject"  placeholder="Source">
                                       <option value="">-- Subjects  --</option>
                                    @foreach ($subjects as $item)
                                        <option class="option" value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                               </select>
                               <label for="lead-source" class="form-label">Subjects</label>
                            </div>
                         </div>
                         <div class="col-4">
                            <div class="form-floating" >
                               <input  name="stream"   class="form-control"  value="">
                               <label for="stream" class="form-label">Stream</label>
                               <input  type="hidden" name="id"  class="uniquevalue" value="">
                               <input id="lead-name" type="hidden" name="tab3"  value="tab3">
                            </div>
                         </div>
                         <div class="col-4">
                            <div class="form-floating">
                               <select class="form-control" name="status_study"  >
                                  <option value="">-- Status Study  --</option>
                                  <option value="completed">Completed </option>
                                  <option value="pursuing">Pursuing</option>
                               </select>
                               <label for="lead-source" class="form-label"> Status Study</label>
                            </div>
                         </div>
                         <div class="col-4">
                            <div class="form-floating">
                               <select class="form-control" name="board_university"  >
                                  <option value="">-- Board University  --</option>
                                  <option value="ICGSE">ICGSE</option>
                                  <option value="CBSE">CBSE</option>
                                  <option value="ICGSE">ICGSE</option>
                                  <option value="ISCE">ISCE</option>
                                  <option value="IB">IB</option>
                                  <option value="UP">State Up</option>
                                  <option value="OTHER">OTHER</option>
                                  <option value="University">University</option>
                               </select>
                               <label for="lead-source" class="form-label">  Board University </label>
                            </div>
                         </div>
                         <div class="col-4">
                            <div class="form-floating">
                                <select class="form-control" name="interested" id="interested" >
                                    <option value="">-- Interested --</option>
                                    @foreach ($interested as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <label for="interested" class="form-label">Interested</label>
                            </div>
                        </div>
                         <div class="col-4 programoption" style="display: none;">
                            <div class="form-floating">
                               <select class="form-control" name="preferred_program_label"  >
                                  <option value="">--Preferred Program Level  --</option>
                                    @foreach ($preproLabel as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                               </select>
                               <label for="lead-source" class="form-label">  Preferred Program Level  </label>
                            </div>
                         </div>
                         <div class="col-4 programoption" style="display: none;" >
                            <div class="form-floating">
                               <input   name="course"   style="background: f8f9fa" type="text" class="form-control" placeholder="course">
                               <label for="course" class="form-label">Course</label>
                            </div>
                         </div>
                         <div class="col-4 programoption" style="display: none;">
                            <div class="form-floating">
                               <select class="form-control" name="preferred_country_id"  >
                                  <option value="">-- Country  --</option>
                                    @foreach ($countries as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                               </select>
                               <label for="lead-source" class="form-label">  Preferred Country  </label>
                            </div>
                         </div>
                         <div class="col-4 programoption" style="display: none;" >
                            <div class="form-floating" >
                               <input   name="school" type="text" class="form-control" placeholder="Preferred Institute/University"  value="">
                               <label for="course" class="form-label">Preferred Institute/University</label>
                            </div>
                         </div>
                         <div class="col-6">
                            <button type="button" class="btn btn-info btn-sm" id="gotab2">Previous</button>
                         </div>
                         <div class="col-2">
                            <button type="button" class="btn btn-info btn-sm" id="tab3datasubmit">Save &amp; Continue</button>
                         </div>
                      </form>
                   </div>
                </div>
                <div class="tab-pane" id="basictab4" role="tabpanel">
                    <div class="tab-pane show active" id="basictab4" role="tabpanel">
                        <div id="responseMessagetab4"></div>
                       <form class="row g-4"  id ="tab4DataForm">
                          
                          <div class="col-4">
                            <div class="form-floating">
                                <input id="lead-name" name="next_calling_date" type="datetime-local" class="form-control" autocomplete="name" value="{{ now()->format('Y-m-d H:i') }}">
                                <label for="lead-name" class="form-label">Next Calling Date</label>
                                <input id="lead-name" type="hidden" name="tab4" value="tab4">
                                <input type="hidden" name="id" class="uniquevalue" value="">
                            </div>
                        </div>
                          <div class="col-4">
                             <div class="form-floating">
                                <input  name="interested_in" type="text" class="form-control"  placeholder="interested_in">
                                <label for="interested_in" class="form-label">Interested In</label>
                             </div>
                          </div>
                          <div class="col-4">
                            <div class="form-floating">
                                <select  name="intakeMonth" class="form-control"  >
                                    <option value="">Select Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <label for="intakeMonth" class="form-label">Intake</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating">
                                <select  name="year" class=" form-control">
                                    <option value="">Select Year</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                                <label for="year" class="form-label">Year</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating">
                                <select  name="profile_create" class=" form-control">
                                    <option value="">Profile Create</option>
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                                <label for="profile_create" class="form-label">Profile Create</label>
                            </div>
                        </div>
                          <div class="col-12">
                             <div class="form-floating">
                                <textarea name="comment"  class="form-control w-100"  ></textarea>
                                <label for="lead-dob" class="form-label">Comment</label>
                             </div>
                          </div>
                          <div class="col-6">
                            <button type="button" class="btn btn-info btn-sm" id="gotab3">Previous</button>
                         </div>
                         <div class="col-2">
                            <button type="button" class="btn btn-info btn-sm" id="tab4datasubmit">Save &amp; Continue</button>
                         </div>
                       </form>
                    </div>
                 </div>
             </div>
          </div>
       </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function(){
        function fetchStates(country_id) {
            $('.province_id').empty();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                url: "{{ route('states.get') }}",
                method: 'get',
                data: {
                    country_id: country_id
                },
                success: function(data){
                    if ($.isEmptyObject(data)) {
                        $('.province_id').append('<option value="">No records found</option>');
                    } else {
                        $.each(data, function(key, value){
                            $('.province_id').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                }
            });
        }
        fetchStates($('.country').val());
        $('.country').change(function(){
            var country_id = $(this).val();
            fetchStates(country_id);
        });
        $('#tab1datasubmit').on('click', function() {
            var tab1formData = $('#tab1DataForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('add-leadData-tab') }}',
                type: 'post',
                data: tab1formData,
                success: function(response) {
                    $('.uniquevalue').val(response.id);
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                    if(response.tab1 == 'tab1'){
                     $('#basictab1').hide();
                     $('#basictab3').hide();
                     $('#basictab4').hide();
                     $('#basictab2').show();
                     $('#basic_info').addClass('active');
                     $('#personal_information').removeClass('active');
                     $('#educational_information').removeClass('active');
                     $('#intake').removeClass('active');
                    }
                },
                error: function(xhr) {
                    var response = JSON.parse(xhr.responseText);
                    $('.source').html(response.errors.source);
                    $('.first_name').html(response.errors.first_name);
                    $('.middle_name').html(response.errors.middle_name);
                    $('.last_name').html(response.errors.last_name);
                    $('.father_name').html(response.errors.father_name);
                    $('.email').html(response.errors.email);
                    $('.phone_number').html(response.errors.phone_number);
                    $('.phone_number1').html(response.errors.phone_number1);
                    $('.dob').html(response.errors.dob);
                }
            });
        });
        $('#tab2datasubmit').on('click', function() {
            var tab2formData = $('#tab2DataForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('add-leadData-tab') }}',
                type: 'post',
                data: tab2formData,
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                    if(response.tab2 == 'tab2'){
                    $('#basictab1').hide();
                    $('#basictab2').hide();
                    $('#basictab4').hide();
                    $('#basictab3').show();
                    $('#educational_information').addClass('active');
                    $('#personal_information').removeClass('active');
                    $('#basic_info').removeClass('active');
                    $('#intake').removeClass('active');
                    }
                },
                error: function(xhr) {
                    var response = JSON.parse(xhr.responseText);
                }
            });
        });
        $('#tab3datasubmit').on('click', function() {
            var tab3formData = $('#tab3DataForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('add-leadData-tab') }}',
                type: 'post',
                data: tab3formData,
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                    if(response.tab3 == 'tab3'){
                    $('#basictab1').hide();
                    $('#basictab2').hide();
                    $('#basictab3').hide();
                    $('#basictab4').show();
                    $('#intake').addClass('active');
                    $('#personal_information').removeClass('active');
                    $('#basic_info').removeClass('active');
                    $('#educational_information').removeClass('active');
                    }
                },
                error: function(xhr) {
                    var response = JSON.parse(xhr.responseText);
                }
            });
        });
        $('#tab4datasubmit').on('click', function() {
            var tab4formData = $('#tab4DataForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('add-leadData-tab') }}',
                type: 'post',
                data: tab4formData,
                success: function(response) {
                    Swal.fire({
                        title: response.message,
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            var originUrl = window.location.origin;
                            window.location.href = originUrl + '/admin/leads-lists';
                        }
                    });
                },
                error: function(xhr) {
                    var response = JSON.parse(xhr.responseText);
                    Swal.fire({
                        title: response.message,
                        icon: 'error',
                    });
                }
            });
        });
        $('#gotab1').on('click',function(){
            $('#basictab1').show();
            $('#basictab3').hide();
            $('#basictab4').hide();
            $('#basictab2').hide();
            $('#basic_info').removeClass('active');
            $('#personal_information').addClass('active');
            $('#educational_information').removeClass('active');
            $('#intake').removeClass('active');
        });
        $('#gotab2').on('click',function(){
            $('#basictab1').hide();
            $('#basictab2').show();
            $('#basictab4').hide();
            $('#basictab3').hide();
            $('#educational_information').removeClass('active');
            $('#personal_information').removeClass('active');
            $('#basic_info').addClass('active');
            $('#intake').removeClass('active');
        });
        $('#gotab3').on('click',function(){
            $('#basictab1').hide();
            $('#basictab2').hide();
            $('#basictab3').show();
            $('#basictab4').hide();
            $('#intake').removeClass('active');
            $('#personal_information').removeClass('active');
            $('#basic_info').removeClass('active');
            $('#educational_information').addClass('active');
        });
        $('#interested').on('change',function() {
            var selectedValue = $(this).val();
            if (selectedValue == 2) {
                $('.programoption').show();
            } else {
                $('.programoption').hide();
            }
        });
    });
</script>
<script>
   
   document.getElementById("lead-dob").max = new Date().toISOString().split("T")[0];
</script>

<script>
document.getElementById('lead-email').addEventListener('input', function() {
  const emailInput = this;
  const errorSpan = document.getElementById('email-error');
  
  // Clear any previous message
  errorSpan.textContent = '';
  emailInput.classList.remove('is-invalid');

  // Check validity
  if (emailInput.validity.valueMissing) {
    errorSpan.textContent = 'Email is required.';
    emailInput.classList.add('is-invalid');
  } else if (emailInput.validity.typeMismatch) {
    errorSpan.textContent = 'Please enter a valid email address (must contain @).';
    emailInput.classList.add('is-invalid');
  }
});
</script>
@endsection
