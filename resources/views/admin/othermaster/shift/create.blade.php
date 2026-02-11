@extends('admin.include.app')

@section('main-content')

<div class="row mb-3">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('shift') }}">Manage Shift</a>
                    </li>
                    <li class="breadcrumb-item active">Create Shift</li>
                </ol>

                <a href="{{ route('shift') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="las la-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">Create New Shift</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('store-shift') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- Shift Name --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Shift Name <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="shift_name"
                                   class="form-control @error('shift_name') is-invalid @enderror"
                                   value="{{ old('shift_name') }}">
                            @error('shift_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Location --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Location</label>
                            <input type="text"
                                   name="location"
                                   class="form-control @error('location') is-invalid @enderror"
                                   value="{{ old('location') }}">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Shift Description</label>
                            <textarea name="shift_description"
                                      class="form-control @error('shift_description') is-invalid @enderror"
                                      rows="2">{{ old('shift_description') }}</textarea>
                            @error('shift_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="is_active"
                                       value="1"
                                       {{ old('is_active', 1) ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>
                        </div>

                    </div>

                    {{-- Buttons --}}
                    <div class="text-end mt-3">
                        <a href="{{ route('shift') }}" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-success">
                            <i class="las la-save"></i> Save Shift
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
