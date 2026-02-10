@extends('admin.include.app')
@section('main-content')
<p style="margin-top:1.4rem">A role provided access to predefined menus and features so that depending on assigned role <br>
  an administrator can have access to what user needs.</p>
<div class="row g-4">
  <div class="col-xl-4 col-lg-6 col-md-6 ">
      <div class="card h-100">
          <div class="row h-100">
              <div class="col-sm-5">
                  <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                      <img src="{{asset('assets/img/illustrations/man-with-laptop-light.png')}}" class="img-fluid"
                          alt="Image" width="120" data-app-light-img="illustrations/man-with-laptop-light">
                  </div>
              </div>
              <div class="col-sm-7">
                  <div class="card-body text-sm-end text-center ps-sm-0">
                      @php $roleCreateUrl = route('roles-permissions.create'); @endphp
                      <button onclick="location.href='{{$roleCreateUrl}}'"
                          class="btn btn-primary mb-3 text-nowrap add-new-role">Add New Role</button>
                      <p class="mb-0">Create new role, if it doesn't exist</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @if(!empty($roles))
      @foreach($roles as $role)
          <div class="col-xl-4 col-lg-6 col-md-6">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex justify-content-between mb-3">
                          <h6 class="fw-normal">
                              Total {{$role->users->count()}} user(s)
                          </h6>
                          <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                  class="avatar avatar-sm pull-up" aria-label="Vinnie Mostowy"
                                  data-bs-original-title="Vinnie Mostowy">
                                  <img class="rounded-circle" src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar">
                              </li>
                              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                  class="avatar avatar-sm pull-up" aria-label="Allen Rieske"
                                  data-bs-original-title="Allen Rieske">
                                  <img class="rounded-circle" src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar">
                              </li>
                              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                  class="avatar avatar-sm pull-up" aria-label="Julee Rossignol"
                                  data-bs-original-title="Julee Rossignol">
                                  <img class="rounded-circle" src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar">
                              </li>
                              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                  class="avatar avatar-sm pull-up" aria-label="Kaith D'souza"
                                  data-bs-original-title="Kaith D'souza">
                                  <img class="rounded-circle" src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar">
                              </li>
                          </ul>
                      </div>
                      <div class="d-flex justify-content-between align-items-end">
                          <div class="role-heading">
                              <h4 class="mb-1 txt-capital">{{$role->name}}</h4>
                              <a href="{{route('roles-permissions.edit', $role->id)}}" class="role-edit-modal"><small>
                                  {{(strtolower($role->name) == 'administrator') ? 'View Role' : 'Edit Role'}}
                              </small></a>
                          </div>
                          @if(strtolower($role->name) != 'administrator')
                              <a href="{{ route('roles-permissions.delete',$role->id)}}"  class="text-muted"><i class="la la-trash"></i></a>
                          @endif
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
  @endif
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
