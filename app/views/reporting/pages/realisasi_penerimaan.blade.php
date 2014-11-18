@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_jenis_pelayanan_perizinan {
			width: 30%;
		}

		.c_target_anggaran {
			width: 10%;
			text-align: center;
		}

		.c_realisasi_pendapatan {
			width: 10%;
			text-align: center;
		}
	</style>
@stop

@section('page_name')
	Reporting / Realisasi Penerimaan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/ReportingCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="ReportingRealisasiPenerimaanCtrl"
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
	<a class="sub-nav-item" href="{{ URL::to('reporting/realisasi_penerimaan/cetak') }}/@{{ date.start }}/@{{ date.finish }}" ng-if="date.start.length > 0 && date.finish.length > 0"> Print</a>
@stop

@section('table_nav')
	<table>
		<tr>
			<th class="c_no">No</th>
			<th class="c_jenis_pelayanan_perizinan">Jenis Pelayanan Perizinan</th>
			<th class="c_target_anggaran">Target Anggaran</th>
			<th class="c_realisasi_pendapatan">Realisasi Pendapatan</th>
		</tr>
	</table>
@stop

@section('table_content')


	<table role="table-fluid">
		<tr ng-repeat="rrp in reporting_realisasi_penerimaan | orderBy:predicate:reverse | filter:search | limitTo:displayed ">
			<td class="c_no">@{{ $index+1 }} </td>
			<td class="c_jenis_pelayanan_perizinan">@{{ rrp.n_perizinan }}</td>
			<td class="c_target_anggaran"> Rp. @{{ rrp.target_anggaran }} </td>
			<td class="c_realisasi_pendapatan"> Rp. @{{ rrp.realisasi_pendapatan }} </td>
		</tr>
		<tr>
			<td colspan="4" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More @{{  }} </button>
				<!-- ng-if="fetch_limit <= 0" -->
			</td>
		<tr>
	</table>
@stop
