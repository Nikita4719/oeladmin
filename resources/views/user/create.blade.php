@extends('admin.include.app')
@section('main-content')
  <div class="main-content" >
    <div class="row">
      <div class="card card-buttons">
        <div class="card-body">
          <div class="row">
            <div class="col-md-9">
              <ol class="breadcrumb text-muted mb-0">
                <li class="breadcrumb-item">
                  <a href="#"> Welcome</a>
                </li>
                <li class="breadcrumb-item text-muted">Add User</li>
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
  @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert">
              <i class="fa fa-times"></i>
          </button>
          <strong>Success !</strong> {{ session('success') }}
      </div>
  @endif
  <!-- /Page Header -->
  <div class="row">
    <div class="card-group">
      <div class="card">
        <div class="card-body myform">
          <form action="{{route('users.store')}}" method="Post">
            @csrf
            <div class="row">
              <div class="col-md-3">
                <label for="name">Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control formmrgin" required name="name" value="{{ old('name') }}" placeholder="Name" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>


              <div class="col-md-3">
                <label for="email">Email<span class="text-danger">*</span></label>
                <input type="text" class="form-control formmrgin" name="email" required value="{{old('email')}}" placeholder="Email ">
                @error('email')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
                <div class="col-md-3">
                    <label for="email">Phone Number<span class="text-danger">*</span></label>
                    <input type="tel" class="form-control formmrgin" name="phone_number" required  value="{{ old('phone_number') }}" placeholder="Phone Number"  title="Please enter phone number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                    @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              <div class="col-md-3">
                <label for="email">Password<span class="text-danger">*</span></label>
                <input type="password" class="form-control formmrgin" name="password" required value="" placeholder="Enter Password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="col-md-3">
                <label for="email">Status<span class="text-danger">*</span></label>
                <select class="txt-capital form-select formmrgin"  name="status" required>
                  <option value="" >Select Status</option>
                  <option value="1" >Active</option>
                  <option value="0" >Inactive</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="email">Select Role<span class="text-danger">*</span></label>
                    <select name="role" id="role" class="txt-capital form-select formmrgin" required>
                        <option value="">Select Role</option>
                        @foreach($role as $roleId => $roleName)
                            <option value="{{ $roleId }}">{{ $roleName }}</option>
                        @endforeach
                    </select>
                    @error('role')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-md-4 col-sm-6">
                <button type="submit" class="btn btn-info d-lg-block  formmrgin" name="country_submit" style="margin-top: 35px;" value="1">Submit </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('offcanvas')
<div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
  <div class="sidebar-headerset">
    <div class="sidebar-headersets">
      <h2>Customizer</h2>
      <h3>Customize your overview Page layout</h3>
    </div>
    <div class="sidebar-headerclose">
      <a data-bs-dismiss="offcanvas" aria-label="Close"><img src="{{asset('assets/img/close.png')}}" alt="Close Icon"></a>
    </div>
  </div>
  <div class="offcanvas-body p-0">
    <div data-simplebar="" class="h-100">
      <div class="settings-mains">
        <div class="layout-head">
          <h5>Layout</h5>
          <h6>Choose your layout</h6>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-check card-radio p-0">
              <input id="customizer-layout01" name="data-layout" type="radio" value="vertical" class="form-check-input">
              <label class="form-check-label avatar-md w-100" for="customizer-layout01">
                <img src="{{asset('assets/img/vertical.png')}}" alt="Layout Image">
              </label>
            </div>
            <h5 class="fs-13 text-center mt-2">Vertical</h5>
          </div>
          <div class="col-6">
            <div class="form-check card-radio p-0">
            <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input">
              <label class="form-check-label  avatar-md w-100" for="customizer-layout02">
                <img src="{{asset('assets/img/horizontal.png')}}" alt="Layout Image">
              </label>
            </div>
            <h5 class="fs-13 text-center mt-2">Horizontal</h5>
          </div>

          </div>
      </div>
    </div>

  </div>
</div>
@endsection
