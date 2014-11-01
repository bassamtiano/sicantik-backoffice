<?php

	class PelayananController extends BaseController {

	/*
		Sub Modul Pendaftaran
	*/

		/* 
			Menu Permohonan Sementara
		*/
		public function pendaftaran_permohonan_sementara() {
			return View::make('pelayanan.pages.pendaftaran_permohonan_sementara');
		}

		public function pendaftaran_permohonan_sementara_data() {
			return Tmpermohonan::fetch_with_tmpemohon_sementara_tmpermohonan_for_pendaftaran_permohonan_sementara();
		}

		/* 
			Menu Permohonan Izin Baru
		*/
		public function pendaftaran_permohonan_izin_baru() {
			return View::make('pelayanan.pages.pendaftaran_permohonan_izin_baru');
		}

		public function pendaftaran_permohonan_izin_baru_data() {
			#model not found
			return tmpermohonan::fetch_with_tmpemohon_tmpermohonan();
		}

		/* 
			Menu Perubahan Izin
		*/
		public function pendaftaran_perubahan_izin() {
			return View::make('pelayanan.pages.pendaftaran_perubahan_izin');
		}

		public function pendaftaran_perubahan_izin_data() {
			return tmpermohonan::fetch_with_tmpermohonan_perubahan_izin_for_pendaftaran_perubahan_izin();

		}

		/* 
			Menu Perpanjangan Izin
		*/
		public function pendaftaran_perpanjangan_izin() {
			return View::make('pelayanan.pages.pendaftaran_perpanjangan_izin');
		}

		public function pendaftaran_perpanjangan_izin_data() {
			return tmpermohonan::fetch_with_tmpermohonan_perpanjangan_izin_for_pendaftaran_perpanjangan_izin();
		}

		public function form_permohonan_perpanjangan_izin() {

		}

		/* 
			Menu Daftar Ulang Izin
		*/

		public function pendaftaran_daftar_ulang_izin() {
			return View::make('pelayanan.pages.pendaftaran_daftar_ulang_izin');
		}

		public function pendaftaran_daftar_ulang_izin_data() {
			return tmpermohonan::fetch_with_tmpermohonan_daftar_ulang_izin_for_pendaftaran_daftar_ulang_izin();
		}

		/* 
			Menu Data Pemohon
		*/
		public function pendaftaran_data_pemohon() {
			return View::make('pelayanan.pages.pendaftaran_data_pemohon');
		}

		public function pendaftaran_data_pemohon_data() {
			#model not found
			return Tmpemohon::fetch_data_pemohon();
		}

		/* 
			Menu Data Perusahaan
		*/	

		public function pendaftaran_data_perusahaan() {
			return View::make('pelayanan.pages.pendaftaran_data_perusahaan');
		}

		public function pendaftaran_data_perusahaan_data() {
			#model not found
			return tmperusahaan::fetch_data_perusahaan();
		}

	/*
		Sub Modul Customer Service
	*/

		/* 
			Menu Data Informasi Perizinan
		*/
		public function customer_service_informasi_perizinan(){
			return View::make('pelayanan.pages.customer_service_informasi_perizinan');
		}
		public function customer_service_informasi_perizinan_data() {
			return Trperizinan::fetch_data_for_customer_service_informasi_perizinan();
		}

		/* 
			Menu Data Perusahaan
		*/
		public function customer_service_simulasi_tarif_retribusi() {
			return View::make('pelayanan.pages.customer_service_simulasi_tarif_retribusi');
		}

		/* 
			Menu Data Perusahaan
		*/
		public function customer_service_informasi_tracking() {
			return View::make('pelayanan.pages.customer_service_informasi_tracking');
		}

		public function customer_service_informasi_tracking_data(){
			return Tmpermohonan::fetch_tracking_for_customer_service_informasi_tracking();
		}


		/* 
			Menu Data Perusahaan
		*/
		public function customer_service_informasi_masa_berlaku() {
			return View::make('pelayanan.pages.customer_service_informasi_masa_berlaku');
		}

		public function customer_service_informasi_masa_berlaku_data(){
			return Tmpermohonan::fetch_with_trperizinan_trjenis_permohonan_tmpermohonan_for_customer_service_informasi_masa_berlaku();
		}


	}