<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class ExpertiseRequest extends FormRequest
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
            'skill_id'=>'required',
            'expert_status_id'=>'required'
        ];
    }
    public function getData()
    {
        $data = $this->only(['skill_id', 'expert_status_id']);
        $data['user_id']=Auth::id();
        return $data;
    }
}
