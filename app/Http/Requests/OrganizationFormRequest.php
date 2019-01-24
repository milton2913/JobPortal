<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationFormRequest extends FormRequest
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
        $id = $this->route('organization_type');
        return [
            'title'=>'required|max:50|unique:organization_types,title,' . $id,
            'slug'=>'required|max:60|unique:organization_types,slug,' . $id,
            'is_active'=>'required',
        ];
    }
}
