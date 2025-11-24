<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $guarded = [];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
