@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_nodaftar {
			width: 20%;
			text-align: center;
		}
		.c_namaizin {
			width: 20%;
			text-align: center;
		}
		.c_namapemohon {
			width: 10%;
			text-align: center;
		}
		.c_tanggal {
			width: 10%;
			text-align: center;
		}

		.c_status{
			width: 10%;
			text-align: center;
		}

		.c_alamat {
			width: 10%;
			text-align: center;
		}
		.c_kelurahan {
			width: 10%;
			text-align: center;
		}
	</style>
@stop

@section('page_name')
	Monitoring / Per Desa dan Kecamatan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/MonitoringCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="MonitoringPerDesaKecamatanCtrl"
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
			<th class="c_nodaftar">Nomor Pendaftaran</th>
			<th class="c_namaizin">Nama Perizinan</th>
			<th class="c_tanggal">Tanggal Pendaftaran</th>
			<th class="c_namapemohon">Nama Pemohon</th>
			<th class="c_status">Status Permohonan</th>
			<th class="c_alamat">Alamat Pemohon</th>
			<th class="c_kelurahan">Kelurahan</th>
		</tr>
	</table>
@stop

@section('table_content')
	<table role="table-fluid">
		<tr ng-repeat="mpdk in monitoring_per_desa_dan_kecamatan_data">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_nodaftar">@{{ mpdk.pendaftaran_id}}</td>
			<td class="c_namaizin">@{{ mpdk.n_perizinan }}</td>
			<td class="c_tanggal">@{{ mpdk.d_terima_berkas }}</td>
			<td class="c_namapemohon">@{{ mpdk.n_pemohon }}</td>
			<td class="c_status">@{{ mpdk.n_sts_permohonan }}</td>
			<td class="c_alamat">@{{ mpdk.a_pemohon }}</td>
			<td class="c_kelurahan">@{{ mpdk.n_kelurahan }}</td>
		</tr>
	</table>
@stop