<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = "blogs";

    protected $fillable = [
        'blog_id',
        'user_id',
        'title',
        'image',
        'description',
        'active',
        'created_at',
        'updated_at',
    ];
}
