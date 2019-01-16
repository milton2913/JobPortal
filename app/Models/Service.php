<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table="services";
    protected $fillable = ['title','slug','role_id'];

    public function role(){
        return $this->hasOne('Models\Role');
    }
}
