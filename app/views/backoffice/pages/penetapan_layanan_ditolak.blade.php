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
		.c_pemohon {
			width: 15%;
		}
		.c_jenis_izin {
			width: 15%;
			text-align: center;
		}

		.c_alamat_permohonan {
			width: 20%;
			text-align: center;
		}

		.c_tanggal_permohonan {
			width: 15%;
			text-align: center;
		}

		.c_status {
			width: 5%;
			text-align: center;	
		}
		.c_aksi {
			width: 10%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Backoffice / Penetapan / Layanan Ditolak
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/BackofficeCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="BackofficePenetapanLayananDitolakCtrl"
@stop

@section('nav-menu-left')

		<div class="table-form-content">
			<div class="form-item">
				&nbsp;
			</div>
			<form ng-submit="filter_date()">
			<div class="form-item">
				<input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.start" placeholder="Tanggal Awal">
			</div>
			<div class="form-item">
				<input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.finish" placeholder="Tanggal Akhir">
			</div>
			<div class="form-item">
				<input type="submit" value="Filter Tanggal">
			</div>
			</form>
		</div>
	
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
					<option value="n_pemohon">Pemohon</option>
					<option value="n_perizinan">Jenis Izin</option>
					<option value="a_pemohon">Alamat Permohonan</option>
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
			<th class="c_pemohon" ng-click="predicate='pemohon_id'; reverse=!reverse">Pemohon</th>
			<th class="c_jenis_izin" ng-click="predicate='n_perizinan'; reverse=!reverse">Jenis Izin</th>
			<th class="c_alamat_permohonan" ng-click="predicate='a_pemohon'; reverse=!reverse">Alamat Permohonan</th>
			<th class="c_tanggal_permohonan" ng-click="predicate='d_terima_berkas'; reverse=!reverse">Tanggal Permohonan</th>
			<th class="c_status" ng-click="predicate='c_keputusan'; reverse=!reverse">Status</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="bpld in backoffice_penetapan_layanan_ditolak | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_no_pendaftaran"> @{{ bpld.pendaftaran_id }} </td>
			<td class="c_pemohon"> @{{ bpld.n_pemohon }} </td>
			<td class="c_jenis_izin"> @{{ bpld.n_perizinan }} </td>
			<td class="c_alamat_permohonan"> @{{ bpld.a_pemohon }} </td>
			<td class="c_tanggal_permohonan"> @{{ bpld.d_terima_berkas }} </td>
			<td class="c_status">@{{ bpld.c_keputusan }}</td>
			<td class="c_aksi"> @{{ bpld.id }} </td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		<tr>
	</table>

@stop