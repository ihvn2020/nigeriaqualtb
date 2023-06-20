@extends('layouts.print-theme')
<style>
    .result {
        font-weight: 900;
        background-color: white;
        position: relative;
        float: right;
        width: 50px;
        height: 25px;
        text-align: center;
        font-size: 1em;
        border: solid 1px green;
        border-radius: 20px;
        color: green;
        display: none;
        visibility: hidden;
    }
</style>
@section('content')
    <h3 class="page-title" style="text-align: center !important">AGGREGATE REPORT</h3>
    <div class="row">
        <div class="panel" style="width: 90%; margin: auto;">
            @if (Session::get('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <i class="fa fa-check-circle"></i> {!! Session::get('message') !!}
                </div>
            @endif
            <div class="panel-body">
                <div style="text-align: center">
                    <h3 style="color: green"><b>Title: </b>{{ $report->title }}</h3>
                    <h4><b>Facility:</b> {{ $report->faciliti->facility_name }}</h4>
                    <h5><b>Duration:From:</b> {{ $report->from }} To {{ $report->to }}</h5>
                </div>
                <fieldset>
                    <h3>DSTB</h3>
                    <hr>
                    <div class="row">
                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">Proportion of hospital attendees within the review period who were
                                symptomatically screened for TB disaggregated by age U15 and 15+ - <small
                                    style="color:red;"><i>Benchmark: 100%</i></small>
                                <div class="result" id="ndstb1value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>0-14yrs</th>
                                            <th>15+yrs</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb1) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb1u15) }} / {{ strval($report->ddstb1) }} =
                                                    {{ $bm1a = number_format($report->ndstb1u15 / $report->ddstb1, 2) * 100 }}%
                                                    @if (isset($report->issues))
                                                    @if($report->issues->where('indicator_no',1)->count()>0)
                                                        <ul style="color: grey;">
                                                            @foreach ($report->issues->where('indicator_no', 1) as $issue)
                                                                <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                                            @endforeach
                                                        </ul>
                                                    @else

                                                        @if (isset($bm1a) && $bm1a < 100)
                                                            <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                                    issue(s)</i></small>
                                                        @endif
                                                    @endif
                                                @endif
                                                </td>
                                                <td>{{ strval($report->ndstb1a15) }} / {{ strval($report->ddstb1) }} =
                                                    {{ $bm1b = number_format($report->ndstb1a15 / $report->ddstb1, 2) * 100 }}%
                                                    @if (isset($report->issues))
                                                    @if($report->issues->where('indicator_no',1)->count()>0)
                                                        <ul style="color: grey;">
                                                            @foreach ($report->issues->where('indicator_no', 1) as $issue)
                                                                <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                                            @endforeach
                                                        </ul>
                                                    @else

                                                        @if (isset($bm1b) && $bm1b < 100)
                                                            <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                                    issue(s)</i></small>
                                                        @endif
                                                    @endif
                                                @endif
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="panel panel-default  col-sm-6">
                            <div class="panel-heading">Proportion of bacteriologically diagnosed index TB patients during
                                the review period who had their household contacts traced within one month of treatment
                                initiation (disaggregated by age U15 and 15+).<div class="result" id="ndstb2value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>0-14yrs</th>
                                            <th>15+yrs</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb2) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb2u15) }} / {{ strval($report->ddstb2) }} =
                                                    {{ $ds2a = number_format($report->ndstb2u15 / $report->ddstb2, 2) * 100 }}%
                                                    @if (isset($report->issues))
                                                    @if($report->issues->where('indicator_no',2)->count()>0)
                                                        <ul style="color: grey;">
                                                            @foreach ($report->issues->where('indicator_no', 2) as $issue)
                                                                <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                                            @endforeach
                                                        </ul>
                                                    @else

                                                        @if ($ds2a < 100)
                                                            <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                                    issue(s)</i></small>
                                                        @endif
                                                    @endif
                                                @endif
                                                </td>
                                                <td>{{ strval($report->ndstb2a15) }} / {{ strval($report->ddstb2) }} =
                                                    {{ $ds2b = number_format($report->ndstb2a15 / $report->ddstb2, 2) * 100 }}%
                                                    @if (isset($report->issues))
                                                    @if($report->issues->where('indicator_no',2)->count()>0)
                                                        <ul style="color: grey;">
                                                            @foreach ($report->issues->where('indicator_no', 2) as $issue)
                                                                <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                                            @endforeach
                                                        </ul>
                                                    @else

                                                        @if (isset($ds2b) && $ds2b < 100)
                                                            <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                                    issue(s)</i></small>
                                                        @endif
                                                    @endif
                                                @endif
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="panel panel-default col-sm-6">

                            <div class="panel-heading">3. Proportion of eligible U5 and above 5 contacts of
                                bacteriologically positive TB cases who were initiated on TPT.<div class="result"
                                    id="ndstb3value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb3) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb3u) }} / {{ strval($report->ddstb3) }} =
                                                    {{ $ds3 = number_format($report->ndstb3u / $report->ddstb3, 2) * 100 }}%</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                @if($report->issues->where('indicator_no',3)->count()>0)
                                    <ul style="color: grey;">
                                        @foreach ($report->issues->where('indicator_no', 3) as $issue)
                                            <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                        @endforeach
                                    </ul>
                                @else

                                    @if (isset($ds3) && $ds3 < 100)
                                        <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                issue(s)</i></small>
                                    @endif
                                @endif
                            @endif
                            </div>
                        </div>

                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">4. Proportion of presumptive TB cases identified within the review
                                period evaluated for TB using WHO Rapid Diagnostics (Xpert MTB RIF assay, TB LAMP, LF LAM,
                                TrueNat)<div class="result" id="ndstb4value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb4) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb4u) }} / {{ strval($report->ddstb4) }} =
                                                    {{ $ds4 = number_format($report->ndstb4u / $report->ddstb4, 2) * 100 }}%</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                @if($report->issues->where('indicator_no',4)->count()>0)
                                    <ul style="color: grey;">
                                        @foreach ($report->issues->where('indicator_no', 4) as $issue)
                                            <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                        @endforeach
                                    </ul>
                                @else

                                    @if (isset($ds4) &&  $ds4 < 75)
                                        <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                issue(s)</i></small>
                                    @endif
                                @endif
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">5. Proportion of presumptive TB cases identified within the review
                                period whose sample (sputum/stool specimen) were sent to GeneXpert Lab and had their results
                                received within 72 hrs of sending sputum specimen to Lab<div class="result"
                                    id="ndstb5value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb5) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb5u) }} / {{ strval($report->ddstb5) }} =
                                                    {{ $ds5 = number_format($report->ndstb5u / $report->ddstb5, 2) * 100 }}%</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                @if($report->issues->where('indicator_no',5)->count()>0)
                                    <ul style="color: grey;">
                                        @foreach ($report->issues->where('indicator_no', 5) as $issue)
                                            <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                        @endforeach
                                    </ul>
                                @else

                                    @if (isset($ds5) &&  $ds5 < 100)
                                        <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                issue(s)</i></small>
                                    @endif
                                @endif
                            @endif
                            </div>
                        </div>

                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">6. Proportion of confirmed TB cases diagnosed within the review
                                period that have initiated treatment for TB within two days of diagnosis<div class="result"
                                    id="ndstb6value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb6) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb6u) }} / {{ strval($report->ddstb6) }} =
                                                    {{ $ds6 = number_format($report->ndstb6u / $report->ddstb6, 2) * 100 }}%</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                @if($report->issues->where('indicator_no',6)->count()>0)
                                    <ul style="color: grey;">
                                        @foreach ($report->issues->where('indicator_no', 6) as $issue)
                                            <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                        @endforeach
                                    </ul>
                                @else

                                    @if (isset($ds6) && $ds6 < 100)
                                        <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                issue(s)</i></small>
                                    @endif
                                @endif
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">7.  Proportion of DS-TB cases with positive baseline sputum smear or Xpert MTB/RIF started on treatment within the review period who are due for and with documented  (2, 5 or 6)  follow-up test
                                <div class="result" id="ndstb7value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb7) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb7u) }} / {{ strval($report->ddstb7) }} =
                                                    {{ $ds7 = number_format($report->ndstb7u / $report->ddstb7, 2) * 100 }}%</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                    @if($report->issues->where('indicator_no',7)->count()>0)
                                        <ul style="color: grey;">
                                            @foreach ($report->issues->where('indicator_no', 7) as $issue)
                                                <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                            @endforeach
                                        </ul>
                                    @else

                                        @if (isset($ds7) && $ds7 < 100)
                                            <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                    issue(s)</i></small>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">8. Proportion of DS-TB patients started on treatment within the review period with complete documentation in the treatment card and the TB facility
                                (treatment) register.<div class="result" id="ndstb8value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb8) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb8u) }} / {{ strval($report->ddstb8) }} =
                                                    {{ $ds8 = number_format($report->ndstb8u / $report->ddstb8, 2) * 100 }}%</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                    @if($report->issues->where('indicator_no',8)->count()>0)
                                        <ul style="color: grey;">
                                            @foreach ($report->issues->where('indicator_no', 8) as $issue)
                                                <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                            @endforeach
                                        </ul>
                                    @else

                                        @if (isset($ds8) && $ds8 < 100)
                                            <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                    issue(s)</i></small>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <h3>DRTB</h3>
                    <hr>
                    <div class="row">
                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">1. Proportion of all DR-TB cases diagnosed during the review period
                                who initiated treatment for DR-TB within two weeks of diagnosis.<div class="result"
                                    id="ndstb9value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb9) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb9u) }} / {{ strval($report->ddstb9) }} =
                                                    {{ $dr1 = number_format($report->ndstb9u / $report->ddstb9, 2) * 100 }}%</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                    @if($report->issues->where('indicator_no',9)->count()>0)
                                        <ul style="color: grey;">
                                            @foreach ($report->issues->where('indicator_no', 9) as $issue)
                                                <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                            @endforeach
                                        </ul>
                                    @else

                                        @if (isset($dr1) && $dr1 < 100)
                                            <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                    issue(s)</i></small>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">2. Proportion of patients started on second-line TB treatment during
                                the 6 months review period who have their baseline (LPA, X-ray, AFB, HIV test, EUCr,
                                Pregnancy test, LFT, TFT, FBS, FBC, HBV, HCV, Urinalysis, ECG) results documented after 2
                                weeks of sample collection.<div class="result" id="ndstb10value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb10) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb10u) }} / {{ strval($report->ddstb10) }} =
                                                    {{ $dr2 = number_format($report->ndstb10u / $report->ddstb10, 2) * 100 }}%
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                    @if($report->issues->where('indicator_no',10)->count()>0)
                                        <ul style="color: grey;">
                                            @foreach ($report->issues->where('indicator_no', 10) as $issue)
                                                <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                            @endforeach
                                        </ul>
                                    @else

                                        @if (isset($dr2) && $dr2 < 100)
                                            <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                    issue(s)</i></small>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">3. Proportion of patients started on second-line TB treatment 9 or
                                12 months prior to the beginning of review period (i.e. 9 or 12 months after the closing day
                                of the cohort) who have their follow-up examinations (AFB, Culture, EUCr, ECG done monthly
                                during the intensive phase within the review period.<div class="result" id="ndstb11value">3
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb11) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb11u) }} / {{ strval($report->ddstb11) }} =
                                                    {{ $dr3 = number_format($report->ndstb11u / $report->ddstb11, 2) * 100 }}%
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                    @if($report->issues->where('indicator_no',11)->count()>0)
                                        <ul style="color: grey;">
                                            @foreach ($report->issues->where('indicator_no', 11) as $issue)
                                                <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                            @endforeach
                                        </ul>
                                    @else

                                        @if (isset($dr3) && $dr3 < 100)
                                            <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                    issue(s)</i></small>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">4. Proportion of DR-TB patients started on treatment 6 months within the review period with complete documentation in the treatment card and the DR-TB
                                facility (treatment) register.<div class="result" id="ndstb12value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb12) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb12u) }} / {{ strval($report->ddstb12) }} =
                                                    {{ $dr4 = number_format($report->ndstb12u / $report->ddstb12, 2) * 100 }}%
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                @if($report->issues->where('indicator_no',12)->count()>0)
                                    <ul style="color: grey;">
                                        @foreach ($report->issues->where('indicator_no', 12) as $issue)
                                            <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                        @endforeach
                                    </ul>
                                @else

                                    @if (isset($dr4) && $dr4 < 100)
                                        <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                issue(s)</i></small>
                                    @endif
                                @endif
                            @endif
                            </div>
                        </div>
                    </div>

                </fieldset>

                <fieldset>
                    <h3>PAEDIATRICS</h3>
                    <hr>
                    <div class="row">
                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">1. Proportion of presumptive paediatric TB cases under 15 years
                                identified within the review period who had access to either chest X-ray and/or Xpert
                                MTB?RIF and/or stool depending on the age<div class="result" id="ndstb13value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb13) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb13u) }} / {{ strval($report->ddstb13) }} =
                                                    {{ $pd1 = number_format($report->ndstb13u / $report->ddstb13, 2) * 100 }}%
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                @if($report->issues->where('indicator_no',13)->count()>0)
                                    <ul style="color: grey;">
                                        @foreach ($report->issues->where('indicator_no', 13) as $issue)
                                            <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                        @endforeach
                                    </ul>
                                @else

                                    @if (isset($pd1) && $pd1 < 100)
                                        <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                issue(s)</i></small>
                                    @endif
                                @endif
                            @endif
                            </div>
                        </div>

                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">2. Proportion of children under 15 years diagnosed with TB within
                                the review period.<div class="result" id="ndstb15value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb15) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb15u) }} / {{ strval($report->ddstb15) }} =
                                                    {{ $pd2 = number_format($report->ndstb15u / $report->ddstb15, 2) * 100 }}%
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                @if($report->issues->where('indicator_no',15)->count()>0)
                                    <ul style="color: grey;">
                                        @foreach ($report->issues->where('indicator_no',15) as $issue)
                                            <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                        @endforeach
                                    </ul>
                                @else

                                    @if (isset($pd2) && $pd2 < 15)
                                        <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                issue(s)</i></small>
                                    @endif
                                @endif
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">3. Proportion of patients under 15 years among confirmed TB cases
                                diagnosed within the review period that have initiated treatment for TB within two days of
                                diagnosis.<div class="result" id="ndstb16value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb16) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb16u) }} / {{ strval($report->ddstb16) }} =
                                                    {{ $pd3 = number_format($report->ndstb16u / $report->ddstb16, 2) * 100 }}%
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                @if($report->issues->where('indicator_no',16)->count()>0)
                                    <ul style="color: grey;">
                                        @foreach ($report->issues->where('indicator_no',16) as $issue)
                                            <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                        @endforeach
                                    </ul>
                                @else

                                    @if (isset($pd3) && $pd3 < 100)
                                        <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                issue(s)</i></small>
                                    @endif
                                @endif
                            @endif
                            </div>
                        </div>


                    </div>

                </fieldset>

                <fieldset>
                    <h3>FACILITY PERFORMANCE</h3>
                    <hr>
                    <div class="row">
                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">1. Proportion of health care workers (HCW) in the DOT and Laboratory clinics who were screened for TB
                                12 months prior to the review period.<div class="result" id="ndstb18value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb18) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb18u) }} / {{ strval($report->ddstb18) }} =
                                                    {{ $fa1 = number_format($report->ndstb18u / $report->ddstb18, 2) * 100 }}%
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                @if($report->issues->where('indicator_no',18)->count()>0)
                                    <ul style="color: grey;">
                                        @foreach ($report->issues->where('indicator_no', 18) as $issue)
                                            <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                        @endforeach
                                    </ul>
                                @else

                                    @if (isset($fa1) && $fa1 < 100)
                                        <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                issue(s)</i></small>
                                    @endif
                                @endif
                            @endif
                            </div>
                        </div>

                        <div class="panel panel-default col-sm-6">
                            <div class="panel-heading">2. Proportion of infection control strategies in place at the
                                facility (i.e. IPC plan and policy, IPC guidelines, IPC focal person, IPC committee [minutes
                                of meeting], IEC materials, evidence of use of IPC checklist to monitor implementation
                                monthly)<div class="result" id="ndstb19value">3</div>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Percentage Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (strval($report->ddstb19) > 0)
                                            <tr>
                                                <td>{{ strval($report->ndstb19u) }} / {{ strval($report->ddstb19) }} =
                                                    {{ $fa2 = number_format($report->ndstb19u / $report->ddstb19, 2) * 100 }}%
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>
                                                    0/0 = 0%
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                @if (isset($report->issues))
                                @if($report->issues->where('indicator_no',19)->count()>0)
                                    <ul style="color: grey;">
                                        @foreach ($report->issues->where('indicator_no', 19) as $issue)
                                            <li>{{ $issue->issues }} - <small><i>C: {{ $issue->comment }}</i> </small></li>
                                        @endforeach
                                    </ul>
                                @else

                                    @if (isset($fa2) && $fa2 < 100)
                                        <small style="color:red;"><i class="lnr lnr-warning"></i><i>Less than Benchmark 100%, please report
                                                issue(s)</i></small>
                                    @endif
                                @endif
                            @endif
                            </div>
                        </div>
                    </div>
                </fieldset>


                <fieldset>
                    <h3>Highlight Observed Issues</h3>
                    <hr>
                    <form method="POST" action="{{ route('reportissues') }}">

                        @csrf

                        <input type="hidden" name="aggreport_id" value="{{ $report->id }}">
                        <input type="hidden" name="entered_by" value="{{ Auth()->user()->id }}">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="indicator_no">Select indicator Number</label>
                                <select name="indicator_no" id="indicator_no" class="form-control">
                                    <option value="1">DSTB Indicator 1</option>
                                    <option value="2">DSTB Indicator 2</option>
                                    <option value="3">DSTB Indicator 3</option>
                                    <option value="4">DSTB Indicator 4</option>
                                    <option value="5">DSTB Indicator 5</option>
                                    <option value="6">DSTB Indicator 6</option>
                                    <option value="7">DSTB Indicator 7</option>
                                    <option value="8">DSTB Indicator 8</option>

                                    <option value="9">DRTB Indicator 1</option>
                                    <option value="10">DRTB Indicator 2</option>
                                    <option value="11">DRTB Indicator 3</option>
                                    <option value="12">DRTB Indicator 4</option>

                                    <option value="13">PAEDIATRICS Indicator 1</option>
                                    <option value="15">PAEDIATRICS Indicator 2</option>
                                    <option value="16">PAEDIATRICS Indicator 3</option>
                                    <option value="18">FACILITY Indicator 1</option>
                                    <option value="19">FACILITY Indicator 2</option>

                                </select>
                            </div>
                            <div class="form-group col-md-10">
                                <label for="issues">Remarks/Issues</label>
                                <input type="text" class="form-control" id="issues" name="issues"
                                    placeholder="Upto 250 characters" required>
                            </div>
                        </div>

                        <div class="form-row" style="text-align: right">
                            <button type="submit" class="btn btn-primary">Save Issues</button>
                        </div>



                    </form>
                </fieldset>

            </div>
        </div>

    </div>
@endsection
