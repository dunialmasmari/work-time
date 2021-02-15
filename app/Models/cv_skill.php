<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cv_skill extends Model
{
  //  protected $table = "usernotifies";
    
    public $timestamps = false;
    protected $filtable=[  
        'cv_skill_id',
        'userdetails_id',
        'name',
        'value',
        'type',
        'active',
    ];
    public function userdetail()
    {
        return $this->belongsTo('App\Models\userdetail');
    }
}