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
                            <a href="{{ route('material-ctl') }}">Manage Material</a>
                        </li>
                        <li class="breadcrumb-item text-muted">Create Material</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('material-ctl') }}" class="btn btn-secondary float-end">
                        <i class="las la-arrow-left"></i> Back to Material List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body myform">
                <form action="{{ route('store-material-ctl') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">

                                <select name="material_id" id="material_id" class="form-control @error('material_id') is-invalid @enderror">
                                    <option value="">Select Material</option>
                                    @foreach($materials as $material)
                                    <option value="{{ $material->material_id }}">{{ $material->description }}</option>
                                    @endforeach
                                </select>
                                <label>Material ID</label>
                                @error('material_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="ctl_mat_no" class="form-control @error('ctl_mat_no') is-invalid @enderror" placeholder="CTL Material No"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>CTL Material No</label>
                                @error('ctl_mat_no')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="ctl_mat_description" class="form-control @error('ctl_mat_description') is-invalid @enderror" placeholder="CTL Material Description">
                                <label>CTL Material Description</label>
                                @error('ctl_mat_description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="kg_per_meter" class="form-control @error('kg_per_meter') is-invalid @enderror" placeholder="KG per Meter"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>KG per Meter</label>
                                @error('kg_per_meter')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="grade" class="form-control @error('grade') is-invalid @enderror" placeholder="Grade">
                                <label>Grade</label>
                                @error('grade')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="od" class="form-control @error('od') is-invalid @enderror" placeholder="OD"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>OD</label>
                                @error('od')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="thickness" class="form-control @error('thickness') is-invalid @enderror" placeholder="Thickness"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>Thickness</label>
                                @error('thickness')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="length_mtr" class="form-control @error('length_mtr') is-invalid @enderror" placeholder="Length (mtr)"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>Length (mtr)</label>
                                @error('length_mtr')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="nos_of_ctl_per_ml" class="form-control @error('nos_of_ctl_per_ml') is-invalid @enderror" placeholder="No of CTL per ML"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>No of CTL per ML</label>
                                @error('nos_of_ctl_per_ml')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="nos_of_ctl_required" class="form-control @error('nos_of_ctl_required') is-invalid @enderror" placeholder="Nos of CTL Required"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>Nos of CTL Required</label>
                                @error('nos_of_ctl_required')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="nos_of_ml_required" class="form-control @error('nos_of_ml_required') is-invalid @enderror" placeholder="Nos of ML Required"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>Nos of ML Required</label>
                                @error('nos_of_ml_required')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="ctl_weight" class="form-control @error('ctl_weight') is-invalid @enderror" placeholder="CTL Weight"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>CTL Weight</label>
                                @error('ctl_weight')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="ml_weight" class="form-control @error('ml_weight') is-invalid @enderror" placeholder="ML Weight"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>ML Weight</label>
                                @error('ml_weight')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="blade_thickness" class="form-control @error('blade_thickness') is-invalid @enderror" placeholder="Blade Thickness"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>Blade Thickness</label>
                                @error('blade_thickness')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="dust" class="form-control @error('dust') is-invalid @enderror" placeholder="Dust"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>Dust</label>
                                @error('dust')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="end_cut" class="form-control @error('end_cut') is-invalid @enderror" placeholder="End Cut"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>End Cut</label>
                                @error('end_cut')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="loss_percentage" class="form-control @error('loss_percentage') is-invalid @enderror" placeholder="Loss Percentage"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>Loss Percentage</label>
                                @error('loss_percentage')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="valuation_type" class="form-control @error('valuation_type') is-invalid @enderror" placeholder="Valuation Type">
                                <label>Valuation Type</label>
                                @error('valuation_type')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="quality_parameter" class="form-control @error('quality_parameter') is-invalid @enderror" placeholder="Quality Parameter"
                                    pattern="[0-9]+" title="Only numbers allowed" required>
                                <label>Quality Parameter</label>
                                @error('quality_parameter')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="las la-save"></i> Save Material
                        </button>
                        <a href="{{ route('material-ctl') }}" class="btn btn-secondary">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection