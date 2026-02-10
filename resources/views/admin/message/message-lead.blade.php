@extends('admin.include.app')
@section('style')
<style>
  .offcanvas.offcanvas-end{
    width: 50vw !important;
  }
</style>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
@section('main-content')
    <div class="row">
        <div class="card card-buttons">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb text-muted mb-0">
                            <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item text-muted">Message-Lead </li>
                        </ol>
                    </div>
                    {{-- <div class="col-md-2">
                        <a href="{{ route('admin.create_new_lead') }}" class="btn add-btn">
                            <i class="fa-solid fa-plus"></i> Add Lead </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-group">
            <div class="card">
                <div class="card-body myform">
                    <form action="{{ route('message-lead') }}" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control formmrgin " name="name"
                                    value="{{ request()->get('name') }}" placeholder="Student Name "pattern="[A-Za-z\s]+" 
                                
                                oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                            </div>
                           <div class="col-md-4">
                            <input type="email" class="form-control formmrgin" name="email"
                                value="{{ request()->get('email') }}" placeholder="Student Email"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                               >
                        </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control formmrgin " name="phone_number"
                                    value="{{ request()->get('phone_number') }}" placeholder="Student Phone Number"oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control formmrgin " name="zip"
                                    value="{{ request()->get('zip') }}" placeholder="Pincode" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);">
                            </div>
                            <div class="col-md-4">
                                <select class="form-control country formmrgin " name="country_id" >
                                    <option value="">-- Select Country --</option>
                                    @foreach ($countries as $item)
                                        <option value="{{ $item->id }}"
                                            {{ request()->get('country_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <select name="province_id"  class="form-control province_id  formmrgin ">
                                    <option value="">-State/Provision -</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <select name="lead_status" class="form-control formmrgin ">
                                    <option value="">--Select Lead Status--</option>
                                    @foreach ($lead_status as $item)
                                        <option value="{{ $item->id }}"
                                            {{ request()->get('lead_status') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <input type="date" name="from_date" class="form-control formmrgin "
                                    value="{{ request()->get('from_date') }}" placeholder="From Date">
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <input type="date" name="to_date" class="form-control formmrgin "
                                    value="{{ request()->get('to_date') }}" placeholder="to Date" value="">
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <select name="assigned_status" class="form-control formmrgin ">
                                    <option value="">--Select Assigned Status--</option>
                                    <option value="allocated"
                                        {{ request()->get('assigned_status') == 'allocated' ? 'selected' : '' }}>Allocated
                                    </option>
                                    <option value="notallocated"
                                        {{ request()->get('assigned_status') == 'notallocated' ? 'selected' : '' }}>Not
                                        Allocated</option>
                                </select>
                            </div>

                            <div class="col-md-4 col-sm-4 col-lg-4 col-sm-4">
                                <select  name="intakeMonth" class="form-control formmrgin ">
                                    <option value="">Select Month</option>
                                    <option value="01" {{ request()->get('intakeMonth') == '01' ? 'selected' : '' }}>
                                        January</option>
                                    <option value="02" {{ request()->get('intakeMonth') == '02' ? 'selected' : '' }}>
                                        February</option>
                                    <option value="03" {{ request()->get('intakeMonth') == '03' ? 'selected' : '' }}>
                                        March</option>
                                    <option value="04" {{ request()->get('intakeMonth') == '04' ? 'selected' : '' }}>
                                        April</option>
                                    <option value="05" {{ request()->get('intakeMonth') == '05' ? 'selected' : '' }}>
                                        May</option>
                                    <option value="06" {{ request()->get('intakeMonth') == '06' ? 'selected' : '' }}>
                                        June</option>
                                    <option value="07" {{ request()->get('intakeMonth') == '07' ? 'selected' : '' }}>
                                        July</option>
                                    <option value="08" {{ request()->get('intakeMonth') == '08' ? 'selected' : '' }}>
                                        August</option>
                                    <option value="09" {{ request()->get('intakeMonth') == '09' ? 'selected' : '' }}>
                                        September</option>
                                    <option value="10" {{ request()->get('intakeMonth') == '10' ? 'selected' : '' }}>
                                        October</option>
                                    <option value="11" {{ request()->get('intakeMonth') == '11' ? 'selected' : '' }}>
                                        November</option>
                                    <option value="12" {{ request()->get('intakeMonth') == '12' ? 'selected' : '' }}>
                                        December</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>

                            <div class="col-md-4 col-sm-4 col-lg-4 col-sm-4">
                                <select class="form-control formmrgin " name="intake_year" v-model="intake_year">
                                    <option value="">Please select intake Yaer</option>
                                    <option val="2024"
                                        {{ request()->get('intake_year') == '2024' ? 'selected' : '' }}>2024</option>
                                    <option val="2025"
                                        {{ request()->get('intake_year') == '2025' ? 'selected' : '' }}>2025</option>
                                    <option val="2026"
                                        {{ request()->get('intake_year') == '2026' ? 'selected' : '' }}>2026</option>
                                    <option val="2027"
                                        {{ request()->get('intake_year') == '2027' ? 'selected' : '' }}>2027</option>
                                    <option val="2028"
                                        {{ request()->get('intake_year') == '2028' ? 'selected' : '' }}>2028</option>
                                    <option val="2029"
                                        {{ request()->get('intake_year') == '2029' ? 'selected' : '' }}>2029</option>
                                    <option val="2030"
                                        {{ request()->get('intake_year') == '2030' ? 'selected' : '' }}>2030</option>
                                    <option val="2031"
                                        {{ request()->get('intake_year') == '2031' ? 'selected' : '' }}>2031</option>
                                    <option val="2032"
                                        {{ request()->get('intake_year') == '2033' ? 'selected' : '' }}>2032</option>
                                    <option val="2033"
                                        {{ request()->get('intake_year') == '2033' ? 'selected' : '' }}>2033</option>
                                    <option val="2034"
                                        {{ request()->get('intake_year') == '2034' ? 'selected' : '' }}>2034</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                            {{-- <div class="col-md-2 ">
                                <button type="submit" class="btn btn-info d-lg-block formmrgin " name="export"
                                    value="export">Export to Excel</button>
                            </div> --}}
                            <div class="col-md-2 ">
                                <a href="{{ route('message-lead') }}" class="btn btn-info d-lg-block  formmrgin  px-4">Reset
                                </a>
                            </div>
                            <div class="col-md-1 ">
                                <button type="submit" value="submit" class="btn btn-info d-lg-block  formmrgin  px-4"
                                    name="submit">Filter </button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="card-group">
            <div class="card">
                <div class="card-body myform">
                    <div class="col-md-12">
                        <div class="d-flex float-end">
                            <a href="" class="btn btn-primary btn-sm mx-1" class="last_attended" data-tour="search"
                            data-bs-toggle="offcanvas" data-bs-target="#gre_exam"
                            aria-controls="gre_exam"><i class="far fa-comments pe-2"></i>SMS</a>
                            <a href="" class="btn btn-primary btn-sm mx-1 "  data-tour="search"
                            data-bs-toggle="offcanvas" data-bs-target="#gmat"
                            aria-controls="gmat"><i class="far fa-envelope pe-2"></i>Mail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <div class="col-md-12">
            @php
                $users =Auth::user();
            @endphp
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="checked_all_lead"></th>
                            <th>S.N</th>
                            <th> Name </th>
                            <th> Phone</th>
                            <th> Email</th>
                            <th> PinCode</th>
                            <th> Sms</th>
                            <th> Mail </th>
                        </tr>
                    </thead>
                    <tbody id="lead-list">
                        @php
                            $i = ($lead_list->currentPage()-1)* $lead_list->perPage()+1;
                        @endphp
                        @foreach ($lead_list as $data)
                            <tr>
                                <td>
                                    <input type="checkbox" class="lead-id" leads-user-id="{{$data->id}}">
                                </td>
                                <td>
                                    <a href="#">{{ $i }}</a>
                                </td>
                                @php
                                    $i++;
                                @endphp
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->phone_number }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->zip }}</td>
                                <td>
                                    <a href="" class="btn-sm mx-1" class="last_attended" data-tour="search"
                                    data-bs-toggle="offcanvas" data-bs-target="#sms-list"
                                    aria-controls="sms-list"><i class="las la-list-alt sms_list" style="color: red;" data-id ="{{$data->phone_number}}"></i></a>
                                </td>
                                <td>
                                    <a href="" class="btn-sm mx-1" class="last_attended" data-tour="search"
                                    data-bs-toggle="offcanvas" data-bs-target="#email-list"
                                    aria-controls="email-list"><i class="las la-list-alt email_list" style="color: red;" data-id ="{{$data->email}}"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            {{ $lead_list->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- smslist --}}
    <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="sms-list">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>SMS List</h5>
            </div>
            <!-- <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div> -->
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close" class="close-icon">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="error-message"></div>
            <div class="row">
                <div class="card-stretch-full">
                    <div class="row g-4">
                      <div class="sms-list-data"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- emaillist --}}
    <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="email-list">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>Email List</h5>
            </div>
            <!-- <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div> -->
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close" class="close-icon">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="error-message"></div>
            <div class="row">
                <div class="card-stretch-full">
                    <div class="row g-4">
                      <div class="email-list-data"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="gre_exam">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>SMS</h5>
            </div>
            <!-- <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div> -->
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close" class="close-icon">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="error-message"></div>
            <div class="row">
                <div class="card-stretch-full">
                    <div class="row g-4">
                        <form id="sms">
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="template_type" value="choose_template" id="choose_template" checked>
                                        <label class="form-check-label" for="choose_template">
                                          Choose Template
                                        </label>
                                    </div>

                                </div>

                                <div class="col-6 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="template_type" value="custom_template">
                                        <label class="form-check-label" for="custom_template">
                                          Custom Template
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <select name="template_id" class="form-select " id="template_id">
                                            <option value="">Select Template</option>
                                            @foreach ($smsTemplates as $template)
                                                <option value="{{ $template->id }}">{{ $template->heading }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="form-floating custom_template d-none">
                                        <textarea name="custom_template" id="custom_template" class="form-control " rows="10" placeholder="Enter your custom template"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <script>
                        </script>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-info py-6 send_sms" id="send_sms_btn">
                                <span id="send_sms_spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true">
                                </span>
                                <span class="px-2">Send Sms</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- gmat score  --}}
    <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="gmat">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>Email</h5>
            </div>
            <!-- <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div> -->
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close" class="close-icon">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="error-message"></div>
            <div class="row">
                <div class="card-stretch-full">
                    <div class="row g-4">
                        <form id="gmail" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <input name="subject" type="text"  class="form-control  subject"  value="{{$gmat->subject  ?? null}}" placeholder="Subject" required>
                                        <label for="lead-name" class="form-label">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <textarea name="email_body" class="form-control  messagebody" id="summernote1" placeholder="Message body" required>{{$gmat->email_body  ?? null}}</textarea>
                                        <label for="lead-name" class="form-label">Message Body</label>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="form-floating">
                                        <input type="file" class="form-control attachment" name="attachment" id="attachment ">
                                        <label for="attachment" class="form-label">Attachment</label>
                                    </div>
                                </div>

                        <div class="col-md-12">
                            <button type="button" class="btn btn-info py-6 send_email" id="send_email_btn">
                                <span id="send_email_spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true">
                                </span>
                                <span class="px-2">Send Email</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
 <!-- summernotejs start -->
 <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
 <script>
     $('#summernote1').summernote({
        placeholder: ' Write Here',
        tabsize: 2,
        height: 100
    });
