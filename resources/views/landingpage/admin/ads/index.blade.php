@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href=""> Home</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Manage Ads
                        </li>
                    </ol>
                </div>
                @can('ads.create')
                <div class="col-md-4">
                    <a href="{{ route('create.ads') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create New ads</a>
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
            <table class="table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Ads Title</th>
                       <th>Image</th>
                        <th>Meta Title</th>
                        <th>Meta Description</th>
                        @can('ads.update')
                          <th>Edit</th>
                        @endcan
                        @can('ads.delete')
                          <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @if ($ads->count() > 0)
                        @foreach ($ads as $item)
                            <tr>
                                <td>{{ $loop->index + (($ads->currentPage() - 1) * $ads->perPage()) + 1 }}</td>
                                <td>{{ ucfirst($item->title) }}</td>
                                <td><img src="{{ asset( $item->image) }}" alt="ads" class="ads-image"></td>

                                <td>{{ ucfirst($item->meta_tags) }}</td>
                                <td>{{ Str::limit($item->meta_description, 30, '...') }}</td>
                                @can('ads.update')
                                <td class="text-nowrap">
                                    <a title="Edit"
                                        href="{{route('edit.ads',[$item->id])}}"
                                        class="btn btn-warning btn-sm content-icon">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                              @endcan
                              @can('ads.delete')
                                <td class="text-nowrap">
                                    <a title="Delete"
                                        href="{{route('delete.ads',[$item->id])}}"
                                        class="btn btn-warning btn-sm content-icon">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            @endcan
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">Data Not Found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$ads->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

