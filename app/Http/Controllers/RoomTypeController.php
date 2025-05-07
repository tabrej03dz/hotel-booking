<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();
        return view('room_type.index', compact('roomTypes'));
    }

    public function create(){
        return view('room_type.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',
        ]);

        RoomType::create($request->all());

        return redirect()->route('room-type.index')->with('success', 'Room type created successfully.');
    }


    public function edit(RoomType $roomType)
    {
        return view('room_type.create', compact('roomType'));
    }

    public function update(Request $request, RoomType $roomType)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
        ]);

        $roomType->update($request->all());

        return redirect()->route('room-type.index')->with('success', 'Room type updated successfully.');
    }

    public function destroy(RoomType $roomType)
    {
        $roomType->delete();

        return back()->with('success', 'Room type deleted successfully.');
    }
}
