@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 3%;
			text-align: center;
		}
		
		.c_no_referensi {
			width: 25%;
		}

		.c_n_pemohon {
			width: 20%;
			text-align: center;
		}

		.c_a_pemohon {
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
	Pelayanan / Pendaftaran / Data Pemohon
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PelayananCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PelayananPendaftaranDataPemohonCtrl"
@stop

@section('nav-menu-left')
	<form ng-submit="filter_pelayanan()">
		<div class="table-form-content">
			<div class="form-item">
				<a class ng-click="open_modal('modal_tambah_pemohon', null)" style="width='30px'">Tambah Pemohon</a>
			</div>
		</div>
	</form>
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
					<option value="no_referensi">ID (SIM/KTP/Passport)</option>
					<option value="n_pemohon">Nama Pemohon</option>
					<option value="a_pemohon">Alamat Pemohon</option>
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
			<th class="c_no_referensi" ng-click="predicate='no_referensi'; reverse=!reverse">ID (SIM/KTP/Passport)</th>
			<th class="c_n_pemohon" ng-click="predicate='n_pemohon'; reverse=!reverse">Pemohon</th>
			<th class="c_a_pemohon" ng-click="predicate='a_pemohon'; reverse=!reverse">Alamat</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="ppdp in pelayanan_pendaftaran_data_pemohon_data | orderBy:predicate:reverse | filter:search | limitTo:displayed ">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_no_referensi">@{{ ppdp.no_referensi }}</td>
			<td class="c_n_pemohon">@{{ ppdp.n_pemohon }}</td>
			<td class="c_a_pemohon">@{{ ppdp.a_pemohon }}</td>
			<td class="c_aksi">
				<span class="button-group group-1">
					<a href ng-click="open_modal('modal_edit', ppdp.id)" class="edit">Edit</a>
				</span>
				
			</td>
		</tr>
		<tr>
			<td colspan="12" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop

@section('modal-content')
	@include('pelayanan.modals.pelayanan_pendaftaran_data_pemohon_modal_tambah', ['modal_name' => 'modal_tambah_pemohon'])
	@include('pelayanan.modals.pelayanan_pendaftaran_data_pemohon_modal_edit', ['modal_name' => 'modal_edit'])
@stop