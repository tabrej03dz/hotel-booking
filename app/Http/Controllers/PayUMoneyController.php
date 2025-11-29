<?php

namespace App\Http\Controllers;

use App\Mail\BookingMail;
use App\Mail\UserRegistrationMail;
use App\Models\AdditionalService;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PayUMoneyController extends Controller
{
    public function payUMoneyViewa()
    {
        $MERCHANT_KEY = env('PAYUMONEY_MERCHANT_KEY');
        $SALT = env('PAYUMONEY_MERCHANT_SALT');

        dd(auth()->user());

        $PAYU_BASE_URL = "https://test.payu.in";

//        $PAYU_BASE_URL = "https://secure.payu.in"; // PRODUCATION
        $name = auth()->user()->name;
        $successURL = route('pay.u.response');
        $failURL = route('pay.u.cancel');
        $email = auth()->user()->email;
        $amount = 1000;

        $action = '';
        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        $posted = array();
        $posted = array(
            'key' => $MERCHANT_KEY,
            'txnid' => $txnid,
            'amount' => $amount,
            'firstname' => $name,
            'email' => $email,
            'productinfo' => 'Webappfix',
            'surl' => $successURL,
            'furl' => $failURL,
            'service_provider' => 'payu_paisa',
        );

        if(empty($posted['txnid'])) {
            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        }
        else{
            $txnid = $posted['txnid'];
        }

        $hash = '';
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

        if(empty($posted['hash']) && sizeof($posted) > 0) {
            $hashVarsSeq = explode('|', $hashSequence);
            $hash_string = '';
            foreach($hashVarsSeq as $hash_var) {
                $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                $hash_string .= '|';
            }
            $hash_string .= $SALT;

            $hash = strtolower(hash('sha512', $hash_string));
            $action = $PAYU_BASE_URL . '/_payment';
        }
        elseif(!empty($posted['hash']))
        {
            $hash = $posted['hash'];
            $action = $PAYU_BASE_URL . '/_payment';
        }

        return view('pay-u',compact('action','hash','MERCHANT_KEY','txnid','successURL','failURL','name','email','amount'));
    }



//    public function payUMoneyView(Request $request, RoomType $roomType)
//    {
//        $request->validate([
//            'name'           => 'required|string|max:255',
//            'email'          => 'required|email',
//            'phone'          => 'required|string',
//            'address'        => 'nullable|string',
//            'check_in_date'  => 'required|date',
//            'check_out_date' => 'required|date|after:check_in_date',
//            'adults'         => 'required|integer|min:1',
//            'children'       => 'nullable|integer|min:0',
//            'service_ids'    => 'array',
//            'service_ids.*'  => 'integer|exists:additional_services,id',
//            'quantities'     => 'array',
//            'rooms'          => 'required|integer|min:1',
//            'extra_person'   => 'nullable|integer',
//
//            'gst_required'   => 'nullable|in:on', // optional checkbox
//            'gst_number'     => 'nullable|required_if:gst_required,on|string|max:15',
//            'company_name'   => 'nullable|required_if:gst_required,on|string|max:255',
//            'child_ages'     => 'nullable|array',
//            'child_ages.*'   => 'required_if:children,1,2,3|integer|min:0|max:17',
//        ]);
//
//
//
//        // Handle guest login or register
//        if (!auth()->check()) {
//            $tempPassword = Str::random(8);
//            $user = User::firstOrCreate(
//                ['email' => $request->email],
//                [
//                    'name' => $request->name,
//                    'phone' => $request->phone,
//                    'address' => $request->address ?? null,
//                    'password' => Hash::make($tempPassword),
//                ]
//            );
//
//            if ($user->roles->isEmpty()) {
//                $user->assignRole('User');
//            }
//
//            Auth::login($user);
//            $user->tempPassword = $tempPassword;
//            Mail::to($request->email)->send(new UserRegistrationMail($user));
//        }
//
//        $user = Auth::user();
//
//        $availabilities = $roomType->selectedDateAvailabilities($request->check_in_date, $request->check_out_date);
//
//        if (
//            $availabilities->count() != $request->days ||
//            $availabilities->contains(function ($availability) use ($request) {
//                return $availability->rooms < $request->rooms;
//            })
//        ) {
//            return back()->with('error', 'No available rooms of this typev on selected date.');
//        }
//
//        //$roomTotal = $available->price * $request->days;
//        $roomTotal = $roomType->selectedDateAvailabilities($request->check_in_date, $request->check_out_date)->sum('price');
//        $roomTotal = $roomTotal * ($request->rooms ?? 1);
//
//        $serviceCharge = 0;
//        if ($request->has('service_ids')) {
//            foreach ($request->service_ids as $serviceId) {
//                $qty = $request->quantities[$serviceId] ?? 1;
//                $service = AdditionalService::find($serviceId);
//                if ($service) {
//                    $serviceCharge += $service->price * $qty;
//                }
//            }
//        }
//        $serviceCharge = $serviceCharge * $request->days;
//
//        $extraChildCharge = 0;
//        if ($request->child_ages){
//            foreach ($request->child_ages as $age){
//                if ($age > 6){
//                    $extraChildCharge += 500 * $request->days;
//                }
//            }
//        }
//
//        // 👉 Extra person calculation
//        $extraAdults = max(0, $request->adults - 2);
//        $extraPersonAmount = $extraAdults * 1500 * $request->days;
//
//        if($roomTotal >= 7500){
//            $gst = 18/100;
//        }else{
//            $gst = 12/100;
//        }
//        // 👉 Final calculation
//        $subTotal = $roomTotal + $serviceCharge + $extraPersonAmount + $extraChildCharge;
//        $tax = round($subTotal * $gst, 2);
//        $totalAmount = round($subTotal + $tax, 2);
//
//        // 👉 Save booking
//        $booking = Booking::create([
//            'booking_id' => 'KRI' . now()->format('His') . rand(1000, 9999),
//            'name' => $request->name,
//            'email' => $request->email,
//            'phone' => $request->phone,
//            'user_id' => auth()->id(),
//            'room_type_id' => $roomType->id,
//            'check_in_date' => $request->check_in_date,
//            'check_out_date' => $request->check_out_date,
//            'staying_days' => $request->days,
//            'amount' => $roomTotal,
//            'additional_service_charge' => $serviceCharge,
//            'tax_and_fee' => $tax,
//            'total_amount' => $totalAmount,
//            'adults' => $request->adults,
//            'children' => $request->children,
//            'status' => 'pending',
//            'rooms' => $request->rooms,
//            'extra_person' => $extraPersonAmount,
//            'gst_number' => $request->gst_number,
//            'company_name' => $request->company_name,
//            'child_ages' => $request->child_ages,
//            'extra_child_charge' => $extraChildCharge,
//        ]);
//
//        // Step 7: Save selected services
//        if ($request->has('service_ids')) {
//            foreach ($request->service_ids as $serviceId) {
//                $qty = $request->quantities[$serviceId] ?? 1;
//                $booking->services()->create([
//                    'additional_service_id' => $serviceId,
//                    'quantity' => $qty,
//                ]);
//            }
//        }
//
//        foreach ($roomType->selectedDateAvailabilities($request->check_in_date, $request->check_out_date) as $availability){
//            $booking->availabilities()->create([
//                'availability_rate_id' => $availability->id,
//                'price' => $availability->price,
//            ]);
//        }
//
//        $transactionId = 'TXN' . now()->format('YmdHis') . strtoupper(Str::random(6));
//
//        $payment = Payment::create([
//            'booking_id' => $booking->id,
//            'payment_method' => 'online', // or 'cash', etc.
//            'amount' => $totalAmount,
//            'transaction_id' => '1234',
//            'status' => 'pending',
//        ]);
//
//
//
//        $MERCHANT_KEY = 'TegtFB';
//        $SALT = 'MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDt9lhoxyR/zkQaebqM8tbK8CNYrcYloMHA5CvLkPSRgDN0WZwOFcPywLpLWWOqTMz2/Hb8UmV4gRmROUQksq7CjKxvaKZ4U07SHqn65eRyuVhPum7Evd3+4Wm7NbsxNPR5h2kTtRmyVCkRhjzmhhAndcRaIT9v4Dx6NlXWTeEmDg0SLnCRQM/MClf2QV1ICQwm8LbZaRFz1LjeF+aC8VzsAU6odk/zuIhQDdMFWw1oIu+K/e8g/xUf/n/Ibv77yUiZQMmXM0pvPE4z/Rwe0p1n9biMP4v5nX7QsIhpKRkTOWH+vzoOLRX1q+CdDcSleijSrHyXFfGuH8fg6PlYI+1FAgMBAAECggEAPffBZSO65wdlZ8mcYXkZo0ZuxfiW2ZSn8B3bI8tPTRaoD5wITgiv+ubifJ2+HQqb85OiPqoMX5mq+U0C6FWZufMdMnP7qejz5Tb0B/DXEWMf0r9XeieBiI7V1Fk1Mqa6JW20WNv34Z8WBMjC0jtGOKhr5hazaORpi1/b8Y9dWuWcRzNJ4acjbnX/5fsedBSQEtmcyfXzAtHSLTyH60XH54I9rNVlBrl3tYFbkRltEUlyKEAGsV536Ms2g2oJ2aqLlB2BsVf/zMgB8cQ/h/qYp2Hk8DAtusL/FoY+tiMcvesqVoCYI1/ueI5nlgmUaArP6cXq/1+PKeOQA4i5nnzrTwKBgQD02uOZHkG9fuPfGQ+KX2IlIOwPX5wioDImQfIeNB82jtsN0BXDW+DPN145j+JuYpGdIS8RYn25Pfp/pc4xLd4GaGqn6bnMLqJqz3mlLYjBOh9lJeZr9AXVDNKMbvr28s2VTx7PPXZz6kbOockIkAx8Mg8h6NxxbEYAqRbpREuUgwKBgQD4yyPqPN44S5Vz6/odQvPdqitj1spUsEwW40wz94ZIseIRP6bwgeAC+PmBC/mqOUIKHBMWdCtvFEG8jNnUnIKTjJVk0CMVKiQr1Ov3VyM5pxzYGtfY+Xvil8TqXm3H3sv93IurgP58arUleZ6nZ3fri1MRxoYkyYBJ7YlHoJsclwKBgQCdESyetEIHhLY4DqNhZ/5VQuEqm3JU495HnFXr+hNrtAfgvHK5dt6nDiVrV1kw5hnyaa7/v+ZWRePCrmGuOnYKNkD0pYGB8QhO6/hkdOkcymQJRl6hMU/scuU9IJPshaRK+w4QcqThho8VTcLfs0fPA22hmvaN656cHduMlzrEcQKBgD+kz6ozKfGivDesTQ5BO1sgFftzTcz+UGimeq7sigh8oMUi0FTEFIcOI910L8jw3sjxR5y92QKQXwSZz3uJEgoms2zXpbHbVudzj211eAhejI1nyIGzyJI9mt0NjO3NO8fULFKSLAet0GsmwoQ2fsHdoUFx1I0CkvPWdQDCwAs/AoGBAIHYiMUMZvYRy7o/+tV3rHDOkM4B2PGD2aced1/mokL8AcFhow5ae/uSw5qDbPZcDz2fyGmcnr/15FlASEKtBBqVZIr4Jd5sZTKwfJ2aTekbZBCpF/T5kPb0AQhSZJsU8laqHxEChwhkZSsCKJr7r9mOlDJpCL2p4fHxTX+5CtOg';
//
//        $PAYU_BASE_URL = "https://test.payu.in";
//
////        $PAYU_BASE_URL = "https://secure.payu.in"; // PRODUCATION
//        $name = $request->name;
//        $successURL = route('pay.u.response');
//        $failURL = route('pay.u.cancel');
//        $email = $request->email;
//        $amount = $totalAmount;
//
//        $action = '';
////        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
//        $txnid = hash('sha256', $payment->transaction_id);
//
//        $posted = array();
//        $posted = array(
//            'key' => $MERCHANT_KEY,
//            'txnid' => $txnid,
//            'amount' => $amount,
//            'productinfo' => 'Krinisko',
//            'firstname' => $name,
//            'email' => $email,
//            'surl' => $successURL,
//            'furl' => $failURL,
//            'service_provider' => 'payu_paisa',
//        );
//
//        if(empty($posted['txnid'])) {
//            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
//        }
//        else{
//            $txnid = $posted['txnid'];
//        }
//
//        $hash = '';
//        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
//
//        if(empty($posted['hash']) && sizeof($posted) > 0) {
//            $hashVarsSeq = explode('|', $hashSequence);
//            $hash_string = '';
//            foreach($hashVarsSeq as $hash_var) {
//                $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
//                $hash_string .= '|';
//            }
//            $hash_string .= $SALT;
//
//            $hash = strtolower(hash('sha512', $hash_string));
//            $action = $PAYU_BASE_URL . '/_payment';
//        }
//        elseif(!empty($posted['hash']))
//        {
//            $hash = $posted['hash'];
//            $action = $PAYU_BASE_URL . '/_payment';
//        }
//        return view('pay-u',compact('action','hash','MERCHANT_KEY','txnid','successURL','failURL','name','email','amount'));
//
//    }



    public function payUMoneyView(Request $request, RoomType $roomType)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email',
            'phone'          => 'required|string',
            'address'        => 'nullable|string',
            'check_in_date'  => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'adults'         => 'required|integer|min:1',
            'children'       => 'nullable|integer|min:0',
            'service_ids'    => 'array',
            'service_ids.*'  => 'integer|exists:additional_services,id',
            'quantities'     => 'array',
            'rooms'          => 'required|integer|min:1',
            'extra_person'   => 'nullable|integer',
            'gst_required'   => 'nullable|in:on',
            'gst_number'     => 'nullable|required_if:gst_required,on|string|max:15',
            'company_name'   => 'nullable|required_if:gst_required,on|string|max:255',
            'child_ages'     => 'nullable|array',
            'child_ages.*'   => 'required_if:children,1,2,3|integer|min:0|max:17',
        ]);

        // ---- user handling (as you had) ----
        if (!auth()->check()) {
            $tempPassword = Str::random(8);
            $user = User::firstOrCreate(
                ['email' => $request->email],
                [
                    'name'     => $request->name,
                    'phone'    => $request->phone,
                    'address'  => $request->address ?? null,
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

        $availabilities = $roomType->selectedDateAvailabilities($request->check_in_date, $request->check_out_date);

        if (
            $availabilities->count() != $request->days ||
            $availabilities->contains(fn ($a) => $a->rooms < $request->rooms)
        ) {
            return back()->with('error', 'No available rooms of this type on selected date.');
        }

        $roomTotal = $roomType
            ->selectedDateAvailabilities($request->check_in_date, $request->check_out_date)
            ->sum('price');
        $roomTotal = $roomTotal * ($request->rooms ?? 1);

        $serviceCharge = 0;
        if ($request->has('service_ids')) {
            foreach ($request->service_ids as $serviceId) {
                $qty = $request->quantities[$serviceId] ?? 1;
                if ($service = AdditionalService::find($serviceId)) {
                    $serviceCharge += ($service->price * $qty);
                }
            }
        }
        $serviceCharge = $serviceCharge * $request->days;

        $extraChildCharge = 0;
        if ($request->child_ages) {
            foreach ($request->child_ages as $age) {
                if ($age > 6) {
                    $extraChildCharge += 500 * $request->days;
                }
            }
        }

        $extraAdults = max(0, $request->adults - 2);
        $extraPersonAmount = $extraAdults * 1500 * $request->days;

        $gst = ($roomTotal >= 7500) ? 0.18 : 0.05;

        $subTotal    = $roomTotal + $serviceCharge + $extraPersonAmount + $extraChildCharge;
        $tax         = round($subTotal * $gst, 2);
        $totalAmount = round($subTotal + $tax, 2);

        $booking = Booking::create([
            'booking_id'                 => 'KRI' . now()->format('His') . rand(1000, 9999),
            'name'                       => $request->name,
            'email'                      => $request->email,
            'phone'                      => $request->phone,
            'user_id'                    => auth()->id(),
            'room_type_id'               => $roomType->id,
            'check_in_date'              => $request->check_in_date,
            'check_out_date'             => $request->check_out_date,
            'staying_days'               => $request->days,
            'amount'                     => $roomTotal,
            'additional_service_charge'  => $serviceCharge,
            'tax_and_fee'                => $tax,
            'total_amount'               => $totalAmount,
            'adults'                     => $request->adults,
            'children'                   => $request->children,
            'status'                     => 'pending',
            'rooms'                      => $request->rooms,
            'extra_person'               => $extraPersonAmount,
            'gst_number'                 => $request->gst_number,
            'company_name'               => $request->company_name,
            'child_ages'                 => $request->child_ages,
            'extra_child_charge'         => $extraChildCharge,
        ]);

        if ($request->has('service_ids')) {
            foreach ($request->service_ids as $serviceId) {
                $qty = $request->quantities[$serviceId] ?? 1;
                $booking->services()->create([
                    'additional_service_id' => $serviceId,
                    'quantity'              => $qty,
                ]);
            }
        }

        foreach ($roomType->selectedDateAvailabilities($request->check_in_date, $request->check_out_date) as $availability) {
            $booking->availabilities()->create([
                'availability_rate_id' => $availability->id,
                'price'                => $availability->price,
            ]);
        }
        $transactionId = 'TXN' . now()->format('mdHis') . rand(000000, 999999);
        $transactionId = substr(hash('sha256', $transactionId), 0, 20);

        $payment = Payment::create([
            'booking_id'     => $booking->id,
            'payment_method' => 'online',
            'amount'         => $totalAmount,
            'transaction_id' => $transactionId,   // keep a clean internal id
            'status'         => 'pending',
        ]);

        // ← यहां तुम्हारे calculation से निकला हुआ totalAmount आएगा

        // ==================== PayU config ====================

//        $MERCHANT_KEY  = "xqFUnS";
//        $SALT          = "okmVfGZXaaDHKWulMKjXSygDU3py5drJ";

//        dd(env('PAYUMONEY_MERCHANT_KEY'));
        $MERCHANT_KEY  = env('PAYUMONEY_MERCHANT_KEY');
        $SALT          = env('PAYUMONEY_MERCHANT_SALT'); // ← यह असली वाला SALT डालो
//        $PAYU_BASE_URL = "https://test.payu.in"; // production में secure.payu.in
        $PAYU_BASE_URL = "https://secure.payu.in"; // production में secure.payu.in

        // Required fields
        $amount      = number_format((float)$totalAmount, 2, '.', ''); // "12980.00"
//        $txnid       = substr(hash('sha256', microtime() . rand()), 0, 20);
        $txnid       = $transactionId;
        $productinfo = "Webappfix"; // ← वही string डालो जो PayU expects
        $name   = $request->name;   // e.g., "Admin User"
        $email       = $request->email;  // e.g., "super@admin.com"
        $phone       = $request->phone;

        $successURL = route('pay.u.response');
        $failURL = route('pay.u.cancel');

        // Payload
        $posted = [
            "key"         => $MERCHANT_KEY,
            "txnid"       => $txnid,
            "amount"      => $amount,
            "productinfo" => $productinfo,
            "firstname"   => $name,
            "email"       => $email,
            "phone"       => $phone,
            "surl"        => $successURL,
            "furl"        => $failURL,
            "service_provider" => "payu_paisa",
            "udf1" => "", "udf2" => "", "udf3" => "", "udf4" => "", "udf5" => "",
            "udf6" => "", "udf7" => "", "udf8" => "", "udf9" => "", "udf10" => "",
        ];

        // Hash calculation
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';
        foreach ($hashVarsSeq as $hv) {
            $hash_string .= isset($posted[$hv]) ? $posted[$hv] : '';
            $hash_string .= '|';
        }
        $hash_string .= $SALT;
        $hash = strtolower(hash('sha512', $hash_string));

        $action = $PAYU_BASE_URL . "/_payment";

        return view("pay-u", compact(
            "action","hash","MERCHANT_KEY","txnid","amount",
            "name","email","phone","successURL","failURL","productinfo"
        ));
    }








//    public function payUResponse(Request $request)
//    {
//        return response('success');
//    }



//    public function payUResponse(Request $request)
//    {
//        $posted = $request->all();
//
//        $key   = env('PAYUMONEY_MERCHANT_KEY');
//        $salt  = env('PAYUMONEY_MERCHANT_SALT');
//
//        $status       = $posted['status']       ?? null;   // success/failed
//        $txnid        = $posted['txnid']        ?? null;   // our payu_txnid
//        $amount       = $posted['amount']       ?? null;
//        $productinfo  = $posted['productinfo']  ?? null;
//        $firstname    = $posted['firstname']    ?? null;
//        $email        = $posted['email']        ?? null;
//        $receivedHash = $posted['hash']         ?? null;
//        $additional   = $posted['additionalCharges'] ?? null;
//        $mihpayid     = $posted['mihpayid']     ?? null;   // PayU payment id
//
//        // 1) Recompute hash (reverse sequence)
//        $hashSeqTail = implode('|', [
//            $email,
//            $firstname,
//            $productinfo,
//            $amount,
//            $txnid,
//            $key
//        ]);
//
//        $udfs = [];
//        for ($i=1; $i<=10; $i++) {
//            $udfs[] = $posted['udf'.$i] ?? '';
//        }
//        // order: udf10 ... udf1 (reverse)
//        $udfsReversed = array_reverse($udfs); // udf10 down to udf1
//
//        $base = $salt.'|'.$status.'|'.implode('|', $udfsReversed).'|'.$hashSeqTail;
//
//        if (!empty($additional)) {
//            $base = $additional.'|'.$base;  // prepend
//        }
//
//        $computedHash = strtolower(hash('sha512', $base));
//
//        if (!$receivedHash || $computedHash !== strtolower($receivedHash)) {
//            // Hash mismatch → do NOT confirm
//            // Optional: log raw payload for investigation
//            if (isset($txnid)) {
//                Payment::where('transaction_id', $txnid)->update([
//                    'status'      => 'failed',
//                    'raw_request' => json_encode($posted),
//                ]);
//            }
//            return redirect()->route('booking.failed')->with('error', 'Payment verification failed.');
//        }
//
//        // 2) Idempotent DB update
//        // Find our payment by payu_txnid
//        $payment = Payment::where('transaction_id', $txnid)->first();
//
//        if (!$payment) {
//            // Fallback: try by amount + mihpayid (rare)
//            return redirect()->route('booking.failed')->with('error', 'Payment reference not found.');
//        }
//
//        if ($payment->status === 'paid') {
//            // Already processed
//            return redirect()->route('booking.success', $payment->booking_id)->with('success', 'Payment already confirmed.');
//        }
//
//        // 3) Only accept success
//        if ($status !== 'success') {
//            $payment->update([
//                'status'      => 'failed',
//                'payu_mihpayid' => $mihpayid,
//                'raw_request' => json_encode($posted),
//            ]);
////            return redirect()->route('booking.failed')->with('error', 'Payment failed.');
//            return redirect()->route('user.dashboard')->with('error', 'Invalid response from payment gateway.');
//
//        }
//
//        DB::transaction(function () use ($payment, $posted, $mihpayid) {
//            // (a) Mark payment paid
//            $payment->update([
//                'status'        => 'paid',
//                'payu_mihpayid' => $mihpayid,
//                'raw_request'   => json_encode($posted),
//            ]);
//
//            // (b) Confirm booking
//            $booking = $payment->booking()->lockForUpdate()->first(); // lock to avoid race
//            if ($booking && $booking->status !== 'confirmed') {
//                $booking->update(['status' => 'confirmed']);
//            }
//
//            // (c) Optional: decrement inventory (rooms) on each availability date
//            //   Only if aap availability table me "rooms" count manage karte ho.
//            //   Aapne create time pe pivot save kiya tha; ab actual stock ghata do:
//            foreach ($booking->availabilities as $pivot) {
//                $rate = $pivot->availabilityRate()->lockForUpdate()->first();
//                if ($rate) {
//                    // reduce by number of rooms booked (per day)
//                    $new = max(0, ($rate->rooms - $booking->rooms));
//                    $rate->update(['rooms' => $new]);
//                }
//            }
//        });
//
//        // (d) Send confirmations (mail/SMS/WhatsApp) – optional
//        // Mail::to($payment->booking->email)->send(new BookingConfirmedMail($payment->booking));
//
////        return redirect()->route('booking.success', $payment->booking_id)->with('success', 'Payment successful & booking confirmed.');
//        return redirect()->route('user.dashboard')->with(
//            $statusCode === 'success' ? 'success' : 'error',
//            $statusCode === 'success' ? 'Payment successful' : 'Payment failed: ' . $statusMessage
//        );
//    }





    public function payUResponse(Request $request)
    {
        // 0) Capture all & log once
        $posted = $request->all();
        Log::info('PayU Redirect Response', $posted);

        // 1) Basic pulls
        $key        = config('services.payu.key', env('PAYUMONEY_MERCHANT_KEY'));
        $salt       = config('services.payu.salt', env('PAYUMONEY_MERCHANT_SALT'));

        $status       = $posted['status']        ?? null;   // 'success' | 'failure' etc.
        $txnid        = $posted['txnid']         ?? null;   // your txn reference
        $amount       = $posted['amount']        ?? null;
        $productinfo  = $posted['productinfo']   ?? null;
        $firstname    = $posted['firstname']     ?? null;
        $email        = $posted['email']         ?? null;
        $receivedHash = $posted['hash']          ?? null;
        $mihpayid     = $posted['mihpayid']      ?? null;   // PayU payment id
        $additional   = $posted['additionalCharges'] ?? null;

        // Safety: minimal fields present?
        foreach (['status','txnid','amount','productinfo','firstname','email','hash'] as $f) {
            if (!isset($posted[$f])) {
                Log::warning('PayU missing field', ['missing' => $f, 'txnid' => $txnid]);
                return redirect()->route('user.dashboard')->with('error', 'Invalid response from payment gateway.');
            }
        }

        // 2) Recompute reverse hash (supports udf1..udf10 + additionalCharges)
        $udfs = [];
        for ($i = 1; $i <= 10; $i++) {
            $udfs[] = $posted['udf'.$i] ?? '';
        }
        $udfsReversed = array_reverse($udfs); // udf10 ... udf1

        // tail = email|firstname|productinfo|amount|txnid|key
        $hashSeqTail = implode('|', [
            $email,
            $firstname,
            $productinfo,
            $amount,
            $txnid,
            $key,
        ]);

        // base = salt|status|udf10...udf1|tail
        $base = $salt.'|'.$status.'|'.implode('|', $udfsReversed).'|'.$hashSeqTail;

        // If additionalCharges present, prepend it
        if (!empty($additional)) {
            $base = $additional.'|'.$base;
        }

        $computedHash = strtolower(hash('sha512', $base));
        if (!$receivedHash || $computedHash !== strtolower($receivedHash)) {
            Log::warning('PayU hash mismatch', [
                'txnid' => $txnid,
                'mihpayid' => $mihpayid,
                'computed' => $computedHash,
                'received' => $receivedHash,
            ]);

            if ($txnid) {
                \App\Models\Payment::where('transaction_id', $txnid)->update([
                    'status'      => 'failed',
                    'raw_request' => json_encode($posted),
                ]);
            }
            return redirect()->route('user.dashboard')->with('error', 'Payment verification failed.');
        }

        // 3) Find payment
        /** @var \App\Models\Payment|null $payment */
        $payment = \App\Models\Payment::where('transaction_id', $txnid)->first();
        $user = $payment->booking->user;
        Auth::login($user);

        if (!$payment) {
            // Rare fallback: try mihpayid if you store it earlier (optional)
            Log::warning('PayU payment not found', ['txnid' => $txnid, 'mihpayid' => $mihpayid]);
            return redirect()->route('user.dashboard')->with('error', 'Payment reference not found.');
        }

        // Idempotent: if already paid—just show success
        if ($payment->status === 'paid') {

            return redirect()
                ->route('user.dashboard', $payment->booking_id)
                ->with('success', 'Payment already confirmed.');
        }

        // 4) Reject non-success
        if (strtolower($status) !== 'success') {
            $payment->update([
                'status'         => 'failed',
                'payu_mihpayid'  => $mihpayid,
                'raw_request'    => json_encode($posted),
            ]);

            if ($payment->booking) {
                $payment->booking->update(['status' => 'failed']);
            }

            return redirect()->route('user.dashboard')->with('error', 'Payment failed.');
        }

        // 5) Optional: Amount sanity check (recommended)
        // Compare numeric values (2-decimal compare if you store as decimal(10,2))
        if ((float)$payment->amount != (float)$amount) {
            Log::warning('PayU amount mismatch', [
                'txnid' => $txnid,
                'expected' => $payment->amount,
                'received' => $amount,
            ]);

            // You can decide to fail or just log. Here we fail to be safe.
            return redirect()->route('user.dashboard')->with('error', 'Payment amount mismatch.');
        }

        // 6) Atomic status update + inventory ops
        DB::transaction(function () use ($payment, $posted, $mihpayid) {
            // (a) Mark payment paid
            $payment->update([
                'status'         => 'paid',
                'payu_mihpayid'  => $mihpayid,
                'raw_request'    => json_encode($posted),
                'paid_at'        => now(),
            ]);

            // (b) Confirm booking (with lock)
            $booking = $payment->booking()->lockForUpdate()->first();
            if ($booking && $booking->status !== 'confirmed') {
                $booking->update(['status' => 'confirmed']);
            }

            // (c) Decrement availability safely (your existing logic)
            if ($booking) {
                foreach ($booking->availabilities as $pivot) {
                    $rate = $pivot->availabilityRate()->lockForUpdate()->first();
                    if ($rate) {
                        $newRooms = max(0, ($rate->rooms - $booking->rooms));
                        $rate->update(['rooms' => $newRooms]);
                    }
                }
            }
        });

        // 7) Notifications (optional)
        try {
            if ($payment->booking && $payment->booking->email) {
//                 Mail::to($payment->booking->email)->send(new BookingConfirmedMail($payment->booking));
                Mail::to($payment->booking->email)->send(new BookingMail($payment->booking, 'user'));

                // Send mail to admin
                Mail::to('info@krinoscco.com')->send(new BookingMail($payment->booking, 'admin'));

                Mail::to('accounts@krinoscco.com')->send(new BookingMail($payment->booking, 'admin'));
            }
        } catch (\Throwable $e) {
            Log::error('Mail send failed after PayU success', ['e' => $e->getMessage()]);
        }


        // 8) Redirect to success
        return redirect()
            ->route('user.dashboard', $payment->booking_id)
            ->with('success', 'Payment successful & booking confirmed.');
    }








    public function payUCancel(Request $request)
    {
        $posted = $request->all();
        $txnid  = $posted['txnid'] ?? null;

        if ($txnid) {
            Payment::where('transaction_id', $txnid)->update([
                'status'      => 'failed',
                'raw_request' => json_encode($posted),
            ]);
            $payment = Payment::where('transaction_id', $txnid)->first();
            $user = $payment->booking->user;
            Auth::login($user);
        }

        return redirect()->route('user.dashboard')->with('error', 'Payment cancelled/failed.');
    }




//    public function payUCancel(Request $request)
//    {
//        dd('Payment Failed');
//    }
}
