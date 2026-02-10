@extends('admin.include.app')
@section('main-content')
<div class="main-content">
   <!--card section check from here-->
   <section class="college-detail-page loaded">
      <div class="my-5 container">
         <div class="row mb-2">
            <div class="col-12">
               <div class="c-detail-right">
                  <div class="row">
                     <div class="col-md-12 my-4" id="financials">
                        <div class="r-w-s">
                           <h3 class="mb-20 c-desc-t-h-r">Applied Program List</h3>
                           <div class="row">
                              <div class="col-md-12 table-responsive">
                                 <table class="table table-hover">
                                    <thead>
                                       <tr>
                                          <th>Application Id</th>
                                          <th>Applied On</th>
                                          <th>University Name</th>
                                          <th>Program Name</th>
                                          <th>Payment Status</th>                                     
                                          <th> Status</th>
                                          <th> Application-Details</th>
                                          <th>Delete</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($program_applied as $item)

                                       <tr>
                                          <td><a href="">{{$item->app_id}}</a></td>
                                          <td>{{$item->created_at}}</td>
                                          <td><a class="text-success" href="{{url('university_details')}}/{{$item->program->university_name->id ?? null}}">{{$item->program->university_name->university_name ?? null}}</a></td>
                                          <td><a class="text-info" href="{{route('course-details')}}/{{$item->program->id ?? null}}">{{$item->program->name ?? null}}</a> </td>
                                          <td>
                                             @if((!empty($item->payments->payment_status) == 'success'))
                                             {{'Success'}}
                                             @else
                                             {{'Pending'}}
                                             @endif
                                          </td>
                                         
                                         
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
                                             <a class="btn btn-info" data-toggle="tooltip" title="Application Details" href="{{route('apply-program-payment',[App\Models\Student::where('user_id',$item->user_id)->first()->id,$item->program_id,$item->intake_month,$item->intake_year])}}" style="margin-top:5px;"><i class="fa fa-info"></i></a>
                                          </td>
                                          <td><a class="btn btn-info" href="{{route('delete-program',[$item->id ?? ''])}}" style="margin-top:5px;"><i class="fa-solid fa-trash"></i></a>
                                         
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                              <div class="col-md-12">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--nus-->
         </div>
      </div>
   </section>
</div>
@endsection