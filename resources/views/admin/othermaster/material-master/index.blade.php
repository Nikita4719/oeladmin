@extends('admin.include.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Material Master</h4>
                <a href="{{ route('material-master.create') }}" class="btn btn-primary btn-sm">Add Material</a>
            </div>

            <div class="card-body">

                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
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
                                <th>Status</th>
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
                                    <span class="badge {{ $material->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $material->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
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
    </div>
</div>
@endsection