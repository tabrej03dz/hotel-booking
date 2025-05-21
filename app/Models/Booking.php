<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function availabilityRate(){
        return $this->belongsTo(AvailabilityRate::class, 'availability_rate_id');
    }

    public function services(){
        return $this->hasMany(BookingService::class, 'booking_id');
    }

    public function availabilities(){
        return $this->hasMany(BookingAvailability::class, 'booking_id');
    }

    public function roomType(){
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
