<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $booking->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            background: #fff;
        }
        table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        table th, table td {
            padding: 5px;
            vertical-align: top;
        }
        .total {
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }
        .action-buttons {
            text-align: center;
            margin: 20px;
        }
        .action-buttons button {
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="action-buttons">
    <button onclick="printInvoice()">🖨️ Print</button>
    <button onclick="downloadPDF()">⬇️ Download PDF</button>
</div>

<div class="invoice-box" id="invoiceBox">
    <h2>Booking Invoice</h2>

    <table>
        <tr>
            <td><strong>Invoice ID:</strong></td>
            <td class="text-right">#{{ $booking->id }}</td>
        </tr>
        <tr>
            <td><strong>Name:</strong></td>
            <td class="text-right">{{ $booking->name }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td class="text-right">{{ $booking->email }}</td>
        </tr>
        <tr>
            <td><strong>Phone:</strong></td>
            <td class="text-right">{{ $booking->phone }}</td>
        </tr>
        <tr>
            <td><strong>Room:</strong></td>
            <td class="text-right">{{ $booking->room->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Check-in:</strong></td>
            <td class="text-right">{{ $booking->check_in_date }}</td>
        </tr>
        <tr>
            <td><strong>Check-out:</strong></td>
            <td class="text-right">{{ $booking->check_out_date }}</td>
        </tr>
        <tr>
            <td><strong>Staying Days:</strong></td>
            <td class="text-right">{{ $booking->staying_days }}</td>
        </tr>
        <tr>
            <td><strong>Status:</strong></td>
            <td class="text-right">{{ ucfirst($booking->status) }}</td>
        </tr>
    </table>


    <hr>

    <table>
        <tr>
            <td>Booking Amount:</td>
            <td class="text-right">₹{{ number_format($booking->amount, 2) }}</td>
        </tr>
        <tr>
            <td>Tax & Fee:</td>
            <td class="text-right">₹{{ number_format($booking->tax_and_fee, 2) }}</td>
        </tr>
        <tr class="total">
            <td>Total Amount:</td>
            <td class="text-right">₹{{ number_format($booking->total_amount, 2) }}</td>
        </tr>
    </table>

    <hr>

    <h4>Payment Details</h4>
    @if($booking->payment)
        <table>
            <tr>
                <td><strong>Payment Method:</strong></td>
                <td class="text-right">{{ ucfirst($booking->payment->payment_method) }}</td>
            </tr>
            <tr>
                <td><strong>Payment Status:</strong></td>
                <td class="text-right">{{ ucfirst($booking->payment->status) }}</td>
            </tr>
            <tr>
                <td><strong>Paid Amount:</strong></td>
                <td class="text-right">₹{{ number_format($booking->payment->amount, 2) }}</td>
            </tr>
        </table>
    @else
        <p>No payment has been made yet.</p>
    @endif


    <hr>

    <p>Thank you for booking with us!</p>
</div>

<!-- JS Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
    function printInvoice() {
        const printContents = document.getElementById('invoiceBox').innerHTML;
        const originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }

    function downloadPDF() {
        const element = document.getElementById('invoiceBox');
        const opt = {
            margin:       0.5,
            filename:     'invoice-{{ $booking->id }}.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        html2pdf().set(opt).from(element).save();
    }
</script>
</body>
</html>
