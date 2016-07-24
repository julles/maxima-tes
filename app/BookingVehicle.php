<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Vehicle;

class BookingVehicle extends Model
{
    public $guarded = ['vehicle_no'];

    public function user()
    {
    	return $this->belongsTo(User::class,'user_id');
    }

    public function vehicle()
    {
    	return $this->belongsTo(Vehicle::class,'vehicle_id');
    }
}
