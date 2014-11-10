@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_jenis_izin {
			width: 18%;
		}
		.c_kelompok {
			width: 16%;
		}
		.c_durasi_pengerjaan {
			width: 10%;
			text-align: center;
		}
		.c_berlaku_surat {
			width: 10%;
			text-align: center;
		}
		.c_ttd_pemohon {
			width: 10%;
			text-align: center;
		}
		.c_sk {
			width: 10%;
			text-align: center;
		}
		.c_aksi {
			width: 16%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Konfigurasi / Setting Perizinan / Jenis Perizinan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingPerizinanJenisPerizinanCtrl"
@stop

@section('nav-menu-left')
	<form ng-submit="filter_konfigurasi()">
		<div class="table-form-content">
			<div class="form-item">
				<button ng-click="open_modal('modal_tambah')" style="width='30px'">Tambah Jenis Perizinan</button>
			</div>
		</div>
	</form>
@stop

@section('nav-menu-right')
	<form ng-submit="filter_konfigurasi()">
		<div class="table-form-content">
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="n_perizinan">Jenis Izin</option>
					<option value="n_kelompok">Kelompok</option>
					<option value="v_hari">Durasi Pengerjaan</option>
					<option value="v_berlaku_tahun">Berlaku Surat</option>
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
			<th class="c_jenis_izin" ng-click="predicate='n_perizinan'; reverse=!reverse">Jenis Izin</th>
			<th class="c_kelompok" ng-click="predicate='n_kelompok'; reverse=!reverse">Kelompok</th>
			<th class="c_durasi_pengerjaan" ng-click="predicate='v_hari'; reverse=!reverse">Durasi Pengerjaan</th>
			<th class="c_berlaku_surat" ng-click="predicate='v_berlaku_tahun'; reverse=!reverse">Berlaku Surat</th>
			<th class="c_ttd_pemohon" ng-click="predicate='c_foto'; reverse=!reverse">Ttd Pemohon</th>
			<th class="c_sk">SK</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="spjp in setting_perizinan_jenis_perizinan_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_jenis_izin">@{{ spjp.n_perizinan }}</td>
			<td class="c_kelompok">@{{ spjp.n_kelompok }}</td>
			<td class="c_durasi_pengerjaan"> @{{ spjp.v_hari }} Hari</td>
			<td class="c_berlaku_surat">@{{ spjp.v_berlaku_tahun }} @{{ spjp.v_berlaku_satuan }}</td>
			<td class="c_ttd_pemohon">
				<p ng-if="spjp.c_foto == 1" class="row-item ya">
					Ya
				</p>
				<p ng-if="spjp.c_foto == 0" class="row-item tidak">
					Tidak
				</p>
			</td>
			<td class="c_sk">
				<p ng-if="spjp.c_keputusan == 1" class="row-item ya">
					Ya
				</p>
				<p ng-if="spjp.c_keputusan == 0" class="row-item tidak">
					Tidak
				</p>
			</td>
			<td class="c_aksi">
				<span class="button-group">
					<a href ng-click="open_modal('modal_edit', spjp.id)" class="row-item ya">Edit</a>
					<a href ng-click="open_modal('modal_delete')" class="row-item tidak">Hapus</a>
				</span>
			</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop

@section('modal-content')
	@include('konfigurasi.modals.setting_perizinan_jenis_perizinan_modal_tambah', ['modal_name' => 'modal_tambah'])
	@include('konfigurasi.modals.setting_perizinan_jenis_perizinan_modal_edit', ['modal_name' => 'modal_edit'])
	@include('konfigurasi.modals.setting_perizinan_jenis_perizinan_modal_delete', ['modal_name' => 'modal_delete'])
@stop