<?php

namespace App\Http\Controllers\aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function viewAbout()
    {
        return view('HR.about');
    }
}
