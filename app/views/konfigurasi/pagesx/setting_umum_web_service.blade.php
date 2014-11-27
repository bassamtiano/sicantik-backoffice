@extends('layouts.form_content')

@section('page_name')
	Setting Umum / Web Service
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingUmumInstansiCtrl"
@stop

@section('form_content')

	<div class="form-wrapper">
		<form class="form-1-column">

			<div class="form-group">
				<label>
					Web Service Pajak
				</label>
				<div class="form-item">
					<input type="text" />
				</div>
			</div>

			<div class="form-group">
				<label>
					Status Web Service Pajak
				</label>
				<div class="form-item">
					<input type="text" />
				</div>
			</div>

			<div class="form-group">
				<label>
					Web Service Kependudukan
				</label>
				<div class="form-item">
					<input type="text" />
				</div>
			</div>

			<div class="form-group">
				<label>
					Status Web Service Pajak
				</label>
				<div class="form-item">
					<input type="text" />
				</div>
			</div>
			
		</form>
	</div>

@stop