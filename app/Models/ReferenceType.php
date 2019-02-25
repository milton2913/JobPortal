<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceType extends Model
{
    protected $table="reference_types";
    protected $fillable = ['title'];

    public function reference(){
        return $this->hasMany('Models\Reference');
    }
}
