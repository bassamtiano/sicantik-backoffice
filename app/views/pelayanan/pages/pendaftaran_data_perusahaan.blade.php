@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 3%;
			text-align: center;
		}
		
		.c_n_perusahaan {
			width: 25%;
		}

		.c_npwp {
			width: 20%;
			text-align: center;
		}

		.c_a_perusahaan {
			width: 22%;
			text-align: center;
		}

		.c_aksi {
			width: 15%;
			text-align: center;
		}

		.c_verifikasi {
			width: 15%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Pelayanan / Pendaftaran / Data Perusahaan

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PelayananCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PelayananPendaftaranDataPerusahaanCtrl"
@stop

@section('table_nav')
	
	<table>
		<tr>
			<th class="c_no">No</th>
			<th class="c_n_perusahaan">Nama Perusahaan</th>
			<th class="c_npwp">NPWP</th>
			<th class="c_a_perusahaan">Alamat</th>
			<th class="c_aksi">Aksi</th>
			<th class="c_verifikasi">Verifikasi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="ppdp in pelayanan_pendaftaran_data_perusahaan_data">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_n_perusahaan">@{{ ppdp.n_perusahaan }}</td>
			<td class="c_npwp">@{{ ppdp.npwp }}</td>
			<td class="c_a_perusahaan">@{{ ppdp.a_perusahaan }}</td>
			<td class="c_aksi">@{{ ppdp.id }}</td>
			<td class="c_verifikasi">@{{  }}</td>
			
		</tr>
	</table>

@stop