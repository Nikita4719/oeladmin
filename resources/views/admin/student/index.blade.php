@extends('admin.include.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
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
                        <li class="breadcrumb-item text-muted">Manage All Students</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card-group">
        <div class="card">
            <div class="card-body myform">
                <form action="{{ route('student-list') }}" method="GET">

                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control  formmrgin" name="name"
                                value="{{ request()->get('name') }}" placeholder="Student Name " pattern="[A-Za-z\s]+" 
                                
                                oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                        </div>
                       
                      <div class="col-md-4">
                            <input type="email" class="form-control formmrgin" name="email"
                                value="{{ request()->get('email') }}" placeholder="Student Email"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                               >
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control  formmrgin" name="phone_number"
                                value="{{ request()->get('phone_number') }}" placeholder="Student Phone Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control  formmrgin" name="zip"
                                value="{{ request()->get('zip') }}" placeholder="Pincode" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);">
                        </div>
                        @php
                        $countries =App\Models\Country::get();
                        @endphp
                        <div class="col-md-4">
                            <select class="form-control form-select-payy  country formmrgin" name="country_id">
                                <option value="">-- Select Country --</option>
                                @foreach ($countries as $item)
                                <option value="{{ $item->id }}"
                                    {{ request()->get('country_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <input type="date" name="from_date" class="form-control  formmrgin"
                                value="{{ request()->get('from_date') }}" placeholder="From Date">
                        </div>

                        <div class="col-md-4">
                            <input type="date" name="to_date" class="form-control  formmrgin"
                                value="{{ request()->get('to_date') }}" placeholder="to Date" value="">
                        </div>
                        <div class="col-md-2 ">
                            <a href="{{ route('student-list') }}" class="btn btn-info d-lg-block  formmrgin">Reset
                            </a>
                        </div>
                        <div class="col-md-1 ">
                            <button type="submit" value="submit" class="btn btn-info d-lg-block  formmrgin px-4"
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
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Pincode</th>
                        <th>Login</th>
                        <th>Apply Oel 360</th>
                        <th>Payment Link</th>
                    </tr>
                </thead>
                <tbody id="lead-list">
                    @foreach ($student_profile as $item)
                    <tr>
                        <td>{{ $loop->index + (($student_profile->currentPage() - 1) * $student_profile->perPage()) + 1 }}</td>
                        <td>{{ $item->first_name ?? null }}</td>

                        <td>{{ $item->phone_number ?? null }}</td>
                        <td>{{ $item->email ?? null }}</td>
                        <td>{{ $item->zip ?? null }}</td>
                        <!-- <td>{{ $item->country->name ?? null }}</td> -->
                        <!-- <td>{{ $item->province->name ?? null }}</td> -->
                        @php
                        $user =\App\Models\User::where('email', $item->email)->first();
                        $users = Auth::user();
                        @endphp
                        <td class="txt-oflo">
                            @if ($user && $user->email !== null && $user->password !== null)
                            @if(!(Session::has('admin_user')))
                            @if ($users->hasRole('Administrator') || $users->hasRole('visa') || $users->hasRole('agent') || $users->hasRole('sub_agent') || $users->hasRole('Application Punching'))
                            <a class="btn btn-info" data-toggle="tooltip" title="Login as Student" href="{{ route('impersonate', $user) }}" style="margin-top: 5px;">
                                <i class="fa fa-sign-in-alt"></i>
                            </a>
                            @endif
                            @endif
                            @endif
                        </td>
                        @if ($item->status_threesixty)
                        <td class="txt-oflo">
                            <a class="btn btn-info" data-toggle="tooltip" title=" Apply Oel 360" href="{{ route('apply-360',$user) }}" style="margin-top: 5px;" >
                                <i class="fa fa-check"></i>
                            </a>
                        </td>
                        @else
                        <td>-</td>

                        @endif
                        @if(!empty($item->email))
                        <td scope="col">
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm payment_model shadow-sm  d-inline-flex align-items-center justify-content-center gap-2 position-relative hover-scale payment--cardd" data-toggle="tooltip" title="Payment" id="score" student-id="{{$item->user_id}}" data-tour="search"
                                data-bs-toggle="offcanvas" data-bs-target="#gmat"
                                aria-controls="gmat">
                                <i class="fa fa-credit-card text-dark fs-4" aria-hidden="true"></i></a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        {{ $student_profile->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- payment  --}}
<div class="offcanvas offcanvas-end border-0 paymentss-container" tabindex="-1" id="gmat">
    <div class="sidebar-headerset paymentss-header">
        <div class="sidebar-headersets">
            <h5>Payments</h5>
        </div>
        <div class="sidebar-headerclose">
            <a data-bs-dismiss="offcanvas" aria-label="Close">
                <img src="{{asset('assets/img/close.png')}}" alt="Close Icon">
            </a>
        </div>
    </div>
    <div class="offcanvas-body">
        <div class="responseMessage"></div>
        <div class="row">
            <div class="card-stretch-full">
                <div class="row ">
                    <form class="row payment-form-payy" id="score-data">

                        <div class="col-12">
                            <div class="form-floating input-group-payy">
                                <select class="form-control form-select-payy" name="selected_university" id="selected_university"  placeholder="Type" required>
                                    <option value="">--Select University -</option>
                                    
                                </select>
                                <label for="selected_university" class="form-label">Select University</label>
                                <span class="text-danger error-selected-program"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating input-group-payy">
                                <select class="form-control form-select-payy " name="selected_program" id="selected_program" placeholder="Type" required onchange="getappfee(this.value)">
                                    <option value="">--Select Program -</option>
                                </select>
                                <label for="selected_program" class="form-label">Select Program</label>
                                <span class="text-danger error-selected-program"></span>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-floating input-group-payy">
                                <select class="form-control form-select-payy " name="master_service" id="usr-fees_type" placeholder="Type" required onchange="getSubService(this.value)">
                                    <option value="">--Select Master Service--</option>
                                    @foreach ($master_service as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <label for="usr-fees_type" class="form-label">Master Service</label>
                                <span class="text-danger error-master-service"></span>
                            </div>
                        </div>
                        <!-- <div class="col-12">
                            <div class="form-floating input-group-payy">
                                <select class="form-control form-select-payy " name="sub_service[]" multiple id="usr-sub_service" placeholder="Type" required>
                                    <option value="">--Select Sub Service--</option>
                                </select>
                                <label for="usr-sub_service" class="form-label">Sub Service</label>
                                <span class="text-danger error-sub-service"></span>
                            </div>
                        </div> -->

                        <div class="col-12">
                            <div class="form-floating input-group-payy">
                                <div class="sub-service-wrapper-payy">
                                    <div class="custom-dropdown position-relative">
                                        <!-- <label for="sub-service-input" class="payment-header-payy">Sub Services</label> -->
                                        <input type="text" class="form-control form-select-payy" id="sub-service-input" readonly placeholder="Select Sub Services ">
                                        <div class="dropdown-menu menu w-100 p-2">
                                            <div class="options-list1" id="sub-service-options"></div>
                                        </div>
                                        <select class="d-none" name="sub_service[]" multiple id="usr-sub_service" required></select>

                                    </div>
                                    <div class="selected-options-payy mt-2"></div>
                                </div>
                                <span class="text-danger error-sub-service"></span>
                            </div>
                        </div>
                        <input type="hidden" id="application_fee">
                        @php
                        $users = Auth::user();
                        @endphp
                        @if($users->hasRole('Application Punching')|| $users->hasRole('Administrator'))
                        <div class="col-12">
                            <div class="form-floating input-group-payy">
                                <input id="usr-amount" name="amount" type="number" readonly class="form-control" placeholder="Number" autocomplete="amount" required>
                                <label for="usr-amount" class="form-label">Amount</label>
                                <span class="text-danger error-amount"></span>
                            </div>
                        </div>
                        @else
                        <div class="col-12">
                            <div class="form-floating input-group-payy">
                                <input id="usr-amount" name="amount" type="number" readonly class="form-control" placeholder="Number" autocomplete="amount" required>
                                <label for="usr-amount" class="form-label">Amount</label>
                                <span class="text-danger error-amount"></span>
                            </div>
                        </div>
                        @endif
                        <div class="col-12">
                            <div class="form-floating input-group-payy">
                                <select class="form-control form-select-payy" name="is_discount" id="is_discount" onchange="discountField()">
                                    <option value="">--Select Discount--</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <label for="is_discount" class="form-label">Discount</label>
                            </div>
                        </div>
                        <div class="col-12 discount-field" style="display: none;">
                            <div class="form-floating input-group-payy">
                                <input id="usr_discount" name="discount" type="number" class="form-control" placeholder="Number" autocomplete="discount">
                                <label for="usr_discount" class="form-label">Discount</label>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 vsb payment">
                            <label>Payment Mode<span class="text-danger">*</span></label>
                            <select name="paymentMode" class="form-control " id="paymentMode">
                                <option value="">Select Payment Mode</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Online">Online</option>
                                <option value="Bank">Bank</option>
                            </select>
                            <div class="payment-mode-error text-danger"></div>
                            <br>
                            <div class="paymentModeRemarks" style="display:none;">
                                <input type="text" name="paymentModeRemarks" class="form-control "
                                    placeholder="Enter Details Here" id="paymentModeRemarks">
                                <div class="payment-mode-remarks-error text-danger"></div>
                            </div>
                            {{-- for bank details  --}}
                            <div class="bank-details" style="display:none;">
                                <input type="text" name="bankName" class="form-control "
                                    placeholder="Enter Bank Name" id="bankName">
                                <div class="bank-name-error text-danger"></div>
                                <br>
                                <input type="text" name="accountNo" class="form-control "
                                    placeholder="Enter Account No" id="accountNo">
                                <div class="account-no-error text-danger"></div>
                                <br>
                                <input type="text" name="ifscCode" class="form-control "
                                    placeholder="Enter IFSC Code" id="ifscCode">
                                <div class="ifsc-code-error text-danger"></div>
                                <br>
                            </div>
                            {{-- end bank details  --}}
                        </div> -->
                        <div class="col-md-12 vsb payment payment-section-payy">
                        <div class="payment-header-payy">Payment Method</div>
                        <div class="form-floating input-group-payy">
                            <select name="paymentMode" class="form-control form-select-payy payment-select-payy" placeholder="Payment Mode" id="paymentMode" required>
                            <option value="">Select Payment Mode *</option>
                            <option value="Cash">Cash</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Online">Online</option>
                            <option value="Bank">Bank</option>
                            </select>
                            <div class="payment-mode-error text-danger"></div>
                        </div>

                            <div class="paymentModeRemarks input-group-payy" style="display:none;">
                                <input type="text" name="paymentModeRemarks" class="form-control payment-input-payy" placeholder="Enter Payment Details" id="paymentModeRemarks">
                                <div class="payment-mode-remarks-error text-danger"></div>
                            </div>

                            <div class="bank-details input-group-payy" style="display:none;">
                                <div class="bank-details-grid-payy">
                                <div class="bank-input-group-payy">
                                    <input type="text" name="bankName" class="form-control payment-input-payy" placeholder="Enter Bank Name" id="bankName">
                                    <div class="bank-name-error text-danger"></div>
                                </div>
                                <div class="bank-input-group-payy">
                                    <input type="text" name="accountNo" class="form-control payment-input-payy" placeholder="Enter Account No" id="accountNo">
                                    <div class="account-no-error text-danger"></div>
                                </div>
                                <div class="bank-input-group-payy">
                                    <input type="text" name="ifscCode" class="form-control payment-input-payy" placeholder="Enter IFSC Code" id="ifscCode">
                                    <div class="ifsc-code-error text-danger"></div>
                                </div>
                                </div>
                            </div>
                            </div>

                        <div class="col-12">
                            <div class="form-floating input-group-payy">
                                <input id="usr-listening_score" name="remarks" type="text" class="form-control" placeholder="Remarks" required>
                                <input id="usr-listening_score remark_student" type="hidden" name="student_id">
                                <label for="usr-listening_score" class="form-label">Remark</label>
                                <span class="text-danger error-remark"></span>
                            </div>
                        </div>
                    </form>
                    <div class="row payment-button" style="display: none">
                        <div class="col-md-6 mb-4">
                            <button type="button " class="btn btn-info d-lg-block m-l-15 btnDiv " id="payment">
                                Payment
                                <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                    <div class="row submit-amount" style="display: none">
                        <div class="col-md-6 mb-4">
                            <button type="button " class="btn btn-info d-lg-block m-l-15 btnDiv " id="submitData">
                                 Submit
                                <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Master Service</th>
                        <th>Amount</th>
                        <th>Remarks</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="score-table">

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Payment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Master Service</th>
                            <th>Program Name</th>
                            <th>Amount</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody id="payment_table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<input type="hidden" class="student_second_id" name="student_second_id" id="student_second_id">
{{-- test Score --}}
<div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="viewlead">
    <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
        <div class="sidebar-headersets">
            <h5> Lead Details </h5>
        </div>
        <div class="sidebar-headerclose">
            <a data-bs-dismiss="offcanvas" aria-label="Close">
                <img src="{{asset('assets/img/close.png')}}" alt="Close Icon">
            </a>
        </div>
    </div>
    <div class="table-responsive" style="  margin: 0px 12px;">
        <table class="table table-striped custom-table mb-0" id="lead-details-table">
        </table>
    </div>
</div>
{{-- test Score --}}
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
<script>
    $('#paymentMode').on('change', function() {
        var selectedValue = $(this).val();
        if (selectedValue === 'Cash' || selectedValue === 'Cheque') {
            $('.paymentModeRemarks').show();
            $('.bank-details').hide();
            $('.submit-amount').show();
            $('.payment-button').hide();
        } else if (selectedValue === 'Bank') {
            $('.bank-details').show();
            $('.paymentModeRemarks').hide();
            $('.submit-amount').show();
            $('.payment-button').hide();
        } else {
            $('.paymentModeRemarks').hide();
            $('.bank-details').hide();
            $('.submit-amount').hide();
            $('.payment-button').show();
        }
    });

    function discountField() {
        if ($("#is_discount").val() == "1") {
            $(".discount-field").show();
        } else {
            $(".discount-field").hide();
        }
    }

    

    function getSubService(master_service_id) {
        $.ajax({
            url: "{{route('get-sub-service')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "master_service_id": master_service_id
            },
            success: function(response) {
                const hiddenSelect = $('#usr-sub_service');
                const optionsList = $('#sub-service-options');

                hiddenSelect.empty();
                optionsList.empty();

                if (response.subservice?.length > 0) {
                    response.subservice.forEach(function(item) {
                        const option = new Option(item.name, item.id);
                        hiddenSelect.append(option);

                        const optionItem = `
                        <div class="option-item" data-value="${item.id}" data-name="${item.name}">
                        ${item.name}
                        </div>
                        `;
                        optionsList.append(optionItem);
                    });
                } else {
                    optionsList.append('<div class="p-2">No records found</div>');
                    $('#usr-amount').val('');
                }

                if (master_service_id === "2") {
                    $('#usr-amount').val($('#application_fee').val());
                    return false;
                }

                $('#usr-amount').val(response.amount);
                updateSelectedDisplay();
            },
            error: function(xhr) {
                console.log(xhr);
                $('#sub-service-options').html('<div class="p-2">Error loading services</div>');
            }
        });
    }

    function updateSelectedDisplay() {
        const selectedContainer = $('.selected-options-payy');
        selectedContainer.empty();

        $('.options-list1 .option-item.selected').each(function() {
            const value = $(this).data('value');
            const name = $(this).data('name');
            selectedContainer.append(`
                  <span class="badge" data-value="${value}">
                  ${name}
                  <i class="fas fa-times" onclick="removeSelection('${value}')"></i>
                  </span>
                `);
        });

        updateHiddenSelect();
    }

    function removeSelection(value) {
        $(`.options-list1 .option-item[data-value="${value}"]`).removeClass('selected');
        updateSelectedDisplay();
    }

    function updateHiddenSelect() {
        const selectedValues = $('.options-list1 .option-item.selected').map(function() {
            return $(this).data('value');
        }).get();

        $('#usr-sub_service').val(selectedValues).trigger('change');
    }

    $(document).ready(function() {
        $('#sub-service-input').on('click', function() {
            $(this).closest('.custom-dropdown').find('.menu').toggleClass('show');
        });

        $(document).on('click', '.option-item', function() {
            $(this).toggleClass('selected');
            updateSelectedDisplay();
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('.custom-dropdown').length) {
                $('.menu').removeClass('show');
            }
        });
    });


    function getappfee(pro_id) {
        $.ajax({
            url: "{{route('get-app-fee')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "pro_id": pro_id
            },
            success: function(response) {
                $('#usr-amount').val(response.application_fee);
                $('#application_fee').val(response.application_fee);
            },
            error: function(xhr, status, error) {
                console.log(xhr);
            }
        });
    }

    $(document).ready(function() {
        function setupCSRF() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        $('.btnDiv').on('click', function(event) {
            $('.btnDiv').addClass('disabled');
            var spinner = this.querySelector('.spinner-grow');
            spinner.classList.remove('d-none');
            var formData = $('#score-data').serialize();
            setupCSRF();
            $.ajax({
                url: `{{ route('send-payment-link') }}`,
                type: 'post',
                data: formData,
                success: function(response) {
                    spinner.classList.add('d-none');
                    if (response.status) {
                        fetchscore(response.student_id);
                        Swal.fire(
                            'Success!',
                            'Payment link sent successfully',
                            'success'
                        );
                        setTimeout(() => {
                            // location.reload();
                        }, 1000);
                    }
                    $('.btnDiv').removeClass('disabled');
                    $('#score-data')[0].reset();
                },
                error: function(xhr) {
                    $('.btnDiv').removeClass('disabled');
                    spinner.classList.add('d-none');
                    var response = JSON.parse(xhr.responseText);
                    console.log(response);
                    if (!(response.status)) {
                        Swal.fire(
                            'Error!',
                            response.message,
                            'error'
                        );
                    }
                }
            });
        });
        
        $('.payment_model').on('click', function() {
            var student_id = $(this).attr('student-id');
            $('#student_second_id').val(student_id);
            $('input[name="student_id"]').val(student_id);
            fetchscore(student_id);
        });

        function fetchscore(student_id) {
            $('.score-table').empty();
            setupCSRF();
            $.ajax({
                url: "{{ route('fetch-student-payment') }}",
                method: 'get',
                data: {
                    student_id: student_id
                },
                success: function(response) {
                    console.log(response.program_applied);
                    var score = response.payment_data;
                    var fee = response.program_applied;
                    if ($.isEmptyObject(response)) {
                        $('.score-table').append('<option value="">No records found</option>');
                    } else {
                        $.each(score, function(key, value) {
                            key++;
                            $('.score-table').append('<tr><td>' +
                                key + '</td><td>' +
                                (value.master_service ? value.master_service.name : '') + '</td><td>' +
                                value.amount + '</td><td>' +
                                value.remarks + '</td><td class="text-center  view-payment"  data-id="' + value.id + '" user-id="' + value.user_id + '"><i class="la la-eye btn btn-secondary"></i> </td> <td><a href="#" class="btn btn-sm btn-danger delete-score" data-id="' + value.id + '"><i class="la la-trash"></i></a></td></tr>');
                        });
                    }
                    // if (response.program_applied != null) {
                    //     $('#selected_program').empty();
                    //     $('#selected_program').append(`<option value="">--Select Program -</option>`);
                    //     $.each(response.program_applied, function(index, item) {
                    //         $('#selected_program').append(`<option value="${item.program?.id}">${item.program?.name}</option>`);
                    //     });
                    // }

                    if (response.university != null) {
                        $('#selected_university').empty();
                        $('#selected_university').append(`<option value="">--Select University-</option>`);
                        $.each(response.university, function(index, item) {
                            $('#selected_university').append(`<option value="${item?.id}">${item?.university_name}</option>`);
                        });
                    }

                }
            }).then(function() {
                $('.delete-score').on('click', function(e) {
                    e.preventDefault();
                    var score_id = $(this).data('id');
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
                            setupCSRF();
                            $.ajax({
                                url: "{{ route('delete-payment-link') }}",
                                method: 'get',
                                data: {
                                    score_id: score_id
                                },
                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Payment Deleted Successfully',
                                        showConfirmButton: false,
                                        timer: 1000
                                    });
                                    setTimeout(function() {
                                        location.reload();
                                    }, 1100);
                                }
                            });
                        }
                    });
                });
            });
        }

        $(document).on('click', '.view-payment', function() {
            var student_id = $(this).attr('user-id');
            var payment_id = $(this).attr('data-id');
            console.log(student_id);
            console.log(payment_id);
            $('#paymentModal').modal('show');
            $.ajax({
                url: "{{ route('fetch-payment-details') }}",
                method: 'get',
                data: {
                    student_id: student_id,
                    payment_id: payment_id
                },
                success: function(response) {
                    $('#payment_table').empty();
                    $.each(response.about_payment, function(index, value) {
                        var table = `<tr>
                                            <td>${value.payment_link.master_service.name}</td>
                                            <td>${value.payment_link.program.name}</td>
                                            <td>${value.payment_link.currency} ${value.payment_link.amount}</td>
                                            <td>${value.payment_status}</td>
                                          </tr>`;
                        $('#payment_table').append(table);
                    });
                }
            });
        });
    });
</script>

<script>


        $("#selected_university").change(function() {
            // Get the student ID from an element with the class .student_second_id
            var student_id = $(".student_second_id").val();  
            
            // Ensure student_id is available
            if (!student_id) {
                alert("Student ID is not available.");
                return;  // Exit the function if student_id is missing
            }

            var selectedUniversityId = $(this).val();  // Get the selected university ID

            // Ensure university ID is selected
            if (!selectedUniversityId) {
                alert("Please select a university.");
                return;  // Exit the function if no university is selected
            }


            // AJAX call to get program data
            $.ajax({
                url: "{{ route('get-program') }}",
                method: 'get',
                data: {
                    selectedUniversityId: selectedUniversityId,
                    student_id: student_id  // Send student_id in the request
                },
                success: function(response) {
                    // console.log(response.program_appliedd);  // Log the response to check the data

                    if (response.program_appliedd != null && response.program_appliedd.length > 0) {
                        // Clear the existing program options
                        $('#selected_program').empty();

                        // Add a default option
                        $('#selected_program').append(`<option value="">--Select Program--</option>`);

                        // Populate the program options dynamically
                        $.each(response.program_appliedd, function(index, item) {
                            console.log(item.program?.name);
                            $('#selected_program').append(`<option value="${item.program?.id}">${item.program?.name}</option>`);
                        });
                    } else {
                        // If no programs are available
                        $('#selected_program').empty();
                        $('#selected_program').append(`<option value="">No programs available</option>`);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error case
                    console.error("Error fetching program data:", error);
                    alert("An error occurred while fetching the programs. Please try again later.");
                }
            });
        });

</script>
@endsection