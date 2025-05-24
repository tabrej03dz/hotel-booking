<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
         $totalBookings = Booking::count();
    $totalPayments = Payment::sum('amount');
    $completedBookings = Booking::where('status', 'completed')->count();
    $pendingPayments = Payment::where('status', 'pending')->sum('amount');

        return view('dashboard', compact('totalBookings', 'totalPayments', 'completedBookings', 'pendingPayments'));
    }
}
