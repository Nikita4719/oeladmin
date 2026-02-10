@extends('admin.include.app')
@section('main-content')
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert">
    <i class="fa fa-times"></i>
  </button>
  <strong>Success !</strong> {{ session('success') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="main-content">
  <div class="row">
    <div class="card card-buttons">
      <div class="card-body">
        <div class="row">
          <div class="col-md-9">
            <ol class="breadcrumb text-muted mb-0">
              <li class="breadcrumb-item">
                Home
              </li>
              <li class="breadcrumb-item text-muted"> Users</li>
            </ol>
          </div>
          <div class="col-md-3">
            <div class="col-auto float-end ms-auto">
              <a href="{{route('users.create')}}" class="btn add-btn">
                <i class="fa-solid fa-plus"></i> Add User </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="card-group">
    <div class="card">
      <div class="card-body myform">
        <form action="{{route('users.index')}}" method="GET">
          <div class="row">
            <div class="col-md-4">
              <input type="text" class="form-control formmrgin" name="name" value="{{request()->get('name')}}" placeholder=" Name ">
            </div>
            <div class="col-md-4">
              <input type="email" class="form-control formmrgin" name="email" value="{{request()->get('email')}}" placeholder=" Email">
            </div>
            <div class="col-md-4 ">
              <select name="roles" class="form-control formmrgin">
                <option value="">--Select Account Type--</option>
                @foreach ($roles as $role)
                <option value="{{$role->name}}" {{ request()->get('roles') == $role->name ? 'selected' : '' }}>{{$role->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4 ">
              <select class="form-control" name="status">
                <option value="">--Select Status--</option>
                <option value="Active">Active</option>
                <option value="InActive">InActive</option>
              </select>
            </div>
            <div class="col-md-4 ">
              <select class="form-control  " name="approvestatus">
                <option value="">--Select Approval Status--</option>
                <option value="Approve">Approve</option>
                <option value="UnApprove">UnApprove</option>
              </select>
            </div>
            <div class="row">
              <div class="col-md-2 ">
                <a href="{{route('users.index')}}" class="btn btn-info d-lg-block  formmrgin px-2">Reset
                </a>
              </div>
              <div class="col-md-2">
                <button type="submit" value="submit" class="btn btn-info d-lg-block  formmrgin w-100" name="submit">Filter </button>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-info d-lg-block formmrgin" name="export" value="export">Export to Excel</button>
              </div>
            </div>
          </div>
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped custom-table mt-md-4 ">
        <thead>
          <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Email</th>
            <th>Account Type</th>
            <th>Status</th>
            <th>Approval Status</th>
            <th class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
          @php
          $i=1;
          @endphp
          @foreach ($users as $user)
          <tr>
            <td>{{ $loop->index + (($users->currentPage() - 1) * $users->perPage()) + 1 }}</td>
            <td>
              {{ucfirst($user->name)}}
            </td>
            <td>
              {{$user->email}}
            </td>
            <td>
              {{$user->admin_type}}
              {{-- @foreach ($user->roles as $role)
                    {{ ucfirst($role->name) }}<br>
              @endforeach --}}
            </td>
            {{-- <td>
              @if($user->status ==1)
              <span class="badge bg-inverse-success text-center">{{'Active'}}</span>
            @else
            <span class="badge bg-inverse-warning text-center">{{'InActive'}}</span>
            @endif
            </td> --}}
            <td>
              @if ($user->hasRole('Administrator'))
              <div class="form-check form-switch">
                <input class="form-check-input flexSwitchCheckChecked" data-id="{{$user->id}}" type="checkbox" role="switch" {{ $user->is_active == '0' ? 'checked' : '' }} disabled>
              </div>
              @else
              <div class="form-check form-switch">
                <input class="form-check-input flexSwitchCheckChecked" data-id="{{$user->id}}" type="checkbox" role="switch" {{ $user->is_active == '1' ? 'checked' : '' }}>
              </div>
              @endif
            </td>
            <td>
              @if ($user->hasRole('Administrator'))
              <select class="form-control approve text-center" name="approvevalue" data-id="{{$user->id}}" disabled>
                <option value="">--Select--</option>
                <option class="badge text-bg-success" value="1" {{$user->is_approve == 0 ? 'selected' : ''}}>Approve</option>
                <option class="badge text-bg-danger" value="0" {{$user->is_approve == 1 ? 'selected' : ''}}>Unapprove</option>
              </select>
              @else
              <select class="form-control approve text-center" name="approvevalue" data-id="{{$user->id}}">
                <option value="">--Select--</option>
                <option class="badge text-bg-success" value="1" {{$user->is_approve == 1 ? 'selected' : ''}}>Approve</option>
                <option class="badge text-bg-danger" value="0" {{$user->is_approve == 0 ? 'selected' : ''}}>Unapprove</option>
              </select>
              @endif
            </td>


            @php
            $i++;
            @endphp
            <td class="text-end">
              <div class="dropdown dropdown-action">
                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown">
                  <i class="material-icons">more_vert</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{url('admin-management/users/edit')}}/{{$user->id}}">
                    <i class="fa-solid fa-pencil m-r-5"></i> Edit
                  </a>
                  @if (!$user->hasRole('Administrator'))
                  @if(!Session::has('admin_user'))
                  <a class="dropdown-item" href="{{ route('impersonate', $user) }}">
                    <i class="fa-solid fa-user m-r-5"></i> Login To Member {{ $user->name }}
                  </a>
                  @endif
                  @endif
                  {{-- <a class="dropdown-item" href="{{url('admin-management/users/delete')}}/{{$user->id}}">
                  <i class="la la-trash"></i> Delete
                  </a> --}}
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $users->links() }}
    </div>
  </div>
</div>
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>
<script>
  $(document).ready(function() {
    $('.flexSwitchCheckChecked').change(function() {
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
        data: {
          status: status,
          id: id
        },
        success: function(response) {
          window.location.reload();
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    });
    $('.approve').on('change', function() {
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
        data: {
          selectedValue: status,
          userId: userId
        },
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