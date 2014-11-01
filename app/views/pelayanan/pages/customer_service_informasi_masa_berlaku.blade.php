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

		.c_n_perizinan{
			width: 10%;
			text-align: center;
		}

		.c_n_pemohon {
			width: 12%;
			text-align: center;
		}

		.c_jenis_izin{
			width: 10%;
			text-align: center;
		}

		.c_masaberlaku {
			width: 10%;
			text-align: center;
		}

		.c_status {
			width: 10%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Pelayanan / Customer Service / Izin Masa Berlaku
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PelayananCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PelayananCustomerServiceInformasiMasaBerlakuCtrl"
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
			<th class="c_n_pemohon">Pemohon</th>
			<th class="c_n_perizinan">Jenis Permohonan</th>
			<th class="c_masaberlaku">Masa Berlaku</th>
			<th class="c_status">Status</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="csimb in customer_service_informasi_masa_berlaku_data">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_pendaftaran_id">@{{ csimb.pendaftaran_id }}</td>
			<td class="c_jenis_izin">@{{ csimb.n_perizinan }}</td>
			<td class="c_n_pemohon">@{{ csimb.n_pemohon }}</td>
			<td class="c_n_perizinan">@{{ csimb.n_permohonan }}</td>
			<td class="c_masaberlaku">@{{ csimb.d_berlaku_izin}}</td>
			<td class="c_status">aaaaaa</td>			
		</tr>
	</table>

@stop