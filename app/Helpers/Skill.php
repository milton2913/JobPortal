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
use function PHPSTORM_META\elementType;

class Skill{

    public static function checkUserStatus(){
        if (auth()->user()->is_status == 3) {
            return 'profile/create';
        }elseif (auth()->user()->is_status==2){
            $url = self::checkCvInfo();
            return 'profile info found! but others info not found!';
        }elseif (auth()->user()->is_status==1){
            return 'profile done!';
        }elseif (auth()->user()->is_status==0){
            return 'profile inactive!';
        }else{
            return '/home';
        }

    }

    public static function checkCvInfo(){

    }



    public static function dateOfBirth($dob){
        //$result= Carbon::createFromFormat('Y-m-d', $dob);
       return "1991-12-31";
    }
    public static function profile($profile){
       $pro = Profile::where('user_id',Auth::id())->first();
       if ($pro){
           $pro->update($profile);
       }else{
           Profile::create($profile);
       }
    }
    public static function address($address){
        $addre = Address::where('user_id',Auth::id())->where('address_type',$address['address_type'])->first();
        if ($addre){
            $addre->update($address);
        }else{
            Address::create($address);
        }
    }

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

      public static function presentAddress(){
          $address = Address::where('user_id', Auth::id())
              ->where('address_type', "Present")
              ->first();
          return $address;
      }
    public static function permanentAddress(){
        $address = Address::where('user_id', Auth::id())
            ->where('address_type', "Permanent")
            ->first();
        return $address;
    }
}