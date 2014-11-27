@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_izin_paralel {
			width: 20%;
		}
		.c_jumlah {
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
	Setting Perizinan / Perizinan Paralel
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingPerizinanPerizinanParalelCtrl"
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
			<th class="c_izin_paralel">Jenis Perizinan Paralel</th>
			<th class="c_jumlah">Jumlah Izin Terkait</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>
@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="sppp in setting_perizinan_perizinan_paralel_data">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_izin_paralel">@{{ sppp.n_paralel }}</td>
			<td class="c_jumlah">@{{ sppp.jumlah_perizinan }}</td>
			<td class="c_aksi">@{{ sppp.id }}</td>
		</tr>
	</table>

@stop