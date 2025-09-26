<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Voucher - GH76186243356786</title>
    <style>
        @media print {
            .no-print { display: none; }
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 13px;
            background-color: #ffffff;
            padding: 32px 16px;
            color: #000;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            border: 1px solid #cbd5e0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 24px;
        }
        .text-xl { font-size: 1.25rem; font-weight: bold; margin-bottom: 4px; }
        .text-sm { font-size: 0.875rem; }
        .font-semibold { font-weight: 600; }
        .font-bold { font-weight: 700; }
        .mb-1 { margin-bottom: 4px; }
        .mb-2 { margin-bottom: 8px; }
        .mb-3 { margin-bottom: 12px; }
        .mb-4 { margin-bottom: 16px; }
        .mb-6 { margin-bottom: 24px; }
        .mt-1 { margin-top: 4px; }
        .mt-2 { margin-top: 8px; }
        .mt-6 { margin-top: 24px; }
        .text-center { text-align: center; }

        .grid-2 {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .grid-col {
            width: 48%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
            margin-bottom: 16px;
        }
        .table th, .table td {
            border: 1px solid #ccc;
            padding: 4px;
            text-align: left;
        }
        .table th {
            background-color: #f7fafc;
        }
        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table .total-row {
            font-weight: bold;
            background-color: #f1f5f9;
        }

        .btn {
            background-color: #2563eb;
            color: #fff;
            padding: 8px 24px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #1d4ed8;
        }

        ul {
            padding-left: 20px;
        }
        ul li {
            margin-bottom: 4px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-xl">Hotelier Voucher</h1>
    <div class="mb-3 text-sm font-semibold">VoucherHotelier</div>

    <div class="mb-6">
        <p><strong>Hotel Krinoscco, Ayodhya</strong></p>
        <p>HOTEL KRINOSCCO,ayodhya 224001 ,</p>
        {{-- <p>Uttar Pradesh-224001, Ayodhya, IN</p> --}}
    </div>

    <div class="grid-2 mb-4">
        <div class="grid-col">
            <p class="font-semibold">PRIMARY GUEST DETAILS</p>
            <p class="mt-1">{{$booking->name}}</p>
            <p class="mt-1">{{$booking->email}}</p>
            <p class="mt-1">{{$booking->phone}}</p>
            <p class="mt-1">{{$booking->address}}</p>
        </div>
        <div class="grid-col">
            <p><strong>CHECK-IN</strong>: {{$booking->check_in_date->format('d M Y')}}</p>
            <p><strong>CHECK-OUT</strong>: {{$booking->check_out_date->format('d M Y')}} ({{$booking->staying_days}} Nights)</p>
            <p class="mt-2"><strong>TOTAL NO. OF GUEST(S)</strong>: {{$booking->adults}} Adults @if($booking->children) , {{$booking->children}} Children @endif</p>
        </div>
    </div>

    <div class="grid-2 mb-6">
        <div class="grid-col">
            <p><strong>BOOKING ID</strong>: {{$booking->booking_id}}</p>
            <p><strong>BOOKED ON</strong>: {{$booking->created_at->format('d M Y h:i A')}}</p>
        </div>
        <div class="grid-col">
            <p><strong>BOOKING STATUS</strong>: {{$booking->status}}</p>
            <p><strong>PAYMENT STATUS</strong>: {{$booking->payment->status. ' '. $booking->payment->payment_method}} </p>
            <p><strong>BOOKED VIA</strong>: https://krinoscco.com/</p>
        </div>
    </div>

    <p class="font-semibold mb-2">Customer GST Details</p>
    <p><strong>COMPANY NAME</strong>:{{$booking->company_name}}</p>
{{--    <p><strong>COMPANY ADDRESS</strong>: E-13/2, SECTOR-17, KAVI NAGAR INDUSTRIAL AREA, GHAZIABAD-201001</p>--}}
    <p><strong>COMPANY GSTN</strong>: {{$booking->gst_number}}</p>
{{--    <p><strong>PROPERTY GSTN</strong>: 09AADCD6632P1Z5</p>--}}

    <div class="my-4">
        <p><strong>INVOICE AMOUNT</strong>: ₹ {{number_format($booking->payment->amount)}}</p>
        <p>{{$booking->rooms}} Room(s) | {{$booking->roomType->name}} | {{$booking->adults}} Adults
            @if($booking->children), {{$booking->children}} Children @endif
            @if($booking->services)
                @foreach($booking->services as $service)
                    • {{$service->name}}
                @endforeach
            @endif
        </p>
    </div>

    <div class="mb-6">
        <p class="font-semibold">Payment</p>
        <p>Property Gross Charges: ₹ {{number_format($booking->total_amount)}}</p>
    </div>
    @php
        // Total room charges
        $roomTotal = $booking->availabilities->sum('price') * $booking->rooms;

        // Total of all services across stay
        $totalServicePrices = 0;
        foreach ($booking->services as $service) {
            $totalServicePrices += $booking->staying_days * ($service->service->price * $service->quantity);
        }

        // Extra person charges for total stay
        $extraPersonCharges = $booking->extra_person;

        // Subtotal before tax
        $grandSubtotal = $booking->extra_child_charge + $roomTotal + $totalServicePrices + $extraPersonCharges;

        // Tax rate based on total amount
        $taxRate = ($booking->amount < 7500 ? 0.05 : 0.18);

        // Tax and total
        $grandTax = $grandSubtotal * $taxRate;
        $grandTotal = $grandSubtotal + $grandTax;
    @endphp


        <!-- Table Section -->
    <table class="table">
        <thead>
        <tr>
            <th>Date</th>
            <th>Room Charges (R)</th>
            @foreach($booking->services as $service)
                <th>{{ $service->service->name }}</th>
            @endforeach
            <th>Extra Person</th>
            <th>Children</th>
            <th>Taxes (T)</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($booking->availabilities as $availability)
            @php
                $singleRoomPrice = $availability->price * $booking->rooms;
                $dailyServiceTotal = 0;

                foreach ($booking->services as $service) {
                    $dailyServiceTotal += $service->service->price * $service->quantity;
                }

                $extraPerDay = $booking->extra_person / $booking->staying_days;
                $extraChildCharge = $booking->extra_child_charge/$booking->staying_days;
                $dailySubtotal = $extraChildCharge + $singleRoomPrice + $dailyServiceTotal + $extraPerDay;
                $taxRate = $booking->amount < 7500 ? 0.05 : 0.18;
                $dailyTax = $dailySubtotal * $taxRate;
                $dailyTotal = $dailySubtotal + $dailyTax;
            @endphp

            <tr>
                <td>{{ $availability->availabilityRate->date->format('d M Y') }}</td>
                <td>{{ number_format($singleRoomPrice, 1) }}</td>

                @foreach($booking->services as $service)
                    <td>{{ number_format($service->service->price * $service->quantity, 1) }}</td>
                @endforeach

                <td>{{ number_format($extraPerDay, 2) }}</td>
                @if($booking->children)
                <td>{{ number_format($extraChildCharge, 2) }}</td>
                @endif
                <td>{{ number_format($dailyTax, 2) }}</td>
                <td>{{ number_format($dailyTotal, 2) }}</td>
            </tr>
        @endforeach

        <tr class="total-row">
            <td>GRAND TOTAL</td>
            <td>{{ number_format($roomTotal, 1) }}</td>
            @foreach ($booking->services as $service)
                <td>{{ number_format($booking->staying_days * ($service->service->price * $service->quantity), 1) }}</td>
            @endforeach
            <td>{{ number_format($booking->extra_person, 2) }}</td>
            @if($booking->children)
            <td>{{ number_format($booking->extra_child_charge, 2) }}</td>
            @endif
            <td>{{ number_format($grandTax, 2) }}</td>
            <td>{{ number_format($grandTotal, 2) }}</td>
        </tr>
        </tbody>
    </table>

    <div class="mb-6">
        <p class="font-semibold">Final Calculation</p>
        <ul>
            <li>Room Charges: ₹ {{ number_format($booking->amount, 1) }}</li>
            <li>Service Charges: ₹ {{ number_format($booking->additional_service_charge, 1) }}</li>
            <li>Extra Person Charges: ₹ {{ number_format(($booking->extra_person * $booking->staying_days), 1) }}</li>
            <li>Extra Child Charges: ₹ {{ number_format($booking->extra_child_charge, 1) }}</li>
            <li>Property Taxes ({{$taxRate * 100}}%): ₹ {{ number_format($booking->tax_and_fee, 2) }}</li>
            <li><strong>(A) Property Gross Charges: ₹ {{ number_format($booking->total_amount, 2) }}</strong></li>
        </ul>
    </div>

{{--    <div class="mt-6 text-center no-print">--}}
{{--        <button onclick="window.print()" class="btn">Print Voucher</button>--}}
{{--    </div>--}}
</div>
</body>
</html>
