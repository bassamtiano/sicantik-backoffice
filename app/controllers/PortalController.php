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
			return Trkecamatan::fetch_with_trkabupaten_by_id($id);
		}

		public function kelurahan_data($id) {
			return Trkelurahan::fetch_with_trkecamatan_by_id($id);
		}

		public function layanan_online_pendaftaran_online() {

			$jenis_identitas = '';
			$id_identitas = '';
			$pemohon_nama = '';
			$telepon_hp = '';
			$pemohon_alamat = '';
			$pemohon_provinsi = '';
			$pemohon_kabupaten = '';
			$pemohon_kecamatan = '';
			$pemohon_kelurahan = '';

			$perusahaan_npwp = '';
			$perusahaan_nama = '';
			$perusahaan_alamat = '';
			$perusahaan_telepon = '';
			$perusahaan_provinsi = '';
			$perusahaan_kabupaten = '';
			$perusahaan_kecamatan = '';
			$perusahaan_kelurahan = '';
			$perusahaan_lampiran = '';

			$jenis_perizinan = '';


			$id_permohonan = Tmpermohonan::generate_id_for_layanan_online_pendaftaran_online();

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


			$id_perizinan = '83';
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
			return $pendaftaran_id;

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
