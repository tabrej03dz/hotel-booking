<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AvailabilityRate;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
//    function __construct() {
//        AvailabilityRate::where('date', '<', today())
//            ->where('rooms', '>', 0)
//            ->update(['rooms' => 0]);
//    }

    public function dashboard()
    {
         $totalBookings = Booking::count();
    $totalPayments = Payment::sum('amount');
    $completedBookings = Booking::where('status', 'completed')->count();
    $pendingPayments = Payment::where('status', 'pending')->sum('amount');

        return view('dashboard', compact('totalBookings', 'totalPayments', 'completedBookings', 'pendingPayments'));
    }
}
