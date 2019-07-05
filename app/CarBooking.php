<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarBooking extends Model
{
    //
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class, 'booked_user_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
    public function pickup_location()
    {
        return $this->belongsTo(Location::class, 'pickup_location_id');
    }
    public function destination_location()
    {
        return $this->belongsTo(Location::class, 'destination_location_id');
    }

}
