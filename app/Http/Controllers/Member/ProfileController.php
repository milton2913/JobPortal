<?php

namespace App\Http\Controllers\Member;

use App\Http\Requests\ProfileRequest;
use App\Models\Country;
use App\Models\District;
use App\Models\Division;
use App\Models\Profile;
use App\Models\Upazila;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\UserStatus;
use Carbon\Carbon;
class ProfileController extends Controller
{
    /**
     * Show the form for creating a  profile.
     *
     * @return Illuminate\View\View
     */
    public function create(){
        $countries = Country::pluck('name','id');
        $districts = District::pluck('name','id');
        $divisions = Division::pluck('name','id');
        $upazilas = Upazila::pluck('name','id');
        $nationality = Country::pluck('nationality','id');
        return view('member.profiles.create',compact('countries','districts','nationality','divisions','upazilas'));
    }

    public function store(ProfileRequest $request){
        $user = User::find(Auth::id());
        try{
            $profile = $request->only('country_id','district_id','father_name','mother_name','nid','passport_no','birth_certificate','address','post_code','date_of_birth');
            $profile['user_id']=Auth::id();
            $profile['date_of_birth'] = Carbon::createFromFormat('Y-m-d', $request->input('date_of_birth'));
            Profile::create($profile);
            $user->is_status='2';
            $user->save();
            $url = UserStatus::checkUserStatus();
        }catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }

        return redirect($url);
    }
}
