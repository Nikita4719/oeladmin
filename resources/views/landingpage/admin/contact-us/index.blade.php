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
                            Manage Contact Us List
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
                        <th>Type</th>
                        <th>Name</th>
                        <th>Email Id</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Delete</th>
                        
                    </tr>
                </thead>
                <tbody>
                     @php
                        $i = ($contact_us->currentPage()-1)* $contact_us->perPage()+1;
                    @endphp
                    @if ($contact_us->count() > 0)
                    @foreach ($contact_us as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td class="badge {{ $item->type ? 'badge-danger' : 'badge-primary' }} mt-md-2">
                                {{ $item->type ?? 'Contact us' }}
                            </td>
                            <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                            <td>{{ $item->email ?? 'N/A' }}</td>
                            <td>{{$item->phone_code}} - {{$item->phone}}</td>
                            <td>{{ $item->message }}</td>                          
                            <td>{{$item->created_at}}</td>
                            <td class="text-nowrap ">
                                <a title="Delete" href="{{ route('contact-us-delete',[$item->id]) }}" class="btn btn-warning btn-sm content-icon">
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
            <div class="row my-3 ">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$contact_us->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

