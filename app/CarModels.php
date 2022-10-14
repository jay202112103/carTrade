<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModels extends Model
{
    protected $table = 'model_master';
    protected $fillable = ['brand_id','model_name'];
    public $timestamps = false;
}
