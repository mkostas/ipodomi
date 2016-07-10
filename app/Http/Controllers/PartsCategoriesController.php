<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PartsCategoriesRequest;
use App\PartsCategories;
use DB;

class PartsCategoriesController extends Controller
{
    public function index() {

    	$parts_categories = PartsCategories::with('children')->where('parent', 0)->orderBy('name', 'asc')->get();
    	return view('partscategories.index')->with(['parts_categories'=>$parts_categories]);
    }

    public function create() {

    	$parts_categories = PartsCategories::with('children')->where('parent', 0)->orderBy('name', 'asc')->get();
        return view('partscategories.create')->with(['parts_categories'=>$parts_categories]);    	
    }

    public function store(PartsCategoriesRequest $request) {

    	$record = new PartsCategories;
		$record->parent=$request->parent;
		$record->name=$request->name;

		// Create and redirect
		$record->save();
		$request->session()->flash('message', 'Το Τμήμα Αίτησης αποθηκεύτηκε επιτυχώς!');
    	return redirect('/parts_categories');
    }

    public function edit($id) {


		$part_category = PartsCategories::where("id", $id)->first();
		$parts_categories = PartsCategories::with('children')->where('parent', 0)->orderBy('name', 'asc')->get();
    	return view('partscategories.edit')->with(['part_category'=>$part_category, 'parts_categories'=>$parts_categories ]);
    }

    public function update(PartsCategoriesRequest $request, $id) {

    	$record = PartsCategories::where("id", $id)->first();
		$record->parent=$request->parent;
		$record->name=$request->name;
		
		// Create and redirect
		$record->save();
		$request->session()->flash('message', 'Το Τμήμα Αίτησης αποθηκεύτηκε επιτυχώς!');
    	return redirect('/parts_categories');
    }

    public function destroy($id)
	{	
		// First delete childs - (This is collection)
		PartsCategories::with('children')->where('parent', $id)->orderBy('name', 'asc')->delete();
		// Then delete Main category
		$record = PartsCategories::where("id", $id)->first();
		$record->delete();
	    
		session()->flash('message', 'Το Τμήμα Αίτησης διαγράφηκε επιτυχώς!');
		return redirect('/parts_categories');
	}
}
