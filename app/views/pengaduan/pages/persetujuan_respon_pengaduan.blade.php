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
			width: 7%;
			text-align: center;
		}

		.c_d_entry {
			width: 7%;
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
			width: 10%;
			text-align: center;
		}

		.c_verifikasi {
			width: 10%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Pengaduan / Persetujuan Respon Pengaduan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PengaduanCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PengaduanPersetujuanResponPengaduanCtrl"
@stop

@section('nav-menu-left')
	<form ng-submit="filter_pengaduan()">
		<div class="table-form-content">
			<!-- <div class="form-item">
				<button ng-click="" style="width='30px'">Tambah Pengaduan</button>
			</div>
			<div class="form-item wide">
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
					<option value="nama">Nama</option>
					<option value="kelurahan">Kelurahan</option>
					<option value="kecamatan">Kecamatan</option>
					<option value="n_sts_pesan">Status Pesan</option>
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
			<th class="c_d_entry" ng-click="predicate='d_entry'; reverse=!reverse">Tgl Pengiriman</th>
			<th class="c_sumber_pesan" ng-click="predicate='name'; reverse=!reverse">Sumber Pengaduan</th>
			<th class="c_aksi">Aksi</th>
			<th class="c_verifikasi">Verifikasi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="pprp in pengaduan_persetujuan_respon_pengaduan_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_e_pesan">@{{ pprp.e_pesan_koreksi }}</td>
			<td class="c_nama">@{{ pprp.nama }}</td>
			<td class="c_alamat">@{{ pprp.alamat }}</td>
			<td class="c_kelurahan">@{{ pprp.kelurahan }}</td>
			<td class="c_kecamatan">@{{ pprp.kecamatan }}</td>
			<td class="c_n_sts_pesan">@{{ pprp.n_sts_pesan }}</td>
			<td class="c_d_entry">@{{ pprp.d_entry }}</td>
			<td class="c_sumber_pesan">@{{ pprp.name }}</td>
			<td class="c_aksi">
				<span class="button-group">
					<a href ng-click="open_modal('modal_edit', pprp.id)" class="row-item ya">Edit</a>
				</span>
			</td>
			<td class="c_verifikasi"> </td>	
		</tr>
		<tr>
			<td colspan="11" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop

@section('modal-content')
	@include('pengaduan.modals.pengaduan_persetujuan_respon_pengaduan_modal_edit', ['modal_name' => 'modal_edit'])
@stop