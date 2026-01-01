<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RideRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'ride_id',
        'user_id',
        'status', // pending / accepted / rejected
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }

    public function rider()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
