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
			width: 10%;
			text-align: center;
		}

		.c_alamat {
			width: 10%;
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
			width: 10%;
			text-align: center;
		}

		.c_aksi {
			width: 5%;
			text-align: center;
		}

		.c_verifikasi {
			width: 5%;
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
			<th class="c_kelurahan">Kelurahan</th>
			<th class="c_kecamatan">Kecamatan</th>
			<th class="c_n_sts_pesan">Status Pengaduan</th>
			<th class="c_tindak_lanjut">Tindak Lanjut</th>
			<th class="c_d_entry">Tgl Pengiriman</th>
			<th class="c_sumber_pesan">Sumber Pengaduan</th>
			<th class="c_aksi">Aksi</th>
			<th class="c_verifikasi">Verifikasi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="pdps in pengaduan_daftar_pengaduan_saran_data">
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
			<td class="c_aksi">@{{ pdps.id }}</td>
			<td class="c_verifikasi"> @{{ pdps.id }}</td>
		</tr>
	</table>

@stop