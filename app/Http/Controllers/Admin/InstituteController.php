<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstituteRequest;
use App\Models\Institute;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutes = Institute::orderBy('id', 'asc')->get();
        $countries = Country::pluck('name','id');
        return view('admin.institute.index',compact('institutes','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutes = Institute::orderBy('id', 'asc')->get();
        $countries = Country::pluck('name','id');
        return view('admin.institute.create',compact('institutes','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstituteRequest $request)
    {
        try{
            $data = $request->only('name','country_id','is_active');
            Institute::create($data);
            return redirect('admin/institute')
                ->with('message', 'Institute was successfully added!');
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
        $institutes = Institute::orderBy('id', 'asc')->get();
        $institute = Institute::find($id);
        $countries = Country::pluck('name','id');
        return view('admin.institute.show',compact('institute','institutes','countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institutes = Institute::orderBy('id', 'asc')->get();
        $institute = Institute::find($id);
        $countries = Country::pluck('name','id');
        return view('admin.institute.edit',compact('institute','institutes','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstituteRequest $request, $id)
    {
        try{
            $data = $request->only('name','country_id','is_active');
            $institute  = Institute::find($id);
            $institute->update($data);
            return redirect('admin/institute')
                ->with('message', 'Institute was successfully updated!');
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
        Institute::destroy($id);
        return redirect('admin/institute');
    }
}
