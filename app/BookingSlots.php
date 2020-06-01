<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingSlots extends Model
{
    protected $table = 'booking_slots';

    protected $fillable = [
        'time_slots_id',
        'customer_id',
        'payment',
        'about',
    ];

    public function timeSlots()
    {
        return $this->belongsTo(TimeSlots::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
