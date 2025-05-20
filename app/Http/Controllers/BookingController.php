<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
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
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'room_id' => 'required|exists:rooms,id',
        ]);

        // 1. Find or create customer
        $customer = User::firstOrCreate(
            ['phone' => $request->phone],
            [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address ?? null,
                'password' => Hash::make('password'),
            ]
        );

        // 2. Find available room
        $room = Room::where('id', $request->room_id)
            ->where('status', 'available')
            ->first();

        if (!$room) {
            return back()->with('error', 'No available rooms of this type.');
        }

        // 3. Create booking
        $booking = Booking::create([
            'user_id' => $customer->id,
            'room_id' => $room->id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'status' => 'pending',
            'total_amount' => $room->discounted_price
                ?? $room->price
                ?? $room->roomType->discounted_price
                ?? $room->roomType->price, // basic cost
        ]);

        // 4. Update room status
        $room->update(['status' => 'booked']);

        return redirect()->route('booking.show', $booking->id)->with('success', 'Booking created successfully.');
    }

    // 🟢 Show a single booking
    public function show($id)
    {
        $booking = Booking::with(['customer', 'room.roomType'])->findOrFail($id);
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
