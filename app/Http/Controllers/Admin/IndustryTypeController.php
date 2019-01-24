<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\IndustryTypeRequest;
use App\Models\IndustryType;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndustryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industryTypes = IndustryType::orderBy('id', 'asc')->get();
        return view('admin.industry-type.index',compact('industryTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industryTypes = IndustryType::orderBy('id', 'asc')->get();
        return view('admin.industry-type.create',compact('industryTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IndustryTypeRequest $request)
    {
        try{
            $data = $request->only('title','slug','is_active');
            IndustryType::create($data);
            return redirect('admin/industry-type')
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
        $industryTypes = IndustryType::orderBy('id', 'asc')->get();
        $industryType = IndustryType::find($id);
        return view('admin.industry-type.show',compact('industryType','industryTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $industryTypes = IndustryType::orderBy('id', 'asc')->get();
        $industryType = IndustryType::find($id);
        return view('admin.industry-type.edit',compact('industryType','industryTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IndustryTypeRequest $request, $id)
    {
        try{
            $data = $request->only('title','slug','is_active');
            $IndustryType  = IndustryType::find($id);
            $IndustryType->update($data);
            return redirect('admin/industry-type')
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
        IndustryType::destroy($id);
        return redirect('admin/industry-type');
    }
}
