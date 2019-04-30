<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
protected $fillable=[];


    //select employment category/ job category to employment
    public function employment_category(){
        return $this->belongsTo('App\Models\EmploymentCategory');
    }
    //select job type to employment
    public function job_type(){
        return $this->belongsToMany('App\Models\JobType');
    }
    //select job level to employment
    public function job_level(){
        return $this->belongsToMany('App\Models\JobLevel');
    }
    //select education level to employment
    public function education_level(){
        return $this->belongsToMany('App\Models\EducationLevel');
    }
    //select degree to employment
    public function degree(){
        return $this->belongsToMany('App\Models\Degree');
    }
    //select subject to employment
    public function subject(){
        return $this->belongsToMany('App\Models\Subject');
    }
    //select institute to employment
    public function institute(){
        return $this->belongsToMany('App\Models\Institute');
    }

    //select institute to employment
    public function skill(){
        return $this->belongsToMany('App\Models\Skill');
    }

    //select compensation
    public function compensation(){
        return $this->belongsToMany('App\Models\Compensation');
    }
}
