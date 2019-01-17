<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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

        //$id = $this->route('profile');
        $user_id = Auth::id();
        $rules = [];
        $rules = [
            'name' => 'required|max:150',
            'email' => 'required|email|max:100|unique:users,email,'.$user_id,
            'mobile' => 'required|max:20|unique:users,mobile,'.$user_id,
            'avatar' => 'mimes:jpeg,bmp,png',
            'gender' => 'required',
            'marital_status' => 'required',
            'religion' => 'required',
            'blood' => 'required',
            'nationality' => 'required',
            'date_of_birth' => 'required',
            'father_name' => 'required|max:100|',
            'mother_name' => 'required|max:100|',
            'alternative_email' => 'max:100',
            'alternative_mobile' => 'max:15',
            'identity_type' => 'required',
            'identity_no' => 'required|max:20',
        ];
        if ($this->request->get('present_address') == 1) {
           $rules= [
               'present_country_id' => 'required',
               'present_division_id' => 'required',
               'present_district_id' => 'required',
               'present_thana_id' => 'required',
               'present_area_code' => 'required',

           ];
        }else{
            $rules= [
                'present_country_id' => 'required',
            ];
        }
        if(!$this->request->has('same_address') ){
            if ($this->request->get('permanent_address') == 1) {
                $rules= [
                    'permanent_country_id' => 'required',
                    'permanent_division_id' => 'required',
                    'permanent_district_id' => 'required',
                    'permanent_thana_id' => 'required',
                    'permanent_area_code' => 'required',

                ];
            }else{
                $rules= [
                    'permanent_country_id' => 'required',
                ];
            }
        }

return $rules;
    }
}
