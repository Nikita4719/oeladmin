@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('testimonial')}}"> Testimonial</a>
                        </li>
                    </ol>
                </div>
                @can('testimonial.create')
                    <div class="col-md-3">
                        <a href="{{ route('create-testimonial') }}" class="btn add-btn float-end">
                            <i class="las la-plus"></i>Create Testimonial</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="card-group mb-3">
      <div class="card">
        <div class="card-body myform">
          <form id="eudcation" action="{{route('testimonial')}}" method="get">
            <div class="d-flex justify-content-start align-items-center">
            <div class="col-md-5 ps-md-3">
                <div class="form-floating ">
                    <input  name="name" type="text" class="form-control " placeholder="Name" >
                    <label  class="form-label">Name</label>
                </div>
            </div>
            <div class="col-md-4 ps-md-3 row">
            <div class="col ps-2">
              <button type="submit" class="btn btn-info w-100 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col ps-2 float-start">
                <a href="{{route('testimonial')}}" class="btn btn-info w-100">
                    Reset
                </a>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Profile Picture</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Meta Tag</th>
                        <th>Meta Description</th>
                        <th>Location</th>
                        <th>Status</th>
                        @can('testimonial.update')
                          <th>Edit</th>
                        @endcan
                        @can('testimonial.delete')
                           <th>Delete</th>
                        @endcan
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($testimonial as $item)
                    <tr>
                        <td>{{ $loop->index + (($testimonial->currentPage() - 1) * $testimonial->perPage()) + 1 }}</td>
                        <td><img src="{{asset('imagesapi/'.$item->profile_picture)}}" width="100" alt=""></td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td class="text-wrap">{{ $item->meta_tags }}</td>
                        <td class="text-wrap">{{ $item->meta_description }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td class="text-wrap">{{ $item->designation }}</td>
                        <td class="text-wrap">{{ $item->location }}</td>
                        <td>{{ $item->status == 1 ? 'Publish' : 'UnPublish' }}</td>
                        @can('testimonial.update')
                           <td><a  href="{{route('edit-testimonial',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('testimonial.delete')
                            <td><a href="{{route('delete-testimonial',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="py-4 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$testimonial->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
