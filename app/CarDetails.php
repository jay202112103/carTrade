<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarDetails extends Model
{
    protected $fillable = ['car_details_id','user_id','brand_id','model_id','year','color','reg_no','ownership','img','kms_driven', 'car_price' ,'capacity'];
    public $timestamps = false;
    public $table = 'car_details';
}
