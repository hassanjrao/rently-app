<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    protected $appends=['booking_id'];

    public function getBookingIdAttribute(){
        return 'BK-'.str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    public function car()
    {
        return $this->belongsTo(Car::class)->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function pickupLocation()
    {
        return $this->belongsTo(Location::class, 'pickup_location_id')->withDefault();
    }

    public function destinationLocation()
    {
        return $this->belongsTo(Location::class, 'destination_location_id')->withDefault();
    }
}
