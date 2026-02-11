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
                        <li class="breadcrumb-item text-muted">Edit Material</li>
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
                <form action="{{ route('update-material-ctl', $materials->material_ctl_id) }}" method="POST">
                    @csrf
                    @method('POST') {{-- if you are using POST route for update --}}
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <select name="material_id" id="material_id" class="form-control @error('material_id') is-invalid @enderror">
                                <option value="">Select Material</option>
                                @foreach($allMaterials as $material)
                                    <option value="{{ $material->material_id }}" {{ old('material_id', $materials->material_id) == $material->material_id ? 'selected' : '' }}>{{ $material->description }}</option>
                                @endforeach
                            </select>
                              
                                <label>Material ID</label>
                                @error('material_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="ctl_mat_no" value="{{ old('ctl_mat_no', $materials->ctl_mat_no) }}" class="form-control @error('ctl_mat_no') is-invalid @enderror" placeholder="CTL Material No">
                                <label>CTL Material No</label>
                                @error('ctl_mat_no')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="ctl_mat_description" value="{{ old('ctl_mat_description', $materials->ctl_mat_description) }}" class="form-control @error('ctl_mat_description') is-invalid @enderror" placeholder="CTL Material Description">
                                <label>CTL Material Description</label>
                                @error('ctl_mat_description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="kg_per_meter" value="{{ old('kg_per_meter', $materials->kg_per_meter) }}" class="form-control @error('kg_per_meter') is-invalid @enderror" placeholder="KG per Meter">
                                <label>KG per Meter</label>
                                @error('kg_per_meter')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="grade" value="{{ old('grade', $materials->grade) }}" class="form-control @error('grade') is-invalid @enderror" placeholder="Grade">
                                <label>Grade</label>
                                @error('grade')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="od" value="{{ old('od', $materials->od) }}" class="form-control @error('od') is-invalid @enderror" placeholder="OD">
                                <label>OD</label>
                                @error('od')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="thickness" value="{{ old('thickness', $materials->thickness) }}" class="form-control @error('thickness') is-invalid @enderror" placeholder="Thickness">
                                <label>Thickness</label>
                                @error('thickness')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="length_mtr" value="{{ old('length_mtr', $materials->length_mtr) }}" class="form-control @error('length_mtr') is-invalid @enderror" placeholder="Length (mtr)">
                                <label>Length (mtr)</label>
                                @error('length_mtr')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="nos_of_ctl_per_ml" value="{{ old('nos_of_ctl_per_ml', $materials->nos_of_ctl_per_ml) }}" class="form-control @error('nos_of_ctl_per_ml') is-invalid @enderror" placeholder="No of CTL per ML">
                                <label>No of CTL per ML</label>
                                @error('nos_of_ctl_per_ml')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="nos_of_ctl_required" value="{{ old('nos_of_ctl_required', $materials->nos_of_ctl_required) }}" class="form-control @error('nos_of_ctl_required') is-invalid @enderror" placeholder="Nos of CTL Required">
                                <label>Nos of CTL Required</label>
                                @error('nos_of_ctl_required')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="nos_of_ml_required" value="{{ old('nos_of_ml_required', $materials->nos_of_ml_required) }}" class="form-control @error('nos_of_ml_required') is-invalid @enderror" placeholder="Nos of ML Required">
                                <label>Nos of ML Required</label>
                                @error('nos_of_ml_required')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="ctl_weight" value="{{ old('ctl_weight', $materials->ctl_weight) }}" class="form-control @error('ctl_weight') is-invalid @enderror" placeholder="CTL Weight">
                                <label>CTL Weight</label>
                                @error('ctl_weight')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="ml_weight" value="{{ old('ml_weight', $materials->ml_weight) }}" class="form-control @error('ml_weight') is-invalid @enderror" placeholder="ML Weight">
                                <label>ML Weight</label>
                                @error('ml_weight')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="blade_thickness" value="{{ old('blade_thickness', $materials->blade_thickness) }}" class="form-control @error('blade_thickness') is-invalid @enderror" placeholder="Blade Thickness">
                                <label>Blade Thickness</label>
                                @error('blade_thickness')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="dust" value="{{ old('dust', $materials->dust) }}" class="form-control @error('dust') is-invalid @enderror" placeholder="Dust">
                                <label>Dust</label>
                                @error('dust')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="end_cut" value="{{ old('end_cut', $materials->end_cut) }}" class="form-control @error('end_cut') is-invalid @enderror" placeholder="End Cut">
                                <label>End Cut</label>
                                @error('end_cut')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="loss_percentage" value="{{ old('loss_percentage', $materials->loss_percentage) }}" class="form-control @error('loss_percentage') is-invalid @enderror" placeholder="Loss Percentage">
                                <label>Loss Percentage</label>
                                @error('loss_percentage')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="valuation_type" value="{{ old('valuation_type', $materials->valuation_type) }}" class="form-control @error('valuation_type') is-invalid @enderror" placeholder="Valuation Type">
                                <label>Valuation Type</label>
                                @error('valuation_type')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-floating">
                                <input type="text" name="quality_parameter" value="{{ old('quality_parameter', $materials->quality_parameter) }}" class="form-control @error('quality_parameter') is-invalid @enderror" placeholder="Quality Parameter">
                                <label>Quality Parameter</label>
                                @error('quality_parameter')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-success">
                            <i class="las la-save"></i> Update Material
                        </button>
                        <a href="{{ route('material-ctl') }}" class="btn btn-secondary">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
