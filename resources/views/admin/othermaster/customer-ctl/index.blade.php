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
                            Manage Customer Material
                        </li>
                    </ol>
                </div>
                @can('customer_ctl.create')
                <div class="col-md-4">
                    <a href="{{ route('create-customer-material') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create Customer Material</a>
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
                <form action="{{ route('customer.index') }}" method="get">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="col-md-3 mb-2 ps-md-3">
                            <div class="form-floating">
                                <input type="text" name="customer_id" class="form-control" placeholder="Customer ID">
                                <label>Customer ID</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2 ps-md-3">
                            <div class="form-floating">
                                <input type="text" name="material_id" class="form-control" placeholder="Material ID">
                                <label>Material ID</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2 ps-md-3">
                            <div class="form-floating">
                                <input type="text" name="material_ctl_id" class="form-control" placeholder="Material CTL ID">
                                <label>Material CTL ID</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2 ps-md-3">
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
                        <th>S.N</th>
                        <th>Customer ID</th>
                        <th>Material ID</th>
                        <th>Material CTL ID</th>
                        <th>Min Buffer Qty</th>
                        <th>Max Buffer Qty</th>
                        <th>Available Buffer Qty</th>
                        <th>Buffer Status</th>
                        <th>Comments</th>
                        <th>Active</th>
                        @can('customer_ctl.update') <th>Edit</th> @endcan
                        @can('customer_ctl.delete') <th>Delete</th> @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $item)
                    <tr>
                        <td>{{ $loop->index + (($customers->currentPage() - 1) * $customers->perPage()) + 1 }}</td>
                        <td>{{ $item->customer_id }}</td>
                        <td>{{ $item->material_id }}</td>
                        <td>{{ $item->material_ctl_id }}</td>
                        <td>{{ $item->min_maintain_buffer_qty }}</td>
                        <td>{{ $item->max_maintain_buffer_qty }}</td>
                        <td>{{ $item->available_buffer_qty }}</td>
                        <td>{{ $item->buffer_status }}</td>
                        <td>{{ $item->comments }}</td>
                        <td>{{ $item->is_active ? 'Active' : 'Inactive' }}</td>
                        @can('customer_ctl.update')
                        <td>
                            <a href="{{ route('edit-customer-material', $item->customer_ctl_id) }}" class="btn btn-info">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </td>
                        @endcan
                        @can('customer_ctl.delete')
                        <td>
                            <a href="{{ route('delete-customer-material', $item->customer_ctl_id) }}" class="btn btn-warning">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="py-4">
                {{ $customers->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
