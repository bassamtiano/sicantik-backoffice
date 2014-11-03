<?php

	class BackofficeController extends BaseController {

		# Pendaftaran / Pendataan Entry Data Perizinan 	======================================================================

		public function pendataan_entry_data_perizinan() {
			return View::make('backoffice.pages.pendataan_entry_data_perizinan');
		}

		public function pendataan_entry_data_perizinan_data($date_start=null, $date_finish=null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_permohonan_for_entry_data_perizinan($date_start, $date_finish);
		}

		# @ Bagian Modal =======================================================

		public function pendataan_entry_data_perizinan_edit() {
			$data = [];
			Tmpermohonan::edit_data_perizinan_for_entry_data_perizinan();

		}

		public function pendataan_entry_data_perizinan_edit_data($id) {

			$data_pemohon = Tmpermohonan::fetch_with_tmpemohon_tmperusahaan_for_pendataan_entry_data_perizinan_edit($id);

			$a = [];


			foreach ($data_pemohon as $key) {
				$index_v_property_field = 0;
				$v_property_fetch = Tmpermohonan::fetch_with_tmproperty_jenisperizinan_for_pendataan_entry_data_perizinan_edit($key->id);

				foreach ($v_property_fetch as $k1) {
					$kolom_property = Trproperty::fetch_with_tmproperty_jenisperizinan($k1->id);
					foreach($kolom_property as $k2) {

						// echo $k2->n_property;

						if($k1->k_property == 0) {
							$property_value = $k1->v_property;
						}
						else {
							$property_value = $k1->k_property;
						}

						$nama_property = strtolower($k2->n_property);
						$nama_property = str_replace(['  ', ' ', '_(', '_)','_/_', '/'], '_', $nama_property);
						$nama_property = str_replace([' ', ')',  '_&'], '', $nama_property);

						$property[$nama_property] = $property_value;

					}
				}

				$property = [ 1 => $property];


			}


			$test = [];

			$data_pemohon = $data_pemohon + $property;

			foreach($data_pemohon as $ka => $va) {
				foreach($va as $y => $v) {
					$test[$y] = $v;
				}
			}
			
			return $test;

		}



		public function pendataan_entry_data_perizinan_data_awal() {

		}

		public function pendataan_entry_data_perizinan_data_awal_data($id) {
			$data_pemohon = Tmpermohonan::fetch_with_tmpemohon_for_pendataan_entry_data_perizinan_data_awal_data($id);

			return $data_pemohon;

			$result = [];

			foreach($data_pemohon as $val => $key) {
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

			// return $result;
		}

		# Pendaftaran / Pendataan Penjadwalan Tinjauan 	======================================================================

		public function pendataan_penjadwalan_tinjauan() {
			return View::make('backoffice.pages.pendataan_penjadwalan_tinjauan');
		}

		public function pendataan_penjadwalan_tinjauan_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_permohonan_for_penjadwalan_tinjauan($date_start, $date_finish);
		}

		# @ Bagian Modal =======================================================

		public function pendataan_penjadwalan_tinjauan_edit_data($id) {

			$data_permohonan = Tmpermohonan::fetch_with_tmpemohon_trperizinan_tmsk_tmpegawai_trtanggal_survey_for_pendataan_penjadwalan_tinjauan_edit_data($id);

			$result = [];


			foreach($data_permohonan as $pkey => $pval) {

				foreach($pval as $k => $v) {
					$result[$k] = $v;
				}
			}

			return $result;
		}

		# Tim Teknis / Entry Hasil Tinjauan 	==============================================================================

		public function tim_teknis_entry_hasil_tinjauan() {
			return View::make('backoffice.pages.tim_teknis_entry_hasil_tinjauan');
		}

		public function tim_teknis_entry_hasil_tinjauan_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_permohonan_for_entry_hasil_tinjauan($date_start, $date_finish);
		}

		# @ Bagian Modal =======================================================

		public function tim_teknis_entry_hasil_tinjauan_edit_data($id) {

			$result = [];
			$result_pemohon = [];
			$permohonan = Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_perizinan_tmperusahaan_for_entry_hasil_tinjauan_edit_data($id);

			foreach($permohonan as $pkey => $pval) {
				foreach($pval as $k => $v) {
					$result_permohonan[$k] = $v;
				}
			}

			foreach($permohonan as $perkey) {
				$property_jenis_perizinan = Tmpermohonan::fetch_width_tmproperty_jenisperizinan_for_entry_hasil_tinjauan_edit_data($perkey->id);

				foreach($property_jenis_perizinan as $prkey) {

					$kolom_property = Trproperty::fetch_with_tmproperty_jenisperizinan($prkey->id);

					foreach($kolom_property as $k2) {

						if($prkey->k_property == 0) {
							$property_value = $prkey->v_property;
						}
						else {
							$property_value = $prkey->k_property;
						}

						$nama_property = strtolower($k2->n_property);
						$nama_property = str_replace(['  ', ' ', '_(', '_)','_/_', '/'], '_', $nama_property);
						$nama_property = str_replace([' ', ')',  '_&'], '', $nama_property);

						$property[$nama_property] = $property_value;

					}

				}

			}

			$result = $result_permohonan + $property;
			return $result;

		}

		# Tim Teknis / Pembuatan Berita Acara Pemeriksaan 	==================================================================

		public function tim_teknis_pembuatan_berita_acara_pemeriksaan() {
			return View::make('backoffice.pages.tim_teknis_pembuatan_berita_acara_pemerkisaan');
		}

		public function tim_teknis_pembuatan_berita_acara_pemeriksaan_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_permohonan_for_pembuatan_berita_acara_pemeriksaan($date_start, $date_finish);
		}

		# @ Bagian Modal =======================================================

		public function tim_teknis_pembuatan_berita_acara_pemeriksaan_edit_data($id) {
			$result = [];
			$result_permohonan = [];
			$result_property = [];
			$data_property = [];

			$permohonan = Tmpermohonan::fetch_with_tmpemohon_trperizinan_tmperusahaan_tmbap_for_pembayaran_berita_acara_pemeriksaan_edit_data($id);

			foreach($permohonan as $key => $val) {
				foreach($val as $k => $v) {
					$result_permohonan[$k] = $v;
				}
			}

			foreach($permohonan as $perkey) {
				$property_jenis_perizinan = Tmpermohonan::fetch_width_tmproperty_jenisperizinan_for_pembayaran_berita_acara_pemeriksaan_edit_data($id);

				foreach($property_jenis_perizinan as $prkey) {

					$kolom_property = Trproperty::fetch_with_tmproperty_jenisperizinan($prkey->id);

					foreach($kolom_property as $k2) {

						if($prkey->k_property == 0) {
							$berkas_value = $prkey->v_property;
							$tinjauan_value = $prkey->v_tinjauan;
						}
						else {
							$berkas_value = $prkey->k_property;
							$tinjauan_value = $prkey->k_tinjauan;
						}

						if($k2->n_property != 'Rumus Perhitungan') {
							$nama_property = $k2->n_property;

							$property['key'] = $nama_property;
							$property['berkas'] = $berkas_value;
							$property['tinjauan'] = $tinjauan_value;

							array_push($data_property, $property);
						}

					}

				}

			}

			$result_property['property'] = $data_property;
			$result = $result_permohonan + $result_property;
			return $result;
		}

		# Tim Teknis / Hitung Retribusi 	==================================================================================

		public function tim_teknis_hitung_retribusi() {
			return View::make('backoffice.pages.tim_teknis_hitung_retribusi');
		}

		public function tim_teknis_hitung_retribusi_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_retribusi_for_hitung_retribusi($date_start, $date_finish);
		}

		# Tim Teknis / Rekomendasi 	==========================================================================================

		public function tim_teknis_rekomendasi() {
			return View::make('backoffice.pages.tim_teknis_rekomendasi');
		}

		public function tim_teknis_rekomendasi_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_permohonan_trunitkerja_tim_teknis($date_start, $date_finish);
		}


		# Penetapan / Penetapan Izin 	======================================================================================

		public function penetapan_penetapan_izin() {
			return View::make('backoffice.pages.penetapan_penetapan_izin');
		}

		public function penetapan_penetapan_izin_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_tmperizinan_tmbap_for_penetapan_izin($date_start, $date_finish);
		}

		# @ Bagian Modal =======================================================

		public function penetapan_penetapan_izin_edit_data($id) {
			$result = [];
			$result_permohonan = [];
			$result_property = [];
			$data_property = [];

			$permohonan = Tmpermohonan::fetch_with_tmpemohon_trperizinan_tmperusahaan_tmbap_for_penetapan_izin_edit_data($id);

			foreach($permohonan as $key => $val) {
				foreach($val as $k => $v) {
					$result_permohonan[$k] = $v;
				}
			}

			foreach($permohonan as $perkey) {
				$property_jenis_perizinan = Tmpermohonan::fetch_width_tmproperty_jenisperizinan_for_penetapan_izin_edit_data($id);

				foreach($property_jenis_perizinan as $prkey) {

					$kolom_property = Trproperty::fetch_with_tmproperty_jenisperizinan($prkey->id);

					foreach($kolom_property as $k2) {

						if($prkey->k_property == 0) {
							$berkas_value = $prkey->v_property;
							$tinjauan_value = $prkey->v_tinjauan;
						}
						else {
							$berkas_value = $prkey->k_property;
							$tinjauan_value = $prkey->k_tinjauan;
						}

						if($k2->n_property == 'Nilai Retribusi') {
							$result_property['nilai_retribusi'] = $tinjauan_value;
						}

						if($k2->n_property != 'Rumus Perhitungan' && $k2->n_property != 'Nilai Retribusi') {
							$nama_property = $k2->n_property;

							$property['key'] = $nama_property;
							$property['berkas'] = $berkas_value;
							$property['tinjauan'] = $tinjauan_value;

							array_push($data_property, $property);
						}
					}
				}
			}

			$result_property['property'] = $data_property;
			$result = $result_permohonan + $result_property;
			return $result;

		}

		# Penetapan / Pembuatan SKRD 	======================================================================================

		public function penetapan_pembuatan_skrd() {
			return View::make('backoffice.pages.penetapan_pembuatan_skrd');
		}

		public function penetapan_pembuatan_skrd_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_perizinan_tmbap_for_pembuatan_skrd($date_start, $date_finish);
		}

		# @ Bagian Modal =======================================================

		public function penetapan_pembuatan_skrd_edit_data($id) {
			$result = [];

			$permohonan = Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_permohonan_tmkeringananretribusi($id);

			foreach($permohonan as $key => $val) {
				foreach($val as $k => $v) {
					$result[$k] = $v;
				}
			}

			return $result;
		}

		# Penetapan / Pembuatan Izin 	======================================================================================

		public function penetapan_pembuatan_izin() {
			return View::make('backoffice.pages.penetapan_pembuatan_izin');
		}

		public function penetapan_pembuatan_izin_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_tmperizinan_tmsk_tmbap_for_pembuatan_izin($date_start, $date_finish);
		}

		# Penetapan / Penetapan Layanan Ditolak 	==========================================================================

		public function penetapan_layanan_ditolak() {
			return View::make('backoffice.pages.penetapan_layanan_ditolak');
		}

		public function penetapan_layanan_ditolak_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_for_layanan_ditolak($date_start, $date_finish);
		}

		# Penetapan / Pencabutan Izin 	======================================================================================

		public function penetapan_pencabutan_izin() {
			return View::make('backoffice.pages.penetapan_pencabutan_izin');
		}

		public function penetapan_pencabutan_izin_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_permohonan_for_pencabutan_izin($date_start, $date_finish);
		}

	}
