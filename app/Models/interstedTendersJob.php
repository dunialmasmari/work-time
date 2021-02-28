<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class interstedTendersJob extends Model
{
    protected $table = "interstedTendersJobs";
    protected $fillable = [
        'id',
        'name',
        'email',
        'type',
        'major_id',
    ];

}
