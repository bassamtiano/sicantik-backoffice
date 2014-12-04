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
			return Tmpermohonan::fetch_with_tmpemohon_tmpermohonan($id);
		}

		public function pendaftaran_permohonan_izin_baru_opsi_perizinan(){
			return Trperizinan::fetch_data_opsi();
		}

		public function pendaftaran_permohonan_izin_baru_tambah(){

			$date = date('yyyy-mm-dd');
			$id_permohonan = Tmpermohonan::generate_id_for_layanan_online_pendaftaran_online($date);

			foreach ($id_permohonan as $pk) {
				$records = $pk->records;
			}

			if($records == 0){
				$records = 1;
			}

			$urutan = '';
			for($i = strlen($records) + 1; $i <= 5; ++$i) {
				$urutan = $urutan . '0';
			}

			$trperizinan_id = Input::get('perizinan_id');
			$perizinan = '';
			for($i = strlen($trperizinan_id) + 1; $i <= 3; ++$i){
				$perizinan = $perizinan . '0';
			}

			$id_jenis_perizinan = '1';
			$jenis_perizinan = '';
			for($i = strlen($id_jenis_perizinan) + 1; $i <=2; ++$i){
				$jenis_perizinan = $jenis_perizinan .'0';
			}

			$pendaftaran_id = $urutan .$records . $perizinan . $trperizinan_id . $jenis_perizinan .$id_jenis_perizinan . date('mY');

			$data_permohonan = [
				'pendaftaran_id' => $pendaftaran_id,
				'd_terima_berkas' => Input::get('d_terima_berkas'),
				'd_survey' => Input::get('tanggal_peninjauan'),
				'd_selesai_proses' => Input::get('d_selesai_proses'),
				'd_bukti' => Input::get('d_bukti'),
				'd_tahun' => '2014',
				'd_berlaku_izin' => Input::get('d_berlaku_izin'),
				'd_berlaku_keputusan' => Input::get('d_berlaku_keputusan'),
				'd_ambil_izin' => Input::get('d_ambil_izin'),
				'd_izin_dicabut' => Input::get('d_izin_dicabut'),
				'i_urut' => Input::get('i_urut'),
				'a_izin' => Input::get('a_izin'),
				'c_paralel' => '0',
				'c_pendaftaran' => '0',
				'c_tinjauan' => '0',
				'c_izin_selesai' => '0',
				'c_izin_dicabut' => '0',
				'id_lama' => '0',
				'd_perubahan' => Input::get('d_perubahan'),
				'd_perpanjangan' => Input::get('d_perpanjangan'),
				'd_daftarulang' => Input::get('d_daftarulang'),
				'i_entry' => Input::get('i_entry'),
				'd_entry' => Input::get('d_entry'),
				'c_status_bayar' => Input::get('c_status_bayar'),
				'no_akta' => Input::get('no_akta'),
				'notaris' => Input::get('notaris'),
				'd_ajuan_cabut' => Input::get('d_ajuan_cabut'),
				'ket_cabut' => Input::get('ket_cabut'),
				'nip_ttd' => Input::get('nip_ttd'),
				'nama_ttd' =>Input::get('nama_ttd'),
				'file_ttd' => Input::get('file_ttd'),
				'keterangan' => Input::get('keterangan')
			];

			$data_pemohon = [
				'no_referensi' => Input::get('no_referensi'),
				'n_pemohon' => Input::get('n_pemohon'),
				'telp_pemohon' => Input::get('telp_pemohon'),
				'a_pemohon' => Input::get('a_pemohon'),
				'a_pemohon_luar' => Input::get('a_pemohon_luar'),
				'i_user' => Input::get('i_user_pemohon'),
				'd_entry' => Input::get('d_entry'),
				'cek_prop' => Input::get('cek_prop'),
				'source' => Input::get('source')
			];

			$data_perusahaan = [
				'n_perusahaan' => Input::get('n_perusahaan'),
				'npwp' => Input::get('npwp'),
				'a_perusahaan' => Input::get('a_perusahaan'),
				'i_telp_perusahaan' => Input::get('telp_perusahaan'),
				'no_reg_perusahaan' => Input::get('no_reg_perusahaan'),
				'rt' => Input::get('rt'),
				'rw' => Input::get('rw'),
				'i_user' => Input::get('i_user_perusahaan'),
				'd_entry' => Input::get('d_entry'),
				'fax' => Input::get('fax_perusahaan'),
				'email' => Input::get('email_perusahaan')
			];

			$trkelurahan_pemohon_id = Input::get('kelurahan_pemohon');

			$trkelurahan_perusahaan_id = Input::get('kelurahan_perusahaan');

			$trjenis_permohonan_id = Input::get('jenis_permohonan_id');

			$trsyarat_perizinan_id = Input::get('syarat_perizinan_id');

			$tmpermohonan_id = Tmpermohonan::insert_data($data_permohonan);

			$tmpemohon_id =	Tmpemohon::insert_data($data_pemohon);

			$tmperusahaan_id = Tmperusahaan::insert_data($data_perusahaan);

			foreach ($trsyarat_perizinan_id as $k => $v) {
				
				echo $v;				

				TmpermohonanTrpersyaratanperizinan::create(['tmpermohonan_id' => $tmpermohonan_id[0]['id'], 'trsyarat_perizinan_id' => $v]);
			}
		
			Tmpemohontmpermohonan::insert_data($tmpermohonan_id[0]['id'], $tmpemohon_id[0]['id']);
			Tmpermohonantmperusahaan::insert_data($tmpermohonan_id[0]['id'], $tmperusahaan_id[0]['id']);
			TmpemohonTrkelurahan::insert_data($tmpemohon_id[0]['id'], $trkelurahan_pemohon_id);
			TmperusahaanTrkelurahan::insert_data($tmperusahaan_id[0]['id'], $trkelurahan_perusahaan_id);
			TmpermohonanTrperizinan::insert_data($tmpermohonan_id[0]['id'], $trperizinan_id);
			TmpermohonanTrjenispermohonan::insert_data($tmpermohonan_id[0]['id'], $trjenis_permohonan_id);
		
		}

		public function pendaftaran_permohonan_izin_baru_tambah_data($id){
			$data_permohonan_izin_baru = Tmpermohonan::fetch_with_trjenis_permohonan_trkelompok_perizinan($id);

			$result = [];

			foreach($data_permohonan_izin_baru as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}

			$data_syarat = [];
			$persyaratan = Trsyaratperizinan::fetch_with_trperizinan_for_izin_baru_tambah_data($result['perizinan_id']);

			foreach($persyaratan as $key => $pval) {

				$terpenuhi = Trsyaratperizinan::fetch_with_trperizinan_for_izin_baru_tambah_data($id, $pval->id);
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

		public function pendaftaran_permohonan_izin_baru_setujui(){

			// $data_permohonan = [
			// 	'd_selesai_proses' => '2014-12-31',
			// 	'c_pendaftaran' => '1'
			// ];

			// $tmpermohonan_id = Tmpermohonan::edit_data($data_permohonan);

			Tmpermohonan::where('id', '=', Input::get('permohonan_id'))->update(['c_pendaftaran' => '1']);
			// $tmpermohonan_id = Input::get('id');

			// $tmpermohonan = Tmpermohonan::where('id', '=', $tmpermohonan_id)->update($data_permohonan);

			// if($tmpermohonan == '1') {
			// 	echo 'isi';
			// }

		}

		public function pendaftaran_permohonan_izin_baru_setujui_data($id){
			// return Tmpermohonan::fetch_with_tmpemohon_for_coba_data($id);
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

		public function pendaftaran_permohonan_izin_baru_edit() {

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

		public function pendaftaran_permohonan_izin_baru_edit_opsi_pemohon_kelurahan($id_kecamatan=null, $id=null) {

			if(!empty($id) || !empty($id_kecamatan)) {
				$kel = Trkelurahan::fetch_with_kecamatan_by_id($id_kecamatan);

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

				return $result;
			}

			else {
				return Trkabupaten::fetch_with_kecamatan_by_id($id);
			}

		}

		public function pendaftaran_permohonan_izin_baru_edit_opsi_pemohon_kecamatan($id_kabupaten=null, $id=null) {
		
			if(!empty($id) || !empty($id_kabupaten)) {
				$kec = Trkecamatan::fetch_with_kabupaten_by_id($id_kabupaten);

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

				return $result;
			}

			else {
				return Trkabupaten::fetch_with_kabupaten_by_id($id);
			}
		}

		public function pendaftaran_permohonan_izin_baru_edit_opsi_pemohon_kabupaten($id_propinsi=null, $id=null) {
		
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

				return $result;
			}

			else {
				return Trkabupaten::fetch_with_propinsi_by_id($id);
			}
		}

		public function pendaftaran_permohonan_izin_baru_edit_opsi_pemohon_propinsi($id=null) {
			
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

		public function pendaftaran_permohonan_izin_baru_edit_opsi_perusahaan_kelurahan($id_kecamatan = null, $id=null) {
			
			if(!empty($id) || !empty($id_kecamatan)) {
				$kel = Trkelurahan::fetch_with_kecamatan_by_id($id_kecamatan);

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

				return $result;
			}

			else {
				return Trkabupaten::fetch_with_kecamatan_by_id($id);
			}
		}

		public function pendaftaran_permohonan_izin_baru_edit_opsi_perusahaan_kecamatan($id_kabupaten = null, $id = null) {
			
			if(!empty($id) || !empty($id_kabupaten)) {
				$kec = Trkecamatan::fetch_with_kabupaten_by_id($id_kabupaten);

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

				return $result;
			}

			else {
				return Trkabupaten::fetch_with_kabupaten_by_id($id);
			}
		}

		public function pendaftaran_permohonan_izin_baru_edit_opsi_perusahaan_kabupaten($id_propinsi = null, $id = null) {
			
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

				return $result;
			}

			else {
				return Trkabupaten::fetch_with_propinsi_by_id($id);
			}
		}

		public function pendaftaran_permohonan_izin_baru_edit_opsi_perusahaan_propinsi($id=null) {
		
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

		public function pendaftaran_data_pemohon_tambah(){

			$data_pemohon = [
				'no_referensi' => Input::get('no_referensi'),
				'n_pemohon' => Input::get('n_pemohon'),
				'telp_pemohon' => Input::get('telp_pemohon'),
				'a_pemohon' => Input::get('a_pemohon'),
				'a_pemohon_luar' => Input::get('a_pemohon_luar'),
				'source' => Input::get('source')
			];

			$tmpemohon_id =	Tmpemohon::insert_data($data_pemohon);

			$trkelurahan_id = Input::get('kelurahan_pemohon');
			
			TmpemohonTrkelurahan::insert_data($tmpemohon_id[0]['id'], $trkelurahan_id);
		}

		public function pendaftaran_data_pemohon_opsi_kelurahan($id_kecamatan=null, $id=null) {
			if(!empty($id) || !empty($id_kecamatan)) {
				$kel = Trkelurahan::fetch_with_kecamatan_by_id($id_kecamatan);

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

				return $result;
			}

			else {
				return Trkabupaten::fetch_with_kecamatan_by_id($id);
			}

		}

		public function pendaftaran_data_pemohon_opsi_kecamatan($id_kabupaten=null, $id=null) {
			if(!empty($id) || !empty($id_kabupaten)) {
				$kec = Trkecamatan::fetch_with_kabupaten_by_id($id_kabupaten);

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

				return $result;
			}

			else {
				return Trkabupaten::fetch_with_kabupaten_by_id($id);
			}
		}

		public function pendaftaran_data_pemohon_opsi_kabupaten($id_propinsi=null, $id=null) {
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

				return $result;
			}

			else {
				return Trkabupaten::fetch_with_propinsi_by_id($id);
			}
		}

		public function pendaftaran_data_pemohon_opsi_propinsi($id=null) {
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