@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_jenis_perizinan {
			width: 50%;
		}
		
		.c_kelompok_perizinan {
			width: 25%;	
		}

		.c_jumlah_property {
			width: 10%;	
			text-align: center;
		}

		.c_aksi {
			width: 10%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Setting Perizinan / Persyaratan Izin
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingPerizinanPropertyPendataanCtrl"
@stop

@section('nav-menu-left')
	
@stop

@section('nav-menu-right')
	<form>
		<div class="table-form-content">
			<div class="form-item">
				&nbsp
			</div>
			<div class="form-item wide">
				<input type="text" placeholder="Search Key">
			</div>
			<div class="form-item">
				<input type="submit" value="Search">
			</div>
		</div>
	</form>
@stop

@section('table_nav')
	
	<table>
		<tr>
			<th class="c_no">No</th>
			<th class="c_jenis_perizinan">Jenis Perizinan</th>
			<th class="c_kelompok_perizinan">Kelompok Perizinan</th>
			<th class="c_jumlah_property">Jumlah Property</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="sppp in setting_perizinan_property_pendataan_data">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_jenis_perizinan">@{{ sppp.n_perizinan }}</td>
			<td class="c_kelompok_perizinan">@{{ sppp.n_kelompok }}</td>
			<td class="c_jumlah_property">@{{ sppp.jumlah_property }}</td>
			<td class="c_aksi">@{{ sppp.id }}</td>
		</tr>
	</table>

@stop