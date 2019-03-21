<?php

namespace App\Http\Controllers\Jobseeker;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use Auth;
class LanguageController extends Controller
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
        $quality = ['Average'=>'Average','Good'=>'Good','Very Good'=>'Very Good','Excellent'=>'Excellent'];
        $languages = Language::where('user_id',$this->user_id)->get();
        return view('jobseeker.language.index', compact('languages','quality'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $quality = ['Average'=>'Average','Good'=>'Good','Very Good'=>'Very Good','Excellent'=>'Excellent'];
        $languages = Language::where('user_id',$this->user_id)->get();
        return view('jobseeker.language.create', compact('languages','quality'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $data = $request->getData();
        Language::create($data);
        return redirect('jobseeker/language');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language= Language::where('user_id',$this->user_id)->find($id);
        $languages = Language::where('user_id',$this->user_id)->get();
        if (is_null($language)){
            return view('jobseeker.not-permitted');
        }else{
            return view('jobseeker.language.show', compact('languages', 'language'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $quality = ['Average'=>'Average','Good'=>'Good','Very Good'=>'Very Good','Excellent'=>'Excellent'];
        $languages = Language::where('user_id',$this->user_id)->get();
        $language = Language::where('user_id',$this->user_id)->find($id);
        if (is_null($language)){
            return view('jobseeker.not-permitted');
        }else{
            return view('jobseeker.language.edit', compact('languages','language','quality'));
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, $id)
    {
        $language = Language::where('user_id',$this->user_id)->find($id);
        if (is_null($language)){
            return view('jobseeker.not-permitted');
        }else{
            $data = $request->getData();
            $language->update($data);
            return redirect('jobseeker/language');
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
        $language = Language::where('user_id',$this->user_id)->find($id);
        if (is_null($language)){
            return view('jobseeker.not-permitted');
        }else{
            Language::destroy($id);
            return redirect('jobseeker/language');
        }
    }
}
