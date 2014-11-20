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
			width: 8%;
			text-align: center;
		}
		.c_status {
			width: 5%;
			text-align: center;
		}
		.c_aksi {
			width: 12%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Penyerahan / Penyerahan Izin
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PenyerahanCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PenyerahanPenyerahanIzinCtrl"
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
					<option value="n_pemohon">Pemohon</option>
					<option value="n_perizinan">Jenis Izin</option>
					<option value="d_terima_berkas">Tanggal Permohonan</option>
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
			<th class="c_no_pendaftaran" ng-click="predicate='no_pendaftaran'; reverse=!reverse"> No Pendaftaran </th>
			<th class="c_pemohon" ng-click="predicate='n_pemohon'; reverse=!reverse"> Pemohon </th>
			<th class="c_jenis_izin" ng-click="predicate='n_perizinan'; reverse=!reverse"> Jenis Izin </th>
			<th class="c_tanggal_permohonan" ng-click="predicate='d_terima_berkas'; reverse=!reverse"> Tanggal Permohonan </th>
			<th class="c_no_surat" ng-click="predicate='no_surat'; reverse=!reverse"> No Surat </th>
			<th class="c_tanggal_surat" ng-click="predicate='tgl_surat'; reverse=!reverse"> Tanggal Surat </th>
			<th class="c_status" ng-click="predicate='c_status'; reverse=!reverse">Status</th>
			<th class="c_aksi"> Aksi </th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="ppi in penyerahan_penyerahan_izin | orderBy:predicate:reverse | filter:search | limitTo:displayed ">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_no_pendaftaran"> @{{ ppi.pendaftaran_id }} </td>
			<td class="c_pemohon"> @{{ ppi.n_pemohon }} </td>
			<td class="c_jenis_izin"> @{{ ppi.n_perizinan }} </td>
			<td class="c_tanggal_permohonan"> @{{ ppi.d_terima_berkas }} </td>
			<td class="c_no_surat"> @{{ ppi.no_surat }} </td>
			<td class="c_tanggal_surat"> @{{ ppi.tgl_surat }} </td>
			<td class="c_status">
				<p ng-if="ppi.c_status = 1">Sudah Membayar</p>
				<p ng-if="ppi.c_status = 0">Tidak Membayar</p>
			</td>
			<td class="c_aksi">
				<!-- @{{ ppi.id }} -->
				<span class="button-group group-2">
					<a href ng-click="open_modal('modal_penyerahan', ppi.id)" class="accept">Penyerahan</a>
					<a href ng-click="open_modal('modal_email', ppi.id)" class="email">Email</a>
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
	@include('penyerahan.modals.penyerahan_izin_modal_penyerahan', ['modal_name' => 'modal_penyerahan'])
	@include('penyerahan.modals.penyerahan_izin_modal_email', ['modal_name' => 'modal_email'])
@stop
