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
                            Manage Sms Template
                        </li>
                    </ol>
                </div>
                @can('sms_template.create')
                    <div class="col-md-4 ">
                        <a href="{{ route('create-sms-template') }}" class="btn add-btn float-end">
                            <i class="las la-plus"></i>Create New Sms Template</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>
<div class="row mb-md-3">
    <div class="card-group">
      <div class="card">
        <!-- <div class="card-body myform">
          <form id="eudcation" action="{{route('sms-template-filter')}}" method="get" class="d-flex justify-content-between">
            <div class="col-md-8">
                <div class="form-floating ">
                    <input id="lead-total_credits" name="name" type="text" class="form-control " placeholder="NAME" >
                    <label for="lead-total_credits" class="form-label">NAME</label>
                </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-info px-5 mx-2 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 float-start">
                <a href="{{route('sms-template')}}" class="btn btn-info px-5 mx-2">
                    Reset
                </a>
            </div>
          </form>
        </div> -->

        <div class="card-body myform smss-form-container">
    <form id="eudcation" action="{{route('sms-template-filter')}}" method="get" class="d-flex justify-content-start align-items-center ">
        <div class="col-md-4 me-md-5">
            <div class="form-floating position-relative">
                <input id="lead-total_credits" name="name" type="text" class="form-control smss-input" placeholder="NAME">
                <label for="lead-total_credits" class="form-label smss-label">NAME</label>
            </div>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-info position-relative overflow-hidden px-5 mx-2 float-end smss-btn smss-search-btn w-100" id="submit" value="1">
                Search
            </button>
        </div>
        <div class="col-md-2">
            <a href="{{route('sms-template')}}" class="btn btn-info position-relative overflow-hidden px-5 mx-2 smss-btn smss-reset-btn w-100">
                Reset
            </a>
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
                        <th>Heading</th>
                        <th>Content</th>
                        <th>Status</th>
                        @can('sms_template.update')
                          <th>Edit</th>
                        @endcan
                        @can('sms_template.delete')
                          <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($sms_template as $item)
                    <tr>
                        <td>{{ $loop->index + (($sms_template->currentPage() - 1) * $sms_template->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->heading }}</td>
                        <td class="text-wrap">{!! $item->body !!}</td>
                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                        @can('sms_template.update')
                          <td><a  href="{{route('edit-sms-template',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('sms_template.delete')
                          <td><a href="{{route('delete-sms-template',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$sms_template->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection
@section('scripts')
