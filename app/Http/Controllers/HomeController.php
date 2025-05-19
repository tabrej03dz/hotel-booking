<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmationMail;
use App\Mail\UserRegistrationMail;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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

    public function userProfile(){
        $user = \auth()->user();
        return view('frontend.profile.user-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone_number' => 'nullable|string',
        ]);

        auth()->user()->update($request->only('name', 'email', 'phone_number'));

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        auth()->user()->update(['password' => Hash::make($request->new_password)]);

        return back()->with('password_success', 'Password updated successfully!');
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

    // public function bookingSave(Request $request, Room $room){
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'phone' => 'required',
    //         'check_in_date' => 'required',
    //         'check_out_date' => 'required',
    //     ]);

    //     // 1. Find or create customer
    //     if(!auth()->check()){
    //         $tempPassword = Str::random(8);
    //         $user = User::firstOrCreate(
    //             ['email' => $request->email],
    //             [
    //                 'name' => $request->name,
    //                 'phone' => $request->phone,
    //                 'address' => $request->address ?? null,
    //                 'password' => Hash::make($tempPassword),
    //             ]
    //         );
    //         if ($user->roles->isEmpty()) {
    //             $user->assignRole('User');
    //         }
    //         Auth::login($user);
    //         $user->tempPassword = $tempPassword;
    //         Mail::to($request->email)->send(new UserRegistrationMail($user));
    //     }
    //     $user = Auth::user();

    //     // 2. Find available room
    //     $room = Room::where('id', $room->id)->first();

    //     if (!$room) {
    //         return back()->with('error', 'No available rooms of this type.');
    //     }

    //     $price = ($room->discounted_price ?? $room->price) ?? ($room->roomType->discounted_price ?? $room->roomType->price) * $request->days;
    //     $tax = ($price * 18)/100;

    //     // 3. Create booking
    //     $booking = Booking::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'user_id' => $user->id,
    //         'room_id' => $room->id,
    //         'check_in_date' => $request->check_in_date,
    //         'check_out_date' => $request->check_out_date,
    //         'status' => 'pending',
    //         'staying_days' => $request->days,
    //         'amount' => $price,
    //         'tax_and_fee' => $tax,
    //         'total_amount' => $price + $tax, // basic cost
    //     ]);

    //     if ($booking){
    //         Payment::create([
    //             'booking_id' => $booking->id,
    //             'payment_method' => 'online',
    //             'amount' => $price,
    //             'tax_and_fee' => $tax,
    //             'total_amount' => $price + $tax,
    //             'status' => 'pending',
    //         ]);
    //     }

    //     Mail::to($request->email)->send(new BookingConfirmationMail($booking));

    //     return redirect()->route('user.dashboard')->with('success', 'Your reservation at Hotel Krinoscco is confirmed. A confirmation email has been sent to '.$request->email.'.');

    // }







    public function bookingSave(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'days' => 'required|integer|min:1'
        ]);

        // Handle guest login or register
        if (!auth()->check()) {
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

            if ($user->roles->isEmpty()) {
                $user->assignRole('User');
            }

            Auth::login($user);
            $user->tempPassword = $tempPassword;
            Mail::to($request->email)->send(new UserRegistrationMail($user));
        }

        $user = Auth::user();
        $room = Room::find($room->id);

        if (!$room) {
            return back()->with('error', 'No available rooms of this type.');
        }

        $price = (($room->discounted_price ?? $room->price) ?? ($room->roomType->discounted_price ?? $room->roomType->price)) * $request->days;
        $tax = ($price * 18) / 100;
        $total = $price + $tax;

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
            'total_amount' => $total,
        ]);

        $transactionId = 'TXN' . now()->format('YmdHis') . strtoupper(Str::random(6));

        $payment = Payment::create([
            'transaction_id' => $transactionId,
            'booking_id' => $booking->id,
            'payment_method' => 'online',
            'amount' => $price,
            'tax_and_fee' => $tax,
            'total_amount' => $total,
            'status' => 'pending',
        ]);

//        return redirect()->route('user.dashboard')->with('success', 'Booking record created successfully');


        $path = storage_path() . "/json/worldline_AdminData.json";
        $mer_array = json_decode(file_get_contents($path), true);
        $txnId = $transactionId;
        $consumerId = 123;
        $amount = $total;
        if($mer_array['typeOfPayment'] == "TEST")
        {
            $amount = 1;
        }

        if($mer_array['enableEmandate'] == 1 && $mer_array['enableSIDetailsAtMerchantEnd'] == 1){
            $request->debitStartDate = date('d-m-Y');
            $request->debitEndDate = date('d-m-Y', strtotime($request->debitStartDate ));
        }
        $maxAmount = $amount *2;
        if($mer_array['enableEmandate'] == 1){
            $amt = $amount;
            $maxAmount = $amt *2;
        }
        $mobile = $user->mobile_number ?? '9999999999';
        $email = $user->email;

        $datastring = $mer_array['merchantCode'] . "|" . $txnId . "|" . $amount . "|" . "|" . $consumerId . "|" . $mobile . "|" . $email . "||||||||||" . $mer_array['salt'];

