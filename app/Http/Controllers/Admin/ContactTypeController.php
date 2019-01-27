<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContactTypeRequest;
use App\Models\ContactType;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ContactTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactTypes = ContactType::orderBy('id', 'asc')->get();
        return view('admin.contact-type.index',compact('contactTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contactTypes = ContactType::orderBy('id', 'asc')->get();
        return view('admin.contact-type.create',compact('contactTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactTypeRequest $request)
    {
        try{
            $data = $request->only('title','icon_class','is_active');
            ContactType::create($data);
            return redirect('admin/contact-type')
                ->with('message', 'Contact type was successfully added!');
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
        $contactTypes = ContactType::orderBy('id', 'asc')->get();
        $contactType = ContactType::find($id);
        return view('admin.contact-type.show',compact('contactType','contactTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactTypes = ContactType::orderBy('id', 'asc')->get();
        $contactType = ContactType::find($id);
        return view('admin.contact-type.edit',compact('contactType','contactTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactTypeRequest $request, $id)
    {
        try{
            $data = $request->only('title','icon_class','is_active');
            $contactType  = ContactType::find($id);
            $contactType->update($data);
            return redirect('admin/contact-type')
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
        ContactType::destroy($id);
        return redirect('admin/contact-type');
    }
}
