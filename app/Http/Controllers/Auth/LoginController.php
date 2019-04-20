<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Socialite;
use App\Helpers\Skill;
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
    //protected $redirectTo = '/profile/create';
    protected function redirectTo()
    {
        $url = Skill::checkUserStatus();
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
        $user = User::where('email',$userInfo->email)->first();
        if ($user){
            if (Auth::loginUsingId($user->id)){
                return redirect()->route('profiles.profile.create');
            }
        }
        //else sign the user up
        $userSignUp = User::create([
            'name'=>$userInfo->name,
            'email'=>$userInfo->email,
            'avatar'=>$userInfo->avatar,
            'provider'=>$social,
            'is_status'=>'3',
            'verified'=>1,
            'provider_id'=>$userInfo->id,
        ]);
        //finally log the user in
        if ($userSignUp){
            if (Auth::loginUsingId($userSignUp->id)){
                return redirect()->route('profiles.profile.create');
            }
        }
    }



    protected function credentials(Request $request)
    {
        return [
            'email'=>$request->{$this->username()},
            'password'=>$request->password,
            'verified'=>1,
        ];
    }


    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        // Load user from database
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $errors = [$this->username() => trans('auth.email')];
        }
        if (!User::where('email', $request->email)->where('password', bcrypt($request->password))->first()) {
            $errors = ['password' => trans('auth.password')];
        }
        if ($user && \Hash::check($request->password, $user->password) && $user->verified != 1) {
            $errors = [$this->username() => trans('auth.verified')];
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

}
