@extends('admin.include.app')

@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('shift') }}">Manage Shift</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Edit Shift
                        </li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('shift') }}" class="btn btn-secondary float-end">
                        <i class="las la-arrow-left"></i> Back to Shift List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body myform">
                <form action="{{ route('update-shift', $shift->shift_id) }}" method="post">
                    @csrf

                    {{-- Shift Name --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="shift_name" class="form-control @error('shift_name') is-invalid @enderror" id="shift_name" placeholder="Shift Name" value="{{ old('shift_name', $shift->shift_name) }}">
                        <label for="shift_name">Shift Name</label>
                        @error('shift_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Shift Description --}}
                    <div class="form-floating mb-3">
                        <textarea name="shift_description" class="form-control @error('shift_description') is-invalid @enderror" id="shift_description" placeholder="Shift Description">{{ old('shift_description', $shift->shift_description) }}</textarea>
                        <label for="shift_description">Shift Description</label>
                        @error('shift_description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Location --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="location" placeholder="Location" value="{{ old('location', $shift->location) }}">
                        <label for="location">Location</label>
                        @error('location')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Is Active --}}
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $shift->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            <i class="las la-save"></i> Update Shift
                        </button>
                        <a href="{{ route('shift') }}" class="btn btn-secondary">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
