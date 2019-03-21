<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SocialRequest extends FormRequest
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
                'url' => 'required|max:500',
                'social_category_id' => 'required'
            ];
            return $rules;
    }

    public function getData()
    {
        $data = $this->only(['url', 'social_category_id']);
        $data['user_id']=Auth::id();

        return $data;
    }
}
