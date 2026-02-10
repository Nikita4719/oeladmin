@extends('admin.include.app')
@section('main-content')
<div class="card">
  <div class="text-center mb-4 row">
      <div class="col-10">
          <h4 class="role-title mt-3 mb-0">{{(strtolower($role->name) == 'administrator') ? 'View Role' : 'Edit Role'}}</h4>
      </div>
      <div class="mt-2 col-2 d-flex justify-content-center">
          <a href="{{route('roles-permissions.index')}}">
              <button class="btn btn-outline-primary">
              <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
              <span class="align-middle d-sm-inline-block d-none">Back</span>
              </button>
          </a>
      </div>
  </div>
  <div class="card-header">
  <div class="row">
      @if(strtolower($role->name) == 'administrator')
          <div class="mb-3 mb-0 col-md-10">
                  <div class="alert alert-warning">
                      <h6 class="alert-heading fw-bold mb-1">You cannot edit the default Role, As this is the main Role to create and assign permissions to others.</h6>
                  </div>
              </div>
          </div>
      @endif
      <div class="col-sm-12">
          {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles-permissions.update', $role->id], 'class' => 'row g-3 fv-plugins-bootstrap5 fv-plugins-framework', 'id' => 'modal-form']) !!}
          @include('role.form')
          <div class="col-12 text-center">
              {!! Form::submit(__('Update'), ['name' => 'save' ,'id'=>'save','class' => 'btn btn-primary']) !!}
              {!! Form::button(__('Cancel'), ['name' => 'cancel','class' => 'btn btn-outline-secondary close-popup']) !!}
              <div class="errors"></div>
          </div>
          {!! Form::close() !!}
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
@section('page-script')
  <script type="text/javascript">
    let roleName = '{{$role->name}}';
    if(roleName.toLowerCase() == 'administrator'){
        $('.content-wrapper input').attr('readonly', 'readonly');
        $('.content-wrapper input[type=checkbox]').attr('disabled','disabled');
        $('.content-wrapper button').attr('readonly', 'readonly');
        $('.content-wrapper .btn-primary').addClass('disabled');
        $('.content-wrapper .btn-outline-secondary').addClass('disabled');
    }
  </script>
@endsection
