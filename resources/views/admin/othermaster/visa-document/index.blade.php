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
                            Manage Visa Document
                        </li>
                    </ol>
                </div>
                @can('vas_services.create')
                <div class="col-md-4">
                    <a href="{{ route('create-visa-document-type') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create Visa Document</a>
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
                <form id="eudcation" action="{{route('visa-document-type')}}" method="get">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="col-md-5 ps-md-3">
                            <div class="form-floating ">
                                <input id="lead-total_credits" name="name" type="text" class="form-control " placeholder="NAME">
                                <label for="lead-total_credits" class="form-label">Title</label>
                            </div>
                        </div>
                        <div class="col-md-4 row ps-md-3">
                            <div class="col ps-2">
                                <button type="submit" class="btn btn-info w-100 float-end" id="submit" value="1">Search</button>
                            </div>
                            <div class="col ps-2 float-start">
                                <a href="{{route('visa-document-type')}}" class="btn btn-info w-100">
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
                        @can('visa_documents_type.update')
                        <th>Edit</th>
                        @endcan
                        @can('visa_documents_type.delete')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($visa_document_type as $item)
                    <tr>
                        <td>{{ $loop->index + (($visa_document_type->currentPage() - 1) * $visa_document_type->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                        @can('visa_documents_type.update')
                        <td><a href="{{route('edit-visa-document-type',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('visa_documents_type.delete')
                        <td><a href="{{route('delete-visa-document-type',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="py-4 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$visa_document_type->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection