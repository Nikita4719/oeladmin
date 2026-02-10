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
                        <li class="breadcrumb-item active">Rack Master</li>
                    </ol>
                </div>

                <div class="col-md-4 text-end">
                    <a href="{{ route('rack-master.create') }}" class="btn btn-success">
                        <i class="las la-plus"></i> Create Rack
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
            <form method="GET" action="{{ route('rack-master') }}">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <input type="text" name="rack_code" class="form-control" placeholder="Rack Code" value="{{ request('rack_code') }}">
                    </div>

                    <div class="col-md-4">
                        <button class="btn btn-info">Search</button>
                        <a href="{{ route('rack-master') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<br>

{{-- Table --}}
<div class="row">
    <div class="col-md-12">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Rack Code</th>
                        <th>Location</th>
                        <th>Capacity</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($rackMasters as $rack)
                        <tr>
                            <td>{{ $loop->iteration + ($rackMasters->currentPage() - 1) * $rackMasters->perPage() }}</td>
                            <td>{{ $rack->rack_code }}</td>
                            <td>{{ $rack->location }}</td>
                            <td>{{ $rack->capacity }}</td>
                            <td>{{ $rack->rack_type }}</td>
                            <td>
                                <span class="badge {{ $rack->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $rack->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            {{-- Edit Button --}}
                            <td>
                                <a href="{{ route('rack-master.edit', $rack->rack_id) }}" class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </a>
                            </td>

                            {{-- Delete Button (using your GET route) --}}
                            <td>
                                <a href="{{ route('rack-master.delete', $rack->rack_id) }}"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to delete this rack?')">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No racks found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $rackMasters->withQueryString()->links() }}
        </div>
    </div>
</div>

@endsection
