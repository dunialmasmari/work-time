<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class compnyInfo extends Model
{
    protected $table = "compnyInfo";

    protected $fillable = [
        'company_id',
        'user_id',
        'logo',
        'companyName',
        'websitelink',
        'email',
        'phone',
        'country',
        'city',
        'address',
        'aboutCompany',
        'size',
        'type',
        'founded',
        'industry',
        'active',
        'description',
    ];
}
