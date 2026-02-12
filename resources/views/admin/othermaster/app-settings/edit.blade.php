@extends('admin.include.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body">

                <p class="mb-4">Edit App Settings</p>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('appsettings.update', $setting->setting_id) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Vendor Code --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Vendor Code <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   class="form-control @error('Vendor_Code') is-invalid @enderror"
                                   name="Vendor_Code"
                                   value="{{ old('Vendor_Code', $setting->Vendor_Code) }}"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                   required>
                            @error('Vendor_Code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Mobile --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mobile No</label>
                            <input type="text"
                                   class="form-control @error('Mob_No') is-invalid @enderror"
                                   name="Mob_No"
                                   value="{{ old('Mob_No', $setting->Mob_No) }}"
                                   maxlength="10"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            @error('Mob_No')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Referral Person --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Referral Person Name</label>
                            <input type="text"
                                   class="form-control @error('Referral_Person_Name') is-invalid @enderror"
                                   name="Referral_Person_Name"
                                   value="{{ old('Referral_Person_Name', $setting->Referral_Person_Name) }}">
                            @error('Referral_Person_Name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Logo --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Logo</label>
                            <input type="file"
                                   class="form-control @error('logo_path') is-invalid @enderror"
                                   name="logo_path">
                            @error('logo_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if($setting->logo_path)
                                <div class="mt-2">
                                    <img src="{{ asset('uploads/appsettings/'.$setting->logo_path) }}"
                                         width="80"
                                         class="border rounded p-1">
                                </div>
                            @endif
                        </div>

                        {{-- Address --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control @error('Address') is-invalid @enderror"
                                      name="Address"
                                      rows="3">{{ old('Address', $setting->Address) }}</textarea>
                            @error('Address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      name="description"
                                      rows="3">{{ old('description', $setting->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    {{-- Buttons --}}
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-info px-5">
                            Update
                        </button>
                        <a href="{{ route('appsettings.index') }}" class="btn btn-secondary ms-2 px-4">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
