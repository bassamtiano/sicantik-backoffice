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

		# Pelayanan Opsi 	==========================================================================================

		public function pendaftaran_opsi_propinsi_selected($id) {
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

		public function pendaftaran_opsi_kabupaten_selected($id, $id_propinsi) {
			$kabupaten = Trkabupaten::fetch_with_propinsi_by_id($id_propinsi);

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

		public function pendaftaran_opsi_kecamatan_selected($id, $id_kabupaten) {
			$kecamatan = Trkecamatan::fetch_with_kabupaten_by_id($id_kabupaten);

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

		public function pendaftaran_opsi_kelurahan_selected($id, $id_kecamatan) {
			$kelurahan = Trkelurahan::fetch_with_trkecamatan_by_id($id_kecamatan);
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

		public function pendaftaran_opsi_propinsi($id) {

		}

		public function pendaftaran_opsi_kabupaten($id) {

		}

		public function pendaftaran_opsi_kecamatan($id) {

		}

		public function pendaftaran_opsi_kelurahan($id) {
			return Trkelurahan::fetch_with_trkecamatan_by_id($id);
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

		/* Disini */

		public function pendaftaran_permohonan_sementara_edit() {
			$date = date('Y-m-d');
			$id_permohonan = Tmpermohonan::generate_id_for_layanan_online_pendaftaran_online($date);


			foreach($id_permohonan as $pk) {
				$records = $pk->records;
			}

			if($records == 0) {
				$records = 1;
			}

			$urutan = '';
			for($i = strlen($records) + 1; $i <= 5; ++$i) {
				$urutan = $urutan . '0';

			}

			$id_perizinan = Input::get('jenis_perizinan');
			$perizinan = '';
			for($i = strlen($id_perizinan) + 1; $i <= 3; ++$i) {
				$perizinan = $perizinan . '0';
			}


			$id_jenis_perizinan = '1';
			$jenis_perizinan = '';
			for($i = strlen($id_jenis_perizinan) + 1; $i <= 2; ++$i) {
				$jenis_perizinan = $jenis_perizinan . '0';
			}

			$pendaftaran_id = $urutan . $records . $perizinan . $id_perizinan . $jenis_perizinan . $id_jenis_perizinan . date('mY');
			echo $pendaftaran_id;
		}

		public function pendaftaran_permohonan_sementara_hapus() {
			$id = Input::get('id');

			echo 'ini' . $id;
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
			return Tmpermohonan::fetch_with_tmpermohonan_perubahan_izin_for_pendaftaran_perubahan_izin($id);

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

		public function pendaftaran_daftar_ulang_izin_daftar_data(){
			return Tmpermohonan::fetch_with_tmsk_for_pilih_daftar_ulang_izin();
			
		}

		public function pendaftaran_daftar_ulang_izin_insert_data($id){
			$data_daftarulang = Tmpermohonan::fetch_for_pilih_daftar_ulang_izin_data_insert($id);

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

		public function pendaftaran_daftar_ulang_izin_edit_data($id) {
			$data_daftarulang = Tmpermohonan::fetch_with_tmpemohon_for_coba_data($id);

			$result = [];

			foreach($data_daftarulang as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}
			// print_r($result);

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

<<<<<<< HEAD
		/*
=======
		public function pendaftaran_data_daftar_ulang_izin_edit(){
			$data_edit_tmpermohonan = [
			'a_izin' => Input::get('lokasi'),
			'd_survey' => Input::get('d_sur'),
			'keterangan' => Input::get('ket'),
			'd_daftarulang' => Input::get('d_daful')
			];

			$data_edit_tab_pemohon = [
			'no_referensi' => Input::get('nomor_ref'),
			'n_pemohon' => Input::get('pemohon_n'),
			'telp_pemohon' => Input::get('tel'),
			'a_pemohon' => Input::get('al_pemohon'),
			'a_pemohon_luar' => Input::get('al_pemohon_luar')
			];

			$kelurahan_perusahaan =['trkelurahan_id' => Input::get('per_kelurahan')];
			$kelurahan_pemohon = ['trkelurahan_id' => Input::get('kelurahan_pemohon')];
			
			$idd_perusahaan = Input::get('id_perusahaan');
			$idd_permohonan = Input::get('id_permohonan');
			$idd_pemohon = Input::get('id_pemohon');

			$data_edit_tab_perusahaan = [
			'npwp' => Input::get('per_npwp'),
			'n_perusahaan' => Input::get('per_nama'),
			'i_telp_perusahaan' => Input::get('per_tel'),
			'a_perusahaan' => Input::get('per_al')
			];
			
			$trkelurahan_id = ['trkelurahan_id' => Input::get("per_kelurahan")];
			$trinvestasi_id = ['trinvestasi_id' => Input::get("investasi")];
			$trkegiatan_id = ['trkegiatan_id' => Input::get("kegiatan")];
			$trsyarat_perizinan_id = Input::get('syarat_perizinan_id');
			foreach ($trsyarat_perizinan_id as $k => $v) {
				TmpermohonanTrpersyaratanperizinan::insert_data($v,$idd_permohonan);

			}
			

			Tmpermohonan::where('id', '=', $idd_perusahaan)->update($data_edit_tmpermohonan);
			Tmpemohon::where('id', '=', $idd_pemohon)->update($data_edit_tab_pemohon);
			TmpemohonTrkelurahan::where('tmpemohon_id', '=', $idd_pemohon)->update($kel_pemohon);

			if ($idd_perusahaan != null) {
			Tmperusahaan::where('id', '=', $idd_perusahaan)->update($data_edit_tab_perusahaan);
			TmperusahaanTrkelurahan::where('tmperusahaan_id','=', $idd_perusahaan)->update($trkelurahan_id);
			TmperusahaanTrkegiatan::where('tmperusahaan_id', '=', $idd_perusahaan)->update($trkegiatan_id);
			TmperusahaanTrinvestasi::where('tmperusahaan_id', '=', $idd_perusahaan)->update($trinvestasi_id);
			}
			else{
			Tmperusahaan::where('id', '=', $idd_perusahaan)->update($data_edit_tab_perusahaan);
			TmperusahaanTrkelurahan::where('tmperusahaan_id','=', $idd_perusahaan)->update($trkelurahan_id);		
			}

			echo "isi";

			/* disini */		
		}

		public function pendaftaran_data_daftar_ulang_izin_insert(){
			$date = date('Y');
			$now = date('Y-m-d');
			$id_permohonan = Tmpermohonan::generate_id_for_layanan_online_pendaftaran_online($date);
			foreach($id_permohonan as $pk) {
				$records = $pk->records;
			}

			if($records == 0) {
				$records = 1;
			}

			$urutan = '';
			for($i = strlen($records) + 1; $i <= 5; ++$i) {
				$urutan = $urutan . '0';

			}

			$id_perizinan = Input::get('jenis_perizinan');
			$perizinan = '';
			for($i = strlen($id_perizinan) + 1; $i <= 3; ++$i) {
				$perizinan = $perizinan . '0';
			}


			$id_jenis_perizinan = '4';
			$jenis_perizinan = '';
			for($i = strlen($id_jenis_perizinan) + 1; $i <= 2; ++$i) {
				$jenis_perizinan = $jenis_perizinan . '0';
			}
			$pendaftaran_id = $urutan . $records . $perizinan . $id_perizinan . $jenis_perizinan . $id_jenis_perizinan . date('mY');

			$data_permohonan_du = [
			'pendaftaran_id' => $pendaftaran_id,
			'id_lama' => Input::get('id_lama'),
			'd_terima_berkas' => $now,
			'd_survey' => Input::get('d_surveys'),
			'd_tahun'=> date('Y'),
			'c_pendaftaran' => '0',
			'd_daftarulang' => Input::get('d_daful'),
			'keterangan' => Input::get('keterangan'),
			'a_izin' => Input::get('lokasi')
			];

			$data_pemohon_du = [
			'no_referensi' => Input::get('ref_pemohon'),
			'n_pemohon' => Input::get('nama_pemohon'),
			'telp_pemohon' => Input::get('telpon'),
			'a_pemohon' => Input::get('al_pemohon'),
			'a_pemohon_luar' => Input::get('al_pemohon_luar'),
			'source' => Input::get('source')
			];

			$data_perusahaan_du = [
			'npwp' => Input::get('npwp_per'),
			'n_perusahaan' => Input::get('nama_per'),
			'i_telp_perusahaan' => Input::get('tel_per'),
			'a_perusahaan' => Input::get('al_per')
			];


			$id_izin = Input::get('id_izin');
			$trkelurahan_pemohon_id = ['trkelurahan_id' => Input::get('kelurahan_pemohon')];
			$trkelurahan_perusahaan_id = ['trkelurahan_id' => Input::get('kelurahan')];
			$tmperusahaan_id = Input::get('id_perusahaan');
			$tmpemohon_id = Input::get('id_pemohon');
			$tmpermohonan_id = Tmpermohonan::insert_data($data_permohonan_du);

			$trsyarat_perizinan_id = Input::get('syarat_perizinan_id');
			foreach ($trsyarat_perizinan_id as $k => $v) {
				TmpermohonanTrpersyaratanperizinan::insert_data($v,$tmpermohonan_id[0]['id']);

			}
			
			
			TmpermohonanTrperizinan::create(['tmpermohonan_id' => $tmpermohonan_id[0]['id'], 'trperizinan_id' => $id_izin]);  
			
			TmpermohonanTrjenispermohonan::insert_data($tmpermohonan_id[0]['id'], '4');			 
			


			Tmpemohon::where('id','=',$tmpemohon_id)->update($data_pemohon_du);
			
			Tmperusahaan::where('id','=',$tmperusahaan_id)->update($data_perusahaan_du);
			
			TmperusahaanTrkelurahan::where('tmperusahaan_id','=',$tmperusahaan_id)->update($trkelurahan_perusahaan_id);		
			Tmpemohontmpermohonan::create(['tmpermohonan_id' => $tmpermohonan_id[0]['id'], 'tmpemohon_id' => $tmpemohon_id]);
			Tmpermohonantmperusahaan::create(['tmpermohonan_id' => $tmpermohonan_id[0]['id'], 'tmperusahaan_id' => $tmperusahaan_id]);
			

			TmpemohonTrkelurahan::where('tmpemohon_id','=',$tmpemohon_id)->update($trkelurahan_pemohon_id);
			
			echo "isi";
		}

		public static function pendaftaran_data_daftar_ulang_izin_finish(){
			$id_permohonan = Input::get('id_permohonan');
			$dax=[
			'c_pendaftaran' => '1'];

			Tmpermohonan::where('id','=',$id_permohonan)->update($dax);
			echo "isi";
		}

		public static function pendaftaran_data_daftar_ulang_izin_delete(){
			$id_permohonan = Input::get('id_permohonan');			
			Tmpermohonan::where('id','=',$id_permohonan)->delete();
			
			echo "isi";
		}

		/* 
>>>>>>> pr/16
			Menu Data Pemohon
		*/

		public function pendaftaran_data_pemohon() {
			return View::make('pelayanan.pages.pendaftaran_data_pemohon');
		}

		public function pendaftaran_data_pemohon_data($id = null) {
			return Tmpemohon::fetch_data_pemohon($id);
		}

		public function pendaftaran_data_pemohon_opsi_propinsi() {
			
		}

		public function pendaftaran_data_pemohon_opsi_kabupaten() {

		}

		public function pendaftaran_data_pemohon_opsi_kecamatan() {

		}

		public function pendaftaran_data_pemohon_opsi_kelurahan() {

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
<<<<<<< HEAD

		/*
			Menu Data Perusahaan
		*/
=======
		/* Menu Data Perusahaan */	
>>>>>>> pr/16

		public function pendaftaran_data_perusahaan() {
			return View::make('pelayanan.pages.pendaftaran_data_perusahaan');
		}

		public function pendaftaran_data_perusahaan_insert(){
			$data_perusahaan = [
			'no_reg_perusahaan' => Input::get('no_reg'),
			'npwp' => Input::get('i_npwp'),
			'n_perusahaan' => Input::get('perusahaan'),
			'i_telp_perusahaan' => Input::get('tel'),
			'a_perusahaan' => Input::get('al_perusahaan')
			];

			$tmperusahaan_id = Tmperusahaan::insert_data($data_perusahaan);

			$trkelurahan_id = Input::get("kelurahan");
			TmperusahaanTrkelurahan::insert_data($tmperusahaan_id[0]['id'], $trkelurahan_id);
			
			$trinvestasi_id = Input::get("investasi");
			TmperusahaanTrinvestasi::insert_data($tmperusahaan_id[0]['id'], $trinvestasi_id);
			
			$trkegiatan_id = Input::get("kegiatan");
			TmperusahaanTrkegiatan::insert_data($tmperusahaan_id[0]['id'], $trkegiatan_id);		
			
			echo "isi";
			
		}

		public function pendaftaran_data_perusahaan_edit(){
			$id = Input::get('id_perusahaan');
			$data_edit_perusahaan = [
			'no_reg_perusahaan' => Input::get('no_reg'),
			'npwp' => Input::get('i_npwp'),
			'n_perusahaan' => Input::get('perusahaan'),
			'i_telp_perusahaan' => Input::get('tel'),
			'a_perusahaan' => Input::get('al_perusahaan')
			];

			$trkelurahan_id = ['trkelurahan_id' => Input::get("kelurahan")];
			$trinvestasi_id = ['trinvestasi_id' => Input::get("investasi")];
			$trkegiatan_id = ['trkegiatan_id' => Input::get("kegiatan")];

			Tmperusahaan::where('id', '=', $id)->update($data_edit_perusahaan);
			TmperusahaanTrkelurahan::where('tmperusahaan_id','=', $id)->update($trkelurahan_id);
			TmperusahaanTrkegiatan::where('tmperusahaan_id', '=', $id)->update($trkegiatan_id);
			TmperusahaanTrinvestasi::where('tmperusahaan_id', '=', $id)->update($trinvestasi_id);
			
			echo "isi";
		}

		public function pendaftaran_data_perusahaan_data($id = null) {
			return Tmperusahaan::fetch_data_perusahaan($id);
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

		public function pendaftaran_data_perusahaan_opsi_perusahaan_propinsi($id = null){
			//return Trpropinsi::fetch_data();
			if(!empty($id)) {
				$prop = Trpropinsi::fetch_data();
				$result = [];
				foreach ($prop as $key => $value) {
					if($value->id == $id) {
						$wrapper = [
							'id' => $value->id,
							'n_propinsi' => $value->n_propinsi,
							'selected' => true
						];
					}
					else {
						$wrapper = [
							'id' => $value->id,
							'n_propinsi' => $value->n_propinsi,
							'selected' => false
						];
					}
					array_push($result, $wrapper);
				}

				return $result;

			}
			else {
				return Trpropinsi::fetch_data();
			}
		}

		public function pendaftaran_data_perusahaan_opsi_perusahaan_kabupaten($id_propinsi = null, $id = null){
			if(!empty($id) || !empty($id_propinsi)) {
				$kab = Trkabupaten::fetch_with_propinsi_by_id($id_propinsi);

				$result = [];

				foreach($kab as $kabk => $kabv) {
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
<<<<<<< HEAD
=======
				
				 return $result;

			}

			else {
				return Trkabupaten::fetch_with_propinsi();
				
			}
		}
		public function pendaftaran_data_perusahaan_opsi_perusahaan_kecamatan($id_kabupaten = null, $id = null) {
			if(!empty($id) || !empty($id_kabupaten)){

				$kec = Trkecamatan::fetch_with_trkabupaten_by_id($id_kabupaten);

				$result = [];

				foreach($kec as $keck => $kecv) {
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
				//echo "lo";
				return $result;
			}

			else {
				//echo "li";
				return Trkecamatan::fetch_with_trkabupaten();
			}
		}

		public function pendaftaran_data_perusahaan_opsi_perusahaan_kelurahan($id_kecamatan = null, $id = null) {
			if(!empty($id) || !empty($id_kecamatan)){

				$kel = Trkelurahan::fetch_with_trkecamatan_by_id($id_kecamatan);

				$result = [];

				foreach($kel as $kelk => $kelv) {
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
>>>>>>> pr/16

				return $result;
			}

			else {
				return Trkelurahan::fetch_with_trkecamatan();
			}
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
						$syarat_wrapper1[$pv] = $pk;

						$c_biner = decbin($pk);
						if (strlen($c_biner) < 4){
							$len = 4 - strlen($c_biner);
							$c_biner = str_repeat("0",$len) . $c_biner;
						}
						$c_biner_split = str_split($c_biner);
<<<<<<< HEAD
						$syarat_wrapper['izin_baru'] = $c_biner_split[0];
						$syarat_wrapper['perpanjangan'] = $c_biner_split[1];
						$syarat_wrapper['perubahan'] = $c_biner_split[2];
=======
						$syarat_wrapper1['daftar_ulang'] = $c_biner_split[0];
						$syarat_wrapper1['izin_baru'] = $c_biner_split[1];
						$syarat_wrapper1['perpanjangan'] = $c_biner_split[2];
						$syarat_wrapper1['perubahan'] = $c_biner_split[3];	

>>>>>>> pr/16
					}
					else{
						$syarat_wrapper1[$pv] = $pk;
					}
<<<<<<< HEAD
					$syarat_wrapper1 = $syarat_wrapper1 + $syarat_wrapper;

=======
					// $syarat_wrapper1[$pv] = $pk;		

					$syarat_wrapper1 = $syarat_wrapper1 + $syarat_wrapper;
					
>>>>>>> pr/16
				}
				array_push($result_persyaratan, $syarat_wrapper1);
			}

			$data_persyaratan['persyaratan'] = $result_persyaratan;
			$result = $result + $data_persyaratan;
			//print_r($c_biner);
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
