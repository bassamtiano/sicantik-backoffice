<html>
<head>
	<title></title>

	<link rel="stylesheet/less" type="text/css" href="{{ URL::to('assets/less/login.less') }}" />

	{{ HTML::script('assets/js/less.min.js') }}

</head>
<body>

	<form method="post" action="{{ URL::to('do_login') }}">

		<div class="login-pannel">
			<div class="login-header">
				{{ HTML::image('assets/img/logo.png') }}
				<div class="header-badan">
					<h2>BADAN PELAYANAN PERIZINAN TERPADU PROVINSI DI KALIMANTAN TENGAH<h2>
				</div>
				<div class="header-kab">
					<h3>KAB. ACEH UTARA</h3>
				</div>
			</div>

			<div class="login-content">
				<div class="content-alert">
					<!-- <h4>User Name & Password Salah .. !</h4> -->
					<h4>{{ Session::get('message') }}</h4>
				</div>

				<div class="content-input">
					<label>
						User Name
					</label>
					<input type="text" name="username" placeholder="User Name" />
				</div>
				<div class="content-input">
					<label>
						Password
					</label>
					<input type="password" name="password" placeholder="Password" />
				</div>

				<div class="content-input">
					<button type="submit">Log In</button>
				</div>
			</div>
		</div>

	</form>

</body>
</html>
