<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $table = "advertisement";

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