</script>
    <script>
        $(document).ready(function() {
            $('input[name="template_type"]').on('change', function() {
                if($(this).val() == 'choose_template') {
                     $('#template_id').removeClass('d-none');
                     $('.custom_template').addClass('d-none');
                } else {
                    $('#template_id').addClass('d-none');
                    $('.custom_template').removeClass('d-none');
                }
            });
            function setupCSRF() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }
            function fetchStates(country_id) {
                $('.province_id').empty();
                setupCSRF();
                $.ajax({
                    url: "{{ route('states.get') }}",
                    method: 'get',
                    data: {
                        country_id: country_id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data)) {
                            $('.province_id').append(
                                '<option value="">No records found</option>');
                        } else {
                            $.each(data, function(key, value) {
                                $('.province_id').append('<option value="'+ key +'">' + value +
                                    '</option>');
                            });
                        }
                    }
                });
            }
            fetchStates($('.country').val());
            $('.country').change(function() {
                var country_id = $(this).val();
                fetchStates(country_id);
            });
            const t = document.querySelector(".checked_all_lead"),
                o = document.querySelectorAll('[type="checkbox"]');
                t.addEventListener("change", t => {
                o.forEach(e => {
                    e.checked = t.target.checked
                })
            });
            $('.send_sms').on('click', function() {
                $('#send_sms_spinner').removeClass('d-none');
                $('.error-message').html('');
                $('.send_sms').addClass('disabled');
                var custom_templete = null;
                var template_id = null;
                if (!$('.custom_template').hasClass('d-none')) {
                     custom_templete = $('#custom_template').val();
                } else {
                     template_id = $('#template_id').val();
                }
                var selectedLeads = [];
                $('.lead-id:checked').each(function() {
                    selectedLeads.push($(this).attr('leads-user-id'));
                });
                $.ajax({
                    url: "{{route('send-sms')}}",
                    method: 'Post',
                    data: {
                        leadIds:selectedLeads,template_id:template_id,custom_templete:custom_templete
                    },
                    success: function(response){
                    $('#send_sms_spinner').addClass('d-none');
                    $('.send_sms').removeClass('disabled');
                    if(response.status == false){
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                            });
                        }else{
                            Swal.fire({
                                icon: 'success',
                                title: 'Success...',
                                text: response.message,
                            });
                        }
                    },
                    error: function(response){
                        $('#send_sms_spinner').addClass('d-none');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.responseJSON.message,
                        });
                        $('.send_sms').removeClass('disabled');
                    }
                });
            });
            $('.send_email').on('click', function() {
            $('.error-message').html('');
            $('.send_email').addClass('disabled');
                $('#send_email_spinner').removeClass('d-none');
                var formData = new FormData($('#gmail')[0]);
                var selectedLeads = [];
                $('.lead-id:checked').each(function() {
                    selectedLeads.push($(this).attr('leads-user-id'));
                });
                formData.append('selectedLeads', selectedLeads);
                $.ajax({
                    url: "{{ route('send-email') }}",
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#send_email_spinner').addClass('d-none');
                        $('.send_email').removeClass('disabled');
                        if (response.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success...',
                                text: response.message,
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                            });
                        }
                    },
                    error: function(response) {
                        $('#send_email_spinner').addClass('d-none');
                        $('.send_email').removeClass('disabled');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.responseJSON.message,
                        });
                    }
                });
            });

            $('.sms_list').on('click', function() {
                $('.sms-list-data').html('');
                var phone_id = $(this).attr('data-id');
                var msg = 'sms';
                setupCSRF();
                $.ajax({
                    url: "{{route('show-lead-sms')}}",
                    method: 'post',
                    data:{phone_id:phone_id,msg:msg},
                    success: function(response){
                        if(response.status == false){
                            var error_message = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        ${response.message}
                                    </div>`;
                            $('.error-message').html(error_message);
                        }else{
                            var sms_table = `<table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                            if(response.data.length == 0){
                                sms_table += `<tr>
                                    <td colspan="3" class="text-center">No Record Found</td>
                                </tr>`;
                            }else{
                                $.each(response.data, function(key, value) {
                                    sms_table += `<tr>
                                        <td>${value.subject}</td>
                                        <td>${value.recepients}</td>
                                        <td class='text-wrap'>${value.body}</td>
                                    </tr>`;
                                });
                            }
                            sms_table += `</tbody></table>`;
                            $('.sms-list-data').html(sms_table);
                        }
                        $('.send_sms').removeClass('disabled');
                    },
                    error: function(response){
                        var error_message = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    ${response.responseJSON.message}
                                </div>`;
                        $('.error-message').html(error_message);
                        $('.send_sms').removeClass('disabled');
                    }
                });
            });
            $('.email_list').on('click', function() {
                $('.email-list-data').html('');
                var email = $(this).attr('data-id');
                var msg = 'sms';
                setupCSRF();
                $.ajax({
                    url: "{{route('show-lead-email')}}",
                    method: 'post',
                    data:{email:email,msg:msg},
                    success: function(response){
                        if(response.status == false){
                            var error_message = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        ${response.message}
                                    </div>`;
                            $('.error-message').html(error_message);
                        }else{
                            var sms_table = `<table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                            if(response.data.length == 0){
                                sms_table += `<tr>
                                    <td colspan="3" class="text-center">No Record Found</td>
                                </tr>`;
                            }else{
                                $.each(response.data, function(key, value) {
                                    sms_table += `<tr>
                                        <td>${value.subject}</td>
                                        <td>${value.recepients}</td>
                                        <td class='text-wrap'>${value.body}</td>
                                    </tr>`;
                                });
                            }
                            sms_table += `</tbody></table>`;
                            $('.email-list-data').html(sms_table);
                        }
                        $('.send_email').removeClass('disabled');
                    },
                    error: function(response){
                        var error_message = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    ${response.responseJSON.message}
                                </div>`;
                        $('.error-message').html(error_message);
                        $('.send_email').removeClass('disabled');
                    }
                });
            });
        });
    </script>
@endsection
