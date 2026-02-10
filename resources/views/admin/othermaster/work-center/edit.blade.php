@extends('admin.include.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title mb-0">Edit Work Center</h4>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="row"
                      action="{{ route('work-center.update', $workCenter->work_center_id) }}"
                      method="POST">

                    @csrf

                    {{-- Work Center Name --}}
                    <div class="col-md-12 input-group-adss">
                        <label>Work Center Name <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control"
                               name="work_center_name"
                               value="{{ old('work_center_name', $workCenter->work_center_name) }}">
                        @error('work_center_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-md-12 input-group-adss">
                        <label>Description</label>
                        <textarea class="form-control"
                                  name="work_center_description">{{ old('work_center_description', $workCenter->work_center_description) }}</textarea>
                    </div>

                    {{-- Location --}}
                    <div class="col-md-12 input-group-adss">
                        <label>Location</label>
                        <input type="text"
                               class="form-control"
                               name="location"
                               value="{{ old('location', $workCenter->location) }}">
                    </div>

                    {{-- Status --}}
                    <div class="col-md-12 input-group-adss">
                        <label>Status <span class="text-danger">*</span></label>
                        <select class="form-control" name="is_active">
                            <option value="1" {{ $workCenter->is_active == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $workCenter->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('is_active')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="col-md-12 d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-info w-25">Update</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
