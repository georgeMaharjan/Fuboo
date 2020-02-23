<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingSlots extends Model
{
    public function timeSlots()
    {
        return $this->belongsTo(TimeSlots::class);
    }

    public function futsal()
    {
        return $this->belongsTo(Futsal::class);
    }
}
