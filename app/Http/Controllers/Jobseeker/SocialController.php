<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Requests\socialRequest;
use App\Models\Country;
use App\Models\social;
use App\Models\SocialCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class SocialController extends Controller
{
    protected $user_id;
    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            $this->user_id= Auth::id();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $socialCategories = SocialCategory::where('is_active','1')->pluck('name','id');
        $socials = Social::where('user_id',$this->user_id)->get();
        return view('jobseeker.social.index', compact('socials','socialCategories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $socialCategories = SocialCategory::where('is_active','1')->pluck('name','id');
        $socials = Social::where('user_id',$this->user_id)->get();
        return view('jobseeker.social.create', compact('socialCategories','socials'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialRequest $request)
    {

        $data = $request->getData();
        Social::create($data);
        return redirect('jobseeker/social');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $socials = Social::where('user_id',$this->user_id)->get();
        $social = Social::where('user_id',$this->user_id)->find($id);
        if (is_null($social)){
            return view('jobseeker.not-permitted');
        }else{
            return view('jobseeker.social.show',compact('social','socials'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $social = Social::where('user_id',$this->user_id)->find($id);
        if (is_null($social)){
            return view('jobseeker.not-permitted');
        }else{
            $socialCategories = SocialCategory::where('is_active','1')->pluck('name','id');
            $socials = Social::where('user_id',$this->user_id)->get();
            return view('jobseeker.social.edit', compact('socialCategories','socials','social'));
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialRequest $request, $id)
    {
        $social = Social::where('user_id',$this->user_id)->find($id);
        if (is_null($social)){
            return view('jobseeker.not-permitted');
        }else{
            $data = $request->getData();
            $social->update($data);
            return redirect('jobseeker/social');
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
        $social = Social::where('user_id',$this->user_id)->find($id);
        if (is_null($social)){
            return view('jobseeker.not-permitted');
        }else{
            Social::destroy($id);
            return redirect('jobseeker/social');
        }
    }
}
