<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class resume_report extends Model
{
  //  protected $table = "usernotifies";
    
    public $timestamps = false;
    protected $filtable=[  
        'id',
        'userdetails_id',
        'name',
        'date',
        'type',
    ];
    public function userdetail()
    {
        return $this->belongsTo('App\Models\userdetail');
    }
}