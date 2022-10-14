<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = ['fname','lname','email','contact','password','city_id','state_id'];
    public $timestamps = false;
    public $table = 'user_master';
}
