<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Futsal extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function futsal_images()
    {
        return $this->hasMany(Futsal_images::class);
    }
    public function timeSlots()
    {
        return $this->hasMany(TimeSlots::class);
    }
}
