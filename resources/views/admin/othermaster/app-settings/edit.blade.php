@extends('admin.include.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title mb-0">App Settings</h4>
            </div>

            <div class="card-body">
                <div class="wizard">
                    <div class="tab-content">
                        <div class="tab-pane fade show active">

                            <div class="mb-4 title-section-adss">
                                <h3>Edit App Settings</h3>
                            </div>

                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <form action="{{ route('appsettings.update', $setting->setting_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')



                                {{-- Vendor Code --}}
                                <div class="col-md-12 input-group-adss">
                                    <label>Vendor Code <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control"
                                        name="Vendor_Code"
                                        value="{{ old('Vendor_Code', $setting->Vendor_Code) }}"
                                        required>
                                    @error('Vendor_Code')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Referral Person --}}
                                <div class="col-md-12 input-group-adss">
                                    <label>Referral Person Name</label>
                                    <input type="text"
                                        class="form-control"
                                        name="Referral_Person_Name"
                                        value="{{ old('Referral_Person_Name', $setting->Referral_Person_Name) }}">
                                </div>

                                {{-- Mobile --}}
                                <div class="col-md-12 input-group-adss">
                                    <label>Mobile No</label>
                                    <input type="text"
                                        class="form-control"
                                        name="Mob_No"
                                        value="{{ old('Mob_No', $setting->Mob_No) }}">
                                </div>

                                {{-- Address --}}
                                <div class="col-md-12 input-group-adss">
                                    <label>Address</label>
                                    <textarea class="form-control"
                                        name="Address">{{ old('Address', $setting->Address) }}</textarea>
                                </div>

                                {{-- Logo --}}
                                <div class="col-md-12 input-group-adss">
                                    <label>Logo</label>
                                    <input type="file" class="form-control" name="logo_path">

                                    @if($setting->logo_path)
                                    <img src="{{ asset('uploads/appsettings/'.$setting->logo_path) }}"
                                        class="mt-2"
                                        width="80">
                                    @endif
                                </div>

                                {{-- Description --}}
                                <div class="col-md-12 input-group-adss">
                                    <label>Description</label>
                                    <textarea class="form-control"
                                        name="description">{{ old('description', $setting->description) }}</textarea>
                                </div>

                                {{-- Submit --}}
                                <div class="col-12 d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-info w-25">
                                        Update
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection