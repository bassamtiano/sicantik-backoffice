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
	Konfigurasi / Setting Umum / Hari Libur
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
	<form ng-submit="filter_konfigurasi()">
		<div class="table-form-content">
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="date">Tanggal</option>
					<option value="description">Keterangan</option>
					<option value="holiday_type">Tipe Hari Libur</option>
				</select>
			</div>
			<div class="form-item wide">
				<input type="text" placeholder="Kata Kunci" ng-model="search[opsi_cari]">
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
		<tr ng-repeat="suhl in setting_umum_hari_libur_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_tanggal">@{{ suhl.date }}</td>
			<td class="c_keterangan">@{{ suhl.description }}</td>
			<td class="c_tipe">@{{ suhl.holiday_type }}</td>
			<td class="c_aksi">@{{ suhl.id }}</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop