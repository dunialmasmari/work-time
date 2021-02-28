<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealTimeNotification extends Model

{
    protected $table = "RealTimenotifications";
    protected $fillable = [
        'id',
        'type',
        'id_type',
        'see_it',
        'create_time',
    ];
}
