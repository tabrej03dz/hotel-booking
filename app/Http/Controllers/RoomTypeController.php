<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $roomType = RoomType::create($request->all());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imagePath = $imageFile->store('hotels', 'public'); // stores in storage/app/public/hotels
    
                $roomType->images()->create([
                    'path' => $imagePath,
                ]);
            }
        }

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
            'discounted_price' => 'nullable|numeric',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $roomType->update($request->all());
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imagePath = $imageFile->store('hotels', 'public'); // stores in storage/app/public/hotels
    
                $roomType->images()->create([
                    'path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('room-type.index')->with('success', 'Room type updated successfully.');
    }

    public function destroy(RoomType $roomType)
    {
        foreach ($roomType->images as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }
        $roomType->delete();
        return back()->with('success', 'Room type deleted successfully.');
    }
}
