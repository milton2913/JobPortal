<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReferenceType;
use App\Http\Requests\ReferenceTypeRequest;
class ReferenceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $referenceTypes = ReferenceType::orderBy('id', 'asc')->get();
        return view('admin.reference-type.index',compact('referenceTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $referenceTypes = ReferenceType::orderBy('id', 'asc')->get();
        return view('admin.reference-type.create',compact('referenceTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReferenceTypeRequest $request)
    {
        try{
            $data = $request->only('title','slug','is_active');
            ReferenceType::create($data);
            return redirect('admin/reference-type')
                ->with('message', 'Reference type was successfully added!');
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
        $referenceTypes = ReferenceType::orderBy('id', 'asc')->get();
        $referenceType = ReferenceType::find($id);
        return view('admin.reference-type.show',compact('referenceType','referenceTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $referenceTypes = ReferenceType::orderBy('id', 'asc')->get();
        $referenceType = ReferenceType::find($id);
        return view('admin.reference-type.edit',compact('referenceType','referenceTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReferenceTypeRequest $request, $id)
    {
        try{
            $data = $request->only('title','slug','is_active');
            $referenceType  = ReferenceType::find($id);
            $referenceType->update($data);
            return redirect('admin/reference-type')
                ->with('message', 'Reference type was successfully updated!');
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
        ReferenceType::destroy($id);
        return redirect('admin/reference-type');
    }
}
