<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Requests\EducationRequest;
use App\Models\Country;
use App\Models\Degree;
use App\Models\Education;
use App\Models\EducationLevel;
use App\Models\Institute;
use App\Models\ResultType;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class EducationController extends Controller
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

    public function index()
    {
        $educations = Education::where('user_id',Auth::id())->paginate(20);
        return view('jobseeker.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $educations = Education::where('user_id',$this->user_id)->paginate(20);
        $educationLevels = EducationLevel::pluck('name','id')->all();
        $degrees = Degree::where('is_active','1')->pluck('name','id');
        $subjects = Subject::where('is_active','1')->pluck('title','id')->all();
        $countries = Country::pluck('name','id');
        $institutes = Institute::where('is_active','1')->pluck('name','id');
        $resultTypes = ResultType::pluck('name','id')->all();
        return view('jobseeker.education.create', compact('educationLevels','degrees','resultTypes','institutes','countries','subjects','educations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationRequest $request)
    {

        $data = $request->getData();
        Education::create($data);
        return redirect('jobseeker/education');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $educations = Education::where('user_id',$this->user_id)->paginate(20);
        $education = Education::where('user_id',$this->user_id)->find($id);
        if (is_null($education)){
            return view('jobseeker.not-permitted');
        }else{
            return view('jobseeker.education.show',compact('education','educations'));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $education = Education::where('user_id',$this->user_id)->find($id);

        if (is_null($education)){
            return view('jobseeker.not-permitted');
        }else{
            $educations = Education::where('user_id',$this->user_id)->paginate(20);
            $educationLevels = EducationLevel::pluck('name','id')->all();
            $degrees = Degree::where('is_active','1')->pluck('name','id')->toArray();
            $degrees2 = Degree::where('id',$education->degree_id)->pluck('name','id');
            foreach ($degrees2 as $key=>$value){
                $degrees[$key]=$value;
            }
            $subjects = Subject::where('is_active','1')->pluck('title','id');
            $subjects2 = Subject::where('id',$education->subject_id)->pluck('title','id');
            foreach ($subjects2 as $key=>$value){
                $subjects[$key]=$value;
            }
            $countries = Country::pluck('name','id');
            $institutes = Institute::where('is_active','1')->pluck('name','id');
            $institutes2 = Institute::where('id',$education->institute_id)->pluck('name','id');
            foreach ($institutes2 as $key=>$value){
                $institutes[$key]=$value;
            }
            $resultTypes = ResultType::pluck('name','id')->all();
            return view('jobseeker.education.edit', compact('educationLevels','degrees','resultTypes','institutes','countries','subjects','educations','education'));
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EducationRequest $request, $id)
    {
        $education = Education::where('user_id',$this->user_id)->find($id);
        if (is_null($education)){
            return view('jobseeker.not-permitted');
        }else{
            $data = $request->getData();
            $education->update($data);
            return redirect('jobseeker/education');
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
        $education = Education::where('user_id',$this->user_id)->find($id);
        if (is_null($education)){
            return view('jobseeker.not-permitted');
        }else{
            Education::destroy($id);
            return redirect('jobseeker/education');
        }



    }

    public function getDegreeList(Request $request)
    {
        $states = DB::table("degrees")
            ->where("education_level_id",$request->education_level_id)
            ->pluck("name","id");
        return response()->json($states);
    }
}
