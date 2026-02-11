@extends('admin.include.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title mb-0">Manage Work Center</h4>
            </div>

            <div class="card-body">

                <div class="mb-4">
                    <h3>Add Work Center</h3>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('work-center.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- Work Center Name --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Work Center Name <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   class="form-control @error('work_center_name') is-invalid @enderror"
                                   name="work_center_name"
                                   value="{{ old('work_center_name') }}">
                            @error('work_center_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Location --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Location</label>
                            <input type="text"
                                   class="form-control @error('location') is-invalid @enderror"
                                   name="location"
                                   value="{{ old('location') }}">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control @error('work_center_description') is-invalid @enderror"
                                      name="work_center_description"
                                      rows="3">{{ old('work_center_description') }}</textarea>
                            @error('work_center_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Status <span class="text-danger">*</span>
                            </label>
                            <select class="form-control @error('is_active') is-invalid @enderror"
                                    name="is_active">
                                <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-info px-5">
                            Submit
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
