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
                        <li class="breadcrumb-item text-muted">Approved University</li>
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
                                <li class="text-dark">Approved University</li>
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
    <div class="card-group">
        <div class="card">
            <div class="card-body myform">
                <form action="{{route('unapproved-university')}}" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control formmrgin" name="university_name" id="university_name" placeholder="Search By University Name">
                        </div>
                        <div class="col-md-3">
                            <select name="status" class="form-control formmrgin" id="status">
                                <option value="">- Active Status-</option>
                                <option value="0">Pending</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control formmrgin" name="country" id="country">
                                <option value="">--Country -- </option>
                                @foreach ($countries as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    <div class="col-md-3">
                        <div class="row d-flex justify-content-center">
                            <div class="col ps-2">
                                <a href="{{route('unapproved-university')}}">
                                    <button type="button" class="btn btn-info d-lg-block float-end  formmrgin w-100" id="submit" value="1">Reset</button>
                                </a>
                            </div>
                            <div class="col ps-2">
                                <button type="submit" class="btn  btn-info d-lg-block float-end  formmrgin w-100" id="submit" value="1">Search</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>
                {{-- <div class="col-md-12  ">
                <button type="button" class="btn mr-3 btn-info d-lg-block float-end  formmrgin px-5" id="submit" value="1">Search</button>
              </div> --}}
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">

            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name </th>
                        <th> Country </th>
                        <th> State</th>
                        <th> Edit</th>
                        <!-- <th> Delete</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $key => $value)
                    <tr>
                        <td>{{ $loop->index + (($results->currentPage() - 1) * $results->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $value->university_name ?? null  }}</td>
                        <td class="text-wrap">{{ $value->country->name ?? null }}</td>
                        <td class="text-wrap">{{ $value->province->name ?? null  }}</td>
                        <td class="text-end">
                            <a class=" btn btn-info" href="{{ route('edit-university') }}/{{ $value->id }}" data-item-id="{{ $value->id }}">
                                <i class="fa-solid fa-pen "></i> </a>
                        </td>
                        <!-- <td class="text-end">
                            <a class=" btn btn-warning" href="{{ route('delete-university') }}/{{ $value->id }}" data-item-id="{{ $value->id }}">
                                <i class="fa-solid fa-trash "></i> </a>
                            
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$results->withQueryString()->links()}}
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