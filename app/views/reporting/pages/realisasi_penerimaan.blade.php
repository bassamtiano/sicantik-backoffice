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
	{{ HTML::linkRoute('reporting_realisasi_penerimaan_cetak', 'Print', [1,1], ['class' => 'btn']) }}
@stop

@section('nav-menu-right')
	<form>
		<div class="table-form-content">
			<div class="form-item">
				&nbsp;
			</div>
			<div class="form-item">
				&nbsp;
			</div>
			<div class="form-item wide">
				<input type="text" placeholder="Kata Kunci" ng-model="search">
			</div>
		</div>
	</form>
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