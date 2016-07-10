<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InstructionsRequest;
use App\Http\Requests;
use App\Instructions;
use App\Language;

class InstructionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructions = Instructions::select('instructions.*', 'languages.icon')->join('languages', 'instructions.lang', '=', 'languages.id')->where('is_valid',1)->orderBy('instructions.updated_at', 'desc')->get();
        $languages = Language::all()->where('is_valid', 1);     
        return view('instructions.index')->with(['instructions'=>$instructions, 'languages' => $languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all()->where('is_valid', 1);
        return view('instructions.create')->with(['languages'=>$languages]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstructionsRequest $request)
    {
        $record = new Instructions;
        $record->filepath = $request->filepath;
        $record->name = substr($record->filepath, strrpos($record->filepath, '/') + 1);
        $record->lang = $request->lang;
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Το αρχείο αποθηκεύτηκε επιτυχώς!');
        return redirect('/instructions');
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
        $instructions = Instructions::with('languages')->where(["lang" => $lang->id ])->get();        
        $languages = Language::all()->where('is_valid', 1);       

        return view('instructions.index')->with(['instructions'=>$instructions,                                               
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
        $instructions = Instructions::where("id", $id)->first();
        $languages = Language::all()->where('is_valid', 1);
        return view('instructions.edit')->with(['instructions'=>$instructions, 'languages'=>$languages]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstructionsRequest $request, $id)
    {
        $record = Instructions::where("id", $id)->first();
        $record->filepath = $request->filepath;
        $record->name = substr($record->filepath, strrpos($record->filepath, '/') + 1);
        $record->lang = $request->lang;
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Η Οδηγία αποθηκεύτηκε επιτυχώς!');
        return redirect('/instructions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Instructions::where("id", $id)->first();
        $record->delete();

        session()->flash('message', 'Η Οδηγία διαγράφηκε επιτυχώς!');
        return redirect('/instructions');
    }
}
