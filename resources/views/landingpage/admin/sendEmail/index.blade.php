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
                            Manage Enquiry Email
                        </li>
                    </ol>
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
                        <th>Choose Country</th>
                        <th>Name</th>
                        <th>Email Id</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>City</th>
                        <th>Date</th>

                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                     @php
                        $i = ($emailData->currentPage()-1)* $emailData->perPage()+1;
                    @endphp
                    @if ($emailData->count() > 0)
                    @foreach ($emailData as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->country ??  null }}</td>
                            <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                            <td>{{ $item->email_id }}</td>
                            <td>{{ $item->phone_no }}</td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->city }}</td>
                            <td>{{ $item->created_at }}</td>

                            <td class="text-nowrap">
                                <a title="Delete" href="{{ route('emailDelete',[$item->id]) }}" class="btn btn-warning btn-sm content-icon">
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
                            <td colspan="6">Data Not Found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$emailData->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

