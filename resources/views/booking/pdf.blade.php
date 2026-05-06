<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bookings Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            color: #111827;
        }

        h2 {
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #111827;
            color: #ffffff;
            padding: 7px;
            border: 1px solid #d1d5db;
            font-size: 9px;
        }

        td {
            padding: 6px;
            border: 1px solid #d1d5db;
            font-size: 9px;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>

<h2>Bookings Report</h2>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Booking ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Room Type</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Days</th>
        <th>Rooms</th>
        <th>Adults</th>
        <th>Children</th>
        <th>Status</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bookings as $booking)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $booking->booking_id ?? '-' }}</td>
            <td>{{ $booking->name ?? '-' }}</td>
            <td>{{ $booking->phone ?? '-' }}</td>
            <td>{{ $booking->roomType->name ?? '-' }}</td>
            <td>{{ $booking->check_in_date }}</td>
            <td>{{ $booking->check_out_date }}</td>
            <td>{{ $booking->staying_days }}</td>
            <td>{{ $booking->rooms }}</td>
            <td>{{ $booking->adults }}</td>
            <td>{{ $booking->children }}</td>
            <td>{{ ucfirst($booking->status) }}</td>
            <td class="text-right">₹{{ number_format($booking->total_amount, 2) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>