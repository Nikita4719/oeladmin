<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form data
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $course = isset($_POST['course']) ? htmlspecialchars($_POST['course']) : '';
    
   
    // Define email recipient (correct the email address)
    $to = "aman.dighighs@gmail.com";

    // Email subject (subject for the email)
    $email_subject = "Study in Russia New Enquiry Received from " . $name . " on " . date('d-m-Y h:i:s A');

    // HTML email body content
    $messageBody = '
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        </head>
        <body>
            <p>Hi Admin,</p>
            <p>A new inquiry has been received. Details are as follows:</p>
            <table border="1" cellpadding="10">
                <tr>
                    <td><strong>Name:</strong></td>
                    <td>' . $name . '</td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td>' . $email . '</td>
                </tr>
                <tr>
                    <td><strong>Phone:</strong></td>
                    <td>' . $phone . '</td>
                </tr>
                <tr>
                    <td><strong>Select Course:</strong></td>
                    <td>' . $course . '</td>
                </tr>
                
            </table>
            <p>Thank you.</p><p>Study in Russia</p>
        </body>
    </html>';

    // Define email headers
    $headers = "From: Study in Russia <$email>\r\n";
    $headers .= "Cc: aman.dighighs@gmail.com\r\n";  // Optional: Additional recipients in Cc
    $headers .= "Bcc: aman.dighighs@gmail.com\r\n"; // Optional: Additional recipients in Bcc
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";  // Set content type to HTML

    // Send the email
    if (mail($to, $email_subject, $messageBody, $headers)) {
        // Redirect to thank you page after successful email
        header("Location: thankyou.html");
        exit(); // Important to stop further script execution
    } else {
        echo "Mail failed. Please try again.";
    }
} else {
    echo "Invalid request. Please submit the form properly.";
}
?>
