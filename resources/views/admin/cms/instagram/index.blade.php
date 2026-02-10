@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('instagram.index')}}"> Instagram</a>
                        </li>
                    </ol>
                </div>
                @can('instagram.create')
                <div class="col-md-4">
                    <a href="{{ route('instagram.create') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Add Instagram Url</a>
                </div>
                @endcan
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
                        <th>Url</th>
                        <th>Status</th>
                        @can('instagram.update')
                          <th>Edit</th>
                        @endcan
                        @can('instagram.delete')
                          <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <style>
                    .instagram-media {
                        max-width: 200px !important;
                        min-width: 150px !important;
                        max-height: 300px !important;
                        min-height: 200px !important;
                    }
                </style>

                <tbody id="tableBody">
                    @foreach ($instagrams as $item)
                    <tr>
                        <td>{{ $loop->index + (($instagrams->currentPage() - 1) * $instagrams->perPage()) + 1 }}</td>
                        <td class="text-wrap">
                                {!! $item->url !!}
                        </td>
                        <td>{{ $item->status == 1 ? 'Active' : 'InActive' }}</td>
                        @can('instagram.update')
                           <td><a  href="{{route('instagram.edit',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('instagram.delete')
                           <td><a href="{{route('instagram.delete',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="py-4 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$instagrams->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
