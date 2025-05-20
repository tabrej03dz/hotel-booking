<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvailabilityRate extends Model
{
    protected $guarded = ['id'];

    public function roomType(){
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
