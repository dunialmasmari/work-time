<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userdetail extends Model
{
  //  protected $table = "usernotifies";
    
    public $timestamps = false;
    protected $filtable=[
           'id',
           'user_id',
           'pic',
           'fullname',
           'gender',
           'email',
           'phone',
           'country',
           'city',
           'userWebsite',
           'aboutUser',
           'status',
           'active',   
    ];
    public function users()
    {
        return $this->hasOne('App\User');
    }
    public function cv_details()
    {
        return $this->hasMany('App\Models\cv_detail');
    }
    public function cv_recommendations()
    {
        return $this->hasMany('App\Models\cv_recommendation');
    }
    public function cv_skills()
    {
        return $this->hasMany('App\Models\cv_skill');
    }
    public function resume_reports()
    {
        return $this->hasMany('App\Models\resume_report');
    }
    
}