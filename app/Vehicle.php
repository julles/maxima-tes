<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Vehicle extends Model
{
    public $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class,'user_id');
    }
}
