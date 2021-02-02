<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $table = "Advertisement";

    protected $fillable = [
        'Advertising_id',
        'user_id',
        'title',
        'image',
        'link',
        'active',
        'created_at',
        'updated_at',
    ];
}
