<!doctype html>
<html lang="en">

<head>
    <title>Nigeria QualTB | Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">


    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="{{ asset('image/png" sizes="96x96" href="assets/img/favicon.png') }}">


    <link rel="stylesheet" href="{{ asset('/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css') }}">
    <style>
        @media only screen and (max-width: 600px) {
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            table tbody {
                display: table;
                width: 100%;
            }
        }

        .menuicon {
            visibility: hidden;
            display: none;
        }

        @media only screen and (max-width: 600px) {
            .menuicon {
                visibility: visible;
                display: inline;
            }
        }

        #cover {
            background: url("{{ asset('/images/ajax-loader.gif') }}") no-repeat scroll center center #CCC;
            position: absolute;
            height: 100%;
            width: 100%;
            z-index: 999999999;
            opacity: 0.8;
        }

        .tab-content hr {
            border-top: 1px solid green;
        }

        .form-row {
            border-bottom: 0.5px solid green;
            margin-bottom: 5px;
        }

        label {
            color: darkgreen;
            font-size: small;
        }

        .tab-content span {
            margin-right: 7px;
            font-size: smaller;
            vertical-align: text-top;
        }

        .btnNext {
            float: right;
        }
    </style>
</head>

<body>
    <div id="cover"></div>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top" style="position: relative;">
            <div class="brand">
                <a href="home"><img src="{{ asset('images/' . $settings->logo) }}" alt="{{ $settings->motto }}"
                        class="img-responsive logo" style="height: 35px !important; float: left;"></a>
                {{ $settings->ministry_name }}
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-menu"></i></button>
            </div>

            <div class="container-fluid" style="width: 100%">




                <form class="navbar-form navbar-left" action="{{ route('searchmembers') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" value="" name="keyword" class="form-control"
                            placeholder="Search Records...">
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
                    </div>
                </form>




                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="menuicon">

                            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-menu"></i></button>

                        </li>

                        @auth
                            <li class="dropdown">


                                <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                    <i class="lnr lnr-alarm"></i>
                                    @if ($mytasks->count() > 0)
                                        <span class="badge bg-danger">{{ $mytasks->count() }}
                                            <!-- Some Laravel Counter -->
                                        </span>
                                    @endif
                                </a>


                                <ul class="dropdown-menu notifications">
                                    @foreach ($mytasks as $ts)
                                        <li><a href="tasks" class="notification-item"><span
                                                    class="dot bg-warning"></span>{{ $ts->title }} | <i
                                                    class="lnr lnr-clock"></i>{{ $ts->date }}</a></li>
                                    @endforeach
                                    <li><a href="tasks" class="more">See all notifications</a></li>
                                </ul>
                            </li>
                        @endauth
                        <li>
                            <a href="{{ url('home') }}"><i class="lnr lnr-home"></i> <span>Home</span></a>

                        </li>


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i
                                    class="lnr lnr-user"></i> <span>@auth {{ Auth::user()->name }} @endauth </span> <i
                                    class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="roledlink Super" style="visibility:hidden !important;"><a
                                        href="{{ url('users') }}"><i class="lnr lnr-user"></i> <span>Users</span></a>
                                </li>

                                <li class="roledlink Super" style="visibility:hidden !important;"><a href="#"
                                        data-toggle="modal" data-target="#settings"><i class="lnr lnr-cog"></i>
                                        <span>Settings</span></a></li>
                                <li><a href="{{ url('logout') }}"><i class="lnr lnr-exit"></i> <span>Logout</span></a>
                                </li>
                            </ul>
                        </li>



                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar" style="margin-top: 1px">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="{{ url('home') }}" class="active"><i class="lnr lnr-home"></i>
                                <span>Dashboard</span></a></li>
                        <!--
       <li class="roledlink Worker Admin Followup Pastor Finance Super" style="visibility:hidden;">
        <a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-magnifier"></i> <span>Screening</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
        <div id="subPages1" class="collapse ">
         <ul class="nav">

          <li><a href="new-screening" class="roledlink Admin Super">New Screening</a></li>
          <li><a href="screenings" class="roledlink Admin Super">Screening Records</a></li>
         </ul>
        </div>
       </li>

       <li class="roledlink Worker Admin Followup Pastor Finance Super" style="visibility:hidden;">
        <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span>TB Records</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
        <div id="subPages2" class="collapse ">
         <ul class="nav">

          <li><a href="screenings" class="roledlink Admin Super">New TB Case</a></li>
          <li><a href="dscaptures" class="roledlink Admin Super">TB Records</a></li>
         </ul>
        </div>
       </li>
      -->
                        <li class="roledlink Super Admin User" style="visibility:hidden;">
                            <a href="#subPages6" data-toggle="collapse" class="collapsed"><i
                                    class="lnr lnr-checkmark-circle"></i> <span>Report</span> <i
                                    class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages6" class="collapse ">
                                <ul class="nav">
                                    <li><a href="{{ url('aggregate-report') }}" class="">New Aggregate
                                            Report</a></li>
                                    <li><a href="{{ url('aggreports') }}" class="">View Aggregate Reports</a>
                                    </li>

                                    <!--
          <li><a href="new-activity" class="">New Report</a></li>

          <li><a href="reports" class="">Manage Reports</a></li>
          -->
                                </ul>
                            </div>
                        </li>

                        @if (auth()->user()->role=="Super")



                        <li class="roledlink Admin Super" style="visibility:hidden;">
                            <a href="#subPages7" data-toggle="collapse" class="collapsed"><i
                                    class="lnr lnr-home"></i> <span>Facilities</span> <i
                                    class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages7" class="collapse ">
                                <ul class="nav">
                                    <li><a href="{{ url('facilities') }}" class="">Facilities</a></li>
                                    <li><a href="{{ url('new-facility') }}" class="">New Facility</a></li>
                                </ul>
                            </div>
                        </li>

                        @endif

                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main" style="padding-top: 5px !important">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <!-----------------------------START YIELD PAGE CONTENT -->
                    @if (Session::get('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <i class="fa fa-check-circle"></i> {!! Session::get('message') !!}
                        </div>
                    @endif
                    @yield('content')

                    <!----------------------------END YIELD PAGE CONTENT -->
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; {{ date('Y') }} <a href="https://www.ihvnhi.org.ng"
                        target="_blank">IHVN </a>. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="{{ asset('/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('/assets/scripts/klorofil-common.js') }}"></script>
    <script src="{{ asset('/assets/scripts/jquery-ui.js') }}"></script>
    <script>
        $(function() {
            $("#date,#from,#to,#dob").datepicker({
                dateFormat: "yy-mm-dd"
            });

            $(".ui-datepicker, .ui-widget").draggable().selectable();
        });
    </script>
</body>

</html>

<!-- The Settings Modal -->
<div class="modal" id="settings">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Settings</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form method="POST" action="{{ route('settings') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $settings->id }}">

                    <input type="hidden" name="oldlogo" id="id" value="{{ $settings->logo }}">

                    <input type="hidden" name="oldbackground" id="id" value="{{ $settings->background }}">

                    <div class="form-group">
                        <label for="ministry_name">Organization</label>
                        <input type="text" name="ministry_name" id="ministry_name" class="form-control"
                            value="{{ $settings->ministry_name }}">
                    </div>

                    <div class="form-group">
                        <label for="motto">Motto</label>
                        <input type="text" name="motto" id="motto" class="form-control"
                            value="{{ $settings->motto }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control"
                            value="{{ $settings->address }}">
                    </div>




                    <div class="form-group">
                        <label for="logo">Upload Logo Image</label>
                        <input type="file" name="logo" id="logo" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="background">Upload Background Image</label>
                        <input type="file" name="background" id="background" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mode">Mode</label>
                        <select class="form-control" name="mode" id="mode">
                            <option value="{{ $settings->mode }}">{{ $settings->mode }}</option>
                            <option value="Active" selected>Active</option>
                            <option value="Maintenance">Maintenance</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save Settings') }}
                        </button>
                    </div>


                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

@if (isset($pagename) && $pagename == 'dashboard')
    <script src="{{ asset('/js/highcharts.js') }}"></script>
@endif
@if (isset($pagetype) && $pagetype == 'report')
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('/js/dataTables.fixedHeader.min.js') }}"></script>

    <script src="{{ asset('/js/dataTables.select.min.js') }}"></script>

    <script src="{{ asset('/js/dataTables.searchPanes.min.js') }}"></script>
    <!--
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" />
    </script>

 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js" />
 </script>

 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" />
 </script>

 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js" />
 </script>
    -->
    <script>
        // TABLES WITH FILTERS
        $('#products thead tr').clone(true).appendTo('#products thead');
        $('#products thead tr:eq(1) th:not(:last)').each(function(i) {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" value="" />');

            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });


        var table = $('#products').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            "order": [
                [2, "asc"]
            ],
            "paging": false,
            "pageLength": 50,
            "filter": true,
            "ordering": true,
            deferRender: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
