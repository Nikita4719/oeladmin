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
                            Manage Provience
                        </li>
                    </ol>
                </div>
                @can('province.create')
                <div class="col-md-4">
                    <a href="{{ route('create-province') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create New Provience</a>
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
          <form id="eudcation" action="{{route('province-filter')}}" method="get">
            <div class="d-flex justify-content-between align-items-center row">
            <div class="col-md-4">
                <div class="form-floating ">
                    <select class="form-control " name="country_id">
                        @foreach ($country as $item)
                           <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating ">
                    <input id="lead-total_credits" name="name" type="text" class="form-control " placeholder="NAME" >
                    <label for="lead-total_credits" class="form-label">NAME</label>
                </div>
            </div>
            <div class="col-md-4 row">
            <div class="col ps-2">
              <button type="submit" class="btn btn-info w-100 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col ps-2 float-start">
                <a href="{{route('province')}}" class="btn btn-info w-100">
                    Reset
                </a>
            </div>
            </div>
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
                        <th>Province Name</th>
                        <th>Country Name</th>
                        @can('province.update')
                          <th>Edit</th>
                        @endcan
                        @can('province.delete')
                          <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($province as $item)
                    <tr>
                        <td>{{ $loop->index + (($province->currentPage() - 1) * $province->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td class="text-wrap">{{ $item->country->name }}</td>
                        @can('province.update')
                        <td><a  href="{{route('edit-province',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('province.delete')
                        <td><a href="{{route('delete-province',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="py-4 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$province->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection
