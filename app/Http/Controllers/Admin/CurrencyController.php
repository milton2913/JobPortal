<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\CurrencyRequest;
use App\Models\Country;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::pluck('name','id');
        $currencies = Currency::orderBy('id', 'asc')->get();
        return view('admin.currency.index',compact('currencies','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::pluck('name','id');
        $currencies = Currency::orderBy('id', 'asc')->get();
        return view('admin.currency.create',compact('currencies','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        try{
            $data = $request->only('title','country_id','currency_symbol','is_active');
            Currency::create($data);
            return redirect('admin/currency')
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

        $currencies = Currency::orderBy('id', 'asc')->get();
        $currency = Currency::find($id);
        return view('admin.currency.show',compact('currency','currencies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::pluck('name','id');
        $currencies = Currency::orderBy('id', 'asc')->get();
        $currency = Currency::find($id);
        return view('admin.currency.edit',compact('currency','currencies','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, $id)
    {
        try{
            $data = $request->only('title','country_id','currency_symbol','is_active');
            $currency  = Currency::find($id);
            $currency->update($data);
            return redirect('admin/currency')
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
        Currency::destroy($id);
        return redirect('admin/currency');
    }
}
