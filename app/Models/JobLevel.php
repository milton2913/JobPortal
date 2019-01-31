<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobLevel extends Model
{
    protected $table="job_levels";
    protected $fillable = ['title','slug','is_active'];
}
