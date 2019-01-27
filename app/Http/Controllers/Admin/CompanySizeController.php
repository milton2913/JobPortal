<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\CompanySizeRequest;
use App\Models\CompanySize;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanySizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companySizes = CompanySize::orderBy('id', 'asc')->get();
        return view('admin.company-size.index',compact('companySizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companySizes = CompanySize::orderBy('id', 'asc')->get();
        return view('admin.company-size.create',compact('companySizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanySizeRequest $request)
    {
        try{
            $data = $request->only('title','slug','is_active');
            CompanySize::create($data);
            return redirect('admin/company-size')
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
        $companySizes = CompanySize::orderBy('id', 'asc')->get();
        $companySize = CompanySize::find($id);
        return view('admin.company-size.show',compact('companySize','companySizes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companySizes = CompanySize::orderBy('id', 'asc')->get();
        $companySize = CompanySize::find($id);
        return view('admin.company-size.edit',compact('companySize','companySizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanySizeRequest $request, $id)
    {
        try{
            $data = $request->only('title','slug','is_active');
            $companySize  = CompanySize::find($id);
            $companySize->update($data);
            return redirect('admin/company-size')
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
        CompanySize::destroy($id);
        return redirect('admin/company-size');
    }
}
