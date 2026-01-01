<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',      // city, area, campus_block
        'latitude',  
        'longitude',
    ];

    public function ridesFrom()
    {
        return $this->hasMany(Ride::class, 'from_location_id');
    }

    public function ridesTo()
    {
        return $this->hasMany(Ride::class, 'to_location_id');
    }
}
