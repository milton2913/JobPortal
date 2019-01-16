<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Helpers\UserStatus;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected function redirectTo()
    {
        $url = UserStatus::checkUserStatus();
        return $url;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($social)
    {
        $userInfo = Socialite::driver($social)->stateless()->user();


        //check if user exists and log user in
        $user = User::where('email',$userInfo->user['email'])->first();
        if ($user){
            if (Auth::loginUsingId($user->id)){
                return redirect()->route('home');
            }
        }
        //else sign the user up
        $userSignUp = User::create([
            'name'=>$userInfo->user['name'],
            'email'=>$userInfo->user['email'],
            'avatar'=>$userInfo->avatar,
            'provider'=>$social,
            'provider_id'=>$userInfo->id,
            'password'=> bcrypt('123456'),
        ]);
        //finally log the user in
        if ($userSignUp){
            if (Auth::loginUsingId($userSignUp->id)){
                return redirect()->route('home');
            }
        }
    }


}
