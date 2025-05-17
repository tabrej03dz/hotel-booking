<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::latest()->paginate(10);
        return view('amenity.index', compact('amenities'));
    }

    public function create()
    {
        return view('amenity.create');
    }

    public function store(Request $request)
    {
     
        $request->validate([
            'icon'=>'nullable',
            'name' => 'required|string|max:255',
        ]);

        Amenity::create($request->all());

        return redirect()->route('amenity.index')->with('success', 'Amenity created successfully.');
    }

    public function edit(Amenity $amenity)
    {
        return view('amenity.create', compact('amenity'));
    }

    public function update(Request $request, Amenity $amenity)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $amenity->update($request->all());

        return redirect()->route('amenity.index')->with('success', 'Amenity updated successfully.');
    }

    public function destroy(Amenity $amenity)
    {
        $amenity->delete();

        return redirect()->route('amenity.index')->with('success', 'Amenity deleted successfully.');
    }
}
