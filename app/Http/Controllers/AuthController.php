<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm(){
        return view("auth.register");
    }

    public function Register(Request $request){
        //try ->kunci melakukan percobaan
        //catch -> alternate jika try tidak berhasil seperti else if
        try{
            // dd($request);
            $request->validate([
                'name'=>'required|string|max:255',
                'email'=> 'required|string|max:255|unique:users',
                'password'=>'required|string|min:8'
            ]);
            user::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);
            return redirect()->route('welcome')->with('success','register successful');
        }catch(\Exception $error){
            //dd dump and die tidak lanjut code selanjutnya (sejenis break)
            //dumper dump lanjut code selanjutnya beda dengan dd
            dump($error->getMessage());
            // return back() ->with('error', "error occurred please check input");

        }
    }

    public function showLoginForm(){
            return view('auth.login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('login');
    }

    public function login(Request $request){
            try{
                $request->validate([
                'email'=>'required|email',
                'password'=>'required'
                ]);

                if(Auth::attempt(credentials: $request->only('email','password'))){
                    // dd(Auth::user());
                    $request->session()->regenerate();
                    return redirect()->route('welcome')->with('success','login success');
                }else{
                    return redirect()->route('login')->with('success','incorrect credential');
                }
            }catch(\Exception $error){
                dump($error->getMessage());
            }
    }

}
