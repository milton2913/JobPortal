<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrganizationFormRequest;
use App\Models\OrganizationType;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrganizationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $organizationTypes = OrganizationType::orderBy('id', 'asc')->get();
        return view('admin.organization-type.index',compact('organizationTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizationTypes = OrganizationType::orderBy('id', 'asc')->get();
        return view('admin.organization-type.create',compact('organizationTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationFormRequest $request)
    {
       try{
           $data = $request->only('title','slug','is_active');
           OrganizationType::create($data);
           return redirect('admin/organization-type')
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
        $organizationTypes = OrganizationType::orderBy('id', 'asc')->get();
        $organizationType = OrganizationType::find($id);
        return view('admin.organization-type.show',compact('organizationType','organizationTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organizationTypes = OrganizationType::orderBy('id', 'asc')->get();
        $organizationType = OrganizationType::find($id);
        return view('admin.organization-type.edit',compact('organizationType','organizationTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrganizationFormRequest $request, $id)
    {
        try{
            $data = $request->only('title','slug','is_active');
            $organizationType  = OrganizationType::find($id);
            $organizationType->update($data);
            return redirect('admin/organization-type')
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
        OrganizationType::destroy($id);
        return redirect('admin/organization-type');
    }
}
