@extends('layouts.form_content')

@section('page_name')
	Setting Umum / Hari Libur
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingUmumInstansiCtrl"
@stop

@section('page_name')

	Setting Umum / Instansi

@stop

@section('form_content')

	<div class="form-wrapper">
		<form class="form-1-column">
			<div class="form-group">
				<label>
					Nama Instansi
				</label>
				<div class="form-item">
					<input type="text" />
				</div>
			</div>

			<div class="form-group">
				<label>
					Nama Wilayah
				</label>
				<div class="form-item">
					<select name="id" ng-model="kabupaten_instansi" ng-options="suiowd.n_kabupaten for suiowd in setting_umum_instansi_opsi_wilayah_data track by suiowd.id">
						<option value="">Pilih Wilayah</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label>
					Telepon
				</label>
				<div class="form-item">
					<input type="text" />
				</div>
			</div>

			<div class="form-group">
				<label>
					Fax
				</label>
				<div class="form-item">
					<input type="text" />
				</div>
			</div>

			<div class="form-group">
				<label>
					Logo
				</label>
				<div class="form-item">
					<input type="text" />
				</div>
			</div>

			<div class="form-group">
				<label>
					Alamat
				</label>
				<div class="form-item">
					<input type="text" />
				</div>
			</div>
			
		</form>
	</div>

@stop