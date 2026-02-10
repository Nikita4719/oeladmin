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
                            Student Registratin Fees
                        </li>
                    </ol>
                </div>
                @can('student_registration_fees.create')
                <div class="col-md-4">
                    <a href="{{ route('create-student-registration-fees') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create Student Registration Fees</a>
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
          <form id="eudcation" action="{{route('student-registration-fees-filter')}}" method="get" class="d-flex justify-content-between">
            <div class="col-md-8">
                <div class="form-floating ">
                    <input  name="fees_type" type="text" class="form-control " placeholder="fees type" >
                    <label for="lead-total_credits" class="form-label">Fees Type</label>
                </div>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-info px-5 mx-2 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 float-start">
                <a href="{{route('student-registration-fees')}}" class="btn btn-info px-5 mx-2">
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
                        <th>Fees Type</th>
                        <th>Fees Amount</th>
                        @can('student_registration_fees.update')
                           <th>Edit</th>
                        @endcan
                        @can('student_registration_fees.delete')
                           <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($student_registraion_fees as $item)
                    <tr>
                        <td>{{ $loop->index + (($student_registraion_fees->currentPage() - 1) * $student_registraion_fees->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->fees_type }}</td>
                        <td class="text-wrap">{{ $item->fees_amount }}</td>
                        @can('student_registration_fees.update')
                            <td><a  href="{{route('edit-student-registration-fees',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('student_registration_fees.delete')
                            <td><a href="{{route('delete-student-registration-fees',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$student_registraion_fees->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
