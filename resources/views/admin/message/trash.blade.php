@extends('admin.include.app')
@section('style')
<style>
  .offcanvas.offcanvas-end{
    width: 35vw !important;
  }
</style>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
@section('main-content')
    <div class="row">
        <div class="card card-buttons">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb text-muted mb-0">
                            <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item text-muted">Trash </li>
                        </ol>
                    </div>
                    {{-- <div class="col-md-2">
                        <a href="{{ route('admin.create_new_lead') }}" class="btn add-btn">
                            <i class="fa-solid fa-plus"></i> Add Lead </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <div class="col-md-12">
            @php
                $users =Auth::user();
            @endphp
            <div class="table-responsive">
                <span class="text-danger error-message"></span>
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="checked_all_lead"><a class="btn btn-warning mx-4 p-2 delete-message" ><i class="fa fa-trash"></i></a></th>
                            <th>S.N</th>
                            <th> Email</th>
                            <th> Subject</th>
                            <th> Message </th>
                        </tr>
                    </thead>
                    <tbody id="lead-list">
                        @php
                            $i = ($outbox->currentPage()-1)* $outbox->perPage()+1;
                        @endphp
                        @foreach ($outbox as $data)
                            <tr>
                                <td>
                                    <input type="checkbox" class="lead-id" leads-user-id="{{$data->id}}">
                                </td>
                                <td>
                                    <a href="#">{{ $i }}</a>
                                </td>
                                @php
                                    $i++;
                                @endphp
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->subject }}</td>
                                <td>{!! $data->body !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            {{ $outbox->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
 <!-- summernotejs start -->
 <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
 <script>
     $('#summernote1').summernote({
        placeholder: ' Write Here',
        tabsize: 2,
        height: 100
    });
</script>
    <script>
        $(document).ready(function() {

            function setupCSRF() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }
            const t = document.querySelector(".checked_all_lead"),
                o = document.querySelectorAll('[type="checkbox"]');
                t.addEventListener("change", t => {
                o.forEach(e => {
                    e.checked = t.target.checked
                })
            });
            $('.delete-message').on('click', function(e) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Are you sure you want to delete permanently this message?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $('.error-message').html('');
                        $('.delete-message').addClass('disabled');
                        var selectedLeads = [];
                        $('.lead-id:checked').each(function() {
                            selectedLeads.push($(this).attr('leads-user-id'));
                        });
                        setupCSRF();
                        $.ajax({
                            url: "{{route('delete-sms-permanent')}}",
                            method: 'Post',
                            data: {
                                leadIds:selectedLeads,
                            },
                            success: function(response){
                              if(response.status == false){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message,
                                });
                              }else{
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success...',
                                    text: response.message,
                                }).then((result) => {
                                  if (result.isConfirmed) {
                                    location.reload();
                                  }
                                });
                              }
                              $('.delete-message').removeClass('disabled');
                            },
                            error: function(response){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.responseJSON.message,
                                });
                                $('.delete-message').removeClass('disabled');
                            }
                        });
                    }
                });
            });

        });
    </script>
@endsection
