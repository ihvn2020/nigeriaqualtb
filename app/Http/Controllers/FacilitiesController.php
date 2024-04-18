<?php

namespace App\Http\Controllers;

use App\Models\facilities;
use Illuminate\Http\Request;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = facilities::all();

        return view('facilities', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new-facility');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          facilities::updateOrCreate(['id'=>$request->id],
          $request->all());
          $facilities = facilities::orderBy('facility_name','ASC')->get();
          return view('facilities')->with(['message'=>'New Facility Saved Successfully!','facilities'=>$facilities]);

    }

    public function editFacility($id){
        $facility = facilities::where('id',$id)->first();
        return view('new-facility', compact('facility'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function show(facilities $facilities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function edit(facilities $facilities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, facilities $facilities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function destroy(facilities $facilities)
    {
        //
    }
}
