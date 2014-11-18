<html>
<head>
	<title>@yield('page_name')</title>



	<!-- {{ HTML::style('assets/css/main.css'); }} -->

	<link rel="stylesheet/less" type="text/css" href="{{ URL::to('assets/less/main.less') }}" />

	{{ HTML::script('assets/js/less.min.js') }}

	<!-- Less CSS -->

	{{ HTML::style('assets/css/datepicker3.css'); }}


	{{ HTML::script('assets/js/jquery.min.js') }}
	{{ HTML::script('assets/js/angular.min.js') }}

	{{ HTML::script('assets/js/bootstrap-datepicker.js') }}



	{{ HTML::script('assets/controllers/NavigationCtrl.js') }}

	<script>
		function calendar() {
			$('.tanggal_input').datepicker({
				format: "yyyy-mm-dd",

			    todayHighlight: true
			});
		}

		function show_filter_option(){
			$('#filter_option_dialog').slideToggle();
		}

		$(document).ready(function() {
			calendar();
		});

	</script>

</head>
<body ng-app="sicantik_backoffice">

	<div class="nav-fixed">
		<div class="nav-content">

			<div class="nav-row">

				<div class="nav-image">
					<!-- <img src="assets/img/logo.png" /> -->

					{{ HTML::image('assets/img/logo.png') }}
				</div>

				<div class="nav-row-wrapper">
					<ul class="nav-title-wrapper">
						<li class="nav-title">
							BADAN PELAYANAN PERIZINAN TERPADU PROVINSI DI KALIMANTAN TENGAH [ KAB. ACEH BARAT ]
						</li>
					<ul>
				</div>

				{{ View::make('layouts._navbar') }}

			</div>


		</div>
	</div>
