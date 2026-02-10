<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oel Overseas</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F7F8FA;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 40px;
            margin: 40px auto;
            max-width: 600px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-weight: 600;
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            font-size: 14px;
            line-height: 20px;
            margin-bottom: 10px;
        }
        .payment-link {
            font-size: 16px;
            font-weight: 500;
            color: #007bff;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            border: 1px solid #007bff;
            background-color: #ffffff;
            transition: all 0.3s ease;
        }
        .payment-link:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dear {{ $paymentData['name'] }},</h1>
        @php

            $amountInRupees = $paymentData['amount'];
        @endphp
        <p>Please proceed with your payment   <p>Amount: {{ number_format($amountInRupees, 2) }} INR</p><p>*Platform charge 2.5%</p> by clicking on the following Go to:</p>
        {{-- <p>Converted amount in INR: {{ number_format($amountInRupees, 2) }}</p> --}}
        <a class="payment-link" href="{{ $paymentData['payment_link'] }}" class="btn btn-primary">Go TO</a>
        {{-- <form action="{{ route('razorpay.payment.store') }}" method="POST">
            <a class="payment-link" href="{{ $paymentData['payment_link'] }}" class="btn btn-primary">Pay Now</a>
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        </form> --}}
    </div>
    {{-- <script>
        var options = {
            "key": "{{ env('RAZORPAY_API_KEY') }}",
            "amount": "10000",
            "name": "Oel Overseas",
            "description": "Razorpay payment",
            "image": "{{ asset('assets/img/logo2.png') }}",
            "prefill": {
                "name": "{{ $paymentData['name'] }}",
                "email": "ranjeetmaurya2033@gmail.com"
            },
            "theme": {
                "color": "#0F408F"
            },
            "handler" : function(res) {
                console.log(res);
                $.ajax({
                    url: "/payment/create",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}", // CSRF token
                        response: {
                            razorpay_payment_id: res.razorpay_payment_id
                        }
                    },
                    success: function(res) {
                        console.log('Payment data sent to server', res);
                        if (res.success = true) {
                            window.location.href = '/'; //payment failure
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error sending payment failure information:', textStatus, errorThrown);
                    }
                });
            },
            "modal": {
                "ondismiss": function() {
                    // This function is called when the user closes the modal
                    window.location.href = '/'; // Redirect to your failure page
                }
            }
        };

        var rzp = new Razorpay(options);
        document.getElementById('payBtn').onclick = function(e) {
            rzp.open();
            e.preventDefault();
        }

        rzp.on('payment.failed', function(response) {

            event.preventDefault();
            if (response.reason = "payment_failed") {
                const {
                    error,
                    reason
                } = response;
                $.ajax({
                    url: "/payment/failure",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}", // CSRF token
                        response: {
                            error,
                            reason
                        }
                    },
                    success: function(response) {
                        console.log('Payment failure data sent to server', response);
                        if (response.success = true) {
                            window.location.href = '/402'; //payment failure
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error sending payment failure information:', textStatus, errorThrown);
                    }
                });
            }
        });
    </script> --}}
</body>
</html>





