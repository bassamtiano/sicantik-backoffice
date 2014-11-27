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
			width: 15%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Report / Report Component
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiReportReportComponent"
@stop

@section('nav-menu-left')
	<div class="table-form-content">
		<div class="form-item">
			<button ng-click="open_modal('modal_insert', '')" class="row-item ya">Tambah Report</button>
		</div>
	</div>
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
		<tr ng-repeat="rcd in report_component_data | orderBy:predicate:reverse | filter:search | limitTo:displayed ">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_id_laporan">@{{ rcd.report_component_code }}</td>
			<td class="c_deskripsi_singkat">@{{ rcd.short_desc }}</td>
			<td class="c_aksi">
				<span class="button-group group-3">
					<a href ng-click="open_modal('modal_edit', rcd.id)" class="edit">Edit</a>
					<a href ng-click="open_modal('modal_delete', rcd.id)" class="delete">Delete</a>
					<a href ng-click="open_modal('modal_ganda', rcd.id)" class="edit">Gandakan</a>
				</span>
			</td>
		</tr>
		<tr>

		</tr>
	</table>

@stop

@section('modal-content')
	@include('konfigurasi.modals.report_report_component_modal_edit', ['modal_name' => 'modal_edit'])
	@include('konfigurasi.modals.report_report_component_modal_ganda', ['modal_name' => 'modal_ganda'])
	@include('konfigurasi.modals.report_report_component_modal_insert', ['modal_name' => 'modal_insert'])
	@include('konfigurasi.modals.report_report_component_modal_delete', ['modal_name' => 'modal_delete'])
@stop
