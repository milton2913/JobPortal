<?php

namespace App\Http\Controllers\Jobseeker;

use App\Models\ExpertStatus;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expertise;
use App\Http\Requests\ExpertiseRequest;
use Auth;
class ExpertiseController extends Controller
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
        $skills = Skill::pluck('title','id');
        $expertStatus = ExpertStatus::pluck('title','id');
        $expertises = Expertise::where('user_id',$this->user_id)->get();
        return view('jobseeker.expertise.index', compact('expertises','skills','expertStatus'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $skills = Skill::pluck('title','id');
        $expertStatus = ExpertStatus::pluck('title','id');
        $expertises = Expertise::where('user_id',$this->user_id)->get();
        return view('jobseeker.expertise.create', compact('expertises','skills','expertStatus'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpertiseRequest $request)
    {

        $data = $request->getData();
        Expertise::create($data);
        return redirect('jobseeker/expertise');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expertise= Expertise::where('user_id',$this->user_id)->find($id);
        $skills = Skill::pluck('title','id');
        $expertStatus = ExpertStatus::pluck('title','id');
        $expertises = Expertise::where('user_id',$this->user_id)->get();
        if (is_null($expertise)){
            return view('jobseeker.not-permitted');
        }else{
            return view('jobseeker.expertise.show', compact('expertises', 'expertise','skills','expertStatus'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $skills = Skill::pluck('title','id');
        $expertStatus = ExpertStatus::pluck('title','id');
        $expertises = Expertise::where('user_id',$this->user_id)->get();
        $expertise = Expertise::where('user_id',$this->user_id)->find($id);
        if (is_null($expertise)){
            return view('jobseeker.not-permitted');
        }else{
            return view('jobseeker.expertise.edit', compact('expertises','expertise','skills','expertStatus'));
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpertiseRequest $request, $id)
    {
        $expertise = Expertise::where('user_id',$this->user_id)->find($id);
        if (is_null($expertise)){
            return view('jobseeker.not-permitted');
        }else{
            $data = $request->getData();
            $expertise->update($data);
            return redirect('jobseeker/expertise');
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
        $expertise = Expertise::where('user_id',$this->user_id)->find($id);
        if (is_null($expertise)){
            return view('jobseeker.not-permitted');
        }else{
            Expertise::destroy($id);
            return redirect('jobseeker/expertise');
        }
    }
}
