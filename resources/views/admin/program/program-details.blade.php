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
                            <li class="breadcrumb-item text-muted">Program  / Courses Details</li>
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
        <div class="card-group">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                           <!-- //TODO: This task is not working after adding this code -->
                           <!-- Commented code to work this task in future -->
                           <div class="table-responsive">
                              <table class="table table-hover no-wrap">
                                 <tbody>
                                    <tr>
                                       <th class="txt-oflo">Previous Data</th>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Name</th>
                                       <td class="txt-oflo">{{$program->name}}</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Description</th>
                                       <td class="txt-oflo text-wrap">
                                        {!! $program->details !!}</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">University</th>
                                       <td class="txt-oflo">{{$program->school->univerisity_name}}</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Program Level</th>
                                       <td class="txt-oflo">
                                          {{$program->educationLevel->name ?? null }}
                                       </td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Duration</th>
                                       {{-- <td class="txt-oflo">{{$program->}}</td> --}}
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Application Fee</th>
                                       <td class="txt-oflo">85</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Tution Fee</th>
                                       <td class="txt-oflo">50928</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Currency</th>
                                       <td class="txt-oflo">USD</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Intake</th>
                                       <td class="txt-oflo">SEP</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Education Level</th>
                                       <td class="txt-oflo">
                                          Undergraduate
                                       </td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Minimum GPA</th>
                                       <td class="txt-oflo">4.18</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Other Requirements</th>
                                       <td class="txt-oflo">null</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Extra Notes</th>
                                       <td class="txt-oflo"></td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Is Most Viewed</th>
                                       <td class="txt-oflo">
                                          Yes
                                       </td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Type of Program</th>
                                       <td class="txt-oflo">Full Time</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Program Campus</th>
                                       <td class="txt-oflo">On Campus</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Language Specification</th>
                                       <td class="txt-oflo">IELTS</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Field of Study Type</th>
                                       <td class="txt-oflo">
                                          Master
                                       </td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Total Credits</th>
                                       <td class="txt-oflo">null</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Apply Date</th>
                                       <td class="txt-oflo">2022-12-29</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Closing Date</th>
                                       <td class="txt-oflo">2023-02-21</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Subjects</th>
                                       <td class="txt-oflo">
                                          <ul class="list_items">
                                          </ul>
                                       </td>

                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Scholarships</th>
                                       <td class="txt-oflo">
                                          <ul class="list_items">
                                             <li>
                                                University of Michigan Scholarships
                                             </li>
                                          </ul>
                                       </td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Grading Scheme</th>
                                       <td class="txt-oflo">
                                          Other
                                       </td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Related Programs</th>
                                       <td class="txt-oflo">
                                          <ul class="list_items">
                                          </ul>
                                       </td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Tags</th>
                                       <td class="txt-oflo"></td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo">Priority</th>
                                       <td class="txt-oflo">0</td>
                                    </tr>
                                    <tr>
                                       <th class="txt-oflo"></th>
                                       <td class="txt-oflo"></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
    </div>

    <div class="row">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

@endsection
