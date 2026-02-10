@extends('admin.include.app')
@section('main-content')
<div class="page-header">
   <div class="row">
      <div class="card card-buttons">
         <div class="card-body">
            <div class="row">
               <div class="col-md-10">
                  <ol class="breadcrumb text-muted mb-0">
                     <li class="breadcrumb-item">
                     <a href="{{route('dashboard')}}"> Dashboard</a>
                     </li>
                     <li class="breadcrumb-item text-muted">Show lead</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div clas="row">
   <div class="col-md-12">
      <div class="card bg-white">
         <div class="card-header">
            <h5 class="card-title text-center">Lead Details</h5>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-6 col-sm-12">
                  <div class="details-column-lead-details">
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Name</span>
                        <span class="value-lead-details"> : {{$studentData->name ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Father Name</span>
                        <span class="value-lead-details"> : {{$studentData->father_name ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Gender</span>
                        <span class="value-lead-details"> : {{$studentData->caste_data->name ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Email</span>
                        <span class="value-lead-details"> : {{$studentData->email ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Phone Number</span>
                        <span class="value-lead-details"> : {{$studentData->phone_number ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Zip</span>
                        <span class="value-lead-details"> : {{$studentData->zip ?? ''}}</span>
                     </div>
                    
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Country</span>
                        <span class="value-lead-details"> : {{$studentData->country->name ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">State</span>
                        <span class="value-lead-details"> : {{$studentData->state->name ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Subject</span>
                        <span class="value-lead-details"> : {{$studentData->subject->subject_name ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Comments</span>
                        <span class="value-lead-details"> : {{$studentData->student_comment ?? ''}}</span>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-sm-12">
                  <div class="details-column-lead-details">
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Created By</span>
                        <span class="value-lead-details"> : {{$studentData->added_by_user->name ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Calling Date</span>
                        <span class="value-lead-details"> : {{$studentData->next_calling_date ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Lead Status</span>
                        <span class="value-lead-details"> : {{$studentData->lead_status_data->name ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Source</span>
                        <span class="value-lead-details"> : {{$studentData->source ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Date of Birth</span>
                        <span class="value-lead-details"> : {{$studentData->dob ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Working</span>
                        <span class="value-lead-details"> : {{$studentData->cand_working ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Status Study</span>
                        <span class="value-lead-details"> : {{$studentData->status_study ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Board</span>
                        <span class="value-lead-details"> : {{$studentData->board ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Month</span>
                        <span class="value-lead-details"> : {{$studentData->intake ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Year</span>
                        <span class="value-lead-details"> : {{$studentData->intake_year ?? ''}}</span>
                     </div>
                     <div class="info-item-lead-details">
                        <span class="label-lead-details">Assigned To</span>
                        <span class="value-lead-details"> : {{$studentData->assigned_to_user->email ?? ''}}</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection