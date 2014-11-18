@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 3%;
			text-align: center;
		}
		
		.c_e_pesan {
			width: 11%;
		}

		.c_nama {
			width: 9%;
			text-align: center;
		}

		.c_kelurahan {
			width: 7%;
			text-align: center;
		}

		.c_kecamatan {
			width: 7%;
			text-align: center;
		}

		.c_n_sts_pesan {
			width: 10%;
			text-align: center;
		}

		.c_tindak_lanjut {
			width: 10%;
			text-align: center;
		}

		.c_d_entry {
			width: 10%;
			text-align: center;
		}

		.c_sumber_pesan {
			width: 9%;
			text-align: center;
		}

		.c_alamat {
			width: 10%;
			text-align: center;
		}

		.c_aksi {
			width: 7%;
			text-align: center;
		}

		.c_verifikasi {
			width: 7%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Pengaduan / Daftar Pengaduan dan Saran
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PengaduanCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PengaduanDaftarPengaduanSaranCtrl"
@stop

@section('nav-menu-left')
	
	<div class="table-form-content">
			<div class="form-item">
				<button ng-click="open_modal('modal_tambah', null)" style="width='30px'">Tambah Pengaduan</button>
			</div>
		<form ng-submit="filter_pengaduan()">
			<div class="form-item wide">
				<select class="form-option" ng-model="pengaduan_id" ng-options="pdpsop.sts_pesan_id as pdpsop.n_sts_pesan for pdpsop in pengaduan_daftar_pengaduan_saran_opsi_pengaduan">
					<option value="">Pilih Opsi Pengaduan</option>
				</select>
			</div>
			
			<div class="form-item">
				<input type="submit" value="Filter">
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
					<option value="nama">Nama</option>
					<option value="kelurahan">Kelurahan</option>
					<option value="kecamatan">Kecamatan</option>
					<option value="c_tindak_lanjut">Tindak Lanjut</option>
					<option value="d_entry">Tgl Pengiriman</option>
					<option value="name">Sumber Pengaduan</option>
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
			<th class="c_e_pesan" ng-click="predicate='e_pesan'; reverse=!reverse">Isi Pesan</th>
			<th class="c_nama" ng-click="predicate='nama'; reverse=!reverse">Nama</th>
			<th class="c_alamat" ng-click="predicate='alamat'; reverse=!reverse">Alamat</th>
			<th class="c_kelurahan" ng-click="predicate='kelurahan'; reverse=!reverse">Kelurahan</th>
			<th class="c_kecamatan" ng-click="predicate='kecamatan'; reverse=!reverse">Kecamatan</th>
			<th class="c_n_sts_pesan" ng-click="predicate='n_sts_pesan'; reverse=!reverse">Status Pengaduan</th>
			<th class="c_tindak_lanjut" ng-click="predicate='c_tindak_lanjut'; reverse=!reverse">Tindak Lanjut</th>
			<th class="c_d_entry" ng-click="predicate='d_entry'; reverse=!reverse">Tgl Pengiriman</th>
			<th class="c_sumber_pesan" ng-click="predicate='name'; reverse=!reverse">Sumber Pengaduan</th>
			<th class="c_aksi">Aksi</th>
			<th class="c_verifikasi">Verifikasi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="pdps in pengaduan_daftar_pengaduan_saran_data | orderBy:predicate:reverse | filter:search | limitTo:displayed ">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_e_pesan">@{{ pdps.e_pesan }}</td>
			<td class="c_nama">@{{ pdps.nama }}</td>
			<td class="c_alamat">@{{ pdps.alamat }}</td>
			<td class="c_kelurahan">@{{ pdps.kelurahan }}</td>
			<td class="c_kecamatan">@{{ pdps.kecamatan }}</td>
			<td class="c_n_sts_pesan">@{{ pdps.n_sts_pesan }}</td>
			<td class="c_tindak_lanjut">@{{ pdps.c_tindak_lanjut }}</td>
			<td class="c_d_entry">@{{ pdps.d_entry }}</td>
			<td class="c_sumber_pesan">@{{ pdps.name }}</td>
			<td class="c_aksi">
				<span class="button-group">
					<a href ng-click="open_modal('modal_edit', pdps.id)" class="row-item ya">Edit</a>
				</span>
			</td>
			<td class="c_verifikasi"> </td>
			
		</tr>
		<tr>
			<td colspan="12" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop

@section('modal-content')
	@include('pengaduan.modals.pengaduan_daftar_pengaduan_dan_saran_modal_tambah', ['modal_name' => 'modal_tambah'])
	@include('pengaduan.modals.pengaduan_daftar_pengaduan_dan_saran_modal_edit', ['modal_name' => 'modal_edit'])
@stop