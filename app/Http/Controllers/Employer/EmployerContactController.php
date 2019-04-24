<?php

namespace App\Http\Controllers\Employer;

use App\Helpers\Skill;
use App\Http\Requests\EmployerContactRequest;
use App\Models\Employer;
use App\Models\EmployerContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployerContactController extends Controller
{

    protected $employer_id;
    public function __construct()
    {
            $this->middleware(function ($request, $next) {
            $this->employer_id = Skill::getEmployerId(Auth::id());
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $contacts  = EmployerContact::where('employer_id',$this->employer_id)->get();
        return view('employer.contact.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployerContactRequest $request)
    {
        try{
            $data = $request->getData();
            EmployerContact::create($data);
            return redirect('employer/contact-person')->with('message', 'Employer Contact successfully add!');
        }catch (Exception $e) {
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
        $employer = $this->checkEmployer($id);
        if ($employer!=null){
            $contact =EmployerContact::find($id);
            $contacts  = EmployerContact::where('employer_id',$this->employer_id)->get();
            return view('employer.contact.show',compact('contact','contacts'));
        }else{
            return redirect('employer/contact-person')->with('message', 'Your are not permited!');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employer = $this->checkEmployer($id);
        if ($employer!=null){
            $contact =EmployerContact::find($id);
            $contacts  = EmployerContact::where('employer_id',$this->employer_id)->get();
            return view('employer.contact.edit',compact('contact','contacts'));
        }else{
            return redirect('employer/contact-person')->with('message', 'Your are not permited!');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployerContactRequest $request, $id)
    {
        $employer = $this->checkEmployer($id);
        if ($employer!=null){
            try{
                $contact =EmployerContact::find($id);
                $data = $request->getData();
                $contact->update($data);
                return redirect('employer/contact-person')->with('message', 'Employer Contact successfully updated!');
            }catch (Exception $e) {
                return back()->withInput()
                    ->withErrors(['message' => 'Unexpected error occurred while trying to process your request!']);
            }
        }else{
            return redirect('employer/contact-person')->with('message', 'Your are not permitted!');
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
        $employer =$this->checkEmployer($id);
        if (is_null($employer)){
            return redirect('employer/contact-person')->with('message', 'Your are not permitted!');
        }else{
            EmployerContact::destroy($id);
            return redirect('employer/contact-person')->with('message', 'Employer Contact successfully deleted!');
        }
    }
    public function checkEmployer($id){
        $employer = EmployerContact::where('employer_id',$this->employer_id)->where('id',$id)->first();
       return $employer;
    }
}
