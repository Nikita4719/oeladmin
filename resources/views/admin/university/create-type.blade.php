@extends('admin.include.app')
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
              <li class="breadcrumb-item text-muted">Add University Type  </li>
            </ol>
          </div>
          <div class="col-md-2">

          </div>
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-group">
          <div class="card p-3">
            <div class="card-body myform">
              <form action="{{route('store-oel-type')}}" method="post">
                @csrf
                @method('post')
                <div class="row">
                  <div class="col-md-12  input-group-adss">
                      <label class="control-label">Name<span class="required_mark">*</span></label>
                    <input type="text" class="form-control formmrgin" name="name"  placeholder="name">
                  </div>
                     <div class="col-md-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-info d-lg-block formmrgin w-25" name="country_submit" value="1">Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>

@endsection
