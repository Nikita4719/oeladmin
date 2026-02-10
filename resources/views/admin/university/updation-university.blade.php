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
                            <li class="breadcrumb-item text-muted">Update University</li>
                        </ol>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('add-university') }}" class="btn add-btn">
                            <i class="las la-university"></i>Add University </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-group">
            <div class="card">
                <div class="card-body myform">
                    <form action="#" method="GET">
                        <div class="row">
                            <div class="col-md-9">
                                <ol class="breadcrumb  mb-0">
                                    <li class="text-dark">Update University</li>
                                </ol>
                            </div>
                            {{-- <div class="col-md-3">
                                <input type="text" class="form-control formmrgin" id="searchInput" name="university" value=""
                                    placeholder="Search ...">
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Name </th>
                            <th> Edit</th>
                            <!-- <th> Delete</th> -->
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($oldUniversities as $key=>$item)
                           <tr>
                               <td>{{($oldUniversities->currentPage()-1)*$oldUniversities->perPage() + $loop->iteration}}</td>
                               <td>{{$item->university_name}}</td>
                               <td>
                                   <a class="btn btn-info" href="{{route('edit-university')}}/{{$item->id}}"><i class="fa-solid fa-pen"></i></a>
                               </td>
                               <!-- <td>
                                   <a class="btn btn-warning" href="{{route('delete-university')}}/{{$item->id}}"><i class="fa-solid fa-trash"></i></a>
                               </td> -->
                           </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                            {{ $oldUniversities->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>

@endsection
