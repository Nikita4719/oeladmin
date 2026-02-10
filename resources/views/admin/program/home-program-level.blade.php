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
                        <li class="breadcrumb-item text-muted">Program Level Details                     </li>
                    </ol>
                </div>
                @can('program_level_details.create')
                <div class="col-md-2">
                    <a href="{{ route('create-new-program-details') }}" class="btn add-btn">
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
        <div class="card-body myform">
          <form id="program_filter" action="{{route('program-level-details')}}" method="get" class="d-flex justify-content-between">
            <div class="col-md-8">
              <select name="program_level" class="form-control ">
                 @foreach ($program_level as $item)
                     <option value="{{$item->id}}">{{$item->name}}</option>
                 @endforeach
              </select>
            </div>
            <div class="col-md-2 col-sm-2">
              <button type="submit" class="btn btn-info px-5 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col-md-2 col-sm-2 ">
                <a href="{{route('program-level-details')}}" class="btn btn-info px-5  float-end">
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
                        <th>Program Level</th>
                        <th>Description </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($home_program as $item)
                    <tr>
                        <td>{{ $loop->index + (($home_program->currentPage() - 1) * $home_program->perPage()) + 1 }}</td>
                        <td>{{$item->home_program_levels->name ?? null }}</td>
                        <td class="text-wrap">{!! $item->description !!}</td>
                        @can('program_level_details.update')
                        <td><a  href="{{route('edit-program-details',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('program_level_details.delete')
                        <td><a href="{{route('delete-program-details',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$home_program->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection
@section('scripts')
