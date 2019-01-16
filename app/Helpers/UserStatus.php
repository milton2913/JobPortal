<?php
/**
 * Created by PhpStorm.
 * User: Milton
 * Date: 1/8/2019
 * Time: 11:00 AM
 */

namespace App\Helpers;
use App\User;
use Illuminate\Support\Facades\Auth;
class UserStatus{

    public static function checkUserStatus(){
        if (auth()->user()->is_status == 3) {
            return 'profile/create';
        }elseif (auth()->user()->is_status==2){
            return 'profile info found! but others info not found!';
        }elseif (auth()->user()->is_status==1){
            return 'profile done!';
        }elseif (auth()->user()->is_status==0){
            return 'profile inactive!';
        }else{
            return '/home';
        }

    }
}