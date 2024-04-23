@extends('layouts.theme')

@section('content')
<style>
    .result{
        background-color: #ccc;
        font-weight: bold;
    }

    thead tr:first-child th{
        position: sticky;
        z-index: 12;
        top: 0;
        background: white;
    }

    .rotate{
        writing-mode: vertical-rl; /* Vertical writing mode */
        transform: rotate(-180deg); /* Rotate the text */
        white-space: wrap; /* Prevent text wrapping */
        height: 200px; /* Set a fixed height for the th elements */
        line-height: 1.2em; /* Adjust line height for wrapping */
        font-weight: none;
        font-size: 0.7em;
        line-height: 0.8em;
    }


</style>
    @php $pagetype="report"; $analysis = "Yes" @endphp
    <h3 class="page-title">All Aggregate Reports</h3>
<hr>

    <div class="row" style="width: 98%; margin: 3px !important">
                    <table class="table  responsive-table" id="products">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb1u15')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb2u15')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb3u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb4u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb5u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb6u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb7u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb8u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb9u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb10u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb11u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb12u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb13u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb15u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb16u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb18u')->first()->indicator ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb19u')->first()->indicator ?? ""}}</th>
                            </tr>
                            @php
                            function getNtextByNcode($ncode, $indicators) {
                                echo $indicators->where('ncode',$ncode)->first()->ntext ?? "";
                            }

                            function getDtextByNcode($ncode, $indicators) {
                                echo $indicators->where('ncode',$ncode)->first()->dtext ?? "";

                            }

                            @endphp
                            <tr>
                                <th>Title</th>
                                <th>Facility</th>
                                <th>State</th>
                                <th>From</th>
                                <th>To</th>
                                <th class="rotate">{{getNtextByNcode("ndstb1u15",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb1u15",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb2u15",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb2u15",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb3u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb3u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb4u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb4u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb5u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb5u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb6u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb6u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb7u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb7u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb8u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb8u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb9u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb9u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb10u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb10u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb11u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb11u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb12u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb12u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb13u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb13u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb15u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb15u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb16u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb16u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb18u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb18u",$indicators)}}</th>
                                <th>R</th>
                                <th class="rotate">{{getNtextByNcode("ndstb19u",$indicators)}}</th>
                                <th class="rotate">{{getDtextByNcode("ndstb19u",$indicators)}}</th>
                                <th>R</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                function generateReportString($from, $to) {
                                    $fromMonth = date('F', strtotime($from));
                                        $toMonth = date('F', strtotime($to));

                                        $fromYear = date('Y', strtotime($from));
                                        $toYear = date('Y', strtotime($to));

                                        if ($fromMonth === $toMonth && $fromYear === $toYear) {
                                            return ucfirst($fromMonth) . ' ' . $fromYear . ' Report';
                                        } else {
                                            return ucfirst($fromMonth) . ' ' . $fromYear . ' to ' . ucfirst($toMonth) . ' ' . $toYear . ' Report';
                                        }
                                }
                            @endphp

                            @foreach ($aggreports as $agr)
                                <tr>
                                    <td>{{generateReportString($agr->from, $agr->to)}}</td>
                                    <td>{{$agr->faciliti->facility_name}}</td>
                                    <td>{{$agr->faciliti->state}}</td>
                                    <td>{{$agr->from}}</td>
                                    <td>{{$agr->to}}</td>
                                    <td>{{$agr->ndstb1u15}}</td>
                                    <td>{{$agr->ddstb1}}</td>
                                    <td class="result">{{$agr->ddstb1>0 ? number_format($agr->ndstb1u15/$agr->ddstb1,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb2u15}}</td>
                                    <td>{{$agr->ddstb2}}</td>
                                    <td class="result">{{$agr->ddstb2>0 ? number_format($agr->ndstb2u15/$agr->ddstb2,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb3u}}</td>
                                    <td>{{$agr->ddstb3}}</td>
                                    <td  class="result">{{$agr->ddstb3 ? number_format($agr->ndstb3u/$agr->ddstb3,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb4u}}</td>
                                    <td>{{$agr->ddstb4}}</td>
                                    <td  class="result">{{$agr->ddstb4 ? number_format($agr->ndstb4u/$agr->ddstb4,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb5u}}</td>
                                    <td>{{$agr->ddstb5}}</td>
                                    <td  class="result">{{$agr->ddstb5 ? number_format($agr->ndstb5u/$agr->ddstb5,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb6u}}</td>
                                    <td>{{$agr->ddstb6}}</td>
                                    <td  class="result">{{$agr->ddstb6 ? number_format($agr->ndstb6u/$agr->ddstb6,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb7u}}</td>
                                    <td>{{$agr->ddstb7}}</td>
                                    <td  class="result">{{$agr->ddstb7 ? number_format($agr->ndstb7u/$agr->ddstb7,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb8u}}</td>
                                    <td>{{$agr->ddstb8}}</td>
                                    <td  class="result">{{$agr->ddstb8 ? number_format($agr->ndstb8u/$agr->ddstb8,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb9u}}</td>
                                    <td>{{$agr->ddstb9}}</td>
                                    <td  class="result">{{$agr->ddstb9 ? number_format($agr->ndstb9u/$agr->ddstb9,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb10u}}</td>
                                    <td>{{$agr->ddstb10}}</td>
                                    <td  class="result">{{$agr->ddstb10 ? number_format($agr->ndstb10u/$agr->ddstb10,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb11u}}</td>
                                    <td>{{$agr->ddstb11}}</td>
                                    <td  class="result">{{$agr->ddstb11 ? number_format($agr->ndstb11u/$agr->ddstb11,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb12u}}</td>
                                    <td>{{$agr->ddstb12}}</td>
                                    <td  class="result">{{$agr->ddstb12 ? number_format($agr->ndstb12u/$agr->ddstb12,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb13u}}</td>
                                    <td>{{$agr->ddstb13}}</td>
                                    <td  class="result">{{$agr->ddstb13 ? number_format($agr->ndstb13u/$agr->ddstb13,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb15u}}</td>
                                    <td>{{$agr->ddstb15}}</td>
                                    <td  class="result">{{$agr->ddstb15 ? number_format($agr->ndstb15u/$agr->ddstb15,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb16u}}</td>
                                    <td>{{$agr->ddstb16}}</td>
                                    <td  class="result">{{$agr->ddstb16 ? number_format($agr->ndst163u/$agr->ddstb16,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb18u}}</td>
                                    <td>{{$agr->ddstb18}}</td>
                                    <td  class="result">{{$agr->ddstb18 ? number_format($agr->ndstb18u/$agr->ddstb18,2)*100 ."%": ""}}</td>
                                    <td>{{$agr->ndstb19u}}</td>
                                    <td>{{$agr->ddstb19}}</td>
                                    <td  class="result">{{$agr->ddstb19 ? number_format($agr->ndstb19u/$agr->ddstb19,2)*100 ."%": ""}}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

    </div>

@endsection
