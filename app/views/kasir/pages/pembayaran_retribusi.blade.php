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
		.c_nama_perizinan {
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
	Kasir / Pembayaran Retribusi
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KasirCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KasirPembayaranRetribusiCtrl"
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
					<option value="n_pemohon">Nama Pemohon</option>
					<option value="n_perizinan">Nama Perizinan</option>
					<option value="d_terima_berkas">Tanggal Permohonan</option>
					<option value="no_surat">No Surat</option>
					<option value="c_status_bayar">Status</option>
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
			<th class="c_no_pendaftaran" ng-click="predicate='pendaftaran_id'; reverse=!reverse"> No Pendaftaran </th>
			<th class="c_pemohon" ng-click="predicate='n_pemohon'; reverse=!reverse"> Nama Pemohon </th>
			<th class="c_nama_perizinan" ng-click="predicate='n_perizinan'; reverse=!reverse"> Nama Perizinan </th>
			<th class="c_tanggal_permohonan" ng-click="predicate='d_terima_berkas'; reverse=!reverse"> Tanggal Permohonan </th>
			<th class="c_no_surat" ng-click="predicate='no_surat'; reverse=!reverse"> No Surat </th>
			<th class="c_status" ng-click="predicate='c_status_bayar'; reverse=!reverse">Status</th>
			<th class="c_aksi"> Aksi </th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="kpr in kasir_pembayaran_retribusi | orderBy:predicate:reverse | filter:search | limitTo:displayed ">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_no_pendaftaran"> @{{ kpr.pendaftaran_id }} </td>
			<td class="c_pemohon"> @{{ kpr.n_pemohon }} </td>
			<td class="c_nama_perizinan"> @{{ kpr.n_perizinan }} </td>
			<td class="c_tanggal_permohonan"> @{{ kpr.d_terima_berkas }} </td>
			<td class="c_no_surat"> @{{ kpr.no_surat }} </td>
			<td class="c_status">@{{ kpr.c_status_bayar }}</td>
			<td class="c_aksi">
				<a href ng-click="open_modal('modal_rincian', kpr.id)" class="edit">Rincian</a>
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
	@include('kasir.modals.pembayaran_retribusi_modal_rinci', ['modal_name' => 'modal_rincian'])
@stop
