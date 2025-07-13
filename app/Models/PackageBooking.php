<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageBooking extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'preferred_date' => 'date',
    ];
}
