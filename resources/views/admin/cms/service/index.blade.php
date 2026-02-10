@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('service.index')}}"> Service</a>
                        </li>
                    </ol>
                </div>
                @can('service_landing.create')
                <div class="col ps-2">
                    <a href="{{ route('service.create') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create Service</a>
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
                <form id="eudcation" action="{{route('service.store')}}" method="get">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="col-md-5 ps-md-3">
                            <div class="form-floating ">
                                <input name="name" type="text" class="form-control " placeholder="name">
                                <label class="form-label">Name</label>
                            </div>
                        </div>
                        <div class="col-md-3 row ps-md-3">
                            <div class="col ps-2">
                                <button type="submit" class="btn btn-info w-100 float-end" id="submit" value="1">Search</button>
                            </div>
                            <div class="col ps-2 float-start">
                                <a href="{{route('service.index')}}" class="btn btn-info w-100">
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
                        <th>Content</th>
                        <th>Image</th>
                        <th>Status</th>
                        @can('service_landing.update')
                        <th>Edit</th>
                        @endcan
                        @can('service_landing.delete')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($services as $item)
                    <tr>
                        <td>{{ $loop->index + (($services->currentPage() - 1) * $services->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td class="text-wrap">{!! $item->content !!}</td>
                        <td><img src="{{ asset('imagesapi/' . $item->image) }}" alt="{{ $item->name }}" width="100px" height="100px"></td>
                        <td>{{ $item->status == 1 ? 'Active' : 'InActive' }}</td>
                        @can('service_landing.update')
                        <td><a href="{{route('service.edit',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('service_landing.delete')
                        <td><a href="{{route('service.delete',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="py-4 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$services->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection