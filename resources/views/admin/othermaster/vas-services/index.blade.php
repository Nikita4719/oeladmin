@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Manage Vas Service
                        </li>
                    </ol>
                </div>
                @can('vas_services.create')
                <div class="col-md-4">
                    <a href="{{ route('create-vas-service') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create Vas Service's</a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="card-group">
      <div class="card">
        <div class="card-body myform">
          <form id="eudcation" action="{{route('vas-service')}}" method="get">
            <div class="d-flex justify-content-start align-items-center">
            <div class="col-md-5 ps-md-3">
                <div class="form-floating ">
                    <input id="lead-total_credits" name="title" type="text" class="form-control " placeholder="NAME" >
                    <label for="lead-total_credits" class="form-label">Title</label>
                </div>
            </div>
            <div class="col-md-4 row ps-md-3">
            <div class="col ps-2">
              <button type="submit" class="btn btn-info w-100 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col ps-2 float-start">
                <a href="{{route('vas-service')}}" class="btn btn-info w-100">
                    Reset
                </a>
            </div>
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
                        <th>Title</th>
                        <th>Order</th>
                        <th>Content</th>
                        @can('vas_services.update')
                        <th>Edit</th>
                        @endcan
                        @can('vas_services.delete')
                        <th>Delete</th>
                        <th></th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($vas_service as $item)
                    <tr>
                        <td>{{ $loop->index + (($vas_service->currentPage() - 1) * $vas_service->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->title }}</td>
                        <td class="text-wrap">{{ $item->order }}</td>
                        <td class="text-wrap">{!! $item->content !!}</td>
                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                        @can('vas_services.update')
                        <td><a  href="{{route('edit-vas-service',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('vas_services.delete')
                        <td><a href="{{route('delete-vas-service',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="py-4 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$vas_service->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
