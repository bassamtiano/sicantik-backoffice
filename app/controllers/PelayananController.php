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
			Menu Customer Service
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

		public function customer_service_informasi_perizinan_detail($id){
			$data_izin = Trperizinan::fetch_with_trkelompok_perizinan_by_id_for_customer_service($id);
			$result = [];

			foreach ($data_izin as $val => $key) {
				foreach ($key as $v => $k) {
					$result[$v] = $k;
				}
			}

			$result_persyaratan = [];
			$syarat_wrapper = [];
			$syarat_wrapper1 = [];
			$persyaratan = Trsyaratperizinan::fetch_with_trperizinan_trsyarat_perizinan_for_informasi_perizinan($result['perizinan_id']);
			foreach ($persyaratan as $pkey => $pval) {	
				foreach ($pval as $pv => $pk){
					if ($pv == 'c_show_type') {
						$c_biner = decbin($pk)."<br />";
						$c_biner_split = str_split($c_biner);
						$syarat_wrapper['izin_baru'] = $c_biner_split[0];
						$syarat_wrapper['perpanjangan'] = $c_biner_split[1];
						$syarat_wrapper['perubahan'] = $c_biner_split[2];	
					}
					else{
						$syarat_wrapper1[$pv] = $pk;		
					}
					$syarat_wrapper1 = $syarat_wrapper1 + $syarat_wrapper;					
					
				}
				array_push($result_persyaratan, $syarat_wrapper1);
			}

			$data_persyaratan['persyaratan'] = $result_persyaratan;
			$result = $result + $data_persyaratan;
			return $result;
		}

		/* 
			Menu Informasi Tracking
		*/
		public function customer_service_informasi_tracking() {
			return View::make('pelayanan.pages.customer_service_informasi_tracking');
		}

		public function customer_service_informasi_tracking_data(){
			return Tmpermohonan::fetch_tracking_for_customer_service_informasi_tracking();
		}

		public function customer_service_informasi_tracking_detail_data($id){
			$data_customer =  Tmpermohonan::fetch_with_trperizinan_trjenis_permohonan_tmpermohonan_for_info_tracking_detail($id);
			$result = [];

			foreach ($data_customer as $val => $key) {
				foreach ($key as $v => $k) {
					$result[$v] = $k;
				}
			}

			
			$statuspermohonan = Tmpermohonan::fetch_with_tmpermohonan_trstspermohonan_for_informasi_tracking_detail($result['id_permohonan']);
			$result_status = [];
			$status_wrapper = [];
			foreach ($statuspermohonan as $pkey => $pval) {
				foreach ($pval as $pv => $pk){
					if ($pv === 'span') {
						$tm = strtotime($pk);
						$waktu = date('H', $tm) . ' Jam ' . date('i',$tm) . ' Menit ' . date('s',$tm) . ' Detik ';
						$status_wrapper['span'] = $waktu;
					}
					else {
						$status_wrapper[$pv] = $pk;	
					}


				}
				array_push($result_status, $status_wrapper);
			}
			$data_statuspermohonan['statuspermohonan'] = $result_status;
			$result = $result + $data_statuspermohonan;
			return $result;
		}

		/* 
			Menu Informasi Masa Berlaku
		*/
		public function customer_service_informasi_masa_berlaku() {
			return View::make('pelayanan.pages.customer_service_informasi_masa_berlaku');
		}

		public function customer_service_informasi_masa_berlaku_data(){
			$data_masa_berlaku =  Tmpermohonan::fetch_with_trperizinan_trjenis_permohonan_tmpermohonan_for_customer_service_informasi_masa_berlaku();
			$result_berlaku = [];
			$result = [];
			foreach ($data_masa_berlaku as $key => $val) {
				foreach ($val as $v => $k) {
					if ($v == 'd_berlaku_izin') {
						if (!empty($k)) {
							$result_berlaku['d_berlaku_izin'] = $k;
							if ($k <= date('Y-m-d')) {
								$result_berlaku['status_masa_berlaku'] = 'Kadaluarsa';
							}
							else{
								$result_berlaku['status_masa_berlaku'] = ' - ';
							}
						}
						else{
							$result_berlaku['d_berlaku_izin'] = 'SK Belum Dibuat';
							$result_berlaku['status_masa_berlaku'] = ' - ';
						}
					}
					else{
						$result_berlaku[$v] = $k;
					}
				}
				array_push($result, $result_berlaku);
			}		
			return $result;	
		}
	}