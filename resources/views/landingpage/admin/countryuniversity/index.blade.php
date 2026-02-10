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
                            Manage Country University
                        </li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('create.country.university') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create New Country University</a>
                </div>
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
                        <th>Country Name</th>
                        <th>About Country</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @if ($countryuniversity->count() > 0)
                        @foreach ($countryuniversity as $item)
                            <tr>
                                <td>{{ $loop->index + (($countryuniversity->currentPage() - 1) * $countryuniversity->perPage()) + 1 }}</td>
                                @php
                                $country = DB::table('country')->find($item->country_id);
                                @endphp
                               <td>{{ $country->name }}</td>
                               <td class="text-wrap">{!! $item->aboutcountry !!}</td>
                                <td class="text-nowrap">
                                    <a title="Edit"
                                        href="{{route('edit.country.university',[$item->id])}}"
                                        class="btn btn-warning btn-sm content-icon">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td class="text-nowrap">
                                    <a title="Delete"
                                        href="{{route('delete.country.university',[$item->id])}}"
                                        class="btn btn-warning btn-sm content-icon">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
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
                        {{$countryuniversity->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

