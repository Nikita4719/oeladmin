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
                            <li class="breadcrumb-item text-muted"> Lead List </li>
                        </ol>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('admin.create_new_lead') }}" class="btn add-btn">
                            <i class="fa-solid fa-plus"></i> Add Lead </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-group">
            <div class="card">
                <div class="card-body myform">
                    <form action="{{ route('leads-filter') }}" method="GET">
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
                            <div class="col-md-4">
                                <select class="form-control  country formmrgin" name="country_id" >
                                    <option value="">-- Select Country --</option>
                                    @foreach ($countries as $item)
                                        <option value="{{ $item->id }}"
                                            {{ request()->get('country_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <select name="province_id"  class="form-control  province_id  formmrgin">
                                    <option value="">-State/Provision -</option>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <select name="lead_status" class="form-control  formmrgin">
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
                                <input type="date" name="from_date" class="form-control  formmrgin"
                                    value="{{ request()->get('from_date') }}" placeholder="From Date">
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <input type="date" name="to_date" class="form-control  formmrgin"
                                    value="{{ request()->get('to_date') }}" placeholder="to Date" value="">
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <select name="assigned_status" class="form-control  formmrgin">
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
                                <select  name="intakeMonth" class="form-control  formmrgin">
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
                                <select class="form-control  formmrgin" name="intake_year" v-model="intake_year">
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
                           @if(Auth::user()->hasRole('Administrator'))
                          <div class="col-md-4 col-sm-4">
                                <select name="agent" class="form-control  formmrgin">
                                   <option value="">-- Agent --</option>
                                    @foreach ($agents as $item)
                                    <option value="{{ $item->id }}"
                                        {{ request()->get('agents') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                           @endif
                           @if(Auth::user()->hasRole('Administrator') || Auth::user()->hasRole('agent'))
                            <div class="col-md-4 col-sm-4">
                                <select name="sub_agent" class="form-control  formmrgin">
                                   <option value="">--Select Sub Agent --</option>
                                    @foreach ($sub_agents as $item)
                                    <option value="{{ $item->id }}"
                                        {{ request()->get('sub_agent') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                           @endif
                            <div class="col-md-4 col-sm-4">
                                <select name="source" class="form-control  formmrgin">
                                   <option value="">--Select Source --</option>
                                    @foreach ($source as $item)
                                    <option value="{{ $item->name }}"
                                        {{ request()->get('source') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4">
                            </div>
                          @if(Auth::user()->hasRole('Administrator'))
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-info d-lg-block formmrgin" name="export"
                                    value="export">Export to Excel</button>
                            </div>
                            @endif
                            <div class="col-md-2 ">
                                <a href="{{ route('leads-filter') }}" class="btn btn-info d-lg-block  formmrgin">Reset
                                </a>
                            </div>
                            <div class="col-md-1 ">
                                <button type="submit" value="submit" class="btn btn-info d-lg-block  formmrgin px-4"
                                    name="submit">Filter </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
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
                            @if (($users->hasRole('agent')) || ($users->hasRole('Administrator')))
                            <th><input type="checkbox" class="checked_all_lead"> R.F</th>
                            @endif
                            <th>Follow Up Time</th>

                            <th>Date</th>
                            <th> Source </th>
                            <th> Name </th>
                           
                            <th> Phone</th>
                            <th> Email</th>
                           
                            <th>Status</th>
                            <th> Course </th>
                            <th> Intake </th>
                            <th> IntakeY</th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody id="lead-list">
                        @php
                            $i = ($lead_list->currentPage()-1)* $lead_list->perPage()+2;
                        @endphp
                        @foreach ($lead_list as $data)
                            <tr>
                                @php
                                    $users =Auth::User();
                                    $user = App\Models\User::where('id',$data->assigned_to)->pluck('name')->first();
                                    $frenchise = App\Models\User::where('id',$data->added_by_agent_id)->pluck('name')->first();
                                @endphp
                                @if (($users->hasRole('agent')) || ($users->hasRole('Administrator')))
                                    <td>
                                        <input type="checkbox" class="assigned_lead" id = "{{$data->id}}">
                                        <a class="frenchise-details" href="#" data-bs-toggle="offcanvas"  lead-id="{{$data->id}}" data-bs-target="#viewlead" aria-controls="viewlead">
                                            <span class="badge bg-inverse-success">
                                            <i class="las la-hands-helping"></i>
                                        </a><br>
                                        @if(!empty($data->assigned_to))
                                            @if(($users->hasRole('Administrator')) || ($users->hasRole('agent')))
                                                    @if($data->assigned_to == $data->added_by_agent_id)
                                                       {{$frenchise ?? ''}} <br>
                                                    @else
                                                        Frenchise: {{$frenchise ?? ''}} <br>
                                                        Sub Agent : {{$user ?? ''}}
                                                    @endif
                                            @endif
                                        @endif
                                    </td>
                                @endif
                                <td>{{ $data->follow_up_delay_text ?? 'Not Followed Yet'  }}</td>

                                <td>
                                    {{ $data->created_at }}
                                </td>
                                <td>{{ Str::limit($data->source, 100, '...')  }}</td>
                                <td>{{ Str::limit($data->name, 12, '...')  }}</td>
                                <td><a href="tel:{{$data->phone_number}}">
                                        <span class="badge bg-inverse-success">
                                    <i class="la la-phone"></i> {{$data->phone_number}}
                                    </span>
                                    </a>
                                </td>
                                <td>{{ $data->email }}</td>
                                @php
                                    $lead_status =App\Models\MasterLeadStatus::where('id',$data->lead_status)->Select('id','name','color')->first();
                                @endphp
                                <td title="{{ $lead_status->color ?? '' }}">
                                    {{ $lead_status->name ?? '' }}
                                </td>
                                <td>{{  Str::limit($data->course, 12, '...')  }} </td>
                                <td>
                                    @php
                                        $intake = $data->intake;
                                        if (is_numeric($intake)) {
                                            $dateTime = DateTime::createFromFormat('!m', $intake);
                                            $formattedDate = $dateTime ? $dateTime->format('F') : '';
                                        } else {
                                            $formattedDate = $intake;
                                        }
                                    @endphp
                                    {{ $formattedDate }}
                                </td>
                                <td>{{ $data->intake_year }}</td>
                                <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('manage-lead', [$data->id]) }}">
                                                <i class="fa-solid fa-users m-r-5"></i> Manage Lead
                                            </a>
                                           
                                            <a class="dropdown-item" href="{{ route('edit-lead', [$data->id]) }}">
                                                <i class="fa-solid fa-pencil m-r-5"></i> Edit
                                            </a>
                                            <a class="dropdown-item" href="{{ route('view-lead', [$data->id]) }}">
                                                <i class="fa-solid fa-eye m-r-5"></i> View
                                            </a>
                                            @php
                                                $user =App\Models\User::where('email',$data->email)->first();
                                            @endphp
                                            @if($user)
                                                <a class="dropdown-item" href="{{ route('impersonate', $user) }}">
                                                    <i class="fa-solid fa-user m-r-5"></i> Login To {{ Str::substr($data->name,0,8)  }}
                                                </a>
                                            @else
                                                @if(!empty($data->email))
                                                <a class="dropdown-item" href="{{ route('create-student-profile', [$data->id]) }}">
                                                    <i class="fa-solid fa-user m-r-5"></i>Create Profile
                                                </a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
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
    <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="viewlead">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
          <div class="sidebar-headersets">
            <h5> Reallocated  Franchise</h5>
          </div>
          <!-- <div class="sidebar-headerclose">
            <a data-bs-dismiss="offcanvas" aria-label="Close">
              <img src="{{asset('assets/img/close.png')}}" alt="Close Icon">
            </a>
          </div> -->
          <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close" class="close-icon">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="error-message">

        </div>
        <div class="offcanvas-body">
            <div class="row">
               <div class="card card-stretch-full">
                  <div class="card-body card-body-scrollable table-responsive ">
                     <table class="table table-modern table-hover">
                        <thead>
                           <tr>
                              <th width="140"></th>
                              <th>Franchise</th>
                           </tr>
                        </thead>
                        <tbody id="agent-details-table">
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
        </div>
      </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
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
            $('.frenchise-details').click(function(e) {
                $('.error-message').empty();
                e.preventDefault();
                setupCSRF();
                var lead_id = $(this).attr('lead-id');
                $.ajax({
                    url: "{{ route('relocated-frenchise') }}",
                    method: 'get',
                    data: {
                        lead_id: lead_id
                    },
                    success: function(response){
                        $('#agent-details-table').empty();
                        response.forEach(function(entry){
                            var agent_data = `<tr>
                                <td>
                                    <button class="btn btn-outline-primary relocate-button" data-record-id="${entry.id}">Reallocate</button
                                </td>
                                <td>${entry.email}</td>
                                <!-- Add more <td> elements for other data fields as needed -->
                            </tr>`;
                            $('#agent-details-table').append(agent_data);
                        });
                    }
                });
            });
            const t = document.querySelector(".checked_all_lead"),
                o = document.querySelectorAll('[type="checkbox"]');
                t.addEventListener("change", t => {
                o.forEach(e => {
                    e.checked = t.target.checked
                })
            });

            $('#agent-details-table').on('click', '.relocate-button', function() {
                var recordId = $(this).data('record-id');
                var checkedIds = [];
                $('#lead-list').find('.assigned_lead').each(function() {
                    if ($(this).prop('checked')) {
                        checkedIds.push($(this).attr('id'));
                    }
                });
                console.log(checkedIds);
                setupCSRF();
                $.ajax({
                    url: "{{route('assign-leads')}}",
                    method: 'Post',
                    data: {
                        leadIds: checkedIds,agentId:recordId
                    },
                    success: function(response){
                        if(response.status){
                                Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        }else{
                            Swal.fire({
                            title: 'Warning!',
                            text: response.message,
                            icon: 'warning',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        });
                        }
                    }
                });
            });
        });
    </script>
@endsection
