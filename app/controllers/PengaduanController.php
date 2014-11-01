<?php

	class PengaduanController extends BaseController {
		
		public function daftar_pengaduan_saran() {
			return View::make('pengaduan.pages.daftar_pengaduan_saran');
		}

		public function daftar_pengaduan_saran_data() {
			return Tmpesan::fetch_with_tmpesan_trsts_pesan_trsumber_pesan_for_daftar_pengaduan_saran();
		}

		public function persetujuan_respon_pengaduan() {
			return View::make('pengaduan.pages.persetujuan_respon_pengaduan');	
		}

		public function persetujuan_respon_pengaduan_data() {
			return Tmpesan::fetch_with_tmpesan_trsts_pesan_trsumber_pesan_persetujuan_respon_pengaduan_for_persetujuan_respon_pengaduan();
		}

		public function pengiriman_respon_pengaduan() {
			return View::make('pengaduan.pages.pengiriman_respon_pengaduan');
		}

		public function pengiriman_respon_pengaduan_data() {
			return Tmpesan::fetch_with_tmpesan_trsts_pesan_trsumber_pesan_pengiriman_respon_pengaduan_for_pengiriman_respon_pengaduan();
		}

		public function daftar_balasan() {
			
		}

		public function daftar_balasan_data() {
			
		}

	}