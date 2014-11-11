@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 3%;
			text-align: center;
		}
		
		.c_e_pesan {
			width: 22%;
		}

		.c_nama {
			width: 10%;
			text-align: center;
		}

		.c_e_tindak_lanjut {
			width: 15%;
			text-align: center;
		}

		.c_e_pesan_koreksi {
			width: 15%;
			text-align: center;
		}

		.c_aksi {
			width: 10%;
			text-align: center;
		}

		.c_name{
			width: 10%;
			text-align: center;
		}

		.c_skpd_tindaklanjut{
			width: 8%;
			text-align: center;
		}

		.c_nama_penanggungjawab{
			width: 7%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Pengaduan / Pengiriman Respon Pengaduan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PengaduanCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PengaduanDaftarBalasanCtrl"
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
					<option value="nama">Nama</option>
					<option value="e_pesan">Surat Pengaduan</option>
					<option value="e_pesan_koreksi">Surat Koreksi</option>
					<option value="name">Sumber Pesan</option>
					<option value="e_tindak_lanjut">Surat Balasan</option>
					<option value="c_skpd_tindak_lanjut">Dinas</option>
					<option value="nama_penanggungjawab">Penanggung Jawab</option>
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
			<th class="c_nama" ng-click="predicate='nama'; reverse=!reverse">Nama</th>
			<th class="c_e_pesan" ng-click="predicate='e_pesan'; reverse=!reverse">Surat Pengaduan</th>
			<th class="c_e_pesan_koreksi" ng-click="predicate='e_pesan_koreksi'; reverse=!reverse">Surat Koreksi</th>
			<th class="c_name" ng-click="predicate='name'; reverse=!reverse">Media</th>
			<th class="c_e_tindak_lanjut" ng-click="predicate='e_tindak_lanjut'; reverse=!reverse">Surat Balasan</th>
			<th class="c_skpd_tindak_lanjut" ng-click="predicate='c_skpd_tindak_lanjut'; reverse=!reverse">Dinas</th>
			<th class="c_nama_penanggungjawab" ng-click="predicate='nama_penanggungjawab'; reverse=!reverse">PJ</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="pdb in pengaduan_daftar_balasan_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_nama">@{{ pdb.nama }}</td>
			<td class="c_e_pesan">@{{ pdb.e_pesan }}</td>
			<td class="c_e_pesan_koreksi">@{{ pdb.e_pesan_koreksi }}</td>
			<td class="c_name">@{{ pdb.name }}</td>
			<td class="c_e_tindak_lanjut">@{{ pdb.e_tindak_lanjut }}</td>
			<td class="c_skpd_tindaklanjut">@{{ pdb.c_skpd_tindaklanjut }}</td>
			<td class="c_nama_penanggungjawab">@{{ pdb.nama_penanggungjawab }}</td>
			<td class="c_aksi">@{{ pdb.id }}</td>			
		</tr>
		<tr>
			<td colspan="9" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop