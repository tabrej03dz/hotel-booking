<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmationMail;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
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



    public function paymentResponse(Request $request)
{
    $res = $request->all();
    $booking = Booking::find($res['txnId']); // Assuming txnId is booking ID or use mapping

    if ($res['paymentMethod']['paymentTransaction']['statusCode'] === '0300') {
        $booking->update(['status' => 'confirmed']);
        $booking->payment->update(['status' => 'completed']);
        Mail::to($booking->email)->send(new BookingConfirmationMail($booking));
        return redirect()->route('payment.success');
    }

    return redirect()->route('payment.failed');
}

public function paymentSuccess()
{
    return view('payment.success');
}

public function paymentFailed()
{
    return view('payment.failed');
}

}
