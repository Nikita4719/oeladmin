<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daily Admin Report</title>
</head>
<body>
    <h2>Daily OEL Summary - {{ $report['date'] }}</h2>
    <p>Here’s the summary of today’s user activities:</p>

    <table border="1" cellspacing="0" cellpadding="8" style="border-collapse: collapse; width: 400px;">
        <tr>
            <th>Metric</th>
            <th>Count / Amount</th>
        </tr>
        <tr>
            <td>Total Follow-ups</td>
            <td>{{ $report['total_followups'] }}</td>
        </tr>
        <tr>
            <td>Total Payments Received</td>
            <td>₹{{ number_format($report['total_payments'], 2) }}</td>
        </tr>
        <tr>
            <td>Total Pending Payments</td>
            <td>₹{{ number_format($report['total_pending'], 2) }}</td>
        </tr>
        <tr>
            <td>Total Closed Leads</td>
            <td>{{ $report['total_closed'] }}</td>
        </tr>
         <tr>
            <td>Total New Leads</td>
            <td>{{ $report['total_new_leads'] }}</td>
        </tr>
    </table>

    <p style="margin-top: 20px;">
        <strong>Report Generated At:</strong> {{ $report['generated_at'] }}
    </p>
</body>
</html>
