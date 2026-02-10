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
                            Work Center
                        </li>
                    </ol>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('work-center.create') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i> Create Work Center
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<br>

{{-- Search --}}
<div class="row">
    <div class="card-group">
        <div class="card">
            <div class="card-body myform">
                <form action="{{ route('work-center.index') }}" method="GET">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="form-floating">
                                <input type="text" name="work_center_name"
                                    class="form-control"
                                    placeholder="Work Center Name"
                                    value="{{ request('work_center_name') }}">
                                <label>Work Center Name</label>
                            </div>
                        </div>

                        <div class="col-md-4 row">
                            <div class="col px-2">
                                <button type="submit" class="btn btn-info w-100">Search</button>
                            </div>
                            <div class="col px-2">
                                <a href="{{ route('work-center.index') }}" class="btn btn-secondary w-100">
                                    Reset
                                </a>
                            </div>
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

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Work Center Name</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($workCenters as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->work_center_name }}</td>
                        <td>{{ $item->work_center_description }}</td>
                        <td>{{ $item->location }}</td>
                        <td>
                            {{ $item->is_active == 1 ? 'Active' : 'Inactive' }}
                        </td>
                        <td>
                            <a href="{{ route('work-center.edit', $item->work_center_id) }}"
                                class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </td>
                        <td>

                            <form action="{{ route('work-center.destroy', $item->work_center_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $workCenters->withQueryString()->links() }}
            </div>

        </div>
    </div>
</div>
@endsection