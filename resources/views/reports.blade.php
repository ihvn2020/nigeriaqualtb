@extends('layouts.theme')

@section('content')
    <h3 class="page-title">Security | <small style="color: green">Securing your app</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">                    
                        <h4>REPORTING PERIOD: From: {{date("D, d M Y", strtotime($from))}} To: {{date("D, d M Y", strtotime($to))}}</h4>
                        <hr>
                </div>
                <div class="panel-body">

                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Indicator</th>
                                <th>Variables</th>
                                <th>Value</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">1.	Proportion of hospital attendees within the review period who were symptomatically screened for TB disaggregated by age U15 and 5+
                                        
                                        
                                        </td>
                                    <td>Numerator: Number of hospital attendees within the review period who were symptomatically screened for TB disaggregated by age U15 and 5<br>
                                        +Denominator: Total number of hospital attendees within the review period
                                    <td>
                                        <table class="table">
                                                <tr style="font-weight: bold;">
                                                    <td>U15: {{$allreports->where('age','<',15)->get()->count()}}</td>
                                                    <td>15+: {{$allreports->where('age','>',14)->get()->count()}}</td>
                                                </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td scope="row">2.	Proportion of bacteriologically diagnosed index TB patients during the review period who had their household contacts traced within one month of treatment initiation (disaggregated by age U5 and 5+).
                                        
                                        
                                        </td>
                                    <td>Numerator: Number of bacteriologically diagnosed index TB patients during the review period who had their household contacts traced within one month of treatment initiation<br>
                                        Denominator: Total number of bacteriologically diagnosed index TB patients during the review period.</td>
                                    <td>
                                        <table class="table">
                                                <tr style="font-weight: bold;">
                                                    
                                                    <td>U15: {{$allreports->where('age','<',15)->where('bactdiagnosed','Yes')->whereRaw('datediff(treatment_startdate, date_tracingdone) < 32')->count() / ($allreports->where('age','<',15)->where('bactdiagnosed','Yes')->count()?:1)}}</td>
                                                    <td>15+: {{$allreports->where('age','>',14)->where('bactdiagnosed','Yes')->whereRaw('datediff(treatment_startdate, date_tracingdone) < 32')->count() / ($allreports->where('age','>',14)->where('bactdiagnosed','Yes')->count()?:1)}}</td>
                                                </tr>
                                        </table>
                                    </td>
                                </tr>


                                <tr>
                                    <td scope="row">3.	Proportion of presumptive TB cases identified within the review period evaluated for TB using WHO Rapid Diagnostics (Xpert MTB RIF assay, TB LAMP, LF LAM, TrueNat) or AFB microscopy.
                                        
                                        
                                        </td>
                                    <td>Numerator: Number of presumptive TB cases identified within the review period evaluated for TB using WHO Rapid Diagnostics<br>
                                        Denominator: Total number of presumptive TB cases identified within the review period evaluated</td>
                                    <td>
                                        <table class="table">
                                                <tr style="font-weight: bold;">
                                                    <td>{{$allreports->where('bactdiagnosed','Yes')->count() / ($screenings->where('presumptive','Yes')->count()?:1)}}</td>
                                                </tr>
                                        </table>
                                    </td>
                                </tr>
                               
                            </tbody>
                    </table>
                </div>
            </div>
        
    </div>
    
@endsection