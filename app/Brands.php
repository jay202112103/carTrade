<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brand_master';
    protected $fillable = ['brand_name'];
    public $timestamps = false;
}
