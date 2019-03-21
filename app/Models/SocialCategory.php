<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialCategory extends Model
{

    protected $table="social_categories";
    protected $fillable = ['name','icon','is_active'];

    public function social()
    {
        return $this->hasMany('App\Models\Social');
    }

}
