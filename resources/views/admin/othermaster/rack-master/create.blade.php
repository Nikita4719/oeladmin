@extends('admin.include.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-4">Create Rack</p>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <form class="row g-4"
                    action="{{ route('rack-master.store') }}"
                    method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label>Rack Code <span class="text-danger">*</span></label>
                        <input type="number"
                            name="rack_code"
                            class="form-control"
                            value=""
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>

                    <div class="col-md-6">
                        <label>Location <span class="text-danger">*</span></label>
                        <input type="text" name="location" class="form-control" value="">
                        @error('location')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label>Capacity <span class="text-danger">*</span></label>
                        <input type="number" name="capacity" class="form-control" value="">
                        @error('capacity')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="rack_type" class="form-label">Rack Type <span class="text-danger">*</span></label>
                        <select name="rack_type" id="rack_type" class="form-select" required>
                            <option value="">--Select Rack Type--</option>
                            <option value="RAW_MATERIAL">RAW MATERIAL</option>
                            <option value="BUFFER_STOCK">BUFFER STOCK</option>
                        </select>

                        @error('rack_type')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Save Rack</button>
                        <a href="{{ route('rack-master') }}" class="btn btn-secondary ms-2">Back</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection