@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_nodaftar {
			width: 20%;
			text-align: center;
		}
		.c_namaizin {
			width: 20%;
			text-align: center;
		}
		.c_namapemohon {
			width: 10%;
			text-align: center;
		}
		.c_tanggal {
			width: 10%;
			text-align: center;
		}

		.c_status{
			width: 10%;
			text-align: center;
		}

		.c_alamat {
			width: 10%;
			text-align: center;
		}
		.c_kelurahan {
			width: 10%;
			text-align: center;
		}
	</style>
@stop

@section('page_name')
	Monitoring / Perizinan Belum / Sudah Jadi atau Kadaluarsa
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/MonitoringCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="MonitoringPerBelumSudahJadiKadaluarsaCtrl"
@stop

@section('nav-menu-left')
	<form ng-submit="filter_date()">
		<div class="table-form-content">
			<div class="form-item">
				<select ng-model="date.dt" class="form-option">
					<option value="null">----Pilih Salah Satu----</option>
					<option value="0">Belum Jadi</option>
					<option value="1">Sudah Jadi</option>
					<option value="2">Kadaluarsa</option>
				</select>
			</div> 
			<div class="form-item">
				<input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.start" placeholder="Tanggal Awal">
			</div>
			<div class="form-item">
				<input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.finish" placeholder="Tanggal Akhir">
			</div>
			<div class="form-item">
				<input type="submit" value="Filter Status">
			</div>
		</div>
	</form>
@stop

@section('nav-menu-right')
	<form>
		<div class="table-form-content">
			<div class="form-item">
				<button ng-click="show_all()" style="width='30px'">Tampilkan Semua</button>
			</div>
			<div class="form-item">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="pendaftaran_id">No Pendaftaran</option>
					<option value="n_perizinan">Nama Perizinan</option>
					<option value="d_terima_berkas">Tanggal Pendaftaran</option>
					<option value="n_pemohon">Nama Pemohon</option>
					<option value="n_sts_pemohon">Status Permohonan</option>
					<option value="a_pemohon">Alamat Pemohon</option>
					<option value="n_kelurahan">Kelurahan</option>
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
			<th class="c_nodaftar" ng-click="predicate='pendaftaran_id'; reverse=!reverse">Nomor Pendaftaran</th>
			<th class="c_namaizin" ng-click="predicate='n_perizinan'; reverse=!reverse">Nama Perizinan</th>
			<th class="c_tanggal" ng-click="predicate='d_terima_berkas'; reverse=!reverse">Tanggal Pendaftaran</th>
			<th class="c_namapemohon" ng-click="predicate='n_pemohon'; reverse=!reverse">Nama Pemohon</th>
			<th class="c_status" ng-click="predicate='n_sts_permohonan'; reverse=!reverse">Status Permohonan</th>
			<th class="c_alamat" ng-click="predicate='a_pemohon'; reverse=!reverse">Alamat Pemohon</th>
			<th class="c_kelurahan" ng-click="predicate='n_kelurahan'; reverse=!reverse">Kelurahan</th>
		</tr>
	</table>
@stop

@section('table_content')
	<table role="table-fluid">
		<tr ng-repeat="mpbjk in monitoring_per_belum_jadi_kadaluarsa_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_nodaftar">@{{ mpbjk.pendaftaran_id}}</td>
			<td class="c_namaizin">@{{ mpbjk.n_perizinan }}</td>
			<td class="c_tanggal">@{{ mpbjk.d_terima_berkas }}</td>
			<td class="c_namapemohon">@{{ mpbjk.n_pemohon }}</td>
			<td class="c_status">@{{ mpbjk.n_sts_permohonan }}</td>
			<td class="c_alamat">@{{ mpbjk.a_pemohon }}</td>
			<td class="c_kelurahan">@{{ mpbjk.n_kelurahan }}</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		<tr>
	</table>
@stop