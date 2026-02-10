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
                            Manage Program Level
                        </li>
                    </ol>
                </div>
                @can('grading_scheme.create')
                <div class="col-md-2">
                    <a href="{{ route('create-new-grading-scheme') }}" class="btn add-btn float-end">
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
        <div class="card-body ">
          <form id="grading-filter" action="{{route('grading-scheme')}}" method="get">
            <div class="row">
                <div class="col-4">
                    <select class="form-control " name="country_id" id="">
                    <option value="">---Select Country ---</option>
                    @foreach ($country as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                    </select>
                    @error('country_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                <select class="form-control " name="education_level_id" id="education_level_id">
                    <option value="">--- Education Level ---</option>
                    @foreach ($education_level as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                    @error('education_level_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <input type="text" class="form-control " placeholder="Grade Scheme Name" name="name">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br><br>
            <div class="row">
                 <div class="col-8"></div>
                 <div class="col-2">
                    <a href="{{route('grading-scheme')}}" class="btn btn-info mx-1 float-end px-4">
                        Reset
                    </a>
                </div>
                 <div class="col-2">
                   <button type="submit" class="btn btn-info mx-1 px-4 float-end" id="submit" value="1">Search</button>
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
                        <th>Country </th>
                        <th>Education Level </th>
                        @can('grading_scheme.update')
                        <th>Edit</th>
                        @endcan
                        @can('grading_scheme.delete')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($grading_scheme as $item)
                    <tr>
                        <td>{{ $loop->index + (($grading_scheme->currentPage() - 1) * $grading_scheme->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td class="text-wrap">{{ $item->country->name }}</td>
                        <td class="text-wrap">{{ $item->education_level->name ?? null }}</td>
                        @can('grading_scheme.update')
                          <td><a  href="{{route('edit-grading-scheme',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('grading_scheme.delete')
                        <td><a href="{{route('delete-grading-scheme',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                         @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$grading_scheme->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection
@section('scripts')
