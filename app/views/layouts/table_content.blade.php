@include('layouts.header')

<div class="page">

	<div class="container one-page" @yield('ng_app_name')>

		@yield('table_style')

		<div class="container-title">
			<div class="title-item">
				@yield('page_name')
			</div>

		</div>

		@yield('angular_controller_script')

		<div class="table-wrapper" @yield('angular_controller')>

			<!-- Nambah Konten Modal -->

			@yield('modal-content')

			<div class="table-nav">

				<div class="nav-menu">
					<div class="menu-left">
						@yield('nav-menu-left')
					</div>

					<div class="menu-right">
						@yield('nav-menu-right')
					</div>

				</div>

				<div class="nav-table">

					@yield('table_nav')

				</div>

			</div>

			<div class="table-content">
				@yield('table_content')
			</div>


		</div>

	</div>

</div>

@include('layouts.footer')



</body>
</html>
