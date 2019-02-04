<?php

namespace App\Http\Requests;

use App\Models\Education;
use App\Models\Institute;
use App\Models\Subject;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Degree;
use Illuminate\Support\Facades\Auth;

class EducationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'education_level_id' => 'required',
            'degree_id' => 'required|min:1|max:150',
            'subject_id' => 'required|min:1|max:190',
            'institute_id' => 'required|min:1|max:190',
            'achievement' => 'nullable|string|min:0|max:250',
            'result_type_id' => 'required',
            'year' => 'required|string|min:1|max:4',
            'duration' => 'nullable|string|min:0|max:15',
            'cgpa' => 'nullable|string|min:0|max:5',
            'mark' => 'nullable|max:2',
            'scale' => 'nullable|string|min:0|max:2',

        ];
        if ($this->input('is_foreign_institute')){
            $rules['country_id'] = 'required';
        }
        if ($this->input('result_type_id')==1||$this->input('result_type_id')==2||$this->input('result_type_id')==3) {
            $rules['mark'] = 'required';
        }
        if ($this->input('result_type_id')==4) {
            $rules['cgpa'] = 'required';
            $rules['scale'] = 'required';
        }

        return $rules;
    }

    /**
     * Get the request's data from the request.
     *
     *
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['education_level_id','major','achievement','result_type_id','is_hide','year','duration']);

        if ($this->input('result_type_id')==1||$this->input('result_type_id')==2||$this->input('result_type_id')==3) {
            $data['mark'] = $this->input('mark');
        }
        if ($this->input('result_type_id')==4) {
            $data['cgpa'] = $this->input('cgpa');
            $data['scale'] = $this->input('scale');
        }
//check degree already create or new create and return degree id
        if(is_numeric($this->input('degree_id')) && Degree::find($this->input('degree_id'))){
            $data['degree_id'] = $this->input('degree_id');
        }else{
            $data['degree_id'] = $this->checkDegree($this->input('degree_id'),$this->input('education_level_id'));
        }
        //check institute already create or new create and return institute id
        if ($this->input('is_foreign_institute')){
            if(is_numeric($this->input('institute_id')) && Institute::find($this->input('institute_id'))){
                $data['institute_id'] = $this->input('institute_id');
            }else{
                $data['institute_id'] = $this->checkInstitute($this->input('institute_id'),$this->input('country_id')?$this->input('country_id'):19);
            }
            $data['is_foreign_institute'] = '1';
        }else{
            $data['institute_id'] = $this->input('institute_id');
            $data['is_foreign_institute'] = '0';
        }

        //check major subject already create or new create and return subject id
        if(is_numeric($this->input('subject_id')) && Subject::find($this->input('subject_id'))){
            $data['subject_id'] = $this->input('subject_id');
        }else{
            $data['subject_id'] = $this->checkSubject($this->input('subject_id'));
        }


$data['user_id']=Auth::id();


        return $data;
    }

    public function checkDegree($name,$education_level_id){
        $degree= Degree::where('name', '=' , $name)->where('education_level_id',$education_level_id)->first();
        if($degree==null){
            $data = [
                'name'=>$name,
                'education_level_id'=>$education_level_id,
                'short_name'=>str_slug($name),
                'is_active'=>'0',
            ];
            $degree = Degree::create($data);
            return $degree->id;
        }else{
            return $degree->id;
        }
    }

    public function checkInstitute($name,$country_id){
        $institute= Institute::where('name', '=' , $name)->where('country_id',$country_id)->first();
        if($institute==null){
            $data = [
                'name'=>$name,
                'country_id'=>$country_id,
                'is_active'=>'0',
            ];
            $institute = Institute::create($data);
            return $institute->id;
        }else{
            return $institute->id;
        }
    }

    public function checkSubject($name){
        $subject= Subject::where('name', '=' , $name)->first();
        if($subject==null){
            $data = [
                'title'=>$name,
                'slug'=>str_slug($name),
                'is_active'=>'0',
            ];
            $subject = Subject::create($data);
            return $subject->id;
        }else{
            return $subject->id;
        }
    }

}
