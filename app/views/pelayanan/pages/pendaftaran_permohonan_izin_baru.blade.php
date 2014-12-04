@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 3%;
			text-align: center;
		}
		
		.c_pendaftaran_id {
			width: 15%;
		}

		.c_no_referensi {
			width: 15%;
		}

		.c_n_pemohon {
			width: 22%;
			text-align: center;
		}

		.c_n_perizinan {
			width: 10%;
			text-align: center;
		}

		.c_status {
			width: 10%;
			text-align: center;
		}

		.c_d_terima_berkas {
			width: 10%;
			text-align: center;
		}

		.c_aksi {
			width: 10%;
			text-align: center;
		}

		.c_verifikasi {
			width: 5%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Pelayanan / Pendaftaran / Permohonan Izin Baru
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PelayananCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PelayananPendaftaranPermohonanIzinBaruCtrl"
@stop

@section('nav-menu-left')
	<form ng-submit="filter_pelayanan()">
		<div class="table-form-content">
            <div class="form-item wide">
				<!-- <input type="text" placeholder="Status Perizinan" ng-model="date.id"> -->
				<select class="form-option" ng-model="perizinan_id" ng-options="pibop.id as pibop.n_perizinan for pibop in permohonan_izin_baru_opsi_perizinan">
					
				</select>
			</div>
			<div class="form-item">
				
				<button ng-click="open_modal('modal_tambah')" style="width='30px'">Tambah Pemohon</button>
			</div>
			<!-- <div class="form-item wide">
				<select class="form-option" ng-model="pengaduan_id" ng-options="pdpsop.sts_pesan_id as pdpsop.n_sts_pesan for pdpsop in pengaduan_daftar_pengaduan_saran_opsi_pengaduan">
					<option value="">Pilih Opsi Pengaduan</option>
				</select>
			</div>
			
			<div class="form-item">
				<input type="submit" value="Filter">
			</div> -->
		</div>
	</form>
@stop

@section('nav-menu-right')
	<form>
		<div class="table-form-content">
			<!-- <div class="form-item">
				<button ng-click="show_all()" style="width='30px'">Tampilkan Semua</button>
			</div> -->
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="pendaftaran_id">No Pendaftaran</option>
					<option value="no_referensi">ID Pemohon</option>
					<option value="n_pemohon">Nama Pemohon</option>
					<option value="n_perizinan">Jenis Izin</option>
					<option value="status">Status</option>
					<option value="d_terima_berkas">Tgl Permohonan</option>
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
			<th class="c_pendaftaran_id" ng-click="predicate='pendaftaran_id'; reverse=!reverse">No Pendaftaran</th>
			<th class="c_no_referensi" ng-click="predicate='no_referensi'; reverse=!reverse">ID Pemohon</th>
			<th class="c_n_pemohon" ng-click="predicate='n_pemohon'; reverse=!reverse">Pemohon</th>
			<th class="c_n_perizinan" ng-click="predicate='n_perizinan'; reverse=!reverse">Jenis Izin</th>
			<th class="c_status" ng-click="predicate='status'; reverse=!reverse">Status</th>
			<th class="c_d_terima_berkas" ng-click="predicate='d_terima_berkas'; reverse=!reverse">Tgl Permohonan</th>
			<th class="c_aksi">Aksi</th>
			<th class="c_verifikasi">Verifikasi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="pppib in pelayanan_pendaftaran_permohonan_izin_baru_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_pendaftaran_id">@{{ pppib.pendaftaran_id }}</td>
			<td class="c_no_referensi">@{{ pppib.no_referensi }}</td>
			<td class="c_n_pemohon">@{{ pppib.n_pemohon }}</td>
			<td class="c_n_perizinan">@{{ pppib.n_perizinan }}</td>
			<td class="c_status">@{{ pppib.c_paralel}}</td>
			<td class="c_d_terima_berkas">@{{ pppib.d_terima_berkas }}</td>
			<td class="c_aksi">
				<a href ng-click="open_modal('modal_edit', pppib.id)" class="row-item ya">Edit</a> 
			</td>
			<td class="c_verifikasi">
				<a href ng-click="open_modal('modal_setujui', pppib.id)" class="row-item ya">Setujui</a>
			</td>
			
		</tr>
		<tr>
			<td colspan="12" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop

@section('modal-content')
	@include('pelayanan.modals.pelayanan_pendaftaran_permohonan_izin_baru_modal_edit', ['modal_name' => 'modal_edit'])
	@include('pelayanan.modals.pelayanan_pendaftaran_permohonan_izin_baru_modal_tambah', ['modal_name' => 'modal_tambah'])
	@include('pelayanan.modals.pelayanan_pendaftaran_permohonan_izin_baru_modal_setujui', ['modal_name' => 'modal_setujui'])
@stop