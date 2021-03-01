<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{

    public function getAllUser()
    {
        return static::all()->groupBy('ip')->count();
    }
    public function getAllPage()
    {
        return static::all()->count();
    }
    public function getAllUserToday()
    {
        return static::whereDate('created_at', Carbon::today())->get()->groupBy('ip')->count();
    }
    public function getAllPageToday()
    {
        return static::whereDate('created_at', Carbon::today())->get()->count();
    }
}