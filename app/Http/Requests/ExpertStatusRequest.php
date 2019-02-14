<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpertStatusRequest extends FormRequest
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
        $id = $this->route('expert_status');
        return [
            'title'=>'required|max:50|unique:expert_statuses,title,' . $id,
            'slug'=>'required|max:60|unique:expert_statuses,slug,' . $id,
        ];
    }
}
