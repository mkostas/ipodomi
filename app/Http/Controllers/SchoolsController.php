<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SchoolRequest;
use App\Http\Requests;
use App\School;
use App\Email;
use App\LettersOfIntent;
use App\ProgramOfActivities;
use App\Country;
use App\Instructions;
use App\SubmittedApplication;
use App\CompletedApplication;
use Illuminate\Contracts\Validation\Validator;

class SchoolsController extends Controller
{
	
    public function index() {
    	$schools = School::all();    	
    	return view('schools/index')->with(['schools'=>$schools]);
    }

    public function create() {

    	$countries = Country::all()->where('is_valid',1);
    	return view('schools/create')->with(['countries'=>$countries]);    	
    }

    public function store(SchoolRequest $request) {

    	$record = new School;
		$record->country_id=$request->country_id;
		$record->city=$request->city;
		$record->name=$request->name;
		$record->contact_person=$request->contact_person;
		$record->email=$request->email;
		$record->phones=$request->phones;
		$record->fax=$request->fax;
		$record->cancelled=$request->cancelled;
		$record->not_submitted=$request->not_submitted;
		$record->sent_section=$request->sent_section;

		// Create and redirect
		$record->save();
		$request->session()->flash('message', 'Το σχολείο αποθηκεύτηκε επιτυχώς!');
    	return redirect('/');
    }

    public function edit($id) {

		$school = School::where("id", $id)->first();
		$countries = Country::all()->where('is_valid',1);
    	return view('schools/edit')->with(['school'=>$school, 'countries'=>$countries]);
    }

    public function update(SchoolRequest $request, $id) {

    	$record = School::where("id", $id)->first();
		$record->country_id=$request->country_id;
		$record->city=$request->city;
		$record->name=$request->name;
		$record->contact_person=$request->contact_person;
		$record->email=$request->email;
		$record->phones=$request->phones;
		$record->fax=$request->fax;
		$record->cancelled=$request->cancelled;
		$record->not_submitted=$request->not_submitted;
		$record->sent_section=$request->sent_section;
		
		// Create and redirect
		$record->save();
		$request->session()->flash('message', 'Το σχολείο αποθηκεύτηκε επιτυχώς!');
    	return redirect('/');
    }

    public function delete($id)
	{	
		$record_school = School::where("id", $id)->first();
		$record_school->delete();

		$record_email = Email::where("school_id", $id)->get();
		if ($record_email->count()) {
			Email::where("school_id", $id)->delete();
		}

		$record_letter_of_intent = LettersOfIntent::where("school_id", $id)->get();
		if ($record_letter_of_intent->count()) {
			LettersOfIntent::where("school_id", $id)->delete();
		}

		$record_program_of_activities = ProgramOfActivities::where("school", $id)->get();
		if ($record_program_of_activities->count()) {
			ProgramOfActivities::where("school", $id)->delete();
		}


		$record_instructions = Instructions::where("school", $id)->get();
		if ($record_instructions->count()) {
			Instructions::where("school", $id)->delete();
		}

		$record_completed_applications = CompletedApplication::where("school", $id)->get();
		if ($record_completed_applications->count()) {
			CompletedApplication::where("school", $id)->delete();
		}

		$record_submitted_applications = SubmittedApplication::where("school", $id)->get();
		if ($record_submitted_applications->count()) {
			SubmittedApplication::where("school", $id)->delete();
		}

		session()->flash('message', 'Το σχολείο διαγράφηκε επιτυχώς!');
		return redirect('/');
	}

}
