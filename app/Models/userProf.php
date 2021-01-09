<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userProf extends Model
{
    protected $table = "userprofs";

    //public $timestamps = false;
    protected $filtable=[
        'userProfs_id',
        'userProfs_email',
    ];
    
}
