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

			// disini
			// $data = [];
			// Tmpermohonan::edit_data_perizinan_for_entry_data_perizinan();

			$property_perizinan = Input::get('property_perizinan');
			$id_property_perizinan = Input::get('id_property_perizinan');
			$old_id_property_perizinan = Input::get('old_id_property_perizinan');

			$urutan_property = 0;

			foreach($property_perizinan as $k) {

				if(!empty($old_id_property_perizinan[$urutan_property]) || !empty($id_property_perizinan[$urutan_property])) {
					if($id_property_perizinan[$urutan_property] == 26) {
						$data = ['k_property' => $k];
					}
					else {
						$data = ['v_property' => $k];
					}

					$action = Tmpropertyjenisperizinan::edit_data($old_id_property_perizinan[$urutan_property], $data);
				}

				$urutan_property += 1;
			}

			echo 'isi';

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
						$property[$nama_property . '_id'] = $k2->id;
						$property[$nama_property . '_old_id'] = $k1->id;


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

		public function pendataan_entry_data_perizinan_data_awal_opsi_pemohon_kelurahan($id) {
			$kelurahan = Trkelurahan::fetch_data();

			$result = [];

			foreach($kelurahan as $kelk => $kelv) {
				if($kelv->id == $id) {
					$wrapper = [
						'id' => $kelv->id,
						'n_kelurahan' => $kelv->n_kelurahan,
						'selected' => true
					];
				}
				else {
					$wrapper = [
						'id' => $kelv->id,
						'n_kelurahan' => $kelv->n_kelurahan,
						'selected' => false
					];
				}

				array_push($result, $wrapper);
			}

			return $result;

		}

		public function pendataan_entry_data_perizinan_data_awal_opsi_pemohon_kecamatan($id) {
			$kecamatan = Trkecamatan::fetch_data();

			$result = [];

			foreach($kecamatan as $keck => $kecv) {
				if($kecv->id == $id) {
					$wrapper = [
						'id' => $kecv->id,
						'n_kecamatan' => $kecv->n_kecamatan,
						'selected' => true
					];
				}
				else {
					$wrapper = [
						'id' => $kecv->id,
						'n_kecamatan' => $kecv->n_kecamatan,
						'selected' => false
					];
				}

				array_push($result, $wrapper);
			}

			return $result;
		}

		public function pendataan_entry_data_perizinan_data_awal_opsi_pemohon_kabupaten($id) {
			$kabupaten = Trkabupaten::fetch_data();

			$result = [];

			foreach($kabupaten as $kabk => $kabv) {
				if($kabv->id == $id) {
					$wrapper = [
						'id' => $kabv->id,
						'n_kabupaten' => $kabv->n_kabupaten,
						'selected' => true
					];
				}
				else {
					$wrapper = [
						'id' => $kabv->id,
						'n_kabupaten' => $kabv->n_kabupaten,
						'selected' => false
					];
				}

				array_push($result, $wrapper);
			}

			return $result;
		}

		public function pendataan_entry_data_perizinan_data_awal_opsi_pemohon_propinsi($id) {
			$propinsi = Trpropinsi::fetch_data();

			$result = [];

			foreach($propinsi as $propk => $propv) {
				if($propv->id == $id) {
					$wrapper = [
						'id' => $propv->id,
						'n_propinsi' => $propv->n_propinsi,
						'selected' => true
					];
				}
				else {
					$wrapper = [
						'id' => $propv->id,
						'n_propinsi' => $propv->n_propinsi,
						'selected' => false
					];
				}

				array_push($result, $wrapper);
			}

			return $result;
		}

		public function pendataan_entry_data_perizinan_data_awal_opsi_perusahaan_kelurahan($id) {
			$kelurahan = Trkelurahan::fetch_data();

			$result = [];

			foreach($kelurahan as $kelk => $kelv) {
				if($kelv->id == $id) {
					$wrapper = [
						'id' => $kelv->id,
						'n_kelurahan' => $kelv->n_kelurahan,
						'selected' => true
					];
				}
				else {
					$wrapper = [
						'id' => $kelv->id,
						'n_kelurahan' => $kelv->n_kelurahan,
						'selected' => false
					];
				}

				array_push($result, $wrapper);
			}

			return $result;
		}

		public function pendataan_entry_data_perizinan_data_awal_opsi_perusahaan_kecamatan($id) {
			$kecamatan = Trkecamatan::fetch_data();

			$result = [];

			foreach($kecamatan as $keck => $kecv) {
				if($kecv->id == $id) {
					$wrapper = [
						'id' => $kecv->id,
						'n_kecamatan' => $kecv->n_kecamatan,
						'selected' => true
					];
				}
				else {
					$wrapper = [
						'id' => $kecv->id,
						'n_kecamatan' => $kecv->n_kecamatan,
						'selected' => false
					];
				}

				array_push($result, $wrapper);
			}

			return $result;
		}

		public function pendataan_entry_data_perizinan_data_awal_opsi_perusahaan_kabupaten($id) {
			$kabupaten = Trkabupaten::fetch_data();

			$result = [];

			foreach($kabupaten as $kabk => $kabv) {
				if($kabv->id == $id) {
					$wrapper = [
						'id' => $kabv->id,
						'n_kabupaten' => $kabv->n_kabupaten,
						'selected' => true
					];
				}
				else {
					$wrapper = [
						'id' => $kabv->id,
						'n_kabupaten' => $kabv->n_kabupaten,
						'selected' => false
					];
				}

				array_push($result, $wrapper);
			}

			return $result;
		}

		public function pendataan_entry_data_perizinan_data_awal_opsi_perusahaan_propinsi($id) {
			$propinsi = Trpropinsi::fetch_data();

			$result = [];

			foreach($propinsi as $propk => $propv) {
				if($propv->id == $id) {
					$wrapper = [
						'id' => $propv->id,
						'n_propinsi' => $propv->n_propinsi,
						'selected' => true
					];
				}
				else {
					$wrapper = [
						'id' => $propv->id,
						'n_propinsi' => $propv->n_propinsi,
						'selected' => false
					];
				}

				array_push($result, $wrapper);
			}

			return $result;
		}

		public function pendataan_entry_data_perizinan_data_awal() {

			$data_permohonan = [
				'd_terima_berkas' => Input::get('d_terima_berkas'),
				'd_survey' => Input::get('d_survey'),
				'a_izin' => Input::get('a_izin'),
				'keterangan' => Input::get('keterangan')
			];

			$data_pemohon = [
				'source' => Input::get('source'),
				'no_referensi' => Input::get('no_referensi'),
				'n_pemohon' => Input::get('n_pemohon'),
				'telp_pemohon' => Input::get('telp_pemohon'),
				'a_pemohon' => Input::get('alamat_pemohon'),
				'a_pemohon_luar' => Input::get('alamat_luar_pemohon')
			];

			$kelurahan_pemohon = [
				'trkelurahan_id' => Input::get('kelurahan_pemohon')
			];

			$data_perusahaan =  [
				'npwp' => Input::get('npwp'),
				'n_perusahaan' => Input::get('n_perusahaan'),
				'i_telp_perusahaan' => Input::get('telp_perusahaan'),
				'fax' => Input::get('fax_perusahaan'),
				'email' => Input::get('email_perusahaan'),
				'a_perusahaan' => Input::get('alamat_perusahaan')
			];

			$kelurahan_perusahaan = [
				'trkelurahan_id' => Input::get('kelurahan_perusahaan')
			];

			$tmpermohonan_id = Input::get('id');

			$tmpemohon = Tmpemohontmpermohonan::get_tmpemohon_id($tmpermohonan_id);
			$tmperusahaan = Tmpermohonantmperusahaan::get_tmperusahaan_id($tmpermohonan_id);

			foreach($tmpemohon as $pem_k => $pem_v) {
				$tmpemohon_id = $pem_v->tmpemohon_id;
			}

			foreach($tmperusahaan as $per_k => $per_v) {
				$tmperusahaan_id = $per_v->tmperusahaan_id;
			}

			$tmpemohon = Tmpemohon::where('id', '=', $tmpemohon_id)->update($data_pemohon);

			$tmpermohonan = Tmpermohonan::where('id', '=', $tmpermohonan_id)->update($data_permohonan);
			$tmperusahaan = Tmperusahaan::where('id', '=', $tmperusahaan_id)->update($data_perusahaan);

			$tmpemohon_trkelurahan = Tmpemohontrkelurahan::where('tmpemohon_id', '=', $tmpemohon_id)->update($kelurahan_pemohon);
			$tmperusahaan_trkelurahan = Tmperusahaantrkelurahan::where('tmperusahaan_id', '=', $tmperusahaan_id)->update($kelurahan_perusahaan);



			if($tmpemohon == '1' || $tmpermohonan == '1' || $tmperusahaan == '1' || $tmpemohon_trkelurahan == '1' || $tmperusahaan_trkelurahan = '1') {
				echo 'isi';
			}
		}

		public function pendataan_entry_data_perizinan_data_awal_data($id) {
			$data_pemohon = Tmpermohonan::fetch_with_tmpemohon_for_pendataan_entry_data_perizinan_data_awal_data($id);

			// return $data_pemohon;

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

				$wrapper = ['id_persyaratan' => $pval->id, 'persyaratan' => $pval->v_syarat, 'urut' => $pval->i_urut, 'selected' => $status, 'terpenuhi' => $terpenuhi];

				array_push($data_syarat, $wrapper);
			}

			$result['syarat'] = $data_syarat;

			return $result;

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
