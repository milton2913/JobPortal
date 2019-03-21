<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialCategoryRequest extends FormRequest
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
        $id = $this->route('social_category');
        return [
            'name'=>'required|max:100|unique:social_categories,name,' . $id,
            'icon'=>'required|max:100|unique:social_categories,icon,' . $id,
            'is_active'=>'required',
        ];
    }

    public function getData()
    {
        $data = $this->only(['name','icon','is_active']);
        return $data;
    }
}
