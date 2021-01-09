<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tender extends Model
{
    //
    
    public $timestamps = false;
    protected $filtable=[
        "tender_id",
        'user_id',
        'major_id',
        'title',
        'image',
        'company',
        'description',
        'filename',
        'apply_link',
        'start_date',
        'deadline',
        'posted_date',
        'active',
        'created_at',
        'updated_at',
    ];

    public function Major()
    {
        return $this->belongsTo('App\Models\Major', 'major_id', 'tender_id');
    }

    public function user(){
        return $this->belongsToMany('App\User', 'users_tenders', 'user_id', 'tender_id');
    }
}
