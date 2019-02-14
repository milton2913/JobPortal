<?php

namespace App\Http\Requests;

use App\Models\Skill;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
class ExperienceRequest extends FormRequest
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
            'title'=>'required|max:250',
            'company_business'=>'required|max:250',
            'designation'=>'required|max:100',
            'department'=>'nullable|max:100',
            'start_date'=>'required',
            'location'=>'nullable',
            'responsibility'=>'required'
        ];

        if ($this->input('is_current')) {
            $rules['end_date'] = 'nullable';
        }else{
            $rules['end_date'] = 'required';
        }

        return $rules;

    }
    public function getData()
    {
        $data = $this->only(['title', 'company_business', 'designation', 'department', 'start_date', 'end_date','location','responsibility']);
        if ($this->input('is_current')) {
            $data['is_current'] = $this->input('is_current');
        }
        $data['user_id']=Auth::id();
        return $data;
    }

    public function checkSkill($name){
        $skill= Skill::where('title', '=' , $name)->first();
        if($skill==null){
            $data = [
                'title'=>$name,
                'slug'=>str_slug($name),
                'is_active'=>'0',
            ];
            $skill = Skill::create($data);
            return $skill->id;
        }else{
            return $skill->id;
        }
    }


}
