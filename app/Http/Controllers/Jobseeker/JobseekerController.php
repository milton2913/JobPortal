<?php

namespace App\Http\Controllers\Jobseeker;

use App\Models\CvObjective;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class JobseekerController extends Controller
{
    protected $user_id;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user_id= Auth::id();
            return $next($request);
        });
    }
    public function resume(){
        $resume = User::with('profile','address','training','education','reference','expertise','experience','certification','address')->find($this->user_id);

        $cvObjective = CvObjective::where('user_id',$this->user_id)->where('is_active','1')->first();


        return view('jobseeker.resume',compact('resume','cvObjective'));
    }
}
