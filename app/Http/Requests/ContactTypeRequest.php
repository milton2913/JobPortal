<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactTypeRequest extends FormRequest
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
        $id = $this->route('contact_type');
        return [
            'title'=>'required|max:20|unique:contact_types,title,' . $id,
            'icon_class'=>'max:20',
            'is_active'=>'required',
        ];
    }
}
