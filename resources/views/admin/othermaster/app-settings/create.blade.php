@extends('admin.include.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">

          
            <div class="card-body">

               <p>Add App Settings</p>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('appsettings.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- Vendor Code --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Vendor Code <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   class="form-control @error('Vendor_Code') is-invalid @enderror"
                                   name="Vendor_Code"
                                   value="{{ old('Vendor_Code') }}"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            @error('Vendor_Code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Mobile No --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mobile No</label>
                            <input type="text"
                                   class="form-control @error('Mob_No') is-invalid @enderror"
                                   name="Mob_No"
                                   value="{{ old('Mob_No') }}"
                                   maxlength="10"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            @error('Mob_No')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Referral Person Name --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Referral Person Name</label>
                            <input type="text"
                                   class="form-control @error('Referral_Person_Name') is-invalid @enderror"
                                   name="Referral_Person_Name"
                                   value="{{ old('Referral_Person_Name') }}">
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
                        </div>

                        {{-- Address --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control @error('Address') is-invalid @enderror"
                                      name="Address"
                                      rows="3">{{ old('Address') }}</textarea>
                            @error('Address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      name="description"
                                      rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    {{-- Submit Button --}}
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-info px-5">
                            Submit
                        </button>
                        <button type="reset" class="btn btn-secondary ms-2 px-4">
                            Reset
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
