@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Manage Country
                        </li>
                    </ol>
                </div>
                @can('country.create')
                    <div class="col-md-4">
                        <a href="{{ route('create-country') }}" class="btn add-btn float-end">
                            <i class="las la-plus"></i>Create New country</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="card-group">
      <div class="card">
        <div class="card-body myform">
          <form id="eudcation" action="{{route('country')}}" method="get" >
            <div class=" row d-flex justify-content-start align-items-center">
            <div class="col-md-5 ps-3">
                <div class="form-floating ">
                    <input id="lead-total_credits" name="name" type="text" class="form-control " placeholder="NAME" >
                    <label for="lead-total_credits" class="form-label">NAME</label>
                </div>
            </div>
            <div class="col-md-4 row">
            <div class="col ps-2">
              <button type="submit" class="btn btn-info w-100 float-end" id="submit" value="1">Search</button>
            </div>
            <div class="col ps-2">
                <a href="{{route('country')}}" class="btn btn-info w-100">
                    Reset
                </a>
            </div>
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
                        <th>Name</th>
                        <th>Country Code</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($country as $item)
                    <tr>
                        <td>{{ $loop->index + (($country->currentPage() - 1) * $country->perPage()) + 1 }}</td>
                        <td class="text-wrap">{{ $item->name }}</td>
                        <td class="text-wrap">{{ $item->country_code }}</td>
                        <td>
                             <div class="form-check form-switch">
                                <input class="form-check-input flexSwitchCheckChecked" data-id="{{$item->id}}" type="checkbox" role="switch" {{ $item->is_active == '1' ? 'checked' : '' }}>
                            </div>
                        </td>
                        @can('country.update')
                        <td><a  href="{{route('edit-country',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('country.delete')
                        <td><a href="{{route('delete-country',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="py-4 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$country->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/jquery-3.7.1.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.flexSwitchCheckChecked').change(function(){
            var isChecked = $(this).prop("checked");
            var id = $(this).attr("data-id");
            var status = isChecked ? "1" : "0";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('activeInactiveCountry') }}",
                type: 'POST',
                data: { status: status,id:id },
                success: function(response) {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
