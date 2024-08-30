<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    protected $appends=['main_image_url'];

    public function getMainImageUrlAttribute()
    {
       return $this->main_image_path ? Storage::url($this->main_image_path) : null;
    }


    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }

    public function seat(){
        return $this->belongsTo(Seat::class)->withDefault();
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class,'vehicle_type_id')->withDefault();
    }

    public function transmission()
    {
        return $this->belongsTo(Transmission::class)->withDefault();
    }

    public function bodyType()
    {
        return $this->belongsTo(BodyType::class)->withDefault();
    }


}
