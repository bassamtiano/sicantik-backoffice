<?php

	class PengaduanController extends BaseController {

		//===================================================================Daftar Pengaduan Saran===================================================================================//

		public function daftar_pengaduan_saran() {
			return View::make('pengaduan.pages.daftar_pengaduan_saran');
		}

		public function daftar_pengaduan_saran_data($id=null) {
			return Tmpesan::fetch_with_tmpesan_trsts_pesan_trsumber_pesan($id);
		}

		public function daftar_pengaduan_saran_opsi_status_pengaduan(){
			return Trstspesan::fetch_data();
		}

		public function daftar_pengaduan_saran_opsi_sumber_pengaduan(){
			return Trsumberpesan::fetch_data();
		}

		public function daftar_pengaduan_saran_opsi_propinsi($id=null){
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

		public function daftar_pengaduan_saran_opsi_kabupaten($id_propinsi=null, $id=null){
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

		public function daftar_pengaduan_saran_opsi_kecamatan($id_kabupaten=null, $id=null){
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
				return Trkecamatan::fetch_with_kabupaten_by_id($id);
			}
		}

		public function daftar_pengaduan_saran_opsi_kelurahan($id_kecamatan=null, $id=null){
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
				return Trkelurahan::fetch_with_kecamatan_by_id($id);
			}
		}

		public function daftar_pengaduan_saran_tambah(){
			$tmpesan_data = [
				'e_pesan' => Input::get('e_pesan'),
				'nama' => Input::get('nama'),
				'c_tindak_lanjut' => 'Belum',
				'email' => Input::get('email'),
				'telp' => Input::get('telp'),
				'alamat' => Input::get('alamat'),
				'kelurahan' => Input::get('kelurahan'),
				'kecamatan' => Input::get('kecamatan'),
				'i_entry' => Input::get('i_entry'),
				'd_entry' => Input::get('d_entry'),
				'e_tindak_lanjut' => Input::get('e_tindak_lanjut'),
				'c_skpd_tindaklanjut' => Input::get('c_skpd_tindaklanjut'),
				'd_tindak_lanjut' => Input::get('d_tindak_lanjut'),
				'd_tindaklanjut_selesai' => Input::get('d_tindaklanjut_selesai'),
				'nama_penanggungjawab' => Input::get('nama_penanggungjawab'),
				'e_pesan_koreksi' => Input::get('e_pesan_koreksi'),
				'c_sts_setuju' => 'Tidak'
			];

			$tmpesan_id = Tmpesan::insert_data($tmpesan_data);

			$trstspesan_id = Input::get('status_pesan');

			$trsumber_pesan_id = Input::get('sumber_pesan_pengaduan');

			TmpesanTrstspesan::insert_data($tmpesan_id[0]['id'], $trstspesan_id);

			TmpesanTrsumberpesan::insert_data($tmpesan_id[0]['id'], $trsumber_pesan_id);

			// $trkelurahan_id = Input::get('kelurahan');
			
			// TmpesanTrkelurahan::insert_data($tmpesan_id[0]['id'], $trkelurahan_id);
		}

		public function daftar_pengaduan_saran_edit(){
			Tmpesan::where('id', '=', Input::get('tmpesan_id'))->update([
				'nama' => Input::get('nama'),
				'email' => Input::get('email'),
				'telp' => Input::get('telp'),
				'alamat' => Input::get('alamat'),
				'kelurahan' => Input::get('kelurahan'),
				'kecamatan' => Input::get('kecamatan'),
				'd_entry' => Input::get('d_entry'),
				'e_pesan_koreksi' => Input::get('e_pesan_koreksi'),
				'c_tindak_lanjut' => Input::get('c_tindak_lanjut')
				]);

			TmpesanTrsumberpesan::where('tmpesan_id', '=', Input::get('tmpesan_id'))->update(['trsumber_pesan_id' => Input::get('sumber_pesan_pengaduan')]);
			TmpesanTrstspesan::where('tmpesan_id', '=', Input::get('tmpesan_id'))->update(['trstspesan_id' => Input::get('status_pesan_pengaduan')]);
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

		public function persetujuan_respon_pengaduan_edit(){
			Tmpesan::where('id', '=', Input::get('tmpesan_id'))->update([
				'c_skpd_tindaklanjut' => Input::get('c_skpd_tindaklanjut'),
				'c_sts_setuju' => Input::get('c_sts_setuju')
				]);
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

		public function pengiriman_respon_pengaduan_edit(){
			Tmpesan::where('id', '=', Input::get('tmpesan_id'))->update([
				'd_tindak_lanjut' => Input::get('d_tindak_lanjut'),
				'd_tindaklanjut_selesai' => Input::get('d_tindaklanjut_selesai'),
				'nama_penanggungjawab' => Input::get('nama_penanggungjawab'),
				'e_tindak_lanjut' => Input::get('e_tindak_lanjut')
				]);
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