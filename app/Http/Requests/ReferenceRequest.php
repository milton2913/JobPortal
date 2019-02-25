<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class ReferenceRequest extends FormRequest
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
        return [
            'name'=>'required|max:100',
            'mobile'=>'required|max:15',
            'reference_type_id'=>'required',
        ];
    }
    public function getData()
    {
        $data = $this->only(['name', 'designation', 'organization', 'mobile', 'phone_office', 'phone_residential', 'email','address','description','reference_type_id']);
        $data['user_id']=Auth::id();
        return $data;
    }
}
