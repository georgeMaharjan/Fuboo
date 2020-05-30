<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSlots extends Model
{
    public function futsal()
    {
        return $this->belongsTo(Futsal::class);
    }
    public function booking()
    {
        return $this->hasMany(BookingSlots::class);
    }
}
