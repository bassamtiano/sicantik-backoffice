@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no{
			width: 5%;
			text-align: center;
		}
		.c_user{
			width: 15%;
			text-align: center;
		}
		.c_modul {
			width: 15%;
			text-align: center;
		}
		.c_aksi {
			width: 15%;
			text-align: center;
		}
		.c_tanggal {
			width: 15%;
			text-align: center;
		}
		.c_aksi {
			width: 10%;
			text-align: center;
		}
	</style>

@stop

@section('page_name')
	Keamanan Data / Log Activity
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiKeamananDataLogActivity"
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
					<option value="users">User</option>
					<option value="module">Modul</option>
					<option value="action_type">Aksi</option>
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
			<th class="c_user" ng-click="predicate='users'; reverse=!reverse">User</th>
			<th class="c_modul" ng-click="predicate='module'; reverse=!reverse">Modul</th>
			<th class="c_aksi" ng-click="predicate='action_type'; reverse=!reverse">Aksi</th>
			<th class="c_tanggal" ng-click="predicate='action_date'; reverse=!reverse">Tanggal</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>
@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="kdla in keamanan_data_log_activity | orderBy:predicate:reverse | filter:search | limitTo:displayed ">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_user">@{{ kdla.users }}</td>
			<td class="c_modul">@{{ kdla.module }}</td>
			<td class="c_aksi">@{{ kdla.action_type }}</td>
			<td class="c_tanggal">@{{ kdla.action_date }}</td>
			<td class="c_aksi"><a ng-click="modal_delete(kdla.id)">Hapus</a></td>
		</tr>
		<tr>
			<td colspan="6" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		<tr>
	</table>

@stop