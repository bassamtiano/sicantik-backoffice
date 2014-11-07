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
			<!-- <div class="form-item">
				<button ng-click="show_all()" style="width='30px'">Tampilkan Semua</button>
			</div> -->
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="">Semua</option>
					<option value="pendaftaran_id">No Pendaftaran</option>
					<option value="no_referensi">ID Pemohon</option>
					<option value="n_pemohon">Nama Pemohon</option>
					<option value="n_perizinan">Jenis Izin</option>
					<option value="a_pemohon">Alamat Pemohon</option>
					<option value="status">Status</option>
					<option value="d_terima_berkas">Tgl Permohonan</option>
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
		<tr ng-repeat="csimb in customer_service_informasi_masa_berlaku_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_pendaftaran_id">@{{ csimb.pendaftaran_id }}</td>
			<td class="c_jenis_izin">@{{ csimb.n_perizinan }}</td>
			<td class="c_n_pemohon">@{{ csimb.n_pemohon }}</td>
			<td class="c_n_perizinan">@{{ csimb.n_permohonan }}</td>
			<td class="c_masaberlaku">@{{ csimb.d_berlaku_izin}}</td>
			<td class="c_status">@{{ csimb.status_masa_berlaku}}</td>			
		</tr>
		<tr>
			<td colspan="12" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop