<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyCategoryRequest;
use App\Http\Requests;
use App\CompanyCategory;
use App\Company;

class CompanyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_categories = CompanyCategory::all();       
        return view('companycategory/index')->with(['company_categories'=>$company_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companycategory/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyCategoryRequest $request)
    {
        $record = new CompanyCategory;
        $record->type=$request->type;        

        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η Κατηγορία αποθηκεύτηκε επιτυχώς!');
        return redirect('/company_category');
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
        $company_category = CompanyCategory::where("id", $id)->first();
        return view('companycategory/edit')->with(['company_category'=>$company_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyCategoryRequest $request, $id)
    {
        $record = CompanyCategory::where("id", $id)->first();
        $record->type=$request->type; 
        
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η Κατηγορία αποθηκεύτηκε επιτυχώς!');
        return redirect('/company_category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = CompanyCategory::where("id", $id)->first();
        $record->delete();
        $record = Company::where("category_id", $id)->first();
        $record->delete();

        session()->flash('message', 'Η Κατηγορία διαγράφηκε επιτυχώς!');
        return redirect('/company_category');
    }
}
