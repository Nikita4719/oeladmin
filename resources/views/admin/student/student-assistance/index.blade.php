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
                            Student Assistance
                        </li>
                    </ol>
                </div>
                @can('student_assistance.create')
                <div class="col-md-4">
                    <a href="{{ route('create-student-assistance') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create Student  Assistance</a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="card-group mb-md-3">
      <div class="card">
        <div class="card-body myform">
          <form id="eudcation" action="{{route('student-assistance-filter')}}" method="get" class="d-flex justify-content-start align-items-center">
            <div class="col-md-5 ps-3">
                <div class="form-floating">
                    <input name="title" type="text" class="form-control" placeholder="title">
                    <label class="form-label">title</label>
                </div>
            </div>
            <div class="col-md-2 px-3">
              <button type="submit" class="btn btn-info w-100" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 px-3">
                <a href="{{route('student-assistance')}}" class="btn btn-info w-100">Reset</a>
            </div>
            <div class="col-md-3"></div>
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
                        @can('student_assistance.update')
                          <th>Edit</th>
                        @endcan
                        @can('student_assistance.delete')
                            <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($student_assistance as $item)
                    <tr>
                        <td>{{ $loop->index + (($student_assistance->currentPage() - 1) * $student_assistance->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->title }}</td>
                        @can('student_assistance.update')
                          <td><a  href="{{route('edit-student-assistance',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('student_assistance.delete')
                            <td><a href="{{route('delete-student-assistance',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$student_assistance->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
