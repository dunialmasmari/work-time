<?php

namespace App\Http\Controllers\Sign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignupLoginController extends Controller
{
    public function loginShow()
    {
        return view('HR.login');
    } 
    public function signupShow()
    {
        return view('HR.signup');
    }
}
