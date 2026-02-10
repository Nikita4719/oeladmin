<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overseas Education Lane - Email Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .email-container { max-width: 700px; margin: 0 auto; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .email-header { background-color: #224099; color: #ededef61; padding: 8px; text-align: center; }
        .email-header img { max-width: 150px; margin-bottom: 10px; }
        .email-content { padding: 20px; color: #000; }
        .email-footer { background-color: #f1f1f1; padding: 6px; text-align: center; font-size: 0.9em; }
        .signature { border-top: 1px solid #e0e0e0; padding-top: 15px; margin-top: 20px; }
        .signature-name { font-weight: bold; margin-bottom: 5px; }
        .social-links { padding: 10px 0; text-align: center; border-top: 1px solid #e0e0e0; margin-top: 10px; }
        .social-links a { display: inline-block; width: 35px; height: 35px; line-height: 35px; border-radius: 50%; margin: 0 2px; text-decoration: none; color: white; font-weight: 800; font-size: 18px; transition: all 0.3s ease; }
        .social-links .facebook { background-color: #1877f2; }
        .social-links .instagram { background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D); }
        .social-links .youtube { background-color: #FF0000; }
        .social-links .linkedin { background-color: #0077b5; }
    </style>
</head>

<body>
    <div class="container py-4">
        <div class="email-container">
            <div class="email-header shadow-sm">
                <img src="https://www.overseaseducationlane.com/public/frontend/img/oel%20(1)%201.png" alt="OEL Logo">
            </div>

            <div class="email-content">
                <h6 class="signature-name">Your Profile is Successfully Created</h6>

                <p>Thank you for choosing Overseas Education Lane for your study abroad journey!</p>

                <p>Your profile has been successfully created. Use the credentials below to track updates on your admission process:</p>
              <ul>
    <li>
        URL: 
        <a href="https://www.overseaseducationlane.com/user-login">
            overseaseducationlane.com
        </a>
    </li>

    <li>Username: {{ $student_data['email'] ?? '' }}</li>

    <li>Password: {{ $student_data['password'] ?? '' }}</li>
</ul>


                <p>For any questions, feel free to contact your counselor.</p>

                <div class="signature">
                    <div class="signature-name">Best regards,</div>
                    <div>Overseas Education Lane</div>
                </div>
            </div>

            <div class="email-footer">
                <p>
                    <strong>Overseas Education Lane</strong><br>
                    Address: A 12-13,2nd Floor, Sector 16 Noida, Uttar Pradesh, 201301<br>
                    Contact: +(91) 892 992 2525
                </p>
                <div class="social-links">
                    <a href="#" class="facebook text-center" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="instagram text-center" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="youtube text-center" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="linkedin text-center" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <p>&copy; 2024 OEL. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
