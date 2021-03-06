<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationType extends Model
{
    protected $table="organization_types";
    protected $fillable = ['title','slug','is_active'];
    public function organization(){
        return $this->hasMany('Models\Organization');
    }
}
