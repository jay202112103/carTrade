<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarBooking extends Model
{
    protected $table = 'car_booking';
    protected $fillable = ['user_id','car_id','date','time'];
    public $timestamps = false;
}
