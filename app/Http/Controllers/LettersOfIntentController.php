<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LettersOfIntentRequest;
use App\Http\Requests;
use App\LettersOfIntent;
use App\Language;
use App\School;

// use Illuminate\Contracts\Validation\Validator;


class LettersOfIntentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letters_of_intent = LettersOfIntent::select('letters_of_intent.*', 'languages.icon')->join('languages', 'letters_of_intent.lang', '=', 'languages.id')->where('is_valid',1)->orderBy('letters_of_intent.updated_at', 'desc')->get();
        $languages = Language::all()->where('is_valid', 1);        
        return view('lettersofintent.index')->with(['letters_of_intent'=>$letters_of_intent, 'languages'=>$languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $letters_of_intent = LettersOfIntent::all(); 
        $languages = Language::all()->where('is_valid', 1); 
        $schools = School::all();  
        return view('lettersofintent.create')->with(['letters_of_intent'=>$letters_of_intent, 'languages'=>$languages, 'schools'=>$schools]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LettersOfIntentRequest $request)
    {
        $record = new LettersOfIntent;
        $record->school_id=$request->school_id;
        $record->content=$request->content;
        $record->comments=$request->comments;
        $record->lang=$request->lang;
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η επιστολή αποθηκεύτηκε επιτυχώς!');
        return redirect('/letters_of_intent');
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
        $letters_of_intent = LettersOfIntent::with('languages')->where(["lang" => $lang->id ])->get();        
        $languages = Language::all()->where('is_valid', 1);
        // $part_top_category = PartsCategories::where("id", $part_parent_category->parent)->first();        

        return view('lettersofintent.index')->with(['letters_of_intent'=>$letters_of_intent,                                               
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
        $letters_of_intent = LettersOfIntent::where("id", $id)->first();
        $languages = Language::all()->where('is_valid', 1);
        $schools = School::all(); 
        return view('lettersofintent.edit')->with(['letters_of_intent'=>$letters_of_intent, 'languages'=>$languages, 'schools'=>$schools]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LettersOfIntentRequest $request, $id)
    {
        $record = LettersOfIntent::where("id", $id)->first();
        $record->school_id=$request->school_id;
        $record->content=$request->content;
        $record->comments=$request->comments;
        $record->lang=$request->lang;
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η επιστολή αποθηκεύτηκε επιτυχώς!');
        return redirect('/letters_of_intent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = LettersOfIntent::where("id", $id)->first();
        $record->delete();

        session()->flash('message', 'Η επιστολή διαγράφηκε επιτυχώς!');
        return redirect('/letters_of_intent');
    }
}
