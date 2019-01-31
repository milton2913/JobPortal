<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobLevelRequest extends FormRequest
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
        $id = $this->route('job_level');
        return [
            'title'=>'required|max:100|unique:job_levels,title,' . $id,
            'slug'=>'required|max:120|unique:job_levels,slug,' . $id,
            'is_active'=>'required',
        ];
    }
}
