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
                            Manage Program SubDiscipline
                        </li>
                    </ol>
                </div>
                @can('program_subdiscipline.create')
                <div class="col-md-4">
                    <a href="{{ route('create-program-subdiscipline') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create  Program SubDiscipline</a>
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
          <form id="eudcation" action="{{route('program-subdiscipline')}}" method="get" class="d-flex justify-content-between">
            <div class="col-md-8">
                <div class="form-floating ">
                    <input id="lead-total_credits" name="name" type="text" class="form-control " placeholder="Enter Exam Name" >
                    <label for="lead-total_credits" class="form-label">NAME</label>
                </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-info px-5 mx-2 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 float-start">
                <a href="{{route('program-subdiscipline')}}" class="btn btn-info px-5 mx-2">
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
                        <th>Program Discipline</th>
                        <th>NAME</th>
                        <th>Status</th>
                        @can('program_subdiscipline.update')
                        <th>Edit</th>
                        @endcan
                        @can('program_subdiscipline.delete')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($program_subdiscipline as $item)
                    <tr>
                        <td>{{ $loop->index + (($program_subdiscipline->currentPage() - 1) * $program_subdiscipline->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->programdiscipline->name }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                        @can('program_subdiscipline.update')
                        <td><a  href="{{route('edit-program-subdiscipline',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('program_subdiscipline.delete')
                        <td><a href="{{route('delete-program-subdiscipline',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$program_subdiscipline->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection
@section('scripts')
