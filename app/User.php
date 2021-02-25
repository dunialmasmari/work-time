<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
// use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    // use HasApiTokens, Notifiable, LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $guard_name = 'api';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id', 'name', 'email', 'password', 'username', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function addTender(){
        return $this->belongsToMany('App\Models\tender', 'users_tenders', 'user_id', 'tender_id');
    }
    public function users()
    {
        return $this->hasOne('App\User');
    }
        
}
