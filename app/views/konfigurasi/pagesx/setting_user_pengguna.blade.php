@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no{
			width: 5%;
			text-align: center;
			}
		.c_username {
			width: 15%;
			text-align: center;
		}
		.c_nama {
			width: 15%;
			text-align: center;
		}
		.c_log {
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
	Setting User / Pengguna
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingUserPenggunaCtrl"
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
			<th class="c_username">Usename</th>
			<th class="c_nama">Nama</th>
			<th class="c_log">Log Masuk Terakhir</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>
@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="sup in setting_user_pengguna">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_username">@{{ sup.username }}</td>
			<td class="c_nama">@{{ sup.realname}}</td>
			<td class="c_log">@{{ sup.last_login }}</td>
			<td class="c_aksi">@{{ sup.id }}</td>
		</tr>
	</table>

@stop