<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation - Hotel Krinoscco</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            background: #ffffff;
            margin: 30px auto;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #002B5B;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 30px;
            color: #333333;
        }
        .details {
            background-color: #f2f2f2;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            color: #888888;
            font-size: 12px;
            padding: 20px;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background-color: #002B5B;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Your Booking is Confirmed!</h2>
        <p>Hotel Krinoscco</p>
    </div>
    <div class="content">
        <p>Dear {{ $booking->name }},</p>

        <p>Thank you for choosing <strong>Hotel Krinoscco</strong>. Your booking has been successfully confirmed.</p>

        <div class="details">
            <p><strong>Booking Details:</strong></p>
            <p><strong>Room:</strong> {{ $booking->room->title ?? 'N/A' }}</p>
            <p><strong>Check-In:</strong> {{ \Carbon\Carbon::parse($booking->check_in_date)->format('F d, Y') }}</p>
            <p><strong>Check-Out:</strong> {{ \Carbon\Carbon::parse($booking->check_out_date)->format('F d, Y') }}</p>
            <p><strong>Staying Days:</strong> {{ $booking->staying_days }} night(s)</p>
            <p><strong>Guests:</strong> {{ $booking->name }} ({{ $booking->phone }})</p>
            <p><strong>Amount:</strong> ₹{{ number_format($booking->amount, 2) }}</p>
            <p><strong>Tax & Fees:</strong> ₹{{ number_format($booking->tax_and_fee, 2) }}</p>
            <p><strong>Total Amount:</strong> ₹{{ number_format($booking->total_amount, 2) }}</p>
        </div>

        <a href="{{ url('/user/dashboard') }}" class="btn">View My Booking</a>

        <p>If you have any questions, feel free to contact us.</p>

        <p>We look forward to welcoming you!</p>

        <p>Warm regards,<br>Hotel Krinoscco Team</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Hotel Krinoscco. All rights reserved.
    </div>
</div>

</body>
</html>
