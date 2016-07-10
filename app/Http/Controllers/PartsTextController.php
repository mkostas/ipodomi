<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PartsTextRequest;
use App\Http\Requests;
use App\PartsText;
use App\PartsCategories;
use App\Language;
use DB;

class PartsTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $parts_text = PartsText::select('parts_text.*')->where("part_category", $id)->orderBy('parts_text.updated_at', 'desc')->join('languages', 'parts_text.lang', '=', 'languages.id')->where('is_valid',1)->get();
        $part_category = PartsCategories::where("id", $id)->first();
        $part_parent_category = PartsCategories::where("id", $part_category->parent)->first();
        $languages = Language::all()->where('is_valid', 1);

        return view('partstext.index')->with(['parts_text'=>$parts_text,
                                                'part_category'=>$part_category,
                                                'part_parent_category'=>$part_parent_category,
                                                'languages'=>$languages,
                                                // 'part_top_category'=>$part_top_category,
                                                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $part_category = PartsCategories::where("id", $id)->first();
        $languages = Language::all()->where('is_valid', 1);
        
        return view('partstext.create')->with(['part_category'=>$part_category, 'languages'=>$languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartsTextRequest $request)
    {   

        $record = new PartsText;
        $record->part_category=$request->part_category;
        $record->content=$request->content;
        $record->lang=$request->lang;

        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Το κείμενο αποθηκεύτηκε επιτυχώς!');

        
        return redirect('parts_text/'.$record->part_category);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $language)
    {   
        $lang = Language::where("slag", $language)->first();
        $parts_text = PartsText::with('languages')->where(["part_category" => $id, "lang" => $lang->id ])->get();
        $part_category = PartsCategories::where("id", $id)->first();
        $part_parent_category = PartsCategories::where("id", $part_category->parent)->first();
        $languages = Language::all()->where('is_valid', 1);
        // $part_top_category = PartsCategories::where("id", $part_parent_category->parent)->first();        

        return view('partstext.index')->with(['parts_text'=>$parts_text,
                                                'part_category'=>$part_category,
                                                'part_parent_category'=>$part_parent_category,
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
        $parts_text = PartsText::where("id", $id)->first();
        $languages = Language::all()->where('is_valid', 1);
        // $part_category = PartsCategories::where("id", $id)->first();
        return view('partstext.edit')->with(['parts_text'=>$parts_text, 'languages'=>$languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartsTextRequest $request, $id)
    {
        $record = PartsText::where("id", $id)->first();
        $record->part_category=$request->part_category;
        $record->content=$request->content;
        $record->lang=$request->lang;
        
        // Create and redirect
        $record->save();
        $request->session()->flash('message', 'Το κείμενο αποθηκεύτηκε επιτυχώς!');
        
        return redirect('parts_text/'.$record->part_category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = PartsText::where("id", $id)->first();
        $record->delete();

        session()->flash('message', 'Το κείμενο διαγράφηκε επιτυχώς!');
        return redirect('parts_text/'.$record->part_category);
    }
}
