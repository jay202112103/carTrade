<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\State;
use App\City;
class RegisterController extends Controller
{
    function index () {
        $states = State::all();
        return view('registration',compact('states'));
    }
    function getCity (Request $request) {
        $city =  City::select('id','city')->where('state_id',$request->state)->get();
        $output = "<option value=''>Please select an option </option>";
        foreach ($city as $c) {
            $output .= '<option value="'.$c->id.'">'.$c->city.'</option>';
        }
        return $output;
    }
    function save(Request $req)
    {
        $fname = $req->input('fname');
        $lname = $req->input('lname');
        $email = $req->input('email');
        $contact = $req->input('contact');
        $state_id = $req->input('state_id');
        $city = $req->input('city_id');
        $password = md5($req->input('password'));
        $newUser = Users::create([
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'contact' => $contact,
                'state_id' => $state_id,
                'city_id' => $city,
                'password' => $password
        ]);
        if($newUser)
        {
            return redirect('/login')->with('successfully-registered','You are registered successfully.');
        }
    }
    public function changeProfile()
    {
      //  return view('users.home.userUpdateProfile');
    
            $states = State::all();
            $user_id = session()->get('user_id');
            $user = Users::where('user_id',$user_id)->first();
            return view('users.home.userUpdateProfile',compact('states','user'));
    }
    function userUpdateGetCity (Request $request) {
        $city =  City::select('id','city')->where('state_id',$request->state)->get();
        $output = "<option value=''>Please select an option </option>";
        foreach ($city as $c) {
            $output .= '<option value="'.$c->id.'">'.$c->city.'</option>';
        }
        return $output;
    }

    
    public function updateProfile(Request $req)
    {
        $user_id = $req->session()->get('user_id');
        $fname = $req->input('fname');
        $lname = $req->input('lname');
        $email = $req->input('email');
        $contact = $req->input('contact');
        $state_id = $req->input('state_id');
        $city = $req->input('city_id');
        $is_updated = Users::where("user_id",$user_id)->update([
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'contact' => $contact,
                'state_id' => $state_id,
                'city_id' => $city
        ]);
        if ($is_updated == 1) {
            return redirect()->route('changeProfile')->with("profileUpdated","Profile Updated successfully");
        }
        return $is_updated;
    }  
}
