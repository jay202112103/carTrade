<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Brands;
use App\CarDetails;
use App\CarModels;
use DB;
class HomePageController extends Controller
{
    public function viewCars(){

        $user_id = session()->get('user_id');
        $cars = DB::select(DB::raw('SELECT cd.* ,ownership cd, b.brand_name , cd.car_price , m.model_name 
        from car_details cd , brand_master b , model_master m 
        where cd.brand_id = b.id and cd.status = 1 and cd.model_id = m.id'));
        return view('users.home.home',compact('cars'));

    }
    public function viewCarsDetails($car_details_id){
        // return $car_details_id;
        // $data = CarDetails::all()->where('car_details_id',$car_details_id);
        $data = DB::select(DB::raw('SELECT cd.* ,ownership cd, b.brand_name , cd.car_price , m.model_name 
        from car_details cd , brand_master b , model_master m 
        where cd.brand_id = b.id and cd.model_id = m.id and cd.car_details_id = :car_details_id'),array('car_details_id' => $car_details_id));
        // return $data;
        return view('users.home.viewCarDetails',compact('data','car_details_id'));   
    }
    
}
