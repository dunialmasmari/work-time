<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cv_recommendation extends Model
{
  //  protected $table = "usernotifies";
    
    public $timestamps = false;
    protected $filtable=[
        'cv_recommendation_id',
        'userdetails_id',
        'name',
        'email',
        'phone',
        'description',
        'active', 
    ];
    public function userdetail()
    {
        return $this->belongsTo('App\Models\userdetail');
    }
}