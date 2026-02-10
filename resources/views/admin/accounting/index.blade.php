
@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> Dashboard</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Total Amount</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$fees['total_amount'] ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>OEL Registration Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$fees['oel_registration_fees'] ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>University Application Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$fees['university_application_fees'] ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Course Tuition Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$fees['course_tution_fees'] ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Visa Processing Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$fees['visa_processing_fees'] ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Embassy Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$fees['embassy_fees'] ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Accommodationn Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$fees['accommodation_fees'] ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Ticket Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$fees['ticket_fees'] ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>English Test/ Other Fee</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$fees['english_test'] ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="row">
                <div clas="col-md-12">
                    <div class="totalno">
                        <h5>Due Amount</h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="blclr">
                        <h5>
                            <i class="la la-inr clruser"></i>{{$fees['panding_amount'] ?? 0}}
                        </h5>
                    </div>
                </div>
                <div clas="col-md-12">
                    <div class="submit-section btnpr">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="my-md-5">
            <div class="card-body">
                <div id="chartContainer"></div>
            </div>
        </div>
    </div>
    <br>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Monthly Fees"
            },
            options: {
                axisX: {
                    labelAngle: -90
                }
            },
            data: [{
                type: "stackedColumn",
                dataPoints: [
                    @foreach ($feesMonthly as $month => $fees)
                        @foreach ($fees as $serviceName => $feesAmount)
                            { y: {{ $feesAmount }}, label: "{{ $serviceName }} - {{strftime('%B', mktime(0, 0, 0, $month, 10))}}" },
                        @endforeach
                    @endforeach
                ],
            }]
        });
        chart.render();
    </script>
    </div>
@endsection
