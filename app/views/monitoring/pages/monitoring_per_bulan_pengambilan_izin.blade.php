@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_no_pendaftaran {
			width: 15%;
			text-align: center;
		}
		.c_nama_perizinan {
			width: 12%;
			text-align: center;
		}
		.c_tanggal_pendaftaran {
			width: 10%;
			text-align: center;
		}
		.c_nama_pemohon {
			width: 10%;
			text-align: center;
		}

		.c_nomor_surat{
			width: 10%;
			text-align: center;
		}

		.c_tanggal_surat {
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
	Monitoring / Per Bulan Pengambilan Izin
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/MonitoringCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="MonitoringPerBulanPengambilanIzinCtrl"
@stop

@section('nav-menu-left')
	<form ng-submit="filter_date()">
		<div class="table-form-content">
			<div class="form-item">
				<select class="form-option" ng-model='date.id' required ng-options='mpbpi.id as mpbpi.n_perizinan for mpbpi in monitoring_per_bulan_pengambilan_izin_opsi'>
				<option value="">----Pilih Salah Satu----</option>
				</select>
			</div> 
			<div class="form-item">
				<input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.start" placeholder="Tanggal Awal">
			</div>
			<div class="form-item">
				<input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.finish" placeholder="Tanggal Akhir">
			</div>
			<div class="form-item">
				<input type="submit" value="Filter Tanggal">
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
					<option value="no_surat">No Surat</option>
					<option value="tgl_surat">Tanggal Surat</option>
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
			<th class="c_no_pendaftaran" ng-click="predicate='pendaftaran_id'; reverse=!reverse">No Pendaftaran</th>
			<th class="c_nama_perizinan" ng-click="predicate='n_perizinan'; reverse=!reverse">Nama Perizinan</th>
			<th class="c_tanggal_pendaftaran" ng-click="predicate='d_terima_berkas'; reverse=!reverse">Tanggal Pendaftaran</th>
			<th class="c_nama_pemohon" ng-click="predicate='n_pemohon'; reverse=!reverse">Nama Pemohon</th>
			<th class="c_nomor_surat" ng-click="predicate='no_surat'; reverse=!reverse">No Surat</th>
			<th class="c_tanggal_surat" ng-click="predicate='tgl_surat'; reverse=!reverse">Tanggal Surat</th>
			<th class="c_alamat" ng-click="predicate='a_pemohon'; reverse=!reverse">Alamat Pemohon</th>
			<th class="c_kelurahan" ng-click="predicate='n_kelurahan'; reverse=!reverse">Kelurahan</th>
		</tr>
	</table>
@stop

@section('table_content')
	<table role="table-fluid">
		<tr ng-repeat="mpbpi in monitoring_per_bulan_pengambilan_izin_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no"> @{{ $index+1 }}</td>
			<td class="c_no_pendaftaran">@{{ mpbpi.pendaftaran_id }}</td>
			<td class="c_nama_perizinan">@{{ mpbpi.n_perizinan }}</td>
			<td class="c_tanggal_pendaftaran">@{{ mpbpi.d_terima_berkas }}</td>
			<td class="c_nama_pemohon">@{{ mpbpi.n_pemohon }}</td>
			<td class="c_nomor_surat">@{{ mpbpi.no_surat }}</td>
			<td class="c_tanggal_surat">@{{ mpbpi.tgl_surat }}</td>
			<td class="c_alamat">@{{ mpbpi.a_pemohon }}</td>
			<td class="c_kelurahan">@{{ mpbpi.n_kelurahan }}</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		<tr>
	</table>
@stop

