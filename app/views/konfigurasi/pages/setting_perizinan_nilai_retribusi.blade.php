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
	Konfigurasi / Setting Perizinan / Nilai Retribusi
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
	<form ng-submit="filter_konfigurasi()">
		<div class="table-form-content">
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="$">Semua</option>
					<option value="n_perizinan">Nama Izin</option>
					<option value="v_retribusi">Biaya Formulir</option>
					<option value="v_denda">Nilai Dasar Retribusi</option>
					<option value="d_sk_mulai_berlaku">Tanggal Mulai Berlaku</option>
					<option value="d_sk_akhir_berlaku">Tanggal Akhir Berlaku</option>
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
			<th class="c_nama_izin" ng-click="predicate='n_perizinan'; reverse=!reverse">Nama Izin</th>
			<th class="c_biaya_formulir" ng-click="predicate='v_retribusi'; reverse=!reverse">Biaya Formulir</th>
			<th class="c_nilai_dasar_retribusi" ng-click="predicate='v_denda'; reverse=!reverse">Nilai Dasar Retribusi</th>
			<th class="c_tanggal_mulai_berlaku" ng-click="predicate='d_sk_terbit'; reverse=!reverse">Tanggal Mulai Berlaku</th>
			<th class="c_tanggal_akhir_berlaku" ng-click="predicate='d_sk_berakhir'; reverse=!reverse">Tanggal Akhir Berlaku</th>
			<th class="c_model_perhitungan">Model Perhitungan</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="spnr in setting_perizinan_nilai_retribusi_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
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
		<tr>
			<td colspan="8" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop