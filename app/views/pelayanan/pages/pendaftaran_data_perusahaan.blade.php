@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 3%;
			text-align: center;
		}
		
		.c_n_perusahaan {
			width: 25%;
			text-align: center;
		}

		.c_npwp {
			width: 20%;
			text-align: center;
		}

		.c_a_perusahaan {
			width: 20%;
			text-align: center;
		}

		.c_aksi {
			width: 15%;
			text-align: center;
		}

	</style>

@stop

@section('page_name')
	Pelayanan / Pendaftaran / Data Perusahaan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PelayananCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PelayananPendaftaranDataPerusahaanCtrl"
@stop

@section('nav-menu-left')
	<form ng-submit="filter_pelayanan()">
		<div class="table-form-content">
			<div class="form-item">
				<button ng-click="open_modal('modal_tambah_perusahaan')" style="width='30px'">Tambah Perusahaan</button>
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
					<option value="n_perusahaan">Nama Perusahaan</option>
					<option value="npwp">NPWP</option>
					<option value="a_perusahaan">Alamat</option>
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
			<th class="c_n_perusahaan" ng-click="predicate='n_perusahaan'; reverse=!reverse">Nama Perusahaan</th>
			<th class="c_npwp" ng-click="predicate='npwp'; reverse=!reverse">NPWP</th>
			<th class="c_a_perusahaan" ng-click="predicate='a_perusahaan'; reverse=!reverse">Alamat</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="ppdp in pelayanan_pendaftaran_data_perusahaan_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_n_perusahaan">@{{ ppdp.n_perusahaan }}</td>
			<td class="c_npwp">@{{ ppdp.npwp }}</td>
			<td class="c_a_perusahaan">@{{ ppdp.a_perusahaan }}</td>
			<td class="c_aksi">
				<a href ng-click="open_modal('modal_edit', ppdp.id)" class="row-item ya">Edit</a>
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
	@include('pelayanan.modals.pelayanan_pendaftaran_data_perusahaan_modal_tambah', ['modal_name' => 'modal_tambah_perusahaan'])
	@include('pelayanan.modals.pelayanan_pendaftaran_data_perusahaan_modal_edit', ['modal_name' => 'modal_edit'])
@stop