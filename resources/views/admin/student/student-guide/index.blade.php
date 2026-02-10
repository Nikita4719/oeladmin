@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('student-guide')}}"> Student Guide</a>
                        </li>
                    </ol>
                </div>
                @can('popular_student_guide.update')
                    <div class="col-md-4">
                        <a href="{{ route('create-student-guide') }}" class="btn add-btn float-end">
                            <i class="las la-plus"></i>Create Student  Guide</a>
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
          <form id="eudcation" action="{{route('student-guide-filter')}}" method="get" class="d-flex justify-content-between">
            <div class="col-md-8">
                <div class="form-floating ">
                    <input  name="title" type="text" class="form-control " placeholder="title" >
                    <label  class="form-label">title</label>
                </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-info px-5 mx-2 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 float-start">
                <a href="{{route('student-guide')}}" class="btn btn-info px-5 mx-2">
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
                        <th>Title</th>
                        <th>Image</th>
                        @can('popular_student_guide.update')
                          <th>Edit</th>
                        @endcan
                        @can('popular_student_guide.delete')
                           <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($student_guide as $item)
                    <tr>
                        <td>{{ $loop->index + (($student_guide->currentPage() - 1) * $student_guide->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->title }}</td>
                        <td><img src="{{asset('imagesapi/'.$item->image)}}" width="100" alt=""></td>
                        @can('popular_student_guide.update')
                           <td><a  href="{{route('edit-student-guide',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('popular_student_guide.delete')
                            <td><a href="{{route('delete-student-guide',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$student_guide->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
