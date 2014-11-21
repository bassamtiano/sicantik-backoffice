<?php

	class PelayananController extends BaseController {

		public function __construct() {
			$this->auth_pelayanan();
		}

		# Pelayanan Authentication 	==========================================================================================

		private function auth_pelayanan() {

			$this->beforeFilter(function(){

				$user_type = 'pelayanan';

				if(!empty(Auth::user()->id)) {
					if(Session::get($user_type) == true || Session::get('administrator') == true) {
						$id = Auth::user()->id;
						$auth_id = UserUserAuth::where('user_id', '=', $id)->get(['user_auth_id']);

						$status = '';

						foreach($auth_id as $k => $v) {
							$description = UserAuth::where('id', '=', $v->user_auth_id)->get(['description']);
							foreach($description as $dk => $dv) {
								if(strtolower($dv->description) == $user_type) {
									$status = true;
								}
								else {

								}
							}
						}

						if(empty($status) && $status !== true) {
							return Redirect::intended(Session::get('current_page'));
						}
					}
					else {
						return Redirect::intended(Session::get('current_page'));
					}
				}
				else {
					return Redirect::intended('login');
				}
			});

		}


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
