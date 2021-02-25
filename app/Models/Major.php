<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = "majors";

    protected $fillable = [
        'major_id',
        'user_id',
        'major_name',
        'type',
        'active',
        'created_at',
        'updated_at',
    ];

    public function tenders(){
        return $this-> hasMany('App\Models\tender','major_id', 'major_id');
    }
}
						