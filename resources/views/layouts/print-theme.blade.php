<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>{{$settings->ministry_name}} | Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
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

