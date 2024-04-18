@extends('layouts.theme')

@section('content')
@php
    if(!isset($facility)){
        $facility = [];
    }
@endphp
    <h3 class="page-title">Facility | <small style="color: green">New Facility</small></h3>
    <div class="row">
            <div class="panel">
               
                <div class="panel-body">
                    
                    <form method="POST" action="{{ route('addfacility') }}">
                        
                            <input type="hidden" name="id" value="{{$facility ? $facility->id : " "}}">
                        
                            @csrf                            
                                <div class="row form-row">
                                
                                    <div class="form-group col-md-2">
                                    <label for="facility_code">Facility Code</label>
                                    <input type="text" name="facility_code" id="facility_code" class="form-control" placeholder="Facility Code" value="{{$facility ? $facility->facility_code:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="facility_name">Facility Name</label>
                                        <input type="text" name="facility_name" id="facility_name" class="form-control" placeholder="Facility Name"  value="{{$facility ? $facility->facility_name:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="facility_ip">Facility IP</label>
                                        <input type="text" name="facility_ip" id="facility_ip" class="form-control" placeholder="Facility's IP"  value="{{$facility ? $facility->facility_ip:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="facility_type">Facility Type</label>
                                        <select name="facility_type" id="facility_type" class="form-control">
                                            <option value="{{$facility?$facility->sex:'Select'}}" selected>{{$facility ? $facility->facility_type:'Select'}}</option>
                                            <option value="Type 1">Type 1</option>
                                            <option value="Type 2">Type 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="tertiary_type">Tertiary Type</label>
                                        <select name="tertiary_type" id="tertiary_type" class="form-control">
                                            <option value="{{$facility?$facility->tertiary_type:'Select'}}" selected>{{$facility ? $facility->tertiary_type:'Select'}}</option>
                                            <option value="T Type 1">T Type 1</option>
                                            <option value="T Type 2">T Type 2</option>
                                        </select>
                                    </div>                                  
                                    
                                </div>

                                <div class="row form-row">
                                
                                    <div class="form-group col-md-3">
                                        <label for="ownership">Ownership</label>
                                        <input type="text" name="ownership" id="ownership" class="form-control" placeholder="Ownership"  value="{{$facility ? $facility->ownership:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="state">State</label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="{{$facility?$facility->state:'Select'}}" selected>{{$facility?$facility->state:'Select'}}</option>
                                            <option value="FCT">FCT</option>
                                            <option value="Bauchi">Bauchi</option>
                                            <option value="Taraba">Taraba</option>
                                            <option value="Kano">Kano</option>
                                            <option value="Kaduna">Kaduna</option>
                                            <option value="Plateau">Plateau</option>
                                            <option value="Benue">Benue</option>
                                            <option value="Rivers">Rivers</option>
                                            <option value="Cross Rivers">Cross Rivers</option>
                                            <option value="Ebonyi">Ebonyi</option>
                                            <option value="Imo">Imo</option>
                                            <option value="Oyo">Oyo</option>
                                            <option value="Ogun">Ogun</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ward_name">Ward Name</label>
                                        <input type="text" name="ward_name" id="ward_name" class="form-control" placeholder="ward_name" value="{{$facility ? $facility->ward_name:''}}">                                  
                                    </div>

                                </div>

                                <input type="submit" class="btn btn-primary" value="Save">

                    </form>
                </div>
            </div>
        
    </div>
@endsection