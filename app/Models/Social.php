<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table="socials";
    protected $fillable = ['social_category_id','url','user_id'];


    public function socialCategory()
    {
        return $this->belongsTo('App\Models\SocialCategory');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
