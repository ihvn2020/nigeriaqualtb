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

                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>
                           
                            <div class="tab-pane" id="tab5">

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
                            <div class="tab-pane" id="tab6">

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
                                    <small>AFB Result</small>

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
                                    
                                </div>

                                <div class="row form-row">
                                    <small>Chest X-Ray Result</small>

                                    <div class="form-group col-md-4">
                                        <label for="xray_released">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="xray_released"  value="{{$dscapture ? $dscapture->xray_released:''}}"
                                        name="xray_released" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="xray_reuslt">X-Ray Result</label>
                                       
                                          <select class="form-control" name="xray_result" id="xray_result">
                                            <option value="Suggestive" selected>Suggestive</option>
                                            <option value="Not Suggestive">Not Suggestive</option>
                                          </select>
                                        </div>                                        

                                    </div>
                                    
                                </div>

                                <div class="row form-row">
                                    <small>Tissue Biopsy Result</small>

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
                                    
                                </div>

                                <div class="row form-row">
                                    <small>Other Tests (TB-Lamp, LF-Lam, etc)</small>

                                    <div class="form-group col-md-4">
                                        <label for="othertests_released">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="othertests_released"  value="{{$dscapture ? $dsothertests->tbiopsy_released:''}}"
                                        name="othertests_released" >      
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
                                        <label for="othertests_result">X-Ray Result</label>
                                       
                                          <select class="form-control" name="othertests_result" id="othertests_result">
                                            <option value="Suggestive" selected>Suggestive</option>
                                            <option value="Not Suggestive">Not Suggestive</option>
                                          </select>
                                        </div>                                        

                                    </div>
                                    
                                </div>

                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>
                            <div class="tab-pane" id="tab7">
                                <div class="row form-row">
                                
                                    <div class="form-group col-md-4">
                                    <label for="num_contacts_traced">Number of Contacts Traced</label>
                                    <input type="number" name="num_contacts_traced" id="num_contacts_traced" class="form-control" value="{{$dscapture ? $dscapture->num_contacts_traced:''}}" placeholder="Number of Contacts Traced">                                  
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="num_children6less">No. of Contacts Who are Children Less Than 6 Years Old</label>
                                        <input type="number" name="num_children6less" id="num_children6less" class="form-control" value="{{$dscapture ? $dscapture->num_children6less:''}}" placeholder="Number of Contacts Who are Children Less than 6 yrs old">                                  
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="num_contacts_screen">No of Contacts Screened</label>
                                        <input type="number" name="num_contacts_screen" id="num_contacts_screen" class="form-control" value="{{$dscapture ? $dscapture->num_contacts_screen:''}}" placeholder="No of Contacts Screened">                                  
                                    </div>
                                
                                    
                                </div>

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

                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>
                            <div class="tab-pane" id="tab8">
                                <div class="row form-row">
                                    

                                    <div class="form-group col-md-6">
                                        <label for="date_specimentrecievedlab">Date Specimen was Received in Lab(AFB)</label>
                                        <div>                                      
                                        <input type="date" id="date_specimentrecievedlab" value="{{$dscapture ? $dscapture->date_specimentrecievedlab:''}}" 
                                        name="date_specimentrecievedlab" >      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="labdateresult_released">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="labdateresult_released" value="{{$dscapture ? $dscapture->labdateresult_released:''}}" 
                                        name="labdateresult_released" >      
                                        </div>
                                    </div>

                                </div>

                                <div class="row form-row">
                                
                                    <div class="form-group col-md-6">
                                    <label for="Reason">Reason?</label>
                                        <div>
                                        <input type="radio" id="lab_reason_diagnosis" {{$dscapture->lab_reason=='Diagnosis' ? 'checked':''}} 
                                        name="lab_reason" value="Diagnosis">
                                        <span for="lab_reason_diagnosis">Diagnosis</span>
                                    
                                        <input type="radio" id="lab_reason_followup" {{$dscapture->lab_reason=='Follow-up' ? 'checked':''}} 
                                        name="lab_reason" value="Follow-up">
                                        <span for="lab_reason_followup">Follow-up</span>                                      
                                        </div>                                  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ftwo">If Follow-up, indicate month(s) of Treatment</label>
                                        <input type="checkbox" name="ftwo" id="ftwo"  {{$dscapture->fwto=='on' ? 'checked':''}}  ><span for="ftwo">Two(2)</span>
                                        <input type="checkbox" name="ffive" id="ffive"  {{$dscapture->ffive=='on' ? 'checked':''}}  ><span for="ffive">Five(5)</span>
                                        <input type="checkbox" name="fsix" id="fsix"  {{$dscapture->fsix=='on' ? 'checked':''}}  ><span for="fsix">Six(6)</span>                                    
                                    </div>
                                    
                                
                                    
                                </div>

                                <div class="row form-row">
                                    

                                    <div class="form-group col-md-6">
                                        <label for="date_specimentrecievedlab">Date Specimen was Received in Lab(GeneXpert)(month 2)</label>
                                        <div>                                      
                                        <input type="date" id="date_specimentrecievedlabgx" value="{{$dscapture ? $dscapture->date_specimentrecievedlabgx:''}}" 
                                        name="date_specimentrecievedlabgx" >      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="labdateresult_releasedgx">Date result released (Month 2)</label>
                                        <div>                                      
                                        <input type="date" id="labdateresult_releasedgx" value="{{$dscapture ? $dscapture->labdateresult_releasedgx:''}}" 
                                        name="labdateresult_releasedgx" >      
                                        </div>
                                    </div>

                                </div>


                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>
                            <div class="tab-pane" id="tab9">
                                <div class="alert">Thank you! you have completed the steps.</div>
                            <button type="submit" class="btn btn-primary btnNext" >Submit</a>
                                
                            </div>
                            <div class="tab-pane" id="tab10">
                                <a class="btn btn-primary btnPrevious" >Previous</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        
    </div>
@endsection