@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 5%;
			text-align: center;
		}
		
		.c_nama_izin {
			width: 25%;
		}

		.c_biaya_formulir {
			width: 10%;
		}

		.c_nilai_dasar_retribusi {
			width: 10%;
			text-align: center;
		}

		.c_tanggal_mulai_berlaku {
			width: 15%;
			text-align: center;
		}

		.c_tanggal_akhir_berlaku {
			width: 15%;
			text-align: center;
		}

		.c_model_perhitungan {
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
	Setting Perizinan / Persyaratan Izin
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/KonfigurasiCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="KonfigurasiSettingPerizinanNilaiRetribusiCtrl"
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
			<th class="c_nama_izin">Nama Izin</th>
			<th class="c_biaya_formulir">Biaya Formulir</th>
			<th class="c_nilai_dasar_retribusi">Nilai Dasar Retribusi</th>
			<th class="c_tanggal_mulai_berlaku">Tanggal Mulai Berlaku</th>
			<th class="c_tanggal_akhir_berlaku">Tanggal Akhir Berlaku</th>
			<th class="c_model_perhitungan">Model Perhitungan</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="spnr in setting_perizinan_nilai_retribusi_data">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_nama_izin">@{{ spnr.n_perizinan }}</td>
			<td class="c_biaya_formulir">@{{ spnr.v_retribusi }}</td>
			<td class="c_nilai_dasar_retribusi">@{{ spnr.v_denda }}</td>
			<td class="c_tanggal_mulai_berlaku">@{{ spnr.d_sk_terbit }}</td>
			<td class="c_tanggal_akhir_berlaku">@{{ spnr.d_sk_berakhir }}</td>
			<td class="c_model_perhitungan">
				<p ng-if="spnr.m_perhitungan == 0" class="row-item ya">
					Otomatis
				</p>
				<p ng-if="spnr.m_perhitungan == 1" class="row-item tidak">
					Manual
				</p>
			</td>
			<td class="c_aksi">@{{ spnr.id }}</td>
		</tr>
	</table>

@stop