<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $filtable=[
            'job_id',
            'user_id',
            'major_id',
            'title',
            'image',
            'company',
            'email',
            'apply_link',
            'register_here',
            'requerment',
            'description',
            'start_date',
            'deadline',
            'posted_date',
            'active',
            'location',
            'created_at',
            'updated_at',
        ];
    
      /*  protected $guarded = [];

        protected $casts = [
            'requerment' => 'array'
        ];
    
        public function setrequermentAttribute($type)
        {
            $requerment = [];
    
            foreach ($type as $array_item) {
                if (!is_null($array_item['name'])) {
                    $requerment[] = $array_item;
                }
            }
    
            $this->attributes['requerment'] = json_encode($requerment);
        }*/
}
