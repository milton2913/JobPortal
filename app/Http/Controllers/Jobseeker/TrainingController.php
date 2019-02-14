<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Requests\TrainingRequest;
use App\Models\Country;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class TrainingController extends Controller
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
        $trainings = Training::where('user_id',$this->user_id)->get();
        return view('jobseeker.training.index', compact('trainings'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $countries = Country::pluck('name','id');
        $trainings = Training::where('user_id',$this->user_id)->get();
        return view('jobseeker.training.create', compact('countries','trainings'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainingRequest $request)
    {

        $data = $request->getData();
        Training::create($data);
        return redirect('jobseeker/training');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainings = Training::where('user_id',$this->user_id)->get();
        $training = Training::where('user_id',$this->user_id)->find($id);
        if (is_null($training)){
            return view('jobseeker.not-permitted');
        }else{
            return view('jobseeker.training.show',compact('training','trainings'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $training = Training::where('user_id',$this->user_id)->find($id);
        if (is_null($training)){
            return view('jobseeker.not-permitted');
        }else{
            $countries = Country::pluck('name','id');
            $trainings = Training::where('user_id',$this->user_id)->get();
            return view('jobseeker.training.edit', compact('countries','trainings','training'));
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrainingRequest $request, $id)
    {
        $training = Training::where('user_id',$this->user_id)->find($id);
        if (is_null($training)){
            return view('jobseeker.not-permitted');
        }else{
            $data = $request->getData();
            $training->update($data);
            return redirect('jobseeker/training');
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
        $training = Training::where('user_id',$this->user_id)->find($id);
        if (is_null($training)){
            return view('jobseeker.not-permitted');
        }else{
            Training::destroy($id);
            return redirect('jobseeker/training');
        }
    }
}
