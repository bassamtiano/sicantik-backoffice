@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_id_laporan {
			width: 20%;
			text-align: center;
		}
		.c_deskripsi_singkat {
			width: 40%;
		}
		.c_aksi {
			width: 10%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Report / Report Generator
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiReportReportGenerator"
@stop

@section('nav-menu-left')
	
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
				<input type="text" placeholder="Search" ng-model="search">
			</div>
		</div>
	</form>
@stop

@section('table_nav')
	
	<table>
		<tr>
			<th class="c_no">No</th>
			<th class="c_id_laporan">ID Laporan</th>
			<th class="c_deskripsi_singkat">Deskripsi Singkat</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="rgd in report_generator_data | orderBy:predicate:reverse | filter:search | limitTo:displayed ">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_id_laporan">@{{ rgd.report_code }}</td>
			<td class="c_deskripsi_singkat">@{{ rgd.short_desc }}</td>
			<td class="c_aksi">@{{ rgd.id }}</td>
		</tr>
	</table>

@stop