<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CompletedApplicationRequest;
use App\Http\Requests;
use App\CompletedApplication;
use App\Language;


class CompletedApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $completed_applications = CompletedApplication::select('completed_applications.*', 'languages.icon')->join('languages', 'completed_applications.lang', '=', 'languages.id')->where('is_valid',1)->orderBy('completed_applications.updated_at', 'desc')->get();
        $languages = Language::all()->where('is_valid', 1);     
        return view('completedapplications.index')->with(['completed_applications'=>$completed_applications, 'languages' => $languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $languages = Language::all()->where('is_valid', 1);
        return view('completedapplications.create')->with(['languages'=>$languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompletedApplicationRequest $request)
    {
        $record = new CompletedApplication;
        $record->filepath = $request->filepath;
        $record->name = substr($record->filepath, strrpos($record->filepath, '/') + 1);
        $record->lang = $request->lang;
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η Ολοκληρωμένη Αίτηση αποθηκεύτηκε επιτυχώς!');
        return redirect('/completed_applications');
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
        $completed_applications = CompletedApplication::with('languages')->where(["lang" => $lang->id ])->get();        
        $languages = Language::all()->where('is_valid', 1);       

        return view('completedapplications.index')->with(['completed_applications'=>$completed_applications,                                               
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
        $completed_applications = CompletedApplication::where("id", $id)->first();
        $languages = Language::all()->where('is_valid', 1);
        return view('completedapplications.edit')->with(['completed_applications'=>$completed_applications, 'languages'=>$languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompletedApplicationRequest $request, $id)
    {
        $record = CompletedApplication::where("id", $id)->first();
        $record->filepath = $request->filepath;
        $record->name = substr($record->filepath, strrpos($record->filepath, '/') + 1);
        $record->lang = $request->lang;
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η Ολοκληρωμένη Αίτηση αποθηκεύτηκε επιτυχώς!');
        return redirect('/completed_applications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = CompletedApplication::where("id", $id)->first();
        $record->delete();

        session()->flash('message', 'Το αρχείο διαγράφηκε επιτυχώς!');
        return redirect('/completed_applications');
    }
}
