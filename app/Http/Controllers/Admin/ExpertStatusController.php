<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ExpertStatusRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExpertStatus;
class ExpertStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expertStatuses = ExpertStatus::orderBy('id', 'asc')->get();
        return view('admin.expert-status.index',compact('expertStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expertStatuses = ExpertStatus::orderBy('id', 'asc')->get();
        return view('admin.expert-status.create',compact('expertStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpertStatusRequest $request)
    {
        try{
            $data = $request->only('title','slug');
            ExpertStatus::create($data);
            return redirect('admin/expert-status')
                ->with('message', 'Expert Status was successfully added!');
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
        $expertStatuses = ExpertStatus::orderBy('id', 'asc')->get();
        $expertStatus = ExpertStatus::find($id);
        return view('admin.expert-status.show',compact('expertStatus','expertStatuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expertStatuses = ExpertStatus::orderBy('id', 'asc')->get();
        $expertStatus = ExpertStatus::find($id);
        return view('admin.expert-status.edit',compact('expertStatus','expertStatuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpertStatusRequest $request, $id)
    {
        try{
            $data = $request->only('title','slug');
            $expertStatus  = ExpertStatus::find($id);
            $expertStatus->update($data);
            return redirect('admin/expert-status')
                ->with('message', 'Expert Status was successfully updated!');
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
        ExpertStatus::destroy($id);
        return redirect('admin/expert-status');
    }
}
