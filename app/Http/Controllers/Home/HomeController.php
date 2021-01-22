<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tender;
use App\Models\Major;
use Illuminate\Support\Collection;
use validator;
use Carbon\Carbon;



class HomeController extends Controller
{
    public function viewHome()
    {
            $tenders=tender::where('active','1')
            ->where('deadline','>=',now())
            ->where('start_date','<=',now())
            ->orderByRaw('start_date DESC')
            ->paginate(4);
            $data=['tenders' => $tenders];

        return view('HR.home',$data);
    }
}