@endif

<script>
    $('.tooltipped').tooltip();

    $(function() {
        $("#date,#from,#to,#dob,.date").datepicker({
            dateFormat: "yy-mm-dd"
        });

        $(".ui-datepicker, .ui-widget").draggable().selectable();
    });

    function compareDeno(num) {
        // alert("Stop");
        var denoid = "ddstb" + num;
        //var lastchar = denoid.substr(denoid.length - 2);

        var numeid = "ndstb" + num + "u"
        var deno = $("#" + denoid).val();
        var nume = $("#" + numeid).val();

        if (nume == "") {
            alert("The Numerator can not be empty!");
        }
        var res = deno - nume;
        if (res < 0) {
            alert("The Numerator: " + nume + " can not be greater than the Denominator: " + deno + "!");
        }

    }



    function addnumber(number) {
        var receivers = $('#recipients').val();

        if (number == "all") {

            if (receivers == "") {
                $('#recipients').val($('#all').attr('data-allnumbers'));
            } else {
                $('#recipients').val('');
            }


        } else {
            if ($("#recipients").val().indexOf(',' + number) >= 0) {



                $('#recipients').val(receivers.replace(',' + number, ''));

            } else if ($("#recipients").val().indexOf(number + ',') >= 0) {


                $('#recipients').val(receivers.replace(number + ',', ''));

            } else if ($("#recipients").val().indexOf(number) >= 0) {


                $('#recipients').val(receivers.replace(number, ''));

            } else {
                if (receivers == "") {

                    $('#recipients').val(number);
                } else {
                    $('#recipients').val(receivers + ',' + number);
                }

            }
        }

    }

    // CHECK ALL
    $('#all').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });

    // TEXT AREA Counter
    $('#body').on("input", function() {
        var maxlength = $(this).attr("maxlength");
        var currentLength = $(this).val().length;

        $("#charcounter").text(currentLength + " characters");
        $("#pagecounter").text(Math.ceil(currentLength / 160) + " pages");


        if (currentLength >= maxlength) {
            $("#error").text("You have reached the maximum number of characters.");
        } else {
            $("#charleft").text(maxlength - currentLength + " chars left");

        }
    });

    // MANAGE ROLES AND ACCESS
    var usrRole = "{{ $login_user->role ?? '' }}";

    $(".roledlink").hide();

    function protect() {
        $("." + usrRole).css("visibility", "visible");
        $("." + usrRole).show();
    }
    protect();

    $(window).on('load', function() {
        $('#cover').fadeOut(1000);
    });

    $('.btnNext').click(function() {
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
    });

    $('.btnPrevious').click(function() {
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });

    $('.newqi').click(function() {
        var issue_id = $(this).attr("data-issue_id");
        // alert(issue_id);
        $('#issue_id').val(issue_id);
    });
</script>
