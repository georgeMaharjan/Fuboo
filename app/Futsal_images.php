<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Futsal_images extends Model
{
    public function images()
    {
        return $this->belongsTo(Futsal::class);
    }
}
