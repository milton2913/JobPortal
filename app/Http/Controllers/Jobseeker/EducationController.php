<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Requests\EducationRequest;
use App\Models\Degree;
use App\Models\Education;
use App\Models\EducationLevel;
use App\Models\ResultType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id =Auth::id();
        $educations = Education::with('educationLevel','degree','resultType','user')->where('user_id',$user_id)->paginate(20);

        return view('jobseeker.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $educationLevels = EducationLevel::pluck('name','id')->all();
        $degrees = Degree::pluck('name','id')->all();
        $resultTypes = ResultType::pluck('name','id')->all();
        $users = User::pluck('name','id')->all();
        return view('jobseeker.education.create', compact('educationLevels','degrees','resultTypes','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationRequest $request)
    {

        dd($request->getData());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDegreeList(Request $request)
    {

        $states = DB::table("degrees")
            ->where("education_level_id",$request->education_level_id)
            ->pluck("name","id");
        return response()->json($states);
    }
}
