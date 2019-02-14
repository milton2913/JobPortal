<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class CertificationRequest extends FormRequest
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
        $rules = [
            'title'=>'required|max:250',
            'location'=>'nullable',
            'institute'=>'required|max:150',
            'start_date'=>'required|max:15',
            'end_date'=>'required|max:15',
        ];
        return $rules;
    }

    public function getData()
    {
        $data = $this->only(['title', 'location', 'institute', 'start_date', 'end_date']);
        $data['user_id']=Auth::id();
        return $data;
    }
}
