<?php

namespace App\Http\Controllers;
use App\CarDetails;
use App\Brands;    
use App\Users;   
use App\CarModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use App\Mail\ChangeStatusMail;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function approveRequest(){
        $car_details = DB::select('select cd.* , u.fname, u.lname from car_details cd  , user_master u where status = 0 and cd.user_id = u.user_id');
        return view('admin.listCarRequest')->with('car_details',$car_details);
        

    }
    public function viewUserCarsDetails($car_details_id){
        //return $car_details_id;
        // $data = CarDetails::all()->where('car_details_id',$car_details_id);
        $data = DB::select(DB::raw('SELECT cd.* ,ownership cd, b.brand_name , m.model_name 
        from car_details cd , brand_master b , model_master m 
        where cd.brand_id = b.id and cd.model_id = m.id and cd.car_details_id = :car_details_id'),array('car_details_id' => $car_details_id));
        // return $data;
        return view('admin.approveUserCarDetails')->with('data',$data);
    }
    public function changeStatus_car(Request $req){
        
        // return $userEmail;
        // return $userEmail;
        $price = $req->input('price');
        $carDetails = CarDetails::where('car_details_id',$req->car_details_id)->get(['img','user_id']);
        $img = $carDetails[0]->img;
        $user_id = $carDetails[0]->user_id;
        $userEmail = Users::where('user_id',$user_id)->pluck('email');
        
        if($req->approve == 1) {
            $isUpdated  = CarDetails::where('car_details_id',$req->car_details_id)
            ->update(['status'=>1,'car_price'=>$price]);
            if($isUpdated) {
                        $data = [
                            'text' => 'Your car has been approved by the admin.',
                        ];
                        Mail::to($userEmail[0])->send(new ChangeStatusMail($data));
                        return redirect()->route('approveRequest')->with('message','The status was changed successfully');
                    } 
            } else {
                    $basePath = 'uploads/cars/'.$img;
                    // return $basePath; 
                    $isDeleted = CarDetails:: where('car_details_id',$req->car_details_id)->delete();
                    $isFileDeleted = File::delete($basePath);
                    if($isDeleted && $isFileDeleted){
                        $data = [
                            'text' => 'Your car has not been approved by the admin.',
                        ];
                        Mail::to($userEmail[0])->send(new ChangeStatusMail($data));
                        return redirect()->route('approveRequest')->with('message','The car was disapproved.');
                    }
        }
    }
    public function addCarBrands(request $req){
        $brands = $req->input('brand');
        $newBrand = Brands::create(['brand_name' => $brands])->save();
        if ($newBrand) {
            return redirect()->route('admin.addBrands')->with("brandUploaded","Your Brand has been updated");
        }
        return $newBrand;
        
    }
    public function addBrands(){

        return view('admin.addBrands');
        
        
    }
    public function addModels(){
        $brands = Brands::all();
            return view('admin.addModels',compact('brands'));
    }
    public function addCarModels(Request $req){
        $brands = $req->input('brand');
        $model = $req->input('model');
        $newModel = CarModels::create(['brand_id'=> $brands,'model_name'=>$model]);
        if($newModel) {
            return redirect()->route('admin.addModels')->with("ModelsAdded","Your Model has been added");
        }
    }
   
}