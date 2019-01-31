<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    protected $fillable = [
        'education_level_id',
        'degree_id',
        'major',
        'institute',
        'is_foreign_institute',
        'achievement',
        'result_type_id',
        'is_hide',
        'mark',
        'cgpa',
        'scale',
        'year',
        'duration',
        'user_id'
    ];
}
