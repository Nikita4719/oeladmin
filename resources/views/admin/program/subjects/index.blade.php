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
                        <li class="breadcrumb-item text-muted">
                            Manage Sbujects
                        </li>
                    </ol>
                </div>
                @can('subject.create')
                <div class="col-md-2">
                    <a href="{{ route('create-subjects') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create New </a>
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
          <form id="eudcation" action="{{route('subject')}}" method="get" class="d-flex justify-content-between">
            <div class="col-md-4">
                <div class="form-floating ">
                    <input id="lead-total_credits" name="name" type="text" class="form-control " placeholder="NAME" >
                    <label for="lead-total_credits" class="form-label">Subjects Name</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating ">
                    <select name="status" class="form-control " id="">
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-info px-5 mx-2 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 float-start">
                <a href="{{route('subject')}}" class="btn btn-info px-5 mx-2">
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
                        <th>NAME</th>
                        <th>Status</th>
                        @can('subject.update')
                          <th>Edit</th>
                        @endcan
                        @can('subject.delete')
                          <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($subjects as $item)
                    <tr>
                        <td>{{ $loop->index + (($subjects->currentPage() - 1) * $subjects->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->subject_name }}</td>
                        <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                        @can('subject.update')
                        <td><a  href="{{route('edit-subject',$item->id)}}" class ="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('subject.delete')
                            <td><a href="{{route('delete-subject',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$subjects->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection
@section('scripts')
