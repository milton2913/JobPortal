<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    protected $fillable = [
        'education_level_id',
        'degree_id',
        'subject_id',
        'is_foreign_institute',
        'institute_id',
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

    public function educationLevel()
    {
        return $this->belongsTo('App\Models\EducationLevel');
    }
    public function degree()
    {
        return $this->belongsTo('App\Models\Degree');
    }
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }
    public function institute()
    {
        return $this->belongsTo('App\Models\Institute');
    }
    public function resultType()
    {
        return $this->belongsTo('App\Models\ResultType');
    }

}
