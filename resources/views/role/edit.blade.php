@extends('admin.include.app')
@section('main-content')
<div class="card">
  <div class="text-center mb-4 row">
      <div class="col-10">
          <h4 class="role-title mt-3 mb-0">{{(strtolower($role->name) == 'administrator') ? 'View Role' : 'Edit Role'}}</h4>
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
  <div class="card-header">
  <div class="row">
      @if(strtolower($role->name) == 'administrator')
          <div class="mb-3 mb-0 col-md-12">
                  <div class="alert alert-warning">
                      <h6 class="alert-heading fw-bold mb-1">You cannot edit the default Role, As this is the main Role to create and assign permissions to others.</h6>
                  </div>
              </div>
          </div>
      @endif
      <form action="{{url('admin-management/roles-permissions/update')}}/{{$role->id}}"  method="Post">
        @csrf
        <div class="col-sm-12">
          <div class="col-12">
            <div class="col-12 mb-4 fv-plugins-icon-container">
                <x-input-label for="status" :value="__('Role Name')" class="form-label required" />
                <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $role->name ?? '')"
                    required autocomplete="off" placehholder="Enter role name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="col-12 mt-5">
                <h4>Permissions</h4>
                <div class="table-responsive">
                    <table class="table table-flush-spacing">
                        <tbody>
                            @if(!empty($permissionList))
                            <tr>
                                <td class="text-nowrap fw-semibold">Administrator Access <i class="bx bx-info-circle bx-xs"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        aria-label="Allows a full access to the system"
                                        data-bs-original-title="Allows a full access to the system"></i></td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                        <label class="form-check-label" for="selectAll">
                                            Select All
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            {{-- @dd($permissionList) --}}
                            @foreach($permissionList as $key => $subPermissions)
                            <tr>
                                <td class="text-nowrap fw-semibold">{{ucwords(str_replace('_',' ', $key))}}</td>
                                @if(!empty($subPermissions))
                                <td>
                                    <div class="d-flex">
                                        @foreach($subPermissions as $permission)
                                        <div class="form-check me-3 w-m-150">
                                            @if($permission)
                                                @php $explode = explode('.',$permission); @endphp
                                                <input {{(isset($selectedPermissions) && in_array($permission, $selectedPermissions)) ? 'checked' : ''}} name="permissions[{{$permission}}]" class="form-check-input" @if($role->name == 'Administrator') @disabled(true) @endif type="checkbox" id="{{$explode[1]}}">
                                                <label class="form-check-label" for="{{$explode[1]}}">
                                                    {{ucwords($explode[1])}}
                                                </label>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            @else
                            <p style="margin-top:1.4rem">
                                {{__('Unable to find any permission(s), please contact to administrator.')}}</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
        <div class="col-12 text-center">
          <input name="save" id="save" class="btn btn-primary" type="submit" value="Update">
          <a href="{{url('admin-management/roles-permissions/')}}">
            <button name="cancel" class="btn btn-outline-secondary close-popup" type="button">Cancel</button>
          </a>
          <div class="errors">
        </div>
    </form>
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
@section('scripts')
<script type="text/javascript">
const t = document.querySelector("#selectAll"),
    o = document.querySelectorAll('[type="checkbox"]');
t.addEventListener("change", t => {
    o.forEach(e => {
        e.checked = t.target.checked
    })
});
</script>
@endsection
