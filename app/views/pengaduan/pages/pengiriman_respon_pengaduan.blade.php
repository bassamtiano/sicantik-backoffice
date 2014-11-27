@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 3%;
			text-align: center;
		}
		
		.c_e_pesan {
			width: 15%;
		}

		.c_nama {
			width: 10%;
			text-align: center;
		}

		.c_alamat {
			width: 10%;
			text-align: center;
		}

		.c_telp {
			width: 10%;
			text-align: center;
		}

		.c_n_sts_pesan {
			width: 10%;
			text-align: center;
		}

		.c_tgl{
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
	Pengaduan / Persetujuan Respon Pengaduan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PengaduanCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PengaduanPengirimanResponPengaduanCtrl"
@stop

@section('nav-menu-left')
@stop

@section('nav-menu-right')
	<form ng-submit="filter_pengaduan()">
		<div class="table-form-content">
			<!-- <div class="form-item">
				<button ng-click="show_all()" style="width='30px'">Tampilkan Semua</button>
			</div> -->
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="nama">Nama</option>
					<option value="telp">Telpon</option>
					<option value="n_sts_pesan">Status Pesan</option>
					<option value="d_entry">Tgl Pengiriman</option>
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
			<th class="c_e_pesan_koreksi" ng-click="predicate='e_pesan_koreksi'; reverse=!reverse">Isi Pesan</th>
			<th class="c_nama" ng-click="predicate='nama'; reverse=!reverse">Nama</th>
			<th class="c_e_pesan" ng-click="predicate='e_pesan'; reverse=!reverse">Alamat</th>
			<th class="c_telp" ng-click="predicate='telp'; reverse=!reverse">No Telepon</th>
			<th class="c_n_sts_pesan" ng-click="predicate='n_sts_pesan'; reverse=!reverse">Status Pesan</th>
			<th class="c_tgl" ng-click="predicate='d_entry'; reverse=!reverse">Tgl Pengiriman Pesan</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="pprp in pengaduan_pengiriman_respon_pengaduan_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_e_pesan_koreksi">@{{ pprp.e_pesan_koreksi }}</td>
			<td class="c_nama">@{{ pprp.nama }}</td>
			<td class="c_e_pesan">@{{ pprp.e_pesan }}</td>
			<td class="c_telp">@{{ pprp.telp }}</td>
			<td class="c_n_sts_pesan">@{{ pprp.n_sts_pesan }}</td>
			<td class="c_tgl">@{{ pprp.d_entry }}</td>
			<td class="c_aksi">
				<span class="button-group">
					<a href ng-click="open_modal('modal_edit', pprp.id)" class="row-item ya">Edit</a>
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
	@include('pengaduan.modals.pengaduan_pengiriman_respon_pengaduan_modal_edit', ['modal_name' => 'modal_edit'])
@stop