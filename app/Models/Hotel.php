<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded = ['id'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

   
    public function images(){
        return $this->morphMany(Image::class, 'model');
    }
}
