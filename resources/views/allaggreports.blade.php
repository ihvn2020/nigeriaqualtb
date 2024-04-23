@extends('layouts.theme')

@section('content')
    @php $pagetype="report"; $analysis = "Yes" @endphp
    <h3 class="page-title">All Aggregate Reports</h3>
<hr>
<p>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        View Indicator Value (Numerator and Denominators)
    </a>
</p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Code</th>
                <th>Indicator Name</th>
                <th>Numerator</th>
                <th>Denominator</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($indicators as $ind)

            <tr>
                <td>{{$ind->ncode}}</td>
                <td>{{$ind->indicator}}</td>
                <td>{{$ind->ntext}}</td>
                <td>{{$ind->dtext}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>


    <div class="row" style="width: 98%; margin: 3px !important">
                    <table class="table  responsive-table" id="products">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb1u15')->first()->indicator."<br> (ndstb1u15)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb2u15')->first()->indicator."<br> (ndstb2u15)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb3u')->first()->indicator."<br> (ndstb3u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb4u')->first()->indicator."<br> (ndstb4u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb5u')->first()->indicator."<br> (ndstb5u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb6u')->first()->indicator."<br> (ndstb6u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb7u')->first()->indicator."<br> (ndstb7u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb8u')->first()->indicator."<br> (ndstb8u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb9u')->first()->indicator."<br> (ndstb9u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb10u')->first()->indicator."<br> (ndst10u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb11u')->first()->indicator."<br> (ndstb11u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb12u')->first()->indicator."<br> (ndstb12u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb13u')->first()->indicator."<br> (ndstb13u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb15u')->first()->indicator."<br> (ndstb15u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb16u')->first()->indicator."<br> (ndstb16u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb18u')->first()->indicator."<br> (ndstb18u)" ?? ""}}</th>
                                <th colspan="3" style="font-size: 0.7em">{{$indicators->where('ncode','ndstb19u')->first()->indicator."<br> (ndstb19u)" ?? ""}}</th>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <th>Facility</th>
                                <th>State</th>
                                <th>From</th>
                                <th>To</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                                <th>N</th>
                                <th>D</th>
                                <th>R</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($aggreports as $agr)
                                <tr>
                                    <td>{{$agr->title}}</td>
                                    <td>{{$agr->faciliti->facility_name}}</td>
                                    <td>{{$agr->faciliti->state}}</td>
                                    <td>{{$agr->from}}</td>
                                    <td>{{$agr->to}}</td>
                                    <td>{{$agr->ndstb1u15}}</td>
                                    <td>{{$agr->ddstb1}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb2u15}}</td>
                                    <td>{{$agr->ddstb2}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb3u}}</td>
                                    <td>{{$agr->ddstb3}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb4u}}</td>
                                    <td>{{$agr->ddstb4}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb5u}}</td>
                                    <td>{{$agr->ddstb5}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb6u}}</td>
                                    <td>{{$agr->ddstb6}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb7u}}</td>
                                    <td>{{$agr->ddstb7}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb8u}}</td>
                                    <td>{{$agr->ddstb8}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb9u}}</td>
                                    <td>{{$agr->ddstb9}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb10u}}</td>
                                    <td>{{$agr->ddstb10}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb11u}}</td>
                                    <td>{{$agr->ddstb11}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb12u}}</td>
                                    <td>{{$agr->ddstb12}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb13u}}</td>
                                    <td>{{$agr->ddstb13}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb15u}}</td>
                                    <td>{{$agr->ddstb15}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb16u}}</td>
                                    <td>{{$agr->ddstb16}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb18u}}</td>
                                    <td>{{$agr->ddstb18}}</td>
                                    <td></td>
                                    <td>{{$agr->ndstb19u}}</td>
                                    <td>{{$agr->ddstb19}}</td>
                                    <td></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

    </div>

@endsection
