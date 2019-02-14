<?php

namespace App\Http\Controllers\Jobseeker;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Experience;
use App\Http\Requests\ExperienceRequest;
use Carbon\Carbon;
use DB;
class ExperienceController extends Controller
{
    protected $user_id;
    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            $this->user_id= Auth::id();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $experiences = Experience::where('user_id',$this->user_id)->get();

        return view('jobseeker.experience.index', compact('experiences'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $skills = Skill::where('is_active','1')->pluck('title','id');
        $experiences = Experience::where('user_id',$this->user_id)->get();
        return view('jobseeker.experience.create', compact('experiences','skills'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienceRequest $request)
    {
        $data = $request->getData();
        $experience = Experience::create($data);
        $skill_ids = $request->input('skill_id');

        $skills = array();
        foreach ($skill_ids as $skill){
            if(is_numeric($skill) && Skill::find($skill)){
                $skills[] = $skill;
            }else{
                $skills[] = $request->checkSkill($skill);
            }
        }
        $experience->skill()->attach($skills);
        return redirect('jobseeker/experience');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $experiences = Experience::where('user_id',$this->user_id)->get();
        $experience = Experience::where('user_id',$this->user_id)->find($id);
        if (is_null($experience)){
            return view('jobseeker.not-permitted');
        }else{
            return view('jobseeker.experience.show',compact('experience','experiences'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $experience = Experience::where('user_id',$this->user_id)->find($id);
        $skills = Skill::where('is_active','1')->pluck('title','id');
        $skills2 = DB::table('experience_skill')->where('experience_id',$experience->id)->get();
        foreach ($skills2 as $key=>$value){
            $skill = Skill::where('is_active','0')->where('id',$value->skill_id)->first();
            if($skill){
                $skills[$skill->id]=$skill->title;
            }
        }
        $selected_skills = $experience->skill()->pluck('skill_id')->toArray();
      //  dd($selected_skills);
        if (is_null($experience)){
            return view('jobseeker.not-permitted');
        }else{
            $experiences = Experience::where('user_id',$this->user_id)->get();
            return view('jobseeker.experience.edit', compact('experiences','experience','skills','selected_skills'));
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExperienceRequest $request, $id)
    {
        $experience = Experience::where('user_id',$this->user_id)->find($id);
        if (is_null($experience)){
            return view('jobseeker.not-permitted');
        }else{
            $data = $request->getData();
            $experience->update($data);

            $skill_ids = $request->input('skill_id');

            $skills = array();
            foreach ($skill_ids as $skill){
                if(is_numeric($skill) && Skill::find($skill)){
                    $skills[] = $skill;
                }else{
                    $skills[] = $request->checkSkill($skill);
                }
            }
            $experience->skill()->sync($skills);
            return redirect('jobseeker/experience');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = Experience::where('user_id',$this->user_id)->find($id);
        if (is_null($experience)){
            return view('jobseeker.not-permitted');
        }else{
            Experience::destroy($id);
            return redirect('jobseeker/experience');
        }
    }
}
