<?php

namespace App\Http\Controllers\Admin;

use App\Models\EducationLevel;
use App\Http\Requests\EducationLevelRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educationLevels = EducationLevel::orderBy('id', 'asc')->get();
        return view('admin.education-level.index',compact('educationLevels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $educationLevels = EducationLevel::orderBy('id', 'asc')->get();
        return view('admin.education-level.create',compact('educationLevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationLevelRequest $request)
    {
        try{
            $data = $request->only('name','short_name','description','is_active');
            EducationLevel::create($data);
            return redirect('admin/education-level')
                ->with('message', 'Organization type was successfully added!');
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
        $educationLevels = EducationLevel::orderBy('id', 'asc')->get();
        $educationLevel = EducationLevel::find($id);
        return view('admin.education-level.show',compact('educationLevel','educationLevels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $educationLevels = EducationLevel::orderBy('id', 'asc')->get();
        $educationLevel = EducationLevel::find($id);
        return view('admin.education-level.edit',compact('educationLevel','educationLevels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EducationLevelRequest $request, $id)
    {
        try{
            $data = $request->only('name','short_name','description','is_active');
            $educationLevel  = EducationLevel::find($id);
            $educationLevel->update($data);
            return redirect('admin/education-level')
                ->with('message', 'Organization type was successfully updated!');
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
        EducationLevel::destroy($id);
        return redirect('admin/education-level');
    }
}
