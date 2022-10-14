<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\CarBooking;
use App\CarDetails;

class CarBookingController extends Controller
{
    public function bookCar(Request $req){
        $user_id = $req->session()->get('user_id');
        $date = $req->input('date');
        $time = $req->input('time');
        $car_details_id = $req->input('car_details_id');

        $bookCar = CarBooking::create([
        'user_id'=> $user_id,
        'date' => $date,
        'time' => $time,
        'car_id' => $car_details_id])->save();
        if($bookCar)
        {
            return redirect()->route('users.home.viewBookedCar');
            // return view('users.home.viewBookedCar')->with("BookedSuccessfully","Your booking request has been sent");
            
        }
    }
    public function viewTestCar($id) {
        // $data = CarDetails::where('car_details_id',$id)->get();
        $data = DB::select(DB::raw('SELECT cd.* ,ownership cd, b.brand_name , m.model_name 
        from car_details cd , brand_master b , model_master m 
        where cd.brand_id = b.id and cd.model_id = m.id and cd.car_details_id = :id')
        ,array('id' => $id));

        return view('users.home.viewSingleCarDetails',compact('data'));
    }
    
     public function viewBookedDetails(){

        $user_id = session()->get('user_id');
        
        $data = DB::select(DB::raw('select cb.* ,m.model_name, cd.car_details_id, cb.time, cb.date from 
        car_booking cb, model_master m, car_details cd where cd.model_id = m.id 
        and cd.car_details_id = cb.car_id 
        and cb.user_id = :user_id' ),array('user_id'=>$user_id));
       
        return view('users.home.viewBookedCar',compact('data'));
    }
}
