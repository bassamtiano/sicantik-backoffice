<?php

	class PortalController extends BaseController {

		public function jenis_pegaduan_data() {
			return Trstspesan::fetch_data();
		}

		public function jenis_perizinan_data() {
			return Trperizinan::fetch_data(['id', 'n_perizinan', 'v_hari']);
		}

		public function jenis_perizinan_persyaratan_data($id) {
			return Trperizinan::fetch_for_portal_by_id($id);
		}

		public function propinsi_data() {
			return Trpropinsi::fetch_data();
		}

		public function kabupaten_data($id) {
			return Trkabupaten::fetch_with_propinsi_by_id($id);
		}

		public function kecamatan_data($id) {
			return Trkecamatan::fetch_with_kabupaten_by_id($id);
		}

		public function kelurahan_data($id) {
			return Trkelurahan::fetch_with_trkecamatan_by_id($id);
		}

		public function layanan_online_pendaftaran_online() {
			$data_tmpemohon = [
				'source' => Input::get('jenis_identitas'),
				'no_referensi' => Input::get('id_identitas'),
				'n_pemohon' => Input::get('pemohon_nama'),
				'telp_pemohon' => Input::get('telepon_hp'),
				'a_pemohon' => Input::get('pemohon_alamat'),

				'jenis_perizinan' => Input::get('jenis_perizinan')
			];

			$tmpemohon_id = Tmpemohon::insert_data($data_tmpemohon);

			$data_tmpemohon_trkelurahan = [
				'tmpemohon_id' => $tmpemohon_id[0]['id'],
				'trkelurahan_id' => Input::get('pemohon_kelurahan')
			];

			Tmpemohontrkelurahan::create($data_tmpemohon_trkelurahan);

			$data_tmperusahaan = [
				'npwp' => Input::get('perusahaan_npwp'),
				'n_perusahaan' => Input::get('perusahaan_nama'),
				'a_perusahaan' => Input::get('perusahaan_alamat'),
				'i_telp_perusahaan' => Input::get('perusahaan_telepon')
			];

			$tmperusahaan_id = Tmperusahaan::insert_data($data_tmperusahaan);

			$data_tmperusahaan_trkelurahan = [
				'tmperusahaan_id' => $tmperusahaan_id[0]['id'],
				'trkelurahan_id' => Input::get('perusahaan_kelurahan'),
			];

			Tmperusahaantrkelurahan::create($data_tmperusahaan_trkelurahan);
			
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

			$data_permohonan = [
				'pendaftaran_id' => $pendaftaran_id,
				'd_terima_berkas' => date('Y-m-d'),
				'd_tahun' => date('Y'),
				'a_izin' => $data_tmpemohon['a_pemohon'],
				'c_pendaftaran' => '1'
			];



			$tmpermohonan_id = Tmpermohonan::insert_data($data_permohonan);

			$data_perizinan = [
				'tmpermohonan_id' => $tmpermohonan_id[0]['id'],
				'trperizinan_id' => $id_perizinan
			];

			$tmpermohonan_trperizinan = Tmpermohonantrperizinan::create($data_perizinan);

			return $tmpermohonan_trperizinan;

		}



		public function layanan_online_pengaduan_online() {

		}

		public function test_post() {
			$data = [
				'id' => Input::get('id'),
				'nama' => Input::get('nama')
			];
			return Testpost::post($data);
		}

	}
