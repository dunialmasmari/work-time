<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userNotify extends Model
{
    protected $table = "usernotifies";
    
    public $timestamps = false;
    protected $filtable=[
        'user_id',
        'user_email',
        'major_name',
        'location_name',
        'notification_type',
             
    ];
}