<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Voucher - GH76186243356786</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none; }
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body class="bg-white py-8 px-4 text-[13px] text-black">
<div class="max-w-5xl mx-auto border border-gray-400 shadow p-6">
    <h1 class="text-xl font-bold mb-1">Hotelier Voucher</h1>
    <div class="mb-3 text-sm font-semibold">VoucherHotelier</div>

    <div class="mb-6">
        <p><strong>Hotel Krinoscco, Ayodhya</strong></p>
        <p>HOTEL KRINOSCCO, Amaniganj Rampath ayodhya 224001
        </p>
        {{-- <p>Uttar Pradesh-224001, Ayodhya, IN</p> --}}
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <p class="font-semibold">PRIMARY GUEST DETAILS</p>
            <p class="mt-1">{{$booking->name}}</p>
            <p class="mt-1">{{$booking->email}}</p>
            <p class="mt-1">{{$booking->phone}}</p>
            <p class="mt-1">{{$booking->address}}</p>
        </div>
        <div>
            <p><strong>CHECK-IN</strong>: {{$booking->check_in_date->format('d M Y')}}</p>
            <p><strong>CHECK-OUT</strong>: {{$booking->check_out_date->format('d M Y')}} ({{$booking->staying_days}} Nights)</p>
            <p class="mt-2"><strong>TOTAL NO. OF GUEST(S)</strong>: {{$booking->adults}} Adults @if($booking->children) , {{$booking->children}} Children @endif</p>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
            <p><strong>BOOKING ID</strong>: {{$booking->booking_id}}</p>
            <p><strong>BOOKED ON</strong>: {{$booking->created_at->format('d M Y h:i A')}}</p>
        </div>
        <div>
            <p><strong>BOOKING STATUS</strong>: {{$booking->status}}</p>
            <p><strong>PAYMENT STATUS</strong>: {{$booking->payment->status. ' '. $booking->payment->payment_method}} </p>
            <p><strong>BOOKED VIA</strong>: https://krinoscco.com/</p>
{{--            <p><strong>PNR</strong>: 0147971289</p>--}}
        </div>
    </div>

    <p class="font-semibold mb-2">Customer GST Details</p>
    <p><strong>COMPANY NAME</strong>: NG TEX PRINT PVT. LTD</p>
    <p><strong>COMPANY ADDRESS</strong>: E-13/2, SECTOR-17, KAVI NAGAR INDUSTRIAL AREA, GHAZIABAD-201001</p>
    <p><strong>COMPANY GSTN</strong>: 09AADCN3310N1ZE</p>
    <p><strong>PROPERTY GSTN</strong>: 09AADCD6632P1Z5</p>

    <div class="my-4">
        <p><strong>INVOICE AMOUNT</strong>: ₹ {{number_format($booking->payment->amount)}}</p>
        <p>{{$booking->rooms}} Room(s) | {{$booking->roomType->name}} | {{$booking->adults}}
            Adults @if($booking->children)
                ,{{$booking->children}} Children
            @endif @if($booking->services)
                @foreach($booking->services as $service)
                    • {{$service->name}}
                @endforeach
            @endif </p>
{{--        <p>Inclusions: Breakfast included.</p>--}}
    </div>

