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
        $rules = [
            'name' => 'required|max:150',
            'email' => 'required|email|max:100|unique:users,email,'.$user_id,
            'mobile' => 'required|max:20|unique:users,mobile,'.$user_id,
            'avatar' => 'max:10|mimes:jpeg,bmp,png,jpg',
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
            'identity_no' => 'max:20',
        ];
        if ($this->request->get('identity_type')){
            $rules= [
                'identity_no' => 'required',
            ];
        }
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
public function getUserData(){
        $user= Auth::user();
        $data = $this->only(['name']);
        $data['email']= $user->email?$user->email:$this->request->get('email');
        $data['mobile']= $user->mobile?$user->mobile:$this->request->get('mobile');
        $data['is_status']= '2';
        return $data;
    }

    public function getProfileData(){
        $user= Auth::user();
        $data = $this->only(['name']);
        $data['email']= $user->email?$user->email:$this->request->get('email');
        $data['mobile']= $user->mobile?$user->mobile:$this->request->get('mobile');
        $data['is_status']= '2';
        return $data;
    }
}
