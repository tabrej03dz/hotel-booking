<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function index(){
        $hotels = Hotel::all();
        return view('hotel.index', compact('hotels'));
    }

    public function create(){
        return view('hotel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // max is in KB (2MB)
        ]);


        $hotel = Hotel::create($request->all());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imagePath = $imageFile->store('hotels', 'public'); // stores in storage/app/public/hotels
    
                $hotel->images()->create([
                    'path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('hotel.index')->with('success', 'Hotel created successfully.');
    }

    public function edit(Hotel $hotel)
    {
        return view('hotel.create', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $hotel->update($request->all());
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imagePath = $imageFile->store('hotels', 'public'); // stores in storage/app/public/hotels
    
                $hotel->images()->create([
                    'path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('hotel.index')->with('success', 'Hotel updated successfully.');
    }

    public function destroy(Hotel $hotel)
    {
        foreach ($hotel->images as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }
        $hotel->delete();
        return back()->with('success', 'Hotel deleted successfully.');
    }


}
