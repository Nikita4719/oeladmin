<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overseas Education Lane - Email Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .email-container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background-color: #224099;
            color: #ededef61;
            padding: 8px;
            text-align: center;
        }

        .email-header img {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .email-content {
            padding: 20px;
            color: #000000;
        }

        .email-footer {
            background-color: #f1f1f1;
            padding: 6px;
            text-align: center;
            font-size: 0.9em;
        }

        .signature {
            border-top: 1px solid #e0e0e0;
            padding-top: 15px;
            margin-top: 20px;
        }

        .signature-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .signature-title {
            color: #666;
            font-size: 0.9em;
        }

        .social-links {
            padding: 10px 0;
            text-align: center;
            border-top: 1px solid #e0e0e0;
            margin-top: 10px;
        }

        .social-links a {
            display: inline-block;
            width: 35px;
            height: 35px;
            line-height: 35px;
            border-radius: 50%;
            margin: 0 2px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: white;
            font-weight: 800;
            font-size: 18px;
        }

        .social-links .facebook {
            background-color: #1877f2;
        }

        .social-links .instagram {
            background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D);
        }

        .social-links .youtube {
            background-color: #FF0000;
        }

        .social-links .linkedin {
            background-color: #0077b5;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <div class="email-container">
            <div class="email-header shadow-sm">
                <img src="https://www.overseaseducationlane.com/public/frontend/img/oel%20(1)%201.png" alt="OEL Logo">
            </div>

            <div class="email-content">
                <h6 class="signature-name">Your Application Has Been Successfully Submitted</h6>

                @isset($threesixteeddata['student'])
                    <p>Dear: {{$threesixteeddata['student']}}</p>
                @endisset

                @isset($threesixteeddata['university'])
                    <p>University: {{$threesixteeddata['university']}}</p>
                @endisset

                @isset($threesixteeddata['courses'])
                    <ul>
                        @foreach ($threesixteeddata['courses'] as $item)
                      
                            <li>Course: {{$item['name']}}</li>
                            <li>Status: {{$item['status']}}</li>
                            <li>Remark: {{$item['remarks']}}</li>
                        @endforeach
                    </ul>
                @endisset

                @isset($threesixteeddata['joining_date'])
                    <p>Joining Date: {{$threesixteeddata['joining_date']}}</p>
                @endisset

                @isset($threesixteeddata['offer_amount'])
                    <p>Offer Amount: {{$threesixteeddata['offer_amount']}}</p>
                @endisset

                @isset($threesixteeddata['visa_document'])
                    <p>Visa Document: {{$threesixteeddata['visa_document']}}</p>
                @endisset

                @isset($threesixteeddata['visa_apply_date'])
                    <p>Visa Apply Date: {{$threesixteeddata['visa_apply_date']}}</p>
                @endisset

                @isset($threesixteeddata['visa_agent'])
                    <p>Visa Agent: {{$threesixteeddata['visa_agent']}}</p>
                @endisset

                @isset($threesixteeddata['fee_payment_mode'])
                    <p>Fee Payment Mode: {{$threesixteeddata['fee_payment_mode']}}</p>
                @endisset

                @isset($threesixteeddata['fee_amount'])
                    <p>Fee Amount: {{$threesixteeddata['fee_amount']}}</p>
                @endisset

                @isset($threesixteeddata['fee_payment_by'])
                    <p>Fee Payment By: {{$threesixteeddata['fee_payment_by']}}</p>
                @endisset

                @isset($threesixteeddata['flight_name'])
                    <p>Flight Name: {{$threesixteeddata['flight_name']}}</p>
                @endisset

                @isset($threesixteeddata['flight_dep_date'])
                    <p>Flight Departure Date: {{$threesixteeddata['flight_dep_date']}}</p>
                @endisset

                <p>Status: Application submitted to the institution.</p>

                <p>Our team is closely monitoring the progress, and we will keep you updated on any further developments. In the meantime, if you have any questions or need assistance, feel free to contact your counselor.</p>
                <p>Thank you for trusting Overseas Education Lane for your study abroad journey.</p>

                <div class="signature">
                    <div class="signature-name">Best regards,</div>
                    <div>Overseas Education Lane</div>
                </div>
            </div>

            <div class="email-footer">
                <p>
                    <strong>Overseas Education Lane</strong><br>
                    Address: Overseas Education Lane<br>
                    Contact: +(91) 892 992 2525
                </p>
                <div class="social-links">
                    <a href="https://www.facebook.com/overseaseducationlane.oel/" class="facebook text-center text-white" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/overseaseducation_lane/" class="instagram text-center text-white" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.youtube.com/@OverseasEducationLane1" class="youtube text-center text-white" target="_blank"><i class="fa fa-youtube"></i></a>
                    <a href="https://www.linkedin.com/company/75765761/admin/dashboard/" class="linkedin text-center text-white" target="_blank"><i class="fa fa-linkedin"></i></a>
              
                </div>
                <p>&copy; 2025 OEL. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</body>

</html>
