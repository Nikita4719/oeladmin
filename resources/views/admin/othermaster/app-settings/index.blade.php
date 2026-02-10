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
                            App Settings
                        </li>
                    </ol>
                </div>

                <div class="col-md-4 text-end">
                    <a href="{{ route('appsettings.create') }}" class="btn add-btn">
                        <i class="las la-plus"></i> Add Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-12">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Vendor Code</th>
                        <th>Referral Person</th>
                        <th>Mobile No</th>
                        <th>Address</th>
                        <th>Logo</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($settings as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->Vendor_Code }}</td>
                        <td>{{ $item->Referral_Person_Name }}</td>
                        <td>{{ $item->Mob_No }}</td>
                        <td>{{ $item->Address }}</td>

                        <td>
                            @if($item->logo_path)
                                <img src="{{ asset('uploads/appsettings/'.$item->logo_path) }}" width="60">
                            @endif
                        </td>

                        <td class="text-wrap">{{ $item->description }}</td>

                        <td>
                            <a href="{{ route('appsettings.edit', $item->setting_id) }}"
                               class="btn btn-info btn-sm">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </td>

                        <td>
                            <form action="{{ route('appsettings.destroy', $item->setting_id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $settings->links() }}
        </div>

    </div>
</div>
@endsection
