<?php

namespace App\Models;



use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','provider','provider_id','is_status','mobile','email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function profile(){
        return $this->hasOne('App\Models\Profile');
    }
    public function address(){
        return $this->hasMany('App\Models\Address');
    }
    public function cvObjective(){
        return $this->hasMany('App\Models\CvObjective');
    }
    public function service(){
        return $this->belongsToMany('App\Models\Service')->withPivot('is_active');
    }
//jobseeker section model
    public function training(){
        return $this->hasMany('App\Models\Training');
    }
    public function education(){
        return $this->hasMany('App\Models\Education');
    }
    public function experience(){
        return $this->hasMany('App\Models\Experience');
    }
    public function certification(){
        return $this->hasMany('App\Models\Certification');
    }
    public function reference(){
        return $this->hasMany('App\Models\Reference');
    }
    public function expertise(){
        return $this->hasMany('App\Models\Expertise');
    }

    public function language(){
        return $this->hasMany('App\Models\Language');
    }
    public function social(){
        return $this->hasMany('App\Models\Social');
    }

}
