<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProgramOfActivitiesRequest;
use App\Http\Requests;
use App\ProgramOfActivities;
use App\Language;
use App\School;

class ProgramOfActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program_of_activities = ProgramOfActivities::select('programs_of_activities.*', 'languages.icon')->join('languages', 'programs_of_activities.lang', '=', 'languages.id')->where('is_valid',1)->orderBy('programs_of_activities.updated_at', 'desc')->get();
        $languages = Language::all()->where('is_valid', 1);        
        return view('programofactivities.index')->with(['program_of_activities'=>$program_of_activities, 'languages'=>$languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program_of_activities = ProgramOfActivities::all(); 
        $languages = Language::all()->where('is_valid', 1); 
        $schools = School::all();  
        return view('programofactivities.create')->with(['program_of_activities'=>$program_of_activities, 'languages'=>$languages, 'schools'=>$schools]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramOfActivitiesRequest $request)
    {
        $record = new ProgramOfActivities;
        $record->school_id=$request->school_id;
        $record->content=$request->content;
        $record->comments=$request->comments;
        $record->lang=$request->lang;
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Το πρόγραμμα αποθηκεύτηκε επιτυχώς!');
        return redirect('/program_of_activities');
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
        $program_of_activities = ProgramOfActivities::with('languages')->where(["lang" => $lang->id ])->get();        
        $languages = Language::all()->where('is_valid', 1);
        // $part_top_category = PartsCategories::where("id", $part_parent_category->parent)->first();        

        return view('programofactivities.index')->with(['program_of_activities'=>$program_of_activities,                                               
                                                'languages'=>$languages,
                                                // 'part_top_category'=>$part_top_category,
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
        $program_of_activities = ProgramOfActivities::where("id", $id)->first();
        $languages = Language::all()->where('is_valid', 1);
        $schools = School::all(); 
        return view('programofactivities.edit')->with(['program_of_activities'=>$program_of_activities, 'languages'=>$languages, 'schools'=>$schools]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramOfActivitiesRequest $request, $id)
    {
        $record = ProgramOfActivities::where("id", $id)->first();
        $record->school_id=$request->school_id;
        $record->content=$request->content;
        $record->comments=$request->comments;
        $record->lang=$request->lang;
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Το πρόγραμμα αποθηκεύτηκε επιτυχώς!');
        return redirect('/program_of_activities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = ProgramOfActivities::where("id", $id)->first();
        $record->delete();

        session()->flash('message', 'Το πρόγραμμα διαγράφηκε επιτυχώς!');
        return redirect('/program_of_activities');
    }
}
