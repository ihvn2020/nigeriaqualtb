@extends('layouts.theme')

@section('content')
    <style>
        .main-box-layout {
            margin: 0px;
            margin-top: 30px;
            position: relative;
            box-shadow: -3px 3px 3px 0px #5f5e5e;
        }

        .main-box-layout:hover .box-icon-section i {
            font-size: 70px;
            transform: rotate(360deg);
            transition: 1s;
        }

        .box-icon-section {
            display: table;
            height: 100px;
            color: #fff;
        }

        .box-icon-section i {
            font-size: 30px;
            display: table-cell;
            vertical-align: middle;
            transition: transform 0.4s ease-in-out;
            transition: 1s;
        }

        .box-text-section {
            background-color: #1f1e1e;
        }

        .box-text-section p {
            margin: 0px;
            color: #fff;
            padding: 10px 0px;
        }

        .label .badge {
            position: absolute;
            top: -19px;
            left: 50%;
            transform: translateX(-50%);
            /*background-color: #4b4949;*/
            color: #fff;
            box-shadow: 0px 0px 3px 0px #fff;
            border: 2px solid #fff;
            height: 35px;
            width: auto;
            font-size: 1em;
        }

        .newbtn a {
            position: absolute;
            bottom: -24px;
            left: 50%;
            transform: translateX(-50%);
            /*background-color: #212f4e;*/
            color: #fff;
            box-shadow: 0px 0px 3px 0px #fff;
            border: 2px solid #fff;
            font-size: 1em;
        }

        .amcharts-chart-div a {
            position: absolute;
            visibility: hidden;
        }

        amcharts-chart-div a:before {
            content: "Kojo Autos";
            visibility: visible;
        }

        g text {
            font-size: 0.7em !important;
        }

        .justify-content-md-center {
            background: url("{{ asset('/images/toyota_SUV.png') }}") no-repeat;
        }
    </style>
    @php $pagename="dashboard"; @endphp

    <h3 class="page-title">Dashboard | <small style="color: green">Summary</small></h3>
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Stats</h3>
            </div>
            <div class="panel-body" style="display: block; overflow-x: auto; white-space: nowrap;">
                <div class="container">

                    <div class="row form-row justify-content-md-center" style="padding-bottom: 40px;">
                        <div class="col-lg-5 col-sm-4 col-12 text-center">
                            <div class="row main-box-layout img-thumbnail">
                                <div class="col-lg-12 col-sm-12 col-12 box-icon-section bg-primary">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-12 box-text-section">
                                    <p>Aggregate Reports</p>
                                </div>
                                <div class="label">
                                    <h3><span class="badge badge-pill bg-danger">{{ number_format($aggreports, 0) }}</span>
                                    </h3>
                                </div>
                                <div class="newbtn">
                                    <a href="{{ url('aggregate-report') }}" class="btn btn-primary">Add New</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-sm-4 col-12 text-center roledlink Super" style="visibility:hidden;">
                            <div class="row main-box-layout img-thumbnail">
                                <div class="col-lg-12 col-sm-12 col-12 box-icon-section bg-primary">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-12 box-text-section">
                                    <p>Facilities</p>
                                </div>
                                <div class="label">
                                    <h3><span
                                            class="badge badge-pill bg-warning">{{ \App\Models\facilities::all()->count() }}</span>
                                    </h3>
                                </div>
                                <div class="newbtn">
                                    <a href="{{ url('facilities') }}" class="btn btn-primary">View All</a>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
