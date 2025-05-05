<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(){
        $hotels = Hotel::all();
        return view('hotel.index', compact('hotels'));
    }

    public function create(){
        return view('hotel.create');
    }
}
