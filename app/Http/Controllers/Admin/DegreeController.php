<?php

namespace App\Http\Controllers\Admin;

use App\Models\EducationLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Http\Requests\DegreeRequest;
use App\Models\Degree;
use App\Models\OrganizationType;
use Validator;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degrees = Degree::orderBy('id', 'asc')->get();
        return view('admin.degree.index',compact('degrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $educationLevels= EducationLevel::pluck('name','id');
        return view('admin.degree.create',compact('educationLevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DegreeRequest $request)
    {
        try{
            $data = $request->only('name','short_name','description','education_level_id','is_active');
            Degree::create($data);
            return redirect('admin/degree')
                ->with('message', 'Degree was successfully added!');
        }catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['message' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $degree = Degree::find($id);
        return view('admin.degree.show',compact('degree'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $educationLevels= EducationLevel::pluck('name','id');
        $degree = Degree::find($id);
        return view('admin.degree.edit',compact('degree','educationLevels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DegreeRequest $request, $id)
    {
        try{
            $data = $request->only('name','short_name','description','education_level_id','is_active');
            $degree  = Degree::find($id);
            $degree->update($data);
            return redirect('admin/degree')
                ->with('message', 'Degree was successfully updated!');
        }catch (Exception $exception){
            return back()->withInput()
                ->withErrors(['message' => 'Unexpected error occurred while trying to process your request!']);
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
        Degree::destroy($id);
        return redirect('admin/degree');
    }
}
