<?php

namespace App\Http\Controllers\Jobseeker;

use App\Models\ReferenceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reference;
use App\Http\Requests\ReferenceRequest;
use Auth;

class ReferenceController extends Controller
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
        $references = Reference::where('user_id',$this->user_id)->get();
        return view('jobseeker.reference.index', compact('references'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $referenceTypes = ReferenceType::pluck('title','id');
        $references = Reference::where('user_id',$this->user_id)->get();
        return view('jobseeker.reference.create', compact('referenceTypes','references'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(referenceRequest $request)
    {

        $data = $request->getData();
        Reference::create($data);
        return redirect('jobseeker/reference');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $references = Reference::where('user_id',$this->user_id)->get();
        $reference = Reference::where('user_id',$this->user_id)->find($id);
        if (is_null($reference)){
            return view('jobseeker.not-permitted');
        }else{
            return view('jobseeker.reference.show',compact('reference','references'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $reference = Reference::where('user_id',$this->user_id)->find($id);
        if (is_null($reference)){
            return view('jobseeker.not-permitted');
        }else{
            $referenceTypes = ReferenceType::pluck('title','id');
            $references = Reference::where('user_id',$this->user_id)->get();
            return view('jobseeker.reference.edit', compact('referenceTypes','references','reference'));
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(referenceRequest $request, $id)
    {
        $reference = Reference::where('user_id',$this->user_id)->find($id);
        if (is_null($reference)){
            return view('jobseeker.not-permitted');
        }else{
            $data = $request->getData();
            $reference->update($data);
            return redirect('jobseeker/reference');
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
        $reference = Reference::where('user_id',$this->user_id)->find($id);
        if (is_null($reference)){
            return view('jobseeker.not-permitted');
        }else{
            Reference::destroy($id);
            return redirect('jobseeker/reference');
        }
    }
}
