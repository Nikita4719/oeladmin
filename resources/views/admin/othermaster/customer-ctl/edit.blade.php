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
                            <a href="{{ route('customer-ctl') }}">Manage Customer Material</a>
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

                    <div class="row g-3">

                        {{-- Customer ID --}}
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="customer_id"
                                    class="form-control @error('customer_id') is-invalid @enderror"
                                    placeholder="Customer ID"
                                    value="{{ old('customer_id') }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                <label>Customer ID</label>
                            </div>
                            @error('customer_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Material ID --}}
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="material_id"
                                    class="form-control @error('material_id') is-invalid @enderror"
                                    placeholder="Material ID"
                                    value="{{ old('material_id') }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                <label>Material ID</label>
                            </div>
                            @error('material_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Material CTL ID --}}
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="material_ctl_id"
                                    class="form-control @error('material_ctl_id') is-invalid @enderror"
                                    placeholder="Material CTL ID"
                                    value="{{ old('material_ctl_id') }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                <label>Material CTL ID</label>
                            </div>
                            @error('material_ctl_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Min Buffer --}}
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" name="min_maintain_buffer_qty"
                                    class="form-control @error('min_maintain_buffer_qty') is-invalid @enderror"
                                    placeholder="Min Maintain Buffer Qty"
                                    value="{{ old('min_maintain_buffer_qty') }}">
                                <label>Min Maintain Buffer Qty</label>
                            </div>
                            @error('min_maintain_buffer_qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Max Buffer --}}
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" name="max_maintain_buffer_qty"
                                    class="form-control @error('max_maintain_buffer_qty') is-invalid @enderror"
                                    placeholder="Max Maintain Buffer Qty"
                                    value="{{ old('max_maintain_buffer_qty') }}">
                                <label>Max Maintain Buffer Qty</label>
                            </div>
                            @error('max_maintain_buffer_qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Available Buffer --}}
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" name="available_buffer_qty"
                                    class="form-control @error('available_buffer_qty') is-invalid @enderror"
                                    placeholder="Available Buffer Qty"
                                    value="{{ old('available_buffer_qty') }}">
                                <label>Available Buffer Qty</label>
                            </div>
                            @error('available_buffer_qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Buffer Status --}}
                        <div class="col-md-4">
                            <div class="form-floating">
                                <select name="buffer_status"
                                    class="form-select @error('buffer_status') is-invalid @enderror">
                                    <option value="">Select Status</option>
                                    <option value="OK" {{ old('buffer_status') == 'OK' ? 'selected' : '' }}>OK</option>
                                    <option value="LOW" {{ old('buffer_status') == 'LOW' ? 'selected' : '' }}>LOW</option>
                                    <option value="CRITICAL" {{ old('buffer_status') == 'CRITICAL' ? 'selected' : '' }}>CRITICAL</option>
                                </select>
                                <label>Buffer Status</label>
                            </div>
                            @error('buffer_status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Comments --}}
                        <div class="col-md-8">
                            <div class="form-floating">
                                <textarea name="comments"
                                    class="form-control @error('comments') is-invalid @enderror"
                                    placeholder="Comments"
                                    style="height:100px">{{ old('comments') }}</textarea>
                                <label>Comments</label>
                            </div>
                            @error('comments')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Active --}}
                        <div class="col-md-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox"
                                    name="is_active" value="1"
                                    {{ old('is_active', 1) ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="col-md-12 d-flex justify-content-end gap-2 mt-3">
                            <a href="{{ route('customer-ctl') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">
                                <i class="las la-save"></i> Save
                            </button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
