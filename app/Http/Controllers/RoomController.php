<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with(['hotel', 'roomType'])->get();
        return view('room.index', compact('rooms'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        $roomTypes = RoomType::all();
        return view('room.create', compact('hotels', 'roomTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_type_id' => 'required|exists:room_types,id',
            'room_number' => 'required|unique:rooms,room_number',
            'status' => 'required|in:available,booked,maintenance',
            'price' => 'nullable|numeric',
            'discounted_price' => 'nullable|numeric',
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }


    public function edit(Room $room)
    {
        $hotels = Hotel::all();
        $roomTypes = RoomType::all();
        return view('room.create', compact('room', 'hotels', 'roomTypes'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_type_id' => 'required|exists:room_types,id',
            'room_number' => 'required|unique:rooms,room_number,' . $room->id,
            'status' => 'required|in:available,booked,maintenance',
            'price' => 'nullable|numeric',
            'discounted_price' => 'nullable|numeric',
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return back()->with('success', 'Room deleted successfully.');
    }

}
