<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingService extends Model
{
    protected $guarded = ['id'];

    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function service(){
        return $this->belongsTo(AdditionalService::class, 'additional_service_id');
    }
}
