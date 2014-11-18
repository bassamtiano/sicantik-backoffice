@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_jenis_perizinan_paralel {
			width: 55%;
		}
		
		.c_jumlah_izin_terkait {
			width: 30%;	
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
	ng-controller="KonfigurasiSettingPerizinanPersyaratanIzinCtrl"
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
			<th class="c_jenis_perizinan_paralel">Jenis Perizinan Paralel</th>
			<th class="c_jumlah_izin_terkait">Jumlah Izin Terkait</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="sppi in setting_perizinan_persyaratan_izin_data">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_jenis_perizinan_paralel">@{{ sppi.n_perizinan }}</td>
			<td class="c_jumlah_izin_terkait">@{{ sppi.jumlah_persyaratan }}</td>
			<td class="c_aksi">Aksi</td>
		</tr>
	</table>

@stop