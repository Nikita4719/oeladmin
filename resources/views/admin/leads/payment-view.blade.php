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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="display: flex; justify-content: center; max-width: 600px;">
        <div style="width: 100%;">
            <div class="card text-center" style="max-width: 600px; margin: auto;">
                <p style="font-size: 20px;text-align: center">Please do not refresh the page until payment is done</p>
                <div class="card-body">
                    <h1>Dear {{ $data['name'] }},</h1>
                    <p>Please proceed with your payment</p>
                    <p>Amount: {{ $data['amount'] }} INR</p>
                    <form action="{{ route('razorpay.payment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="{{$data['name']}}">
                        <input type="hidden" name="fallowp_unique_id" value="{{$data['fallowp_unique_id']}}">
                        <input type="hidden" name="user_id" value="{{$data['user_id']}}">
                        <button id="payBtn"  class="payment-link">Pay {{ $data['amount'] }} INR
                        </button>
                        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    </form>
                </div>
                <div class="card-footer" style="text-align: center;">
                    <img src="{{asset('assets/img/logo2.png')}}">
                </div>
            </div>
        </div>
    </div>
    <script>
        var options = {
            "key": "{{ env('RAZORPAY_API_KEY') }}",
            "amount": "{{$data['amount']*100}}",
            "name": "Oel Overseas",
            "description": "Razorpay payment",
            "image": "{{ asset('assets/img/logo2.png') }}",
            "prefill": {
                "name": "{{ $data['name'] }}",
                "email": "{{ $data['email'] }}"
            },
            "theme": {
                "color": "#0F408F"
            },
            "handler" : function(res) {
                $.ajax({
                    url: "/overseaseducationlane/payment/create",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}", // CSRF token
                        response: {
                            razorpay_payment_id: res.razorpay_payment_id,
                            user_id: $('input[name="user_id"]').val(),
                            fallowp_unique_id: $('input[name="fallowp_unique_id"]').val(),
                            name: $('input[name="name"]').val()
                        }
                    },
                    success: function(res) {
                        if (res.success === true) {
                           window.location.href = '/payment/success'; // Redirect to your success page
                        } else {
                            window.location.href = '/payment/failure'; // Redirect to your failure page
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
                    // window.location.href = '/pay-now'; // Redirect to your failure page
                }
            }
        };

       var rzp = new Razorpay(options);
        setTimeout(function() {
            rzp.open();
        }, 10);
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
                            reason,
                            user_id: $('input[name="user_id"]').val(),
                            fallowp_unique_id: $('input[name="fallowp_unique_id"]').val(),
                            name: $('input[name="name"]').val()
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
    </script>
</body>
</html>





