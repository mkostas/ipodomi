<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Http\Requests;
use App\Email;
use App\School;
use Illuminate\Contracts\Validation\Validator;
use DB;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::all()->sortBy('school_id')->sortBy('updated_at');       
        return view('emails/index')->with(['emails'=>$emails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();  
        return view('emails/create')->with(['schools'=>$schools]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailRequest $request)
    {
        $record = new Email;
        $record->school_id=$request->school_id;
        $record->email_from=$request->email_from;
        $record->email_to=$request->email_to;
        $record->subject=$request->subject;
        $record->content=$request->content;
        $record->comments=$request->comments;        

        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Το email αποθηκεύτηκε επιτυχώς!');
        return redirect('/email');
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
        $email = Email::where("id", $id)->first();
        $schools = School::all(); 
        return view('emails/edit')->with(['email'=>$email, 'schools'=>$schools]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmailRequest $request, $id)
    {
        $record = Email::where("id", $id)->first();
        $record->school_id=$request->school_id;
        $record->email_from=$request->email_from;
        $record->email_to=$request->email_to;
        $record->subject=$request->subject;
        $record->content=$request->content;
        $record->comments=$request->comments;  
        
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Το Email αποθηκεύτηκε επιτυχώς!');
        return redirect('/email');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Email::where("id", $id)->first();
        $record->delete();

        session()->flash('message', 'Το email διαγράφηκε επιτυχώς!');
        return redirect('/email');
    }
}
