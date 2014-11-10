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

		.c_jumlah_property {
			width: 35%;	
			text-align: center;
		}

		.c_aksi {
			width: 10%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Konfigurasi / Setting Perizinan / Koefisien Tarif
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingPerizinanKoefisienTarifCtrl"
@stop

@section('nav-menu-left')
	
@stop

@section('nav-menu-right')
	<form ng-submit="filter_konfigurasi()">
		<div class="table-form-content">
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="n_perizinan">Jenis Perizinan</option>
					<option value="jumlah_property">Jumlah Property</option>
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
			<th class="c_jenis_perizinan" ng-click="predicate='n_perizinan'; reverse=!reverse">Jenis Perizinan</th>
			<th class="c_jumlah_property" ng-click="predicate='jumlah_property'; reverse=!reverse">Jumlah Property</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="spkt in setting_perizinan_koefisien_tarif_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_jenis_perizinan">@{{ spkt.n_perizinan }}</td>
			<td class="c_jumlah_property">@{{ spkt.jumlah_property }}</td>
			<td class="c_aksi">@{{ spkt.id }}</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop