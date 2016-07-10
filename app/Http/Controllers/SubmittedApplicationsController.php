<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubmittedApplicationRequest;
use App\Http\Requests;
use App\SubmittedApplication;
use App\Language;

class SubmittedApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $submitted_applications = SubmittedApplication::select('submitted_applications.*', 'languages.icon')->join('languages', 'submitted_applications.lang', '=', 'languages.id')->where('is_valid',1)->orderBy('submitted_applications.updated_at', 'desc')->get();
        $languages = Language::all()->where('is_valid', 1);     
        return view('submittedapplications.index')->with(['submitted_applications'=>$submitted_applications, 'languages' => $languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $languages = Language::all()->where('is_valid', 1);
        return view('submittedapplications.create')->with(['languages'=>$languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubmittedApplicationRequest $request)
    {
        $record = new SubmittedApplication;
        $record->filepath = $request->filepath;
        $record->name = substr($record->filepath, strrpos($record->filepath, '/') + 1);
        $record->lang = $request->lang;
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η Υποβληθείσα Αίτηση αποθηκεύτηκε επιτυχώς!');
        return redirect('/submitted_applications');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($language)
    {
        $lang = Language::where("slag", $language)->first();
        $submitted_applications = SubmittedApplication::with('languages')->where(["lang" => $lang->id ])->get();        
        $languages = Language::all()->where('is_valid', 1);       

        return view('submittedapplications.index')->with(['submitted_applications'=>$submitted_applications,                                               
                                                'languages'=>$languages,
                                                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submitted_applications = SubmittedApplication::where("id", $id)->first();
        $languages = Language::all()->where('is_valid', 1);
        return view('submittedapplications.edit')->with(['submitted_applications'=>$submitted_applications, 'languages'=>$languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubmittedApplicationRequest $request, $id)
    {
        $record = SubmittedApplication::where("id", $id)->first();
        $record->filepath = $request->filepath;
        $record->name = substr($record->filepath, strrpos($record->filepath, '/') + 1);
        $record->lang = $request->lang;
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η Υποβληθείσα Αίτηση αποθηκεύτηκε επιτυχώς!');
        return redirect('/submitted_applications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = SubmittedApplication::where("id", $id)->first();
        $record->delete();

        session()->flash('message', 'Το Υποβληθείσα Αίτηση διαγράφηκε επιτυχώς!');
        return redirect('/submitted_applications');
    }
}
