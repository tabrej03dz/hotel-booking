<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingAvailability extends Model
{
    protected $guarded = ['id'];

    public function availabilityRate(){
        return $this->belongsTo(AvailabilityRate::class, 'availability_rate_id');
    }
}
