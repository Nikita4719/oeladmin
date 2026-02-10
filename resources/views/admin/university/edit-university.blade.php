@extends('admin.include.app')
@section('style')


    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}">
@endsection
@section('main-content')

    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title mb-0"> Add/Edit University </h4>
        </div>
        <div class="card-body">
          <div class="wizard">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Location">
                <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab" aria-controls="step1" aria-selected="true"> 1 </a>
            </li>
              <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Basic ">
                <a class="nav-link  rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab" aria-controls="step2" aria-selected="false"> 2</a>
              </li>
              <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Ranking">
                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step3" aria-selected="false"> 3 </a>
              </li>
              <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Accerediation">
                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step4" id="step4-tab" data-bs-toggle="tab" role="tab" aria-controls="step4" aria-selected="false"> 4 </a>
              </li>
              <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Documents">
                <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center" href="#step5" id="step5-tab" data-bs-toggle="tab" role="tab" aria-controls="step5" aria-selected="false"> 5 </a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                    <div class="mb-4 title-section-adss">
                      <h3> Location </h3>
                    </div>
                    <h2 class="text-danger university_error hr"></h2>
                    <form>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="input-block mb-3">
                            <label for="basicpill-pancard-input" class="form-label" placeholder="Address 1"> Country name <span class="text-danger">*</span></label>
                            <select class="form-control country" name="country_id" >
                                <option value="">-- Select Country  --</option>
                                  @foreach ($countries as $item)
                                     <option value="{{$item->id}}" {{ ($university->country_id ?? old('country_id')) == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                  @endforeach
                             </select>
                             <span class="text-danger country_id"></span>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="input-block mb-3">
                            <label for="basicpill-vatno-input" class="form-label">State/Provision<span class="text-danger">*</span></label>
                            @php
                                $state = DB::table('province')
                                    ->where('id', $university->state ?? null)
                                    ->first();

                                
                            @endphp
                            <select name="province_id"
                                class="form-control province_id" required>
                                <input type="hidden" name="province" value="{{$university->state ?? null}}" class="province">
                                @if (!empty($university->state))
                                    <option value="{{ $university->state }}"
                                        {{ ($university->state ?? old('province_id')) == $state->id ? 'selected' : '' }}>
                                       </option>
                                @endif
                            </select>
                            <span class="text-danger province"></span>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="input-block mb-3">
                            <input type="hidden" name="tab1" value="tab1">
                            <input type="hidden" name="university_id" class="university_id" value="{{$university->id ?? null }}" >
                            <label for="basicpill-cstno-input" class="form-label"> City<span class="text-danger">*</span></label>
                            <input type="text" class="form-control " name="city" value="{{$university->city ?? null}}" placeholder="City" >
                            <span class="text-danger city"></span>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="input-block mb-3">
                            <label for="basicpill-servicetax-input" class="form-label"> Location <span class="text-danger">*</span></label>
                            <input type="text" class="form-control " name="university_location" value="{{$university->university_location ?? null}}" placeholder="Location" >
                            <span class="text-danger university_location"></span>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="input-block mb-3">
                            <label for="basicpill-servicetax-input" class="form-label"> Zip <span class="text-danger">*</span></label>
                            <input type="text" class="form-control " placeholder="Zip" name="zip" value="{{$university->zip ?? null}}">
                            <span class="text-danger zip"></span>
                          </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-block mb-3">
                                <label for="basicpill-servicetax-input" class="form-label">URL</label>
                                <input type="text" class="form-control  google-iframe-url" name="map_location" placeholder="Enter the Google Maps iframe URL here" value="{{$university->map_location ?? null}}">
                                <span class="text-danger map_location"></span>
                              </div>
                        </div>
                        <div class="col-lg-8 mt-2">
                            <div class="input-block mb-3">
                                <label for="map-iframe" class="form-label">Map</label>
                                <iframe id="map-iframe" width="75vw" height="200" frameborder="0" style="border:0;width:75vw" allowfullscreen></iframe>
                            </div>
                        </div>
                      </div>
                    </form>
                    <div class="d-flex">
                        <a class="btn btn btn-primary next">Next<span
                            class="spinner-grow spinner-grow-sm d-none" role="status"
                            aria-hidden="true"></span>
                        </a>
                    </div>
                  </div>
              <div class="tab-pane fade  " role="tabpanel" id="step2" aria-labelledby="step2-tab">
                <!--  <div class="col-lg-12"><select class="selectpicker" multiple data-live-search="true"><option> UNIVERSITY OF SOUTHERN CALIFORNIA</option><option> HARVARD UNIVERSITY</option><option> COLUMBIA UNIVERSITY</option><option> STANFORD UNIVERSITY</option><option> UNIVERSITY OF CALIFORNIA UCB</option><option> YALE UNIVERSITY</option></select></div> -->
                <div class="mb-4 title-section-adss">
                  <h3> Add University</h3>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-pancard-input" class="form-label" placeholder="University name"> University name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " name="university_name" value="{{$university->university_name ?? null }}" maxlength="200" placeholder="University Name" />
                        <span class="text-danger university_name"></span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-vatno-input" class="form-label"> Phone No</label>
                        <input type="hidden" name="university_id" class="university_id" value="{{$university->id ?? null }}">
                        <input type="tel" class="form-control " name="phone_number"  pattern="[0-9]{10}" value="{{$university->phone_number ?? null }}"  placeholder=" Phone no" id="basicpill-vatno-input"/>
                        <span class="text-danger phone_number"></span>
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-block mb-3">
                          <label for="basicpill-cstno-input" class="form-label"> Email </label>
                          <input type="email" class="form-control " placeholder="email" name="email" value="{{$university->email ?? null }}" maxlength="255" />
                          <span class="text-danger email"></span>
                        </div>
                      </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-cstno-input" class="form-label"> Website <span class="text-danger">*</span></label>
                        <input type="url" class="form-control " placeholder="Website" value="{{$university->website ?? null }}" name="website" />
                        <span class="text-danger website"></span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-servicetax-input" class="form-label">Type of university <span class="text-danger">*</span></label>
                       <select class="form-control " name="type_of_university">
                            <option value="">--University/College Name --</option>
                           @foreach ($college_type as $item)
                                <option value="{{ $item->id }}" 
                                    {{ isset($university->type_of_university) && $university->type_of_university == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach

                        </select>
                        <span class="text-danger type_of_university"></span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-servicetax-input " class="form-label">Founded In/Establishment Year <span class="text-danger">*</span></label>
                        <input type="number" class="form-control " maxlength="200" value="{{$university->founded_in ?? null}}" name="founded_in" placeholder="Founded in" />
                        <span class="text-danger founded_in"></span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-servicetax-input" class="form-label">Total Student <span class="text-danger">*</span></label>
                        <input type="number" class="form-control " placeholder="total student" name="total_students" value="{{$university->total_students ?? null}}" />
                        <span class="text-danger total_students"></span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-servicetax-input" class="form-label">International Students <span class="text-danger">*</span></label>
                        <input type="number" class="form-control "  name ="international_students"  maxlength="200"  value="{{$university->international_students ?? null}}"  placeholder="international student" />
                        <span class="text-danger international_students"></span>
                    </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-servicetax-input" class="form-label">Size of Campus<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " name="size_of_campus"  value="{{$university->size_of_campus ?? null}}" placeholder="size of campus" maxlength="200"/>
                        <span class="text-danger size_of_campus"></span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-servicetax-input" class="form-label"> Male female Ratio<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " name="male_female_ratio" value="{{$university->male_female_ratio ?? null}}"  maxlength="200" placeholder="male female ratio" />
                        <span class="text-danger male_female_ratio"></span>
                    </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-servicetax-input"  class="form-label"> Faculty Student Ratio<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " name="faculty_student_ratio" value="{{$university->faculty_student_ratio ?? null}}" placeholder="Faculty Student Ratio" maxlength="200" />
                        <span class="text-danger faculty_student_ratio"></span>
                    </div>
                    </div>
                    <div class="col-lg-12">
                        <label for="basicpill-servicetax-input"  class="form-label">Details<span class="text-danger">*</span></label>
                        <textarea name="details" id="summernote1" cols="30" rows="10">{!! $university->details ?? null !!}</textarea>
                    </div>
                  </div>
                <div class="mb-4 mt-5">
                  <h3> Yearly Hostel | Meal Expenses</h3>
                </div>
                  <div class="row">

                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-pancard-input" class="form-label"> Expense Amount <span class="text-danger">*</span></label>
                        <input type="number" class="form-control "  name="expense_amount" maxlength="30" value="{{$university->yearly_hostel_expense_amount ?? null}}" placeholder=" expense_amount" >
                        <span class="text-danger expense_amount"></span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-vatno-input" class="form-label"> Expense Currencies <span class="text-danger">*</span></label>
                        <select class="form-control " name="expense_currencies">
                            <option value="">--Expense Currencies</option>
                            @foreach ($currency as $item)
                                <option value="{{$item->id}}" {{isset($university) && $university->yearly_hostel_expense_currencies == $item->id ? 'selected' : '' }}>{{$item->currency}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger expense_currencies"></span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-cstno-input" class="form-label"> Student Recruing Financial Aid (%) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control " name="financial_aid" value="{{$university->financial_aid ?? null }}" placeholder="Student Recruing Financial Aid (%)" >
                        <span class="text-danger financial_aid"></span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-cstno-input" class="form-label"> Accomodation<span class="text-danger">*</span></label>
                        <select class="form-control " name="accomodation" id="lead-accomodation" placeholder="Accomodation">
                            <option value="">-- Accomodation --</option>
                            <option value="Yes"  {{isset($university->accomodation) == 'yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No"  {{isset($university->accomodation) == 'no' ? 'selected' : '' }}>No</option>
                        </select>
                        <span class="text-danger accomodation"></span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-servicetax-input" class="form-label">Accomodation Website<span class="text-danger">*</span></label>
                        <input  name="website2" type="text" class="form-control " value="{{$university->website2 ?? null }}" placeholder="Accomodation Website" autocomplete="website2">
                        <span class="text-danger website2"></span>
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-block mb-3">
                          <label for="basicpill-servicetax-input" class="form-label">Application Cost/Registration Fees<span class="text-danger">*</span></label>
                          <input  name="application_cost" type="number" class="form-control " value="{{$university->application_cost ?? null }}" placeholder="Application Cost/Registration Fees" autocomplete="application_cost">
                          <span class="text-danger application_cost"></span>
                        </div>
                      </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                          <label for="lead-fafsa_code" class="form-label">FAFSA Code<span class="text-danger">*</span></label>
                        <input id="lead-fafsa_code" name="fafsa_code" type="number" class="form-control " placeholder="FAFSA Code" autocomplete="fafsa_code"  value="{{$university->fafsa_code ?? null }}">
                        <span class="text-danger fafsa_code"></span>
                    </div>
                    </div>
                   <div class="col-lg-4">
                        <div class="input-block mb-3">
                          <label for="basicpill-vatno-input" class="form-label"> Application Cost Currencies <span class="text-danger">*</span></label>
                          <select class="form-control " name="application_cost_currencies">
                              <option value="">--Application Cost Currencies --</option>
                              @foreach ($currency as $item)
                                  <option value="{{ $item->id }}" {{ (isset($university->application_cost_currencies) && $university->application_cost_currencies == $item->id) ? 'selected' : '' }}>{{ $item->currency }}</option>
                              @endforeach
                          </select>
                          <span class="text-danger application_cost_currencies"></span>
                        </div>
                      </div>
                    <div class="col-lg-4">
                        <label for="basicpill-servicetax-input" class="form-label">--Test Required-- <span class="text-danger">*</span></label>
                        <select class="selectpicker" multiple data-live-search="true" name="testrequired_input[]">
                            @php
                                $textrequired=App\Models\EngProficiencyLevel::all();
                                if(isset($university->testrequired)){
                                    $selectedTestRequired = explode(',', $university->testrequired);
                                }
                                else{
                                    $selectedTestRequired = [];
                                }
                            @endphp
                            
                            @foreach ($textrequired as $item)
                            <option value="{{ $item->name }}" 
                            {{ in_array($item->name, $selectedTestRequired) ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                            @endforeach
                        </select>
                        <span class="text-danger testrequired_input"></span>
                      </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                          <label for="lead-added_by_name" class="form-label">Added By Name<span class="text-danger">*</span></label>
                          <input type="hidden" name="tab2" value="tab2">
                         <input  name="added_by_name" type="text" class="form-control " placeholder="Added By Name" autocomplete="added_by_name" value="{{$university->added_by_name ?? null}}">
                         <span class="text-danger added_by_name"></span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="lead-added_on_date" class="form-label">Added On Date<span class="text-danger">*</span></label>
                        <input  name="added_on_date" type="datetime-local" class="form-control " placeholder="Added On Date" value="{{$university->added_on_date ?? null}}" autocomplete="added_on_date">
                        <span class="text-danger added_on_date"></span>
                    </div>
                    </div>
                    <div class="col-lg-12">
                        <label for="basicpill-servicetax-input"  class="form-label">Notes</label>
                        <textarea name="notes" id="summernote2" cols="30" rows="10">{!! $university->notes ?? null !!}</textarea>

                    </div>
                    <div class="col-lg-12">
                        <label for="basicpill-servicetax-input"  class="form-label">Placement</label>
                        <textarea name="placement" id="summernote3" cols="30" rows="10">{!! $university->placement ?? null !!}</textarea>
                    </div>
                    <div class="col-lg-12">
                        <label for="basicpill-servicetax-input"  class="form-label">Accomodation Details</label>
                        <textarea name="accomodation_details" id="summernote4" cols="30" rows="10">{!! $university->accomodation_details ?? null !!}</textarea>
                    </div>
                  </div>
                </form>
                <br>
                <div class="d-flex">
                    <a class="btn btn btn-primary previous me-2"> Back</a>
                    <a class="btn btn btn-primary next">Continue<span
                      class="spinner-grow spinner-grow-sm d-none" role="status"
                      aria-hidden="true"></span></a>
                  </div>

              </div>

              <div class="tab-pane fade" role="tabpanel" id="step3" aria-labelledby="step3-tab">
                <div class="mb-4 title-section-adss">
                  <h3> University Ranking </h3>
                </div>
                <h2 class="text-danger university_error hr"></h2>
                <form id="add_ranking">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="input-block mb-3">
                        <label for="basicpill-pancard-input" class="form-label" placeholder="Address 1"> Ranking <span class="text-danger">*</span></label>
                        <input type="Number" class="form-control " placeholder="Number"  name="ranking">
                        <span class="text-danger ranking"></span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-block mb-3">
                        <label for="basicpill-vatno-input" class="form-label"> Source of Ranking <span class="text-danger">*</span></label>
                        <input type="hidden" name="university_id" class="university_id" value="{{$university->id ?? null }}">
                        <input type="text" class="form-control " placeholder="Source of Ranking" name="from_place" id="basicpill-vatno-input">
                        <span class="text-danger from_place"></span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-block mb-3">
                        <label for="basicpill-cstno-input" class="form-label"> Year<span class="text-danger">*</span></label>
                        <input type="number" class="form-control " name="year" placeholder="Year" >
                        <span class="text-danger year"></span>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-block mb-3">
                        <label for="basicpill-servicetax-input" class="form-label"> Type <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " name="type" placeholder="Type" >
                        <span class="text-danger type"></span>
                      </div>
                    </div>
                    <div class="col-lg-12 ">
                        <div class="input-block mb-3 float-end">
                            <button type="button" class="btn btn-primary btn-sm px-4 add_ranking">Add</button>
                        </div>
                    </div>
                  </div>
                </form>
                <div class="table-responsive">
                  <table class="table table-striped custom-table mb-0">
                    <thead>
                      <tr>
                        <th>S.N</th>
                        <th>Ranking</th>
                        <th>Source of Ranking</th>
                        <th>Year</th>
                        <th>Type</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody class="university-ranking">

                    </tbody>
                  </table>
                </div>
                <br>
                <div class="d-flex">
                  <a class="btn btn btn-primary previous me-2"> Back</a>
                  <a class="btn btn btn-primary skip_form">Continue<span
                    class="spinner-grow spinner-grow-sm d-none" role="status"
                    aria-hidden="true"></span></a>
                </div>
              </div>
              <div class="tab-pane fade" role="tabpanel" id="step4" aria-labelledby="step4-tab">
                <div class="mb-4 title-section-adss">
                  <h3> University Accerediation </h3>
                </div>
                <h2 class="text-danger university_error hr"></h2>
                <form id="accerediation">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-vatno-input" class="form-label"> Name <span class="text-danger">*</span></label>
                        <input type="hidden" name="university_id" class="university_id" value="{{$university->id ?? null }}">
                        <input type="hidden" name="tab4" value="tab4">
                        <input type="text" class="form-control " name="name" placeholder="name" id="basicpill-vatno-input">
                        <span class="text-danger name"></span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-cstno-input" class="form-label"> Year<span class="text-danger">*</span></label>
                        <input type="number" class="form-control " name="year" placeholder="year" >
                        <span class="text-danger year"></span>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="input-block mb-3">
                        <label for="basicpill-servicetax-input" class="form-label"> Logo <span class="text-danger">*</span></label>
                        <input type="file" class="form-control " name="company_logo">
                        <span class="text-danger company_logo"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 ">
                    <div class="input-block float-end">
                        <button type="button" class="btn btn-primary btn-sm px-4 accerediation_add">Add</button>
                    </div>
                </div>
                </form>
               
                
                <div class="table-responsive mt-5">
                  <table class="table table-striped custom-table mb-0">
                    <thead>
                      <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Logo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="accerediation_table">

                    </tbody>
                  </table>
                </div>
                <br>
                <div class="d-flex">
                  <a class="btn btn-primary previous me-2">Previous</a>
                  <a class="btn btn-primary skip_form" data-bs-toggle="modal" data-bs-target="#save_modal">Continue<span
                    class="spinner-grow spinner-grow-sm d-none" role="status"
                    aria-hidden="true"></span></a>
                </div>
              </div>
              <div class="tab-pane fade" role="tabpanel" id="step5" aria-labelledby="step5-tab">
                <div class="mb-4 title-section-adss">
                  <h3> University Documents </h3>
                </div>
                <h2 class="text-danger university_error hr"></h2>
                <form id="university-document">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="input-block mb-3">
                        <label for="basicpill-namecard-input" class="form-label"> Logo <span class="text-danger">*</span></label>
                        <input type="file" class="form-control " id="basicpill-namecard-input" name="logo">
                        <span class="text-danger logo"></span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="input-block mb-3">
                        <label for="basicpill-namecard-input" class="form-label"> Thumbnail <span class="text-danger">*</span></label>
                        <input type="file" class="form-control " id="basicpill-namecard-input" name="thumbnail">
                        <input type="hidden" name="university_id" class="university_id"  value="{{$university->id ?? null }}">
                        <span class="text-danger thumbnail"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="input-block mb-3">
                        <label for="basicpill-cardno-input" class="form-label"> Banner <span class="text-danger">*</span></label>
                        <input type="file" class="form-control " id="basicpill-cardno-input" name="banner">
                        <span class="text-danger banner"></span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="input-block mb-3">
                        <label for="basicpill-namecard-input" class="form-label">
                          Images <span class="text-danger">*</span>
                        </label>
                        <input type="file" class="form-control" id="basicpill-namecard-input" name="images[]" multiple accept="image/*">
                        <span class="text-danger images"></span>
                      </div>
                    </div>

                    <div class="col-lg-12 ">
                        <div class="input-block mb-3 float-end">
                            <button type="button" class="btn btn-primary btn-sm px-4 university-document">Add</button>
                        </div>
                    </div>
                  </div>
                </form>
                <div class="d-flex">
                  <a class="btn btn-primary previous me-2">Previous</a>
                  <a class="btn btn-primary" href="{{route('manage-university')}}" >Save Changes<span
                    class="spinner-grow spinner-grow-sm d-none" role="status"
                    aria-hidden="true"></span></a>
                </div>
                <br>
               <h3> University Documents List  </h3>
               <div class="container">
                 <div class="row">
                    <div class="col-md-4 logo_image">
                    </div>
                     <div class="col-md-4 thumbnail_image">
                     </div>
                      <div class="col-md-4 banner_image">
                      </div>
                     
                 </div>
               </div>
               <div class="container">
                <div class="row  images_image">

                </div>
              </div>
              </div>
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
 <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
 <script>
    $('#summernote1').summernote({
      placeholder: ' Write Here',
      tabsize: 2,
      height: 100
    });
    $('#summernote2').summernote({
      placeholder: ' Write Here',
      tabsize: 2,
      height: 100
    });
    $('#summernote3').summernote({
      placeholder: ' Write Here',
      tabsize: 2,
      height: 100
    });
    $('#summernote4').summernote({
      placeholder: ' Write Here',
      tabsize: 2,
      height: 100
    });
    // const input = document.querySelector('.google-iframe-url');
    // const iframe = document.getElementById('map-iframe');
    // input.addEventListener('input', function(event) {
    //     alert
    //     iframe.src = event.target.value;

    // });
    document.addEventListener('DOMContentLoaded', function() {
    const input = document.querySelector('.google-iframe-url');
    const iframe = document.getElementById('map-iframe');

    function extractSrcFromIframeString(iframeString) {
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = iframeString;
        const iframeElement = tempDiv.querySelector('iframe');
        return iframeElement ? iframeElement.src : '';
    }

    function setIframeSrc() {
        const src = extractSrcFromIframeString(input.value);
        iframe.src = src;
        console.log(src);
    }

    setIframeSrc();
    input.addEventListener('input', setIframeSrc);
});

  </script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    function setupCSRF()
    {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
    }
    function fetchStates(country_id) {
        $('.province_id').empty();
        var selectedStateId = $('.province').val();
       
        setupCSRF();
        $.ajax({
            url: "{{ route('states.get') }}",
            method: 'get',
            data: {
                country_id: country_id
            },
            success: function(data){
            console.log(data);
                if ($.isEmptyObject(data)) {
                    $('.province_id').append('<option value="">No records found</option>');
                } else {
                    $.each(data, function(key, value){
                      var selected = (key == selectedStateId) ? 'selected' : '';
                        $('.province_id').append('<option value="'+ key +'" ' + selected + '>'+ value +'</option>');
                    });
                }
            }
        });
    }
    fetchStates($('.country').val());
    $('.country').change(function(){
        var country_id = $(this).val();
        fetchStates(country_id);
    });
    function handleNext() {
        const activeTab = $('.tab-pane.active');
        const nextTab = activeTab.next('.tab-pane');
        if (nextTab.length) {
            activeTab.removeClass('active');
            activeTab.removeClass('show');
            nextTab.addClass('active show');
            const nextTabLink = nextTab.attr('id') + '-tab';
            $('#' + nextTabLink).tab('show');
        }
    }
    function handlePrevious() {
        const activeTab = $('.tab-pane.active');
        const previousTab = activeTab.prev('.tab-pane');
        if (previousTab.length) {
            activeTab.removeClass('active');
            activeTab.removeClass('show');
            previousTab.addClass('active show');
            const previousTabLink = previousTab.attr('id') + '-tab';
            $('#' + previousTabLink).tab('show');
        }
    }
    $('.previous').on('click', handlePrevious);
    $('.skip_form').on('click', function(event) {
        handleNext();
    });
    $('.next').on('click', function(event) {
        event.preventDefault();
        var spinner = this.querySelector('.spinner-grow');
        spinner.classList.remove('d-none');
        $('.next').addClass('disabled');
        var activeTab = document.querySelector('.tab-pane.fade.show.active');
        var activeForm = activeTab.querySelector('form');
        var formData = new FormData(activeForm);
        setupCSRF();
        $.ajax({
            url: '{{ route('store-university') }}',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {
                    $('#responseMessage').html('<span class="alert alert-success">' +
                        response.success + '</span>');
                    $('.university_id').val(response.university_id);
                    spinner.classList.add('d-none');
                    $('.next').removeClass('disabled');
                    handleNext();
                }
            },
            error: function(xhr) {
                spinner.classList.add('d-none');
                $('.next').removeClass('disabled');
                var response = JSON.parse(xhr.responseText);
                if(response.errors && response.errors.university_name){
                    $('.university_name').html(response.errors.university_name);
                }else{
                    $('.university_name').html('');
                }
                if(response.errors && response.errors.email){
                    $('.email').html(response.errors.email);
                }else{
                    $('.email').html('');
                }
                if(response.errors && response.errors.accomodation){
                    $('.accomodation').html(response.errors.accomodation);
                }else{
                    $('.accomodation').html('');
                }
                if(response.errors && response.errors.added_by_name){
                    $('.added_by_name').html(response.errors.added_by_name);
                }else{
                    $('.added_by_name').html('');
                }
                if(response.errors && response.errors.added_on_date){
                    $('.added_on_date').html(response.errors.added_on_date);
                }else{
                    $('.added_on_date').html('');
                }
                if(response.errors && response.errors.application_cost){
                    $('.application_cost').html(response.errors.application_cost);
                }else{
                    $('.application_cost').html('');
                }
                if(response.errors && response.errors.expense_amount){
                    $('.expense_amount').html(response.errors.expense_amount);
                }else{
                    $('.expense_amount').html('');
                }
                 if(response.errors && response.errors.expense_currencies){
                    $('.expense_currencies').html(response.errors.expense_currencies);
                }else{
                    $('.expense_currencies').html('');
                }
                if(response.errors && response.errors.faculty_student_ratio){
                    $('.faculty_student_ratio').html(response.errors.faculty_student_ratio);
                }else{
                    $('.faculty_student_ratio').html('');
                }
                if(response.errors && response.errors.fafsa_code){
                    $('.fafsa_code').html(response.errors.fafsa_code);
                }else{
                    $('.fafsa_code').html('');
                }
                if(response.errors && response.errors.financial_aid){
                    $('.financial_aid').html(response.errors.financial_aid);
                }else{
                    $('.financial_aid').html('');
                }
                if(response.errors && response.errors.founded_in){
                    $('.founded_in').html(response.errors.founded_in);
                }else{
                    $('.founded_in').html('');
                }
                if(response.errors.international_students){
                    $('.international_students').html(response.errors.international_students);
                }else{
                    $('.international_students').html('');
                }
                if(response.errors && response.errors.male_female_ratio){
                    $('.male_female_ratio').html(response.errors.male_female_ratio);
                }else{
                    $('.male_female_ratio').html('');
                }
                if(response.errors && response.errors.phone_number){
                    $('.phone_number').html(response.errors.phone_number);
                }else{
                    $('.phone_number').html('');
                }
                if(  response.errors && response.errors.size_of_campus){
                    $('.size_of_campus').html(response.errors.size_of_campus);
                }else{
                    $('.size_of_campus').html('');
                }
                if(response.errors && response.errors.testrequired_input){
                    $('.testrequired_input').html(response.errors.testrequired_input);
                }else{
                    $('.testrequired_input').html('');
                }
                if(response.errors && response.errors.total_students){
                    $('.total_students').html(response.errors.total_students);
                }else{
                    $('.total_students').html('');
                }
                if(response.errors && response.errors.type_of_university){
                    $('.type_of_university').html(response.errors.type_of_university);
                }else{
                    $('.type_of_university').html('');
                }
                if(response.errors && response.errors.university_name){
                    $('.university_name').html(response.errors.university_name);
                }else{
                    $('.university_name').html('');
                }
                if(response.errors && response.errors.website2){
                    $('.website2').html(response.errors.website2);
                }else{
                    $('.website2').html('');
                }
                if(response.errors && response.errors.website){
                    $('.website').html(response.errors.website);
                }else{
                    $('.website').html('');
                }
                if(response.errors && response.errors.application_cost_currencies){
                    $('.application_cost_currencies').html(response.errors.application_cost_currencies);
                }else{
                    $('.application_cost_currencies').html('');
                }
                if(response.errors && response.errors.country_id){
                    $('.country_id').html(response.errors.country_id);
                }else{
                    $('.country_id').html('');
                }
                if(response.errors && response.errors.province_id){
                    $('.province').html(response.errors.province_id);
                }else{
                    $('.province').html('');
                }
                if(response.errors && response.errors.university_location){
                    $('.university_location').html(response.errors.university_location);
                }else{
                    $('.university_location').html('');
                }
                if(response.errors && response.errors.city){
                    $('.city').html(response.errors.city);
                }else{
                    $('.city').html('');
                }
                if(response.errors && response.errors.zip){
                    $('.zip').html(response.errors.zip);
                }else{
                    $('.zip').html('');
                }
                if(response.errors && response.errors.map_location){
                    $('.map_location').html(response.errors.map_location);
                }else{
                    $('.map_location').html('');
                }
                if(response.status == false){
                    $('.university_error').html(response.errors);
                }else{
                    $('.university_error').html('');
                }
            }
        });
    });
    function universityRanking() {
      $('.university-ranking').empty();
      var id = $('.university_id').val();
      setupCSRF();
      $.ajax({
          url: "{{ route('all-uni-ranking') }}",
          method: 'get',
          data: {
              id: id
          },
          success: function(data){
              if ($.isEmptyObject(data)) {
                  $('.university-ranking').append('<tr><td colspan="6" class="text-center">No records found</td></tr>');
              } else {
                  $.each(data, function(key, value){
                      $('.university-ranking').append(`
                      <tr>
                        <td>${key + 1}</td>
                        <td>${value.ranking}</td>
                        <td>${value.from_place}</td>
                        <td>${value.year}</td>
                        <td>${value.type}</td>
                        <td><a href ="{{url('admin/delete-uni-ranking')}}/${value.id}" class='btn btn-primary'>Delete</a></td>
                      </tr>
                      `);
                  });
              }
          }
      });
    }
    universityRanking();
    $('.add_ranking').on('click', function(event) {
        $('.add_ranking').addClass('disabled');
        var formData = $('#add_ranking').serialize();
        setupCSRF();
        $.ajax({
            url: '{{ route('add-university-rank') }}',
            type: 'post',
            data: formData,
            success: function(response) {
                if (response.status) {
                    $('.responseMessage').html('<span class="alert alert-success">' +
                        response.success + '</span>');
                    setTimeout(() => {
                        // location.reload();
                    }, 1000);
                }
                $('.add_ranking').removeClass('disabled');
                $('#add_ranking')[0].reset();
                universityRanking();
            },
            error: function(xhr) {
                $('.add_ranking').removeClass('disabled');
                var response = JSON.parse(xhr.responseText);
                if(response.errors && response.errors.ranking){
                    $('.ranking').html(response.errors.ranking);
                }else{
                    $('.ranking').html('');
                }
                if(response.errors && response.errors.from_place){
                    $('.from_place').html(response.errors.from_place);
                }else{
                    $('.from_place').html('');
                }
                if(response.errors && response.errors.year){
                    $('.year').html(response.errors.year);
                }else{
                    $('.year').html('');
                }
                if(response.errors && response.errors.type){
                    $('.type').html(response.errors.type);
                }else{
                    $('.type').html('');
                }
                if(response.status == false){
                    $('.university_error').html(response.errors);
                }else{
                    $('.university_error').html('');
                }
            }
        });
    });
    $('.accerediation_add').on('click', function(event) {
        $('.accerediation_add').addClass('disabled');
        var formData = new FormData($('#accerediation')[0]);
        setupCSRF();
        $.ajax({
            url: '{{ route('add-uni-accerediation') }}',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status) {
                    $('.responseMessage').html('<span class="alert alert-success">' +
                        response.success + '</span>');
                    setTimeout(() => {
                        // location.reload();
                    }, 1000);
                }
                $('.accerediation_add').removeClass('disabled');
                $('#accerediation')[0].reset();
                universityAccerediation();
            },
            error: function(xhr) {
                $('.accerediation_add').removeClass('disabled');
                var response = JSON.parse(xhr.responseText);
                if(response.errors && response.errors.name){
                    $('.name').html(response.errors.name);
                }else{
                    $('.name').html('');
                }
                if(response.errors && response.errors.year){
                    $('.year').html(response.errors.year);
                }else{
                    $('.year').html('');
                }
                if(response.errors && response.errors.company_logo){
                    $('.company_logo').html(response.errors.company_logo);
                }else{
                    $('.company_logo').html('');
                }
                if(response.status == false){
                    $('.university_error').html(response.errors);
                }else{
                    $('.university_error').html('');
                }
            }
        });
    });
    var assetBaseUrl = "{{ asset('') }}";
    function asset(path)
    {
        return `${assetBaseUrl}${path}`;
    }
    function universityAccerediation() {
      $('.accerediation_table').empty();
      var id = $('.university_id').val();
      setupCSRF();
      $.ajax({
          url: "{{ route('all-uni-accerediation') }}",
          method: 'get',
          data: {
              id: id
          },
          success: function(data){
              if ($.isEmptyObject(data)) {
                  $('.accerediation_table').append('<tr><td colspan="6" class="text-center">No records found</td></tr>');
              } else {
                  $.each(data, function(key, value){
                      $('.accerediation_table').append(`
                      <tr>
                        <td>${key + 1}</td>
                        <td>${value.name}</td>
                        <td>${value.year}</td>
                        <td><img src='${asset('/'+ value.logo)}' height='150px' width="150"></td>
                        <td><a href ="{{url('admin/delete-uni-accerediation')}}/${value.id}" class='btn btn-primary'>Delete</a></td>
                      </tr>
                      `);
                  });
              }
          }
      });
    }
    universityAccerediation();
    // university Document
    // $('.university-document').on('click', function(event) {
    //     $('.university-document').addClass('disabled');
    //     var formData = new FormData($('#university-document')[0]);
    //     setupCSRF();
    //     $.ajax({
    //         url: '{{ route('add-uni-documents') }}',
    //         type: 'post',
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         success: function(response) {
    //             if (response.status) {
    //                 $('.responseMessage').html('<span class="alert alert-success">' +
    //                     response.success + '</span>');
    //                 setTimeout(() => {
    //                     // location.reload();
    //                 }, 1000);
    //             }
    //             $('.university-document').removeClass('disabled');
    //             $('#university-document')[0].reset();
    //             universityDocument();
    //         },
    //         error: function(xhr) {
    //             $('.university-document').removeClass('disabled');
    //             var response = JSON.parse(xhr.responseText);
    //             if(response.errors && response.errors.logo){
    //                 $('.logo').html(response.errors.logo);
    //             }else{
    //                 $('.logo').html('');
    //             }
    //             if(response.errors && response.errors.thumbnail){
    //                 $('.thumbnail').html(response.errors.thumbnail);
    //             }else{
    //                 $('.thumbnail').html('');
    //             }
    //             if(response.errors && response.errors.banner){
    //                 $('.banner').html(response.errors.banner);
    //             }else{
    //                 $('.banner').html('');
    //             }
    //             if(response.errors && response.errors.images){
    //                 $('.images').html(response.errors.images);
    //             }else{
    //                 $('.images').html('');
    //             }
    //             if(response.status == false){
    //                 $('.university_error').html(response.errors);
    //             }else{
    //                 $('.university_error').html('');
    //             }
    //         }
    //     });
    // });
    // function universityDocument() {
    //   $('.thumbnail').empty();
    //   $('.banner').empty();
    //   $('.logo').empty();
    //   $('.images').empty();
    //   var id = $('.university_id').val();
    //   setupCSRF();
    //   $.ajax({
    //       url: "{{ route('university-document') }}",
    //       method: 'get',
    //       data: {
    //           id: id
    //       },
    //       success: function(data){
    //           if ($.isEmptyObject(data.uniDoc)) {
    //             $('.thumbnail_image').html('');
    //             $('.banner_image').html('');;
    //             $('.logo_image').html('');
    //             $('.images_image').html('');
    //           } else {
    //              if(data.uniDoc && data.uniDoc.logo){
    //                 $('.logo_image').html(`<img src='${asset('/'+ data.uniDoc.logo)}' height='200px'>`);
    //             }
    //             if(data.uniDoc && data.uniDoc.thumbnail){
    //                 $('.thumbnail_image').html(`<img src='${asset('/'+ data.uniDoc.thumbnail)}' height='200px'>`);
    //             }
    //             if(data.uniDoc && data.uniDoc.banner){
    //                 $('.banner_image').html(`<img src='${asset('/'+ data.uniDoc.banner)}' height='200px'>`);
    //             }
               
    //             if(data.university_gallery){
    //                 $.each(data.university_gallery, function(key, value) {
    //                     $('.images_image').append(`<div class="col-md-4"><img src='${asset('/'+ value.file_name)}' height='150px' width="150px"></div>`);
    //                 });
    //             }
    //           }
    //       }
    //   });
    // }
    // universityDocument();


    function setupCSRF() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

$('.university-document').on('click', function () {
    const $btn = $(this);
    $btn.addClass('disabled');

    const formData = new FormData($('#university-document')[0]);
    setupCSRF();

    $.ajax({
        url: '{{ route('add-uni-documents') }}',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status) {
                $('.responseMessage').html('<div class="alert alert-success">' + response.success + '</div>');
                $('#university-document')[0].reset();
                universityDocument();
            }
            $btn.removeClass('disabled');
        },
        error: function (xhr) {
            $btn.removeClass('disabled');
            let response = xhr.responseJSON;

            ['logo', 'thumbnail', 'banner', 'images'].forEach(field => {
                if (response.errors && response.errors[field]) {
                    $('.' + field).html(response.errors[field][0]);
                } else {
                    $('.' + field).html('');
                }
            });

            if (response.status === false && typeof response.errors === 'string') {
                $('.university_error').html('<div class="alert alert-danger">' + response.errors + '</div>');
            } else {
                $('.university_error').html('');
            }
        }
    });
});

function universityDocument() {
    let id = $('.university_id').val();
    setupCSRF();

    $.ajax({
        url: '{{ route('university-document') }}',
        method: 'GET',
        data: { id },
        success: function (data) {
            const doc = data.uniDoc;
            const gallery = data.university_gallery;
            console.log(gallery);

            $('.logo_image').html(doc.logo ? `<img src="{{ asset('') }}/${doc.logo} " height="200px">` : '');
            $('.thumbnail_image').html(doc.thumbnail ? `<img src="{{ asset('') }}/${doc.thumbnail}" height="200px">` : '');
            $('.banner_image').html(doc.banner ? `<img src="{{ asset('') }}/${doc.banner}" height="200px">` : '');

            $('.images_image').empty();
            if (gallery && gallery.length > 0) {
                gallery.forEach(img => {
                    $('.images_image').append(`
                        <div class="col-md-3 mb-2 text-center">
                            <img src="{{ asset('') }}/${img.file_name}" height="120px" width="120px" class="border mb-1">
                            <br>
                            <button class="btn btn-danger btn-sm" onclick="deleteGalleryImage(${img.id})" title="Delete">  <i class="fa-solid fa-trash"></i></button>
                        </div>
                    `);
                });
              }
        }
    });
}
// === DELETE IMAGE ===
function deleteGalleryImage(image_id) {
    if (!confirm('Are you sure you want to delete this image?')) return;
    setupCSRF();

    $.ajax({
        url: '{{ route('university-gallery-delete') }}',
        method: 'POST',
        data: { id: image_id },
        success: function (response) {
           
            universityDocument(); // reload list
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert('Failed to delete image.');
        }
    });
}
// Initial load
universityDocument();

</script>
@endsection
