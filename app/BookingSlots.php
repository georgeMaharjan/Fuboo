<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingSlots extends Model
{
    public function timeSlots()
    {
        return $this->belongsTo(TimeSlots::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
