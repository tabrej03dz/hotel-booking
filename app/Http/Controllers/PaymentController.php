<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmationMail;
use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Exports\PaymentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    // public function index()
    // {
    //     $payments = Payment::orderBy('created_at', 'desc')->get();
    //     return view('payment.index', compact('payments'));
    // }

    public function create(Booking $booking){
        return view('payment.create', compact('booking'));
    }

    // Store a newly created payment in storage
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_method' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'in:pending,paid,failed',
        ]);

        Payment::create($request->all());
        return redirect('payment')->with('success', 'Payment Added successfully');
    }

    public function status(Request $request, Payment $payment){
        $payment->update(['status' => $request->status]);
        return back()->with('success', 'Status changed successfully');
    }



    public function handleResponse(Request $request)
    {
        $rawMsg = $request->input('msg');
        Log::info('Worldline Raw Response:', ['msg' => $rawMsg]);

        if (!$rawMsg) {
            return redirect()->route('user.dashboard')->with('error', 'Invalid response from payment gateway.');
        }

        // Split the message using pipe (|) delimiter
        $parts = explode('|', $rawMsg);

        $statusCode = $parts[0] ?? null;
        $statusMessage = $parts[1] ?? null;
        $txnId = $parts[3] ?? null;
        $merchantTransactionId = $parts[5] ?? null;

        // Lookup payment using either txnId or merchantTransactionId
        $payment = Payment::where('transaction_id', $txnId)->first();

        if (!$payment && $merchantTransactionId) {
            $payment = Payment::where('transaction_id', $merchantTransactionId)->first();
        }

        if ($payment) {
            if ($statusCode === '0300') {
                $payment->status = 'paid';
                $payment->booking->update(['status' => 'confirmed']);
//                $payment->booking->availabilityRate->update(['rooms' => $payment->booking->availabilityRate->rooms -1]);
                foreach ($payment->booking->roomType->selectedDateAvailabilities($payment->booking->check_in_date, $payment->booking->check_out_date) as $availability){
                    $availability->update(['rooms' => $availability->rooms - $payment->booking->rooms]);
                }
            } else {
                $payment->status = 'failed';
                $payment->response_data = $rawMsg;
                $payment->booking->update(['status' => 'failed']);
            }
            $payment->save();

            // Send mail to customer
            Mail::to($payment->booking->email)->send(new BookingMail($payment->booking, 'user'));

            // Send mail to admin
            Mail::to('info@krinoscco.com')->send(new BookingMail($payment->booking, 'admin'));
            Mail::to('accounts@krinoscco.com')->send(new BookingMail($payment->booking, 'admin'));

        }

        // Redirect with appropriate message
        return redirect()->route('user.dashboard')->with(
            $statusCode === '0300' ? 'success' : 'error',
            $statusCode === '0300' ? 'Payment successful' : 'Payment failed: ' . $statusMessage
        );
    }



//public function paymentSuccess(Request $request)
//{
//    $validated = $request->validate([
//        'txnId' => 'required|string',
//        'status' => 'required|string',
//        'amount' => 'required',
//    ]);
//
//    // Example: update your order/payment record
//    $payment = Payment::where('transaction_id', $validated['txnId'])->first();
//
//    if ($payment) {
//        $payment->status = 'success';
//        $payment->payment_mode = $request->paymentMode;
//        $payment->paid_amount = $request->amount;
//        $payment->response_data = json_encode($request->response);
//        $payment->save();
//    }
//    return response()->json(['message' => 'Payment recorded']);
//}

public function paymentFailed()
{
    return view('payment.failed');
}

private function paymentFilterQuery(Request $request)
{
    return Payment::with(['booking.user'])
        ->when($request->filled('booking_id'), function ($q) use ($request) {
            $q->where('booking_id', $request->booking_id);
        })
        ->when($request->filled('status'), function ($q) use ($request) {
            $q->where('status', $request->status);
        })
        ->when($request->filled('payment_method'), function ($q) use ($request) {
            $q->where('payment_method', $request->payment_method);
        })
        ->when($request->filled('from_date'), function ($q) use ($request) {
            $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->filled('to_date'), function ($q) use ($request) {
            $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->latest();
}

// public function index(Request $request)
// {
//     $payments = $this->paymentFilterQuery($request)->get();

//     return view('payment.index', compact('payments'));
// }

public function index(Request $request)
{
    $payments = $this->paymentFilterQuery($request)
        ->paginate(10)
        ->withQueryString();

    return view('payment.index', compact('payments'));
}

    public function show(Payment $payment)
    {
        return view('payment.show', compact('payment'));
    }

    public function export(Request $request)
    {
        $request->validate([
            'download_type' => 'required|in:excel,pdf',
        ]);

        $payments = $this->paymentFilterQuery($request)->get();

        if ($request->download_type === 'excel') {
            return Excel::download(new PaymentsExport($payments), 'payments-report.xlsx');
        }

        $pdf = Pdf::loadView('payment.pdf', compact('payments'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('payments-report.pdf');
    }


    public function payUWebhook(Request $request)
    {
        $posted = $request->all();

        Log::info('PayU Webhook Response', $posted);

        $txnid = $posted['txnid'] ?? null;
        $status = strtolower($posted['status'] ?? '');
        $mihpayid = $posted['mihpayid'] ?? null;

        if (!$txnid) {
            return response()->json([
                'status' => false,
                'message' => 'txnid missing',
            ], 422);
        }

        $payment = \App\Models\Payment::where('transaction_id', $txnid)->first();

        if (!$payment) {
            Log::warning('PayU webhook payment not found', [
                'txnid' => $txnid,
                'raw' => $posted,
            ]);

            return response()->json([
                'status' => false,
                'message' => 'payment not found',
            ], 404);
        }

        if ($payment->status === 'paid') {
            return response()->json([
                'status' => true,
                'message' => 'already paid',
            ]);
        }

        if ($status === 'success') {
            DB::transaction(function () use ($payment, $posted, $mihpayid) {
                $payment->update([
                    'status' => 'paid',
                    'payu_mihpayid' => $mihpayid,
                    'raw_request' => json_encode($posted),
                    'paid_at' => now(),
                ]);

                $booking = $payment->booking()->lockForUpdate()->first();

                if ($booking && $booking->status !== 'confirmed') {
                    $booking->update(['status' => 'confirmed']);
                }
            });

            return response()->json([
                'status' => true,
                'message' => 'payment updated successfully',
            ]);
        }

        $payment->update([
            'status' => 'failed',
            'payu_mihpayid' => $mihpayid,
            'raw_request' => json_encode($posted),
        ]);

        if ($payment->booking) {
            $payment->booking->update(['status' => 'failed']);
        }

        return response()->json([
            'status' => true,
            'message' => 'payment marked failed',
        ]);
    }

}
