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
		.c_jenis_permohonan {
			width: 15%;
			text-align: center;
		}
		.c_tanggal_permohonan {
			width: 10%;
			text-align: center;
		}
		.c_tanggal_peninjauan {
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
	Backoffice / Tim Teknis / Pembuatan Berita Acara
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/BackofficeCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="BackofficeTimTeknisPembuatanBeritaAcaraPemeriksaanCtrl"
@stop

@section('nav-menu-left')
	<form ng-submit="filter_date()">
		<div class="table-form-content">
			<div class="form-item">

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
					<option value="n_pemohon">Nama Pemohon</option>
					<option value="n_perizinan">Jenis Izin</option>
					<option value="n_permohonan">Jenis Pemohonan</option>
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
			<th class="c_pemohon" ng-click="predicate='n_pemohon'; reverse=!reverse">Pemohon</th>
			<th class="c_jenis_izin" ng-click="predicate='n_perizinan'; reverse=!reverse">Jenis Izin</th>
			<th class="c_jenis_permohonan" ng-click="predicate='n_permohonan'; reverse=!reverse">Jenis Permohonan</th>
			<th class="c_tanggal_permohonan" ng-click="predicate='d_terima_berkas'; reverse=!reverse">Tanggal Permohonan</th>
			<th class="c_tanggal_peninjauan" ng-click="predicate='d_survey'; reverse=!reverse">Tanggal Peninjauan</th>
			<th class="c_status" ng-click="predicate='c_tinjauan'; reverse=!reverse">Status</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="bttpbap in backoffice_tim_teknis_pembuatan_berita_acara_pemeriksaan | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_no_pendaftaran"> @{{ bttpbap.pendaftaran_id }} </td>
			<td class="c_pemohon"> @{{ bttpbap.n_pemohon }} </td>
			<td class="c_jenis_izin"> @{{ bttpbap.n_perizinan }} </td>
			<td class="c_jenis_permohonan"> @{{ bttpbap.n_permohonan }} </td>
			<td class="c_tanggal_permohonan"> @{{ bttpbap.d_terima_berkas }} </td>
			<td class="c_tanggal_peninjauan"> @{{ bttpbap.d_survey }} </td>
			<td class="c_status">@{{ bttpbap.c_tinjauan }}</td>
			<td class="c_aksi">
				<span class="button-group">
					<a href ng-click="open_modal('modal_edit', bttpbap.id)" class="edit">Edit Berita Acara Pemeriksaan</a>
				</span>
			</td>
		</tr>
		<tr>
			<td colspan="9" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		<tr>
	</table>

@stop

@section('modal-content')
	@include('backoffice.modals.tim_teknis_pembuatan_berita_acara_pemeriksaan_modal_edit', ['modal_name' => 'modal_edit'])
@stop
