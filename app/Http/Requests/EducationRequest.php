<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'degree_id' => 'required',
            'major' => 'required|string|min:1|max:250',
            'institute' => 'required|string|min:1|max:250',
            'achievement' => 'nullable|string|min:0|max:250',
            'result_type_id' => 'required',
            'year' => 'required|string|min:1|max:4',
            'duration' => 'nullable|string|min:0|max:15',
            'cgpa' => 'nullable|string|min:0|max:5',
            'scale' => 'nullable|string|min:0|max:2',

        ];

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
        $data = $this->only(['education_level_id','degree_id','major','institute','is_foreign_institute','achievement','result_type_id','is_hide','year','duration']);

        if ($this->input('result_type_id')==1||$this->input('result_type_id')==2||$this->input('result_type_id')==3) {
            $data['mark'] = $this->input('mark');
        }
        if ($this->input('result_type_id')==4) {
            $data['cgpa'] = $this->input('cgpa');
            $data['scale'] = $this->input('scale');
        }



        return $data;
    }
}
