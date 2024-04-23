<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>{{$settings->ministry_name}} </title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="{{ asset('image/png" sizes="96x96" href="assets/img/favicon.png') }}">


    <link rel="stylesheet" href="{{ asset('/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css') }}">


</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
                                <!-----------------------------START YIELD PAGE CONTENT -->
                                @yield('content')
                                <!----------------------------END YIELD PAGE CONTENT -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END WRAPPER -->
    </body>

    </html>

	<script src="{{ asset('/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/scripts/jquery-ui.js') }}"></script>

    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('/js/dataTables.fixedHeader.min.js') }}"></script>

    <script src="{{ asset('/js/dataTables.select.min.js') }}"></script>

    <script src="{{ asset('/js/dataTables.searchPanes.min.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" />
    </script>

 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js" />
 </script>

 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" />
 </script>

 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js" />
 </script>

    <script>
        // TABLES WITH FILTERS
        $('#products thead tr').clone(true).appendTo('#products thead');
        $('#products thead tr:eq(1)').each(function(i) {
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
