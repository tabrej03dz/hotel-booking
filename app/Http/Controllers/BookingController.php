<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'room'])->latest()->get();
        return view('booking.index', compact('bookings'));
    }

    // 🟢 Show booking creation form
    public function create()
    {
        $roomTypes = RoomType::all(); // For selecting room types
        $rooms = Room::where('status', 'available')->get();
        return view('booking.create', compact('roomTypes', 'rooms'));
    }

    // 🟢 Store a new booking
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string',
            'room_type_id' => 'required|exists:room_types,id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'extra_person' => 'nullable|integer|min:0',
            'rooms' => 'required|integer|min:1',
            'amount' => 'nullable|numeric',
            'additional_service_charge' => 'nullable|numeric',
            'tax_and_fee' => 'nullable|numeric',
            'total_amount' => 'nullable|numeric',
            'gst_number' => 'nullable|string|max:15',
            'company_name' => 'nullable|string|max:255',
            'status' => 'required|in:pending,confirmed,cancelled,completed,failed',
        ]);

        // 1. Create or get user
        $user = User::firstOrCreate(
            ['phone' => $request->phone],
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('password'),
            ]
        );

        // 2. Fetch room type info (for price logic, if needed)
        $roomType = RoomType::findOrFail($request->room_type_id);

        // 3. Create booking
        $booking = Booking::create([
            'user_id' => $user->id,
            'room_type_id' => $request->room_type_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'status' => $request->status,
            'staying_days' => Carbon::parse($request->check_out_date)->diffInDays(Carbon::parse($request->check_in_date)),
            'amount' => $request->amount,
            'additional_service_charge' => $request->additional_service_charge ?? 0,
            'tax_and_fee' => $request->tax_and_fee ?? 0,
            'total_amount' => $request->total_amount ?? 0,
            'adults' => $request->adults,
            'children' => $request->children ?? 0,
            'extra_person' => $request->extra_person ?? 0,
            'rooms' => $request->rooms,
            'gst_number' => $request->gst_number,
            'company_name' => $request->company_name,
        ]);

        return redirect()->route('booking.show', $booking->id)->with('success', 'Booking created successfully.');
    }


    // 🟢 Show a single booking
    public function show(Booking $booking)
    {
        return view('booking.show', compact('booking'));
    }

    // 🟢 Show edit form
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $roomTypes = RoomType::all();
        return view('booking.create', compact('booking', 'roomTypes'));
    }

    // 🟢 Update booking
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $request->validate([
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $booking->update([
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'status' => $request->status,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking updated.');
    }

    // 🟢 Delete booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('booking.index')->with('success', 'Booking cancelled.');
    }

    public function status(Request $request, Booking $booking){
        $booking->update(['status' => $request->status]);
        if($booking->status == 'cancelled' || $booking->status == 'completed'){
            $booking->room->update(['status' => 'available']);
        }
        return back()->with('success', 'Status changed successfully');
    }

    public function cancel(Booking $booking){
        $booking->room->update(['status', 'available']);
        $booking->update(['status' => 'cancelled']);
        return back()->with('success', 'Booking cancelled succcessfully');
    }

}
