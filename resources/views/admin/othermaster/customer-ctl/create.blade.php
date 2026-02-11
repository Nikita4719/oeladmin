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
                <div class="col-md-4">
                    <a href="{{ route('customer-ctl') }}" class="btn btn-secondary float-end">
                        <i class="las la-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body myform">
                <form action="{{ route('store-customer-ctl') }}" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" name="customer_id" class="form-control @error('customer_id') is-invalid @enderror" placeholder="Customer ID" value="{{ old('customer_id') }}">
                        <label>Customer ID</label>
                        @error('customer_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="material_id" class="form-control @error('material_id') is-invalid @enderror" placeholder="Material ID" value="{{ old('material_id') }}">
                        <label>Material ID</label>
                        @error('material_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="material_ctl_id" class="form-control @error('material_ctl_id') is-invalid @enderror" placeholder="Material CTL ID" value="{{ old('material_ctl_id') }}">
                        <label>Material CTL ID</label>
                        @error('material_ctl_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" name="min_maintain_buffer_qty" class="form-control @error('min_maintain_buffer_qty') is-invalid @enderror" placeholder="Min Buffer Qty" value="{{ old('min_maintain_buffer_qty') }}">
                        <label>Min Maintain Buffer Qty</label>
                        @error('min_maintain_buffer_qty') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" name="max_maintain_buffer_qty" class="form-control @error('max_maintain_buffer_qty') is-invalid @enderror" placeholder="Max Buffer Qty" value="{{ old('max_maintain_buffer_qty') }}">
                        <label>Max Maintain Buffer Qty</label>
                        @error('max_maintain_buffer_qty') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" name="available_buffer_qty" class="form-control @error('available_buffer_qty') is-invalid @enderror" placeholder="Available Buffer Qty" value="{{ old('available_buffer_qty') }}">
                        <label>Available Buffer Qty</label>
                        @error('available_buffer_qty') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="buffer_status" class="form-control @error('buffer_status') is-invalid @enderror" placeholder="Buffer Status" value="{{ old('buffer_status') }}">
                        <label>Buffer Status</label>
                        @error('buffer_status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea name="comments" class="form-control @error('comments') is-invalid @enderror" placeholder="Comments">{{ old('comments') }}</textarea>
                        <label>Comments</label>
                        @error('comments') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            <i class="las la-save"></i> Save
                        </button>
                        <a href="{{ route('customer-ctl') }}" class="btn btn-secondary">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
