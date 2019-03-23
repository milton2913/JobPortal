<?php
namespace App\Http\Controllers\Member;

use App\Http\Requests\ProfileRequest;
use App\Models\Country;
use App\Models\District;
use App\Models\Division;
use App\Models\Profile;
use App\Models\Upazila;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Skill;
use Carbon\Carbon;
use App\Models\Address;
use DB;
use File;
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

        $prof = new Profile();

        $user= Auth::user();
        $user_id = $user->id;
        try{
            $userData = $request->getUserData();
            $profile = $request->only('gender', 'marital_status', 'religion', 'blood', 'father_name', 'mother_name', 'alternate_email', 'alternate_mobile','identity_type','identity_no');
            $profile['user_id'] =$user_id;


            $profile['dob'] = $prof->getDateOfBirthAttribute($request->input('dob'));;
            $profile['country_id'] = $request->input('nationality');
            //avatar add in user tables

            if ($request->hasFile('avatar')) {
                //$uploadPath = public_path('/assets/uploads/avatar');
                $uploadPath = Skill::makeFilePath("assets/uploads/avatar/");

                $extension = $request->file('avatar')->getClientOriginalExtension();

                $fileName = $this->makeIdentity($request->ip()).$this->makeVerificationCode($request->ip()).'.' . $extension;
                $request->file('avatar')->move($uploadPath, $fileName);
                $userData['avatar'] = $uploadPath.'/'.$fileName;
                if ($user->avatar != null) {
                    $existingPath = $uploadPath.'/'.$user->avatar;
                    if (file_exists( $existingPath)) {
                        unlink(public_path($existingPath));
                    }
                }
            }
            $user->update($userData);
            Skill::profile($profile);
            //contact information add in same method

            $address['in_bangladesh'] = $request->input('present_address');
            $address['address_type'] = "Present";
            $address['country_id'] = $request->input('present_country_id');
            $address['division_id'] = $request->input('present_division_id');
            $address['district_id'] = $request->input('present_district_id');
            $address['upazila_id'] = $request->input('present_thana_id');
            $address['post_code'] = $request->input('present_area_code');
            $address['others'] = $request->input('presentAddress');
            $address['user_id'] = $user_id;
            Skill::address($address);
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
                $address['user_id'] = $user_id;
            }
            Skill::address($address);

            $url = Skill::checkUserStatus();

        }catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
        return redirect($url);

    }


    public function selectPresentCountry(Request $request)

    {

        if($request->ajax()){
            $divisions = Division::where('country_id',19)->get();
            $data = view('member.profiles.country',compact('divisions'))->render();
            //return $data;
           return response()->json(['options'=>$data]);
        }

    }

    public function makeVerificationCode($ip){
        $time = time();
        $ipd=$this->removeDot($ip);
        return $time.$ipd;
    }
    public function makeIdentity($ip){
        $time = time();
        $ipd=$this->removeDot($ip);
        return $ipd.$time.$ipd;
    }
    public function removeDot($ip){
        return str_replace(".","",$ip);
    }

    public function getStateList(Request $request)
    {
        $states = DB::table("divisions")
            ->where("country_id",$request->country_id)
            ->pluck("name","id");
        return response()->json($states);
    }

    public function getCityList(Request $request)
    {
        $cities = DB::table("districts")
            ->where("division_id",$request->state_id)
            ->pluck("name","id");
        return response()->json($cities);
    }
    public function getThanaList(Request $request)
    {
        $cities = DB::table("upazilas")
            ->where("district_id",$request->district_id)
            ->pluck("name","id");
        return response()->json($cities);
    }

}
