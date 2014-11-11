@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no{
			width: 5%;
			text-align: center;
		}
		.c_kelurahan{
			width: 15%;
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
	Konfigurasi / Setting Wilayah / Kelurahan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingWilayahKelurahanCtrl"
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
					<option value="n_kecamatan">Nama Kecamatan</option>
					<option value="n_kelurahan">Nama Kelurahan</option>
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
			<th class="c_kelurahan" ng-click="predicate='n_kelurahan'; reverse=!reverse">Nama Kelurahan</th>
			<th class="c_kecamatan" ng-click="predicate='n_kecamatan'; reverse=!reverse">Nama Kecamatan</th>
			<th class="c_kabupaten" ng-click="predicate='n_kabupaten'; reverse=!reverse">Nama Kabupaten</th>
			<th class="c_propinsi" ng-click="predicate='n_propinsi'; reverse=!reverse">Nama Provinsi</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>
@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="swkl in setting_wilayah_kelurahan_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_kelurahan">@{{ swkl.n_kelurahan }}</td>
			<td class="c_kecamatan">@{{ swkl.n_kecamatan }}</td>
			<td class="c_kabupaten">@{{ swkl.n_kabupaten}}</td>
			<td class="c_propinsi">@{{ swkl.n_propinsi }}</td>
			<td class="c_aksi">@{{ swkl.id }}</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop