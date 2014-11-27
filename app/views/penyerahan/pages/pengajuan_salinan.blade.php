@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_no_pendaftaran {
			width: 10%;
			text-align: center;
		}
		.c_pemohon {
			width: 15%;
		}
		.c_jenis_izin {
			width: 15%;
			text-align: center;
		}
		.c_tanggal_permohonan {
			width: 10%;
			text-align: center;
		}
		.c_no_surat {
			width: 10%;
			text-align: center;
		}
		.c_tanggal_surat {
			width: 10%;
			text-align: center;
		}
		.c_aksi {
			width: 10%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Penyerahan / Pengajuan Salinan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PenyerahanCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PenyerahanPengajuanSalinanCtrl"
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
			<div class="form-item">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="pendaftaran_id">No Pendaftaran</option>
					<option value="n_pemohon">Nama Pemegang Izin</option>
					<option value="n_perizinan">Jenis Izin</option>
					<option value="d_terima_berkas">Tanggal Daftar</option>
					<option value="no_surat">No Surat</option>
					<option value="tgl_surat">Tanggal Surat</option>
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
			<th class="c_no_pendaftaran" ng-click="predicate='pendaftaran_id'; reverse=!reverse" > No Pendaftaran </th>
			<th class="c_pemohon" ng-click="predicate='n_pemohon'; reverse=!reverse" > Nama Pemegang Izin </th>
			<th class="c_jenis_izin" ng-click="predicate='n_perizinan'; reverse=!reverse" > Jenis Izin </th>
			<th class="c_tanggal_permohonan" ng-click="predicate='d_terima_berkas'; reverse=!reverse" > Tanggal Daftar </th>
			<th class="c_no_surat" ng-click="predicate='no_surat'; reverse=!reverse" > No Surat </th>
			<th class="c_tanggal_surat" ng-click="predicate='tgl_surat'; reverse=!reverse"> Tanggal Surat </th>
			<th class="c_aksi"> Aksi </th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="pps in penyerahan_pengajuan_salinan | orderBy:predicate:reverse | filter:search | limitTo:displayed ">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_no_pendaftaran"> @{{ pps.pendaftaran_id }} </td>
			<td class="c_pemohon"> @{{ pps.n_pemohon }} </td>
			<td class="c_jenis_izin"> @{{ pps.n_perizinan }} </td>
			<td class="c_tanggal_permohonan"> @{{ pps.d_terima_berkas }} </td>
			<td class="c_no_surat"> @{{ pps.no_surat }} </td>
			<td class="c_tanggal_surat"> @{{ pps.tgl_surat }} </td>
			<td class="c_aksi">
				<span class="button-group group-1">
					<a href ng-click="open_modal('modal_penyerahan', ppi.id)" class="accept">Setujui</a>
				</span>
			</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		<tr>
	</table>

@stop

@section('modal-content')

@stop
