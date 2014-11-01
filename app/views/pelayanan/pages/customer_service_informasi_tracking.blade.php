@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 3%;
			text-align: center;
		}
		
		.c_pendaftaran_id {
			width: 10%;
			text-align: center;
		}

		.c_jenis_izin {
			width: 10%;
			text-align: center;
		}

		.c_lokasi {
			width: 12%;
			text-align: center;
		}

		.c_pemohon {
			width: 10%;
			text-align: center;
		}

		.c_jenis_permohonan {
			width: 20%;
			text-align: center;
		}

		.c_status {
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
	Pelayanan / Customer Service / Informasi Tracking
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PelayananCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PelayananCustomerServiceInformasiTrackingCtrl"
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
			<th class="c_pendaftaran_id">No Pendaftaran</th>
			<th class="c_jenis_izin">Jenis Izin</th>
			<th class="c_lokasi">Lokasi Izin</th>
			<th class="c_pemohon">Pemohon</th>
			<th class="c_jenis_permohonan">Jenis Permohonan</th>
			<th class="c_status">Status Terakhir</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="csit in customer_service_informasi_tracking_data">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_pendaftaran_id">@{{ csit.pendaftaran_id }}</td>
			<td class="c_jenis_izin">@{{ csit.n_perizinan }}</td>
			<td class="c_lokasi">@{{ csit.a_izin }}</td>
			<td class="c_pemohon">@{{ csit.n_pemohon }}</td>
			<td class="c_jenis_permohonan">@{{ csit.n_permohonan }}</td>
			<td class="c_status">@{{ csit.n_sts_permohonan}}</td>
			<td class="c_aksi">@{{ csit.id }}</td>
		</tr>
	</table>

@stop