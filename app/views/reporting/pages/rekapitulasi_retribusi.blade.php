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

		.c_total_izin {
			width: 10%;
			text-align: center;
		}
		.c_retribusi{
			width: 10%;
			text-align: center;
		}
		.c_terbayar{
			width: 10%;
			text-align: center;
		}
		.c_terhutang{
			width: 10%;
			text-align: center;
		}
	</style>
@stop

@section('page_name')
	Reporting / Rekapitulasi Retribusi
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/ReportingCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="ReportingRekapitulasiRetribusiCtrl"
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
<a class="sub-nav-item" href="{{ URL::to('reporting/rekapitulasi_retribusi/cetak') }}/@{{ date.start }}/@{{ date.finish }}" ng-if="date.start.length > 0 && date.finish.length > 0"> Print</a>
@stop

@section('table_nav')
	<table>
		<tr>
			<th class="c_no">No</th>
			<th class="c_jenis_izin"> Jenis Izin </th>
			<th class="c_total_izin">Izin Jadi</th>
			<th class="c_retribusi"> Total Retribusi</th>
			<th class="c_terbayar"> Terbayar </th>
			<th class="c_terhutang"> Terhutang </th>
		</tr>
	</table>
@stop

@section('table_content')
	<table role="table-fluid">
		<tr ng-repeat="rrt in reporting_rekapitulasi_retribusi | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_jenis_izin"> @{{ rrt.nama_perizinan}} </td>
			<td class="c_total_izin"> @{{ rrt.izin_jadi }}</td>
			<td class="c_retribusi"> @{{ rrt.retribusi_total}}</td>
			<td class="c_terbayar"> @{{ rrt.terbayarkan}}</td>
			<td class="c_terhutang">@{{ rrt.terhutangkan}}</td>
		</tr>
		<tr>
			<td colspan="4" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More </button>
				<!-- ng-if="fetch_limit <= 0" -->
			</td>
		<tr>
	</table>
@stop
