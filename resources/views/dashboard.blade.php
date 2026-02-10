	@extends('admin.include.app')
	@section('main-content')
	<div class="main-content">
	    <div class="row">
	        <div class="card card-buttons mt-md-4">
	            <div class="card-body">
	                <div class="row">
	                    <div class="col-md-9">
	                        <ol class="breadcrumb text-muted mb-0">
	                            <li class="breadcrumb-item">
	                                <a href="#"> Welcome</a>
	                            </li>
	                            <li class="breadcrumb-item text-muted">Admin Dashboard</li>
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
	    @can('total_member.total_member_view')
	    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	        <div class="card dash-widget">
	            <div class="row">
	                <div clas="col-md-12">
	                    <div class="totalno">
	                        <h5>Total Members</h5>
	                    </div>
	                </div>
	                <div clas="col-md-12">
	                    <div class="blclr">
	                        <h5>
	                            <i class="la la-user clruser"></i> {{ $data['total_members'] }}
	                        </h5>
	                    </div>
	                </div>
	                <div clas="col-md-12">
	                    <div class="submit-section btnpr">
	                        <a href="{{url('admin-management/users')}}">
	                            <button type="button" class="btn btn-outline-primary">Read More</button>
	                        </a>

	                    </div>
	                </div>
	            </div>

	        </div>
	    </div>
	    @endcan
	    @php
	    $user = Auth::user();
	    $user->hasRole('student')
	    @endphp
	    @if($user->hasRole('student'))
	    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4 mx-auto">
	        <div class="card dash-widget text-center">
	            <div class="row">
	                <div clas="col-md-12">
	                    <div class="totalno">
	                        <h5>Total Applied Program</h5>
	                    </div>
	                </div>
	                <div clas="col-md-12">
	                    <div class="blclr">
	                        <h5>
	                            <i class="la la-user clruser"></i> {{ $data['program_applied'] }}
	                        </h5>
	                    </div>
	                </div>
	                <div clas="col-md-12">
	                    <div class="submit-section btnpr">
	                        <a href="{{route('applied-program')}}">
	                            <button type="button" class="btn btn-outline-primary">Read More</button>
	                        </a>


	                    </div>
	                </div>
	            </div>

	        </div>
	    </div>
	    @endif
	    @can('total_student.total_student_view')
	    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	        <div class="card dash-widget">
	            <div class="row">
	                <div clas="col-md-12">
	                    <div class="totalno">
	                        <h5>Total Students</h5>
	                    </div>
	                </div>
	                <div clas="col-md-12">
	                    <div class="blclr">
	                        <h5>
	                            <i class="la la-user clruser"></i> {{ $data['total_student'] }}
	                        </h5>
	                    </div>
	                </div>
	                <div clas="col-md-12">
	                    <div class="submit-section btnpr">
	                        <a href="{{route('student-list')}}">
	                            <button type="button" class="btn btn-outline-primary">Read More</button>
	                        </a>
	                    </div>
	                </div>
	            </div>

	        </div>
	    </div>
	    @endcan
	    {{-- @can('total_school_manager.total_school_manager_view')
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="row">
                    <div clas="col-md-12">
                        <div class="totalno">
                            <h5>Total School Manager</h5>
                        </div>
                    </div>
                    <div clas="col-md-12">
                        <div class="blclr">
                            <h5>
                                <i class="la la-user clruser"></i> {{ $data['total_school_manager'] }}
	    </h5>
	</div>
	</div>
	<div clas="col-md-12">
	    <div class="submit-section btnpr">
	        <button type="button" class="btn btn-outline-primary">Read More</button>
	    </div>
	</div>
	</div>

	</div>
	</div>
	@endcan --}}
	@can('total_franchise.total_franchise_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total Franchise</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_frenchise'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{url('admin-management/users?roles=agent')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>

	                </div>
	            </div>
	        </div>

	    </div>
	</div>
	@endcan
	@can('total_agent.total_agent_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total Sub Agents</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_sub_agent'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    @php
	                    $user=Auth::user();
	                    @endphp
	                    {{-- @if($user->hasRole('Administrator')) --}}
	                    <a href="{{url('admin-management/users?roles=sub_agent')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                    {{-- @else
                                <a href="{{url('admin-management/users?roles=sub_agent')}}">
	                    <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                    @endif --}}
	                    {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endcan
	@php
	$user=Auth::user();
	@endphp
	@if(!($user->hasRole('Data oprator') || $user->hasRole('Sub Data-Operator') || $user->hasRole('visa') || $user->hasRole('Application Punching') || $user->hasRole('agent') || $user->hasRole('student') ))
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total Applied Program</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_program_applied'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('total-applied-program')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>

	    </div>
	</div>
	@endif
	@can('total_application.total_application_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5> Profile completed ready for 360</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['complete360'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('oel_360')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                </div>
	                </a>
	            </div>
	        </div>
	    </div>
	</div>
	@endcan

	@can('active_franchise.active_franchise_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5> Active Franchise profile</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_active_frenchise'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{url('franchise/frenchise-filter?status=Active')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>

	    </div>
	</div>
	@endcan
	@can('inactive_franchise.inactive_franchise_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Inactive Franchise Profile</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_inactive_frenchise'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{url('franchise/frenchise-filter?status=InActive')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>

	    </div>
	</div>
	@endcan
	@can('approve_franchise.approve_franchise_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Approve Franchise Profile</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_approve_frenchise'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{url('franchise/frenchise-filter?approvestatus=Approve')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                    {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
	                </div>
	            </div>
	        </div>

	    </div>
	</div>
	@endcan
	@can('unapprove_franchise.unapprove_franchise_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>UnApprove Franchise Profile</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_unapprove_frnchise'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{url('franchise/frenchise-filter?approvestatus=UnApprove')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>


	                </div>
	            </div>
	        </div>

	    </div>
	</div>
	@endcan

	@can('total_university.total_university_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total Universities </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_university'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('manage-university')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endcan
	@can('total_unapprove_universties.total_unapprove_universties_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total UnApprove Universities </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_unapprove_universties'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('unapproved-university')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                    {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endcan
	@can('total_unapprove_universties.total_unapprove_universties_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total Approve Universities </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_approve_universties'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('view-approved-university')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                    {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endcan
	@can('total_program.total_program_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total Programs</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_program'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('manage-program')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>

	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endcan
	@can('total_unapprove_program.total_unapprove_program_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5> Total UnApprove Programs</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_unapprove_program'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{url('program-filter?approve_status=unapprove')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endcan
	@can('total_unapprove_program.total_unapprove_program_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5> Total Approve Programs</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_approve_program'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('approve-program')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endcan


	@can('total_unapprove_counceler.total_unapprove_counceler_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total UnApprove Counselor</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_unapprove_counceler'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <button type="button" class="btn btn-outline-primary">Read More</button>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endcan
	@can('total_approve_counceler.total_approve_counceler_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total Approve Counselor</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_approve_counceler'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <button type="button" class="btn btn-outline-primary">Read More</button>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endcan
	@can('total_leads.total_leads_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total Leads</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_leads'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('leads-filter')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>


	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endcan
	@can('total_assigned_leads.total_assigned_leads_view')
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
	                        <i class="la la-user clruser"></i> {{ $data['total_assigned_leads'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('assigned-leads')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                    {{-- <button type="button" class="btn btn-outline-primary">Read More</button> --}}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endcan
	@can('total_non_allocated_leads.total_non_allocated_leads_view')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total Non Allocated Leads</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i> {{ $data['total_non_allocated_leads'] }}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <button type="button" class="btn btn-outline-primary">Read More</button>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endcan
	@php
	$user = Auth::user();
	$user->hasRole('Administrator')
	@endphp
	@if( $user->hasRole('Administrator'))
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Application Punching</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    @php
	                    $total_application_punching = DB::table('tbl_three_sixtee')->where('application_punching',1)->count();
	                    @endphp
	                    <h5>
	                        <i class="la la-user clruser"></i>{{$total_application_punching}}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('oel_360')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endif
	@if($user->hasRole('Application Punching'))
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Application Punching</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    @php
	                    $total_application_punching = DB::table('tbl_three_sixtee')->where('application_punching',1)->where('added_by', $user->id)->count();



	                    @endphp
	                    <h5>
	                        <i class="la la-user clruser"></i>{{$total_application_punching}}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('oel_360')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endif
	@if($user->hasRole('visa') )
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Visa Punching</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    @php
	                    $studentData = \App\Models\Student::query()
	                    ->join('users', 'users.id', '=', 'student.added_by')
	                    ->join('student_by_agent', 'student_by_agent.student_user_id', '=', 'student.user_id')
	                    ->join('payments', 'payments.customer_email', '=', 'student.email')
	                    ->join('tbl_three_sixtee', 'tbl_three_sixtee.sba_id', '=', 'student.id')
	                    ->join('payments_link', 'payments_link.fallowp_unique_id', '=', 'payments.fallowp_unique_id')
	                    ->where('student.status_threesixty', 1)
	                    ->where('student.profile_complete', 1)
	                    ->where('tbl_three_sixtee.visa_application', 'Accepted')
	                    ->select(
	                    'student.email',
	                    'student.user_id',
	                    'student.first_name',
	                    'student.last_name',
	                    'student.status_threesixty',
	                    'student.profile_complete',
	                    DB::raw('MAX(users.name) as added_by_name'),
	                    DB::raw('MAX(users.email) as added_by_email'),
	                    DB::raw('MAX(payments.id) as payment_id'),
	                    DB::raw('MAX(payments.amount) as payment_amount'),
	                    DB::raw('MAX(payments.payment_status) as payment_status'),
	                    DB::raw('MAX(tbl_three_sixtee.visa_application) as visa_application')
	                    )
	                    ->groupBy(
	                    'student.email',
	                    'student.user_id',
	                    'student.first_name',
	                    'student.last_name',
	                    'student.status_threesixty',
	                    'student.profile_complete'
	                    )
	                    ->get();
	                    $total_visa_punching = count($studentData);

	                    @endphp
	                    <h5>
	                        <i class="la la-user clruser"></i>{{$total_visa_punching}}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('oel_360')}}">
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
	                    <h5>Visa Pending</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    @php
	                    $studentData = \App\Models\Student::query()
	                    ->join('users', 'users.id', '=', 'student.added_by')
	                    ->join('student_by_agent', 'student_by_agent.student_user_id', '=', 'student.user_id')
	                    ->join('payments', 'payments.customer_email', '=', 'student.email')
	                    ->join('tbl_three_sixtee', 'tbl_three_sixtee.sba_id', '=', 'student.id')
	                    ->join('payments_link', 'payments_link.fallowp_unique_id', '=', 'payments.fallowp_unique_id')
	                    ->where('student.status_threesixty', 1)
	                    ->where('student.profile_complete', 1)
	                    ->where('tbl_three_sixtee.application_punching', 1)
	                    ->where('tbl_three_sixtee.cource_details', '!=', null)



	                    ->select(
	                    'student.email',
	                    'student.user_id',
	                    'student.first_name',
	                    'student.last_name',
	                    'student.status_threesixty',
	                    'student.profile_complete',
	                    DB::raw('MAX(users.name) as added_by_name'),
	                    DB::raw('MAX(users.email) as added_by_email'),
	                    DB::raw('MAX(payments.id) as payment_id'),
	                    DB::raw('MAX(payments.amount) as payment_amount'),
	                    DB::raw('MAX(payments.payment_status) as payment_status'),
	                    DB::raw('MAX(tbl_three_sixtee.visa_application) as visa_application')
	                    )
	                    ->groupBy(
	                    'student.email',
	                    'student.user_id',
	                    'student.first_name',
	                    'student.last_name',
	                    'student.status_threesixty',
	                    'student.profile_complete'
	                    )
	                    ->get();
	                    $total_visa_pending = count($studentData);

	                    @endphp
	                    <h5>
	                        <i class="la la-user clruser"></i>{{$total_visa_pending}}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('student-list')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endif

	@if( $user->hasRole('Administrator'))
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Visa Punching</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    @php
	                    $studentData = \App\Models\Student::query()
	                    ->join('users', 'users.id', '=', 'student.added_by')
	                    ->join('student_by_agent', 'student_by_agent.student_user_id', '=', 'student.user_id')
	                    ->join('payments', 'payments.customer_email', '=', 'student.email')
	                    ->join('tbl_three_sixtee', 'tbl_three_sixtee.sba_id', '=', 'student.id')
	                    ->join('payments_link', 'payments_link.fallowp_unique_id', '=', 'payments.fallowp_unique_id')
	                    ->where('student.status_threesixty', 1)
	                    ->where('student.profile_complete', 1)
	                    ->where('tbl_three_sixtee.visa_application', 'Accepted')
	                    ->select(
	                    'student.email',
	                    'student.user_id',
	                    'student.first_name',
	                    'student.last_name',
	                    'student.status_threesixty',
	                    'student.profile_complete',
	                    DB::raw('MAX(users.name) as added_by_name'),
	                    DB::raw('MAX(users.email) as added_by_email'),
	                    DB::raw('MAX(payments.id) as payment_id'),
	                    DB::raw('MAX(payments.amount) as payment_amount'),
	                    DB::raw('MAX(payments.payment_status) as payment_status'),
	                    DB::raw('MAX(tbl_three_sixtee.visa_application) as visa_application')
	                    )
	                    ->groupBy(
	                    'student.email',
	                    'student.user_id',
	                    'student.first_name',
	                    'student.last_name',
	                    'student.status_threesixty',
	                    'student.profile_complete'
	                    )
	                    ->get();
	                    $total_visa_punching = count($studentData);
	                    @endphp
	                    <h5>
	                        <i class="la la-user clruser"></i>{{$total_visa_punching}}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('oel_360')}}">
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
	                    <h5>Visa Pending</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    @php
	                    $studentData = \App\Models\Student::query()
	                    ->join('users', 'users.id', '=', 'student.added_by')
	                    ->join('student_by_agent', 'student_by_agent.student_user_id', '=', 'student.user_id')
	                    ->join('payments', 'payments.customer_email', '=', 'student.email')
	                    ->join('tbl_three_sixtee', 'tbl_three_sixtee.sba_id', '=', 'student.id')
	                    ->join('payments_link', 'payments_link.fallowp_unique_id', '=', 'payments.fallowp_unique_id')
	                    ->where('student.status_threesixty', 1)
	                    ->where('student.profile_complete', 1)
	                    ->where('tbl_three_sixtee.application_punching', 1)
	                    ->where('tbl_three_sixtee.cource_details', '!=', null)



	                    ->select(
	                    'student.email',
	                    'student.user_id',
	                    'student.first_name',
	                    'student.last_name',
	                    'student.status_threesixty',
	                    'student.profile_complete',
	                    DB::raw('MAX(users.name) as added_by_name'),
	                    DB::raw('MAX(users.email) as added_by_email'),
	                    DB::raw('MAX(payments.id) as payment_id'),
	                    DB::raw('MAX(payments.amount) as payment_amount'),
	                    DB::raw('MAX(payments.payment_status) as payment_status'),
	                    DB::raw('MAX(tbl_three_sixtee.visa_application) as visa_application')
	                    )
	                    ->groupBy(
	                    'student.email',
	                    'student.user_id',
	                    'student.first_name',
	                    'student.last_name',
	                    'student.status_threesixty',
	                    'student.profile_complete'
	                    )
	                    ->get();
	                    $total_visa_pending = count($studentData);

	                    @endphp
	                    <h5>
	                        <i class="la la-user clruser"></i>{{$total_visa_pending}}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('student-list')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endif


	@if(!($user->hasRole('Sub Data-Operator') || $user->hasRole('student') || $user->hasRole('Application Punching') || $user->hasRole('visa') || $user->hasRole('agent')))
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total University</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i>{{DB::table('universities')->where('status',1)->count()}}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('view-approved-university')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endif

	@if(!($user->hasRole('Sub Data-Operator') || $user->hasRole('agent') || $user->hasRole('student') || $user->hasRole('Application Punching') || $user->hasRole('visa')))
	@inject('carbon', 'Carbon\Carbon')
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total 3-M old University</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i>{{ $count = App\Models\University::whereDate('updated_at', '<', $carbon::now()->subMonths(3))->count() }}

	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{ route('update-university') }}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endif
	@if(!($user->hasRole('Sub Data-Operator') || $user->hasRole('student') || $user->hasRole('Application Punching') || $user->hasRole('visa') || $user->hasRole('agent')))
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Total Program</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i>{{$data['total_program']}}

	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="{{route('approve-program')}}">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endif
	@if(($user->hasRole('Data oprator') || $user->hasRole('Sub Data-Operator')))
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Program Added By {{(Auth::user()->name)}}</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i>{{DB::table('program')->where('status',1)->where('user_id',Auth::user()->id)->count()}}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>

	    </div>
	</div>
	@endif
	@if(($user->hasRole('Data oprator') || $user->hasRole('Sub Data-Operator')))
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>University Added By {{(Auth::user()->name)}}</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i>{{DB::table('universities')->where('status',1)->where('user_id',Auth::user()->id)->count()}}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>

	    </div>
	</div>
	@endif
	@if(($user->hasRole('Data oprator') || $user->hasRole('Sub Data-Operator')))
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div clas="col-md-12">
	                <div class="totalno">
	                    <h5>Today Added Program By {{(Auth::user()->name)}}</h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i>{{DB::table('program')->where('status',1)->where('user_id',Auth::user()->id)->whereDate('created_at', date('Y-m-d'))->count()}}
	                    </h5>
	                </div>
	            </div>
	            <div clas="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="">
	                        <button type="button" class="btn btn-outline-primary">Read More</button>
	                    </a>
	                </div>
	            </div>
	        </div>

	    </div>
	</div>
	@endif
	@if(auth::user()->hasRole('agent') || auth::user()->hasRole('sub_agent') || auth::user()->hasRole('Administrator'))
	@if(count($data['user_follow_up']) > 0)
	@php
	$follow_up_array = [];
	@endphp
	@forelse ($data['user_follow_up'] as $entry)
	@if(isset($follow_up_array[$entry->user_id]))
	@php
	$follow_up_array[$entry->user_id]->count++;
	@endphp
	@else
	@php
	$follow_up_array[$entry->user_id] = (object)[
	'user_id' => $entry->user_id,
	'name' => $entry->name,
	'count' => 1
	];
	@endphp
	@endif
	@empty
	<p>No follow-ups found.</p>
	@endforelse
	@foreach ($follow_up_array as $follow_up)
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
	    <div class="card dash-widget">
	        <div class="row">
	            <div class="col-md-12">
	                <div class="totalno">
	                    <h5>Total Calls</h5>
	                </div>
	            </div>
	            <div class="col-md-12">
	                <div class="blclr">
	                    <h5>
	                        <i class="la la-user clruser"></i>{{ $follow_up->name }}: {{ $follow_up->count }}
	                    </h5>
	                </div>
	            </div>
	            <div class="col-md-12">
	                <div class="submit-section btnpr">
	                    <a href="">
	                        <button type="button" class="btn btn-outline-primary"></button>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	@endforeach
	@endif
	@endif
	</div>
	</div>
	@endsection