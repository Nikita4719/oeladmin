@extends('admin.include.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">

           

            <div class="card-body">
<p>Edit Work Center</p>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('work-center.update', $workCenter->work_center_id) }}" method="POST">
                    @csrf
                    @method('POST') {{-- agar PUT use karna ho to @method('PUT') karo --}}

                    <div class="row">

                        {{-- Work Center Name --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Work Center Name <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   class="form-control @error('work_center_name') is-invalid @enderror"
                                   name="work_center_name"
                                   value="{{ old('work_center_name', $workCenter->work_center_name) }}">
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
                                   value="{{ old('location', $workCenter->location) }}">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control @error('work_center_description') is-invalid @enderror"
                                      name="work_center_description"
                                      rows="3">{{ old('work_center_description', $workCenter->work_center_description) }}</textarea>
                            @error('work_center_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                       

                    </div>

                    {{-- Buttons --}}
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-info px-5">
                            Update
                        </button>
                        <a href="{{ route('work-center.index') }}" class="btn btn-secondary ms-2 px-4">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
