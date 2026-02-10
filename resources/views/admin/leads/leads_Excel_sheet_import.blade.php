@extends('admin.include.app')
@section('main-content')
<div class="page-header">
    <div class="row">
      <div class="card card-buttons">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <ol class="breadcrumb text-muted mb-0">
                <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}"> Dashboard</a>
                </li>
                <li class="breadcrumb-item text-muted"> Bulk Upload </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row px-0">
    <div class="card card-stretch-full mx-0 px-0 mt-0 pt-0">
      <div class="card-body px-0 pt-0">
        <div class="card-header table_heading mx-0 mt-0">
          <h5 class="card-title text-white py-0"> Add Lead</h5>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <br>
        <div class="col-12 ps-md-4"></div>
        <br>
        <div class="col-12 ps-md-4">
          <form class="row g-4" action="{{route('excel-sheet-leads')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <label> &nbsp;&nbsp;Upload Excel File : <span class="text-danger">*</span>
                </label>
                <span class="text-muted">Format: .csv</span>
                <input type="file" name="file" multiple="" class="form-control file-input-adss" required="">
              </div>
              <div class="col-md-12">
                <br>
                <a href="{{ asset('leads.xlsx') }}" class="btn btn-success" download>
                  <i class="fa-solid fa-download"></i> 
                </a>

                <button type="submit" class="mybtn px-5">Upload</button>
              </div>
            </div>
          </form>
        </div>
        <div></div>
        <br>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>

@endsection

