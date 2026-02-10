@extends('admin.include.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
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
                            <li class="breadcrumb-item text-muted">Manage Program / Courses</li>
                        </ol>
                    </div>
                    @can('programs.create')
                    <div class="col-md-2">
                        <a href="{{ route('add-program') }}" class="btn add-btn">
                            <i class="las la-university"></i>Add Program </a>
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
    </div>
    <div class="row">
        <div class="card-group">
          <div class="card">
            <div class="card-body myform">
              <form id="program_filter" action="{{route('program-filter')}}" method="get">
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" class="form-control formmrgin" name="program_name" id="program_name" placeholder="Search By Program Name">
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control formmrgin" name="univerisity_name" id="university_name" placeholder="Search By University Name">
                  </div>
                  <div class="col-md-4">
                    <select name="approve_status" class="form-control formmrgin" id="approve">
                      <option>-Select Approval-</option>
                      <option value="approve">Approve</option>
                      <option value="unapprove">UnApprove</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 ">
                  <button type="submit" class="btn mr-3 btn-info d-lg-block float-end  formmrgin px-5 mx-2" id="submit" value="1">Search</button>
                   <a href="{{route('manage-program')}}" class="btn mr-3 btn-info d-lg-block float-end  formmrgin px-5 mx-2">
                       Reset
                   </a>
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
                            <th>ProgramName </th>
                            <th>UniversityName </th>
                           
                            <th>ProgramLevel</th>
                            <th>ApproveStatus</th>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($program as $item)
                        <tr>
                            <td>{{ $loop->index + (($program->currentPage() - 1) * $program->perPage()) + 1 }}</td>
                            <td> {{ implode(' ', array_slice(explode(' ', $item->name), 0, 6)) }}</td>
                            <td>{{$item->school->university_name ?? null}}</td>
                            <td>{{$item->programLevel->name ?? null}}</td>
                            {{-- <td>
                                @if($item->grading_scheme_id == 1)
                                    Primary
                                @elseif($item->grading_scheme_id == 2)
                                    Secondary
                                @elseif($item->grading_scheme_id == 3)
                                    Graduate
                                @elseif($item->grading_scheme_id == 4)
                                    Undergraduate
                                @endif
                            </td> --}}
                            <td>
                                @if ($item->is_approved == 1)
                                   {{'Approved'}}
                                @else
                                   {{'UnApproved'}}
                                @endif
                            </td>
                            <!-- <td scope="col">
                                <a href="" class="btn btn-primary btn-sm mx-1 score_program_id"   program-id="{{$item->id}}" data-tour="search"
                                data-bs-toggle="offcanvas" data-bs-target="#gmat"
                                aria-controls="gmat"><i class="la la-plus"></i>Score</a>
                            </td> -->
                            <td scope="col"><a class="btn btn-primary btn-sm mx-1" href="{{route('edit-score-program',$item->id)}}"><i class="la la-plus"></i>Score</a></td>

                            <td scope="col">
                                <a href="" class="btn btn-primary btn-sm mx-1 commission_modal"
                                data-tour="search" program-id="{{$item->id}}"   data-bs-toggle="offcanvas" data-bs-target="#testscrores"
                                aria-controls="testscrores"> <i class="la la-plus"></i>
                                Commission</a>
                            </td>
                            @can('programs.create')
                            <td><a class="btn btn-info" href="{{route('edit-program',$item->id)}}"><i class="la la-pen"></i></a></td>
                            @endcan
                        </tr>
                        <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="testscrores">
                            <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
                                <div class="sidebar-headersets">
                                    <h5>Commission for MBA - (INTERNATIONAL LEADERSHIP)</h5>
                                </div>
                                <div class="sidebar-headerclose">
                                    <a data-bs-dismiss="offcanvas" aria-label="Close">
                                        <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                                    </a>
                                </div>
                            </div>
                            <div class="offcanvas-body">
                                <div class="responseMessage"></div>
                                <div class="row">
                                    <div class="card-stretch-full">
                                        <div class="row g-4">
                                            <form class="row g-4" id="commission-data">
                                             <input type="hidden"   name="program_commission_id">
                                                <div class="col-12">
                                                   <div class="form-floating">
                                                    <input id="usr-commission" name="commission" type="number" class="form-control commission" placeholder="Program Commission (In Percentage)" autocomplete="commission" >
                                                    <label for="usr-commission" class="form-label">Program Commission (In Percentage)</label>
                                                    <span class="text-danger error-commission"></span>
                                                   </div>
                                                </div>
                                                <div class="col-12">
                                                   <div class="form-floating">
                                                    <input id="usr-commission_for_program_payment_to_franchise"  name="commission_for_program_payment_to_franchise" type="number" class="form-control commission_for_program_payment_to_franchise" placeholder="Commission to Franchise when student pays (In Percentage)" autocomplete="commission_for_program_payment_to_franchise" ><label for="usr-commission_for_program_payment_to_franchise" class="form-label">Commission to Franchise when student pays (In Percentage)</label>
                                                    <span class="text-danger error-commission_for_program_payment_to_franchise"></span>
                                                   </div>
                                                </div>
                                                <div class="col-12">
                                                   <div class="form-floating">
                                                    <input id="usr-commission_for_added_program_payment_to_franchise"   name="commission_for_added_program_payment_to_franchise" type="number" class="form-control commission_for_added_program_payment_to_franchise" placeholder="Commission to Franchise for Program/University added (In Percentage)" autocomplete="commission_for_added_program_payment_to_franchise" ><label for="usr-commission_for_added_program_payment_to_franchise" class="form-label">Commission to Franchise for Program/University added (In Percentage)</label>
                                                    <span class="text-danger error-commission_for_added_program_payment_to_franchise"></span>
                                                   </div>
                                                </div>
                                                <div class="col-12">
                                                   <div class="form-floating">
                                                    <input id="usr-commission_for_program_payment_to_counselor"    name="commission_for_program_payment_to_counselor" type="number" class="form-control commission_for_program_payment_to_counselor" placeholder="Commission to Counselor for Program/University added (In Percentage)" autocomplete="commission_for_program_payment_to_counselor" ><label for="usr-commission_for_program_payment_to_counselor" class="form-label">Commission to Counselor for Program/University added (In Percentage)</label>
                                                    <span class="text-danger error-commission_for_program_payment_to_counselor"></span>
                                                   </div>
                                                </div>
                                             </form>
                                            <div class="col-md-12"><button type="button"
                                                class="btn btn-info  py-6 commission">Submit</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                            {{$program->withQueryString()->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{-- gmat score  --}}
     <div class="offcanvas offcanvas-end border-0 " tabindex="-1" id="gmat">
        <div class="sidebar-headerset" style="  box-shadow: 0 1.6rem 3rem rgba(0,0,0,.1);">
            <div class="sidebar-headersets">
                <h5>Required Score for MBA - (INTERNATIONAL LEADERSHIP)</h5>
            </div>
            <div class="sidebar-headerclose">
                <a data-bs-dismiss="offcanvas" aria-label="Close">
                    <img src="{{ url('assets/img/close.png') }}" alt="Close Icon">
                </a>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="responseMessage"></div>
            <div class="row">
                <div class="card-stretch-full">
                    <div class="row g-4">
                        <form class="row g-4" id="score-data">
                            <div class="col-12">
                                <input type="hidden" name="program_id">
                                <div class="form-floating">
                                    <select class="form-control eng_prof_level" name="type" id="usr-fees_type" placeholder="Type" required>
                                        <option value="">--- Select Type ---</option>
                                        @foreach ($eng_proficiency_level as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="usr-fees_type" class="form-label">Type</label>
                                    <span class="text-danger error-type"></span>
                                </div>
                            </div>
                            <input type="hidden" name="eng_prof_level_score" value="" id="eng_prof_level_score">
                            <div class="col-12 remark-section" style="display: none;">
                                <div class="form-floating">
                                    <input id="usr-remarks" name="remarks" type="text" class="form-control" placeholder="Remarks">
                                    <label for="usr-remarks" class="form-label">Remarks</label>
                                    <span class="text-danger error-remarks"></span>
                                </div>
                            </div>
                            <div class="score-section">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input id="usr-listening_score" name="listening_score" max="120" type="number" class="form-control eng_prof_score" placeholder="Listening Score" autocomplete="listening_score" required>
                                        <label for="usr-listening_score" class="form-label">Listening Score</label>
                                        <span class="text-danger error-listening_score"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input id="usr-writing_score" name="writing_score" type="number" max="120" class="form-control eng_prof_score" placeholder="Writing Score" autocomplete="writing_score" required>
                                        <label for="usr-writing_score" class="form-label">Writing Score</label>
                                        <span class="text-danger error-writing_score"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input id="usr-reading_score" name="reading_score" max="120" type="number" class="form-control eng_prof_score" placeholder="Reading Score" autocomplete="reading_score" required>
                                        <label for="usr-reading_score" class="form-label">Reading Score</label>
                                        <span class="text-danger error-reading_score"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input id="usr-speaking_score" name="speaking_score" type="number" max="120" class="form-control eng_prof_score" placeholder="Speaking Score" autocomplete="speaking_score" required>
                                        <label for="usr-speaking_score" class="form-label">Speaking Score</label>
                                        <span class="text-danger error-speaking_score"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input id="usr-overall_score" name="overall_score" type="number" max="120" class="form-control " placeholder="Overall Score" autocomplete="overall_score" required>
                                        <label for="usr-overall_score" class="form-label">Total Score</label>
                                        <span class="text-danger error-overall_score"></span>
                                    </div>
                                </div>

                            </div>
                            </form>
                        <div class="col-md-12"><button type="button"
                            class="btn btn-info  py-6 score">Submit</button></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Type</th>

                            <th>Listening Score</th>
                            <th>Writing Score</th>
                            <th>Reading Score</th>
                            <th>Speaking Score</th>
                            <th>OverAll Score</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="score-table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
     {{-- test Score --}}

@endsection
@section('scripts')
    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.getElementById('usr-fees_type');
            const scoreSection = document.querySelector('.score-section');
            const remarkSection = document.querySelector('.remark-section');

            typeSelect.addEventListener('change', function() {
                if (this.value === '9') {
                    scoreSection.style.display = 'none';
                    remarkSection.style.display = 'block';
                } else {
                    scoreSection.style.display = 'block';
                    remarkSection.style.display = 'none';
                }
            });
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
            $('.commission_modal').on('click', function(event) {
                $('#commission-data')[0].reset();
                var program_id =$(this).attr('program-id');
                $('input[name="program_commission_id"]').val(program_id);
                setupCSRF();
                $.ajax({
                    url: '{{ route('get-program-commission') }}',
                    type: 'post',
                    data: {program_id:program_id},
                    success: function(response) {
                        $('.commission').val(response.data.commission);
                        $('.commission_for_program_payment_to_franchise').val(response.data.commission_for_program_payment_to_franchise);
                        $('.commission_for_added_program_payment_to_franchise').val(response.data.commission_for_added_program_payment_to_franchise);
                        $('.commission_for_program_payment_to_counselor').val(response.data.commission_for_program_payment_to_counselor);
                    },

                });
            })
            $('.score_program_id').on('click', function(event) {
                $('#score-data')[0].reset();
                var program_id =$(this).attr('program-id');
                $('input[name="program_id"]').val(program_id);
                fetchscore(program_id);
            })
            $('.commission').on('click', function(event) {
                event.preventDefault();
                $('.commission').addClass('disabled');
                var program_id =  $('input[name="program_commission_id"]').val();
                var formData = $('#commission-data').serialize();
                formData += '&program_id=' + program_id;
                setupCSRF();
                $.ajax({
                    url: '{{ route('update-program-commission') }}',
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        if (response.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success...',
                                text: response.success,
                            }).then((result) => {
                                if (result.value) {
                                    setTimeout(function() {
                                        location.reload();
                                    }, 100);
                                }
                            });
                        }
                        $('.commission').removeClass('disabled');
                        $('#commission-data')[0].reset();
                    },
                    error: function(xhr) {
                        var response = JSON.parse(xhr.responseText);
                        if(response.errors && response.errors.type){
                            $('.error-commission').html(response.errors.type);
                        }else{
                            $('.error-commission').html('');
                        }
                        if(response.errors && response.errors.listening_score){
                            $('.error-commission_for_program_payment_to_franchise').html(response.errors.listening_score);
                        }else{
                            $('.error-commission_for_program_payment_to_franchise').html('');
                        }
                        if(response.errors && response.errors.writing_score){
                            $('.error-commission_for_added_program_payment_to_franchise').html(response.errors.writing_score);
                        }else{
                            $('.error-commission_for_added_program_payment_to_franchise').html('');
                        }
                        if(response.errors && response.errors.reading_score){
                            $('.error-commission_for_program_payment_to_counselor').html(response.errors.reading_score);
                        }else{
                            $('.error-commission_for_program_payment_to_counselor').html('');
                        }
                    }
                });
            });
            function fetchscore(program_id) {
                $('.score-table').empty();
                setupCSRF();
                $.ajax({
                    url: "{{ route('fetch-req-score-prog') }}",
                    method: 'get',
                    data: {
                        program_id: program_id
                    },
                    success: function(response) {
                        
                        var score =response.data;
                        
                        if ($.isEmptyObject(response)) {
                            $('.score-table').append('<option value="">No records found</option>');
                        } else {
                            $.each(score, function(key, value) {
                                $('.score-table').append('<tr><td>' +
                                    (key + 1) + '</td><td>' +
                                    value.name + '</td><td>' +
                                    value.listening_score + '</td><td>' +
                                    value.writing_score + '</td><td>' +
                                    value.reading_score + '</td><td>' +
                                    value.speaking_score + '</td><td>' +
                                    value.overall_score + '</td><td>' +
                                    value.remarks + '</td><td><a href="#" class="btn btn-warning btn-danger edit-score" data-id="'+value.id+'"><i class="la la-edit"></i></a></td><td><a href="#" class="btn btn-warning btn-danger delete-score" data-id="'+value.id+'"><i class="la la-trash"></i></a></td></tr>');
                            });
                        }
                    }
                }).then(function(){

                    $('.delete-score').on('click', function(e){
                        e.preventDefault();
                        var score_id = $(this).data('id');
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                setupCSRF();
                                $.ajax({
                                    url: "{{ route('delete-score-program') }}",
                                    method: 'get',
                                    data: {
                                        score_id: score_id
                                    },
                                    success: function(response){
                                        Swal.fire(
                                            'Deleted!',
                                            'Score has been deleted.',
                                            'success'
                                        );
                                        fetchscore();
                                    }
                                });
                            }
                        });
                    });
                }).then(function(){

                $('.edit-score').on('click', function(e){
                    e.preventDefault();
                    var score_id = $(this).data('id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, edit it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            setupCSRF();
                            $.ajax({
                                url: "{{ route('edit-score-program') }}",
                                method: 'get',
                                data: {
                                    score_id: score_id
                                },
                                success: function(response){
                                    Swal.fire(
                                        'Deleted!',
                                        'Score has been deleted.',
                                        'success'
                                    );
                                    fetchscore();
                                }
                            });
                        }
                    });
                });
                });
            }
            $('.eng_prof_level').on('change', function(){
                var eng_prof_level =$(this).val();
                $.ajax({
                    url: '{{ route('fetch-eng-prof-level-score') }}',
                    type: 'post',
                    data: {eng_prof_level: eng_prof_level},
                    success: function(response) {
                        $('#eng_prof_level_score').val(response.score.number);
                    },
                    error: function(xhr) {
                        var response = JSON.parse(xhr.responseText);
                    }
                });
            });
            $('.eng_prof_score').on('input', function() {
                var eng_prof_level = $('.eng_prof_level').val();
                if (eng_prof_level) {
                    var eng_prof_score = parseFloat($(this).val());
                    var eng_score = parseFloat($('#eng_prof_level_score').val());

                    if (eng_prof_score < 0) {
                        $(this).val(0);
                    }
                    if (eng_prof_score > eng_score) {
                        $(this).val(eng_score);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Sorry! You cannot enter greater than ' + eng_score
                        });
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please Select English Proficiency Level'
                    });
                    return false;
                }
            });
            $('.score').on('click', function(event) {
                event.preventDefault();
                var program_id = $('input[name="program_id"]').val();
                var formData = $('#score-data').serialize();
                formData += '&program_id=' + program_id;
                setupCSRF();
                $.ajax({
                    url: '{{ route('req-score-prog-add') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success...',
                                text: response.success,
                            });
                            fetchscore(response.program_id);
                            $('.score').removeClass('disabled');
                            $('#score-data')[0].reset();
                        }
                    },
                    error: function(xhr) {
                        $('.score').removeClass('disabled');
                        var response = JSON.parse(xhr.responseText);
                        handleErrors(response.errors);
                    }
                });
            });

            function handleErrors(errors) {
                $('.error-type').html('');
                $('.error-listening_score').html('');
                $('.error-writing_score').html('');
                $('.error-reading_score').html('');
                $('.error-speaking_score').html('');
                $('.error-overall_score').html('');
                if (errors && errors.type) {
                    $('.error-type').html(errors.type);
                }
                if (errors && errors.listening_score) {
                    $('.error-listening_score').html(errors.listening_score);
                }
                if (errors && errors.writing_score) {
                    $('.error-writing_score').html(errors.writing_score);
                }
                if (errors && errors.reading_score) {
                    $('.error-reading_score').html(errors.reading_score);
                }
                if (errors && errors.speaking_score) {
                    $('.error-speaking_score').html(errors.speaking_score);
                }
                if (errors && errors.overall_score) {
                    $('.error-overall_score').html(errors.overall_score);
                }
            }
        });
    </script>
@endsection
