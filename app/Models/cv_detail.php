<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cv_detail extends Model
{
  //  protected $table = "usernotifies";
    
    public $timestamps = false;
    protected $filtable=[
           'userdetail_id',
           'title',
           'subtitle',
           'start_date',
           'end_date',
           'description',
           'type',
           'active',  
    ];

    public function userdetail()
    {
        return $this->belongsTo('App\Models\userdetail');
    }
}