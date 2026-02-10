@extends('admin.include.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
<style>
    .octicon-light-bulb {
        position: absolute;
        left: 111px;
        top: 56px;
    }
    .wizard .nav-tabs li:after {
        left: -38%;
    }
</style>
@endsection

@section('main-content')
    <div class="row ">
        <div class="card card-buttons">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <ol class="breadcrumb text-muted mb-0">
                            <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item text-muted">Add Franchise</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body form-container-adss bg-white py-3">
        <div class="wizard">
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Company Information">
                        <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center "
                            href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab" aria-controls="step1"
                            aria-selected="true"> 1 </a>
                        <br>
                        <span class="octicon octicon-light-bulb">Company Information</span>
                    </li>
                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Contact Information">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center "
                            href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab" aria-controls="step2"
                            aria-selected="false"> 2 </a>
                        <br>
                        <span class="octicon octicon-light-bulb">Contact Information</span>
                    </li>
                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Bank Details">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center "
                            href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step3"
                            aria-selected="false"> 3 </a>
                        <br>
                        <span class="octicon octicon-light-bulb">Bank Details</span>
                    </li>
                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Admin Section">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center "
                            href="#step4" id="step4-tab" data-bs-toggle="tab" role="tab" aria-controls="step4"
                            aria-selected="false"> 4 </a>
                        <br>
                        <span class="octicon octicon-light-bulb">Admin Section</span>
                    </li>
                </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                    <form id="company_info">
                        <div class="mb-4 mt-md-5 title-section-adss ">
                            
                            <h4>Company Information</h4>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-6 input-group-create">
                                <input type="hidden" name="tab1" value="tab1" >
                                <label>Company Name : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="company_name" id="company_name" value="{{$frenchise->company_name ?? old('company_name') }}" required placeholder="Enter Company Name">
                                <span class="text-danger error-company-name"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Email : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ $frenchise->email ?? old('email')}}" required placeholder="Enter Email">
                                <span class="text-danger error-email"></span>
                                <input type="hidden" name="franchise_id" class="franchise_id" value="{{ $id ?? null }}">
                            </div>
                            <div class="col-md-12 input-group-create">
                                <label>Website : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="website" id= "website" value="{{ $frenchise->website ?? old('website')}}" required placeholder="Enter website">
                                <span class="text-danger error-website"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Facebook Link: <span class="text-danger">*</span></label>
                                <input type="url" class="form-control" name="facebook" id="facebook" value="{{ $frenchise->facebook ?? old('facebook')}}" required placeholder="Enter facebook">
                                <span class="text-danger error-facebook"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Instagram : </label>
                                <input type="text" class="form-control" name="instagram" id="instagram" value="{{ $frenchise->instagram ?? old('instagram')}}" placeholder="Enter instagram">
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>twitter : </label>
                                <input type="text" class="form-control" name="twitter" id="twitter" value="{{ $frenchise->twitter ?? old('twitter')}}" placeholder="Enter Twitter">
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>linkedin : </label>
                                <input type="text" class="form-control" name="linkedin" id="linkedin"  value="{{$frenchise->linkedin ?? old('linkedin')}}"  placeholder="Enter linkedin">
                            </div>
                            <div class="col-md-6 input-group-create ">
                                <label class="control-label">Company Logo</label>
                                <input type="file" class="form-control file-input-adss" name="company_logo" id="company_logo" >
                                <span class="text-danger error-company-logo"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label class="control-label">Business Certificate (In PDF)</label>
                                <input type="file" class="form-control file-input-adss" name="business_certificate" id="business_certificate">
                                <span class="text-danger error-bussines-certificate"></span>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex">
                        <a class="btn col-md-2 mt-4 btn btn-primary next  px-4" id="tab1datasubmit">
                            <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                            Next
                        </a>
                    </div>
                </div>
                <div class="tab-pane fade " role="tabpanel" id="step2" aria-labelledby="step2-tab">
                    <form>
                        <div class="mb-4 mt-md-5 title-section-adss ">
                            
                            <h4> Contact Information</h4>
                        </div>
                        <h3><span class="text-danger frenchise-id"></span></h3>
                        <div class="row g-4">
                            <div class="col-md-6 input-group-create">
                                <input type="hidden" name="tab2" value="tab2" >
                                <label>Business Name : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="business_name"  value="{{$frenchise->business_name ?? old('business_name')}}"  required placeholder="Enter Business Name">
                                <span class="text-danger business_name"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Legal First Name : <span class="text-danger">*</span></label>
                                <input type="hidden" name="franchise_id" class="franchise_id">
                                <input type="text" class="form-control" name="legal_first_name" value="{{$frenchise->legal_first_name ?? old('legal_first_name')}}" required placeholder="Enter First Name">
                                <span class="text-danger legal_first_name"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Legal Last Name : </label>
                                <input type="text" class="form-control" name="legal_last_name"  placeholder="Enter Last Name">

                            </div>
                            <div class="col-md-6 input-group-create">
                            <label>Password :<span class="text-danger">*</span> </label>
                            <input type="password" class="form-control" name="password" placeholder="********">
                            <span class="text-danger password"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Address : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="address" value="{{$frenchise->address ?? old('address')}}" placeholder="Address">
                                <span class="text-danger address"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Country:  <span class="text-danger">*</span></label>
                                <select class="form-control country"  name="country_id" >
                                    <option value="">-- Select Country --</option>
                                    @foreach ($countries as $item)
                                        <option value="{{ $item->id }}"  {{ ($frenchise->country_id ?? old('country_id')) == $item->id ? 'selected' : '' }}
                                            {{ request()->get('country_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger country_id"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>State/Provision:  <span class="text-danger">*</span></label>
                                <select name="province_id" class="form-control province_id">
                                    <option value="" {{ isset($frenchise->state) ? '' : 'selected' }}> -State/Province- </option>
                                </select>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>City : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="city"  value="{{ $frenchise->city ?? old('city')}}" placeholder="Enter City">
                                <span class="text-danger city"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Zip : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="zip"  value="{{ $frenchise->zip ??  old('zip')}}"  placeholder="Enter zip">
                                <span class="text-danger zip"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Phone : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="phone"  value="{{$frenchise->phone ??  old('phone')}}" placeholder="Enter phone" disabled>
                                <span class="text-danger phone"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Skype : </label>
                                <input type="text" class="form-control" name="skype" value="{{$frenchise->skype ??  old('skype')}}"  placeholder="Enter skype">
                                <span class="text-danger skype"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Whatsapp : </label>
                                <input type="text" class="form-control" name="whatsapp" value="{{$frenchise->whatsapp ?? old('whatsapp')}}" placeholder="Enter whatsapp">
                                <span class="text-danger whatsapp"></span>
                            </div>
                        </div>
                    </form>
                    <div class="alert-course"> </div>
                    <div class="d-flex">
                        <a class="btn col-md-2 mt-4 btn btn-warning previous me-2 "> Back</a>
                        <a class="btn col-md-2 mt-4 btn btn-primary next ">Continue
                            <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span></a>
                    </div>
                </div>
                <div class="tab-pane fade  mt-md-5 title-section-adss" role="tabpanel" id="step3" aria-labelledby="step3-tab">
                    
                    <h4 class="mb-4">Bank Details</h4>
                    <h3><span class="text-danger frenchise-id"></span></h3>
                    <form>
                       <div class="row g-4">
                            <div class="col-md-6 input-group-create">
                                <label>Bank Name : <span class="text-danger">*</span></label>
                                <input type="hidden" name="tab3" value="tab3">
                                <input type="text" class="form-control" name="bank_name" value="{{$frenchise->bank_name ?? old('bank_name')}}" required placeholder="Enter name of the Bank">
                                <span class="text-danger bank_name"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Branch Name : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="branch_name" value="{{$frenchise->branch_name ?? old('branch_name')}}" required  placeholder="Enter name of the Branch">
                                <span class="text-danger branch_name"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Account Holder Name : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="account_holder_name" value="{{$frenchise->account_holder_name ?? old('account_holder_name')}}"  required placeholder="Enter Account Holder name">
                                <span class="text-danger account_holder_name"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>IFSC Code : <span class="text-danger">*</span></label>
                                <input type="hidden" name="franchise_id" class="franchise_id">
                                <input type="text" class="form-control" name="ifsc_code" value="{{$frenchise->ifsc_code ?? old('ifsc_code')}}" required  placeholder="Enter IFSC Code">
                                <span class="text-danger ifsc_code"></span>
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Account Number : <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="account_number"  value="{{$frenchise->account_number ?? old('account_number')}}" required placeholder="Enter Account Number">
                                <span class="text-danger account_number"></span>
                                <input type="file" class="form-control" name="com" id="com" style="display: none" >
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label class="control-label">Currency<span class="text-danger">*</span></label>
                                <select name="currency"  class="form-control" required>
                                    <option value="">-Currency -</option>
                                    @foreach ($currency as $key=>$item)
                                        <option value="{{$key}}" {{ ($frenchise->currency ?? old('currency')) == $key ? 'selected' : '' }}>{{$key}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger currency"></span>
                            </div>
                       </div>
                    </form>
                    <div class="d-flex">
                        <a class="btn col-md-2 mt-4 btn-warning previous me-2">Previous</a>
                        <a class="btn col-md-2 mt-4 btn-primary next " data-bs-toggle="modal"
                            data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span> continue</a>

                        </div>
                </div>
                <div class="tab-pane fade" role="tabpanel" id="step4" aria-labelledby="step4-tab">
                    <h3><span class="text-danger frenchise-id"></span></h3>
                    <div class="mb-4 mt-md-5 title-section-adss  ">
                        
                        <h4> Admin Section</h4>
                    </div>
                    <div id="responseMessage"></div>
                    <form>
                        <div class="row g-4">
                            <div class="col-md-6 input-group-create">
                                <label>Approve Profile: </label>
                                <select class="form-control" name="is_approve">
                                <option value="1" {{ ($frenchise->is_approve ?? old('is_approve')) == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0"  {{ ($frenchise->is_approve ?? old('is_approve')) == 0 ? 'selected' : '' }}>NO</option>
                                </select>
                                @error('is_approve')
                                <span class="text-danger"></span>
                                @enderror
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Active Profile: </label>
                                <input type="hidden" name="tab4" value="tab4" >
                                <input type="file" class="form-control" name="comm" id="comm" style="display: none" >
                                <select class="form-control" name="is_active">
                                <option value="1" {{ ($frenchise->is_active ?? old('is_active')) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ ($frenchise->is_active ?? old('is_active')) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('is_active')
                                <span class="text-danger"></span>
                                @enderror
                            </div>

                            <div class="col-md-6 input-group-create">
                                <label class="control-label">Offer Letter:</label><br>
                                <input type="file" name="offer_letter" class="form-control file-input-adss">
                                <span class="text-danger offer_letter"></span>
                            </div>
                            <!-- Commission -->
                            <div class="col-md-6 input-group-create">
                                <label>Commission when student makes payment for a program/course:</label>
                                <input type="hidden" name="franchise_id" class="franchise_id">
                                <input type="number" step="0.01" class="form-control" value="{{$frenchise->commission_for_program_payment ?? old('commission_for_program_payment')}}" name="commission_for_program_payment"  placeholder="Commission when student makes payment for a program/course">
                                @error('commission_for_program_payment')
                                <span class="text-danger"></span>
                                @enderror
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>Commission when student pays on added program/course :</label>
                                <input type="number" step="0.01" class="form-control"  value="{{$frenchise->commission_for_added_program_payment ?? old('commission_for_added_program_payment')}}"  name="commission_for_added_program_payment"  placeholder="Enter Account Number">
                                @error('commission_for_added_program_payment')
                                <span class="text-danger"></span>
                                @enderror
                            </div>
                            <br>

                        </div>
                    </form>
                    <div class="col-md-12">
                        <a class="btn col-md-2 mt-4 btn-primary next " data-bs-toggle="modal"
                        data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span> Save</a>
                     </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row g-4">
        <div class="card-group">
            <div class="card">
                <div class="card-body myform">
                    <form action="{{route('frenchise-store')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="row g-4">
                           <input type="hidden" id="user_id" value="482">
                           <div class="col-md-12">
                              <hr>
                              <h3>Contact Information</h3>
                              <hr>
                           </div>
                           <div class="col-md-6 input-group-create">
                              <label>Business Name : <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="business_name"  value="{{old('business_name')}}"  required placeholder="Enter Business Name">
                                @error('business_name')
                                <span class="text-danger"></span>
                              @enderror
                           </div>
                           <div class="col-md-6 input-group-create">
                              <label>Legal First Name : <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="legal_first_name" value="{{old('legal_first_name')}}" required placeholder="Enter First Name">
                                @error('legal_first_name')
                                <span class="text-danger"></span>
                              @enderror
                           </div>
                           <div class="col-md-6 input-group-create">
                              <label>Legal Last Name : </label>
                              <input type="text" class="form-control" name="legal_last_name" value="{{old('legal_last_name')}}" placeholder="Enter Last Name">
                                @error('legal_last_name')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-6 input-group-create">
                            <label>Legal Last Name : </label>
                            <input type="password" class="form-control" name="password" placeholder="********">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                           </div>
                           <div class="col-md-6 input-group-create">
                                <label>Address : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="address" value="{{old('address')}}" placeholder="Address">
                                @error('address')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                           </div>
                           <div class="col-md-6 input-group-create">
                                <label>Country:  <span class="text-danger">*</span></label>
                                <select class="form-control country"  name="country_id" >
                                    <option value="">-- Select Country --</option>
                                    @foreach ($countries as $item)
                                        <option value="{{ $item->id }}"  value="{{old('country_id')}}"
                                            {{ request()->get('country_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 input-group-create">
                                <label>State/Provision:  <span class="text-danger">*</span></label>
                                <select name="province_id"  class="form-control province_id ">
                                    <option value="">-State/Provision -</option>
                                </select>
                            </div>
                           <div class="col-md-6 input-group-create">
                              <label>City : <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="city"  value="{{old('city')}}" placeholder="Enter City">
                                @error('city')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-6 input-group-create">
                              <label>Zip : <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="zip"  value="{{old('zip')}}"  placeholder="Enter zip">
                                @error('zip')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-6 input-group-create">
                              <label>Phone : <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="phone"  value="{{old('phone')}}" placeholder="Enter phone">
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-6 input-group-create">
                              <label>Skype : </label>
                              <input type="text" class="form-control" name="skype" value="{{old('skype')}}"  placeholder="Enter skype">
                                @error('skype')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-6 input-group-create">
                              <label>Whatsapp : </label>
                              <input type="text" class="form-control" name="whatsapp" value="{{old('whatsapp')}}" placeholder="Enter whatsapp">
                                @error('whatsapp')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-12">
                              <hr>
                              <h3>Bank Details</h3>
                              <hr>
                           </div>
                           <div class="col-md-6 input-group-create">
                              <label>Bank Name : <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="bank_name" value="{{old('bank_name')}}" required placeholder="Enter name of the Bank">
                                @error('bank_name')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-6 input-group-create">
                              <label>Branch Name : <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="branch_name" value="{{old('branch_name')}}" required  placeholder="Enter name of the Branch">
                                @error('branch_name')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-6 input-group-create">
                              <label>Account Holder Name : <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="account_holder_name" value="{{old('account_holder_name')}}"  required placeholder="Enter Account Holder name">
                                @error('account_holder_name')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-6 input-group-create">
                              <label>IFSC Code : <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="ifsc_code" value="{{old('ifsc_code')}}" required  placeholder="Enter IFSC Code">
                                @error('ifsc_code')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-6 input-group-create">
                              <label>Account Number : <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="account_number"  value="{{old('account_number')}}" required placeholder="Enter Account Number">
                                @error('account_number')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <label class="control-label">Currency<span class="text-danger">*</span></label>
                              <select name="currency"  class="form-control" required>
                                    <option value="">-Currency -</option>
                                    @foreach ($currency as $key=>$item)
                                      <option value="{{$key}}"  value="{{old('currency')}}">{{$key}}</option>
                                    @endforeach
                              </select>
                                @error('currency')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                           </div>

                           <div class="col-md-12">
                              <hr>
                              <h3>Admin Section</h3>
                              <hr>
                           </div>
                           <div class="col-md-12">
                              <label>Approve Profile: </label>
                              <select class="form-control" name="is_approve">
                                 <option value="1" >Yes</option>
                                 <option value="0">NO</option>
                              </select>
                                @error('is_approve')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-12">
                              <label>Active Profile: </label>
                              <select class="form-control" name="is_active">
                                 <option value="1" >Active</option>
                                 <option value="0">Inactive</option>
                              </select>
                                @error('is_active')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-12">
                              <label class="control-label">Offer Letter:</label><br>
                              <input type="file" name="offer_letter" class="form-control file-input-adss">
                                @error('offer_letter')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <!-- Commission -->
                           <div class="col-md-12">
                              <label>Commission when student makes payment for a program/course:</label>
                              <input type="number" step="0.01" class="form-control" value="{{old('commission_for_program_payment')}}" name="commission_for_program_payment"  placeholder="Commission when student makes payment for a program/course">
                                @error('commission_for_program_payment')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <div class="col-md-12">
                              <label>Commission when student pays on added program/course :</label>
                              <input type="number" step="0.01" class="form-control"  value="{{old('commission_for_added_program_payment')}}"  name="commission_for_added_program_payment"  placeholder="Enter Account Number">
                                @error('commission_for_added_program_payment')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                           </div>
                           <br>
                           <div class="col-md-12">
                              <button type="submit" class="btn col-md-2 mt-4 btn-info submitButton w-25 align-center" >Submit</button>
                           </div>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('scripts')
<script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        function setupCSRF() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        function fetchStates(country_id) {
            $('.province_id').empty();
            setupCSRF();
            $.ajax({
                url: "{{ route('states.get') }}",
                method: 'get',
                data: {
                    country_id: country_id
                },
                success: function(data) {
                    if ($.isEmptyObject(data)) {
                        $('.province_id').append(
                            '<option value="">No records found</option>');
                    } else {
                        $.each(data, function(key, value) {
                            $('.province_id').append('<option value="'+ key +'">' + value +
                                '</option>');
                        });
                    }
                }
            });
        }
        fetchStates($('.country').val());
        $('.country').change(function() {
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
        $('.next').on('click', function(event) {
        event.preventDefault();
        var spinner = this.querySelector('.spinner-grow');
        spinner.classList.remove('d-none');
        $('.next').addClass('disabled');
            $('.frenchise-id').html('');
            var activeTab = document.querySelector('.tab-pane.fade.show.active');
            var activeForm = activeTab.querySelector('form');
            var formData = new FormData(activeForm);
            setupCSRF();
            $.ajax({
                url: `{{ route('frenchise-store') }}`,
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response.status){
                        Swal.fire({
                            title: 'Success!',
                            text: response.success,
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        setTimeout(() => {
                            var originUrl = window.location.origin;
                            window.location.href = originUrl + '/franchise/franchise-list';
                        },2000);
                    }
                    spinner.classList.add('d-none');
                    $('.next').removeClass('disabled');
                    $('.franchise_id').val(response);
                    handleNext();
                },
                error: function(xhr) {
                    spinner.classList.add('d-none');
                    $('.next').removeClass('disabled');
                    var response = JSON.parse(xhr.responseText);
                    if(response.errors && response.errors.company_name){
                        $('.error-company-name').html(response.errors.company_name);
                    }
                    if(response.errors && response.errors.email){
                        $('.error-email').html(response.errors.email);
                    }else{
                        $('.error-email').html('');
                    }
                    if(response.errors && response.errors.website){
                        $('.error-website').html(response.errors.website);
                    }else{
                        $('.website').html('');
                    }
                    if(response.errors && response.errors.facebook){
                        $('.error-facebook').html(response.errors.facebook);
                    }else{
                        $('.facebook').html('');
                    }
                    if(response.errors && response.errors.company_logo){
                        $('.error-company-logo').html(response.errors.company_logo);
                    }else{
                        $('.company_logo').html('');
                    }
                    if(response.errors && response.errors.business_certificate){
                        $('.error-bussines-certificate').html(response.errors.business_certificate);
                    }else{
                        $('.business_certificate').html('');
                    }
                    if(response.errors && response.errors.business_name){
                        $('.business_name').html(response.errors.business_name);
                    }else{
                        $('.business_name').html('');
                    }
                    if(response.errors && response.errors.address){
                        $('.address').html(response.errors.address);
                    }else{
                        $('.address').html('');
                    }
                    if(response.errors && response.errors.city){
                        $('.city').html(response.errors.city);
                    }else{
                        $('.city').html('');
                    }
                    if(response.errors && response.errors.country_id){
                        $('.country_id').html(response.errors.country_id);
                    }else{
                        $('.country_id').html('');
                    }
                    if(response.errors && response.errors.legal_first_name){
                        $('.legal_first_name').html(response.errors.legal_first_name);
                    }else{
                        $('.legal_first_name').html('');
                    }
                    if(response.errors && response.errors.password){
                        $('.password').html(response.errors.password);
                    }else{
                        $('.password').html('');
                    }
                    if(response.errors && response.errors.phone){
                        $('.phone').html(response.errors.phone);
                    }else{
                        $('.phone').html('');
                    }
                    if(response.errors && response.errors.zip){
                        $('.zip').html(response.errors.zip);
                    }else{
                        $('.zip').html('');
                    }
                    if(response.errors && response.errors.offer_letter){
                        $('.offer_letter').html(response.errors.offer_letter);
                    }else{
                        $('.offer_letter').html('');
                    }
                    if(response.errors && response.errors.bank_name){
                        $('.bank_name').html(response.errors.bank_name);
                    }else{
                        $('.bank_name').html('');
                    }
                    if(response.errors && response.errors.branch_name){
                        $('.branch_name').html(response.errors.branch_name);
                    }else{
                        $('.branch_name').html('');
                    }
                    if(response.errors && response.errors.account_holder_name){
                        $('.account_holder_name').html(response.errors.account_holder_name);
                    }else{
                        $('.account_holder_name').html('');
                    }
                    if(response.errors && response.errors.ifsc_code){
                        $('.ifsc_code').html(response.errors.ifsc_code);
                    }else{
                        $('.ifsc_code').html('');
                    }
                    if(response.errors && response.errors.account_number){
                        $('.account_number').html(response.errors.account_number);
                    }else{
                        $('.account_number').html('');
                    }
                    if(response.errors && response.errors.currency){
                        $('.currency').html(response.errors.currency);
                    }else{
                        $('.currency').html('');
                    }
                    if(response.frenchise_errors){
                        $('.frenchise-id').html(response.frenchise_errors);
                    }else{
                        $('.frenchise-id').html('');
                    }
                }
            });
        });
    });
    </script>
@endsection
