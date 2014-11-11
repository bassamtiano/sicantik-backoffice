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
	Konfigurasi / Setting Perizinan / Perizinan Paralel
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
	<form ng-submit="filter_konfigurasi()">
		<div class="table-form-content">
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="n_paralel">Jenis Perizinan Paralel</option>
					<option value="jumlah_perizinan">Jumlah Izin Terkait</option>
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
			<th class="c_no">No</th>
			<th class="c_izin_paralel" ng-click="predicate='n_paralel'; reverse=!reverse">Jenis Perizinan Paralel</th>
			<th class="c_jumlah" ng-click="predicate='jumlah_perizinan'; reverse=!reverse">Jumlah Izin Terkait</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>
@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="sppp in setting_perizinan_perizinan_paralel_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_izin_paralel">@{{ sppp.n_paralel }}</td>
			<td class="c_jumlah">@{{ sppp.jumlah_perizinan }}</td>
			<td class="c_aksi">@{{ sppp.id }}</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop