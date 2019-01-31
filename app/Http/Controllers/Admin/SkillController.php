<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SkillRequest;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::orderBy('id', 'asc')->get();
        return view('admin.skill.index',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::orderBy('id', 'asc')->get();
        return view('admin.skill.create',compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillRequest $request)
    {
        try{
            $data = $request->only('title','slug','is_active');
            Skill::create($data);
            return redirect('admin/skill')
                ->with('message', 'Skill was successfully added!');
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
        $skills = Skill::orderBy('id', 'asc')->get();
        $skill = Skill::find($id);
        return view('admin.skill.show',compact('skill','skills'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skills = Skill::orderBy('id', 'asc')->get();
        $skill = Skill::find($id);
        return view('admin.skill.edit',compact('skill','skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SkillRequest $request, $id)
    {
        try{
            $data = $request->only('title','slug','is_active');
            $skill  = Skill::find($id);
            $skill->update($data);
            return redirect('admin/skill')
                ->with('message', 'Skill was successfully updated!');
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
        Skill::destroy($id);
        return redirect('admin/skill');
    }
}
