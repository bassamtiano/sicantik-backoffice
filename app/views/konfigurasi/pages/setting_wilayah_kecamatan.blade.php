@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no{
			width: 5%;
			text-align: center;
			}
		.c_kecamatan {
			width: 15%;
			text-align: center;
		}
		.c_kabupaten {
			width: 15%;
			text-align: center;
		}
		.c_propinsi {
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
	Konfigurasi / Setting Wilayah / Kecamatan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingWilayahKecamatanCtrl"
@stop

@section('nav-menu-left')
	
@stop

@section('nav-menu-right')
	<form ng-submit="filter_konfigurasi()">
		<div class="table-form-content">
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="n_propinsi">Nama Propinsi</option>
					<option value="n_kabupaten">Nama Kabupaten</option>
					<option value="kecamatan">Nama Kecamatan</option>
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
			<th class="c_kecamatan" ng-click="predicate='n_kecamatan'; reverse=!reverse">Nama Kecamatan</th>
			<th class="c_kabupaten" ng-click="predicate='n_kabupaten'; reverse=!reverse">Nama Kabupaten</th>
			<th class="c_propinsi" ng-click="predicate='n_propinsi'; reverse=!reverse">Nama Provinsi</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>
@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="swkc in setting_wilayah_kecamatan_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_kecamatan">@{{ swkc.n_kecamatan }}</td>
			<td class="c_kabupaten">@{{ swkc.n_kabupaten}}</td>
			<td class="c_propinsi">@{{ swkc.n_propinsi }}</td>
			<td class="c_aksi">@{{ swkc.id }}</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop