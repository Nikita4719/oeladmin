@extends('admin.include.app')

@section('main-content')
<div class="main-content">

    <!-- Header -->
    <div class="row">
        <div class="card card-buttons mt-md-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <ol class="breadcrumb text-muted mb-0">
                            <li class="breadcrumb-item">
                                <a href="#">Welcome</a>
                            </li>
                            <li class="breadcrumb-item text-muted">Admin Dashboard</li>
                        </ol>
                    </div>
                    <div class="col-md-3">
                        <p class="subheader_left">Overseas Education Lane</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Cards -->
    <div class="row mt-4">

        {{-- Total Members --}}
        <div class="col-md-3">
            <div class="card dash-widget text-center">
                <h5>Total Members</h5>
                <h3>250</h3>
                <button class="btn btn-outline-primary btn-sm">Read More</button>
            </div>
        </div>

        {{-- Total Students --}}
        <div class="col-md-3">
            <div class="card dash-widget text-center">
                <h5>Total Students</h5>
                <h3>180</h3>
                <button class="btn btn-outline-primary btn-sm">Read More</button>
            </div>
        </div>

        {{-- Total Applied Programs --}}
        <div class="col-md-3">
            <div class="card dash-widget text-center">
                <h5>Total Applied Programs</h5>
                <h3>95</h3>
                <button class="btn btn-outline-primary btn-sm">Read More</button>
            </div>
        </div>

        {{-- Total Franchise --}}
        <div class="col-md-3">
            <div class="card dash-widget text-center">
                <h5>Total Franchise</h5>
                <h3>42</h3>
                <button class="btn btn-outline-primary btn-sm">Read More</button>
            </div>
        </div>

        {{-- Active Franchise --}}
        <div class="col-md-3">
            <div class="card dash-widget text-center">
                <h5>Active Franchise</h5>
                <h3>30</h3>
                <button class="btn btn-outline-primary btn-sm">Read More</button>
            </div>
        </div>

        {{-- Inactive Franchise --}}
        <div class="col-md-3">
            <div class="card dash-widget text-center">
                <h5>Inactive Franchise</h5>
                <h3>12</h3>
                <button class="btn btn-outline-primary btn-sm">Read More</button>
            </div>
        </div>

        {{-- Total Universities --}}
        <div class="col-md-3">
            <div class="card dash-widget text-center">
                <h5>Total Universities</h5>
                <h3>65</h3>
                <button class="btn btn-outline-primary btn-sm">Read More</button>
            </div>
        </div>

        {{-- Total Programs --}}
        <div class="col-md-3">
            <div class="card dash-widget text-center">
                <h5>Total Programs</h5>
                <h3>420</h3>
                <button class="btn btn-outline-primary btn-sm">Read More</button>
            </div>
        </div>

        {{-- Total Leads --}}
        <div class="col-md-3">
            <div class="card dash-widget text-center">
                <h5>Total Leads</h5>
                <h3>310</h3>
                <button class="btn btn-outline-primary btn-sm">Read More</button>
            </div>
        </div>

        {{-- Visa Punching --}}
        <div class="col-md-3">
            <div class="card dash-widget text-center">
                <h5>Visa Punching</h5>
                <h3>48</h3>
                <button class="btn btn-outline-primary btn-sm">Read More</button>
            </div>
        </div>

        {{-- Visa Pending --}}
        <div class="col-md-3">
            <div class="card dash-widget text-center">
                <h5>Visa Pending</h5>
                <h3>22</h3>
                <button class="btn btn-outline-primary btn-sm">Read More</button>
            </div>
        </div>

    </div>
</div>
@endsection
