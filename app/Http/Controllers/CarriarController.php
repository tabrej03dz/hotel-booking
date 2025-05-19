<?php

namespace App\Http\Controllers;

use App\Models\Carriar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarriarController extends Controller
{
    public function index()
    {
        $jobs = Carriar::latest()->paginate(10);
        return view('carriar.index', compact('jobs'));
    }


    public function create()
    {
        return view('carriar.create');
    }
    public function edit(Carriar $carriar)
    {
        return view('carriar.create', compact('carriar'));
    }
  public function storeJob(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'company_name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'type' => 'nullable|string',
        'salary' => 'nullable|numeric',
        'experience' => 'nullable|string|max:100',
        'qualification' => 'nullable|string|max:255',
        'contact_email' => 'required|email|max:255',
        'last_date_to_apply' => 'nullable|date',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
    ]);

    $data = $validated;

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('carriar-images', 'public');
    }

    Carriar::create($data);

    return redirect()->route('carriar.index')->with('success', 'Job created successfully.');
}



public function updateJob(Request $request, Carriar $carriar)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'company_name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'type' => 'nullable|string',
        'salary' => 'nullable|numeric',
        'experience' => 'nullable|string|max:100',
        'qualification' => 'nullable|string|max:255',
        'contact_email' => 'required|email|max:255',
        'last_date_to_apply' => 'nullable|date',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
    ]);

    $data = $validated;

    if ($request->hasFile('image')) {
        // Optional: delete old image file from storage
        if ($carriar->image && Storage::disk('public')->exists($carriar->image)) {
            Storage::disk('public')->delete($carriar->image);
        }

        $data['image'] = $request->file('image')->store('carriar-images', 'public');
    }

    $carriar->update($data);

    return redirect()->route('carriar.index')->with('success', 'Job updated successfully.');
}


    public function delete(Carriar $carriar)
{
    // Check if image exists and delete it
    if ($carriar->image && Storage::disk('public')->exists($carriar->image)) {
        Storage::disk('public')->delete($carriar->image);
    }

    // Then delete the carriar record
    $carriar->delete();

    return redirect()->route('carriar.index')->with('success', 'Job deleted successfully.');
}

}
