@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <div class="card card-buttons">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <ol class="breadcrumb text-muted mb-0">
                            <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item text-muted">Franchise List</li>
                        </ol>
                    </div>
                    @can('franchise.create')
                    <div class="col-md-3">
                        <a href="{{ route('frenchise-create') }}" class="btn add-btn float-end  ">
                            <i class="fa-solid fa-plus"></i>Add New Franchise</a>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-group">
            <div class="card">
                <div class="card-body myform">
                    <form action="{{ route('frenchise-filter') }}" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control formmrgin " name="name"
                                    value="{{ request()->get('name') }}" placeholder="Search By Name ">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control formmrgin " name="email"
                                    value="{{ request()->get('email') }}" placeholder="Search By Email">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control formmrgin " name="phone_number"
                                    value="{{ request()->get('phone') }}" placeholder=" Phone Number">
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
                                <select name="province_id" class="form-control province_id  formmrgin">
                                    <option value="">-State/Provision -</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control formmrgin " name="zip"
                                    value="{{ request()->get('zip') }}" placeholder="Pincode">
                            </div>
                            <div class="col-md-4 ">
                                <select class="form-control " name="status">
                                    <option value="">--Select Status--</option>
                                    <option value ="Active">Active</option>
                                    <option value ="InActive">InActive</option>
                                </select>
                            </div>
                            <div class="col-md-4 ">
                                <select class="form-control " name="approvestatus">
                                    <option value ="">--Select Approval Status--</option>
                                    <option value ="Approve">Approve</option>
                                    <option value ="UnApprove">UnApprove</option>
                                </select>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <input type="date" name="from_date" class="form-control formmrgin "
                                    value="{{ request()->get('from_date') }}" placeholder="From Date">
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <input type="date" name="to_date" class="form-control formmrgin "
                                    value="{{ request()->get('to_date') }}" placeholder="to Date" value="">
                            </div>
                            <div class="row">
                                <div class="col-md-2 ">
                                    <a href="{{ route('frenchise.index') }}" class="btn btn-info d-lg-block  formmrgin ">Reset
                                    </a>
                                </div>
                                <div class="col-md-1 ">
                                    <button type="submit" value="submit" class="btn btn-info d-lg-block  formmrgin px-4"
                                        name="submit">Filter </button>
                                </div>
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
                            <th> Email </th>
                            <th> Phone Number </th>
                            <th> PinCode</th>
                            <th> Status</th>
                            <th> Approve Status</th>
                            @can('franchise.update')
                              <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody id="lead-list">
                        @php
                            $i=1 + (($frenchise->currentPage() - 1) * $frenchise->perPage());
                        @endphp
                        @foreach ($frenchise as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->legal_first_name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->zip}}</td>
                            @php
                                $user =\App\Models\User::where('email', $item->email)->first();
                                $users = Auth::user();
                            @endphp
                            <td>
                                @if ($user && $user->email !== null && $user->password !== null)
                                 <div class="form-check form-switch">
                                        <input class="form-check-input flexSwitchCheckChecked" data-id="{{$user->id}}" type="checkbox" role="switch" {{ $user->is_active == '1' ? 'checked' : '' }} >
                                    </div>
                                 @else

                                 @endif
                             </td>
                            <td>
                               @if ($user && $user->email !== null && $user->password !== null)
                                <select class="form-control approve text-center" name="approvevalue" data-id="{{$user->id}}">
                                    <option value="">--Select--</option>
                                    <option value="1" {{$user->status == 1 ? 'selected' : ''}}>Approve</option>
                                    <option value="0" {{$user->status == 0 ? 'selected' : ''}}>Unapprove</option>
                                </select>
                                @else

                                @endif
                            </td>
                            <td class="txt-oflo">
                                @if ($user && $user->email !== null && $user->password !== null)
                                    @if(!Session::has('admin_user'))
                                        @if ($users->hasRole('Administrator'))
                                            <a class="btn btn-info" data-toggle="tooltip" title="Login as Frenchise" href="{{ route('impersonate', $user) }}" style="margin-top: 5px;">
                                                <i class="fa fa-sign-in-alt"></i>
                                            </a>
                                        @endif
                                    @endif
                                @else

                                @endif
                                {{-- <a href="" class="btn btn-info" style="margin-top: 5px;">Pincodes</a> --}}
                                @can('franchise.update')
                                <a class="btn btn-info" data-toggle="tooltip" title="Franchise Profile" href="{{route('frenchise-edit',$item->id)}}" style="margin-top: 5px;">
                                    <i class="fa fa-user"></i>
                                </a>
                                    {{-- <a href="{{route('frenchise-edit',$item->id)}}" class="btn btn-info"
                                        style="margin-top: 5px;">Franchise Profile</a> --}}
                                @endcan
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
                            {{ $frenchise->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
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
                                $('.province_id').append('<option value="' + key + '">' +
                                    value +
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
            $('.approve').on('change',function(){
                var status = $(this).val();
                var userId = $(this).attr("data-id");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('approveStatusUpdate') }}",
                    type: 'POST',
                    data: {selectedValue:status,userId:userId},
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
            $('.flexSwitchCheckChecked').change(function(){
                var isChecked = $(this).prop("checked");
                var id = $(this).attr("data-id");
                var status = isChecked ? "1" : "0";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('statusUpdateUser') }}",
                    type: 'POST',
                    data: { status: status,id:id },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
