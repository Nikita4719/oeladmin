@extends('admin.include.app')

@section('main-content')

<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Material Master</li>
                    </ol>
                </div>

                <div class="col-md-4 text-end">
                    <a href="{{ route('material-master.create') }}" class="btn btn-success">
                        <i class="las la-plus"></i> Create Material
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

{{-- Search --}}
<div class="row">
    <div class="card">
        <div class="card-body">
            <form method="GET" action="">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <input type="text" name="material_code" class="form-control" placeholder="Material Code" value="{{ request('material_code') }}">
                    </div>

                    <div class="col-md-4">
                        <button class="btn btn-info">Search</button>
                        <a href="" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<br>


<div class="row">
    <div class="col-md-12">

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>S.N</th>
                        <th>Code</th>
                        <th>Material ID</th>
                        <th>Description</th>
                        <th>OD</th>
                        <th>Thickness</th>
                        <th>Length (Mtr)</th>
                        <th>Kg per Meter</th>
                        <th>Grade</th>
                        <th>Material Group</th>
                       
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($materials as $material)
                    <tr>
                        <td>{{ $loop->iteration + ($materials->currentPage() - 1) * $materials->perPage() }}</td>
                        <td>{{ $material->code }}</td>
                        <td>{{ $material->material_id }}</td>
                        <td>{{ $material->discription }}</td>
                        <td>{{ $material->od }}</td>
                        <td>{{ $material->thickness }}</td>
                        <td>{{ $material->length_mtr }}</td>
                        <td>{{ $material->kg_per_meter }}</td>
                        <td>{{ $material->grade }}</td>
                        <td>{{ $material->material_group }}</td>
                       
                        <td>
                            <a href="{{ route('material-master.edit', $material->material_id) }}" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                        </td>
                        <td>
                            <form action="{{ route('material-master.destroy', $material->material_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="13" class="text-center">No materials found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex justify-content-end">
                {{ $materials->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>

@endsection