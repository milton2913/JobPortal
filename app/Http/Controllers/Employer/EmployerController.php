<?php

namespace App\Http\Controllers\Employer;

use App\Helpers\Skill;
use App\Http\Requests\EmployerRequest;
use App\Models\Country;
use App\Models\District;
use App\Models\Division;
use App\Models\Employer;
use App\Models\EmployerContact;
use App\Models\Industry;
use App\Models\IndustryType;
use App\Models\Upazila;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use File;
class EmployerController extends Controller
{
    protected $user_id;
    protected $employer;
    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            $this->user_id= Auth::id();
            $this->employer = Employer::where('user_id',$this->user_id)->first();
            return $next($request);
        });
    }

    public function index(){
        return view('employer.dashboard');
    }

    public function create(){
        $countries = Country::pluck('name','id');
        $divisions = Division::pluck('name','id');
        $districts = District::pluck('name','id');
        $upazilas = Upazila::pluck('name','id');
        $industry_types = IndustryType::where('is_active','1')->pluck('title','id');
        $industries = Industry::where('is_active','1')->get();
        $selected_industry2 = array();
        $contacts = array();
        return view('employer.profile.create',compact('countries','divisions','districts','upazilas','industry_types','industries','selected_industry2','contacts'));
    }

    public function store(EmployerRequest $request){

        DB::beginTransaction();
        try{
            $data = $request->getData();
        if ($request->hasFile('company_logo')) {
            $uploadPath = Skill::makeFilePath("assets/uploads/company-logo");
            $extension = $request->file('company_logo')->getClientOriginalExtension();
            $fileName = str_slug($request->input('company_name')).date('Y-m-d').'.' . $extension;
            $request->file('company_logo')->move($uploadPath, $fileName);
            $data['company_logo'] = $uploadPath.'/'.$fileName;
        }
            $employer = Employer::create($data);
            $getContact = $request->getEmployerContact($employer);
            EmployerContact::create($getContact);
            $industries = $request->input('industry_id');
            $employer->industry()->attach($industries);
            DB::commit();
            return redirect('employer/dashboard')->with('message', 'Employer profile successfully create!');
        }catch (Exception $e) {
            DB::rollback();
            return back()->withInput()
                ->withErrors(['message' => 'Unexpected error occurred while trying to process your request!']);
        }

    }

    public function edit(){
        $employer =$this->employer;
        $countries = Country::pluck('name','id');
        $divisions = Division::pluck('name','id');
        $districts = District::pluck('name','id');
        $upazilas = Upazila::pluck('name','id');
        $contacts = EmployerContact::pluck('name','id');
        $industry_types = IndustryType::where('is_active','1')->pluck('title','id');
        $industries = Industry::where('is_active','1')->where('industry_type_id',$employer->industry_type_id)->get();
        $selected_industry = $employer->industry()->pluck('industry_id')->toArray();
        $selected_industry2 = $employer->industry()->get();
       return view('employer.profile.edit',compact('employer','countries','divisions','districts','upazilas','industry_types','industries','selected_industry','selected_industry2','contacts'));
    }

    public function update(EmployerRequest $request){

        $employer = $this->employer;

        //DB::beginTransaction();
        try{
            $data = $request->getData();
            if ($request->hasFile('company_logo')) {
                //$uploadPath = public_path('/assets/uploads/avatar');
                $uploadPath = Skill::makeFilePath("assets/uploads/company-logo");
                $extension = $request->file('company_logo')->getClientOriginalExtension();
                $fileName = str_slug($request->input('company_name')).date('Y-m-d').'.' . $extension;
                $request->file('company_logo')->move($uploadPath, $fileName);
                $data['company_logo'] = $uploadPath.'/'.$fileName;
                if ($request->company_logo != null) {
                    $existingPath = $employer->company_logo;
                    if (file_exists( $existingPath)) {
                        unlink($existingPath);
                    }
                }
            }

            $employer->update($data);
            $industries = $request->input('industry_id');
            $employer->industry()->sync($industries);
           // DB::commit();
            return redirect('employer/dashboard')->with('message', 'Employer profile successfully updated!');
        }catch (Exception $e) {
           // DB::rollback();
            return back()->withInput()
                ->withErrors(['message' => 'Unexpected error occurred while trying to process your request!']);
        }
    }






    public function filterIndustry(Request $request){
        $employer =$this->employer;
    if ($request->industry_type_id){
        $industries = Industry::where('is_active','1')->where('industry_type_id',$request->industry_type_id)->get();
    }else{
        $industries = Industry::where('is_active','1')->get();
    }

        //$industries = Industry::where('is_active','1')->get();

        if ($employer!=null) {
            $selected_industry = $employer->industry()->pluck('industry_id')->toArray();
            $selected_industry2 = array();
        }else{
            $selected_industry = array();
            $selected_industry2 = array();
        }
        $data = view('employer.profile.industry',compact('selected_industry2','industries','selected_industry'));

return $data;
            //return response()->json(['options'=>$data]);
    }
    public function getDivisionList(Request $request)
    {
        $divisions  = Division::where('country_id',$request->country_id)->pluck('name','id');
        return response()->json($divisions);
    }
    public function getDistrictList(Request $request)
    {
        $districts  = District::where('division_id',$request->division_id)->pluck('name','id');
        return response()->json($districts);
    }

    public function getUpazilaList(Request $request)
    {
        $upazilas  = Upazila::where('district_id',$request->district_id)->pluck('name','id');
        return response()->json($upazilas);
    }

    public function getEmployerContact(Request $request){
        $contact  = EmployerContact::where('employer_id',$this->employer->id)->find($request->employer_contact_id);
        return response()->json($contact);
    }
}
