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
                            Student Apply Question
                        </li>
                    </ol>
                </div>
                @can('student_apply_question.create')
                    <div class="col-md-4">
                        <a href="{{ route('create-student-question') }}" class="btn add-btn float-end">
                            <i class="las la-plus"></i>Create Student  Apply Question</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>
<div class="row ">
    <div class="card-group mb-md-4">
      <div class="card">
        <div class="card-body myform">
          <form id="eudcation" action="{{route('student-question-filter')}}" method="get" class="d-flex justify-content-start align-items-center">
            <div class="col-md-5 ps-3">
                <div class="form-floating">
                    <input name="question" type="text" class="form-control" placeholder="Question">
                    <label class="form-label">Question</label>
                </div>
            </div>
            <div class="col-md-2 px-3">
              <button type="submit" class="btn btn-info w-100" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 px-3">
                <a href="{{route('student-question')}}" class="btn btn-info w-100 ">Reset</a>
            </div>
            <div class="col-md-2"></div>
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
                        <th>Question</th>
                        @can('student_apply_question.update')
                        <th>
                            Edit
                        </th>
                        @endcan
                        @can('student_apply_question.delete')
                        <th>
                            Delete
                        </th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($student_question as $item)
                    <tr>
                        <td>{{ $loop->index + (($student_question->currentPage() - 1) * $student_question->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->question }}</td>
                        @can('student_apply_question.update')
                           <td><a  href="{{route('edit-student-question',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('student_apply_question.delete')
                            <td><a href="{{route('delete-student-question',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$student_question->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
