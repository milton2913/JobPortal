<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $table="certifications";
    protected $fillable = ['title','institute','location','start_date','end_date','user_id'];

}
