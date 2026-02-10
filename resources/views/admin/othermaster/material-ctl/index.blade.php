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
                            Manage Material
                        </li>
                    </ol>
                </div>
                @can('material_ctl.create')
                <div class="col-md-4">
                    <a href="{{ route('create-material') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create New Material</a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>

<br>

{{-- Search Form --}}
<div class="row">
    <div class="card-group mb-3">
        <div class="card">
            <div class="card-body myform">
                <form action="{{ route('material.index') }}" method="get">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="col-md-3 ps-md-3">
                            <div class="form-floating">
                                <input name="material_id" type="text" class="form-control" placeholder="Material ID">
                                <label>Material ID</label>
                            </div>
                        </div>
                        <div class="col-md-3 ps-md-3">
                            <div class="form-floating">
                                <input name="ctl_mat_no" type="text" class="form-control" placeholder="CTL Material No">
                                <label>CTL Material No</label>
                            </div>
                        </div>
                        <div class="col-md-3 ps-md-3">
                            <div class="form-floating">
                                <input name="grade" type="text" class="form-control" placeholder="Grade">
                                <label>Grade</label>
                            </div>
                        </div>
                        <div class="col-md-3 ps-md-3">
                            <button type="submit" class="btn btn-info w-100">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Table --}}
<div class="row">
    <div class="col-md-12">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>

                        <th>Material ID</th>
                        <th>CTL Material No</th>
                        <th>Description</th>
                        <th>KG per Meter</th>
                        <th>Grade</th>
                        <th>OD</th>
                        <th>Thickness</th>
                        <th>Length (mtr)</th>
                        <th>No of CTL per ML</th>
                        <th>nos_of_ctl_required</th>
                        <th>nos_of_ml_required</th>
                        <th>CTL Weight</th>
                        <th>ml_weight</th>
                        <th>blade_thickness</th>
                        <th>dust</th>
                        <th>end_cut</th>
                        <th>loss_percentage</th>
                        <th>valuation_type</th>
                        <th>quality_parameter</th>
                        @can('material_ctl.update') <th>Edit</th> @endcan
                        @can('material_ctl.delete') <th>Delete</th> @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($materials as $item)
                    <tr>

                        <td>{{ $item->material_id }}</td>
                        <td>{{ $item->ctl_mat_no }}</td>
                        <td>{{ $item->ctl_mat_description }}</td>
                        <td>{{ $item->kg_per_meter }}</td>
                        <td>{{ $item->grade }}</td>
                        <td>{{ $item->od }}</td>
                        <td>{{ $item->thickness }}</td>
                        <td>{{ $item->length_mtr }}</td>
                        <td>{{ $item->nos_of_ctl_per_ml }}</td>
                        <td>{{ $item->nos_of_ctl_required }}</td>
                        <td>{{ $item->nos_of_ml_required }}</td>
                        <td>{{ $item->ctl_weight }}</td>
                        <td>{{ $item->ml_weight }}</td>
                        <td>{{ $item->blade_thickness }}</td>
                        <td>{{ $item->dust }}</td>
                        <td>{{ $item->end_cut }}</td>
                        <td>{{ $item->loss_percentage }}</td>
                        <td>{{ $item->valuation_type }}</td>
                        <td>{{ $item->quality_parameter }}</td>

                        <td><a href="{{ route('edit-material', $item->material_ctl_id) }}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>

                        <td><a href="{{ route('delete-material', $item->material_ctl_id) }}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="py-4">
                {{ $materials->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection