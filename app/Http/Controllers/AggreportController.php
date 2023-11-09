<?php

namespace App\Http\Controllers;

use App\Models\aggreport;
use App\Models\facilities;
use Illuminate\Http\Request;
use Auth;

class AggreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if(Auth()->user()->role=="User"){
            $userfacilityid = facilities::where('facility_name',Auth()->user()->facility)->first()->id;
            $aggreports = aggreport::select('id','title','facility','from','to','created_at','entered_by','status')->where('entered_by',Auth()->user()->id)->orWhere('facility',$userfacilityid)->orderBy('id','desc')->get();
        }elseif(Auth()->user()->role=="Admin"){
            $states = explode(',',Auth()->user()->state);
            $aggreports = aggreport::select('id','title','facility','from','to','created_at','entered_by','status')->whereIn('state',$states)->orderBy('id','desc')->get();
        }else{
            $aggreports = aggreport::select('id','title','facility','from','to','created_at','entered_by','status')->orderBy('id','desc')->get();
        }
        return view('aggreports', compact('aggreports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aggreport  $aggreport
     * @return \Illuminate\Http\Response
     */
    public function show(aggreport $aggreport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aggreport  $aggreport
     * @return \Illuminate\Http\Response
     */
    public function edit(aggreport $aggreport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aggreport  $aggreport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aggreport $aggreport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aggreport  $aggreport
     * @return \Illuminate\Http\Response
     */
    public function destroy(aggreport $aggreport)
    {
        //
    }
}
