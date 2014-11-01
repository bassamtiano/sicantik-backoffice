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
		.c_n_pemohon {
			width: 16%;
		}
		.c_n_perizinan {
			width: 28%;
			text-align: center;
		}
		.c_d_terima_berkas {
			width: 13%;
			text-align: center;
		}
		.c_nilai_retribusi {
			width: 13%;
			text-align: center;
		}
		.c_aksi {
			width: 10%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Backoffice / Tim Teknis / Hitung Retribusi
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/BackofficeCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="BackofficeTimTeknisHitungRetribusiCtrl"
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
					<option value="d_terima_berkas">Tanggal Permohonan</option>
					<option value="nilai_retribusi">Nilai Retribusi</option>
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
			<th class="c_pendaftaran_id" ng-click="predicate='pendaftaran_id'; reverse=!reverse">No Pendaftaran</th>
			<th class="c_n_pemohon" ng-click="predicate='n_pemohon'; reverse=!reverse">Pemohon</th>
			<th class="c_n_perizinan" ng-click="predicate='n_perizinan'; reverse=!reverse">Jenis Izin</th>
			<th class="c_d_terima_berkas" ng-click="predicate='n_permohonan'; reverse=!reverse">Tanggal Permohonan</th>
			<th class="c_nilai_retribusi" ng-click="predicate='d_terima_berkas'; reverse=!reverse">Nilai Retribusi</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="btthr in backoffice_tim_teknis_hitung_retribusi_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_pendaftaran_id"> @{{ btthr.pendaftaran_id }} </td>
			<td class="c_n_pemohon"> @{{ btthr.n_pemohon }} </td>
			<td class="c_n_perizinan"> @{{ btthr.n_perizinan }} </td>
			<td class="c_d_terima_berkas"> @{{ btthr.d_terima_berkas }} </td>
			<td class="c_nilai_retribusi"> @{{ btthr.nilai_retribusi }} </td>
			<td class="c_aksi"> @{{ btthr.id }} </td>
		</tr>
		<tr>
			<td colspan="9" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		<tr>
	</table>

@stop
