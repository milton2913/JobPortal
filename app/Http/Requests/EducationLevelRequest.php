<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationLevelRequest extends FormRequest
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
        $id = $this->route('education_level');
        return [
            'name'=>'required|max:100|unique:education_levels,name,' . $id,
            'short_name'=>'required|max:50|unique:education_levels,short_name,' . $id,
            'is_active'=>'required',
        ];
    }
}
