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
                            Manage Shift
                        </li>
                    </ol>
                </div>

                {{-- Create Button --}}
                <div class="col-md-4">
                    <a href="{{ route('create-shift') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i> Create New Shift
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

{{-- Filter/Search Form --}}
<div class="row">
    <div class="card-group mb-md-3">
        <div class="card">
            <div class="card-body myform">
                <form id="shift-filter" action="{{ route('shift-filter') }}" method="get">
                    <div class="d-flex justify-content-between align-items-center row">
                        {{-- Shift Name --}}
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input id="shift-name" name="name" type="text" class="form-control" placeholder="Shift Name" value="{{ request('name') }}">
                                <label for="shift-name">Shift Name</label>
                            </div>
                        </div>

                        {{-- Active Status --}}
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-control" name="is_active">
                                    <option value="">Select Status</option>
                                    <option value="1" @if(request('is_active')==='1') selected @endif>Active</option>
                                    <option value="0" @if(request('is_active')==='0') selected @endif>Inactive</option>
                                </select>
                                <label>Status</label>
                            </div>
                        </div>

                        {{-- Search / Reset Buttons --}}
                        <div class="col-md-12 mt-3 row">
                            <div class="col ps-2">
                                <button type="submit" class="btn btn-info w-100">Search</button>
                            </div>
                            <div class="col ps-2">
                                <a href="{{ route('shift') }}" class="btn btn-secondary w-100">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Shift Table --}}
<div class="row">
    <div class="col-md-12">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Shift Name</th>
                        <th>Shift Description</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shift as $item)
                    <tr>
                        <td>{{ $loop->index + (($shift->currentPage() - 1) * $shift->perPage()) + 1 }}</td>
                        <td>{{ $item->shift_name }}</td>
                        <td>{{ $item->shift_description ?? '-' }}</td>
                        <td>{{ $item->location ?? '-' }}</td>
                        <td>{{ $item->is_active ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('edit-shift', $item->shift_id) }}" class="btn btn-info">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('delete-shift', $item->shift_id) }}" class="btn btn-warning">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="row mt-3">
                <div class="col-md-12">
                    {{ $shift->withQueryString()->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
