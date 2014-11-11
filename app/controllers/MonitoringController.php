<?php

class MonitoringController extends BaseController {
		public function per_jenis_perizinan() {
			return View::make('monitoring.pages.monitoring_per_jenis_perizinan');
		}
		
		public function per_jenis_perizinan_data($date_start = null, $date_finish = null, $id = null) {
			return Tmpermohonan::fetch_with_tmpermohonan_trperizinan_tmpemohon_trstspermohonan_trkelurahan_tmbap_for_per_jenis_perizinan($date_start, $date_finish, $id);
		}

		public function per_jenis_perizinan_datacombo(){
			return Trperizinan::fetch_data_opsi();
		}

		public function per_jangka_waktu() {
			return View::make('monitoring.pages.monitoring_per_jangka_waktu');
		}

		public function per_jangka_waktu_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpermohonan_trperizinan_tmpemohon_trstspermohonan_trkelurahan_tmbap_filterby_jangka_waktu($date_start, $date_finish);
		}

		public function per_desa_dan_kecamatan() {
			return View::make('monitoring.pages.monitoring_per_desa_dan_kecamatan');
		}

		public function per_desa_dan_kecamatan_data() {
			$data=[
				'id_propinsi' => 12,
				'id_kabupaten' => 174,
				'id_kecamatan' => 3,
				'id_kelurahan' => 12,
				'date_start' => '2004-09-01',
				'date_finish' => '2014-09-01'
			];
			return Tmpermohonan::fetch_with_tmpermohonan_trperizinan_tmpemohon_trstspermohonan_trkelurahan_tmbap_filterby_wilayah_for_per_desa_dan_kecamatan($data);
		}

		public function perizinan_belum_sudah_jadi_kadaluarsa() {
			return View::make('monitoring.pages.monitoring_perizinan_belum_sudah_jadi_kadaluarsa');
		}

		public function perizinan_belum_sudah_jadi_kadaluarsa_data() {
			// BUGS DT = 0
			$data=[
				'dt' => 0,
				'date_start' =>'2004-09-01',
				'date_finish' =>'2014-09-01'
			];
			return Tmpermohonan::fetch_with_tmpermohonan_trperizinan_tmpemohon_trstspermohonan_trkelurahan_tmbap_filterby_status_for_perizinan_belum_sudah_jadi_kadaluarsa($data);
		}

		public function per_status_perizinan() {
			return View::make('monitoring.pages.monitoring_per_status_perizinan');
		}

		public function per_status_perizinan_data($id = null, $date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_trstspermohonan_tmpemohon_trperizinan_trkelurahan_filterby_status_perizinan_for_per_status_perizinan($id, $date_start, $date_finish);
		}

		public function per_status_perizinan_datacombo() {
			return Tmpermohonan::fetch_combo();
		}

		public function per_nama_pemohon() {
			return View::make('monitoring.pages.monitoring_per_nama_pemohon');
		}

		public function per_nama_pemohon_data($n_pemohon = null, $date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_trstspermohonan_tmpemohon_trperizinan_trkelurahan_filterby_nama_pemohon_for_per_nama_pemohon($n_pemohon, $date_start, $date_finish);
		}

		public function per_nama_perusahaan() {
			return View::make('monitoring.pages.monitoring_per_nama_perusahaan');
		}

		public function per_nama_perusahaan_data($nm = null, $date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_trstspermohonan_tmperusahaan_trperizinan_trkelurahan_for_per_nama_perusahaan($nm, $date_start, $date_finish);
		}
		public function per_bulan_pengambilan_izin() {
			return View::make('monitoring.pages.monitoring_per_bulan_pengambilan_izin');
		}

		public function per_bulan_pengambilan_izin_data() {
			// BUGS
			$data=[
				'id' => 1,
				'date_start' => '2004-09-01',
				'date_finish' => '2014-09-01'
			];
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trkelurahan_filterby_bulan_pengambilan_izin_for_per_bulan_pengambilan_izin($data);
			
		}
	}