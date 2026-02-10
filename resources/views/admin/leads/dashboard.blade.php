@extends('admin.include.app')
@section('main-content')
    <!-- Page Header -->
    <div class="page-header">
       <div class="row">
          <div class="card card-buttons">
             <div class="card-body">
                <div class="row">
                   <div class="col-md-9">
                      <ol class="breadcrumb text-muted mb-0">
                         <li class="breadcrumb-item">
                            <a href="#"> Welcome</a>
                         </li>
                         <li class="breadcrumb-item text-muted">Lead Dashboard</li>
                      </ol>
                   </div>
                   <div class="col-md-3">
                      <p class="subheader_left"> Overseas Education Lane</p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- /Page Header -->
    <div class="row">
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                
                <div clas="col-md-12">
                   <div class="totalno">
                      <h5> Total Leads</h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                         <i class="la la-user clruser"></i> {{$data['total_leads']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                   </div>
                </div>
             </div>

          </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                
                <div clas="col-md-12">
                   <div class="totalno">
                      <h5> High Quality</h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                      
                         <i class="la la-user clruser"></i> {{$data['High']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?lead_quality=High')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                   </div>
                </div>
             </div>

          </div>
       </div>
      
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <div class="card dash-widget">
             <div class="row">
                
                <div clas="col-md-12">
                   <div class="totalno">
                      <h5> Low Quality	</h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="blclr">
                      <h5>
                         <i class="la la-user clruser"></i> {{$data['Low']}}
                      </h5>
                   </div>
                </div>
                <div clas="col-md-12">
                   <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?lead_quality=Low')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                   </div>
                </div>
             </div>

          </div>
       </div>
       
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Total Cold Leads</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['total_cold_leads']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?lead_status=4')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                    </div>
                </div>
            </div>

            </div>
       </div>
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Total New Leads</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['total_new_leads']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?lead_status=1')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Total Hot Leads</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['total_hot_leads']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?lead_status=3')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Total Future Leads</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['total_future_leads']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?lead_status=6')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
   

      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Total Not Useful Leads</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['total_not_useful_leads']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?lead_status=5')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Total Warms Lead</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['total_warm_leads']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?lead_status=2')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Total Closed Lead</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['total_closed_leads']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?lead_status=7')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Total Allocated Leads</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['total_assigned_leads']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?assigned_status=allocated')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Total Non-Allocated Leads</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['total_non_allocated_leads']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                        <a href="{{ url('admin/leads-lists?assigned_status=notallocated')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Upcoming Leads</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['total_upcoming_leads']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                       <a href="{{ url('admin/leads-lists?uppcoming_leads=upcoming-leads')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Missed Leads</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                        <i class="la la-user clruser"></i> {{$data['count_next_leads_miss']}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">
                       <a href="{{ url('admin/leads-lists?missed_leads=missed-leads')}}">
                            <button type="button" class="btn btn-outline-primary">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="table_heading">
       <h4 class="up"> Upcoming Call List</h4>
    </div>
    <div class="row px-3">
       <div class="col-md-12">
          <div class="table-responsive">
             <table class="table table-striped custom-table mb-0">
                <thead>
                   <tr>
                      <th>S.N</th>
                      <th>Date</th>
                      {{-- <th> Pincode</th> --}}
                      <th> Name</th>
                      <th> Phone</th>
                      <th> Email</th>
                      <th> Course</th>
                      <th> Intake</th>
                      <th> IntakeYear</th>
                      {{-- <th> AllocatedFranchise </th> --}}
                      <th> Status </th>
                      <th></th>
                      <th></th>
                   </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($next_leads as $item)
                        <tr>
                        <td>
                            <a href="#">{{$i}}</a>
                        </td>
                        <td>
                            <a href="#">{{$item->next_calling_date}} </a>
                        </td>
                        {{-- <td> {{$item->zip}} </td> --}}
                        <td> {{$item->name}}</td>
                        <td> {{$item->phone_number}}</td>
                        <td>  {{$item->email}} </td>
                        <td> {{ substr($item->course,0,16)}}</td>
                        <td> {{$item->intake}}</td>
                        <td> {{$item->intake_year}}</td>
                        {{-- <td>
                            <span>
                            <b>Franchise:</b> {{$item->parent_email}} <br>
                            <b>Agent:</b>  ade@ekonindia.com
                            </span>
                        </td> --}}
                        <td> {{$item->status_name}}</td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('manage-lead', [$item->id]) }}">
                                        <i class="fa-solid fa-users m-r-5"></i> Manage Lead
                                    </a>
                                    <a class="dropdown-item" href="{{ route('edit-lead', [$item->id]) }}">
                                        <i class="fa-solid fa-pencil m-r-5"></i> Edit
                                    </a>
                                    <a class="dropdown-item" href="{{ route('view-lead', [$item->id]) }}">
                                        <i class="fa-solid fa-eye m-r-5"></i> View
                                    </a>

                                    @php
                                        $user =App\Models\User::where('email',$item->email)->first();
                                    @endphp
                                    @if($user)
                                        <a class="dropdown-item" href="{{ route('impersonate', $user) }}">
                                            <i class="fa-solid fa-user m-r-5"></i> Login To {{ Str::substr($item->name,0,8)  }}
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
                        {{-- <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas1" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> Reallocated Franchise
                            </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas2" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> Create Profile
                            </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas3" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> Followup
                            </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas4" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-pencil"></i> Edit
                            </span>
                            </a>
                        </td> --}}
                        {{-- <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas5" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> OEL Registration
                            </span>
                            </a>
                        </td> --}}
                        </tr>
                        @php
                        $i++;
                    @endphp
                    @endforeach
                </tbody>
             </table>
             <div class="row">
                <div class="col-sm-12 ">
                   <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                      {{$next_leads->links()}}
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- lead report -->
    <br>
    {{-- <div class="table_heading">
       <h4 class="up"> Lead Reports</h4>
    </div>
    <div class="row px-3">
       <div class="col-md-12">
          <div class="table-responsive">
             <table class="table table-striped custom-table mb-0">
                <thead>
                   <tr>
                      <th>S.N</th>
                      <th>Date</th>
                      <th> Pincode</th>
                      <th> Name</th>
                      <th> Phone</th>
                      <th> Email</th>
                      <th> Intake</th>
                      <th> IntakeYear</th>
                      <th> AllocatedFranchise </th>
                      <th> Status </th>
                      <th></th>
                      <th></th>

                   </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($leads_report as $item)
                        <tr>
                        <td>
                            <a href="#">{{$i}}</a>
                        </td>
                        <td>
                            <a href="#">{{$item->created_at}} </a>
                        </td>
                        <td> {{$item->zip}}</td>
                        <td>  {{$item->name}}</td>
                        <td> {{$item->phone_number}}</td>
                        <td> {{$item->assign_email}} </td>
                        <td>  {{$item->course}}</td>
                        <td> {{$item->course}}</td>
                        <td> {{$item->intake_year}}</td>
                        <td>
                            <span>
                            <b>Franchise:</b>  {{$item->parent_email}}<br>
                            <b>Agent:</b> counselor@overseaseducationlane.com </span>
                        </td>
                        <td> {{$item->status_name}}</td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> Reallocated Franchise </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> Create Profile </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> Followup </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-pencil"></i> Edit </span>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                            <span class="badge bg-inverse-success">
                            <i class="la la-money"></i> OEL Registration </span>
                            </a>
                        </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
             </table>
             <div class="row">
                <div class="col-sm-12 ">
                   <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                     {{$leads_report->links()}}
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div> --}}
@endsection


