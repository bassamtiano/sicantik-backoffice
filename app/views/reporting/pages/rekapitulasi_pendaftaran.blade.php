@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_jenis_izin {
			width: 15%;
		}

		.c_jumlah_mohon {
			width: 10%;
			text-align: center;
		}
	</style>
@stop

@section('page_name')
	Reporting / Rekapitulasi Pendaftaran
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/ReportingCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="ReportingRekapitulasiPendaftaranCtrl"
@stop

@section('nav-menu-left')
	<form ng-submit="filter_date()">
		<div class="table-form-content">
			<div class="form-item">
				<input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.start" placeholder="Tanggal Awal">
			</div>
			<div class="form-item">
				<input type="text" data-provide="datepicker" class="tanggal_input" ng-model="date.finish" placeholder="Tanggal Akhir">
			</div>
			<div class="form-item">
				<input type="submit" value="Filter">
			</div>
		</div>
	</form>
@stop

@section('nav-menu-right')
	<a class="sub-nav-item" href="{{ URL::to('reporting/rekapitulasi_pendaftaran/cetak') }}/@{{ date.start }}/@{{ date.finish }}" ng-if="date.start.length > 0 && date.finish.length > 0"> Print</a>
@stop

@section('table_nav')
	<table>
		<tr>
			<th class="c_no">No</th>
			<th class="c_jenis_izin"> Jenis Izin</th>
			<th class="c_jumlah_mohon"> Jumlah Permohonan</th>
		</tr>
	</table>
@stop

@section('table_content')
	<table role="table-fluid">
		<tr ng-repeat="rrpd in reporting_rekapitulasi_pendaftaran | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_jenis_izin"> @{{ rrpd.nama_perizinan}} </td>
			<td class="c_jumlah_mohon"><a href ng-click="open_modal('modal_reporting_detail_pendaftaran', rrpd.id)"> @{{ rrpd.total }}</a></td>
		</tr>
		<tr>
			<td colspan="4" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More </button>
				<!-- ng-if="fetch_limit <= 0" -->
			</td>
		<tr>
	</table>
@stop