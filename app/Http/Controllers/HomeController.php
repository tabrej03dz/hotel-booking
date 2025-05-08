<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function accommodation()
    {
        return view('frontend.accommodation');
    }

    public function banquetsAndMeetings()
    {
        return view('frontend.banquets-and-meetings');
    }

    public function rulesAndRegulations()
    {
        return view('frontend.rules-and-regulations');
    }

    public function careers()
    {
        return view('frontend.careers');
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function contactUs()
    {
        return view('frontend.contact-us');
    }

    public function crescent()
    {
        return view('frontend.crescent');
    }

    public function crescentfacilities()
    {
        return view('frontend.crescentfacilities');
    }

    // Accommodation Routes
    public function standardRoom()
    {
        return view('frontend.standard-room');
    }

    public function deluxeRoom()
    {
        return view('frontend.deluxe-room');
    }

    public function suiteRoom()
    {
        return view('frontend.suite-room');
    }

    // Banquets and Meetings Routes

    public function lawnPackage()
    {
        return view('frontend.lawn-package');
    }

    public function ballroomPackage()
    {
        return view('frontend.ballroom-package');
    }


    public function elite1()
    {
        return view('frontend.elite1');
    }

    public function elite2()
    {
        return view('frontend.elite2');
    }

    public function termandcondition()
    {
        return view('frontend.termandcondition');
    }
    public function conditions()
    {
        return view('frontend.conditions');
    }
    public function liability()
    {
        return view('frontend.liability');
    }
    public function miscelleneous()
    {
        return view('frontend.miscelleneous');
    }
    public function details()
    {
        return view('frontend.details');
    }
    public function information()
    {
        return view('frontend.information');
    }
    public function policy()
    {
        return view('frontend.policy');
    }


    public function availableRoom(Request $request)
    {
        $checkIn = $request->check_in_date;
        $checkOut = $request->check_out_date;
        $availableRooms = Room::
        whereDoesntHave('bookings', function ($query) use ($checkIn, $checkOut) {
            $query->where('status', '!=', 'cancelled') // Ignore cancelled bookings
            ->where(function ($q) use ($checkIn, $checkOut) {
                $q->where('check_in_date', '<', $checkOut)
                    ->where('check_out_date', '>', $checkIn);
            });
        })
            ->get();

        return view('frontend.roomdetail', compact('availableRooms', 'checkIn', 'checkOut'));
    }

    public function bookingRoom(Room $room, $checkIn, $checkOut){
        return view('frontend.bookindetail', compact('room', 'checkIn', 'checkOut'));
    }
    public function bookingdetail(){
        return view('frontend.bookingdetail');
    }

    public function roomdetail(){
        return view('frontend.roomdetail');
    }


}
