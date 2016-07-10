<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use App\Http\Requests;
use App\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();       
        return view('countries.index')->with(['countries'=>$countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $countries = Country::all();  
        return view('countries.create')->with(['countries'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $record = new Country;
        $record->name=$request->name;
        $record->is_valid=$request->is_valid;
        

        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η χώρα αποθηκεύτηκε επιτυχώς!');
        return redirect('/country');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $country = Country::where("id", $id)->first();
        return view('countries.edit')->with(['country'=>$country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        $record = Country::where("id", $id)->first();
        $record->name=$request->name;
        $record->is_valid=$request->is_valid;
        
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η χώρα αποθηκεύτηκε επιτυχώς!');
        return redirect('/country');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Country::where("id", $id)->first();
        $record->delete();

        session()->flash('message', 'Η χώρα διαγράφηκε επιτυχώς!');
        return redirect('/country');
    }
}
