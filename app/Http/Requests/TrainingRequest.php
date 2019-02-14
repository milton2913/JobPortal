<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TrainingRequest extends FormRequest
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
                'title' => 'required|max:250',
                'year' => 'required|max:4',
                'institute' => 'required|max:250',
                'duration' => 'required|max:100',
                'country_id' => 'required',
                'topic' => 'nullable',
                'location' => 'nullable',
            ];
            return $rules;
    }

    public function getData()
    {
        $data = $this->only(['title', 'year', 'institute', 'duration', 'country_id', 'topic', 'location']);
        $data['user_id']=Auth::id();
        return $data;
    }
}
