<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Users;
use Session;
use Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;
class LoginController extends Controller
{
    // "de3465d4a192f11a47b2de14bce9e82c"  db pass
    // de3465d4a192f11a47b2de14bce9e82c req pass
    public function getCurrentPassword(Request $r) {
        $requestPassword = md5($r['curr_pass']);
        // return $requestPassword;
        $user_id = $r->session()->get('user_id');
        $userPassword = Users::where("user_id",$user_id)->pluck('password')->toArray();
        // return $userPassword[0];
        if ($requestPassword != $userPassword[0]) {
            return 0;
        }
        return 1;
    }

    public function logout(Request $request){
            $request->session()->forget('user_id');
            return redirect()->route('login');
    }
    public function updatePassword(Request $req){
        
        $newPassword = $req->newpassword;
        $user_id = $req->session()->get('user_id');
        $is_updated = Users::where("user_id",$user_id)->update(['password' => md5($newPassword)]);
        if ($is_updated) {
            return redirect()->route('Login.changepassword')->with("passwordChanged","Password changed successfully");
        }
        return $is_updated;
        
    }

    public function changepassword()
    {
        return view('users.home.userchangepassword');
    }
    public function checkLogin(Request $req)
    {
        $isValid = false;
        $email = $req['email'];
        $password = md5($req['password']);
        $query = DB::select(DB::raw("select user_id,email,password from user_master"));
        $set = (array) $query;
        foreach($set as $value)
        {
            if($value->email == $email && $value->password == $password)
            {
               // Session::put(email,$email);
                $isValid = true;
                $req->session()->put('user_id',$value->user_id);
                return redirect('/home');
            }
            else if($req['email'] == 'admin@gmail.com' && $req['password'] =='admin123')
            {
                    $req->session()->put('admin',$req['email']);
                    return redirect()->intended('/adhome');
            }
        }
        if($isValid)
        {
            return back()->with('error','Invalid Email and Password');
        }
    }
    public function forgotpassword(Request $req){
            $newPassword = Str::random(8);
            $emailId = $req->person;
            $isUserThere = Users::where('email',$emailId)->exists();
            if($isUserThere == 1)
            {
                $isUpdated = Users::where('email',$emailId)->update(['password'=>md5($newPassword)]);
                $text = 'Your password was updated, the new password is ' . $newPassword; 
                $data = [
                    'text' => $text,
                ];
                if($isUpdated == 1) {
                    $isMailed = Mail::to($emailId)->send(new ForgotPassword($data));
                    return "YES";
                    // return $isMailed;
                }
            } else {
                return 'NO';
            }
            // return $isUpdated;
            // return $data;


    }
}
