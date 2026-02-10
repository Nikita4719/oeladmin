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
                            Manage Country Campaign
                        </li>
                    </ol>
                </div>
                @can('ads.create')
                <div class="col-md-4">
                    <a href="{{ route('create.country_campaign') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create New Country Campaign</a>
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
                        <th>Country Name</th>
                        <th>Link</th>
                        <th>Copy Link</th>

                        <th>Action</th>                    
                    </tr>
                </thead>
                <tbody>
                    @if ($ads->count() > 0)
                        @foreach ($ads as $item)
                            <tr>
                                <td>{{ $loop->index + (($ads->currentPage() - 1) * $ads->perPage()) + 1 }}</td>
                                <td>{{ $item->country_name }}</td>                               
                                <td>{{ $item->meta_description . $item->country_name}}</td>                               
                                <td>                                                   
                                    <button onclick="copyText('{{ $item->meta_description . ' ' . $item->country_name }}')" class="copy-btn">Copy</button>                                                                                                                          
                               
                                </td>
                                <td class="text-nowrap">
                                   <a title="Edit"
                                        href="{{route('edit.country_campaign',[$item->id])}}"
                                        class="btn btn-warning btn-sm content-icon">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a title="Delete"
                                        href="{{route('delete.country_campaign',[$item->id])}}"
                                        class="btn btn-warning btn-sm content-icon">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                 </td>
                          
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
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script>
        function copyText(text) {
            var tempInput = document.createElement("input");
            document.body.appendChild(tempInput);
            tempInput.value = text;
            tempInput.select();
            tempInput.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            alert("Text copied to clipboard!");
        }
    </script>


@endsection   
