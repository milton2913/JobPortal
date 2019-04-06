<?php

namespace App\Http\Controllers\Jobseeker;

use App\Models\CvObjective;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use File;
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
    public function profile(){
        $resume = User::with('profile','address','training','education','reference','expertise','experience','certification','address')->find($this->user_id);

        $cvObjective = CvObjective::where('user_id',$this->user_id)->where('is_active','1')->first();
        return view('jobseeker.resume.profile',compact('resume','cvObjective'));
    }

    public function resume($id){
        return view('jobseeker.resume.template'.$id);
    }

    public function resumeUpload(){
        $user = User::find($this->user_id);
        return view('jobseeker.resume.resume-upload',compact('user'));
    }

    /*
     * Resume Upload
     */
    public function uploadResume(Request $request){
        $request->validate([
            'resume' => 'required|mimes:doc,docx'
        ]);
        $pro = Profile::where('user_id',$this->user_id)->first();
        if ($request->hasFile('resume')) {
            $year_path = "assets/uploads/resume".'/'.date('Y');
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
            $extension = $request->file('resume')->getClientOriginalExtension();
            $fileName = $this->makeIdentity($request->ip()).'.' . $extension;
            $request->file('resume')->move($uploadPath, $fileName);
            $data['resume'] = $uploadPath.'/'.$fileName;

            if ($pro->resume != null) {
                $existingPath = $pro->resume;

                if (file_exists( $existingPath)) {
                    unlink(public_path($existingPath));
                }
            }
        }
        $pro->update($data);
        return redirect('jobseeker/resume-upload');
    }

    public function videoResume(Request $request){
        $request->validate([
            'video_resume' => 'max:56535'
        ]);
        $pro = Profile::where('user_id',$this->user_id)->first();
        $data['video_resume']=$request->input('video_resume');
        $pro->update($data);
        return redirect('jobseeker/resume-upload');
    }
    public static function makeIdentity($ip){
        $time = time();
        $ipd=self::removeDot($ip);
        return $ipd.$time.$ipd;
    }
    public static function removeDot($ip){
        return str_replace(".","",$ip);
    }
}
