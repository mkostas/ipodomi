<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyCategoryRequest;
use App\Http\Requests;
use App\CompanyCategory;
use App\Company;
use App\ProgramOfActivities;
use App\Instructions;
use App\SubmittedApplication;
use App\CompletedApplication;

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
        $record_company_category = CompanyCategory::where("id", $id)->first();
        $record_company_category->delete();

        $record_company = Company::where("category_id", $id)->get();
        if ($record_company->count()) {
            Company::where("category_id", $id)->delete();
        }

        $record_program_of_activities = ProgramOfActivities::where("company_category", $id)->get();
        if ($record_program_of_activities->count()) {
            ProgramOfActivities::where("company_category", $id)->delete();
        }


        $record_instructions = Instructions::where("company_category", $id)->get();
        if ($record_instructions->count()) {
            Instructions::where("company_category", $id)->delete();
        }

        $record_completed_applications = CompletedApplication::where("company_category", $id)->get();
        if ($record_completed_applications->count()) {
            CompletedApplication::where("company_category", $id)->delete();
        }

        $record_submitted_applications = SubmittedApplication::where("company_category", $id)->get();
        if ($record_submitted_applications->count()) {
            SubmittedApplication::where("company_category", $id)->delete();
        }

        session()->flash('message', 'Η Κατηγορία διαγράφηκε επιτυχώς!');
        return redirect('/company_category');
    }
}
