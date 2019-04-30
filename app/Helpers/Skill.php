<?php
/**
 * Created by PhpStorm.
 * User: Milton
 * Date: 1/8/2019
 * Time: 11:00 AM
 */

namespace App\Helpers;
use App\Models\Address;
use App\Models\Employer;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use File;

class Skill{


    //after profile create and after login check this function
    public static function checkUserStatus(){

        if (auth()->user()->is_status == '3') {
            $rul = 'profile/create';
        }elseif (auth()->user()->is_status=='2'){
            $service = self::checkService();
            if ($service==false){
                $rul = "choose-service";
            }else{
                $rul = self::dashboard($service);
            }
        }elseif (auth()->user()->is_status=='1'){
            $rul =  'profile done!';
        }elseif (auth()->user()->is_status==0){
            $rul = 'profile inactive!';
        }else{
            $rul = '/home';
        }
        return $rul;
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
                ->wherePivot('is_active','1')
                ->first();
        }else{
            $current_service = false;
        }
        return $current_service;
    }

    //redirect dashboard

    public static function dashboard($service){
        switch ($service->role_id){
            case 1:
                return 'admin/dashboard';
            case 2:
                return self::checkEmployerIfCreate();
            case 3:
                return 'jobseeker/dashboard';
            default:
                return 'home';
        }
    }

    public static function checkEmployerIfCreate(){
        $employer = Employer::where('user_id',Auth::id())->first();
        if ($employer==null){
            return 'employer/employer-profile-add';
        }else{
            return 'employer/dashboard';
        }
    }
//get employer id throw user id
public static function getEmployerId($user_id){
    $employer = Employer::where('user_id',$user_id)->first();
    return $employer->id;
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
        $url = url(auth()->user()->avatar);
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

    //return experience year month and day
    public static function experienceCalculator($start_date,$end_date,$is_current){
        $start_date = strtotime($start_date);
        if ($is_current==1 && $end_date=="Continue"){
            $end_date = strtotime(date('Y-m-d'));
        }else{
            $end_date = strtotime($end_date);
        }
        $months = 0;
        $years = 0;
        while (strtotime('+1 MONTH', $start_date) < $end_date) {
            $months++;
            $start_date = strtotime('+1 MONTH', $start_date);
            if($months>11){
                $years++;
                $months=0;
            }
        }
        return $years." year, ". $months. ' month, '. ($end_date - $start_date) / (60*60*24). ' days';
    }
//return total experience year month and day
    public static function totalExperience($id){
        $experiences = Experience::where('user_id',$id)->get();
        $months = 0;
        $years = 0;
        $days = 0;
        foreach ($experiences as $experience){
            $start_date = strtotime($experience->start_date);
            if ($experience->is_current==1 && $experience->end_date=="Continue"){
                $end_date = strtotime(date('Y-m-d'))+$days*60*60*24;
            }else{
                $end_date = strtotime($experience->end_date)+$days*60*60*24;
            }
            while (strtotime('+1 MONTH', $start_date) < $end_date) {
                $months++;
                $start_date = strtotime('+1 MONTH', $start_date);
                if($months>11){
                    $years++;
                    $months=0;
                }
            }
            $days = ($end_date - $start_date) / (60*60*24);

        }
        return $years." year, ". $months. ' month, '. $days . ' days';
    }
//create file directory
    public static function makeFilePath($path){
        $year_path = $path.'/'.date('Y');
        if (File::exists($year_path)) {
            if (File::exists($year_path.'/'.date('m'))){
                $uploadPath = $year_path.'/'.date('m');
            }else{
                File::makeDirectory($year_path.'/'.date('m'));
                $uploadPath = $year_path.'/'.date('m');
            }
        }else{
            File::makeDirectory($year_path);
            $month_path =$year_path.'/'.date('m');
            File::makeDirectory($month_path);
            $uploadPath = $month_path;
        }
        return $uploadPath;
    }

    //return username or name
public static function getUsername(){
    $name = Auth::user()->name;
    return $name;
}
    public static function getEmail(){
        $email = Auth::user()->email?Auth::user()->email:Auth::user()->profile->alternate_email;
        return $email;
    }
}