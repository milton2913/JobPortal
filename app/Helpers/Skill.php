<?php
/**
 * Created by PhpStorm.
 * User: Milton
 * Date: 1/8/2019
 * Time: 11:00 AM
 */

namespace App\Helpers;
use App\Models\Address;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class Skill{


    //after profile create and after login check this function
    public static function checkUserStatus(){
        if (auth()->user()->is_status == 3) {
            return 'profile/create';
        }elseif (auth()->user()->is_status==2){
            $service = self::checkService();
            if ($service==false){
                dd("Service Choice page");
            }else{
                self::dashboard($service);
            }
        }elseif (auth()->user()->is_status==1){
            return 'profile done!';
        }elseif (auth()->user()->is_status==0){
            return 'profile inactive!';
        }else{
            return '/home';
        }

    }

    //check user service if found any service then return default service
    public static function checkService(){
        $service = User::findOrFail(Auth::id());
        $service_user = $service->service()
            ->wherePivot('user_id',Auth::id())
            ->get(); // execute the query
        if($service_user->count() >0 ){
            $current_service = $service->service()
                ->wherePivot('user_id',Auth::id())
                ->wherePivot('is_active',1)
                ->first();
        }else{
            $current_service = false;
        }
        return $current_service;
    }

    //redirect dashboard

    public static function dashboard($service){
        switch ($service->id){
            case 1:
                return 'employer/dashboard';
            case 2:
                return 'jobseeker/dashboard';
            default:
                return 'home';
        }
    }

    //check jobs seeker CV status
    public static function checkCvInfo(){

    }


    //create or update user profile
    public static function profile($profile){
       $pro = Profile::where('user_id',Auth::id())->first();
       if ($pro){
           $pro->update($profile);
       }else{
           Profile::create($profile);
       }
    }

//return user avatar
    public static function getAvatar(){
        $avatarUrl = Auth::user()->avatar;
        $http   = 'http';
        $pos = strpos($avatarUrl, $http);
        if ($pos === false) {
        $url = url('assets/uploads/avatar/'.auth()->user()->avatar);
        } else {
        $url = auth()->user()->avatar;
        }
        return $url;
      }
      //create or update user address
    public static function address($address){
        $addre = Address::where('user_id',Auth::id())->where('address_type',$address['address_type'])->first();
        if ($addre){
            $addre->update($address);
        }else{
            Address::create($address);
        }
    }
    //return present address
      public static function presentAddress(){
          $address = Address::where('user_id', Auth::id())
              ->where('address_type', "Present")
              ->first();
          return $address;
      }
      // return permanent address
    public static function permanentAddress(){
        $address = Address::where('user_id', Auth::id())
            ->where('address_type', "Permanent")
            ->first();
        return $address;
    }
}