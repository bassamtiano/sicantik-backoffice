@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no{
			width: 5%;
			text-align: center;
			}
		.c_username {
			width: 15%;
			text-align: center;
		}
		.c_nama {
			width: 15%;
			text-align: center;
		}
		.c_log {
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
	Setting User / Pengguna
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingUserPenggunaCtrl"
@stop

@section('nav-menu-left')
	
@stop

@section('nav-menu-right')
	<form ng-submit="filter_konfigurasi()">
		<div class="table-form-content">
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="n_unitKerja">Nama Unit Kerja</option>
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
			<th class="c_username" ng-click="predicate='username'; reverse=!reverse">Usename</th>
			<th class="c_nama" ng-click="predicate='realname'; reverse=!reverse">Nama</th>
			<th class="c_log" ng-click="predicate='last_login'; reverse=!reverse">Log Masuk Terakhir</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>
@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="sup in setting_user_pengguna_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_username">@{{ sup.username }}</td>
			<td class="c_nama">@{{ sup.realname}}</td>
			<td class="c_log">@{{ sup.last_login }}</td>
			<td class="c_aksi">@{{ sup.id }}</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop