<?php

namespace App\Http\Controllers;

use App\Models\AdditionalService;
use Illuminate\Http\Request;

class AdditionalServiceController extends Controller
{
    public function index(){
        $additionalServices = AdditionalService::all();
        return view('additional-service.index', compact('additionalServices'));
    }

    public function create(){
        return view('additional-service.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        AdditionalService::create($request->all());
        return redirect('additional-service')->with('success', 'Record saved successfully');
    }

    public function edit(AdditionalService $service){
        return view('additional-service.create', compact('service'));
    }

    public function update(Request $request, AdditionalService $service){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $service->update($request->all());
        return redirect('additional-service')->with('success', 'Updated successfully');
    }

    public function delete(AdditionalService $service){
        $service->delete();
        return back()->with('success', 'Deleted successfully');
    }
}
