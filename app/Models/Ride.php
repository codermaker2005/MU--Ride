<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    protected $fillable = [
        'user_id',
        'from',
        'to_block',
        'time',
        'seats',
        'status',
    ];

    protected $casts = [
        'time' => 'datetime',
    ];

    // ✅ DRIVER = USER WHO CREATED THE RIDE
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requests()
    {
        return $this->hasMany(RideRequest::class);
    }
}
