<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Requests\CvObjectiveRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\CvObjective;
class CvObjectiveController extends Controller
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
        $cvObjectives = CvObjective::where('user_id',$this->user_id)->get();
        return view('jobseeker.cv-objective.index', compact('cvObjectives'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $cvObjectives = CvObjective::where('user_id',$this->user_id)->get();
        return view('jobseeker.cv-objective.create', compact('cvObjectives'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CvObjectiveRequest $request)
    {

        $data = $request->getData();
        CvObjective::create($data);
        return redirect('jobseeker/cv-objective');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cvObjectives = CvObjective::where('user_id',$this->user_id)->get();
        $cvObjective = CvObjective::where('user_id',$this->user_id)->find($id);

        if (is_null($cvObjective)){
            return view('jobseeker.not-permitted');
        }else{
            return view('jobseeker.cv-objective.show',compact('cvObjectives','cvObjective'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $cvObjective = CvObjective::where('user_id',$this->user_id)->find($id);
        if (is_null($cvObjective)){
            return view('jobseeker.not-permitted');
        }else{
            $cvObjectives = CvObjective::where('user_id',$this->user_id)->get();
            return view('jobseeker.cv-objective.edit', compact('cvObjective','cvObjectives'));
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CvObjectiveRequest $request, $id)
    {
        $cvObjective = CvObjective::where('user_id',$this->user_id)->find($id);
        if (is_null($cvObjective)){
            return view('jobseeker.not-permitted');
        }else{
            $data = $request->getData();
            $cvObjective->update($data);
            return redirect('jobseeker/cv-objective');
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
        $cvObjective = CvObjective::where('user_id',$this->user_id)->find($id);
        if (is_null($cvObjective)){
            return view('jobseeker.not-permitted');
        }else{
            CvObjective::destroy($id);
            return redirect('jobseeker/cv-objective');
        }
    }

    public function cvObjectiveStatus(Request $request){
        $data = CvObjective::where('user_id',$this->user_id)->find($request->is_active);
        if (!is_null($data)) {
            $userObjective = CvObjective::where('user_id', $this->user_id)->get();
            foreach ($userObjective as $all) {
                $all->is_active = '0';
                $all->save();
            }
            $data->is_active = '1';
            $data->save();
            return "Active";
        }else{
            return "not found!";
        }

      /*  $states = DB::table("degrees")
            ->where("education_level_id",$request->education_level_id)
            ->pluck("name","id");
        return response()->json($states);

        if($request->ajax()){
            $data = CvObjective::where('user_id',$this->user_id)->find($request->is_active);
            if (!is_null($data)) {
                $userObjective=CvObjective::where('user_id',$this->user_id)->find($request->is_active);
                foreach ($userObjective as $all){
                    $all->is_active = 0;
                    $all->save();
                }
                $data->is_active = 1;
                $data->save();
                return "Active";
            }else{
                return "not found!";
            }
        }

*/
    }

   /* public function cvObjectiveStatus(Request $request){
        if($request->ajax()){
            $data = CvObjective::where('user_id',$this->user_id)->find($request->is_active);
            if (!is_null($data)) {
                $userObjective=CvObjective::where('user_id',$this->user_id)->find($request->is_active);
                foreach ($userObjective as $all){
                    $all->is_active = 0;
                    $all->save();
                }
                $data->is_active = 1;
                $data->save();
                return "Active";
            }else{
                return "not found!";
            }
        }
    }*/
}
