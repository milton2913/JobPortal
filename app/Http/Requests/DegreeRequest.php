<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DegreeRequest extends FormRequest
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
        $id = $this->route('degree');
        return [
            'name'=>'required|max:50|unique:degrees,name,' . $id,
            'short_name'=>'max:60',
            'education_level_id'=>'required',
            'is_active'=>'required',
        ];
    }
}
