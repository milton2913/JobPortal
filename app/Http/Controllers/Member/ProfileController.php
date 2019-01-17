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
use App\Models\Address;
use function Sodium\add;

class ProfileController extends Controller
{
    /**
     * Show the form for creating a  profile.
     *
     * @return Illuminate\View\View
     */
    public function create(){
        $user = Auth::user();
        $countries = Country::pluck('name','id');
        $districts = District::pluck('name','id');
        $divisions = Division::pluck('name','id');
        $upazilas = Upazila::pluck('name','id');
        $nationality = Country::pluck('nationality','id');
        return view('member.profiles.create',compact('countries','districts','nationality','divisions','upazilas','user'));
    }
    /**
     * store user profile data in users, profiles, addresses table by user input.
     *
     * @return
     */
    public function store(ProfileRequest $request){


        $user= Auth::user();
        $user_id = $user->id;
        try{
            $users = $request->only('name','email','mobile');
            $profile = $request->only('gender', 'marital_status', 'religion', 'blood', 'father_name', 'mother_name', 'alternative_email', 'alternative_mobile','identity_type','identity_no');
            $profile['user_id'] =$user_id;


            $profile['date_of_birth'] = UserStatus::dateOfBirth($request->input('date_of_birth'));
            $profile['country_id'] = $request->input('nationality');

             UserStatus::profile($profile);

            //avatar add in user tables
            $user->is_status = '2';
            $user->save();
            //contact information add in same method

            $address['in_bangladesh'] = $request->input('present_address');
            $address['address_type'] = "Present";
            $address['country_id'] = $request->input('present_country_id');
            $address['division_id'] = $request->input('present_division_id');
            $address['district_id'] = $request->input('present_district_id');
            $address['upazila_id'] = $request->input('present_thana_id');
            $address['post_code'] = $request->input('present_area_code');
            $address['others'] = $request->input('presentAddress');
            $address['user_id'] = 6;
            UserStatus::address($address);
            if($request->has('same_address') ) {
                $address['address_type'] = "Permanent";
            }else{
                $address['in_bangladesh'] = $request->input('permanent_address');
                $address['address_type'] = "Permanent";
                $address['country_id'] = $request->input('permanent_country_id');
                $address['division_id'] = $request->input('permanent_division_id');
                $address['district_id'] = $request->input('permanent_district_id');
                $address['upazila_id'] = $request->input('permanent_thana_id');
                $address['post_code'] = $request->input('permanent_area_code');
                $address['others'] = $request->input('permanentAddress');
                $address['user_id'] = 6;
            }
            UserStatus::address($address);
            $url = UserStatus::checkUserStatus();

        }catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
        return redirect($url);

    }
}
