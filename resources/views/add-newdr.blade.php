@extends('layouts.theme')

@section('content')
    <h3 class="page-title">Help | <small style="color: green">Need Help</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                    
                        <h4>Capture DR Record</h4>
                    
                    
                </div>
                <div class="panel-body">
                    @php
                        if(!isset($drcapture)){
                            $drcapture= \App\Models\dscaptures::where('id',1)->first();
                            if($drcapture->id==1){
                                $drcapture->id = 0;
                            }
                        }
                    @endphp
                    <form method="POST" action="{{ route('addnewdr') }}">
                        
                            <input type="hidden" name="id" value="{{$drcapture->id}}">
                        
                        @csrf
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Patient <br>Demographics</a></li>
                            <li><a href="#tab2" data-toggle="tab">Patient <br>Classification</a></li>
                            <li><a href="#tab3" data-toggle="tab">Patient <br>Diagnosis</a></li>
                            <li><a href="#tab4" data-toggle="tab">TB/HIV</a></li>
                            <li><a href="#tab5" data-toggle="tab">Patient Treatment <br>& Outcome</a></li>
                            <li><a href="#tab6" data-toggle="tab">Comorbid <br>Conditions</a></li>
                            <li><a href="#tab7" data-toggle="tab">Documentation</a></li>
                            
                        </ul>
                        <div class="tab-content">
                            
                            <div class="tab-pane active" id="tab1">
                                <div class="row form-row">
                                
                                    <div class="form-group col-md-2">
                                    <label for="patient_id">Patient ID</label>
                                    <input type="text" name="patient_id" id="patient_id" class="form-control" placeholder="Patient ID" value="{{$drcapture ? $drcapture->patient_id:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="lga_tb_number">LGA TB Number</label>
                                        <input type="text" name="lga_tb_number" id="lga_tb_number" class="form-control" placeholder="LGA TB Number"  value="{{$drcapture ? $drcapture->lga_tb_number:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="hospital_number">Hospital Number</label>
                                        <input type="text" name="hospital_number" id="hospital_number" class="form-control" placeholder="Hospital Number" value="{{$drcapture ? $drcapture->hospital_number:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label for="rnl_serial_number">RNL Serial No</label>
                                    <input type="text" name="rnl_serial_number" id="rnl_serial_number" class="form-control" placeholder="Hospital Number" value="{{$drcapture ? $drcapture->rnl_serial_number:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Gender</label>
                                        <div>
                                        <input type="radio" id="male"
                                        name="gender" value="Male" {{$drcapture->gender=="Male" ? 'checked':''}}>
                                        <span for="male">Male</span>
                                    
                                        <input type="radio" id="female"  {{$drcapture->gender=="Female" ? 'checked':''}}
                                        name="gender" value="Female">
                                        <span for="female">Female</span>
                                        </div>

                                    </div>
                                    
                                </div>

                                <div class="row form-row">
                                
                                    <div class="form-group col-md-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="{{$drcapture ? $drcapture->first_name:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="{{$drcapture ? $drcapture->last_name:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="age">Age</label>
                                        <input type="number" name="age" id="age" class="form-control" placeholder="Age" value="{{$drcapture ? $drcapture->age:''}}">                                  
                                    </div>
                                
                                    <div class="form-group col-md-4">
                                        <label>Hospital Admission During Review Period</label>
                                        <div>
                                        <input type="radio" id="Yes" {{$drcapture->hospital_admission=='Yes' ? 'checked':''}}
                                        name="hospital_admission" value="Yes">
                                        <span for="Yes">Yes</span>
                                    
                                        <input type="radio" id="No"  {{$drcapture->hospital_admission=='No' ? 'checked':''}}
                                        name="hospital_admission" value="No">
                                        <span for="No">No</span>
                                        </div>

                                    </div>
                                    
                                </div>

                                <div class="row form-row">
                                
                                    
                                    
                                
                                    <div class="form-group col-md-4">
                                        <label>Marital Status</label>
                                        <div>
                                        <input type="radio" id="Single"  {{$drcapture->marital_status=='Single' ? 'checked':''}}
                                        name="marital_status" value="Single">
                                        <span for="Single">Single</span>
                                    
                                        <input type="radio" id="Married"  {{$drcapture->marital_status=='Married' ? 'checked':''}}
                                        name="marital_status" value="Married">
                                        <span for="Married">Married</span>

                                        <input type="radio" id="Seperated"  {{$drcapture->marital_status=='Seperated' ? 'checked':''}}
                                        name="marital_status" value="Seperated">
                                        <span for="Seperated">Seperated</span>

                                        <input type="radio" id="Widowed"  {{$drcapture->marital_status=='Widowed' ? 'checked':''}}
                                        name="marital_status" value="Widowed">
                                        <span for="Widowed">Widowed</span>

                                        <input type="radio" id="Divorced"  {{$drcapture->marital_status=='Divorced' ? 'checked':''}}
                                        name="marital_status" value="Divorced">
                                        <span for="Divorced">Divorced</span>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Occupation</label>
                                        <div>
                                        <input type="radio" id="Single" {{$drcapture->occupation=='Unemployed' ? 'checked':''}} 
                                        name="occupation" value="Unemployed">
                                        <span for="Unemployed">Unemployed</span>
                                    
                                        <input type="radio" id="Retired" {{$drcapture->occupation=='Retired' ? 'checked':''}} 
                                        name="occupation" value="Retired">
                                        <span for="Retired">Retired</span>
 
                                        <input type="radio" id="Employed" {{$drcapture->occupation=='Employed' ? 'checked':''}} 
                                        name="occupation" value="Employed">
                                        <span for="Employed">Employed</span>

                                        <input type="radio" id="Student" {{$drcapture->occupation=='Student' ? 'checked':''}} 
                                        name="occupation" value="Student">
                                        <span for="Student">Student</span>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="if_employed">If employed, please specify</label>
                                        <input type="text" name="if_employed" id="if_employed" class="form-control"  value="{{$drcapture ? $drcapture->if_employed:''}}" >                                  
                                    </div>
                                    
                                </div>
                                
                                <div class="row form-row">
                                
                                    <div class="form-group col-md-3">
                                    <label for="patient_address">Patient Address</label>
                                    <input type="text" name="patient_address" id="patient_address" class="form-control" placeholder="Patient Address" value="{{$drcapture ? $drcapture->patient_address:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="patient_phone_number">Patient Phone Number</label>
                                        <input type="text" name="patient_phone_number" id="patient_phone_number" class="form-control" placeholder="Patient Phone Number" value="{{$drcapture ? $drcapture->patient_phone_number:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="patient_contact">Name of Patient Contact</label>
                                        <input type="text" name="patient_contact" id="patient_contact" class="form-control" placeholder="Contact Person" value="{{$drcapture ? $drcapture->patient_contact:''}}">                                  
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label for="patient_contact_number">Patient Contact Phone No</label>
                                    <input type="text" name="patient_contact_number" id="patient_contact_number" class="form-control" placeholder="Contact Person Phone Number" value="{{$drcapture ? $drcapture->patient_contact_number:''}}">                                  
                                    </div>
                                
                                    
                                </div>

                                <a class="btn btn-primary btnNext" >Next</a>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <div class="row form-row">
                                    <div class="form-group col-md-6">
                                        <h4>Disease Classification</h4>
                                        <label>A. (Based on Previously Exposure to Anti-TB Drugs): New?</label>
                                        <div>
                                        <input type="radio" id="anti_tb_previous_exposure_yes" {{$drcapture->anti_tb_previous_exposure=='Yes' ? 'checked':''}} 
                                        name="anti_tb_previous_exposure" value="Yes">
                                        <span for="anti_tb_previous_exposure_yes">Yes</span>
                                    
                                        <input type="radio" id="anti_tb_previous_exposure_no" {{$drcapture->anti_tb_previous_exposure=='No' ? 'checked':''}} 
                                        name="anti_tb_previous_exposure" value="No">
                                        <span for="anti_tb_previous_exposure_no">No</span>                                      
                                        </div>

                                    </div>              
                                </div>
                                <div class="row form-row">
                                
                                    <div class="form-group col-md-12">
                                        
                                        <label>(Based on Pattern of Drug Resistance to Anti-TB Drugs): New?</label>
                                        <div>
                                            <input type="radio" id="atbmono"  {{$drcapture->anti_tb_pattern=='Mono-Resistant DR-TB Case' ? 'checked':''}} 
                                            name="anti_tb_pattern" value="Mono-Resistant DR-TB Case">
                                            <span for="atbmono">Mono-Resistant DR-TB Case</span>
                                        
                                            <input type="radio" id="atbpoly"  {{$drcapture->anti_tb_pattern=='Poly-Resistance DR-TB Case' ? 'checked':''}} 
                                            name="anti_tb_pattern" value="Poly-Resistance DR-TB Case">
                                            <span for="atbpoly">Poly-Resistance DR-TB Case</span>

                                            <input type="radio" id="atbmulti"  {{$drcapture->anti_tb_pattern=='Multi-Drug Resistant(MDR)' ? 'checked':''}} 
                                            name="anti_tb_pattern" value="Multi-Drug Resistant(MDR)">
                                            <span for="atbmulti">Multi-Drug Resistant(MDR)</span>

                                            <input type="radio" id="atbextensive"  {{$drcapture->anti_tb_pattern=='Extensively Drug Resistance (XDR)' ? 'checked':''}} 
                                            name="anti_tb_pattern" value="Extensively Drug Resistance (XDR)">
                                            <span for="atbextensive">Extensively Drug Resistance (XDR)</span>

                                            <input type="radio" id="atbrfampicin"  {{$drcapture->anti_tb_pattern=='Rfampicin-Resistant(RR-TB)' ? 'checked':''}} 
                                            name="anti_tb_pattern" value="Rfampicin-Resistant(RR-TB)">
                                            <span for="atbrfampicin">Rfampicin-Resistant(RR-TB)</span>

                                        </div>

                                    </div>

                                    
                                    
                                </div>

                                <div class="row form-row">
                                
                                    <div class="form-group col-md-12">
                                        <label>(Based on Site of Disease Involvement)</label>
                                        <div>
                                        <input type="radio" id="pulmonary" {{$drcapture->disease_site=='Pulmonary' ? 'checked':''}} 
                                        name="disease_site" value="Pulmonary">
                                        <span for="pulmonary">Pulmonary</span>
                                    
                                        <input type="radio" id="extra_pulmonary" {{$drcapture->disease_site=='Extra Pulmonary' ? 'checked':''}} 
                                        name="disease_site" value="Extra Pulmonary">
                                        <span for="extra_pulmonary">Extra Pulmonary(EPTB)</span>                                      
                                        </div>

                                    </div>
                                    
                                </div>

                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>
                            <div class="tab-pane" id="tab3">

                                <div class="row form-row">                                
                                
                                    <div class="form-group col-md-3">
                                        <h5>AFB</h5>                                                                           
                                        <label for="afb_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="afb_dsc"  value="{{$drcapture ? $drcapture->afb_dsc:''}}"
                                        name="afb_dsc" >      
                                        </div>

                                        <label for="afb_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="afb_drr"  value="{{$drcapture ? $drcapture->afb_drr:''}}"
                                        name="afb_drr" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">     
                                        <h5>GeneXpert </h5>                                                                     
                                        <label for="genexpert_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="genexpert_dsc"  value="{{$drcapture ? $drcapture->genexpert_dsc:''}}"
                                        name="genexpert_dsc" >      
                                        </div>

                                        <label for="genexpert_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="genexpert_drr"  value="{{$drcapture ? $drcapture->genexpert_drr:''}}"
                                        name="genexpert_drr" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">  
                                        <h5>Audiometery</h5>                                                                         
                                        <label for="audiometery_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="audiometery_dsc"  value="{{$drcapture ? $drcapture->audiometery_dsc:''}}"
                                        name="audiometery_dsc" >      
                                        </div>

                                        <label for="audiometery_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="audiometery_drr"  value="{{$drcapture ? $drcapture->audiometery_drr:''}}"
                                        name="audiometery_drr" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">    
                                        <h5>Chest Xray</h5>                                                                       
                                        <label for="cxray_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="cxray_dsc"  value="{{$drcapture ? $drcapture->cxray_dsc:''}}"
                                        name="cxray_dsc" >      
                                        </div>

                                        <label for="cxray_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="cxray_drr"  value="{{$drcapture ? $drcapture->cxray_drr:''}}"
                                        name="cxray_drr" >      
                                        </div>
                                    </div>


                                </div>

                                <div class="row form-row">                                
                                
                                    <div class="form-group col-md-3">
                                        <h5>EU/cr</h5>                                                                           
                                        <label for="eucr_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="eucr_dsc"  value="{{$drcapture ? $drcapture->eucr_dsc:''}}"
                                        name="eucr_dsc" >      
                                        </div>

                                        <label for="eucr_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="eucr_drr"  value="{{$drcapture ? $drcapture->eucr_drr:''}}"
                                        name="eucr_drr" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">     
                                        <h5>Preg. Test </h5>                                                                     
                                        <label for="pregtest_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="pregtest_dsc"  value="{{$drcapture ? $drcapture->pregtest_dsc:''}}"
                                        name="pregtest_dsc" >      
                                        </div>

                                        <label for="pregtest_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="pregtest_drr"  value="{{$drcapture ? $drcapture->pregtest_drr:''}}"
                                        name="pregtest_drr" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">  
                                        <h5>LFT</h5>                                                                         
                                        <label for="lft_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="lft_dsc"  value="{{$drcapture ? $drcapture->lft_dsc:''}}"
                                        name="lft_dsc" >      
                                        </div>

                                        <label for="lft_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="lft_drr"  value="{{$drcapture ? $drcapture->lft_drr:''}}"
                                        name="lft_drr" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">    
                                        <h5>TFT</h5>                                                                       
                                        <label for="tft_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="tft_dsc"  value="{{$drcapture ? $drcapture->tft_dsc:''}}"
                                        name="tft_dsc" >      
                                        </div>

                                        <label for="tft_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="tft_drr"  value="{{$drcapture ? $drcapture->tft_drr:''}}"
                                        name="tft_drr" >      
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-row">                                
                                
                                    <div class="form-group col-md-3">
                                        <h5>HIV</h5>                                                                           
                                        <label for="hiv_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="hiv_dsc"  value="{{$drcapture ? $drcapture->hiv_dsc:''}}"
                                        name="hiv_dsc" >      
                                        </div>

                                        <label for="hiv_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="hiv_drr"  value="{{$drcapture ? $drcapture->hiv_drr:''}}"
                                        name="hiv_drr" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">     
                                        <h5>FBS </h5>                                                                     
                                        <label for="fbs_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="fbs_dsc"  value="{{$drcapture ? $drcapture->fbs_dsc:''}}"
                                        name="fbs_dsc" >      
                                        </div>

                                        <label for="fbs_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="fbs_drr"  value="{{$drcapture ? $drcapture->fbs_drr:''}}"
                                        name="fbs_drr" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">  
                                        <h5>Culture</h5>                                                                         
                                        <label for="culture_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="culture_dsc"  value="{{$drcapture ? $drcapture->culture_dsc:''}}"
                                        name="culture_dsc" >      
                                        </div>

                                        <label for="culture_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="culture_drr"  value="{{$drcapture ? $drcapture->culture_drr:''}}"
                                        name="culture_drr" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">    
                                        <h5>Drug Susceptibility Test</h5>                                                                       
                                        <label for="drugsuscep_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="drugsuscep_dsc"  value="{{$drcapture ? $drcapture->drugsuscep_dsc:''}}"
                                        name="drugsuscep_dsc" >      
                                        </div>

                                        <label for="drugsuscep_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="drugsuscep_drr"  value="{{$drcapture ? $drcapture->drugsuscep_drr:''}}"
                                        name="drugsuscep_drr" >      
                                        </div>
                                    </div>


                                </div>

                                <div class="row form-row">                                
                                
                                    <div class="form-group col-md-3">
                                        <h5>FBC</h5>                                                                           
                                        <label for="fbc_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="fbc_dsc"  value="{{$drcapture ? $drcapture->fbc_dsc:''}}"
                                        name="fbc_dsc" >      
                                        </div>

                                        <label for="fbc_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="fbc_drr"  value="{{$drcapture ? $drcapture->fbc_drr:''}}"
                                        name="fbc_drr" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">     
                                        <h5>HBV </h5>                                                                     
                                        <label for="hbv_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="hbv_dsc"  value="{{$drcapture ? $drcapture->hbv_dsc:''}}"
                                        name="hbv_dsc" >      
                                        </div>

                                        <label for="hbv_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="hbv_drr"  value="{{$drcapture ? $drcapture->hbv_drr:''}}"
                                        name="hbv_drr" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">  
                                        <h5>HCV</h5>                                                                         
                                        <label for="hcv_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="hcv_dsc"  value="{{$drcapture ? $drcapture->hcv_dsc:''}}"
                                        name="hcv_dsc" >      
                                        </div>

                                        <label for="hcv_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="hcv_drr"  value="{{$drcapture ? $drcapture->hcv_drr:''}}"
                                        name="hcv_drr" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">    
                                        <h5>Urinalysis</h5>                                                                       
                                        <label for="urinalysis_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="urinalysis_dsc"  value="{{$drcapture ? $drcapture->urinalysis_dsc:''}}"
                                        name="urinalysis_dsc" >      
                                        </div>

                                        <label for="urinalysis_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="urinalysis_drr"  value="{{$drcapture ? $drcapture->urinalysis_drr:''}}"
                                        name="urinalysis_drr" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">    
                                        <h5>ECG</h5>                                                                       
                                        <label for="ecg_dsc">Date sample collected</label>
                                        <div>                                      
                                        <input type="date" id="ecg_dsc"  value="{{$drcapture ? $drcapture->ecg_dsc:''}}"
                                        name="ecg_dsc" >      
                                        </div>
    
                                        <label for="ecg_drr">Date result released</label>
                                        <div>                                      
                                        <input type="date" id="ecg_drr"  value="{{$drcapture ? $drcapture->ecg_drr:''}}"
                                        name="ecg_drr" >      
                                        </div>
                                    </div>


                                </div>

                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>
                            <div class="tab-pane" id="tab4">

                                <div class="row form-row">
                                
                                    
                                    
                                
                                    <div class="form-group col-md-4">
                                        <label>Was Patient Ever Tested for HIV</label>
                                        <div>
                                        <input type="radio" id="tested_hiv_yes" {{$drcapture->tested_hiv=='Yes' ? 'checked':''}} 
                                        name="tested_hiv" value="Yes">
                                        <span for="tested_hiv_yes">Yes</span>
                                    
                                        <input type="radio" id="tested_hiv_no" {{$drcapture->tested_hiv=='No' ? 'checked':''}} 
                                        name="tested_hiv" value="No">
                                        <span for="tested_hiv_no">No</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="hiv_test_date">If Yes, Date Test Done (dd/mm/yyyy)</label>
                                        <div>
                                        
                                        <input type="date" id="hiv_test_date"
                                        name="hiv_test_date"  value="{{$drcapture ? $drcapture->hiv_test_date:''}}">
                                                                                
                                        </div>

                                    </div>


                                    
                                    
                                </div>
                                <div class="row form-row">
                                
                                    <div class="form-group col-md-4">
                                        <label>HIV Test Result</label>
                                        <div>
                                        <input type="radio" id="hiv_positive" {{$drcapture->hiv_result=='Positive' ? 'checked':''}} 
                                        name="hiv_result" value="Positive">
                                        <span for="hiv_postitive">Positive</span>
                                    
                                        <input type="radio" id="hiv_negative" {{$drcapture->hiv_result=='Negative' ? 'checked':''}} 
                                        name="hiv_result" value="Negative">
                                        <span for="hiv_negative">Negative</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>If Positive, Was Patient Ever started on ART?</label>
                                        <div>
                                        <input type="radio" id="positive_hiv_yes" {{$drcapture->positive_hiv=='Yes' ? 'checked':''}} 
                                        name="positive_hiv" value="Yes">
                                        <span for="positive_hiv_yes">Yes</span>
                                    
                                        <input type="radio" id="positive_hiv_no" {{$drcapture->positive_hiv=='No' ? 'checked':''}} 
                                        name="positive_hiv" value="No">
                                        <span for="positive_hiv_no">No</span>                                      
                                        </div>

                                    </div>


                                    <div class="form-group col-md-4">
                                        <label for="art_start_date">If Yes, ART Start Date (dd/mm/yyyy)</label>
                                        <div>
                                        
                                        <input type="date" id="art_start_date" value="{{$drcapture ? $drcapture->art_start_date:''}}"
                                        name="art_start_date" >
                                                                                
                                        </div>

                                    </div>
                                    
                                </div>

                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>
                            <div class="tab-pane" id="tab5">

                                <div class="row form-row">
                                    <div class="form-group col-md-4">
                                        <label>Treatment Started?</label>
                                        <div>
                                        <input type="radio" id="treatment_started_yes" {{$drcapture->treatment_started=='Yes' ? 'checked':''}} 
                                        name="treatment_started" value="Yes">
                                        <span for="treatment_started_yes">Yes</span>
                                    
                                        <input type="radio" id="treatment_started_no" {{$drcapture->treatment_started=='No' ? 'checked':''}} 
                                        name="treatment_started" value="No">
                                        <span for="treatment_started_no">No</span>                                      
                                        </div>

                                    </div>


                                    <div class="form-group col-md-4">
                                        <label for="date_treatment_started">If Yes, Date Treatment Started (dd/mm/yyyy)</label>
                                        <div>
                                        
                                        <input type="date" id="date_treatment_started" value="{{$drcapture ? $drcapture->date_treatment_started:''}}"
                                        name="date_treatment_started" >
                                                                                
                                        </div>

                                    </div>
                                
                                    <div class="form-group col-md-4">
                                        <label>Where was treatment Initiated?</label>
                                        <div>
                                        <input type="radio" id="community" {{$drcapture->where_treatment_initiated=='Community' ? 'checked':''}} 
                                        name="where_treatment_initiated" value="Community">
                                        <span for="community">Community</span>
                                    
                                        <input type="radio" id="treatment_center" {{$drcapture->where_treatment_initiated=='Treatment Center' ? 'checked':''}} 
                                        name="where_treatment_initiated" value="Treatment Center">
                                        <span for="treatment_center">Treatment Center</span>                                      
                                        </div>

                                    </div>

                                   
                                </div>
                                <div class="row form-row">

                                    <div class="form-group col-md-3">
                                        <label>Did Patient Have a Treatment Supporter</label>
                                        <div>
                                        <input type="radio" id="treatment_supporter_yes" {{$drcapture->treatment_supporter=='Yes' ? 'checked':''}} 
                                        name="treatment_supporter" value="Yes">
                                        <span for="treatment_supporter_yes">Yes</span>
                                    
                                        <input type="radio" id="treatment_supporter_no" {{$drcapture->treatment_supporter=='No' ? 'checked':''}} 
                                        name="treatment_supporter" value="No">
                                        <span for="treatment_supporter_no">No</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>If Yes, Relationship;</label>
                                        <div>
                                        <input type="radio" id="relationship_healthcareworker" {{$drcapture->relationship=='Healthcare Worker' ? 'checked':''}} 
                                        name="relationship" value="Healthcare Worker">
                                        <span for="relationship_healthcareworker">Healthcare Worker</span>
                                    
                                        <input type="radio" id="relationship_religious_leader" {{$drcapture->relationship=='Religious Leader' ? 'checked':''}} 
                                        name="relationship" value="Religious Leader">
                                        <span for="relationship_religious_leader">Religious Leader</span>
                                        
                                        <input type="radio" id="relationship_friend" {{$drcapture->relationship=='Friend' ? 'checked':''}} 
                                        name="relationship" value="Friend">
                                        <span for="relationship_friend">Friend</span>

                                        <input type="radio" id="relationship_relative" {{$drcapture->relationship=='Relative' ? 'checked':''}} 
                                        name="relationship" value="Relative">
                                        <span for="relationship_relative">Relative</span>

                                        <input type="radio" id="relationship_others" {{$drcapture->relationship=='Others' ? 'checked':''}} 
                                        name="relationship" value="Others">
                                        <span for="relationship_others">Others</span>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="last_support_date">Date last supported (dd/mm/yyyy)</label>
                                        <div>
                                        
                                        <input type="date" id="last_support_date" value="{{$drcapture ? $drcapture->last_support_date:''}}"
                                        name="last_support_date" >
                                                                                
                                        </div>

                                    </div>

                                  
                                </div>

                                <div class="row form-row">

                                    <div class="form-group col-md-6">
                                        <label>Treatment Outcome</label>
                                        <div>
                                        <input type="radio" id="to_cured" {{$drcapture->treatment_outcome=='Cured' ? 'checked':''}} 
                                        name="treatment_outcome" value="Cured">
                                        <span for="to_cured">Cured</span>
                                    
                                        <input type="radio" id="to_failure" {{$drcapture->treatment_outcome=='Failure' ? 'checked':''}} 
                                        name="treatment_outcome" value="Failure">
                                        <span for="to_failure">Failure</span>
                                        
                                        <input type="radio" id="to_stillon" {{$drcapture->treatment_outcome=='Still on Treatment' ? 'checked':''}} 
                                        name="treatment_outcome" value="Still on Treatment">
                                        <span for="to_stillon">Still on Treatment</span>

                                        <input type="radio" id="to_completed" {{$drcapture->treatment_outcome=='Treatment Completed' ? 'checked':''}} 
                                        name="treatment_outcome" value="Treatment Completed">
                                        <span for="to_completed">Treatment Completed</span>

                                        <input type="radio" id="to_losttofollowup" {{$drcapture->treatment_outcome=='Lost to Followup' ? 'checked':''}} 
                                        name="treatment_outcome" value="Lost to Followup">
                                        <span for="to_losttofollowup">Lost to Followup</span>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="to_date">Treatment Outcome Date (dd/mm/yyyy)</label>
                                        <div>
                                        
                                        <input type="date" id="to_date" value="{{$drcapture ? $drcapture->to_date:''}}"
                                        name="to_date" >
                                                                                
                                        </div>

                                    </div>

                                  
                                </div>

                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>
                            <div class="tab-pane" id="tab6">
                                

                                <div class="row form-row">
                                   
                                    <div class="form-group col-md-3">
                                        <label>Diabetes Mellitus</label>
                                        <div>
                                        <input type="radio" id="diabetes_mellitus_yes" {{$drcapture->diabetes_mellitus=='Yes' ? 'checked':''}} 
                                        name="diabetes_mellitus" value="Yes">
                                        <span for="diabetes_mellitus_yes">Yes</span>
                                    
                                        <input type="radio" id="diabetes_mellitus_no" {{$drcapture->diabetes_mellitus=='No' ? 'checked':''}} 
                                        name="diabetes_mellitus" value="No">
                                        <span for="diabetes_mellitus_no">No</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="dmdate_last_assessment">Date of Last Assessment(dd/mm/yy)</label>
                                        <div>                                      
                                        <input type="date" id="dmdate_last_assessment"  value="{{$drcapture ? $drcapture->dmdate_last_assessment:''}}"
                                        name="dmdate_last_assessment" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="dmresult">Result</label>
                                        <div>                                      
                                        <input type="text" id="dmresult"  value="{{$drcapture ? $drcapture->dmresult:''}}"
                                        name="dmresult" placeholder="Enter Result" >      
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-row">
                                   
                                    <div class="form-group col-md-3">
                                        <label>Hypertension</label>
                                        <div>
                                        <input type="radio" id="hypertension_yes" {{$drcapture->hypertension=='Yes' ? 'checked':''}} 
                                        name="hypertension" value="Yes">
                                        <span for="hypertension_yes">Yes</span>
                                    
                                        <input type="radio" id="hypertension_no" {{$drcapture->hypertension=='No' ? 'checked':''}} 
                                        name="hypertension" value="No">
                                        <span for="hypertension_no">No</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="hypdate_last_assessment">Date of Last Assessment(dd/mm/yy)</label>
                                        <div>                                      
                                        <input type="date" id="hypdate_last_assessment"  value="{{$drcapture ? $drcapture->hypdate_last_assessment:''}}"
                                        name="hypdate_last_assessment" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="hypresult">Result</label>
                                        <div>                                      
                                        <input type="text" id="hypresult"  value="{{$drcapture ? $drcapture->hypresult:''}}"
                                        name="hypresult"  placeholder="Enter Result" >      
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-row">
                                   
                                    <div class="form-group col-md-3">
                                        <label>Renal Disease</label>
                                        <div>
                                        <input type="radio" id="renal_disease_yes" {{$drcapture->renal_disease=='Yes' ? 'checked':''}} 
                                        name="renal_disease" value="Yes">
                                        <span for="renal_disease_yes">Yes</span>
                                    
                                        <input type="radio" id="renal_disease_no" {{$drcapture->renal_disease=='No' ? 'checked':''}} 
                                        name="renal_disease" value="No">
                                        <span for="renal_disease_no">No</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="rddate_last_assessment">Date of Last Assessment(dd/mm/yy)</label>
                                        <div>                                      
                                        <input type="date" id="rddate_last_assessment"  value="{{$drcapture ? $drcapture->rddate_last_assessment:''}}"
                                        name="rddate_last_assessment" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="rdresult">Result</label>
                                        <div>                                      
                                        <input type="text" id="rdresult"  value="{{$drcapture ? $drcapture->rdresult:''}}"
                                        name="rdresult" placeholder="Enter Result"  >      
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-row">
                                   
                                    <div class="form-group col-md-3">
                                        <label>Liver Disease</label>
                                        <div>
                                        <input type="radio" id="liver_disease_yes" {{$drcapture->liver_disease=='Yes' ? 'checked':''}} 
                                        name="liver_disease" value="Yes">
                                        <span for="liver_disease_yes">Yes</span>
                                    
                                        <input type="radio" id="liver_disease_no" {{$drcapture->liver_disease=='No' ? 'checked':''}} 
                                        name="liver_disease" value="No">
                                        <span for="liver_disease_no">No</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="livddate_last_assessment">Date of Last Assessment(dd/mm/yy)</label>
                                        <div>                                      
                                        <input type="date" id="livddate_last_assessment"  value="{{$drcapture ? $drcapture->livddate_last_assessment:''}}"
                                        name="livddate_last_assessment" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="livdresult">Result</label>
                                        <div>                                      
                                        <input type="text" id="livdresult"  value="{{$drcapture ? $drcapture->livdresult:''}}"
                                        name="livdresult"  placeholder="Enter Result" >      
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-row">
                                   
                                    <div class="form-group col-md-3">
                                        <label>Thyroid Disease</label>
                                        <div>
                                        <input type="radio" id="thyroid_disease_yes" {{$drcapture->thyroid_disease=='Yes' ? 'checked':''}} 
                                        name="thyroid_disease" value="Yes">
                                        <span for="thyroid_disease_yes">Yes</span>
                                    
                                        <input type="radio" id="thyroid_disease_no" {{$drcapture->thyroid_disease=='No' ? 'checked':''}} 
                                        name="thyroid_disease" value="No">
                                        <span for="thyroid_disease_no">No</span>                                      
                                        </div>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="thddate_last_assessment">Date of Last Assessment(dd/mm/yy)</label>
                                        <div>                                      
                                        <input type="date" id="thddate_last_assessment"  value="{{$drcapture ? $drcapture->thddate_last_assessment:''}}"
                                        name="thddate_last_assessment" >      
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="thdresult">Result</label>
                                        <div>                                      
                                        <input type="text" id="thdresult"  value="{{$drcapture ? $drcapture->thdresult:''}}"
                                        name="thdresult"  placeholder="Enter Result" >      
                                        </div>
                                    </div>
                                </div>

                              
                                <a class="btn btn-primary btnPrevious" >Previous</a><a class="btn btn-primary btnNext" >Next</a>
                                
                            </div>
                            <div class="tab-pane" id="tab7">
                               

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

                                <div class="row form-row">
                                    <small>Is there a regular clinician review (evidenced by the consultation note)</small>
                                    <div class="form-group col-md-6">
                                        
                                    <label for="num_contacts_traced">Community (once a month)</label>
                                        <div>
                                        <input type="radio" id="community_once_yes" {{$drcapture->community_once=='Diagnosis' ? 'checked':''}} 
                                        name="community_once" value="Diagnosis">
                                        <span for="community_once_yes">Diagnosis</span>
                                    
                                        <input type="radio" id="community_once_no" {{$drcapture->community_once=='Follow-up' ? 'checked':''}} 
                                        name="community_once" value="No">
                                        <span for="community_once_no">Follow-up</span>                                      
                                        </div>                                  
                                    </div>

                                
                                    <div class="form-group col-md-6">
                                    <label for="num_contacts_traced">Facility (once a month)</label>
                                        <div>
                                        <input type="radio" id="facility_once_yes" {{$drcapture->facility_once=='Yes' ? 'checked':''}} 
                                        name="facility_once" value="Yes">
                                        <span for="facility_once_yes">Yes</span>
                                    
                                        <input type="radio" id="facility_once_no" {{$drcapture->facility_once=='No' ? 'checked':''}} 
                                        name="facility_once" value="No">
                                        <span for="facility_once_no">No</span>                                      
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