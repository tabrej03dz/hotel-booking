<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Amenity;
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
        $amenities = Amenity::all();
        return view('room.create', compact('hotels', 'roomTypes', 'amenities'));
    }

    public function store(RoomRequest $request)
    {
        $room = Room::create($request->all());
        if ($request->has('amenities')) {
            $room->amenities()->sync($request->input('amenities'));
        }

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }


    public function edit(Room $room)
    {
        $hotels = Hotel::all();
        $roomTypes = RoomType::all();
        $amenities = Amenity::all();
        return view('room.create', compact('room', 'hotels', 'roomTypes', 'amenities'));
    }

    public function update(RoomRequest $request, Room $room)
    {
        $room->update($request->all());

        if ($request->has('amenities')) {
            $room->amenities()->sync($request->input('amenities'));
        }
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return back()->with('success', 'Room deleted successfully.');
    }

}
