<?php

namespace App\Http\Controllers;

use App\Models\AvailabilityRate;
use App\Models\RoomType;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class AvailabilityRateController extends Controller
{
    public function index(Request $request){
        if ($request->month){
            $month = $request->month;
            $startOfMonth = Carbon::parse($request->month . '-01');
            $endOfMonth = Carbon::parse($request->month . '-01')->endOfMonth();
        }else{
            $month = Carbon::now()->format('Y-m');
            $startOfMonth = Carbon::now()->startOfMonth();
            $endOfMonth = Carbon::now()->endOfMonth();
        }

        if ($request->month){
            $dates = CarbonPeriod::create($startOfMonth, $endOfMonth)->toArray();
        }else{
            $today = Carbon::today();
            $dates = collect(CarbonPeriod::create($startOfMonth, $endOfMonth))
                ->filter(fn($date) => $date->gte($today))
                ->values(); // Reset the index
        }



        $roomTypes = RoomType::all();
        return view('availability-rate', compact('dates', 'roomTypes', 'month'));
    }

//    public function store(Request $request){
//        $request->validate([
//            'date' => 'required|date',
//            'rooms' => 'nullable',
//            'price' => 'nullable',
//        ]);
//
//        AvailabilityRate::create($request->all());
//        return back()->with('success', 'Record saved successfully');
//    }

    public function store(Request $request)
    {
        $record = AvailabilityRate::where(['date' => $request->date, 'room_type_id' => $request->room_type_id])->first();
        if ($record){
            $record->update($request->only('room_type_id', 'date', 'rooms', 'price'));
        }else{
            $record = AvailabilityRate::create($request->only('room_type_id', 'date', 'rooms', 'price'));
        }
        return response()->json(['message' => 'Created', 'id' => $record->id]);
    }


//    public function update(Request $request, AvailabilityRate $record){
//        $request->validate([
//            'rooms' => 'required',
//            'price' => 'required',
//        ]);
//
//        $record->update($request->all());
//        return back()->with('success', 'Record Updated successfully');
//    }

    public function update(Request $request, $id)
    {
        $record = AvailabilityRate::findOrFail($id);
        $record->update($request->only('rooms', 'price'));
        return response()->json(['message' => 'Updated']);
    }
}
