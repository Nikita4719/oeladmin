@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href=""> Student Review</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="card-group">
        <div class="card">
            <div class="card-body myform">
                <form action="{{ route('student-review') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control  formmrgin" name="first_name"
                                value="{{ request()->get('first_name') }}" placeholder="Student Name ">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control  formmrgin" name="email"
                                value="{{ request()->get('email') }}" placeholder="Student Email">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control  formmrgin" name="phone_number"
                                value="{{ request()->get('phone_number') }}" placeholder="Student Phone Number">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-8"></div>
                        <div class="col-md-2 float-end">
                            <button type="submit" value="submit" class="btn btn-info d-lg-block  formmrgin px-5"
                                name="submit">Filter </button>
                        </div>
                        <div class="col-md-2 float-end">
                            <a href="{{ route('student-review') }}" class="btn btn-info d-lg-block  formmrgin">Reset
                            </a>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<br>
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
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        @can('student_amount.view')
                          <th>View</th>
                        @endcan
                      <th>Invoice</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($students as $item)
                    <tr>
                        <td>{{ $loop->index + (($students->currentPage() - 1) * $students->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->first_name  }}</td>
                        <td class="text-wrap">{{ $item->email }}</td>
                        <td class="text-wrap">{{ $item->phone_number }}</td>
                        <td class="text-wrap">{{ $item->gender }}</td>
                        @can('student_amount.view')
                        <td><a  href="{{route('view-student-reviews',$item->user_id)}}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a></td>
                         <td><a  href="{{route('view-student-invoice',$item->user_id)}}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a></td>                      
                      @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$students->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
