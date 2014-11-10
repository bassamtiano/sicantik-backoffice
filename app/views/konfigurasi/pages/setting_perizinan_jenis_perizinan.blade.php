	@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_jenis_izin {
			width: 20%;
		}
		.c_kelompok {
			width: 20%;
		}
		.c_durasi_pengerjaan {
			width: 10%;
			text-align: center;
		}
		.c_berlaku_surat {
			width: 10%;
			text-align: center;
		}
		.c_ttd_pemohon {
			width: 10%;
			text-align: center;
		}
		.c_sk {
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
	Setting Perizinan / Jenis Perizinan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingPerizinanJenisPerizinanCtrl"
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
			<th class="c_jenis_izin">Jenis Izin</th>
			<th class="c_kelompok">Kelompok</th>
			<th class="c_durasi_pengerjaan">Durasi Pengerjaan</th>
			<th class="c_berlaku_surat">Berlaku Surat</th>
			<th class="c_ttd_pemohon">Ttd Pemohon</th>
			<th class="c_sk">SK</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="spjp in setting_perizinan_jenis_perizinan_data">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_jenis_izin">@{{ spjp.n_perizinan }}</td>
			<td class="c_kelompok">@{{ spjp.n_kelompok }}</td>
			<td class="c_durasi_pengerjaan"> @{{ spjp.v_hari }} Hari</td>
			<td class="c_berlaku_surat">@{{ spjp.v_berlaku_tahun }} @{{ spjp.v_berlaku_satuan }}</td>
			<td class="c_ttd_pemohon">
				<p ng-if="spjp.c_foto == 1" class="row-item ya">
					Ya
				</p>
				<p ng-if="spjp.c_foto == 0" class="row-item tidak">
					Tidak
				</p>
			</td>
			<td class="c_sk">
				<p ng-if="spjp.c_keputusan == 1" class="row-item ya">
					Ya
				</p>
				<p ng-if="spjp.c_keputusan == 0" class="row-item tidak">
					Tidak
				</p>
			</td>
			<td class="c_aksi">
				<span class="button-group group-2">
					<a href ng-click="open_modal('modal_edit')" class="edit">Edit</a>
					<a href ng-click="open_modal('modal_delete')" class="delete">Delete</a>
				</span>
			</td>
		</tr>
	</table>



@stop

@section('modal-content')
	@include('konfigurasi.modals.setting_perizinan_jenis_perizinan_modal_edit', ['modal_name' => 'modal_edit'])
	@include('konfigurasi.modals.setting_perizinan_jenis_perizinan_modal_delete', ['modal_name' => 'modal_delete'])
@stop
