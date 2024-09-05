<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    protected $appends=['booking_id','license_front_image_url','license_back_image_url','proof_of_income_url','proof_of_income_url','number_of_rent_days'];

    public function getLicenseFrontImageUrlAttribute(){
        return $this->driver_license_front_image? Storage::url($this->driver_license_front_image):null;
    }

    public function getLicenseBackImageUrlAttribute(){
        return $this->driver_license_back_image? Storage::url($this->driver_license_back_image):null;
    }

    public function getProofOfIncomeUrlAttribute(){
        return $this->proof_of_income? Storage::url($this->proof_of_income):null;
    }

    public function getNumberOfRentDaysAttribute(){
        if(!$this->pickup_date_time || !$this->return_date_time){
            return 0;
        }

        // convert to carbon instance
        $this->pickup_date_time = now()->parse($this->pickup_date_time);
        $this->return_date_time = now()->parse($this->return_date_time);

        return $this->pickup_date_time->diffInDays($this->return_date_time);

    }

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
