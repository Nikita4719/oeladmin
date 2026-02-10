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
                            Manage Visa Type
                        </li>
                    </ol>
                </div>
                @can('visa_type.create')

                <div class="col-md-4">
                    <a href="{{ route('create-visa-type') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create New Visa</a>
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
                <form id="eudcation" action="{{route('visa-type')}}" method="get">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="col-md-5 ps-md-3">
                            <div class="form-floating ">
                                <input id="lead-total_credits" name="name" type="text" class="form-control " placeholder="NAME">
                                <label for="lead-total_credits" class="form-label">NAME</label>
                            </div>
                        </div>
                        <div class="col-md-4 row ps-md-3">
                            <div class="col ps-2">
                                <button type="submit" class="btn btn-info w-100 float-end" id="submit" value="1">Search</button>
                            </div>
                            <div class="col ps-2 float-start">
                                <a href="{{route('visa-type')}}" class="btn btn-info w-100">
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
                        <th> Name</th>
                        @can('visa_type.update')
                        <th>Edit</th>
                        @endcan
                        @can('visa_type.delete')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($visa_type as $item)
                    <tr>
                        <td>{{ $loop->index + (($visa_type->currentPage() - 1) * $visa_type->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        @can('visa_type.update')
                        <td><a href="{{route('edit-visa-type',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('visa_type.delete')
                        <td><a href="{{route('delete-visa-type',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="py-4 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$visa_type->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection