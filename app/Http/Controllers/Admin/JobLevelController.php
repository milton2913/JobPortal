<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobLevel;
use App\Http\Requests\JobLevelRequest;
class JobLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobLevels = JobLevel::orderBy('id', 'asc')->get();
        return view('admin.job-level.index',compact('jobLevels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobLevels = JobLevel::orderBy('id', 'asc')->get();
        return view('admin.job-level.create',compact('jobLevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobLevelRequest $request)
    {
        try{
            $data = $request->only('title','slug','is_active');
            JobLevel::create($data);
            return redirect('admin/job-level')
                ->with('message', 'Job Level was successfully added!');
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
        $jobLevels = JobLevel::orderBy('id', 'asc')->get();
        $jobLevel = JobLevel::find($id);
        return view('admin.job-level.show',compact('jobLevel','jobLevels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobLevels = JobLevel::orderBy('id', 'asc')->get();
        $jobLevel = JobLevel::find($id);
        return view('admin.job-level.edit',compact('jobLevel','jobLevels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobLevelRequest $request, $id)
    {
        try{
            $data = $request->only('title','slug','is_active');
            $jobLevel  = JobLevel::find($id);
            $jobLevel->update($data);
            return redirect('admin/job-level')
                ->with('message', 'Job Level was successfully updated!');
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
        JobLevel::destroy($id);
        return redirect('admin/job-level');
    }
}
