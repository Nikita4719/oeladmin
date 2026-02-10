<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overseas Education Lane - Invoice</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            background-color: #f0f4f8;
            font-family: 'Poppins', sans-serif;
        }
        .invoice-container {
            background: white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin: 50px auto;
            max-width: 900px;
        }

        .company-logo {
            max-height: 90px;
            margin-bottom: 20px;
        }

        .invoice-header {
            border-bottom: 3px solid #4a90e2;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .section-title {
            color: #4a90e2;
            font-weight: 600;
            border-bottom: 2px solid #4a90e2;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .table-services {
            background-color: #f9fafb;
        }

        .table-services thead {
            background-color: #4a90e2;
            color: white;
        }

        .student-details {
            background-color: #f1f5f9;
            border-radius: 8px;
            padding: 20px;
        }

        .total-row {
            font-weight: bold;
            background-color: #e6f2ff;
        }

        .footer-note {
            color: #6b7280;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container invoice-container">
        <div class="row invoice-header align-items-center">
            <div class="col-md-6">
                <img src="https://www.overseaseducationlane.com/public/frontend/img/oel%20(1)%201.png"
                    alt="Overseas Education Lane Logo" class="company-logo">
            </div>
            <div class="col-md-6 text-end">
                <h2 class="text-primary mb-2">INVOICE</h2>
                <p class="mb-1">Invoice #: OEL-2024-00{{$student->id}}</p>
                <p class="text-muted">Date: {{$student->created_at}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="student-details mb-4">
                    <h4 class="section-title">Student Details</h4>
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="ps-1">Name:</th>
                                <td>{{$student->name}} {{$student->last_name}}</td>
                            </tr>
                            <tr>
                                <th class="ps-1">Email:</th>
                                <td>{{$student->email}}</td>
                            </tr>
                            <tr>
                                <th class="ps-1">Phone:</th>
                                <td>{{$student->phone_number}}</td>
                            </tr>
                            <tr>
                                <th class="ps-1">Country:</th>
                                <td>{{$student->country->name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th class="ps-1">City:</th>
                                <td>{{$student->city}}</td>
                            </tr>
                            <tr>
                                <th class="ps-1">ZIP Code:</th>
                                <td> {{$student->zip}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <div class="billing-details bg-light p-3 rounded">
                    <h4 class="section-title">Billing Information</h4>
                    <address class="mb-0">
                        Overseas Education Lane<br>
                       Noida  Sector-16 A 12/13<br>
                        Noida-201301
                    </address>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h4 class="section-title">Services</h4>
                <table class="table table-services table-bordered">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Sub Service</th>
                            <th class="text-end">Fee (₹)</th>
                          <th class="text-end">Discount (₹)</th>
                            <th class="text-end">Total (₹)</th>
                            <th class="text-end">Dues (₹)</th>

                        </tr>
                    </thead>
                    <tbody>

                        @php
                        $sum = 0;
                        $panding_sum=0;
                        @endphp
                        @foreach ($payments as $item)
                        @php
                        $discount = $item->PaymentLink->discount ?? 0;
                        $amount = $item->PaymentLink->master_services->amount ?? 0;
                        $panding = $item->PaymentLink->panding ?? 0;

                        $total=$amount - $discount - $panding ?? 0;
                        $sum += $total ?? 0; // Add amount to sum, treat null as 0
                        $panding_sum +=$panding ?? 0; 
                        @endphp
                        <tr>

                            <td>{{ $item->PaymentLink->master_services->name ?? '' }} </td>
                            <td>
                                <ol>
                                    @php
                                $subservices = $item->PaymentLink && $item->PaymentLink->sub_service
                                    ? App\Models\SubService::whereIn('id', explode(',', $item->PaymentLink->sub_service))
                                        ->where('status', 1)
                                        ->get()
                                    : collect();
                            @endphp

                            @foreach ($subservices as $subservice)
                                <li >{{ $subservice->name }}</li>
                            @endforeach


                                 
                                </ol>
                            </td>
                           <td class="text-end">{{ $item->PaymentLink->master_services->amount ?? '' }}</td>
                            <td class="text-end">{{ $item->PaymentLink->discount ?? 0 }}</td>
                           
                            <td class="text-end">{{ $total }}</td>
                            <td class="text-end">{{ $panding }}</td>


                        </tr>
                        @endforeach


                        <tr class="total-row">
                            <td colspan="4" class="text-end"><strong>Payable</strong></td>
                            <td class="text-end">{{ $sum }}</td>
                            <td>{{$panding_sum}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row footer-note text-center">
            <div class="col-12">
                <p class="mb-2">Thank you for choosing Overseas Education Lane</p>
                <p class="text-muted small">GST No.: 07AATCA2480C1Z0 | Contact: info@overseaseducationlane.com</p>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>