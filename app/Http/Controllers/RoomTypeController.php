<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
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
        $amenities = Amenity::all();
        return view('room_type.create', compact('amenities'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
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
        if ($request->has('amenities')) {
            $roomType->amenities()->sync($request->input('amenities'));
        }

        return redirect()->route('room-type.index')->with('success', 'Room type created successfully.');
    }


    public function edit(RoomType $roomType)
    {
        $amenities = Amenity::all();
        return view('room_type.create', compact('roomType', 'amenities'));
    }

    public function update(Request $request, RoomType $roomType)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
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

        if ($request->has('amenities')) {
            $roomType->amenities()->sync($request->input('amenities'));
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
