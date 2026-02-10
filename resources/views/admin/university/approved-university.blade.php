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
                        <li class="breadcrumb-item text-muted">Approved University</li>
                    </ol>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('add-university') }}" class="btn add-btn">
                        <i class="las la-university"></i>Add University </a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="row">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="card-group">
        <div class="card">
            <div class="card-body myform">
                <form action="#" method="GET">
                    <div class="row">
                        <div class="col-md-9">
                            <ol class="breadcrumb  mb-0">
                                <li class="text-dark">Approved University</li>
                            </ol>
                        </div>
                        {{-- <div class="col-md-3">
                                <input type="text" class="form-control formmrgin" id="searchInput" name="university" value=""
                                    placeholder="Search ...">
                            </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card-group mb-3">
        <div class="card">
            <div class="card-body myform">
                <form action="{{route('view-approved-university')}}" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control formmrgin" name="university_name" id="university_name" placeholder="Search By University Name">
                        </div>
                        <div class="col-md-3">
                            <select name="status" class="form-control formmrgin" id="status">
                                <option value="">- Active Status-</option>
                                <option value="0">Pending</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control formmrgin" name="country" id="country">
                                <option value="">--Country -- </option>
                                @foreach ($countries as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        
                            <div class="col-md-3">
                            <div class="row">
                                <div class="col px-2">
                                    <a href="{{route('view-approved-university')}}">
                                        <button type="button" class="btn  btn-info d-lg-block w-100 formmrgin " id="submit" value="1">Reset</button>
                                    </a>
                                </div>
                                <div class="col px-2">
                                    <button type="submit" class="btn  btn-info d-lg-block  w-100 formmrgin" id="submit" value="1">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- <div class="col-md-12">
                <button type="button" class="btn btn-info d-lg-block float-end  formmrgin" id="submit" value="1">Search</button>
              </div> --}}
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name </th>
                        <th> Country </th>
                        <th> State</th>
                        <th> View</th>
                        <th> Edit</th>
                        <!-- <th> Delete</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $key => $value)
                    <tr>
                        <td>{{ $loop->index + (($results->currentPage() - 1) * $results->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $value->university_name ?? null  }}</td>
                        <td class="text-wrap">{{ $value->country->name ?? null }}</td>
                        <td class="text-wrap">{{ $value->province->name ?? null  }}</td>
                        <td class="text-end">
                            <a class=" btn btn-success" href="{{ route('view-university', $value->id) }}" data-item-id="{{ $value->id }}">
                                <i class="fa-solid fa-eye "></i> </a>
                        </td>
                        <td class="text-end">
                            <a class=" btn btn-info" href="{{ route('edit-university', $value->id) }}" data-item-id="{{ $value->id }}">
                                <i class="fa-solid fa-pen "></i> </a>
                        </td>
                        <!-- <td class="text-end">
                            <a class=" btn btn-warning" href="{{ route('delete-university') }}/{{ $value->id }}" data-item-id="{{ $value->id }}">
                                <i class="fa-solid fa-trash "></i> </a>
                           
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="py-4 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$results->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>
<script>
    $(document).ready(function() {
        function csrf() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        // function fetchData(page = 1, search = '') {
        //     csrf();
        //     $.ajax({
        //         url: '{{ route("view-approved-university") }}',
        //         method: 'GET',
        //         data: {
        //             page: page,
        //             search: search
        //         },
        //         success: function(response) {
        //             $('#tableBody').empty();
        //             if ($.isEmptyObject(response)) {
        //                 $('#tableBody').append('<tr><td colspan="6" class="text-center">No records found</td></tr>');
        //             } else {
        //                 var perPage = response.data.per_page;
        //                 var startIndex = (page - 1) * perPage;
        //                 $.each(response.data.data, function(key, value) {
        //                     key = startIndex + key + 1;
        //                     if(value.is_approved == 1){
        //                        var  is_approved ='Approve';
        //                     }else{
        //                         var  is_approved ='Un Approve';
        //                     }
        //                     $('#tableBody').append(`
        //                         <tr>
        //                             <td>${key}</td>
        //                             <td>${value.university_name}</td>
        //                             <td>${value.country.name}</td>
        //                             <td>${value.province.name}</td>
        //                             <td class="text-end">
        //                                 <a class=" " href="${value.id}" data-item-id="${value.id}">
        //                                     <i class="fa-solid fa-eye "></i>  </a>
        //                             </td>
        //                         </tr>
        //                     `);
        //                 });
        //             }
        //             $('#pagination').html(response.links);
        //             $('.pagination a').on('click', function(event){
        //                 event.preventDefault();
        //                 var page = $(this).attr('href').split('page=')[1];
        //                 fetchData(page); // Load universities for the clicked page
        //             });
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('An error occurred: ' + error);
        //         }
        //     });
        // }
        // fetchData();
        // $('#searchInput').on('keyup', function() {
        //     var query = $(this).val();
        //     var page = 1, search = '';
        //     csrf();
        //     $.ajax({
        //         url: '{{route('filter-university')}}',
        //         method: 'get',
        //         data: { search: query,page: page },
        //         success: function(response) {
        //             $('#tableBody').empty();
        //             if ($.isEmptyObject(response)) {
        //                 $('#tableBody').append('<tr><td colspan="6" class="text-center">No records found</td></tr>');
        //             } else {
        //                 var perPage = response.data.per_page;
        //                 var startIndex = (page - 1) * perPage;
        //                 $.each(response.data.data, function(key, value) {
        //                     key = startIndex + key + 1;
        //                     $('#tableBody').append(`
        //                         <tr>
        //                             <td>${key}</td>
        //                             <td>${value.university_name}</td>
        //                             <td>${value.country.name}</td>
        //                             <td>${value.province.name}</td>
        //                             <td class="text-end">
        //                                 <a class="" href="" data-item-id="${value.id}">
        //                                     <i class="fa-solid fa-eye "></i>  </a>
        //                             </td>
        //                         </tr>
        //                     `);
        //                 });
        //             }
        //             $('#pagination').html(response.links);
        //             $('.pagination a').on('click', function(event){
        //                 event.preventDefault();
        //                 var page = $(this).attr('href').split('page=')[1];
        //                 fetchData(page); // Load universities for the clicked page
        //             });
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('An error occurred: ' + error);
        //         }
        //     });
        // });
        // $('#search').on('input', function(){
        //     fetchData(1, $(this).val());
        // });
        // $('#submit').click(function(){
        //     $('#pagination').empty();
        //     var page = 1, search = '';
        //     var university_name =$('#university_name').val();
        //     var country =$('#country').val();
        //     var status =$('#status').val();
        //     var approve =$('#approve').val();
        //     $.ajax({
        //         url: '{{route('filter-university')}}',
        //         method: 'get',
        //         data:{page:page,country:country,status:status,approve:approve,university_name:university_name,page:page,search:search},
        //         success: function(response) {
        //             $('#tableBody').empty();
        //             if ($.isEmptyObject(response)) {
        //                 $('#tableBody').append('<tr><td colspan="6" class="text-center">No records found</td></tr>');
        //             } else {
        //                 var perPage = response.data.per_page;
        //                 var startIndex = (page - 1) * perPage;
        //                 $.each(response.data.data, function(key, value) {
        //                     key = startIndex + key + 1;
        //                     if(value.is_approved == 1){
        //                        var  is_approved ='Approve';
        //                     }else{
        //                         var  is_approved ='Un Approve';
        //                     }
        //                     $('#tableBody').append(`
        //                         <tr>
        //                             <td>${key}</td>
        //                             <td>${value.university_name}</td>
        //                             <td>${value.country.name}</td>
        //                             <td>${value.province.name}</td>
        //                             <td class="text-end">
        //                                 <a class="" href="" data-item-id="${value.id}">
        //                                     <i class="fa-solid fa-eye "></i>  </a>
        //                             </td>
        //                         </tr>
        //                     `);
        //                 });
        //             }
        //             $('#pagination').html(response.links);
        //             $('.pagination a').on('click', function(event){
        //                 event.preventDefault();
        //                 var page = $(this).attr('href').split('page=')[1];
        //                 fetchData(page);
        //             });
        //         },
        //     });
        // })
    });
</script>
@endsection