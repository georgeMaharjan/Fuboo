<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSlots extends Model
{
    public function bookingSlots()
    {
        return $this->hasMany(BookingSlots::class);
    }
}
