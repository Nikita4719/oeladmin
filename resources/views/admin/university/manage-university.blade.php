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
                            <li class="breadcrumb-item text-muted">Manage University</li>
                        </ol>
                    </div>
                  @can('universities.create')
                    <div class="col-md-2">
                        <a href="{{ route('add-university') }}" class="btn add-btn">
                            <i class="las la-university"></i>Add University </a>
                    </div>
                   @endcan
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
                                    <li class="text-dark">Manage All University</li>
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
        <div class="card-group">
          <div class="card">
            <div class="card-body myform">
              <form action="{{route('manage-university')}}" method="get">
                <div class="row">
                  <div class="col-md-3">
                    <input type="text" class="form-control formmrgin" name="university_name" id="university_name" placeholder="Search By University Name">
                  </div>


            

                   
                    <div class="col-md-3">
                        <select name="user_id" class="form-control formmrgin" id="user_id">
                        <option value="">-Select User -</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                        </select>
                   </div>
                  <div class="col-md-3">
                    <select name="account_type" class="form-control formmrgin" id="approve" name="approve">
                      <option value="">-Select Approval-</option>
                      <option value="approve">Approve</option>
                      <option value="unapprove">UnApprove</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select name="status" class="form-control formmrgin" id="status" >
                      <option value="">- Active Status-</option>
                      <option value="0">Pending</option>
                      <option value="1" >Active</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select name="country" class="form-control formmrgin" name="country" id="country">
                      <option value="">--Country -- </option>
                      @foreach ($countries as $item)
                           <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3">
    <label for="from_date">From Date <span class="text-danger">*</span></label>
    <input type="date" class="form-control formmrgin" name="from_date" id="from_date" >
</div>

<div class="col-md-3">
    <label for="to_date">To Date <span class="text-danger">*</span></label>
    <input type="date" class="form-control formmrgin" name="to_date" id="to_date" >
</div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-sm-10">
                        <a href="{{route('manage-university')}}">
                            <button type="button" class="btn mr-3 btn-info d-lg-block float-end  formmrgin px-5" id="submit" value="1">Reset</button>
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-2">
                    <button type="submit" class="btn mr-3 btn-info d-lg-block float-end  formmrgin px-5" id="submit" value="1">Search</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
      <br>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Name </th>
                            <th> Country </th>
                            <th> State</th>
                            <th> Approved University</th>
                            <th> Edit</th>
                            <!-- <th> Delete</th> -->
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($results as $key => $value)
                        <tr>
                            <td>{{ $loop->index + (($results->currentPage() - 1) * $results->perPage()) + 1 }}</td>
                            <td class="text-wrap">{{ $value->university_name ?? null  }}</td>
                            <td class="text-wrap">{{ $value->country->name ?? null }}</td>
                            <td class="text-wrap">{{ $value->province->name ?? null  }}</td>
                            <td>
                                <select class="form-control approve text-center" name="approvevalue" data-id="{{ $value->id }}">
                                    <option value="">--Select--</option>
                                    <option value="1" {{ $value->is_approved == 1 ? 'selected' : '' }}>Approve</option>
                                    <option value="0" {{ $value->is_approved == 0 ? 'selected' : '' }}>Unapprove</option>
                                </select>
                            </td>
                          @can('universities.update')
                            <td class="text-end">
                                <a class="btn btn-info" href="{{ route('edit-university') }}/{{ $value->id }}" data-item-id="{{ $value->id }}">
                                    <i class="fa-solid fa-pen "></i>  </a>
                            </td>
                           @endcan
                            <!-- <td class="text-end">
                                <a class="btn btn-warning" href="{{ route('delete-university') }}/{{ $value->id }}" data-item-id="{{ $value->id }}">
                                    <i class="fa-solid fa-trash "></i>  </a>
                                
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
        function csrf(){
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
        }
       
        $('.approve').on('change', function() {
            var status = $(this).val();
            var university_id = $(this).attr("data-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('approve-university') }}",
                type: 'POST',
                data: {selectedValue:status,university_id:university_id},
                success: function(response) {
                    setTimeout(() => {
                        window.location.reload();
                   }, 1000);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
