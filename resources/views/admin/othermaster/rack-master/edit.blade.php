@extends('admin.include.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
        

            <div class="card-body">
                <p class="mb-4">Edit Rack</p>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="row g-4"
                      action="{{ route('rack-master.update', $rackMaster->rack_id) }}"
                      method="POST">
                    @csrf
                    @method('PUT') <!-- Update ke liye PUT method -->

                    <!-- Rack Code -->
                    <div class="col-md-6">
                        <label>Rack Code <span class="text-danger">*</span></label>
                        <input type="text"
                               name="rack_code"
                               class="form-control"
                               value="{{ old('rack_code', $rackMaster->rack_code) }}"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
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
                    <div class="col-md-6 mb-3">
                        <label for="rack_type" class="form-label">Rack Type <span class="text-danger">*</span></label>
                        <select name="rack_type" id="rack_type" class="form-select" required>
                            <option value="">--Select Rack Type--</option>
                            <option value="RAW_MATERIAL" @if ($rackMaster->rack_type == 'RAW_MATERIAL') selected @endif>RAW MATERIAL</option>
                            <option value="BUFFER_STOCK" @if ($rackMaster->rack_type == 'BUFFER_STOCK') selected @endif>BUFFER STOCK</option>
                        </select>

                        @error('rack_type')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    

                    <div class="col-12">
                        <button type="submit" class="btn btn-info">
                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
