@include('layouts.header')

<div class="container one-page" @yield('ng_app_name') style="overflow:auto;">

	<div class="container-title">
		<div class="title-item">
			@yield('page_name')
		</div>
	</div>

	@yield('angular_controller_script')

	<div class="page-form" @yield('angular_controller')>

		@yield('form_content')
		
	</div>

</div>

@include('layouts.footer')