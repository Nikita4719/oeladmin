@extends('admin.include.app')
@section('main-content')

<style>
.student-detail-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 2rem;
}
.student-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.student-info-section {
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 8px;
}

.stu-info-row {
    display: flex;
    margin-bottom: 1rem;
    align-items: center;
    line-height: 1.5;
}

.stu-info-label {
    min-width: 120px;
    font-weight: 600;
    color: #374151;
}

.stu-info-value {
    color: #4b5563;
    flex: 1;
}

.stu-services-section {
    margin-top: 2rem;
}

.stu-section-title {
    text-align: center;
    font-size: 1.75rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 2rem;
    position: relative;
    padding-bottom: 0.5rem;
}

.stu-section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100%;
    height: 2px;
    background: #3b82f6;
    border-radius: 2px;
}

.stu-services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.stu-service-card {
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    padding: 1.5rem;
}

.stu-service-name {
    font-size: 1.25rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.stu-service-amount {
    display: block;
    font-size: 1rem;
    color: #6b7280;
    margin-top: 0.25rem;
}

.stu-discount-info {
    font-size: 1rem;
    color: #059669;
    margin: 0.75rem 0;
}
.substu-section-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: #374151;
    margin: 1rem 0;
}

.stu-services-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.stu-service-item {
    background: #f3f4f6;
    padding: 0.75rem 1rem;
    margin-bottom: 0.5rem;
    border-radius: 6px;
    color: #4b5563;
}
</style>
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href=""> Student</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Student Details</h3>
            </div>
            <div class="student-dashboard">
    <div class="student-detail-card">
        <div class="student-info-grid">
            <div class="student-info-section personal-details">
                <p class="stu-info-row">
                    <span class="stu-info-label">Name</span>
                    <span class="stu-info-value">: {{$student->name}} {{$student->last_name}}</span>
                </p>
                <p class="stu-info-row">
                    <span class="stu-info-label">Email</span>
                    <span class="stu-info-value">: {{$student->email}}</span>
                </p>
                <p class="stu-info-row">
                    <span class="stu-info-label">Phone Number</span>
                    <span class="stu-info-value">: {{$student->phone_number}}</span>
                </p>
            </div>
            <div class="student-info-section address-details">
                <p class="stu-info-row">
                    <span class="stu-info-label">Country</span>
                    <span class="stu-info-value">: {{$student->country->name ?? ''}}</span>
                </p>
                <p class="stu-info-row">
                    <span class="stu-info-label">City</span>
                    <span class="stu-info-value">: {{$student->city}}</span>
                </p>
                <p class="stu-info-row">
                    <span class="stu-info-label">Zip</span>
                    <span class="stu-info-value">: {{$student->zip}}</span>
                </p>
            </div>
        </div>

        <div class="stu-services-section">
            <h3 class="stu-section-title">Services Fees</h3>
            <div class="stu-services-grid">
                @foreach ($payments as $item)
                <div class="stu-service-card">
                    <div class="service-content">
                        <h5 class="stu-service-name">
                            Services: {{ $item->PaymentLink->master_services->name ?? '' }}
                            <span class="stu-service-amount">
                                Amount: {{ $item->PaymentLink->master_services->amount ?? '' }}
                            </span>
                        </h5>
                        <h6 class="stu-discount-info">
                            Discount: {{ $item->PaymentLink->discount ?? '' }}
                        </h6>
                        
                        <div class="sub-services">
                            <h5 class="substu-section-title">Sub Services</h5>
                            <ul class="stu-services-list">
                              @php
                                  $subservices = $item->PaymentLink && $item->PaymentLink->sub_service
                                      ? App\Models\SubService::whereIn('id', explode(',', $item->PaymentLink->sub_service))
                                          ->where('status', 1)
                                          ->get()
                                      : collect();
                              @endphp

                              @foreach ($subservices as $subservice)
                                  <li class="stu-service-item">{{ $subservice->name }}</li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
    </div>
    </div>
</div>
@endsection
