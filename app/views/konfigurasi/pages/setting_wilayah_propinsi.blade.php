@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_nama_propinsi {
			width: 85%;
		}

		.c_aksi {
			width: 10%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Konfigurasi / Setting Wilayah / Propinsi
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingWilayahPropinsi"
@stop

@section('nav-menu-left')

	<form ng-submit="tambah_propinsi()">
		<div class="table-form-content">
			<div class="form-item">
				<button ng-click="open_modal('modal_tambah', suhl.id)" class="row-item ya">Tambah Provinsi</button>
			</div>
		</div>
	</form>
	
@stop

@section('nav-menu-right')
	<form ng-submit="filter_konfigurasi()">
		<div class="table-form-content">
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="n_propinsi">Nama Propinsi</option>
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
<<<<<<< HEAD
			<th class="c_nama_propinsi">Nama Provinsi</th>
=======
			<th class="c_nama_propinsi" ng-click="predicate='n_propinsi'; reverse=!reverse">Nama Propinsi</th>
>>>>>>> pr/13
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
<<<<<<< HEAD
		<tr ng-repeat="swp in setting_wilayah_propinsi| orderBy:predicate:reverse | filter:search | limitTo:displayed">
=======
		<tr ng-repeat="swp in setting_wilayah_propinsi_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
>>>>>>> pr/13
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_nama_propinsi">@{{ swp.n_propinsi }}</td>
			<td class="c_aksi">
				<span class="button-group group-1">
					<a href ng-click="open_modal('modal_edit', swp.id)" class="edit">Edit</a>
				</span>
			</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop

@section('modal-content')
	@include('konfigurasi.modals.setting_wilayah_propinsi_modal_edit', ['modal_name' => 'modal_edit']);
	@include('konfigurasi.modals.setting_wilayah_propinsi_modal_tambah', ['modal_name' => 'modal_tambah']);
@stop