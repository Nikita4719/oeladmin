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
                            Manage FAQ's
                        </li>
                    </ol>
                </div>
                @can('faq.create')
                <div class="col ps-2">
                    <a href="{{ route('create-faq') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create FAQ's</a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="card-group mb-2">
        <div class="card">
            <div class="card-body myform">
                <form id="eudcation" action="{{route('faq')}}" method="get">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="col-md-5">
                            <div class="form-floating ">
                                <input id="lead-total_credits" name="faq_question" type="text" class="form-control " placeholder="NAME">
                                <label for="lead-total_credits" class="form-label">FAQ Question</label>
                            </div>
                        </div>
                        <div class="col-md-4  row ps-md-3">
                            <div class="col ps-2">
                                <button type="submit" class="btn btn-info w-100 float-end" id="submit" value="1">Search</button>
                            </div>
                            <div class="col ps-2 float-start">
                                <a href="{{route('faq')}}" class="btn btn-info w-100">
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
                        <th>Faq's Question</th>
                        <th>Faq's Answer</th>
                        <th>Status</th>
                        @can('faq.update')
                        <th>Edit</th>
                        @endcan
                        @can('faq.delete')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($faq as $item)
                    <tr>
                        <td>{{ $loop->index + (($faq->currentPage() - 1) * $faq->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->faq_question }}</td>
                        <td class="text-wrap">{!! $item->faq_answer !!}</td>
                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                        @can('faq.update')
                        <td><a href="{{route('edit-faq',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('faq.delete')
                        <td><a href="{{route('delete-faq',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="py-4 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$faq->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection