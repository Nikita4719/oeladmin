@extends('frontend.layouts.main')
@section('title', 'Universities')
@section('content')

<section>
    <div class="university_title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-mg-12 col-xs-12 col-sm-12">
                    <!-- <div class="university_airplane d-flex justify-content-center">
                        <img src="{{asset('frontend/img/gif in blue (1)_1 1.png')}}" alt="gif">
                    </div> -->
                    <div class="universities_heading text-center">
                        <h1 class="fw-bold">OEL / Universities</h1>
                    </div>
                </div>
                <form class="breadcrumbs-text white-color" id="filter_form" action="{{url('universities')}}" method="get" novalidate="novalidate">
                    <div class="search_dropdown d-flex justify-content-around mt-5">
                            <div class="">

                                <!-- <select class="form-select"  name="country" aria-label="Default select example"> -->

                               <select class="js-example-placeholder-single form-select js-states form-control" name="country" id="country_search">


                                    <option value="">--Select Country--</option>
                                    @foreach ($country as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="">
                                <!-- <select class="form-select"  name="university_id" aria-label="Default select example"> -->
                                <select class="js-example-placeholder-single form-select js-states form-control" name="university_id" id="university_search">


                                    <option value="">--Select University--</option>
                                    @foreach ($universities as $item)
                                    <option value="{{$item->id}}">{{ Str::limit($item->university_name, 15, '...')}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="dropdown">
                            <button class="serch_btn border-0 text-white rounded">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="university_courses_home mt-5">
        <div class="container">
            <div class="coures_head text-center ">
                <h3 class="fw-bold">Most Viewed Courses</h3>
            </div>
            <div class="coueses_img gap-3 mt-5">
                <div class="row" id="university-data">

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('javascript_section')


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
           function csrf() {
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
           }
           let pages = 2;
           let current_page = 0;
           let bool = false;
           $(window).scroll(function() {
               let height = 1500;
               if ($(window).scrollTop() + $(window).height() >= height && bool == false ) {
                   bool = true;
                   $('.ajax-load').show();
                   lazyLoad(pages)
                       .then(() => {
                           bool = false;
                           pages++;
                           // $('.no-data').show();
                       })
               }
           })
           function getParams() {
               const urlParams = new URLSearchParams(window.location.search);
               return urlParams.toString();
           }
           function lazyLoad(page) {
               return new Promise((resolve, reject) => {
                   $.ajax({
                       url: `?page=${page}&${getParams()}`,
                       type: 'GET',
                       beforeSend: function() {
                           $('.ajax-load').show();
                       },
                       success: function(response) {
                           $('.ajax-load').hide();
                           let html = '';
                           if (response.data.data.length == 0) {
                               $('.ajax-load').hide();
                               $('.no-data').show();
                               return;
                           }
                           $.each(response.data.data, function(index, item) {
                              var url_param =getParams();
                              var assetBaseUrl = "{{ asset('') }}/";
                              html += `
                                  <div class="col-lg-3 col-md-6 col-xs-12 col-sm-12 col-12">
                                    <div class="courses_int_img bg-white img-mx px-3 py-4 rounded">
                                        <img src="${assetBaseUrl}${item.thumbnail ?? ''}" alt="university"  style="max-height:150px;min-height:150px">
                                        <div class="course_name mt-4">
                                            <span class="fw-light">${item.country?.name ?? ''}</span>
                                            <h4 class="fw-bold">${item.university_name}</h4>
                                            <p style="margin-bottom:0px !important"><i class="fa fa-map" style ="color:#fcb903"></i> Location:${item.country?.name ?? ''}, ${item.province?.name},${item.city},${item.zip}</p>
                                            <p style="margin-bottom:0px !important"><i class="fa fa-flag" style ="color:#fcb903"></i> Country:${item.country?.name ?? ''}</p>
                                            <p style="margin-bottom:0px !important"><i class="fa fa-list" style ="color:#fcb903"></i> University Type:${item.university_type?.name}</p>
                                            <div class="right_click d-flex justify-content-between align-items-center  ">
                                                <div class="king">
                                                    <!-- <span>Kingdom</span> -->
                                                </div>
                                                <div class="details mt-3">
                                                    <a href="{{url('university-details')}}/${item.id}">View Details</a><i class="fa-solid fa-arrow-right mx-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                           });
                           $('#university-data').append(html);
                           resolve();
                       }
                   });
               })
           }
           loadData(1);
           function loadData(page) {
               $.ajax({
                   url: `?page=${page}&${getParams()}`,
                   type: 'GET',
                   beforeSend: function() {
                       $('.ajax-load').show();
                   },
                   success: function(response) {
                       $('.ajax-load').hide();
                       let html = '';
                       if (response.data.data.length == 0) {
                               $('.ajax-load').hide();
                               $('.no-data').show();
                               return;
                       }
                       $.each(response.data.data, function(index, item) {
                               var url_param =getParams();
                               var assetBaseUrl = "{{ asset('') }}/";
                               html += `
                                <div class="col-lg-3 col-md-6 col-xs-12 col-sm-12 col-12">
                                    <div class="courses_int_img img-mx bg-white px-3 py-4 rounded">
                                        <img src="${assetBaseUrl}${item.thumbnail ?? ''}" alt="university"  style="max-height:150px;min-height:150px">
                                        <div class="course_name mt-4">
                                            <span class="fw-light">${item.country?.name ?? ''}</span>
                                            <h4 class="fw-bold">${item.university_name}</h4>
                                            <p style="margin-bottom:0px !important"><i class="fa fa-map" style ="color:#fcb903"></i> Location:${item.country?.name ?? ''}, ${item.province?.name},${item.city},${item.zip}</p>
                                            <p style="margin-bottom:0px !important"><i class="fa fa-flag" style ="color:#fcb903"></i> Country:${item.country?.name ?? ''}</p>
                                            <p style="margin-bottom:0px !important"><i class="fa fa-list" style ="color:#fcb903"></i> University Type:${item.university_type?.name}</p>
                                            <div class="right_click d-flex justify-content-between align-items-center  ">
                                                <div class="king">
                                                    <!-- <span>Kingdom</span> -->
                                                </div>
                                                <div class="details mt-3">
                                                    <a href="{{url('university-details')}}/${item.id}">View Details</a><i class="fa-solid fa-arrow-right mx-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                       });
                       $('#university-data').append(html);
                   }
               });
           }
       });
             
             
             $("#country_search").select2({
            placeholder: "Select Country",
            allowClear: true
       });
       $("#university_search").select2({
            placeholder: "Select university",
            allowClear: true
       });

         $("#program_search").select2({
            placeholder: "Select Program",
            allowClear: true
        });
</script>
@endsection
