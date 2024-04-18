@extends('layouts.theme')

@section('content')
@php
    if(!isset($screening)){
        $screening = [];
    }
@endphp
    <h3 class="page-title">Screening | <small style="color: green">New Screening</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                    
                        <h4>Enter Screening Result</h4>
                    
                    
                </div>
                <div class="panel-body">
                    
                    <form method="POST" action="{{ route('addnewscreening') }}">
                        
                            <input type="hidden" name="id" value="{{$screening ? $screening->id : " "}}">
                        
                            @csrf                            
                                <div class="row form-row">
                                
                                    <div class="form-group col-md-2">
                                    <label for="visit_date">Visit Date</label>
                                    <input type="text" name="visit_date" id="visit_date" class="form-control date" placeholder="Visit Date" value="{{$screening ? $screening->visit_date:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name"  value="{{$screening ? $screening->first_name:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name"  value="{{$screening ? $screening->last_name:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="age">Age</label>
                                        <input type="number" name="age" id="age" class="form-control" placeholder="Age" value="{{$screening ? $screening->age:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="sex">Sex</label>
                                        <select name="sex" id="sex" class="form-control">
                                            <option value="{{$screening?$screening->sex:'Select'}}" selected>{{$screening ? $screening->sex:'Select'}}</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>                                  
                                    
                                </div>

                                <div class="row form-row">
                                
                                    <div class="form-group col-md-3">
                                        <label for="chestxray">Chest X-Ray Suggestive of TB</label>
                                        <select name="chestxray" id="chestxray" class="form-control">
                                            <option value="{{$screening?$screening->chestxray:'Select'}}" selected>{{$screening?$screening->chestxray:'Select'}}</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="last_name">Presumptive TB?</label>
                                        <select name="presumptive" id="presumptive" class="form-control">
                                            <option value="{{$screening?$screening->presumptive:'Select'}}" selected>{{$screening?$screening->presumptive:'Select'}}</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="result">Result</label>
                                        <input type="text" name="result" id="result" class="form-control" placeholder="result" value="{{$screening ? $screening->result:''}}">                                  
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="comments">Comments</label>
                                        <input type="text" name="comments" id="comments" class="form-control" placeholder="comments" value="{{$screening ? $screening->comments:''}}">                                  
                                    </div>
                                
                                    
                                </div>

                                <input type="submit" class="btn btn-primary" value="Save">

                    </form>
                </div>
            </div>
        
    </div>
@endsection