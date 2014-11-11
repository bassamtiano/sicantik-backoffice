@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_nama {
			width: 15%;
			text-align: : center;
		}
		.c_nip {
			width: 15%;
			text-align: center;
		}
		.c_jabatan{
			width: 20%;
			text-align: center;
		}
		.c_status{
			width: 8%;
			text-align: center;
		}
		.c_username{
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
	Konfigurasi / Setting User / Pegawai
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingUserPegawaiCtrl"
@stop

@section('nav-menu-left')
	
@stop

@section('nav-menu-right')
	<form ng-submit="filter_konfigurasi()">
		<div class="table-form-content">
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="n_pegawai">Nama Pegawai</option>
					<option value="nip">NIP</option>
					<option value="n_jabatan">Jabatan</option>
					<option value="status">Status</option>
					<option value="username">Username</option>
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
			<th class="c_nama" ng-click="predicate='n_pegawai'; reverse=!reverse">Nama</th>
			<th class="c_nip" ng-click="predicate='nip'; reverse=!reverse">NIP</th>
			<th class="c_jabatan" ng-click="predicate='n_jabatan'; reverse=!reverse">Jabatan</th>
			<th class="c_status" ng-click="predicate='status'; reverse=!reverse">Status</th>
			<th class="c_username" ng-click="predicate='username'; reverse=!reverse">Username</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>
@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="sup in setting_user_pegawai_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_nama">@{{ sup.n_pegawai }}</td>
			<td class="c_nip">@{{ sup.nip}}</td>
			<td class="c_jabatan">@{{ sup.n_jabatan }}</td>
			<td class="c_status">
				<p ng-if="sup.status == 1" class="c_status">
					Penandatangan
				</p>
				<p ng-if="sup.status == 0" class="c_status">
					Pengguna
				</p>
			</td>
			<td class="c_username">@{{ sup.username}}</td>
			<td class="c_aksi">@{{ sup.id }}</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop