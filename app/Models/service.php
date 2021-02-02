<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $table = "services";

    protected $fillable = [
        'service_id',
        'user_id',
        'title',
        'image',
        'description',
        'active',
        'created_at',
        'updated_at',
    ];
}
