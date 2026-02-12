@extends('admin.include.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Rack Master</h4>
            </div>

            <div class="card-body">
                <h3 class="mb-4">Edit Rack</h3>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="row g-4"
                      action="{{ route('rack-master.update', $rackMaster->rack_id) }}"
                      method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Rack Code -->
                    <div class="col-md-6">
                        <label>Rack Code <span class="text-danger">*</span></label>
                        <input type="text"
                               name="rack_code"
                               class="form-control"
                               value="{{ old('rack_code', $rackMaster->rack_code) }}"
                                >
                        @error('rack_code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div class="col-md-6">
                        <label>Location <span class="text-danger">*</span></label>
                        <input type="text"
                               name="location"
                               class="form-control"
                               value="{{ old('location', $rackMaster->location) }}">
                        @error('location')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Capacity -->
                    <div class="col-md-6">
                        <label>Capacity <span class="text-danger">*</span></label>
                        <input type="number"
                               name="capacity"
                               class="form-control"
                               value="{{ old('capacity', $rackMaster->capacity) }}">
                        @error('capacity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Rack Type -->
                    <div class="col-md-6">
                        <label>Rack Type <span class="text-danger">*</span></label>
                        <input type="text"
                               name="rack_type"
                               class="form-control"
                               value="{{ old('rack_type', $rackMaster->rack_type) }}">
                        @error('rack_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="is_active" class="form-control">
                            <option value="1" {{ $rackMaster->is_active == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $rackMaster->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-info">
                            Update Rack
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
