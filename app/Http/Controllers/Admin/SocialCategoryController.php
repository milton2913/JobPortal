<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SocialCategoryRequest;
use App\Models\SocialCategory;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialCategories = SocialCategory::orderBy('id', 'asc')->get();
        return view('admin.social-category.index',compact('socialCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socialCategories = SocialCategory::orderBy('id', 'asc')->get();
        return view('admin.social-category.create',compact('socialCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialCategoryRequest $request)
    {
        dd($request);
        try{
            $data = $request->getData();
            SocialCategory::create($data);
            return redirect('admin/social-category')
                ->with('message', 'Social Category was successfully added!');
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
        $socialCategories = SocialCategory::orderBy('id', 'asc')->get();
        $socialCategory = SocialCategory::find($id);
        return view('admin.social-category.show',compact('socialCategory','socialCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socialCategories = SocialCategory::orderBy('id', 'asc')->get();
        $socialCategory = SocialCategory::find($id);
        return view('admin.social-category.edit',compact('socialCategory','socialCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialCategoryRequest $request, $id)
    {
        try{

            $data = $request->getData();
            $socialCategory  = SocialCategory::find($id);
            $socialCategory->update($data);
            return redirect('admin/social-category')
                ->with('message', 'Social Category was successfully updated!');
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
        SocialCategory::destroy($id);
        return redirect('admin/social-category');
    }
}
