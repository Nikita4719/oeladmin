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
              <li class="breadcrumb-item text-muted"> OEL Review  </li>
            </ol>
          </div>
          <div class="col-md-2">
            <a href="{{ route('add-review') }}" class="btn add-btn float-end">
                <i class="las la-plus"></i>Add Review </a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <br>
    <div class="row">
        <div class="card-group">
          <div class="card">
            <div class="card-body myform">
              <form action="{{route('oel-review')}}" method="GET">
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" class="form-control formmrgin" name="application_id" value="" placeholder=" Search by School Id">
                  </div>
                  <div class="col-md-4">
                    <select name="status" class="form-control formmrgin">
                      <option value="">- Active Status-</option>
                      <option value="0">Pending</option>
                      <option value="1" >Active</option>
                    </select>
                  </div>
                  <div class="col-md-2 col-sm-2">
                    <button type="submit" class="btn btn-info d-lg-block px-5  formmrgin" >Search</button>
                  </div>
                  <div class="col-md-2 col-sm-2">
                    <a href="{{route('oel-review')}}">
                        <button type="button" class="btn btn-info d-lg-block px-5  formmrgin" >Reset</button>
                    </a>
                  </div>
                </div>
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
                  <th>School ID </th>
                  {{-- <th> School </th> --}}
                  <th> Review Heading</th>
                  <th> Status</th>
                  <th> Details</th>
                  <th> Edit</th>
                  <th> Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($reviews as $key=>$review)
                <tr>
                  <td>{{(($reviews->currentPage()-1)*$reviews->perPage())+($key+1)}}</td> {{-- new line --}}
                  <td>{{$review->school_id}}</td>
                  {{-- <td>{{$review->school}}</td> --}}
                  <td>{{$review->heading}}</td>
                  @if($review->status == 1)
                    <td><span class="badge bg-success">Active</span></td>
                  @else
                    <td><span class="badge bg-danger">Inactive</span></td>
                  @endif
                  <td>{{$review->details}}</td>
                  <td><a href="{{route('edit-review')}}/{{$review->id}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                  <td>  <a href="{{route('delete-review')}}/{{$review->id}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{$reviews->withQueryString()->links()}}
          </div>
        </div>

    </div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>

@endsection
