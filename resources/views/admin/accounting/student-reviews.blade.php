@extends('admin.include.app')
@section('main-content')

<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <ol class="breadcrumb text-muted mb-0">
                <li class="breadcrumb-item"><a href="">Student Invoice</a></li>
            </ol>
        </div>
    </div>
</div>
<br>

{{-- ======================== SEARCH FILTER ======================== --}}
<div class="row">
    <div class="card-group">
        <div class="card">
            <div class="card-body myform">
                <form action="{{ route('student-review') }}" method="GET">
                    <div class="row">
                        <div class="col-md-3 ps-2">
                            <input type="text" name="first_name" class="form-control formmrgin"
                                   placeholder="Student Name" value="{{ request()->first_name }}"
                                   oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                        </div>
                        <div class="col-md-3 ps-2">
                            <input type="email" name="email" class="form-control formmrgin"
                                   placeholder="Student Email" value="{{ request()->email }}">
                        </div>
                        <div class="col-md-3 ps-2">
                            <input type="text" name="phone_number" class="form-control formmrgin"
                                   placeholder="Student Phone Number" value="{{ request()->phone_number }}"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                        </div>
                        <div class="col-md-3 ps-2">
                            <input type="date" name="day" class="form-control formmrgin"
                                   value="{{ request()->day }}">
                        </div>
                        <div class="col-md-3 ps-2 mt-2">
                            <input type="month" name="month" class="form-control formmrgin"
                                   value="{{ request()->month }}">
                        </div>
                        <div class="col-md-1 mt-2">
                            <button type="submit" class="btn btn-info w-100">
                                <i class="fa fa-filter"></i>
                            </button>
                        </div>
                        <div class="col-md-1 mt-2">
                            <a href="{{ route('student-review') }}" class="btn btn-secondary w-100">
                                <i class="fa fa-undo"></i>
                            </a>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<br>

@if(request()->day || request()->month)
<div class="row">
    {{-- MONTHLY TOTAL --}}
    @if($monthlyTotal->count() > 0)
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Monthly Collection (Filtered)</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Month</th>
                        <th>Total Amount</th>
                    </tr>
                    @foreach ($monthlyTotal as $m)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($m->month.'-01')->format('F Y') }}</td>
                            <td>₹ {{ number_format($m->total,2) }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @endif

    {{-- DAILY TOTAL --}}
    @if($dailyTotal->count() > 0)
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Daily Collection (Filtered)</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Date</th>
                        <th>Total Amount</th>
                    </tr>
                    @foreach ($dailyTotal as $d)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($d->day)->format('d M Y') }}</td>
                            <td>₹ {{ number_format($d->total,2) }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
@endif


<br>

{{-- ======================== STUDENT TABLE ======================== --}}
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>P Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                       
                        @can('student_amount.view')
                        <th>View</th>
                        {{--<th>Invoice</th>--}}
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $item)
                    <tr>
                        <td>{{ $loop->iteration + ($students->currentPage()-1)*$students->perPage() }}</td>
                        <td>{{ $item->payment_date }}</td>
                         <td><a href="{{ route('view-student-reviews',$item->id) }}">{{ $item->name }}</a></td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone_number }}</td>
                        
                        @can('student_amount.view')
                        {{--<td><a href="{{ route('view-student-reviews',$item->id) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a></td>--}}
                        <td><a href="{{ route('view-student-invoice',$item->id) }}" class="btn "><i class="fa-solid fa-eye"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row mt-3">
                <div class="col-md-12 text-center">
                    {{ $students->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
