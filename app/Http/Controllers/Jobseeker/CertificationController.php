<?php

namespace App\Http\Controllers\Jobseeker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Http\Requests\CertificationRequest;
use Auth;
class CertificationController extends Controller
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
        $certifications = Certification::where('user_id',$this->user_id)->get();
        return view('jobseeker.certification.index', compact('certifications'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $certifications = Certification::where('user_id',$this->user_id)->get();
        return view('jobseeker.certification.create', compact('certifications'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CertificationRequest $request)
    {

        $data = $request->getData();
        Certification::create($data);
        return redirect('jobseeker/certification');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certifications = Certification::where('user_id',$this->user_id)->get();
        $certification = Certification::where('user_id',$this->user_id)->find($id);
        if (is_null($certification)){
            return view('jobseeker.not-permitted');
        }else{
            return view('jobseeker.certification.show',compact('certification','certifications'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $certification = Certification::where('user_id',$this->user_id)->find($id);
        if (is_null($certification)){
            return view('jobseeker.not-permitted');
        }else{
            $certifications = Certification::where('user_id',$this->user_id)->get();
            return view('jobseeker.certification.edit', compact('certifications','certification'));
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CertificationRequest $request, $id)
    {
        $certification = Certification::where('user_id',$this->user_id)->find($id);
        if (is_null($certification)){
            return view('jobseeker.not-permitted');
        }else{
            $data = $request->getData();
            $certification->update($data);
            return redirect('jobseeker/certification');
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
        $certification = Certification::where('user_id',$this->user_id)->find($id);
        if (is_null($certification)){
            return view('jobseeker.not-permitted');
        }else{
            Certification::destroy($id);
            return redirect('jobseeker/certification');
        }
    }
}
