<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payments Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
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
            color: white;
            padding: 8px;
            border: 1px solid #d1d5db;
        }

        td {
            padding: 7px;
            border: 1px solid #d1d5db;
        }

        .right {
            text-align: right;
        }
    </style>
</head>
<body>

<h2>Payments Report</h2>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Booking ID</th>
            <th>Customer</th>
            <th>Phone</th>
            <th>Method</th>
            <th>Gateway</th>
            <th>Transaction ID</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Paid Date</th>
        </tr>
    </thead>

    <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $payment->booking_id }}</td>
                <td>{{ $payment->booking->name ?? $payment->booking->user->name ?? '-' }}</td>
                <td>{{ $payment->booking->phone ?? '-' }}</td>
                <td>{{ ucfirst($payment->payment_method) }}</td>
                <td>{{ $payment->gateway ?? '-' }}</td>
                <td>{{ $payment->transaction_id ?? '-' }}</td>
                <td class="right">₹{{ number_format($payment->amount, 2) }}</td>
                <td>{{ ucfirst($payment->status) }}</td>
                <td>{{ optional($payment->created_at)->format('d-m-Y h:i A') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>