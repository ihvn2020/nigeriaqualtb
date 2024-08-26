@extends('layouts.theme')
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
    <h3 class="page-title">AGGREGATE REPORTING | <small style="color: green">Update</small></h3>
    <div class="row">
        <div class="panel">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('newareport') }}">
                    @csrf
                    <input type="hidden" name="entered_by" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="id" value="{{ $report->id }}">
                    <div class="row form-row form-group">
                        <div class="col-md-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ $report->title }}"
                                class="form-control" placeholder="Name this report" required>

                        </div>
                        <div class="col-md-2">
                            <label for="from">From (Date)</label>
                            <input type="text" name="from" id="from" value="{{ $report->from }}"
                                class="form-control" placeholder="Begin" required>
                        </div>
                        <div class="col-md-2">
                            <label for="to">To (Date)</label>
                            <input type="text" name="to" id="to" value="{{ $report->to }}"
                                class="form-control" placeholder="End" required>
                        </div>
                        <div class="col-md-2">
                            <label for="state">Select State</label>
                            <select name="state" id="state" class="form-control">
                                <option value="{{ $report->faciliti->state }}" selected>{{ $report->faciliti->state }}
                                </option>

                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="facility">Select Facility</label>
                            <select name="facility" id="facility" class="form-control">
                                <option value="{{ $report->facility }}" selected>{{ $report->faciliti->facility_name }}
                                </option>

                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="{{ $report->status }}" selected>{{ $report->status }}</option>
                                <option value="Open">Open</option>
                                <option value="Closed">Closed</option>
                            </select>
                        </div>

                    </div>
                    <fieldset>
                        <h3>DSTB</h3>
                        <hr>

                        <div class="panel panel-default">
                            <div class="panel-heading">1. Proportion of hospital attendees within the review period who were
                                symptomatically screened for TB - <small
                                    style="color:red;"><i>Benchmark: 100%</i></small>
                                <div class="result" id="ndstb1value">3</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of hospital attendees within the review period who were
                                        symptomatically screened for TB (Facility OPD Register)

                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb1u15" id="ndstb1u15"
                                            value="{{ $report->ndstb1u15 }}"
                                            class="form-control"
                                            >
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Total number of hospital attendees within the review period (Facility OPD
                                        Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb1" id="ddstb1" value="{{ $report->ddstb1 }}"
                                            placeholder="Total" class="form-control">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">2. Proportion of presumptive TB cases identified within the review
                                period evaluated for TB using WHO Rapid Diagnostics (Xpert MTB RIF assay, TB LAMP, LF LAM,
                                TrueNat).  - <small
                                    style="color:red;"><i>Benchmark: 75%</i></small>
                                <div class="result" id="ndstb2value">3</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of presumptive TB cases identified within the review period
                                        evaluated for TB using WHO Rapid Diagnostics (Presumptive Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb2u15" id="ndstb2u15"
                                            value="{{ $report->ndstb2u15 }}" class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Total number of presumptive TB cases identified within the
                                        review period evaluated (Presumptive Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb2" id="ddstb2"
                                            value="{{ $report->ddstb2 }}" class="form-control"
                                            onChange="compareDeno(2) ">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">3. Proportion of presumptive TB cases identified within the review
                                period whose sputum specimen were sent to GeneXpert Lab and had their results received
                                within 72 hrs of sending sputum specimen to Lab. - <small style="color:red;"><i>Benchmark:
                                        100%</i></small>
                                <div class="result" id="ndstb3value">3
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of presumptive TB cases identified within the review period
                                        whose sample (sputum/stool specimen) were sent to GeneXpert Lab and had their
                                        results received within 72 hrs of sending sputum specimen to Lab. (Presumptive Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb3u" id="ndstb3u"
                                            value="{{ $report->ndstb3u }}" class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Total number of presumptive TB cases identified within the
                                            review period whose sample (sputum/stool specimen) were received (Presumptive
                                            Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb3" id="ddstb3"
                                            value="{{ $report->ddstb3 }}" class="form-control"
                                            onChange="compareDeno(3) ">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">4. Proportion of DS-TB cases with positive baseline sputum smear or Xpert MTB/RIF started on treatment within the review period who are due for and with documented  (2, 5 or 6)  follow-up test -
                                <small style="color:red;"><i>Benchmark: 100%</i></small>
                                <div class="result" id="ndstb4value">4</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of DS-TB cases with positive baseline sputum smear or Xpert MTB/RIF started on treatment  within the review period with documented follow-up sputum smear AFB test done (2,5 or 6 months) -
                                        <small>(Treatment Register/Treatment Card)</small>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb4u" value="{{ $report->ndstb4u }}"
                                            id="ndstb4u" class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Total number of DS-TB cases with positive baseline sputum smear or Xpert MTB/RIF started on treatment in the 6 months prior to  within the review period -
                                        <small>(Presumptive Register)</small>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb4" id="ddstb4"
                                            value="{{ $report->ddstb4 }}" class="form-control"
                                            onChange="compareDeno(4) ">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">5. Proportion of patients (DS and DR) started on treatment  within the review period with complete documentation in the treatment card and the DR-TB facility (treatment) register - <small style="color:red;"><i>Benchmark: 100%</i></small>
                                <div class="result" id="ndstb5value">5</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of DS and DR TB patients started on treatment within the review period with complete documentation in the treatment card and the TB facility (treatment) register. -
                                        (DS/DR Treatment Register, DS/DR Treatment Card)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb5u" id="ndstb5u"
                                            value="{{ $report->ndstb5u }}" class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Total Number of DS and DRTB patients started on treatment within the review period. -
                                        (DS /DR Treatment Register if applicable)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb5" id="ddstb5"
                                            value="{{ $report->ddstb5 }}" class="form-control"
                                            onChange="compareDeno(5) ">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">6. Proportion of children under 15 years diagnosed with TB within the review period (Benchmark 15%)
                                <div class="result" id="ndstb6value">6</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of children under 15 years diagnosed with TB within the review period - (Presumptive Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb6u" id="ndstb6u"
                                            value="{{ $report->ndstb6u }}" class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Total Number of diagnosed TB cases within the review period - (Presumptive Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb6" id="ddstb6"
                                            value="{{ $report->ddstb6 }}" class="form-control"
                                            onChange="compareDeno(6) ">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">7. Proportion of TB notified cases tested for HIV within the review period <small style="color:red;"><i>Benchmark: 100%</i></small>
                                <div class="result" id="ndstb7value">7</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of TB notified cases tested for HIV within the review period - (Treatment Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb7u" id="ndstb7u"
                                            value="{{ $report->ndstb7u }}"
                                            class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Total Number of TB notified cases within the review period - (Treatment Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb7" id="ddstb7"
                                            value="{{ $report->ddstb7 }}" placeholder="Total" class="form-control">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">8. Proportion of bacteriologically diagnosed index TB patients during the review period who had their household contacts traced - <small
                                style="color:red;"><i>Benchmark: 100%</i></small>
                                <div class="result" id="ndstb8value">8</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of bacteriologically diagnosed index TB patients during the review period who had their household contacts traced (Presumptive register, Contact management  Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb8u" id="ndstb8u"
                                            value="{{ $report->ndstb8u }}" class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Total number of bacteriologically diagnosed index TB patients during the review period - (Presumptive register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb8" id="ddstb8"
                                            value="{{ $report->ddstb8 }}" class="form-control"
                                            onChange="compareDeno(8) ">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <hr>
                        <div class="panel panel-default">
                            <div class="panel-heading">9. Proportion of eligible contacts of bacteriologically positive TB cases who were initiated on TPT within the review period (Benchmark 100%) - <small
                                style="color:red;"><i>Benchmark: 100%</i></small>
                                <div class="result" id="ndstb9value">3</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of eligible  contacts of bacteriologically positive TB cases  initiated on TPT - (Contact management  Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb9u" id="ndstb9u"
                                            value="{{ $report->ndstb9u }}" class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Total number of  contacts of bacteriologically positive TB cases eligible for TPT -
                                        (Contact management  Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb9" id="ddstb9"
                                            value="{{ $report->ddstb9 }}" class="form-control"
                                            onChange="compareDeno(9) ">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">10. Proportion of contact initiated on TPT who completed treatment - <small style="color:red;"><i>Benchmark: 100%</i></small>
                                <div class="result" id="ndstb10value">3</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of  contacts initiated on TPT who completed treatment  (Contact management  Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb10u" id="ndstb10u"
                                            value="{{ $report->ndstb10u }}" class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Total Number of eligible  contacts of bacteriologically positive TB cases initiated on TPT. - (Contact management  Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb10" id="ddstb10"
                                            value="{{ $report->ddstb10 }}" class="form-control"
                                            onChange="compareDeno(10) ">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">11.  Proportion of all DR-TB cases diagnosed during the review period who were on initiated treatment within  48 hours of diagnosis who had  their baseline tests done  (LPA, Chest X-ray, AFB, Culture, DST, HIV test, EUCr, Pregnancy test, LFT, RBS, FBC, HBV, HCV, ECG) - <small
                                style="color:red;"><i>Benchmark: 100%</i></small>
                                <div class="result" id="ndstb11value">
                                    3</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of all DR-TB cases diagnosed during the review period who initiated treatment for DR-TB within 48hrs  of diagnosis who had their baseline tests done. - (Presumptive register/ DRTB treatment register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb11u" id="ndstb11u"
                                            value="{{ $report->ndstb11u }}" class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Number of all DR-TB cases diagnosed during the review period  (Presumptive register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb11" id="ddstb11"
                                            value="{{ $report->ddstb11 }}" class="form-control"
                                            onChange="compareDeno(11) ">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">12. Proportion of patients started on second-line TB treatment within the review period  who had their follow-up examinations done (weight, AFB, Culture, EUCr, FBC, LFT, RBS, ECG) within the review period - <small style="color:red;"><i>Benchmark: 100%</i></small> <div class="result" id="ndstb12value">3</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of patients started on second-line TB treatment within the review period who have their follow-up examinations (weight, AFB, Culture, EUCr, FBC, LFT, RBS, ECG) done monthly within the review period.
                                        (DRTB Treatment Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb12u" id="ndstb12u"
                                            value="{{ $report->ndstb12u }}" class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Total number of patients started on second-line TB treatment within the review period - (DRTB Treatment Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb12" id="ddstb12"
                                            value="{{ $report->ddstb12 }}" class="form-control"
                                            onChange="compareDeno(12) ">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <h3>PAEDIATRICS</h3>
                        <hr>
                        <div class="panel panel-default">
                            <div class="panel-heading">13. Proportion of presumptive cases with result uploaded in the COMM TB App within the review period.
                                <div class="result" id="ndstb13value">3</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Total number of presumptive cases evaluated for TB from the community within the review period (Comm TB backend report)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb13u" id="ndstb13u"
                                            value="{{ $report->ndstb13u }}" class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Total Number of presumptive paediatric TB cases under 15 years
                                        identified within the review period.(Presumptive Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb13" id="ddstb13"
                                            value="{{ $report->ddstb13 }}" class="form-control"
                                            onChange="compareDeno(13) ">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">14. Proportion of presumed pregnant women offered HTS in in unconventional settings leveraging community TB ACF activities - <small style="color:red;"><i>Benchmark: 15%</i></small>
                                <div class="result" id="ndstb14value">3</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of  presumed pregnant women offered HTS in in unconventional settings (PMTCT spoke register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb14u" id="ndstb14u"
                                            value="{{ $report->ndstb14u }}" class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Total number of eligible presumed pregnant women screened in the unconventional setting
                                        (Eligibility Checklist)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb14" id="ddstb14"
                                            value="{{ $report->ddstb14 }}" class="form-control"
                                            onChange="compareDeno(14) ">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">15. Proportion of HIV positive presumed pregnant women from unconventional settings who were linked to care in the PMTCT sites
                                <div class="result" id="ndstb15value">3</div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Numerator: </b>Number of HIV positive presumed pregnant women from unconventional settings who were linked to care in the PMTCT sites (PMTCT Register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ndstb15u" id="ndstb15u"
                                            value="{{ $report->ndstb15u }}" class="form-control">
                                    </div>

                                </div>

                                <div class="row form-row">
                                    <div class="col-md-9" style="font-size: 0.7em !important;">
                                        <b>Denominator: </b>Total number of HIV positive presumed pregnant women from unconventional settings within the review period.
                                        (PMTCT spoke register)
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ddstb15" id="ddstb15"
                                            value="{{ $report->ddstb15 }}" class="form-control"
                                            onChange="compareDeno(15) ">
                                    </div>

                                </div>
                            </div>
                        </div>


                    </fieldset>

                        <div class="form-row" style="text-align: right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
