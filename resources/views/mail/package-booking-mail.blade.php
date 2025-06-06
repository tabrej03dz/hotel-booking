<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Package Booking Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f6f8fa; padding: 30px;">
<div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
    <h2 style="color: #1a202c;">📦 Package Booking Details</h2>

    <p>Hello {{ $for == 'user' ? $booking->full_name : 'Admin' }},</p>

    @if($for == 'user')
        <p>Thank you for booking a package with us! Below are your booking details:</p>
    @else
        <p>A new package booking has been made. Here are the details:</p>
    @endif

    <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
        <tr>
            <td style="padding: 8px; font-weight: bold;">Full Name:</td>
            <td style="padding: 8px;">{{ $booking->full_name }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold;">Email:</td>
            <td style="padding: 8px;">{{ $booking->email }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold;">Phone:</td>
            <td style="padding: 8px;">{{ $booking->phone }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold;">Package Name:</td>
            <td style="padding: 8px;">{{ $booking->package_name }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold;">Preferred Date:</td>
            <td style="padding: 8px;">{{ \Carbon\Carbon::parse($booking->preferred_date)->format('d M Y') }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold;">Additional Message:</td>
            <td style="padding: 8px;">{{ $booking->additional_message ?: '—' }}</td>
        </tr>
    </table>

    <p style="margin-top: 30px;">Regards,</p>
    <p style="color: #1a202c; font-weight: bold;">The Team</p>
</div>
</body>
</html>
