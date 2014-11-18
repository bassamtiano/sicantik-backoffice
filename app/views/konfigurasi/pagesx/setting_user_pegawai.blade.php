@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		.c_nama {
			width: 15%;
			text-align: : center;
		}
		.c_nip {
			width: 15%;
			text-align: center;
		}
		.c_jabatan{
			width: 20%;
			text-align: center;
		}
		.c_status{
			width: 8%;
			text-align: center;
		}
		.c_username{
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
	Setting User / Pegawai
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingUserPegawaiCtrl"
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
			<th class="c_nama">Nama</th>
			<th class="c_nip">NIP</th>
			<th class="c_jabatan">Jabatan</th>
			<th class="c_status">Status</th>
			<th class="c_username">Username</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>
@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="susp in setting_user_pegawai">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_nama">@{{ susp.n_pegawai }}</td>
			<td class="c_nip">@{{ susp.nip}}</td>
			<td class="c_jabatan">@{{ susp.n_jabatan }}</td>
			<td class="c_status">
				<p ng-if="susp.status == 1" class="c_status">
					Penandatangan
				</p>
				<p ng-if="susp.status == 0" class="c_status">
					Pengguna
				</p>
			</td>
			<td class="c_username">@{{ susp.username}}</td>
			<td class="c_aksi">@{{ susp.id }}</td>
		</tr>
	</table>

@stop