@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_no_pendaftaran {
			width: 15%;
			text-align: center;
		}
		
		.c_jenis_izin {
			width: 15%;
			text-align: center;
		}
		.c_pemohon {
			width: 15%;
		}

		.c_alamat {
			width: 20%;
			text-align: center;
		}

		.c_jenis_permohonan {
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
	Backoffice / Penetapan / Pencabutan Izin
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/BackofficeCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="BackofficePenetapanPencabutanIzin"
@stop

@section('nav-menu-left')
	<form ng-submit="filter_date()">
		<div class="table-form-content">
			<div class="form-item">
				&nbsp;
			</div>
			
			<div class="form-item">
				<input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.start" placeholder="Tanggal Awal">
			</div>
			<div class="form-item">
				<input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.finish" placeholder="Tanggal Akhir">
			</div>
			<div class="form-item">
				<input type="submit" value="Filter Tanggal">
			</div>
			
		</div>
	</form>
@stop

@section('nav-menu-right')
	<form>
		<div class="table-form-content">
			<div class="form-item">
				<button ng-click="show_all()" style="width='30px'">Tampilkan Semua</button>
			</div>
			<div class="form-item">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="pendaftaran_id">No Pendaftaran</option>
					<option value="n_pemohon">Pemohon</option>
					<option value="a_pemohon">Alamat</option>
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
			<th class="c_no_pendaftaran" ng-click="predicate='pendaftaran_id'; reverse=!reverse">No Pendaftaran</th>
			<th class="c_jenis_izin" ng-click="predicate='n_perizinan'; reverse=!reverse">Jenis Izin</th>
			<th class="c_pemohon" ng-click="predicate='n_pemohon'; reverse=!reverse">Pemohon</th>
			<th class="c_alamat" ng-click="predicate='a_pemohon'; reverse=!reverse">Alamat</th>
			<th class="c_jenis_permohonan" ng-click="predicate='n_permohonan'; reverse=!reverse">Jenis Permohonan</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="bppi in backoffice_penetapan_pencabutan_izin | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_no_pendaftaran"> @{{ bppi.pendaftaran_id }} </td>
			<td class="c_jenis_izin"> @{{ bppi.n_perizinan }} </td>
			<td class="c_pemohon"> @{{ bppi.n_pemohon }} </td>
			<td class="c_alamat"> @{{ bppi.a_pemohon }} </td>
			<td class="c_jenis_permohonan"> @{{ bppi.n_permohonan }} </td>
			<td class="c_aksi"> @{{ bppi.id }} </td>
		</tr>
		<tr>
			<td colspan="7" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		<tr>
	</table>

@stop