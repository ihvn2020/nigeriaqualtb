@extends('layouts.theme')

@section('content')
    <h3 class="page-title">Help | <small style="color: green">Need Help</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                    
                        <h4>New Record</h4>
                    
                    
                </div>
                <div class="panel-body">
                    @php
                        if(!isset($dscapture)){
                            $dscapture= \App\Models\dscaptures::where('id',1)->first();
                            if($dscapture->id==1){
                                $dscapture->id = 0;
                            }
                            $users= \App\Models\User::select('id','name')->get();
                        }
                    @endphp
                    <form method="POST" action="{{ route('addnewds') }}">
                        
                            <input type="hidden" name="id" value="{{$dscapture->id}}">
                        
                        @csrf
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Patient <br>Demographics</a></li>
                            <li><a href="#tab2" data-toggle="tab">Patient <br>Classification</a></li>
                            <li><a href="#tab3" data-toggle="tab">HIV /<br>ART Info</a></li>
                            <li><a href="#tab4" data-toggle="tab">TB /<br> Drugs</a></li>
                            <li><a href="#tab5" data-toggle="tab">Diagnosis <br>& Results</a></li>
                            <li><a href="#tab6" data-toggle="tab">Patient <br>Monitoring</a></li>
                            <li><a href="#tab7" data-toggle="tab">Contact Tracing</a></li>
                            <li><a href="#tab8" data-toggle="tab">Drugs Intake<br>& Adhrence</a></li>
                            <li><a href="#tab9" data-toggle="tab">Treatment <br>Outcome</a></li>
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
                                
                                    
                                </div>

                                <div class="row form-row">
                                
                                    
                                    
                                
                                    <div class="form-group col-md-4">
                                        <label>Marital Status</label>
                                        <div>
                                        <input type="radio" id="Single"  {{$dscapture->marital_status=='Single' ? 'checked':''}}
                                        name="marital_status" value="Single">
                                        <span for="Single">Single</span>
                                    
                                        <input type="radio" id="Married"  {{$dscapture->marital_status=='Married' ? 'checked':''}}
                                        name="marital_status" value="Married">
                                        <span for="Married">Married</span>

                                        <input type="radio" id="Seperated"  {{$dscapture->marital_status=='Seperated' ? 'checked':''}}
                                        name="marital_status" value="Seperated">
                                        <span for="Seperated">Seperated</span>

                                        <input type="radio" id="Widowed"  {{$dscapture->marital_status=='Widowed' ? 'checked':''}}
                                        name="marital_status" value="Widowed">
                                        <span for="Widowed">Widowed</span>

                                        <input type="radio" id="Divorced"  {{$dscapture->marital_status=='Divorced' ? 'checked':''}}
                                        name="marital_status" value="Divorced">
                                        <span for="Divorced">Divorced</span>
                                        </div>

                                    </div>

                                    
                                    
                                </div>
                                
                                <div class="row form-row">
                                
                                    <div class="form-group col-md-3">
                                    <label for="patient_address">Patient Address</label>
                                    <input type="text" name="patient_address" id="patient_address" class="form-control" placeholder="Patient Address" value="{{$dscapture ? $dscapture->patient_address:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="patient_phone_number">Patient Phone Number</label>
                                        <input type="text" name="patient_phone_number" id="patient_phone_number" class="form-control" placeholder="Patient Phone Number" value="{{$dscapture ? $dscapture->patient_phone_number:''}}">                                  
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
                                    <h5>Site of Disease</h5>
                                    <div class="form-group col-md-4">
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

                                    <div class="form-group col-md-4">
                                        <div class="form-group">
                                          <label for="extra_pulmonary_site">Site of Extrapulmonary (EP)</label>
                                          <input type="text"
                                            class="form-control" name="extra_pulmonary_site" id="extra_pulmonary_site" aria-describedby="helpId" placeholder="Site of Extrapulmonary">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
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
                                
                                    <div class="form-group col-md-6">
                                        <label>HIV Test Result</label>
                                        <div>
                                        <input type="radio" id="hiv_positive" {{$dscapture->hiv_result=='Positive' ? 'checked':''}} 
                                        name="hiv_result" value="Positive">
                                        <span for="hiv_postitive">Positive</span>
                                    
                                        <input type="radio" id="hiv_negative" {{$dscapture->hiv_result=='Negative' ? 'checked':''}} 
                                        name="hiv_result" value="Negative">
                                        <span for="hiv_negative">Negative</span>                                      
                                        

                                        <input type="radio" id="hiv_unknown" {{$dscapture->hiv_result=='Unknown' ? 'checked':''}} 
                                        name="hiv_result" value="Unknown">
                                        <span for="hiv_unknown">Unknown</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="art_start_date">If Yes, ART Start Date (dd/mm/yyyy)</label>
                                        <div>
                                        
                                        <input type="date" id="art_start_date" value="{{$dscapture ? $dscapture->art_start_date:''}}"
                                        name="art_start_date" >
                                                                                
                                        </div>

                                    </div>


                                    
                                    
                                </div>
                                <div class="row form-row">
                                    <div class="form-group col-md-6">
                                        <label>HIV Status Info</label>
                                        <div>
                                        <input type="radio" id="previously_known" {{$dscapture->hiv_result=='Previously Known' ? 'checked':''}} 
                                        name="hiv_status" value="Previously Known">
                                        <span for="previously_known">Previously Known</span>
                                    
                                        <input type="radio" id="newly_tested" {{$dscapture->hiv_result=='Newly Tested' ? 'checked':''}} 
                                        name="hiv_status" value="Newly Tested">
                                        <span for="newly_tested">Newly Tested</span>                                      
                                        

                                        <input type="radio" id="end_of_treament" {{$dscapture->hiv_result=='End of Treatment' ? 'checked':''}} 
                                        name="hiv_status" value="End of Treatment">
                                        <span for="end_of_treament">End of Treatment</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Type of Care</label>
                                        <div>
                                        <input type="radio" id="referred" {{$dscapture->type_of_care=='Reffered' ? 'checked':''}} 
                                        name="type_of_care" value="Reffered">
                                        <span for="referred">Referred</span>
                                    
                                        <input type="radio" id="on_art" {{$dscapture->type_of_care=='On ART' ? 'checked':''}} 
                                        name="type_of_care" value="On ART">
                                        <span for="on_art">On ART</span>                                      
                                        

                                        <input type="radio" id="on_cpt" {{$dscapture->type_of_care=='On CPT' ? 'checked':''}} 
                                        name="type_of_care" value="On CPT">
                                        <span for="on_cpt">On CPT</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="hiv_service_date">Care Started Date</label>
                                        
                                        <input type="date" id="hiv_service_date" value="{{$dscapture->hiv_service_date}}" 
                                        name="hiv_service_date">
                                                                       
                                        

                                    </div>
                                </div>


                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>
                           
                            <div class="tab-pane" id="tab4">

                                <div class="row form-row">

                                    
                                
                                    <div class="form-group col-md-4">
                                        <label>History of Intake of anti-TB drugs more than 1 month?</label>
                                        <div>
                                        <input type="radio" id="on_anti_treatment_yes" {{$dscapture->on_anti_treatment=='Yes' ? 'checked':''}} 
                                        name="on_anti_treatment" value="Yes">
                                        <span for="on_anti_treatment_yes">Yes</span>
                                    
                                        <input type="radio" id="on_anti_treatment_no" {{$dscapture->on_anti_treatment=='No' ? 'checked':''}} 
                                        name="on_anti_treatment" value="No">
                                        <span for="on_anti_treatment_no">No</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="tb_durationinweeks">If Yes, Duration in Weeks</label>
                                        <div>
                                        
                                        <input type="number" id="tb_durationinweeks" value="{{$dscapture ? $dscapture->tb_durationinweeks:''}}"
                                        name="tb_durationinweeks" >
                                                                                
                                        </div>

                                    </div>
                                    
                                </div>

                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>

                            <div class="tab-pane" id="tab5">

                                <div class="row form-row">
                                    <small>Diagnostic Tests</small>
                                    <h4>GeneXpert Result 2(AFB)</h4>

                                    <div class="form-group col-md-4">
                                        <label for="genexpert_collected">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="genexpert_collected"  value="{{$dscapture ? $dscapture->genexpert_collected:''}}"
                                        name="genexpert_collected" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="genexpert_released">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="genexpert_released"  value="{{$dscapture ? $dscapture->genexpert_released:''}}"
                                        name="genexpert_released" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>MTB</label>
                                        <div>
                                        <input type="radio" id="mtb_detected_yes" {{$dscapture->mtb_detected=='Yes' ? 'checked':''}} 
                                        name="mtb_detected" value="Yes">
                                        <span for="mtb_detected_yes">Yes</span>
                                    
                                        <input type="radio" id="mtb_detected_no" {{$dscapture->mtb_detected=='No' ? 'checked':''}} 
                                        name="mtb_detected" value="No">
                                        <span for="mtb_detected_no">No</span>                                      
                                        </div>

                                    </div>
                                    
                                </div>

                                <div class="row form-row">
                                    <h4>AFB Result</h4>

                                    <div class="form-group col-md-4">
                                        <label for="afb_collected">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="afb_collected"  value="{{$dscapture ? $dscapture->afb_collected:''}}"
                                        name="afb_collected" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="afb_released">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="afb_released"  value="{{$dscapture ? $dscapture->afb_released:''}}"
                                        name="afb_released" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Smear Result</label>
                                       
                                          <select class="form-control" name="afb_smear_result" id="afb_smear_result">
                                            <option value="Negative" selected>Negative</option>
                                            <option value="Positive">Positive</option>
                                          </select>
                                                                               

                                    </div>
                                    
                                </div>

                                <div class="row form-row">
                                    
                                    <h4>Chest X-Ray</h4>
                                    <div class="form-group col-md-4">
                                        <label for="xray_released">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="xray_released"  value="{{$dscapture ? $dscapture->xray_released:''}}"
                                        name="xray_released" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="xray_result">X-Ray Result</label>
                                       
                                          <select class="form-control" name="xray_result" id="xray_result">
                                            <option value="Suggestive" selected>Suggestive</option>
                                            <option value="Not Suggestive">Not Suggestive</option>
                                          </select>
                                                                              

                                    </div>
                                    
                                </div>

                                <div class="row form-row">
                                    <h4>Tissue Biopsy Result</h4>

                                    <div class="form-group col-md-4">
                                        <label for="tbiopsy_released">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="tbiopsy_released"  value="{{$dscapture ? $dscapture->tbiopsy_released:''}}"
                                        name="tbiopsy_released" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="tbiotype_of_specimen">Type of Specimen</label>
                                        <div>                                      
                                        <input type="date" id="tbiotype_of_specimen"  value="{{$dscapture ? $dscapture->tbiotype_of_specimen:''}}"
                                        name="tbiotype_of_specimen" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="tbiopsy_result">X-Ray Result</label>
                                       
                                          <select class="form-control" name="tbiopsy_result" id="tbiopsy_result">
                                            <option value="Suggestive" selected>Suggestive</option>
                                            <option value="Not Suggestive">Not Suggestive</option>
                                          </select>
                                                                              

                                    </div>
                                    
                                </div>

                                <div class="row form-row">
                                    <h4>Other Tests (TB-Lamp, LF-Lam, etc)</h4>

                                    <div class="form-group col-md-4">
                                        <label for="othertests_released">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="othertests_released"  value="{{$dscapture ? $dscapture->dsothertests_released:''}}"
                                        name="othertests_released" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="others_testname">Enter Test Name</label>
                                        <div>                                      
                                        <input type="text" id="others_testname"  value="{{$dscapture ? $dscapture->others_testname:''}}"
                                        name="others_testname" placeholder="e.g. TB-Lamp, LF-Lam, etc" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="othertests_result">Result</label>

                                          <select class="form-control" name="othertests_result" id="othertests_result">
                                            <option value="Positive" selected>Positive</option>
                                            <option value="Negative">Negative</option>
                                          </select>                                                                              

                                    </div>
                                    
                                </div>

                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>

                            <div class="tab-pane" id="tab6">
                                <div class="row form-row">

                                    <h4>Treatment Monitoring</h4>

                                    <table class="table form-group">
                                        <thead>
                                            <tr>
                                                <th>Month</th>
                                                <th>0</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>5</th>
                                                <th>6</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td scope="row">Weight (KG)</td>
                                                <td scope="row"><input type="number" name="tmmonth0" id="tmmonth0" class="form-control" value="{{$dscapture ? $dscapture->tmmonth0:''}}"></td>
                                                <td><input type="number" name="tmmonth2" id="tmmonth2" class="form-control" value="{{$dscapture ? $dscapture->tmmonth2:''}}"></td>
                                                <td><input type="number" name="tmmonth3" id="tmmonth3" class="form-control" value="{{$dscapture ? $dscapture->tmmonth3:''}}"></td>
                                                <td><input type="number" name="tmmonth5" id="tmmonth5" class="form-control" value="{{$dscapture ? $dscapture->tmmonth5:''}}"></td>
                                                <td><input type="number" name="tmmonth6" id="tmmonth6" class="form-control" value="{{$dscapture ? $dscapture->tmmonth6:''}}"></td>

                                            </tr>

                                            <tr>
                                                <td scope="row">Smear Result</td>
                                                <td scope="row">
                                                    <datalist id="smearresults">
                                                        <option value="Positive">
                                                        <option value="Negative">                                                   
                                                    </datalist>
                                                  </td>
                                                <td><input type="text" list="smearresults" name="tmsmonth2" id="tmsmonth2" class="form-control" value="{{$dscapture ? $dscapture->tmsmonth2:''}}"></td>
                                                <td><input type="text" list="smearresults" name="tmsmonth3" id="tmsmonth3" class="form-control" value="{{$dscapture ? $dscapture->tmsmonth3:''}}"></td>
                                                <td><input type="text" list="smearresults" name="tmsmonth5" id="tmsmonth5" class="form-control" value="{{$dscapture ? $dscapture->tmsmonth5:''}}"></td>
                                                <td><input type="text" list="smearresults" name="tmsmonth6" id="tmsmonth6" class="form-control" value="{{$dscapture ? $dscapture->tmsmonth6:''}}"></td>

                                            </tr>

                                        </tbody>
                                    </table>

                                </div>

                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>

                            </div>
                                                        
                            <div class="tab-pane" id="tab7">                                
                                <div class="row form-row">
                                
                                    <div class="form-group col-md-4">
                                    <label for="contact_tracing_done">Contact Tracing Done?</label>
                                    <select name="contact_tracing_done" class="form-control" id="contact_tracing_done">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="num_children5less">No. of Contacts Who are Children Less Than 5 Years Old</label>
                                        <input type="number" name="num_children5less" id="num_children5less" class="form-control" value="{{$dscapture ? $dscapture->num_children5less:''}}" placeholder="Number of Contacts Who are Children Less than 6 yrs old">                                  
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="num_children5above">5 years and above</label>
                                        <input type="number" name="num_children5above" id="num_children5above" class="form-control" value="{{$dscapture ? $dscapture->num_children5above:''}}" placeholder="No of Contacts Screened">                                  
                                    </div>
                                
                                    
                                </div>
                                <!--
                                    <div class="row form-row">
                                    
                                        <div class="form-group col-md-3">
                                        <label for="num_contacts_traced">Presumtive TB Cases Identified?</label>
                                            <div>
                                            <input type="radio" id="ptb_case_identified_yes" {{$dscapture->ptb_case_identified=='Yes' ? 'checked':''}} 
                                            name="ptb_case_identified" value="Yes">
                                            <span for="ptb_case_identified_yes">Yes</span>
                                        
                                            <input type="radio" id="ptb_case_identified_no" {{$dscapture->ptb_case_identified=='No' ? 'checked':''}} 
                                            name="ptb_case_identified" value="No">
                                            <span for="ptb_case_identified_no">No</span>                                      
                                            </div>                                  
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="num_ptb_identified">If Yes, No. of Presumptive TB identified specify</label>
                                            <input type="number" name="num_ptb_identified" id="num_ptb_identified" class="form-control" value="{{$dscapture ? $dscapture->num_ptb_identified:''}}" placeholder="If Yes, No. of Presumptive TB identified specify">                                  
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="num_ptb_microscopy">No. of Presumptive TB Tested: Microscopy</label>
                                            <input type="number" name="num_ptb_microscopy" id="num_ptb_microscopy" class="form-control" value="{{$dscapture ? $dscapture->num_ptb_microscopy:''}}" placeholder="Enter Microscopy">                                  
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="num_ptb_genexpert">No. of Presumptive TB Tested: GeneXpert</label>
                                            <input type="number" name="num_ptb_genexpert" id="num_ptb_genexpert" class="form-control" value="{{$dscapture ? $dscapture->num_ptb_genexpert:''}}" placeholder="Enter GeneXpert">                                  
                                        </div>
                                    
                                        
                                    </div>

                                    <div class="row form-row">
                                    
                                    
                                        <div class="form-group col-md-6">
                                            <label for="num_ptb_eligible_ipt">Number of Presumptive TB cases eligible for IPT</label>
                                            <small>(Source document: INH register)</small>
                                            <input type="number" name="num_ptb_eligible_ipt" id="num_ptb_eligible_ipt" class="form-control" value="{{$dscapture ? $dscapture->num_ptb_eligible_ipt:''}}" placeholder="Enter Here">                                  
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="num_ptb_ipt_done">Number of Eligibile Presumptive TB Cases That Received IPT</label>
                                            <input type="number" name="num_ptb_ipt_done" id="num_ptb_ipt_done" class="form-control" value="{{$dscapture ? $dscapture->num_ptb_ipt_done:''}}" placeholder="Enter Here">                                  
                                        </div>
                                    
                                    </div>
                                -->

                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>
                            <div class="tab-pane" id="tab8">
                                <div class="row form-row">                                    

                                    <div class="form-group col-md-12">
                                        <label for="Reason">Select Regimen Line</label>
                                        <div>
                                        <input type="radio" id="regimen1" {{$dscapture->regimenline=='Regimen 1' ? 'checked':''}} 
                                        name="regimenline" value="Regimen 1">
                                        <span for="regimen1">Regimen 1</span>
                                    
                                        <input type="radio" id="regimen2" {{$dscapture->regimenline=='Regimen 2' ? 'checked':''}} 
                                        name="regimenline" value="Regimen 2">
                                        <span for="regimen2">Regimen 2</span>                                      
                                        </div>

                                    </div>

                                </div>

                                

                                <div class="row form-row" style="overflow-y: scroll;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Month</th><th>Year</th>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                                <th>5</th>
                                                <th>6</th>
                                                <th>7</th>
                                                <th>8</th>
                                                <th>9</th>
                                                <th>10</th>
                                                <th>11</th>
                                                <th>12</th>
                                                <th>13</th>
                                                <th>14</th>
                                                <th>15</th>
                                                <th>16</th>
                                                <th>17</th>
                                                <th>18</th>
                                                <th>19</th>
                                                <th>20</th>
                                                <th>21</th>
                                                <th>22</th>
                                                <th>23</th>
                                                <th>24</th>
                                                <th>25</th>
                                                <th>26</th>
                                                <th>27</th>
                                                <th>28</th>
                                                <th>29</th>
                                                <th>30</th>
                                                <th>31</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="padding: 0px !important;">
                                                <td>
                                                    
                                                        
                                                        <select name="month">
                                                            <option value="" selected>Month</option>
                                                            <option value="1">January</option>
                                                            <option value="2">February</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
            
                                                        </select>
                                                </td>
          
                                                <td>
                                                        
                                                        <select name="year">
                                                            <option value="">Year</option>
                                                            @php
                                                                for($yr = 2000; $yr<=date("Y"); $yr++){
                                                                    echo '<option value="'.$yr.'">'.$yr.'</option>';
                                                                }
                                                            @endphp
                                                            
                                                            
                
                                                        </select>
                                                    
                                                </td>
                                                @php
                                                    $di = range(1, 31);
                                                    $i = 1;
                                                    
                                                @endphp
                                                <td><input type="checkbox" name="di[]" value="1" {{$di[$i-1]=='1' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="2" {{$di[$i++]=='2' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="3" {{$di[$i++]=='3' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="4" {{$di[$i++]=='4' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="5" {{$di[$i++]=='5' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="6" {{$di[$i++]=='6' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="7" {{$di[$i++]=='7' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="8" {{$di[$i++]=='8' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="9" {{$di[$i++]=='9' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="10" {{$di[$i++]=='10' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="11" {{$di[$i++]=='11' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="12" {{$di[$i++]=='12' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="13" {{$di[$i++]=='13' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="14" {{$di[$i++]=='14' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="15" {{$di[$i++]=='15' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="16" {{$di[$i++]=='16' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="17" {{$di[$i++]=='17' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="18" {{$di[$i++]=='18' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="19" {{$di[$i++]=='19' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="20" {{$di[$i++]=='20' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="21" {{$di[$i++]=='21' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="22" {{$di[$i++]=='22' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="23" {{$di[$i++]=='23' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="24" {{$di[$i++]=='24' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="25" {{$di[$i++]=='25' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="26" {{$di[$i++]=='26' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="27" {{$di[$i++]=='27' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="28" {{$di[$i++]=='28' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="29" {{$di[$i++]=='29' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="30" {{$di[$i++]=='30' ? '':'checked'}} ></td>
                                                <td><input type="checkbox" name="di[]" value="31" {{$di[$i++]=='31' ? '':'checked'}} ></td>
                                                
                                            <tr>
                                                <td>
                                                    
                                                        
                                                    <select name="month2">
                                                        <option value="" selected>Month</option>
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
        
                                                    </select>
                                                </td>
      
                                                <td>
                                                    
                                                    <select name="year2">
                                                        <option value="">Year</option>
                                                        @php
                                                            for($yr = 2000; $yr<=date("Y"); $yr++){
                                                                echo '<option value="'.$yr.'">'.$yr.'</option>';
                                                            }
                                                        @endphp
                                                        
                                                        
            
                                                    </select>
                                                
                                                </td>
                                                @php
                                                    $di = range(1, 31);
                                                    $i = 1;
                                                    
                                                @endphp
                                               <td><input type="checkbox" name="di2[]" value="1" {{$di[$i-1]=='1' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="2" {{$di[$i++]=='2' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="3" {{$di[$i++]=='3' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="4" {{$di[$i++]=='4' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="5" {{$di[$i++]=='5' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="6" {{$di[$i++]=='6' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="7" {{$di[$i++]=='7' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="8" {{$di[$i++]=='8' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="9" {{$di[$i++]=='9' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="10" {{$di[$i++]=='10' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="11" {{$di[$i++]=='11' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="12" {{$di[$i++]=='12' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="13" {{$di[$i++]=='13' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="14" {{$di[$i++]=='14' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="15" {{$di[$i++]=='15' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="16" {{$di[$i++]=='16' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="17" {{$di[$i++]=='17' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="18" {{$di[$i++]=='18' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="19" {{$di[$i++]=='19' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="20" {{$di[$i++]=='20' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="21" {{$di[$i++]=='21' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="22" {{$di[$i++]=='22' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="23" {{$di[$i++]=='23' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="24" {{$di[$i++]=='24' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="25" {{$di[$i++]=='25' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="26" {{$di[$i++]=='26' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="27" {{$di[$i++]=='27' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="28" {{$di[$i++]=='28' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="29" {{$di[$i++]=='29' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="30" {{$di[$i++]=='30' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di2[]" value="31" {{$di[$i++]=='31' ? '':'checked'}} ></td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    
                                                        
                                                    <select name="month3">
                                                        <option value="" selected>Month</option>
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                            
                                                    </select>
                                                </td>
                                            
                                                <td>
                                                    
                                                    <select name="year3">
                                                        <option value="">Year</option>
                                                        @php
                                                            for($yr = 2000; $yr<=date("Y"); $yr++){
                                                                echo '<option value="'.$yr.'">'.$yr.'</option>';
                                                            }
                                                        @endphp
                                                        
                                                        
                                            
                                                    </select>
                                                
                                                </td>
                                                @php
                                                    $di = range(1, 31);
                                                    $i = 1;
                                                    
                                                @endphp
                                               <td><input type="checkbox" name="di3[]" value="1" {{$di[$i-1]=='1' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="2" {{$di[$i++]=='2' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="3" {{$di[$i++]=='3' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="4" {{$di[$i++]=='4' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="5" {{$di[$i++]=='5' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="6" {{$di[$i++]=='6' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="7" {{$di[$i++]=='7' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="8" {{$di[$i++]=='8' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="9" {{$di[$i++]=='9' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="10" {{$di[$i++]=='10' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="11" {{$di[$i++]=='11' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="12" {{$di[$i++]=='12' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="13" {{$di[$i++]=='13' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="14" {{$di[$i++]=='14' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="15" {{$di[$i++]=='15' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="16" {{$di[$i++]=='16' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="17" {{$di[$i++]=='17' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="18" {{$di[$i++]=='18' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="19" {{$di[$i++]=='19' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="20" {{$di[$i++]=='20' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="21" {{$di[$i++]=='21' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="22" {{$di[$i++]=='22' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="23" {{$di[$i++]=='23' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="24" {{$di[$i++]=='24' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="25" {{$di[$i++]=='25' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="26" {{$di[$i++]=='26' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="27" {{$di[$i++]=='27' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="28" {{$di[$i++]=='28' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="29" {{$di[$i++]=='29' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="30" {{$di[$i++]=='30' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di3[]" value="31" {{$di[$i++]=='31' ? '':'checked'}} ></td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    
                                                        
                                                    <select name="month4">
                                                        <option value="" selected>Month</option>
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                            
                                                    </select>
                                                </td>
                                            
                                                <td>
                                                    
                                                    <select name="year4">
                                                        <option value="">Year</option>
                                                        @php
                                                            for($yr = 2000; $yr<=date("Y"); $yr++){
                                                                echo '<option value="'.$yr.'">'.$yr.'</option>';
                                                            }
                                                        @endphp
                                                        
                                                        
                                            
                                                    </select>
                                                
                                                </td>
                                                @php
                                                    $di = range(1, 31);
                                                    $i = 1;
                                                    
                                                @endphp
                                               <td><input type="checkbox" name="di4[]" value="1" {{$di[$i-1]=='1' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="2" {{$di[$i++]=='2' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="3" {{$di[$i++]=='3' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="4" {{$di[$i++]=='4' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="5" {{$di[$i++]=='5' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="6" {{$di[$i++]=='6' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="7" {{$di[$i++]=='7' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="8" {{$di[$i++]=='8' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="9" {{$di[$i++]=='9' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="10" {{$di[$i++]=='10' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="11" {{$di[$i++]=='11' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="12" {{$di[$i++]=='12' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="13" {{$di[$i++]=='13' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="14" {{$di[$i++]=='14' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="15" {{$di[$i++]=='15' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="16" {{$di[$i++]=='16' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="17" {{$di[$i++]=='17' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="18" {{$di[$i++]=='18' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="19" {{$di[$i++]=='19' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="20" {{$di[$i++]=='20' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="21" {{$di[$i++]=='21' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="22" {{$di[$i++]=='22' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="23" {{$di[$i++]=='23' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="24" {{$di[$i++]=='24' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="25" {{$di[$i++]=='25' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="26" {{$di[$i++]=='26' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="27" {{$di[$i++]=='27' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="28" {{$di[$i++]=='28' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="29" {{$di[$i++]=='29' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="30" {{$di[$i++]=='30' ? '':'checked'}} ></td>
                                               <td><input type="checkbox" name="di4[]" value="31" {{$di[$i++]=='31' ? '':'checked'}} ></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>

                                </div>


                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>
                            <div class="tab-pane" id="tab9">
                                <h4>Treatment Outcome</h4>

                                <div class="row form-row">
                                    <div class="form-group col-md-12">
                                        <label>Tick Appropriate Outcome</label>
                                        <div>
                                        <input type="radio" id="cured" {{$dscapture->outcome=='Cured' ? 'checked':''}} 
                                        name="outcome" value="Cured">
                                        <span for="cured">Cured</span>

                                        <input type="radio" id="completed" {{$dscapture->outcome=='Treatment Completed' ? 'checked':''}} 
                                        name="outcome" value="Treatment Completed">
                                        <span for="completed">Treatment Completed</span>
                                    
                                        <input type="radio" id="ltfu" {{$dscapture->outcome=='Lost to Follow up' ? 'checked':''}} 
                                        name="outcome" value="Lost to Follow up">
                                        <span for="ltfu"> Lost to Follow up</span>
                                        
                                        <input type="radio" id="tfailed" {{$dscapture->outcome=='Treatment Failed' ? 'checked':''}} 
                                        name="outcome" value="Treatment Failed">
                                        <span for="tfailed">Treatment Failed</span>

                                        <input type="radio" id="notevaluated" {{$dscapture->outcome=='Not Evaluated' ? 'checked':''}} 
                                        name="outcome" value="Not Evaluated">
                                        <span for="notevaluated">Not Evaluated</span>

                                        <input type="radio" id="died" {{$dscapture->outcome=='Died' ? 'checked':''}} 
                                        name="outcome" value="Died">
                                        <span for="died">Died</span>

                                        <input type="radio" id="removed" {{$dscapture->outcome=='Removed from the register' ? 'checked':''}} 
                                        name="outcome" value="Removed from the register">
                                        <span for="removed">Removed from the register</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="row form-row">
                                    
                                    <div class="form-group col-md-6">
                                    <label for="date_completed">Date Treament Completed</label>
                                   
                                        <input type="date" name="date_completed" id="date_completed" class="form-control" value="{{$dscapture ? $dscapture->date_completed:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="health_worker">Health Worker</label>
                                        <select class="form-control" name="health_worker" id="health_worker">
                                            <option value="" >Select Health Worker</option>
                                            <option value="{{ $dscapture->completed_by }}" selected>{{ $dscapture->completed_by!="" ? \App\Models\User::select('name')->where('id',$dscapture->completed_by)->first()->name :'' }}</option>
                                            @foreach ($users as $usr)
                                                <option value="{{$usr->id}}">{{$usr->name}}</option>
                                            @endforeach                                          
                                        
                                        </select>       
                                </div>

                                <a class="btn btn-primary btnPrevious" >Previous</a><button type="submit" class="btn btn-primary btnNext" >Submit</button>
                                
                            </div>
                            
                        </div>

                    </form>
                </div>
            </div>
        
    </div>
@endsection