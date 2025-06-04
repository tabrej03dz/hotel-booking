<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmationMail;
use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'desc')->get();
        return view('payment.index', compact('payments'));
    }

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

}
