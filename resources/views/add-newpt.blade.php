@extends('layouts.theme')

@section('content')
    <h3 class="page-title">Help | <small style="color: green">Need Help</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                    
                        <h4>Capture DS Record</h4>
                    
                    
                </div>
                <div class="panel-body">
                    @php
                        if(!isset($dscapture)){
                            $dscapture= \App\Models\dscaptures::where('id',1)->first();
                            if($dscapture->id==1){
                                $dscapture->id = 0;
                            }
                        }
                    @endphp
                    <form method="POST" action="{{ route('addnewds') }}">
                        
                            <input type="hidden" name="id" value="{{$dscapture->id}}">
                        
                        @csrf
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Patient <br>Demographics</a></li>
                            <li><a href="#tab2" data-toggle="tab">Patient <br>Classification</a></li>
                            <li><a href="#tab3" data-toggle="tab">Baseline <br>Parameters</a></li>
                            <li><a href="#tab4" data-toggle="tab">TB/HIV</a></li>
                            <li><a href="#tab5" data-toggle="tab">Patient Treatment <br>Adherence</a></li>
                            <li><a href="#tab6" data-toggle="tab">Patient <br>Monitoring</a></li>
                            <li><a href="#tab7" data-toggle="tab">Patient Status</a></li>
                            <li><a href="#tab8" data-toggle="tab">Contact Tracing</a></li>
                            <li><a href="#tab9" data-toggle="tab">Laboratory <br>Information</a></li>
                            <li><a href="#tab10" data-toggle="tab">Documentation</a></li>
                        </ul>
                        <div class="tab-content">
                            
                            <div class="tab-pane active" id="tab1">
                                <div class="row form-row">
                                
                                    <div class="form-group col-md-2">
                                    <label for="patient_id">Patient ID</label>
                                    <input type="text" name="patient_id" id="patient_id" class="form-control" placeholder="Patient ID" value="{{$dscapture ? $dscapture->patient_id:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="lga_tb_number">LGA TB Number</label>
                                        <input type="text" name="lga_tb_number" id="lga_tb_number" class="form-control" placeholder="LGA TB Number"  value="{{$dscapture ? $dscapture->lga_tb_number:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="hospital_number">Hospital Number</label>
                                        <input type="text" name="hospital_number" id="hospital_number" class="form-control" placeholder="Hospital Number" value="{{$dscapture ? $dscapture->hospital_number:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label for="rnl_serial_number">RNL Serial No</label>
                                    <input type="text" name="rnl_serial_number" id="rnl_serial_number" class="form-control" placeholder="Hospital Number" value="{{$dscapture ? $dscapture->rnl_serial_number:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Gender</label>
                                        <div>
                                        <input type="radio" id="male"
                                        name="gender" value="Male" {{$dscapture->gender=="Male" ? 'checked':''}}>
                                        <span for="male">Male</span>
                                    
                                        <input type="radio" id="female"  {{$dscapture->gender=="Female" ? 'checked':''}}
                                        name="gender" value="Female">
                                        <span for="female">Female</span>
                                        </div>

                                    </div>
                                    
                                </div>

                                <div class="row form-row">
                                
                                    <div class="form-group col-md-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="{{$dscapture ? $dscapture->first_name:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="{{$dscapture ? $dscapture->last_name:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="age">Age</label>
                                        <input type="number" name="age" id="age" class="form-control" placeholder="Age" value="{{$dscapture ? $dscapture->age:''}}">                                  
                                    </div>
                                
                                    <div class="form-group col-md-4">
                                        <label>Hospital Admission During Review Period</label>
                                        <div>
                                        <input type="radio" id="Yes" {{$dscapture->hospital_admission=='Yes' ? 'checked':''}}
                                        name="hospital_admission" value="Yes">
                                        <span for="Yes">Yes</span>
                                    
                                        <input type="radio" id="No"  {{$dscapture->hospital_admission=='No' ? 'checked':''}}
                                        name="hospital_admission" value="No">
                                        <span for="No">No</span>
                                        </div>

                                    </div>
                                    
                                </div>

                                
                                
                                <div class="row form-row">
                                
                                    <div class="form-group col-md-3">
                                    <label for="patient_address">Patient Address</label>
                                    <input type="text" name="patient_address" id="patient_address" class="form-control" placeholder="Patient Address" value="{{$dscapture ? $dscapture->patient_address:''}}">                                  
                                    </div>
                                   
                                    <div class="form-group col-md-3">
                                        <label for="patient_contact">Name of Patient Contact</label>
                                        <input type="text" name="patient_contact" id="patient_contact" class="form-control" placeholder="Contact Person" value="{{$dscapture ? $dscapture->patient_contact:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label for="patient_contact_number">Patient Contact Phone No</label>
                                    <input type="text" name="patient_contact_number" id="patient_contact_number" class="form-control" placeholder="Contact Person Phone Number" value="{{$dscapture ? $dscapture->patient_contact_number:''}}">                                  
                                    </div>
                                
                                    
                                </div>

                                <a class="btn btn-primary btnNext" >Next</a>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <div class="row form-row">
                                
                                    
                                    
                                
                                    <div class="form-group col-md-12">
                                        <label>Based on History of Previous Treatment</label>
                                        <div>
                                        <input type="radio" id="new_case"  {{$dscapture->history_previous_treatment=='New Case' ? 'checked':''}} 
                                        name="history_previous_treatment" value="New Case">
                                        <span for="new_case">New Case</span>
                                    
                                        <input type="radio" id="Married"  {{$dscapture->history_previous_treatment=='Treatment after Loss to Followup' ? 'checked':''}} 
                                        name="history_previous_treatment" value="Treatment after Loss to Followup">
                                        <span for="Married">Treatment After Loss to Followup</span>

                                        <input type="radio" id="Seperated"  {{$dscapture->history_previous_treatment=='Treatment After Failure' ? 'checked':''}} 
                                        name="history_previous_treatment" value="Treatment After Failure">
                                        <span for="Seperated">Treatment After Failure</span>

                                        <input type="radio" id="relapse"  {{$dscapture->history_previous_treatment=='Relapse' ? 'checked':''}} 
                                        name="history_previous_treatment" value="Relapse">
                                        <span for="relapse">Relapse</span>

                                        <input type="radio" id="other_previous"  {{$dscapture->history_previous_treatment=='Other Previously Treated' ? 'checked':''}} 
                                        name="history_previous_treatment" value="Other Previously Treated">
                                        <span for="other_previous">Other Previously Treated</span>

                                        <input type="radio" id="transferred_in"  {{$dscapture->history_previous_treatment=='Transferred In' ? 'checked':''}} 
                                        name="history_previous_treatment" value="Transferred In">
                                        <span for="transferred_in">Transferred In</span>

                                        <input type="radio" id="unknown_previous"  {{$dscapture->history_previous_treatment=='Patient With Unknown Previous TB Treatment History' ? 'checked':''}} 
                                        name="history_previous_treatment" value="Patient With Unknown Previous TB Treatment History" checked>
                                        <span for="unknown_previous">Patient With Unknown Previous TB Treatment History</span>
                                        </div>

                                    </div>

                                    
                                    
                                </div>

                                <div class="row form-row">
                                
                                    <div class="form-group col-md-6">
                                        <label>Based on Anatomical Site</label>
                                        <div>
                                        <input type="radio" id="pulmonary" {{$dscapture->anatomical_site=='Pulmonary' ? 'checked':''}} 
                                        name="anatomical_site" value="Pulmonary">
                                        <span for="pulmonary">Pulmonary</span>
                                    
                                        <input type="radio" id="extra_pulmonary" {{$dscapture->anatomical_site=='Extra Pulmonary' ? 'checked':''}} 
                                        name="anatomical_site" value="Extra Pulmonary">
                                        <span for="extra_pulmonary">Extra Pulmonary</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Based on Bacteriological Result</label>
                                        <div>
                                        <input type="radio" id="smear_positive" {{$dscapture->bacteriological_result=='Smear Positive' ? 'checked':''}} 
                                        name="bacteriological_result" value="Smear Positive">
                                        <span for="smear_positive">Smear Positive</span>
                                    
                                        <input type="radio" id="smear_negative" {{$dscapture->bacteriological_result=='Smear Negative' ? 'checked':''}} 
                                        name="bacteriological_result" value="Smear Negative">
                                        <span for="smear_negative">Smear Negative</span>                                      
                                        </div>

                                    </div>


                                    
                                    
                                </div>

                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>
                            <div class="tab-pane" id="tab3">

                                <div class="row form-row">
                                
                                    
                                    
                                
                                    <div class="form-group col-md-12">
                                        <label>Was the Child a Presumptive TB Case</label>
                                        <div>
                                        <input type="radio" id="child_presumptive_tb_yes" {{$dscapture->child_presumptive_tb=='Yes' ? 'checked':''}} 
                                        name="child_presumptive_tb" value="Yes">
                                        <span for="child_presumptive_tb_yes">Yes</span>
                                    
                                        <input type="radio" id="child_presumptive_tb_no" {{$dscapture->child_presumptive_tb=='No' ? 'checked':''}} 
                                        name="child_presumptive_tb" value="No">
                                        <span for="child_presumptive_tb_no">No</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="ptbweight">Weight</label>
                                        <div>
                                        
                                        <input type="text" id="ptbweight"
                                        name="ptbweight"  value="{{$dscapture ? $dscapture->ptbweight:''}}">
                                                                                
                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="weight_date">If Yes,  Test Done (dd/mm/yyyy)</label>
                                        <div>
                                        
                                        <input type="date" id="weight_date"
                                        name="weight_date"  value="{{$dscapture ? $dscapture->weight_date:''}}">
                                                                                
                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="historical_finding">Historical Finding in Child</label>
                                        <div>
                                        
                                        <input type="text" id="historical_finding"
                                        name="historical_finding"  value="{{$dscapture ? $dscapture->historical_finding:''}}">
                                                                                
                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="physical_finding">Physical Finding</label>
                                        <div>
                                        
                                        <input type="text" id="physical_finding"
                                        name="ptbweight"  value="{{$dscapture ? $dscapture->physical_finding:''}}">
                                                                                
                                        </div>

                                    </div>

                                    


                                    
                                    
                                </div>
                                

                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>

                            <div class="tab-pane" id="tab4">
                               

                                <div class="row form-row">
                                
                                    <div class="form-group col-md-12">
                                    <label>Are all Columns in the TB Treatment Register Completely Filled?</label>
                                        <div>
                                        <input type="radio" id="tb_register_filled_yes" {{$drcapture->tb_register_filled=='Yes' ? 'checked':''}} 
                                        name="tb_register_filled" value="Yes">
                                        <span for="tb_register_filled_yes">Yes</span>
                                    
                                        <input type="radio" id="tb_register_filled_no" {{$drcapture->tb_register_filled=='No' ? 'checked':''}} 
                                        name="tb_register_filled" value="No">
                                        <span for="tb_register_filled_no">No</span>                                      
                                        </div>                                  
                                    </div>
                                    
                                </div>

                                <div class="row form-row">
                                
                                    <div class="form-group col-md-12">
                                    <label>Are all Columns in the TB Treatment Card Completely Filled?</label>
                                        <div>
                                        <input type="radio" id="tb_card_filled_yes" {{$drcapture->tb_card_filled=='Yes' ? 'checked':''}} 
                                        name="tb_card_filled" value="Yes">
                                        <span for="tb_card_filled_yes">Yes</span>
                                    
                                        <input type="radio" id="tb_card_filled_no" {{$drcapture->tb_card_filled=='No' ? 'checked':''}} 
                                        name="tb_card_filled" value="No">
                                        <span for="tb_card_filled_no">No</span>                                      
                                        </div>                                  
                                    </div>
                                    
                                </div>

                                
                                <a class="btn btn-primary btnPrevious" >Previous</a> <button type="submit" class="btn btn-primary btnNext" >Submit</a>
                                
                            </div>
                          
                           
                        
                        
                           
                            
                        </div>

                    </form>
                </div>
            </div>
        
    </div>
@endsection