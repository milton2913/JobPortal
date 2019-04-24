<?php

namespace App\Http\Requests;

use App\Helpers\Skill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EmployerContactRequest extends FormRequest
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
        $id = $this->route('contact_person');
        return [
            'name'=>'required|max:150',
            'email'=>'required|max:150|unique:employer_contacts,email,'.$id,
            'mobile'=>'max:20',
            'designation'=>'required|max:100',
            'username'=>'max:30',
            'password'=>'max:191',
            'is_active'=>'required|max:1',
        ];
    }
    public function getData(){
        $data =$this->only(['name','email','mobile','designation','username','is_active']);
        $data['password']=bcrypt($this->input('password'));
        $data['employer_id']=Skill::getEmployerId(Auth::id());
        return $data;
    }
}
