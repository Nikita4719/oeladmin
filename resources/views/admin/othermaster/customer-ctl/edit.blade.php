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
               
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('store-customer-ctl' ,$customer_ctl->customer_ctl_id) }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <select name="material_id" id="material_id" class="form-select @error('material_id') is-invalid @enderror">
                                    <option value="">Select Material </option>
                                    @foreach($allMaterials as $material)
                                    <option value="{{ $material->material_id }}" {{ $customer_ctl->material_id == $material->material_id ? 'selected' : '' }}>{{ $material->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('material_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Material CTL ID --}}
                        <div class="col-md-4">
                            <div class="form-floating">
                                <select name="material_ctl_id" id="material_ctl_id" class="form-select @error('material_ctl_id') is-invalid @enderror">
                                    <option value="">Select Material CTL</option>
                                    @foreach($material_ctls as $material_ctl)
                                    <option value="{{ $material_ctl->material_ctl_id }}" {{  $customer_ctl->material_ctl_id == $material_ctl->material_ctl_id ? 'selected' : '' }}>{{ $material_ctl->ctl_mat_description }}</option>
                                    @endforeach
                                </select>
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
                                    value="{{ old('min_maintain_buffer_qty', $customer_ctl->min_maintain_buffer_qty) }}">
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
                                    value="{{ old('max_maintain_buffer_qty' , $customer_ctl->max_maintain_buffer_qty) }}">
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
                                    value="{{ old('available_buffer_qty' , $customer_ctl->available_buffer_qty) }}">
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
                                    <option value="OK" {{  $customer_ctl->buffer_status == 'OK' ? 'selected' : '' }}>OK</option>
                                    <option value="LOW" {{  $customer_ctl->buffer_status == 'LOW' ? 'selected' : '' }}>LOW</option>
                                    <option value="CRITICAL" {{  $customer_ctl->buffer_status == 'CRITICAL' ? 'selected' : '' }}>CRITICAL</option>
                                </select>
                                <label>Buffer Status</label>
                            </div>
                            @error('buffer_status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Comments --}}
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea name="comments"
                                    class="form-control @error('comments') is-invalid @enderror"
                                    placeholder="Comments"
                                    style="height:100px">{{ old('comments', $customer_ctl->comments) }}</textarea>
                                <label>Comments</label>
                            </div>
                            @error('comments')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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