<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>OEL Enquiry Email</title>
  </head>
  <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; padding: 20px 0;">
      <tr>
        <td align="center">
          <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            <tr>
              <td style="background-color: #004080; padding: 20px; color: #ffffff; text-align: center;">
                <h2 style="margin: 0;">Overseas Education Lane</h2>
              </td>
            </tr>
            <tr>
              <td style="padding: 30px;">
                <h3 style="color: #333333;">New Enquiry Received</h3>
                <p style="margin: 10px 0;"><strong>Name:</strong> {{ $data['name'] }}</p>
                <p style="margin: 10px 0;"><strong>Email:</strong> {{ $data['email'] }}</p>
                <p style="margin: 10px 0;"><strong>Phone Number:</strong> {{ $data['phone_number'] }}</p>
                <p style="margin: 10px 0;"><strong>Interested Course:</strong> {{ $data['course'] }}</p>
              </td>
            </tr>
            <tr>
              <td style="background-color: #f1f1f1; text-align: center; padding: 15px; color: #777777; font-size: 12px;">
                &copy; {{ date('Y') }} Overseas Education Lane. All rights reserved.
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
