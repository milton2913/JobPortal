<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultTypeRequest extends FormRequest
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
        $id = $this->route('result_type');
        return [
            'name'=>'required|max:50|unique:result_types,name,' . $id,
            'is_active'=>'required',
        ];
    }
}
