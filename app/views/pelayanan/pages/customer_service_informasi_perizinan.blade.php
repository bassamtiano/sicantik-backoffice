@extends('layouts.table_content')

@section('table_style')
	<style type="text/css">
		.c_no {
			width: 3%;
			text-align: center;
		}
		
		.c_n_perizinan {
			width: 10%;
		}

		.c_durasi {
			width: 5%;
			text-align:  center;
		}

		.c_masaberlaku {
			width: 12%;
			text-align: center;
		}

		.c_aksi {
			width: 10%;
			text-align: center;
		}

	</style>

@stop

@section('page_name')
	Pelayanan / Customer Service / Informasi Perizinan
@stop

@section('angular_controller_script')
	{{ HTML::script('assets/controllers/PelayananCtrl.js') }}
@stop

@section('angular_controller')
	ng-controller="PelayananCustomerServiceInformasiPerizinanCtrl"
@stop

@section('nav-menu-left')
	
@stop

@section('nav-menu-right')
		<div class="table-form-content">
			<!-- <div class="form-item">
				<button ng-click="show_all()" style="width='30px'">Tampilkan Semua</button>
			</div> -->
			<div class="form-item wide">
				<select ng-model="opsi_cari" class="form-option">
					<option value="">Semua</option>
					<option value="pendaftaran_id">No Pendaftaran</option>
					<option value="no_referensi">ID Pemohon</option>
					<option value="n_pemohon">Nama Pemohon</option>
					<option value="n_perizinan">Jenis Izin</option>
					<option value="a_pemohon">Alamat Pemohon</option>
					<option value="status">Status</option>
					<option value="d_terima_berkas">Tgl Permohonan</option>
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
			<th class="c_n_perizinan" ng-click="predicate='n_perizinan'; reverse=!reverse">Nama Perizinan</th>
			<th class="c_durasi" ng-click="predicate='v_hari'; reverse=!reverse">Durasi Pengerjaan (Hari)</th>
			<th class="c_masaberlaku" ng-click="predicate='v_berlaku_tahun'; reverse=!reverse">Masa Berlaku Izin</th>
			<th class="c_aksi">Aksi</th>
		</tr>
	</table>

@stop

@section('table_content')

	<table role="table-fluid">
		<tr ng-repeat="csip in customer_service_informasi_perizinan_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
			<td class="c_no">@{{ $index+1 }}</td>
			<td class="c_n_perizinan">@{{ csip.n_perizinan }}</td>
			<td class="c_durasi">@{{ csip.v_hari }}</td>
			<td class="c_masaberlaku">@{{ csip.v_berlaku_tahun }} @{{ csip.v_berlaku_satuan }}</td>
			<td class="c_aksi"><a href ng-click="open_modal('modal_cs_detail_perizinan', csip.id)" class="row-item ya">Detail</a></td>			
		</tr>
		<tr>
			<td colspan="12" style="text-align:center">
				<button ng-click="loadMore()" class="btn-load-more">Load More</button>
			</td>
		</tr>
	</table>

@stop

@section('modal-content')
	@include('pelayanan.modals.customer_service_informasi_perizinan_modal_detail', ['modal_name' => 'modal_cs_detail_perizinan'])
@stop
