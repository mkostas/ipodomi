<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests;
use App\Company;
use App\CompanyCategory;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all()->sortByDesc("updated_at");
        $company_categories = CompanyCategory::all();
        return view('company.index')->with(['companies'=>$companies, 'company_categories'=>$company_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_categories = CompanyCategory::all();
        return view('company.create')->with(['company_categories' => $company_categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $record = new Company;
        $record->category_id=$request->category_id;        
        $record->name=$request->name;        
        $record->place=$request->place;        
        $record->contact_person=$request->contact_person;        
        $record->email=$request->email;        
        $record->phones=$request->phones;        
        $record->fax=$request->fax;        
        $record->comments=$request->comments;        

        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η Εταιρία αποθηκεύτηκε επιτυχώς!');
        return redirect('/company');
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
        $company = Company::where("id", $id)->first();
        $company_categories = CompanyCategory::all();
        return view('company.edit')->with(['company'=>$company, 'company_categories'=>$company_categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $record = Company::where("id", $id)->first();
        $record->category_id=$request->category_id;        
        $record->name=$request->name;        
        $record->place=$request->place;        
        $record->contact_person=$request->contact_person;        
        $record->email=$request->email;        
        $record->phones=$request->phones;        
        $record->fax=$request->fax;        
        $record->comments=$request->comments; 
        
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η Εταιρία αποθηκεύτηκε επιτυχώς!');
        return redirect('/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Company::where("id", $id)->first();
        $record->delete();

        session()->flash('message', 'Η Εταιρία διαγράφηκε επιτυχώς!');
        return redirect('/company');
    }
}
