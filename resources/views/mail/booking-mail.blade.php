<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking Update - {{ $booking->booking_id }}</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h2>Hello {{ $role === 'admin' ? 'Team Krinoscco' : $booking->name }},</h2>

    @if($role === 'admin')
        <p>A booking update has occurred. Below are the details:</p>
    @else
        @if($booking->status === 'confirmed')
            <p>Your booking is <strong style="color: green;">confirmed</strong>. Thank you for choosing us!</p>
        @elseif($booking->status === 'failed')
            <p style="color: red;">Unfortunately, your booking could not be completed due to a payment failure.</p>
        @elseif($booking->status === 'cancelled')
            <p style="color: orange;">Your booking has been cancelled.</p>
        @else
            <p>Status: <strong>{{ ucfirst($booking->status) }}</strong></p>
        @endif
    @endif

    <h4>Booking Details:</h4>
    <ul>
        <li><strong>Booking ID:</strong> {{ $booking->booking_id }}</li>
        <li><strong>Name:</strong> {{ $booking->name }}</li>
        <li><strong>Phone:</strong> {{ $booking->phone }}</li>
        <li><strong>Check-in:</strong> {{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') }}</li>
        <li><strong>Check-out:</strong> {{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') }}</li>
        <li><strong>Total Amount:</strong> ₹{{ number_format($booking->total_amount, 2) }}</li>
    </ul>

    <p>Regards,<br>Hotel Management</p>

</body>
</html>
