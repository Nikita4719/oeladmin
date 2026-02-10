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
                            Manage Lead Quality
                        </li>
                    </ol>
                </div>
                @can('lead_quality.create')
                <div class="col-md-4">
                    <a href="{{ route('lead_quality_create') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create New Source</a>
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
                <form id="eudcation" action="{{route('lead_quality')}}" method="get">
                    <div class="row d-flex justify-content-start align-items-center">
                        <div class="col-md-5 ps-3">
                            <div class="form-floating ">
                                <input id="lead-total_credits" name="name" type="text" class="form-control " placeholder="NAME">
                                <label for="lead-total_credits" class="form-label">NAME</label>
                            </div>
                        </div>
                        <div class="col-md-4 row">
                            <div class="col ps-2">
                                <button type="submit" class="btn btn-info w-100 float-end" id="submit" value="1">Search</button>
                            </div>
                            <div class="col ps-2">
                                <a href="{{route('lead_quality')}}" class="btn btn-info w-100">
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
                        <th>NAME</th>
                        <th>Status One</th>
                        <th>Status Two</th>
                        <th>Status Three</th>
                        <th>Status Four</th>
                      

                        <th>Status</th>
                        @can('source.update')
                        <th>Edit</th>
                        @endcan
                        @can('source.delete')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($source as $item)
                    <tr>
                        <td>{{ $loop->index + (($source->currentPage() - 1) * $source->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td class="text-wrap">{{ $item->status_one }}</td>
                        <td class="text-wrap">{{ $item->status_to }}</td>
                        <td class="text-wrap">{{ $item->status_three }}</td>
                        <td class="text-wrap">{{ $item->status_four }}</td>
                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                        @can('source.update')
                        <td><a href="{{route('lead_quality_edit',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('source.delete')
                        <td><a href="{{route('lead_quality_delete',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$source->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')