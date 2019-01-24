<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ResultTypeRequest;
use App\Models\ResultType;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultTypeController extends Controller
{
    public function index()
    {
        $resultTypes = ResultType::orderBy('id', 'asc')->get();
        return view('admin.result-type.index',compact('resultTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resultTypes = ResultType::orderBy('id', 'asc')->get();
        return view('admin.result-type.create',compact('resultTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultTypeRequest  $request)
    {
        try{
            $data = $request->only('title','slug','is_active');
            ResultType::create($data);
            return redirect('admin/result-type')
                ->with('message', 'Result type was successfully added!');
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
        $resultTypes = ResultType::orderBy('id', 'asc')->get();
        $resultType = ResultType::find($id);
        return view('admin.result-type.show',compact('resultType','resultTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resultTypes = ResultType::orderBy('id', 'asc')->get();
        $resultType = ResultType::find($id);
        return view('admin.result-type.edit',compact('resultType','resultTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResultTypeRequest $request, $id)
    {
        try{
            $data = $request->only('title','slug','is_active');
            $resultType  = ResultType::find($id);
            $resultType->update($data);
            return redirect('admin/result-type')
                ->with('message', 'Result type was successfully updated!');
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
        ResultType::destroy($id);
        return redirect('admin/result-type');
    }
}
