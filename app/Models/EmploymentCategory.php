<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmploymentCategory extends Model
{
    protected $fillable=['name','slug','msg','is_active'];
    public function employment(){
        return $this->hasMany('App\Models\Employment');
    }
}
