<?php

	class PengaduanController extends BaseController {

		//===================================================================Daftar Pengaduan Saran===================================================================================//

		public function daftar_pengaduan_saran() {
			return View::make('pengaduan.pages.daftar_pengaduan_saran');
		}

		public function daftar_pengaduan_saran_data($id=null) {
			return Tmpesan::fetch_with_tmpesan_trsts_pesan_trsumber_pesan($id);
		}

		public function daftar_pengaduan_saran_opsi_pengaduan(){
			return Trstspesan::fetch_data();
		}

		public function daftar_pengaduan_saran_opsi_sumber_pengaduan(){
			return Trsumberpesan::fetch_data();
		}

		public function daftar_pengaduan_saran_tambah_opsi_propinsi(){
			return Trpropinsi::fetch_data();
		}

		public function daftar_pengaduan_saran_tambah_opsi_kabupaten(){
			return Trkabupaten::fetch_data();
		}

		public function daftar_pengaduan_saran_tambah_opsi_kecamatan(){
			return Trkecamatan::fetch_data();
		}

		public function daftar_pengaduan_saran_tambah_opsi_keluarahan(){
			return Trkelurahan::fetch_data();
		}

		public function daftar_pengaduan_saran_tambah(){

		}

		public function daftar_pengaduan_saran_edit_data($id) {
			$data_daftar_pengaduan_saran = Tmpesan::fetch_with_tmpesan_trsts_pesan_trsumber_pesan_for_edit_data($id);

			$result = [];

			foreach($data_daftar_pengaduan_saran as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}
			
			return $result;
		}

		//===================================================================Persetujuan Respon Pengaduan===================================================================================//

		public function persetujuan_respon_pengaduan() {
			return View::make('pengaduan.pages.persetujuan_respon_pengaduan');	
		}

		public function persetujuan_respon_pengaduan_data($id = null) {
			return Tmpesan::fetch_with_tmpesan_trsts_pesan_trsumber_pesan_persetujuan_respon_pengaduan_for_persetujuan_respon_pengaduan($id);
		}

		public function persetujuan_respon_pengaduan_opsi_dinas(){
			return Trunitkerja::fetch_data();
		}

		public function persetujuan_respon_pengaduan_edit_data($id) {
			$data_persetujuan_respon_pengaduan = Tmpesan::fetch_with_tmpesan_trsts_pesan_trsumber_pesan_persetujuan_respon_pengaduan_for_edit_data($id);

			$result = [];

			foreach($data_persetujuan_respon_pengaduan as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}
			
			return $result;
		}

		//===================================================================Pengiriman Respon Pengaduan===================================================================================//		

		public function pengiriman_respon_pengaduan() {
			return View::make('pengaduan.pages.pengiriman_respon_pengaduan');
		}

		public function pengiriman_respon_pengaduan_data($id = null) {
			return Tmpesan::fetch_with_tmpesan_trsts_pesan_trsumber_pesan_pengiriman_respon_pengaduan_for_pengiriman_respon_pengaduan($id);
		}

		public function pengiriman_respon_pengaduan_edit_data($id) {
			$data_pengiriman_respon_pengaduan = Tmpesan::fetch_with_tmpesan_trsts_pesan_trsumber_pesan_pengiriman_respon_pengaduan_for_edit_data($id);

			$result = [];

			foreach($data_pengiriman_respon_pengaduan as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}
			
			return $result;
		}

		//===================================================================Daftar Balasan Pengaduan===================================================================================//		

		public function daftar_balasan() {
			return View::make('pengaduan.pages.daftar_balasan');
		}

		public function daftar_balasan_data($date_start=null, $date_finish = null){
			return Tmpesan::fetch_with_tmpesan_trsts_pesan_trsumber_pesan_daftar_balasan($date_start, $date_finish);
		}

	}