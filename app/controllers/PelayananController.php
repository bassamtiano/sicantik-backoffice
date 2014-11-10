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

		public function pendaftaran_permohonan_sementara_edit_data($id) {
			$data_permohonan = Tmpermohonan::fetch_with_tmpemohon_for_permohonan_sementara_edit_data($id);

			$result = [];

			foreach($data_permohonan as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}

			$data_syarat = [];
			$persyaratan = Trsyaratperizinan::fetch_with_tmperizinan_for_pendataan_entry_data_perizinan_data_awal_data($result['perizinan_id']);

			foreach($persyaratan as $key => $pval) {

				$terpenuhi = Trsyaratperizinan::fetch_with_tmpermohonan_for_pendataan_entry_data_perizinan_data_awal_data($id, $pval->id);
				if($pval->status == '1') {
					$status = 'Wajib';
				}
				else if($pval->status == '2') {
					$status = 'Tidak Wajib';
				}

				$wrapper = ['id_persyaratan' => $pval->id, 'persyaratan' => $pval->v_syarat, 'urut' => $pval->i_urut, 'status' => $status, 'terpenuhi' => $terpenuhi];

				array_push($data_syarat, $wrapper);
			}

			$result['syarat'] = $data_syarat;
			
			return $result;
		}

		/* 
			Menu Permohonan Izin Baru
		*/
		public function pendaftaran_permohonan_izin_baru() {
			return View::make('pelayanan.pages.pendaftaran_permohonan_izin_baru');
		}

		public function pendaftaran_permohonan_izin_baru_data($id=null) {
			return tmpermohonan::fetch_with_tmpemohon_tmpermohonan($id);
		}

		public function pendaftaran_permohonan_izin_baru_edit_data($id) {
			$data_permohonan_izin_baru = Tmpermohonan::fetch_with_tmpemohon_for_coba_data($id);

			$result = [];

			foreach($data_permohonan_izin_baru as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}

			$data_syarat = [];
			$persyaratan = Trsyaratperizinan::fetch_with_tmperizinan_for_izin_baru_edit_data($result['perizinan_id']);

			foreach($persyaratan as $key => $pval) {

				$terpenuhi = Trsyaratperizinan::fetch_with_tmpermohonan_for_izin_baru_edit_data($id, $pval->id);
				if($pval->status == '1') {
					$status = 'Wajib';
				}
				else if($pval->status == '2') {
					$status = 'Tidak Wajib';
				}

				$wrapper = ['id_persyaratan' => $pval->id, 'persyaratan' => $pval->v_syarat, 'urut' => $pval->i_urut, 'status' => $status, 'terpenuhi' => $terpenuhi];

				array_push($data_syarat, $wrapper);
			}

			$result['syarat'] = $data_syarat;
			
			return $result;
		}

		/* 
			Menu Perubahan Izin
		*/
		public function pendaftaran_perubahan_izin() {
			return View::make('pelayanan.pages.pendaftaran_perubahan_izin');
		}

		public function pendaftaran_perubahan_izin_data($id = null) {
			return tmpermohonan::fetch_with_tmpermohonan_perubahan_izin_for_pendaftaran_perubahan_izin($id);

		}

		public function pendaftaran_perubahan_izin_opsi_kegiatan(){
			return Trkegiatan::fetch_data();
		}

		public function pendaftaran_perubahan_izin_opsi_investasi(){
			return Trinvestasi::fetch_data();
		}

		public function pendaftaran_perubahan_izin_edit_data($id) {
			$data_perubahan = Tmpermohonan::fetch_with_tmpemohon_for_coba_data($id);

			$result = [];

			foreach($data_perubahan as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}

			$data_syarat = [];
			$persyaratan = Trsyaratperizinan::fetch_with_tmperizinan_for_perubahan_izin_edit_data($result['perizinan_id']);

			foreach($persyaratan as $key => $pval) {

				$terpenuhi = Trsyaratperizinan::fetch_with_tmpermohonan_for_perubahan_izin_edit_data($id, $pval->id);
				if($pval->status == '1') {
					$status = 'Wajib';
				}
				else if($pval->status == '2') {
					$status = 'Tidak Wajib';
				}

				$wrapper = ['id_persyaratan' => $pval->id, 'persyaratan' => $pval->v_syarat, 'urut' => $pval->i_urut, 'status' => $status, 'terpenuhi' => $terpenuhi];

				array_push($data_syarat, $wrapper);
			}

			$result['syarat'] = $data_syarat;
			
			return $result;
		}



		/* 
			Menu Perpanjangan Izin
		*/
		public function pendaftaran_perpanjangan_izin() {
			return View::make('pelayanan.pages.pendaftaran_perpanjangan_izin');
		}

		public function pendaftaran_perpanjangan_izin_data($id = null) {
			return tmpermohonan::fetch_with_tmpermohonan_perpanjangan_izin_for_pendaftaran_perpanjangan_izin();
		}

		public function pendaftaran_perpanjangan_izin_opsi_kegiatan(){
			return Trkegiatan::fetch_data();
		}

		public function pendaftaran_perpanjangan_izin_opsi_investasi(){
			return Trinvestasi::fetch_data();
		}

		public function pendaftaran_perpanjangan_izin_edit_data($id) {
			$data_perpanjangan = Tmpermohonan::fetch_with_tmpemohon_for_coba_data($id);

			$result = [];

			foreach($data_perpanjangan as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}
			
			$data_syarat = [];
			$persyaratan = Trsyaratperizinan::fetch_with_tmperizinan_for_perpanjangan_izin_edit_data($result['perizinan_id']);

			foreach($persyaratan as $key => $pval) {

				$terpenuhi = Trsyaratperizinan::fetch_with_tmpermohonan_for_perpanjangan_izin_edit_data($id, $pval->id);
				if($pval->status == '1') {
					$status = 'Wajib';
				}
				else if($pval->status == '2') {
					$status = 'Tidak Wajib';
				}

				$wrapper = ['id_persyaratan' => $pval->id, 'persyaratan' => $pval->v_syarat, 'urut' => $pval->i_urut, 'status' => $status, 'terpenuhi' => $terpenuhi];

				array_push($data_syarat, $wrapper);
			}

			$result['syarat'] = $data_syarat;

			return $result;
			// return $data_syarat;
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

		public function pendaftaran_daftar_ulang_izin_opsi_kegiatan(){
			return Trkegiatan::fetch_data();
		}

		public function pendaftaran_daftar_ulang_izin_opsi_investasi(){
			return Trinvestasi::fetch_data();
		}

		public function pendaftaran_daftar_ulang_izin_edit_data($id) {
			$data_daftarulang = Tmpermohonan::fetch_with_tmpemohon_for_coba_data($id);

			$result = [];

			foreach($data_daftarulang as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}

			$data_syarat = [];
			$persyaratan = Trsyaratperizinan::fetch_with_tmperizinan_for_daftar_ulang_izin_edit_data($result['perizinan_id']);

			foreach($persyaratan as $key => $pval) {

				$terpenuhi = Trsyaratperizinan::fetch_with_tmpermohonan_for_daftar_ulang_izin_edit_data($id, $pval->id);
				if($pval->status == '1') {
					$status = 'Wajib';
				}
				else if($pval->status == '2') {
					$status = 'Tidak Wajib';
				}

				$wrapper = ['id_persyaratan' => $pval->id, 'persyaratan' => $pval->v_syarat, 'urut' => $pval->i_urut, 'status' => $status, 'terpenuhi' => $terpenuhi];

				array_push($data_syarat, $wrapper);
			}

			$result['syarat'] = $data_syarat;
			
			return $result;
		}

		/* 
			Menu Data Pemohon
		*/
		public function pendaftaran_data_pemohon() {
			return View::make('pelayanan.pages.pendaftaran_data_pemohon');
		}

		public function pendaftaran_data_pemohon_data($id = null) {
			return Tmpemohon::fetch_data_pemohon($id);
		}

		public function pendaftaran_data_pemohon_edit_data($id) {
				$data_pemohon = Tmpemohon::fetch_data_pemohon_edit_data($id);

				$result = [];

				foreach($data_pemohon as $val => $key) {
					foreach($key as $v => $k) {
						$result[$v] = $k;
					}
				}
				
				return $result;
			}

		/* 
			Menu Data Perusahaan
		*/	

		public function pendaftaran_data_perusahaan() {
			return View::make('pelayanan.pages.pendaftaran_data_perusahaan');
		}

		public function pendaftaran_data_perusahaan_data($id = null) {
			return tmperusahaan::fetch_data_perusahaan($id);
		}

		public function pendaftaran_data_perusahaan_opsi_kegiatan(){
				return Trkegiatan::fetch_data();
			}

			public function pendaftaran_data_perusahaan_opsi_investasi(){
				return Trinvestasi::fetch_data();
			}

			public function pendaftaran_data_perusahaan_edit_data($id) {
				$data_perusahaan = Tmperusahaan::fetch_data_perusahaan_edit_data($id);

				$result = [];

				foreach($data_perusahaan as $val => $key) {
					foreach($key as $v => $k) {
						$result[$v] = $k;
					}
				}
				
				return $result;
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