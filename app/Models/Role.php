<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table="roles";

    protected $fillable = ['name','slug','detail'];
    public function service(){
        return $this->hasOne('Models\Service');
    }

}
