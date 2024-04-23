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
	<script src="{{ asset('/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/scripts/jquery-ui.js') }}"></script>
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
				visibility:hidden;
				display: none;
		}

		@media only screen and (max-width: 600px) {
			.menuicon {
				visibility:visible;
				display: inline;
			}
		}
        #cover {
			background: url("{{asset('/images/ajax-loader.gif')}}") no-repeat scroll center center #CCC;
			position: absolute;
			height: 100%;
			width: 100%;
			z-index: 999999999;
			opacity: 0.8;
		}

		.tab-content hr{
			border-top: 1px solid green;
		}

		.form-row{
			border-bottom: 0.5px solid green;
			margin-bottom: 5px;
		}

		label{
			color: darkgreen;
			font-size: small;
		}

		.tab-content span{
			margin-right: 7px;
			font-size: smaller;
			vertical-align:text-top;
		}
		.btnNext{
			float: right;
		}
	</style>
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
