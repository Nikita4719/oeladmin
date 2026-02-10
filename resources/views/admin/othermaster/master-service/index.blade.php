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
                            Manage Master Service
                        </li>
                    </ol>
                </div>
                @can('master_service.create')
                    <div class="col-md-4">
                        <a href="{{ route('create-master-service') }}" class="btn add-btn float-end">
                            <i class="las la-plus"></i>Create New Master Service</a>
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
          <form id="eudcation" action="{{route('master_service')}}" method="get" >
            <div class="d-flex justify-content-start align-items-center">
            <div class="col-md-5 ps-3">
                <div class="form-floating ">
                    <input id="lead-total_credits" name="name" type="text" class="form-control " placeholder="NAME" >
                    <label for="lead-total_credits" class="form-label">NAME</label>
                </div>
            </div>
            <div class="col-md-4 ps-3 row">
            <div class="col ps-2">
              <button type="submit" class="btn btn-info w-100 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col ps-2 float-start">
                <a href="{{route('master_service')}}" class="btn btn-info w-100">
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
                        <th>Name</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($master_service as $item)
                    <tr>
                        <td>{{ $loop->index + (($master_service->currentPage() - 1) * $master_service->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td class="text-wrap">{{ $item->amount ? $item->amount : 'N/A' }}</td>
                        @can('master_service.update')
                        <td><a  href="{{route('edit-master-service',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('master_service.delete')
                        <td><a href="{{route('delete-master-service',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$master_service->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
