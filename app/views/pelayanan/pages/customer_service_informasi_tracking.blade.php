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
			<!-- <div class="form-item">
				<button ng-click="show_all()" style="width='30px'">Tampilkan Semua</button>
			</div> -->
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="pendaftaran_id">No Pendaftaran</option>
					<option value="n_perizinan">Jenis Izin</option>
					<option value="n_permohonan">Jenis Permohonan</option>
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
			<th class="c_pendaftaran_id" ng-click="predicate='pendaftaran_id'; reverse=!reverse">No Pendaftaran</th>
			<th class="c_jenis_izin" ng-click="predicate='n_perizinan'; reverse=!reverse">Jenis Izin</th>
			<th class="c_lokasi" ng-click="predicate='a_izin'; reverse=!reverse">Lokasi Izin</th>
			<th class="c_pemohon" ng-click="predicate='n_pemohon'; reverse=!reverse">Pemohon</th>
			<th class="c_jenis_permohonan" ng-click="predicate='n_permohonan'; reverse=!reverse">Jenis Permohonan</th>
			<th class="c_status" ng-click="predicate='n_sts_permohonan'; reverse=!reverse">Status Terakhir</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="csit in customer_service_informasi_tracking_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_pendaftaran_id">@{{ csit.pendaftaran_id }}</td>
			<td class="c_jenis_izin">@{{ csit.n_perizinan }}</td>
			<td class="c_lokasi">@{{ csit.a_izin }}</td>
			<td class="c_pemohon">@{{ csit.n_pemohon }}</td>
			<td class="c_jenis_permohonan">@{{ csit.n_permohonan }}</td>
			<td class="c_status">@{{ csit.n_sts_permohonan}}</td>
			<td class="c_aksi"><a href ng-click="open_modal('modal_cs_detail_tracking', csit.id)" class="row-item ya">Detail</a></td>	
		</tr>
		<tr>
			<td colspan="12" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop

@section('modal-content')
	@include('pelayanan.modals.customer_service_informasi_tracking_modal_detail', ['modal_name' => 'modal_cs_detail_tracking'])
@stop