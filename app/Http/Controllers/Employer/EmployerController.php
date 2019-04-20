<?php

namespace App\Http\Controllers\Employer;

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
use Session;
class EmployerController extends Controller
{
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

        return view('employer.profile.create',compact('countries','divisions','districts','upazilas','industry_types','industries'));
    }

    public function store(EmployerRequest $request){

        DB::beginTransaction();
        try{
            $data = $request->getData();
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

    public function filterIndustry(Request $request){
        if ($request->industry_type_id){
            $industries = Industry::where('is_active','1')->where('industry_type_id',$request->industry_type_id)->get();
        }else{
            $industries = Industry::where('is_active','1')->get();
        }

        $data = view('employer.profile.industry',compact('industries'));
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
}
