<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }
}