{{--    <div class="mb-6">--}}
{{--        <p class="font-semibold">Cancellation Policy</p>--}}
{{--        <p>This tariff cannot be cancelled with zero fee. Any cancellations will be subject to a hotel fee as follows:</p>--}}
{{--        <ul class="list-disc ml-5">--}}
{{--            <li>From 2025-05-16 15:14:13 till 2025-05-29 12:59:59 – 100% of booking amount</li>--}}
{{--            <li>After 2025-05-29 13:00:00 – 100% of booking amount</li>--}}
{{--        </ul>--}}
{{--        <p>Cancellations are only allowed before Check-In.</p>--}}
{{--    </div>--}}

    <div class="mb-6">
        <p class="font-semibold">Payment</p>
        <p>Property Gross Charges: ₹ {{number_format($booking->total_amount)}}</p>
    </div>

    @php
        $roomTotal = $booking->availabilities->sum('price') * $booking->rooms;
        $totalServicePrices = 0;
    @endphp

    <table class="table-auto w-full border border-gray-300 text-xs mb-4">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-1">Date</th>
                <th class="border p-1">Room Charges (R)</th>
                @foreach($booking->services as $service)
                    <th class="border p-1">{{ $service->service->name }}</th>
                @endforeach
                <th>Extra Person</th>
                @if($booking->children)
                <th>Children</th>
                @endif
                <th class="border p-1">Taxes (T)</th>
                <th class="border p-1">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($booking->availabilities as $availability)
                @php
                    $singleRoomPrice = $availability->price * $booking->rooms;
                    $dailyServiceTotal = 0;
                @endphp
                <tr>
                    <td class="border p-1">{{ $availability->availabilityRate->date->format('d M Y') }}</td>
                    <td class="border p-1">{{ number_format($singleRoomPrice, 1) }}{{ $booking->rooms > 1 ? " ({$booking->rooms})" : '' }}</td>

                    @foreach($booking->services as $service)
                        @php
                            $singleServicePrice = $service->service->price * $service->quantity;
                            $dailyServiceTotal += $singleServicePrice;
                        @endphp
                        <td class="border p-1">{{ number_format($singleServicePrice, 1) }}</td>
                    @endforeach

                    @php
                        $extraChildCharge = 0;
                        if ($booking->children){
                            $extraChildCharge = $booking->extra_child_charge / $booking->staying_days;
                        }
                        $dailySubtotal = $extraChildCharge + $singleRoomPrice + $dailyServiceTotal + ($booking->extra_person/$booking->staying_days);
                        $tax = $dailySubtotal * ($booking->amount < 7500 ? 0.12 : 0.18);
                        $total = $dailySubtotal + $tax;
                    @endphp

                    <td class="border p-1">{{($booking->extra_person/$booking->staying_days)}}</td>
                    @if($booking->children)
                        <td class="border p-1">{{$extraChildCharge}}</td>
                    @endif
                    <td class="border p-1">{{ number_format($tax, 2) }}</td>
                    <td class="border p-1">{{ number_format($total, 2) }}</td>
                </tr>
            @endforeach

            <tr class="font-semibold bg-gray-100">
                <td class="border p-1"> TOTAL</td>
                <td class="border p-1">{{ number_format($roomTotal, 1) }}</td>

                @foreach ($booking->services as $service)
                    @php
                        $serviceTotal = $booking->staying_days * ($service->service->price * $service->quantity);
                        $totalServicePrices += $serviceTotal;
                    @endphp
                    <td class="border p-1">{{ number_format($serviceTotal, 1) }}</td>
                @endforeach

                @php
                    $grandSubtotal = $booking->extra_child_charge + $roomTotal + $totalServicePrices + ($booking->extra_person * $booking->staying_days);
                    $grandTax = $grandSubtotal * ($booking->amount < 7500 ? 0.12 : 0.18);
                    $grandTotal = $grandSubtotal + $grandTax;
                @endphp

                <td class="border p-1">{{ number_format($booking->extra_person, 2) }}</td>
                @if($booking->children)
                <td class="border p-1">{{ number_format($booking->extra_child_charge, 1) }}</td>
                @endif
                <td class="border p-1">{{ number_format($grandTax, 2) }}</td>
                <td class="border p-1">{{ number_format($grandTotal, 2) }}</td>
            </tr>
        </tbody>
    </table>


    @php
    $payableGross = $grandTotal;
    $commission = 2920.0; // Or calculate if dynamic
    $commissionGst = $commission * 0.18;
    $commissionTotal = $commission + $commissionGst;
    $tcs = $payableGross * 0.005;
    $tds = $roomTotal * 0.001; // usually TDS is calculated on room charges
    $taxDeduction = $tcs + $tds;
    $payableToProperty = $payableGross - $commissionTotal - $taxDeduction;
@endphp

<div class="mb-6">
    <p class="font-semibold">Final Calculation</p>
    <ul class="list-disc list-inside text-sm">
        <li>Room Charges: ₹ {{ number_format($booking->amount, 1) }}</li>
        <li>Service Charges: ₹ {{ number_format($booking->additional_service_charge, 1) }}</li>
        <li>Extra Person Charges: ₹ {{ number_format(($booking->extra_person * $booking->staying_days), 1) }}</li>
        <li>Extra Child Charges: ₹ {{ $booking->extra_child_charge ?? 0 }}</li>
        <li>Property Taxes ({{$tax}}%): ₹ {{ number_format($booking->tax_and_fee, 2) }}</li>
        <li><strong>(A) Property Gross Charges: ₹ {{ number_format($booking->total_amount, 2) }}</strong></li>

        {{-- <li>Go-MMT Commission: ₹ {{ number_format($commission, 1) }}</li>
        <li>GST on Commission (18%): ₹ {{ number_format($commissionGst, 1) }}</li>
        <li><strong>(B) Go-MMT Commission (incl. GST): ₹ {{ number_format($commissionTotal, 1) }}</strong></li>

        <li>TCS (0.5%): ₹ {{ number_format($tcs, 1) }}</li>
        <li>TDS (0.1%): ₹ {{ number_format($tds, 1) }}</li>
        <li><strong>(C) Tax Deduction (TCS + TDS): ₹ {{ number_format($taxDeduction, 1) }}</strong></li>

        <li><strong>Payable to Property (A - B - C): ₹ {{ number_format($payableToProperty, 1) }}</strong></li> --}}
    </ul>
</div>


    <div class="mt-6 text-center no-print">
        <button onclick="window.print()" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Print Voucher</button>
    </div>
</div>
</body>
</html>
