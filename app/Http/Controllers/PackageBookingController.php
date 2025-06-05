<?php

namespace App\Http\Controllers;

use App\Mail\PackageBookinMail;
use App\Models\PackageBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\LaravelPackageTools\Package;

class PackageBookingController extends Controller
{
    public function index()
    {
        $packageBookings = PackageBooking::latest()->paginate(10);
        return view('package_bookings.index', compact('packageBookings'));
    }

    // Show the form for creating a new booking

    // Store a newly created booking in storage
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'package_name' => 'required|string|max:255',
            'preferred_date' => 'required|date',
            'additional_message' => 'nullable|string',
        ]);

        $booking = PackageBooking::create($request->all());
        Mail::to($request->email)->send(new PackageBookinMail($booking, 'user'));
        Mail::to('info@krinoscco.com')->send(new PackageBookinMail($booking, 'admin'));
        Mail::to('accounts@krinoscco.com')->send(new PackageBookinMail($booking, 'admin'));

        return back()->with('success', 'Package booking created successfully.');
    }

    // Display the specified booking
    public function show(PackageBooking $booking)
    {
        return view('package_bookings.show', compact('booking'));
    }

    // Remove the specified booking from storage
    public function destroy(PackageBooking $booking)
    {

        $booking->delete();

        return back()->with('success', 'Package booking deleted successfully.');
    }
}
