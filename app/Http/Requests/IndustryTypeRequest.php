<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndustryTypeRequest extends FormRequest
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
        $id = $this->route('industry_type');
        return [
            'title'=>'required|max:50|unique:industry_types,title,' . $id,
            'slug'=>'required|max:60|unique:industry_types,slug,' . $id,
            'is_active'=>'required',
        ];
    }
}
