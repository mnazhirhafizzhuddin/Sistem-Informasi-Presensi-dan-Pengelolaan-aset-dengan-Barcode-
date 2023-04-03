<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'captcha' => 'required|captcha'
        ]);
    }
    public function proseslogin(Request $request){
        // return response()->json(['captcha'=>captcha_img()]);
            $request->validate([
                'captcha' => 'required|captcha'
            ]);
        if(Auth::guard('karyawan')->attempt(['nik'=> $request->nik,'password'=>$request->password])){
           return redirect()->intended('/dashboard');
        }
        // else if(Auth::guard('admin')->attempt(['nik'=> $request->nik,'password'=>$request->password])){
        //     return Redirect()->intended('/dashboardadmin');
        // }
        else {
            return redirect()->intended('/')->with(['peringatan'=>'Nik / Password Anda Salah']);
        }

    }
    public function reloadCaptcha(){
        return response()->json(['captcha'=>captcha_img('captcha')]);
    }
    public function proseslogout(Request $request){
        if(Auth::guard('karyawan')->check()){
            Auth::guard('karyawan')->logout();
            return redirect('/')->with(['berita'=>'Berhasil Log Out!']);
         }
        //  else if(Auth::guard('user')->check()){
        //     Auth::guard('user')->logout();
        //     return redirect()->intended('/');
        //  }
    }
    public function prosesloginadmin(Request $request){
        $request->validate([
            'captcha' => 'required|captcha'
        ]);
        if(Auth::guard('user')->attempt(['email'=> $request->email,'password'=>$request->password])){
           return redirect('/panel/dashboardadmin');
        }
        // else if(Auth::guard('admin')->attempt(['nik'=> $request->nik,'password'=>$request->password])){
        //     return Redirect()->intended('/dashboardadmin');
        // }
        else {
            return redirect('/panel')->with(['peringatan'=>'Email / Password Anda Salah']);
        }
    }
    public function proseslogoutadmin(Request $request){
          if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            return redirect('/panel');
         }
    }
}
