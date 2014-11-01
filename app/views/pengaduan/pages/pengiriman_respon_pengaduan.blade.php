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
	<form>
		<div class="table-form-content">
			<div class="form-item">
				&nbsp
			</div>
			<div class="form-item wide">
				<input type="text" placeholder="Search Key">
			</div>
			<div class="form-item">
				<input type="submit" value="Search">
			</div>
		</div>
	</form>
@stop

@section('table_nav')
	
	<table>
		<tr>
			<th class="c_no">No</th>
			<th class="c_e_pesan">Isi Pesan</th>
			<th class="c_nama">Nama</th>
			<th class="c_alamat">Alamat</th>
			<th class="c_telp">No Telepon</th>
			<th class="c_n_sts_pesan">Status Pesan</th>
			<th class="c_tgl">Tanggal Pengiriman Pesan</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="pprp in pengaduan_pengiriman_respon_pengaduan_data">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_e_pesan">@{{ pprp.e_pesan_koreksi }}</td>
			<td class="c_nama">@{{ pprp.nama }}</td>
			<td class="c_alamat">@{{ pprp.alamat }}</td>
			<td class="c_telp">@{{ pprp.telp }}</td>
			<td class="c_n_sts_pesan">@{{ pprp.n_sts_pesan }}</td>
			<td class="c_tgl">@{{ pprp.d_entry }}</td>
			<td class="c_aksi">@{{ pprp.id }}</td>			
		</tr>
	</table>

@stop