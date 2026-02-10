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
              <li class="breadcrumb-item text-muted">Edit OEL Review  </li>
            </ol>
          </div>
          <div class="col-md-2">
            {{-- <a href="{{ route('add-review') }}" class="btn add-btn">
                <i class="las la-plus"></i>Add Review </a> --}}
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
        <div class="card-group">
          <div class="card">
            <div class="card-body myform">
              <form action="{{route('update-oel-review', $review->id)}}" method="post">
                @csrf
                @method('post')
                <div class="row">
                  <div class="col-md-12">
                      <label class="control-label">School ID<span class="required_mark">*</span></label>
                    <input type="number" class="form-control formmrgin" name="school_id" value="{{$review->school_id}}" placeholder="School Id">
                  </div>
                  <div class="col-md-12">
                      <label class="control-label">Heading<span class="required_mark">*</span></label>
                    <input type="text" class="form-control formmrgin" name="heading" value="{{$review->heading}}" placeholder="Enter heading">
                  </div>
                  <div class="col-md-12 col-sm-12">
                      <label class="control-label">Details<span class="required_mark">*</span></label>
                      <textarea  class="form-control" name="details" placeholder="Enter details">{{$review->details}}</textarea>
                 </div>
                 <div class="col-md-12 col-sm-12 mt-3">
                    <select name="status" class="form-control" value="{{$review->status}}">
                        <option value="">- Select Status -</option>
                        <option value="1" {{$review->status == 1 ? 'selected' : ''}}>Published</option>
                        <option value="0" {{$review->status == 0 ? 'selected' : ''}}>Unpublished</option>
                    </select>
                 @error('status')
                 <span class="text-danger"> {{$message}}</span>
                 @enderror
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
