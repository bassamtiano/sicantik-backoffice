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
<button onclick="show_filter_option()">TEST</button>
<div id='filter_option_dialog' style="height:102;width:10%;background-color:red;position:absolute;overflow:auto;">
	<form ng-submit="filter_date()">
		<div class="form-item">
			<label>Propinsi</label>
			<div class="form-input">
				<select name="id" ng-model="date.prop" ng-options="pjp.n_propinsi for pjp in portal_propinsi_data track by pjp.id">
					<option value="">Pilih Propinsi</option>
				</select>
			</div>
		</div>
		<div class="form-item">
			<label>Kabupaten</label>
			<div class="form-input">
				<select name="id" ng-model="date.kab" ng-options="kab.n_kabupaten for kab in portal_kabupaten_data track by kab.id">
					<option value="">Pilih Kabupaten</option>
				</select>
			</div>
		</div>
		<div class="form-item">
			<label>Kecamatan</label>
			<div class="form-input">
				<select name="id" ng-model="date.kec" ng-options="kec.n_kecamatan for kec in portal_kecamatan_data track by kec.id">
					<option value="">Pilih Kecamatan</option>
				</select>
			</div>
		</div>
		<div class="form-item">
			<label>Kelurahan</label>
			<div class="form-input">
				<select name="id" ng-model="date.kel" ng-options="kel.n_kelurahan for kel in portal_kelurahan_data track by kel.id">
					<option value="">Pilih Kelurahan</option>
				</select>
			</div>
		</div>
		<div class="form-item">
			<label>Tanggal Awal</label>
			<div class="form-input">
				<input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.start" placeholder="Tanggal Awal"></select>
			</div>
		</div>
		<div class="form-item">
			<label>Tanggal Akhir</label>
			<div class="form-input">
				<input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.finish" placeholder="Tanggal Akhir"></select>
			</div>
		</div>
		<div class="form-item">
			<label> &nbsp;</label>
			<div class="form-input">
				<input type="submit" value="Search">
			</div>
		</div>
	</form>
</div>
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
		<tr ng-repeat="mpdk in monitoring_per_desa_dan_kecamatan_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_nodaftar">@{{ mpdk.pendaftaran_id}}</td>
			<td class="c_namaizin">@{{ mpdk.n_perizinan }}</td>
			<td class="c_tanggal">@{{ mpdk.d_terima_berkas }}</td>
			<td class="c_namapemohon">@{{ mpdk.n_pemohon }}</td>
			<td class="c_status">@{{ mpdk.n_sts_permohonan }}</td>
			<td class="c_alamat">@{{ mpdk.a_pemohon }}</td>
			<td class="c_kelurahan">@{{ mpdk.n_kelurahan }}</td>
		</tr>
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		<tr>
	</table>
@stop