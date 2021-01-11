<?php

namespace App\Http\Controllers\login;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
 
        if (auth()->attempt($data)) {
            //$token = auth()->user()->createToken('LaravelAuthApp')->accessToken; 
            return response()->json(['message' => 'login sucessfuly', 'data' => $data], 200);
        } else {
            return response()->json(['message' => 'Unauthorised'], 401);
        }
    } 

    public function checklogin(){
        if (Auth::check()) {
            return response()->json(['message' => 'The user is logged in'], 200);
            // The user is logged in...
         }
        else{
            return response()->json(['message' => 'The user is not logged in'], 401);
        }
    }
}
