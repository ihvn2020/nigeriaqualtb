<?php

namespace App\Http\Controllers;

use App\Models\screening;
use App\Models\dscaptures;
use App\Models\facilities;
use App\Models\aggreport;

use Illuminate\Http\Request;

class ScreeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $screenings = screening::with('dscapture')->get();
        
        return view('screenings', compact('screenings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newscreening');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        screening::updateOrCreate(['id'=>$request->id],
          $request->all());
          $screenings = screening::orderBy('visit_date','DESC')->get();
          return view('screenings')->with(['message'=>'New Screening Saved Successfully!','screenings'=>$screenings]);

    }

    public function editScreening($id){
        $screening = screening::where('id',$id)->first();
        return view('newscreening', compact('screening'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\screening  $screening
     * @return \Illuminate\Http\Response
     */
    public function show(screening $screening)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\screening  $screening
     * @return \Illuminate\Http\Response
     */
    public function edit(screening $screening)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\screening  $screening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, screening $screening)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\screening  $screening
     * @return \Illuminate\Http\Response
     */
    public function destroy(screening $screening)
    {
        //
    }

    public function genericDelete($id,$table)
    {
        if($table=="aggreport"){
            aggreport::findOrFail($id)->delete();      
        }
        if($table=="screening"){
            screening::findOrFail($id)->delete();      
        }
        if($table=="dscaptures"){
            dscaptures::findOrFail($id)->delete();      
        }

        if($table=="facilities"){
            facilities::findOrFail($id)->delete();      
        }
        $message = 'The '.$table.' record has been deleted!';      
        return redirect()->back()->with(['message'=>$message]);
    }
}
