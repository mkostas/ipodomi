<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LanguageRequest;
use App\Http\Requests;
use App\Language;
use App\PartsText;
use App\Instructions;
use App\LettersOfIntent;
use App\ProgramOfActivities;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();       
        return view('languages/index')->with(['languages'=>$languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $record = new Language;
        $record->name=$request->name;
        $record->is_valid=$request->is_valid;
        $record->icon=$request->icon;
        $record->slag=$request->slag;
        

        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η γλώσσα αποθηκεύτηκε επιτυχώς!');
        return redirect('/language');
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
        $language = Language::where("id", $id)->first();
        return view('languages/edit')->with(['language'=>$language]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, $id)
    {
        $record = Language::where("id", $id)->first();
        $record->name=$request->name;
        $record->is_valid=$request->is_valid;
        $record->icon=$request->icon;
        $record->slag=$request->slag;
        
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η γλώσσα αποθηκεύτηκε επιτυχώς!');
        return redirect('/language');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Language::where("id", $id)->first();
        $record->delete();

        $record_parts_text = PartsText::where("lang", $id)->get();
        if ($record_parts_text->count()) {
            PartsText::where("lang", $id)->delete();
        }

        $record_letters_of_intent = LettersOfIntent::where("lang", $id)->get();
        if ($record_letters_of_intent->count()) {
            LettersOfIntent::where("lang", $id)->delete();
        }

        $record_programms_of_activities = ProgramOfActivities::where("lang", $id)->get();
        if ($record_programms_of_activities->count()) {
            ProgramOfActivities::where("lang", $id)->delete();
        }

        $record_instructions = Instructions::where("lang", $id)->get();
        if ($record_instructions->count()) {
            Instructions::where("lang", $id)->delete();
        }
        
        session()->flash('message', 'Η γλώσσα διαγράφηκε επιτυχώς!');
        return redirect('/language');
    }
}
