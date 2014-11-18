@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_tanggal {
			width: 15%;
			text-align: center;
		}
		.c_keterangan {
			width: 20%;
		}
		.c_tipe {
			width: 15%;
			text-align: center;
		}
		.c_aksi {
			width: 10%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Setting Umum / Hari Libur
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingUmumHariLiburCtrl"
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
			<th class="c_tanggal">Tanggal</th>
			<th class="c_keterangan">Keterangan</th>
			<th class="c_tipe">Tipe Hari Libur</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>
@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="suhl in setting_umum_hari_libur">
			<td class="c_tanggal">@{{ suhl.date }}</td>
			<td class="c_keterangan">@{{ suhl.description }}</td>
			<td class="c_tipe">@{{ suhl.holiday_type }}</td>
			<td class="c_aksi">@{{ suhl.id }}</td>
		</tr>
	</table>

@stop