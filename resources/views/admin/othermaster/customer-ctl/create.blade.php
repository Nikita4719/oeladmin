@extends('admin.include.app')
@section('main-content')

<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Add Customer Material
                        </li>
                    </ol>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('customer-ctl') }}" class="btn btn-secondary">
                        <i class="las la-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('store-customer-ctl') }}" method="POST">
                    @csrf

                    <!-- Row 1 -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Customer ID</label>
                            <input type="text" name="customer_id"
                                class="form-control @error('customer_id') is-invalid @enderror"
                                value="{{ old('customer_id') }}"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            @error('customer_id') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Material ID</label>
                            <input type="text" name="material_id"
                                class="form-control @error('material_id') is-invalid @enderror"
                                value="{{ old('material_id') }}"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            @error('material_id') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Material CTL ID</label>
                            <input type="text" name="material_ctl_id"
                                class="form-control @error('material_ctl_id') is-invalid @enderror"
                                value="{{ old('material_ctl_id') }}"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            @error('material_ctl_id') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Min Maintain Buffer Qty</label>
                            <input type="number" name="min_maintain_buffer_qty"
                                class="form-control @error('min_maintain_buffer_qty') is-invalid @enderror"
                                value="{{ old('min_maintain_buffer_qty') }}"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            @error('min_maintain_buffer_qty') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Max Maintain Buffer Qty</label>
                            <input type="number" name="max_maintain_buffer_qty"
                                class="form-control @error('max_maintain_buffer_qty') is-invalid @enderror"
                                value="{{ old('max_maintain_buffer_qty') }}"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            @error('max_maintain_buffer_qty') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Available Buffer Qty</label>
                            <input type="number" name="available_buffer_qty"
                                class="form-control @error('available_buffer_qty') is-invalid @enderror"
                                value="{{ old('available_buffer_qty') }}"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            @error('available_buffer_qty') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Buffer Status</label>
                            <select name="buffer_status"
                                class="form-select @error('buffer_status') is-invalid @enderror">
                                <option value="">Select Status</option>
                                <option value="OK" {{ old('buffer_status') == 'OK' ? 'selected' : '' }}>OK</option>
                                <option value="LOW" {{ old('buffer_status') == 'LOW' ? 'selected' : '' }}>LOW</option>
                                <option value="CRITICAL" {{ old('buffer_status') == 'CRITICAL' ? 'selected' : '' }}>CRITICAL</option>
                            </select>
                            @error('buffer_status') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-8">
                            <label class="form-label">Comments</label>
                            <textarea name="comments"
                                class="form-control @error('comments') is-invalid @enderror"
                                rows="3">{{ old('comments') }}</textarea>
                            @error('comments') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Active Switch -->
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox"
                            name="is_active" id="is_active" value="1"
                            {{ old('is_active') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="las la-save"></i> Save
                        </button>
                        <a href="{{ route('customer-ctl') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
