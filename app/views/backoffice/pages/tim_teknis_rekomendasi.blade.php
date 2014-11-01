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
		.c_nama_pemohon {
			width: 10%;
		}
		.c_jenis_izin {
			width: 15%;
			text-align: center;
		}
		.c_jenis_permohonan {
			width: 15%;
			text-align: center;
		}
		.c_tanggal_peninjauan {
			width: 10%;
			text-align: center;
		}
		.c_tim_teknis {
			width: 10%;
			text-align: center;
		}
		.c_rekomendasi {
			width: 10%;
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
	Backoffice / Tim Teknis / Rekomendasi
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/BackofficeCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="BackofficeTimTeknisRekomendasiCtrl"
@stop

@section('nav-menu-left')
	<form ng-submit="filter_date()">
		<div class="table-form-content">
			<div class="form-item">
				&nbsp;
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
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="pendaftaran_id">No Pendaftaran</option>
					<option value="n_pemohon">Nama Pemohon</option>
					<option value="n_perizinan">Jenis Izin</option>
					<option value="n_permohonan">Jenis Pemohonan</option>
					<option value="n_unitkerja">Tim Teknis</option>
				</select>
			</div>
			<div class="form-item">
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
			<th class="c_nama_pemohon" ng-click="predicate='n_pemohon'; reverse=!reverse">Nama Pemohon</th>
			<th class="c_jenis_izin" ng-click="predicate='n_perizinan'; reverse=!reverse">Jenis Izin</th>
			<th class="c_jenis_permohonan" ng-click="predicate='n_permohonan'; reverse=!reverse">Jenis Permohonan</th>
			<th class="c_tanggal_peninjauan" ng-click="predicate='d_survey'; reverse=!reverse">Tanggal Peninjauan</th>
			<th class="c_tim_teknis" ng-click="predicate='n_unitkerja'; reverse=!reverse">Tim Teknis</th>
			<th class="c_rekomendasi" ng-click="predicate='rekomendasi'; reverse=!reverse">Rekomendasi</th>
			<th class="c_status">Status</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="bttr in backoffice_tim_teknis_rekomendasi_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_no_pendaftaran"> @{{ bttr.pendaftaran_id }} </td>
			<td class="c_nama_pemohon"> @{{ bttr.n_pemohon }} </td>
			<td class="c_jenis_izin"> @{{ bttr.n_perizinan }} </td>
			<td class="c_jenis_permohonan"> @{{ bttr.n_permohonan }} </td>
			<td class="c_tanggal_peninjauan"> @{{ bttr.d_survey }} </td>
			<td class="c_tim_teknis"> @{{ bttr.n_unitkerja }} </td>
			<td class="c_rekomendasi"> @{{ bttr.rekomendasi }} </td>
			<td class="c_status">@{{ bttr.status_tinjauan }}</td>
			<td class="c_aksi"> @{{ bttr.id }} </td>
		</tr>
		<tr>
			<td colspan="10" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		<tr>
	</table>

@stop
