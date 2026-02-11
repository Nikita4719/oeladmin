@extends('admin.include.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Add Material</h4>
                <a href="{{ route('material-master.index') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>

            <div class="card-body">

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('material-master.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="code" class="form-label">Code <span class="text-danger">*</span></label>
                            <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" required
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        </div>

                        <div class="col-md-4">
                            <label for="material_id" class="form-label">Material ID <span class="text-danger">*</span></label>
                            {{-- Auto-increment, read-only --}}
                            <input type="text" name="material_id" id="material_id" class="form-control" value="{{ $nextId ?? '' }}" readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="od" class="form-label">OD (Outer Diameter) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="od" id="od" class="form-control" value="{{ old('od') }}" required>
                        </div>

                        <div class="col-md-3">
                            <label for="thickness" class="form-label">Thickness <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="thickness" id="thickness" class="form-control" value="{{ old('thickness') }}" required>
                        </div>

                        <div class="col-md-3">
                            <label for="length_mtr" class="form-label">Length (Mtr) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="length_mtr" id="length_mtr" class="form-control" value="{{ old('length_mtr') }}" required>
                        </div>

                        <div class="col-md-3">
                            <label for="kg_per_meter" class="form-label">Kg per Meter <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="kg_per_meter" id="kg_per_meter" class="form-control" value="{{ old('kg_per_meter') }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="grade" class="form-label">Grade <span class="text-danger">*</span></label>
                            <input type="text" name="grade" id="grade" class="form-control" value="{{ old('grade') }}" required>
                        </div>

                        <div class="col-md-4">
                            <label for="material_group" class="form-label">Material Group <span class="text-danger">*</span></label>
                            <input type="text" name="material_group" id="material_group" class="form-control" value="{{ old('material_group') }}" required>
                        </div>

                        <div class="col-md-4">
                            <label for="is_active" class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="is_active" id="is_active" class="form-select" required>
                                <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Save Material</button>
                            <a href="{{ route('material-master.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection