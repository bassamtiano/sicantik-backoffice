@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 3%;
			text-align: center;
		}
		
		.c_n_perizinan {
			width: 10%;
		}

		.c_durasi {
			width: 5%;
			text-align:  center;
		}

		.c_masaberlaku {
			width: 12%;
			text-align: center;
		}

		.c_aksi {
			width: 10%;
			text-align: center;
		}

	</style>

@stop

@section('page_name')
	Pelayanan / Customer Service / Informasi Perizinan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PelayananCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PelayananCustomerServiceInformasiPerizinanCtrl"
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
			<th class="c_n_perizinan">Nama Perizinan</th>
			<th class="c_durasi">Durasi Pengerjaan (Hari)</th>
			<th class="c_masaberlaku">Masa Berlaku Izin</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="csip in customer_service_informasi_perizinan_data">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_n_perizinan">@{{ csip.n_perizinan }}</td>
			<td class="c_durasi">@{{ csip.v_hari }}</td>
			<td class="c_masaberlaku">@{{ csip.v_berlaku_tahun }} @{{ csip.v_berlaku_satuan }}</td>
			<td class="c_aksi">@{{ csip.id }}</td>			
		</tr>
	</table>

@stop