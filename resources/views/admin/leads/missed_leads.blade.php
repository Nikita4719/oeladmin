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
                            <li class="breadcrumb-item text-muted">Pending Lead List </li>
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
                            <th>S.N</th>
                            <th>Date</th>
                            <th> Source </th>
                            <th> PinCode</th>
                            <th> Name </th>
                            <th> Phone</th>
                            <th> Email</th>
                            <th> Comment </th>
                            <th> Intereset</th>
                            <th> Course </th>
                            <th> Intake </th>
                            <th> IntakeYear </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody id="lead-list">
                        @php
                            $i = ($next_leads_missed->currentPage()-1)* $next_leads_missed->perPage()+1;
                        @endphp
                        @foreach ($next_leads_missed as $data)
                            <tr>
                                {{-- @php
                                    $users =Auth::User();
                                    $user = App\Models\User::where('id',$data->assigned_to)->pluck('email')->first();
                                    $frenchise = App\Models\User::where('id',$data->added_by_agent_id)->pluck('email')->first();
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
                                @endif --}}
                                <td>
                                    <a href="#">{{ $i }}</a>
                                </td>
                                @php
                                    $i++;
                                @endphp
                                <td>
                                    <a href="#">{{ $data->created_at }}</a>
                                </td>
                                <td> {{ $data->source }}</td>
                                <td>{{ $data->zip }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->phone_number }}</td>
                                <td>{{ $data->email }}</td>
                                <td class="text-wrap">{{ $data->student_comment }}</td>
                                @php
                                    $interest = App\Models\Intrested::where('is_deleted', '0')->where('id', $data->interested)->first();
                                @endphp
                                <td>{{ $interest->name ?? '' }}</td>
                                <td>{{ $data->course }}</td>
                                <td>
                                    @php
                                        $dateTime = DateTime::createFromFormat('m', $data->intake);
                                        $formattedDate = $dateTime ? $dateTime->format('F') : '';
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
                                                <a class="dropdown-item" href="{{ route('create-student-profile', [$data->id]) }}">
                                                    <i class="fa-solid fa-user m-r-5"></i>Create Profile
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            {{ $next_leads_missed->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