//        if($mer_array['enableEmandate'] == 1){
//            $datastring = $mer_array['merchantCode'] . "|" . $txnId . "|" . $amount . "|" . "|" . $consumerId . "|" . $mobile . "|" . $email . "||||||||||" . $mer_array['salt'];
//        }
//        if($mer_array['enableEmandate'] == 1 && $mer_array['enableSIDetailsAtMerchantEnd'] == 1 )
//        {
//            $datastring = $mer_array['merchantCode']."|".$txnId."|".$amount."|".$request->accNo."|".$consumerId."|".$mobile . "|" . $email."|".$request->debitStartDate."|".$request->debitEndDate."|".$request->maxAmount."|".$amountType."|".$request->frequency."|".$request->cardNumber."|".$request->expMonth."|".$request->expYear."|".$request->cvvCode."|".$mer_array['salt'];
//        }

        $hashVal = hash('sha512', $datastring);
        $paymentDetails = array(
            'marchantId' => $mer_array['merchantCode'],
            'txnId' => $txnId,
            'amount' => $amount,
            'currencycode' => 'INR',
            'schemecode' => $mer_array['merchantSchemeCode'],
            'consumerId' => $consumerId,
            'mobileNumber' => $user->mobile_number ?? '9999999999',
            'email' => $user->email,
            'customerName' => $user->name,
            'accNo' => '',
            'accountName' => '',
            'aadharNumber' => '',
            'ifscCode' => '',
            'accountType' => '',
            'debitStartDate' => '',
            'debitEndDate' => '',
            'maxAmount' => $maxAmount,
            'amountType' => 'M',
            'frequency' => 'ADHO',
            'cardNumber' => '',
            'expMonth' => '',
            'expYear' => '',
            'cvvCode' => '',
            'hash' => $hashVal
        );
        return view('payment.paynimo-checkout', ['payval' => $paymentDetails],compact('mer_array'));



//        return view('payment.paynimo-checkout', compact('token', 'transactionId', 'total', 'user'));
    }



//$txnId = now()->timestamp;
//$data = [
//'booking' => $booking,
//'payment' => $payment,
//'merchantId' => 'L3348', // your merchant ID
//'consumerId' => $user->id,
//'txnId' => $txnId,
//'token' => $this->generatePaynimoToken($booking, $payment, $txnId), // See next step
//];








    public function bookingdetail(){
        return view('frontend.bookingdetail');
    }

    public function roomdetail(){
        return view('frontend.roomdetail');
    }

    public function generateInvoice(Booking $booking){
        return view('frontend.profile.booking-invoice', compact('booking'));
    }





    public function generatePaymentToken(Request $request)
    {
        $merchantId = env('WORLDLINE_MERCHANT_ID');
        $secretKey = env('WORLDLINE_SECRET_KEY');
        $returnUrl = env('WORLDLINE_RETURN_URL');

        $transactionId = uniqid("TXN_");
        $amount = "100.00"; // Or from request
        $customerId = "CUST123"; // Should be dynamic

        $requestData = [
            "merchant" => [
                "identifier" => $merchantId
            ],
            "transaction" => [
                "deviceIdentifier" => "S",
                "currency" => "INR",
                "dateTime" => now()->format('d-m-Y H:i:s'),
                "token" => "",
                "requestType" => "Payment",
                "merchantTransactionIdentifier" => $transactionId,
                "amount" => $amount
            ],
            "customer" => [
                "identifier" => $customerId,
                "email" => "test@example.com",
                "mobile" => "9999999999"
            ],
            "returnUrl" => $returnUrl
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(env('WORLDLINE_API_URL'), $requestData);

        $data = $response->json();

        if ($data['paymentMethod']['paymentTransaction']['statusCode'] == '0300') {
            // Success
            return response()->json([
                'token' => $data['paymentMethod']['paymentTransaction']['token'],
                'txnId' => $transactionId
            ]);
        } else {
            // Error
            return response()->json([
                'error' => $data['paymentMethod']['paymentTransaction']['statusMessage'] ?? 'Token generation failed'
            ], 400);
        }
    }



}
