@extends('admin.include.app')
@section('main-content')
<div class="main-content">
   <!--card section check from here-->
   <section class="college-detail-page loaded">
      <div class="my-5 ">
         <div class="row mb-2">
            <div class="col-12">
               <div class="c-detail-right">
                  <div class="row">

                  <div class="card-group">
                     <div class="card">
                        <div class="card-body myform">
                        <form id="program_filter" action="{{route('total-applied-program')}}" method="get">
                           <div class="row">
                              <div class="col-md-4">
                              <input type="text" class="form-control formmrgin" name="first_name" id="first_name" placeholder="Search By  Name">
                              </div>
                              <div class="col-md-4">
                              <input type="text" class="form-control formmrgin" name="email" id="email" placeholder="Search By Email">
                              </div>
                        
                              <div class="col-md-2 col-sm-12 ">
                              <button type="submit" class="btn mr-3 btn-info d-lg-block float-end  formmrgin px-5 mx-2" id="submit" value="1">Search</button>

                              </div>
                              <div class="col-md-2 col-sm-12 ">
                              <a href="{{route('total-applied-program')}}" class="btn mr-3 btn-info d-lg-block float-end  formmrgin px-5 mx-2">
                                 Reset
                              </a>
                              </div>
                           </div>

                        </form>
                        </div>
                     </div>
                  </div>
                     <div class="col-md-12 my-4" id="financials">
                        <div class="r-w-s">
                           <h3 class="mb-20 c-desc-t-h-r">Applied Program List</h3>
                           <div class="row">
                              <div class="col-md-12 table-responsive">
                                 <table class="table table-hover">
                                    <thead>
                                       <tr>
                                          @php
                                          $user = Auth::user();
                                          $users = App\Models\User::where('id', $user->id)->first();
                                          @endphp
                                          <th>Application Id</th>
                                          @if(($users->hasRole('Administrator')) || ($users->hasRole('agent')))
                                          <th>Applied On</th>
                                          @endif

                                          @if(($users->hasRole('Administrator')) || ($users->hasRole('agent')))
                                          <th>Created By</th>
                                          @endif                
                                          <th>Student Name</th>
                                          <th>University Name</th>
                                          <th>Program Name</th>
                                          <th>Payment Status</th>
                                          <th> Status</th>
                                          <th>Delete</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                      @if (!empty($program_applied) && is_iterable($program_applied))
                                       @foreach ($program_applied as $index => $item)
                                    
                                       <tr>
                                          <td><a href="">{{$item->app_id}}</a></td>
                                          @if(($users->hasRole('Administrator')) || ($users->hasRole('agent')))
                                          <td>{{$item->created_at}}</td>
                                          @endif
                                          @php
                                          $users =Auth::User();
                                          $user = App\Models\User::where('id',$item->assigned_to)->pluck('email')->first();
                                          $frenchise = App\Models\User::where('id',$item->added_by_agent_id)->pluck('email')->first();
                                          @endphp

                                          @if (($users->hasRole('agent')) || ($users->hasRole('Administrator')))
                                          <td>
                                             @if(!empty($item->assigned_to))
                                             @if(($users->hasRole('Administrator')) || ($users->hasRole('agent')))
                                             @if($item->assigned_to == $item->added_by_agent_id)
                                             {{$frenchise ?? ''}} <br>
                                             @else
                                             Frenchise: {{$frenchise ?? ''}} <br>
                                             Sub Agent : {{$user ?? ''}}
                                             @endif
                                             @endif
                                             @endif
                                          </td>
                                          @endif
                                          <td>{{$item->name}}</td>
                                          <td><a class="text-success" href="{{url('university_details')}}/{{$item->program->university_name->id ?? null}}">{{$item->program->university_name->university_name ?? null}}</a></td>
                                          <td><a class="text-info" href="{{route('course-details')}}/{{$item->program->id ?? null}}">{{$item->program->name ?? null}}</a> </td>
                                          <td>
                                             @if((!empty($item->payments->payment_status) == 'success'))
                                             {{'Success'}}
                                             @else
                                             {{'Pending'}}
                                             @endif
                                          </td>

                                          @php 
                                             // Retrieve the course status data
                                             $table_data = DB::table('tbl_three_sixtee_course_status')
                                                            ->where('user_id', $item->user_id)
                                                            ->where('course_id', $item->program_id)
                                                            ->select('user_id', 'sba_id', 'course_id', 'course_remarks')
                                                            ->first();
                                             
                                             // Retrieve the visa application data
                                             $table_dataa = DB::table('tbl_three_sixtee')
                                                               ->where('user_id', $item->user_id)
                                                               ->where('cource_details', $item->program_id)
                                                               ->select('application', 'visa_application', 'cource_details',)
                                                               ->first();
                                          @endphp

                                          <td>
                                             @if(!empty($table_data))
                                                @php
                                                      $course_remarks = $table_data->course_remarks ?? 'N/A';
                                                      $course_remarks_color = 'black'; // Default color
                                                      
                                                      // For course_remarks
                                                      if (strtolower($course_remarks) == 'Accepted') {
                                                         $course_remarks_color = 'green'; // Accepted color
                                                      } elseif (strtolower($course_remarks) == 'rejected') {
                                                         $course_remarks_color = 'red'; // Rejected color
                                                      } elseif (strtolower($course_remarks) == 'case_closed') {
                                                         $course_remarks_color = 'blue'; // Case closed color
                                                      }
                                                      elseif (strtolower($course_remarks) == 'student_rejected') {
                                                         $course_remarks_color = 'red'; // Case closed color
                                                      }
                                                @endphp

                                                <!-- Display course_remarks with color -->
                                                <span style="color: {{ $course_remarks_color }};">
                                                      App- {{ $course_remarks }} <br>
                                                </span>
                                             @else
                                                <span style="color: black;">App- N/A <br></span>
                                             @endif

                                             @if(!empty($table_dataa))
                                                @php
                                                      $visa_application = $table_dataa->visa_application ?? 'N/A';
                                                      $visa_application_color = 'black'; // Default color

                                                      // For visa_application
                                                      if (strtolower($visa_application) == 'Accepted') {
                                                         $visa_application_color = 'green'; // Accepted color
                                                      } elseif (strtolower($visa_application) == 'rejected') {
                                                         $visa_application_color = 'red'; // Rejected color
                                                      }
                                                @endphp

                                                <!-- Display visa_application with color -->
                                                <span style="color: {{ $visa_application_color }};">
                                                      Visa- {{ $visa_application }}
                                                </span>
                                             @else
                                                <span style="color: black;">Visa- N/A</span>
                                             @endif
                                          </td>



                                          <td>
                                             <a class="btn btn-info" href="{{route('delete-program',[$item->id])}}" style="margin-top:5px;"><i class="fa-solid fa-trash"></i></a>
                                          </td>
                                       </tr>
                                       @endforeach
                                      @else
    <tr>
        <td colspan="10" class="text-center text-muted">No applications found.</td>
    </tr>
@endif
                                    </tbody>
                                 </table>
                              </div>
                             @if (!empty($program_applied) && $program_applied instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                {{ $program_applied->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endif
                             
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        
         </div>
      </div>
   </section>
</div>
@endsection