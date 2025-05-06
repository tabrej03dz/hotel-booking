<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('crated_at', 'desc')->get();
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
}
