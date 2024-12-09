<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthApiController extends Controller
{
    //buat function register
    public function Register(Request $request){
        $MyData = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ];
        try{
            $user = User::create( $MyData );
        }catch(\Exception $error){
            return response(['error'=>$error->getMessage()],500);
            //200 status ok
            //201 status created
            //500 internal server error
        }
        // ini generate token
        $token = $user->createToken('MyApp')->accessToken;
        return response()->json(['user'=>$user,'accessToken'=>$token] ,201);
    }
    public function Login(Request $request){
        $loginData = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        if(!auth()->attempt($loginData)){
            return response()->json(['error'=> 'your credential is not valid'],401);
        }
        $user = auth()->user();
        $token = $user->createToken('MyApp')->accessToken;

        return response()->json(['user'=>$user,'accessToken'=>$token] ,200);

    }

    public function Logout(Request $request){
    try {
        // Revoke the token that was used to authenticate the current request
        $request->user()->token()->revoke();

        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out'
        ], 200);
    } catch (\Exception $error) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to logout',
            'error' => $error->getMessage()
        ], 500);
    }
}
}
