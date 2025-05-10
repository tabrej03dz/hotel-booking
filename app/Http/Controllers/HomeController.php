<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmationMail;
use App\Mail\UserRegistrationMail;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    public function userDashboard(){
        $bookings = Auth::user()->bookings()->orderBy('created_at', 'desc')->get();
        return view('frontend.profile.bookingDetail', compact('bookings'));
    }


    public function availableRoom(Request $request)
    {
        $checkIn = $request->check_in_date;
        $checkOut = $request->check_out_date;

        $days = Carbon::parse($request->check_in_date)->diffInDays(Carbon::parse($request->check_out_date));
        $availableRooms = Room::
        whereDoesntHave('bookings', function ($query) use ($checkIn, $checkOut) {
            $query->where('status', '!=', 'cancelled') // Ignore cancelled bookings
            ->where(function ($q) use ($checkIn, $checkOut) {
                $q->where('check_in_date', '<', $checkOut)
                    ->where('check_out_date', '>', $checkIn);
            });
        })
            ->get();

        return view('frontend.roomdetail', compact('availableRooms', 'checkIn', 'checkOut', 'days'));
    }

    public function bookingRoom(Request $request, Room $room){
        $checkInDate = $request->check_in_date;
        $checkOutDate = $request->check_out_date;
        $days = $request->days;
        return view('frontend.bookingdetail', compact('room', 'checkInDate', 'checkOutDate', 'days'));
    }

    public function bookingSave(Request $request, Room $room){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
        ]);

        // 1. Find or create customer
        if(!auth()->check()){
            $tempPassword = Str::random(8);
            $user = User::firstOrCreate(
                ['email' => $request->email],
                [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'address' => $request->address ?? null,
                    'password' => Hash::make($tempPassword),
                ]
            );
            Auth::login($user);
            $user->tempPassword = $tempPassword;
            Mail::to($request->email)->send(new UserRegistrationMail($user));
        }
        $user = Auth::user();

        // 2. Find available room
        $room = Room::where('id', $room->id)->first();

        if (!$room) {
            return back()->with('error', 'No available rooms of this type.');
        }

        $price = ($room->discounted_price ?? $room->price) ?? ($room->roomType->discounted_price ?? $room->roomType->price) * $request->days;
        $tax = ($price * 18)/100;

        // 3. Create booking
        $booking = Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => $user->id,
            'room_id' => $room->id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'status' => 'pending',
            'staying_days' => $request->days,
            'amount' => $price,
            'tax_and_fee' => $tax,
            'total_amount' => $price + $tax, // basic cost
        ]);

        Mail::to($request->email)->send(new BookingConfirmationMail($booking));

        return redirect()->route('user.dashboard')->with('success', 'Your reservation at Hotel Krinoscco is confirmed. A confirmation email has been sent to '.$request->email.'.');

    }

    public function bookingdetail(){
        return view('frontend.bookingdetail');
    }

    public function roomdetail(){
        return view('frontend.roomdetail');
    }


}
