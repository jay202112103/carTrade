<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brands;
use App\CarDetails;
use App\CarModels;
use Illuminate\Support\Facades\File;
use DB;
class CarRegistrationController extends Controller
{
    public function uploadCar(Request $req){
        // return $req->year;
        $car_details_id = mt_rand(111111111,999999999);
        $user_id = $req->session()->get('user_id');
        $brand_id = $req->input('brand_id');
        $model_id = $req->input('model_id');
        $year = $req->input('year');
        $color = $req->input('color');
        $reg_no = $req->input('reg_no');
        $kms_driven = $req->input('kms_driven');
        $ownership = $req->input('ownership');
        $img = $req->input('img');
        $capacity = $req->input('capacity');
        if($req->hasFile('img')) {
            $file = $req->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName = $car_details_id.".".$extension;
            $file->move('uploads/cars/',$fileName);
        }

        $newCar = CarDetails::create([
                'car_details_id' => $car_details_id,
                'user_id'=> $user_id,
                'brand_id' => $brand_id,
                'model_id' => $model_id,
                'year' => $year,
                'color' => $color,
                'reg_no' => $reg_no,
                'ownership' => $ownership,
                'img' => $fileName,
                'kms_driven' => $kms_driven,
                'capacity' => $capacity
        ])->save();
        if ($newCar) {
            return redirect()->route('viewCarForm')->with("UploadedSuccessfully","Your selling request has been sent");
        }
        return $newCar;
    }

    public function viewCarForm()
    {
        $brands = Brands::all();
            return view('viewCarForm',compact('brands'));
    }

    public function carGetModel(Request $request)
    {
        // return 'hello';
    //    return  $request->brand;
        $CarModel=  CarModels::all()->where('brand_id',$request->brand);
        // return $CarModel;
        $output = "<option value=''>Please select an option </option>";
        foreach ($CarModel as $c) {
            $output .= '<option value="'.$c->id.'">'.$c->model_name.'</option>';
        }
        return $output;
    }
    public function viewCar(Request $req){
        $user_id = $req->session()->get('user_id');
        $car = CarDetails::all()->where('user_id',$user_id);
        $car = DB::select(DB::raw('SELECT cd.* , b.brand_name , m.model_name 
        from car_details cd , brand_master b , model_master m 
        where cd.brand_id = b.id and cd.model_id = m.id and cd.user_id = :user_id
         '),array('user_id'=>$user_id));
        // return $car;
        return view('users.seller.viewCar',compact('car'));

    }
    public function searchCar(Request $req){
        $search = $req->input('search');
        $car  =DB::select( "SELECT cd.*,m.model_name,b.brand_name 
        FROM car_details cd JOIN 
        brand_master b on cd.brand_id= b.id 
        JOIN model_master m on cd.model_id=m.id 
        where b.id LIKE %:search%",array('search'=>$search)); 
        return $car;
        //return view('home.search', compact('car'));


        // $food = CarDetails::join('food_ingredient', 'food_ingredient.food_id','=', 'food.id')
        //        ->join('ingredients','ingredient.id','=','food_ingredient.ingredient.id')
        //        ->where('food.title', 'LIKE', '%' . $search . '%')
        //        ->orWhere('ingredient.title', 'LIKE', '%' . $search . '%') //The fix
        //        ->orderBy('food.created_at', 'desc')
        //        ->groupBy('food.id')
        //        ->with('ingredients')
        //        ->paginate(8);
      
        
      
    }
    

        

    

}
