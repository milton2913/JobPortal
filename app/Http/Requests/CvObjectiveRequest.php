<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class CvObjectiveRequest extends FormRequest
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
            'objective'=>'required|max:1500',
            'title'=>'required|max:150',
        ];
    }
    public function getData()
    {
        $data = $this->only(['objective','title']);
        $data['user_id']=Auth::id();
        return $data;
    }

}
