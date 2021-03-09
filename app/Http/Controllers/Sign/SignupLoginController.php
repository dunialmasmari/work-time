<?php

namespace App\Http\Controllers\Sign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignupLoginController extends Controller
{
    public function loginShow()
    {
        if(Auth::check())
        {
            return redirect()->route('homehr');   
        }
        else
        {
            return view('HR.login');
        }
    } 
    public function signupShow()
    {
        return view('HR.signup');
    }
    public function companysignup()
    {
        return view('HR.companysignup');
    }
}
