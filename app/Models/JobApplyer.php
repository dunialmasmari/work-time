<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class JobApplyer extends Model
{
    protected $table = "JobApplyers";
    protected $fillable = [
        'job_id',
        'user_name',
        'user_email',
        'recom_file',
        'cv_file',
    ];

}
