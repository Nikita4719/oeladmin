@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('blogs')}}"> Blogs</a>
                        </li>
                    </ol>
                </div>
                @can('blogs.create')
                <div class="col ps-2">
                    <a href="{{ route('create-blogs') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create Blogs</a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="card-group mb-3">
        <div class="card">
            <div class="card-body myform">
                <form id="eudcation" action="{{route('blogs')}}" method="get">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="col-md-5 ps-md-3">
                            <div class="form-floating ">
                                <input name="title" type="text" class="form-control " placeholder="title">
                                <label class="form-label">title</label>
                            </div>
                        </div>
                        <div class="col-md-4 ps-md-3 row">
                            <div class="col ps-2">
                                <button type="submit" class="btn btn-info w-100 float-end" id="submit" value="1">Search</button>
                            </div>
                            <div class="col ps-2 float-start">
                                <a href="{{route('blogs')}}" class="btn btn-info w-100">
                                    Reset
                                </a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 px-0">
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
                        <th>Title</th>
                        <!-- <th>Alt Tag</th> -->
                        <!-- <th>Meta Tags</th> -->
                        <!-- <th>Meta Description</th> -->
                        <!-- <th>Title</th> -->
                        <th>Image</th>
                        <th>Status</th>
                        @can('blogs.update')
                        <th>Edit</th>
                        @endcan
                        @can('blogs.delete')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($blogs as $item)
                    <tr>
                        <td>{{ $loop->index + (($blogs->currentPage() - 1) * $blogs->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->title }}</td>
                        <!-- <td>{{ $item->alt_tag }}</td> -->
                        <!-- <td>{{ ucfirst($item->meta_tags) }}</td> -->
                        <!-- <td>{{ Str::limit($item->meta_description, 30, '...') }}</td> -->
                        <td><img src="{{asset('imagesapi/'.$item->image)}}" alt="" style="width: 150px; height: 100px;"></td>
                        <td>{{ $item->status == 1 ? 'Publish' : 'UnPublish' }} </td>
                        @can('blogs.update')
                        <!-- <td></td> -->
                        <td><a href="{{route('edit-blogs',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('blogs.delete')
                        <td><a href="{{route('delete-blogs',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="py-4 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$blogs->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection