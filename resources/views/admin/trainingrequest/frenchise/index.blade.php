@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Manage Frenchise Request
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
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
                        <th>Traning Request Name</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        @can('training_franchise.delete')
                          <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->index + (($data->currentPage() - 1) * $data->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td class="text-wrap">{{ $item->user_name }}</td>
                        <td class="text-wrap">{{ $item->phone }}</td>
                        <td class="text-wrap">{{ $item->email }}</td>
                        @can('training_franchise.delete')
                          <td><a href="{{route('franchise-training.delete',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$data->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection
@section('scripts')
