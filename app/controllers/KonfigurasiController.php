<?php

	class KonfigurasiController extends BaseController {

		public function __construct() {
			$this->auth_konfigurasi();
		}

		# Konfigurasi Authentication 	======================================================================================

		private function auth_konfigurasi() {

			$this->beforeFilter(function(){

				$user_type = 'konfigurasi';

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


		# Bagian Setting Perizinan / Jenis Perizinan

		public function setting_perizinan_jenis_perizinan() {
			return View::make('konfigurasi.pages.setting_perizinan_jenis_perizinan');
		}

		public function setting_perizinan_jenis_perizinan_data() {
			return TrkelompokperizinanTrperizinan::fetch_with_trkelompok_perizinan();
		}

		public function setting_perizinan_jenis_perizinan_opsi_kelompok(){
			return Trkelompokperizinan::fetch_data();
		}

		public function setting_perizinan_jenis_perizinan_opsi_unitkerja(){
			return Trunitkerja::fetch_data();
		}

		public function setting_perizinan_jenis_perizinan_insert() {
			$data=[
				'n_perizinan' => Input::get('n_perizinan'),
				'v_hari' => Input::get('v_hari'),
				'c_tarif' => Input::get('c_tarif'),
				'is_open',

				'v_berlaku_tahun',
				'v_berlaku_satuan',
				'v_perizinan',
				'c_foto',
				'c_keputusan',
				'c_berlaku',
				'c_judul',
				'd_entry'
			];
			return Trperizinan::insert_data($data);
		}

		public function setting_perizinan_jenis_perizinan_edit_data($id) {
			$data_perizinan = Trperizinan::fetch_with_trkelompok_perizinan_trunitkerja_edit($id);

			$result = [];

			foreach($data_perizinan as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}

			return $result;

		}

		public function setting_perizinan_jenis_perizinan_delete() {

		}


		# Bagian Setting Perizinan / Perizinan Paralel

		public function setting_perizinan_perizinan_paralel() {
			return View::make('konfigurasi.pages.setting_perizinan_perizinan_paralel');

		}

		public function setting_perizinan_perizinan_paralel_data() {
			return Trparalel::fetch_with_trperizinan();
		}

		public function setting_perizinan_perizinan_paralel_insert() {
			$n_paralel = 'hendra3';
			$trperizinan_id = '1';

			$trparalel_id = Trparalel::insert_data($n_paralel);
			TrparalelTrperizinan::insert_data($trparalel_id, $trperizinan_id);
		}

		public function setting_perizinan_perizinan_paralel_update() {

		}

		public function setting_perizinan_perizinan_paralel_delete() {

		}

		public function setting_perizinan_perizinan_paralel_detail_data($id) {
			return Trperizinan::fetch_with_trparalel($id);
		}


		# Bagian Setting Perizinan / Persyaratan Izin

		public function setting_perizinan_persyaratan_izin() {
			return View::make('konfigurasi.pages.setting_perizinan_persyaratan_izin');
		}

		public function setting_perizinan_persyaratan_izin_data() {

			return Trperizinan::fetch_with_trkelompok_perizinan_trsyarat_perizinan();
		}

		public function setting_perizinan_persyaratan_izin_insert() {

		}

		public function setting_perizinan_persyaratan_izin_update() {

		}

		public function setting_perizinan_persyaratan_izin_update_data($id) {
			return Trperizinan::fetch_with_trsyarat_perizinan($id);
		}

		public function setting_perizinan_persyaratan_izin_update_data_update() {

		}

		public function setting_perizinan_persyaratan_izin_update_data_update_data($trperizinan_id, $trsyarat_perizinan_id) {

			return Trsyaratperizinan::fetch_with_trperizinan_trsyarat_perizinan($trsyarat_perizinan_id, $trperizinan_id);
		}

		public function setting_perizinan_persyaratan_izin_delete() {

		}

		# Bagian Setting Perizinan / Property Pendataan

		public function setting_perizinan_property_pendataan() {
			return View::make('konfigurasi.pages.setting_perizinan_property_pendataan');
		}

		public function setting_perizinan_property_pendataan_data() {
			return Trperizinan::fetch_with_trkelompok_perizinan_trproperty();
		}


		public function setting_perizinan_property_pendataan_insert() {

		}

		public function setting_perizinan_property_pendataan_update_data($id) {
		return Trperizinan::fetch_with_trproperty($id);
		}


		public function setting_perizinan_property_pendataan_delete() {

		}

		# Bagian Setting Perizinan / Property Retribusi

		public function setting_perizinan_nilai_retribusi() {
			return View::make('konfigurasi.pages.setting_perizinan_nilai_retribusi');
		}

		public function setting_perizinan_nilai_retribusi_data() {
			return Trperizinan::fetch_with_trretribusi();
		}

		public function setting_perizinan_nilai_retribusi_insert() {

		}

		public function setting_perizinan_nilai_retribusi_update_data($id) {
			return Trperizinan::fetch_with_trperizinan_trretribusi($id);
		}

		public function setting_perizinan_nilai_retribusi_delete() {

		}

		# Bagian Setting Perizinan / Koefisien Tarif

		public function setting_perizinan_koefisien_tarif() {

			#belum..
			return View::make('konfigurasi.pages.setting_perizinan_koefisien_tarif');
		}

		public function setting_perizinan_koefisien_tarif_data() {
			return Trperizinan::fetch_with_trproperty_trperizinan();

		}

		public function setting_perizinan_koefisien_tarif_insert() {

		}

		public function setting_perizinan_koefisien_tarif_update() {

		}

		public function setting_perizinan_koefisien_tarif_delete() {

		}

		# Bagian Setting Umum / Instansi

		public function setting_umum_instansi() {
			return View::make('konfigurasi.pages.setting_umum_instansi');
		}

		public function setting_umum_instansi_data() {
			return Settings::setting_instansi_get();
		}

		public function setting_umum_instansi_opsi_wilayah_data() {
			return Trkabupaten::fetch_data(['id', 'n_kabupaten']);
		}

		public function setting_umum_instansi_update() {

		}

		# Bagian Setting Umum / Hari Libur

		public function setting_umum_hari_libur() {
			return View::make('konfigurasi.pages.setting_umum_hari_libur');
		}

		public function setting_umum_hari_libur_data() {
			return Tmholiday::fetch_data();
		}
		public function setting_umum_hari_libur_insert() {
			$data = [
			'date' => Input::get('date'),
			'description' => Input::get('description'),
			'holiday_type' => Input::get('holiday_type')
			];

			// $data = [
			// 	'date' => '2014-10-09',
			// 	'description' => 'Hari Kekek',
			// 	'holiday_type' => 'Libur'
			// ];

			return Tmholiday::insert_data($data);
		 }

		public function setting_umum_hari_libur_update() {

		}

		public function setting_umum_hari_libur_update_data($id) {
			return Tmholiday::search_data($id);
		}

		public function setting_umum_hari_libur_delete() {

		}

		# Bagian Setting Umum / Satuan

		public function setting_umum_satuan() {
			return View::make('konfigurasi.pages.setting_umum_satuan');
		}

		public function setting_umum_satuan_data() {
			return Settings::setting_satuan_get();
		}

		public function setting_umum_satuan_insert() {

		}

		public function setting_umum_satuan_update() {

		}

		public function setting_umum_satuan_delete() {

		}

 		# Bagian Setting Umum / Web Service

		public function setting_umum_web_service() {
			return View::make('konfigurasi.pages.setting_umum_web_service');
		}

		public function setting_umum_web_service_data() {
			return Settings::setting_web_service_get();
		}

		public function setting_umum_web_service_insert() {

		}

		public function setting_umum_web_service_update() {

		}

		public function setting_umum_web_service_delete() {

		}

		# Bagian Setting User / Pegawai

		public function setting_user_pegawai() {
			return View::make('konfigurasi.pages.setting_user_pegawai');
		}

		public function setting_user_pegawai_data() {
			return Tmpegawai::fetch_with_user();
		}

		public function setting_user_pegawai_insert() {

		}

		public function setting_user_pegawai_update_data($id) {
			return Tmpegawai::fetch_with_trrunitkerja($id);
		}

		public function setting_user_pegawai_delete() {

		}

		# Bagian Setting User / Unit Kerja

		public function setting_user_unit_kerja() {
			return View::make('konfigurasi.pages.setting_user_unit_kerja');
		}

		public function setting_user_unit_kerja_data() {
			return Trunitkerja::fetch_data();
		}

		public function setting_user_unit_kerja_insert() {

		}

		public function setting_user_unit_kerja_update() {

		}

		public function setting_user_unit_kerja_update_data($id) {
			return Trunitkerja::search_data($id);
		}

		public function setting_user_unit_kerja_delete() {

		}

		# Bagian Setting User / Pengguna

		public function setting_user_pengguna() {
			return View::make('konfigurasi.pages.setting_user_pengguna');
		}

		public function setting_user_pengguna_data() {
			return User::fetch_data();
		}

		public function setting_user_pengguna_insert() {

		}

		public function setting_user_pengguna_update_data($id) {
			return User::fetch_with_user_auth_trperizinan($id);
		}

		public function setting_user_pengguna_delete() {

		}

		# Bagian Setting Wilayah / Provinsi

		public function setting_wilayah_provinsi() {
			return View::make('konfigurasi.pages.setting_wilayah_propinsi');
		}

		public function setting_wilayah_provinsi_data() {
			return Trpropinsi::fetch_data();
		}

		public function setting_wilayah_provinsi_insert() {

			Trpropinsi::create(['n_propinsi' => Input::get('n_propinsi')]);

		}

		public function setting_wilayah_provinsi_edit() {
			Trpropinsi::where('id', '=', Input::get('id'))->update(['n_propinsi' => Input::get('n_propinsi')]);

		}

		public function setting_wilayah_provinsi_edit_data($id) {
			$data_propinsi = Trpropinsi::search_data($id);

			$result = [];

			foreach($data_propinsi as $val => $key) {
				$result['id'] = $key->id;
				$result['n_propinsi'] = $key->n_propinsi;
			}

			return $result;

			// return $data_propinsi;

		}

		public function setting_wilayah_provinsi_delete() {

		}

		# Bagian Setting Wilayah / Kabupaten

		public function setting_wilayah_kabupaten() {
			return View::make('konfigurasi.pages.setting_wilayah_kabupaten');
		}

		public function setting_wilayah_kabupaten_data() {
			return Trkabupaten::fetch_with_propinsi();
		}

		public function setting_wilayah_kabupaten_insert() {

			$trpropinsi_id = Input::get('trpropinsi_id');

			$data = [
			$n_kabupaten = Input::get('n_kabupaten'),
			$ibukota = Input::get('ibukota')
			];

			$trkabupaten_id = Trkabupaten::insert_data($data);
			TrkabupatenTrpropinsi::insert_data($trkabupaten_id, $trpropinsi_id);


		}

		public function setting_wilayah_kabupaten_edit() {

		}

		public function setting_wilayah_kabupaten_edit_data($id) {
			$data_kabupaten = Trkabupaten::search_with_propinsi($id);

			$result = [];

			foreach($data_kabupaten as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}

			return $result;
		}

		public function setting_wilayah_kabupaten_delete() {

		}

		public function setting_wilayah_kabupaten_opsi_propinsi($id = null){
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


		# Bagian Setting Wilayah / Kecamatan

		public function setting_wilayah_kecamatan() {
			return View::make('konfigurasi.pages.setting_wilayah_kecamatan');
		}

		public function setting_wilayah_kecamatan_data() {
			return Trkecamatan::fetch_with_kabupaten_propinsi();
		}

		public function setting_wilayah_kecamatan_insert() {

		}

		public function setting_wilayah_kecamatan_edit() {

		}

		public function setting_wilayah_kecamatan_edit_data($id) {
			$data_kecamatan = Trkecamatan::search_with_kabupaten_propinsi($id);

			$result = [];

			foreach($data_kecamatan as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}

			return $result;

		}

		public function setting_wilayah_kecamatan_delete() {

		}

		public function setting_wilayah_kecamatan_opsi_propinsi($id = null){
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

		public function setting_wilayah_kecamatan_opsi_kabupaten($id_propinsi = null, $id = null){

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


		# Bagian Setting Wilayah / Kelurahan

		public function setting_wilayah_kelurahan() {
			return View::make('konfigurasi.pages.setting_wilayah_kelurahan');
		}

		public function setting_wilayah_kelurahan_data() {
			return Trkelurahan::fetch_with_kecamatan_kabupaten_propinsi();
		}

		public function setting_wilayah_kelurahan_insert() {

		}

		public function setting_wilayah_kelurahan_edit() {

		}

		public function setting_wilayah_kelurahan_edit_data($id) {
			$data_kelurahan = Trkelurahan::search_with_kecamatan_kabupaten_propinsi($id);

			$result = [];

			foreach($data_kelurahan as $val => $key) {
				foreach($key as $v => $k) {
					$result[$v] = $k;
				}
			}

			return $result;

		}

		public function setting_wilayah_kelurahan_delete() {

		}

		public function setting_wilayah_kelurahan_opsi_propinsi($id = null){
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

		public function setting_wilayah_kelurahan_opsi_kabupaten($id_propinsi = null, $id = null){

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

		public function setting_wilayah_kelurahan_opsi_kecamatan($id_kabupaten = null, $id = null) {
			if(!empty($id) && !empty($id_kabupaten)){

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
				return Trkecamatan::fetch_with_kabupaten_by_id($id_kabupaten);
			}
		}




		# Bagian Keamanan Data / Backup Database

		public function keamanan_data_backup_database() {

		}

		# Bagian Keamanan Data / Restore Database Database

		public function keamanan_data_restore_database() {

		}

		# Bagian Report / Report Generator

		public function report_report_generator() {
			return View::make('konfigurasi.pages.report_report_generator');
		}

		public function report_report_generator_data() {
			return ReportGenerators::fetch_data(['id', 'report_code', 'short_desc']);
		}

		public function report_report_generator_edit_data($id) {
			$report_generator = ReportGenerators::find_data($id);
			$report_group_data = ReportGroupDatas::find_data($id);

			foreach($report_generator as $repgenk) {
				$result_report_generator = $repgenk;
			}

			$result_report_generator['report_group_data'] = $report_group_data;
			return $result_report_generator;
		}

		public function report_report_generator_opsi_trperizinan($id = null) {
			if(empty($id)) {
				return Trperizinan::fetch_data_opsi();
			}
			else {
				$trperizinan = Trperizinan::fetch_data_opsi();

				$result = [];

				foreach($trperizinan as $tperk => $tperv) {
					if($tperv['id'] == $id) {
						$tperv['selected'] = true;
					}
					else {
						$tperv['selected'] = false;
					}

					array_push($result, $tperv);
				}

				return $result;
			}
		}

		public function report_report_generator_opsi_report_types($id = null) {
			if(empty($id)) {
				return ReportTypes::fetch_data_opsi();
			}
			else {
				$report_types = ReportTypes::fetch_data_opsi();;
				$result = [];

				foreach($report_types as $reptk => $reptv) {
					if($reptv['report_type_code'] == $id) {
						$reptv['selected'] = true;
					}
					else {
						$reptv['selected'] = false;
					}

					array_push($result, $reptv);
				}

				return $result;
			}
		}

		public function report_report_generator_edit_group_data() {

			$data = [
				'report_group_code' => Input::get('report_group_code'),
				'report_generator_id' => Input::get('report_generator_id'),
				'short_desc' => Input::get('short_desc'),
				'type' => Input::get('type'),
				'group_query' => Input::get('group_query')
			];

			ReportGroupDatas::create($data);


		}

		public function report_report_generator_delete_group_data() {
			ReportGroupDatas::where('id', '=', Input::get('id'))->delete();
		}

		public function report_report_generator_insert() {
			$file_name = Input::file('layout')->getClientOriginalName();
			Input::file('layout')->move('assets/dokumen', $file_name);

			$data = [
				'report_code' => Input::get('report_code'),
				'short_desc' => Input::get('short_desc'),
				'long_desc' => Input::get('long_desc'),
				'layout' => $file_name,
				'trperizinan_id' => Input::get('trperizinan_id'),
				'report_type' => Input::get('report_type')
			];

			ReportGenerators::create($data);
		}

		public function report_report_generator_edit() {
			/*disini */

			$data = [];


			$report_group_id = Input::get('report_group_id');
			$report_group_code = Input::get('report_group_code');
			$report_group_short_desc = Input::get('report_group_short_desc');
			$report_group_type = Input::get('report_group_type');
			$report_group_query = Input::get('report_group_query');


			$id1 = 0;
			$id2 = 0;
			$id3 = 0;
			$id4 = 0;
			$id5 = 0;

			foreach($report_group_type as $rgtk => $rgtv) {
				$wrapper[$id1]['type'] = $rgtv;
				$id1 +=1;
			}
			foreach($report_group_short_desc as $rgsdk => $rgsdv) {
				$wrapper[$id2]['short_desc'] = $rgsdv;
				$id2 +=1;
			}

			foreach($report_group_code as $rgck => $rgcv) {
				$wrapper[$id3]['report_group_code'] = $rgcv;
				$id3 +=1;
			}

			foreach($report_group_id as $rgik => $rgiv) {
				$wrapper[$id4]['id'] = $rgiv;
				$id4 +=1;
			}

			foreach($report_group_query as $rgqk => $rgqv) {
				$wrapper[$id5]['group_query'] = $rgqv;
				$id5 +=1;
			}

			$file_name = Input::file('layout')->getClientOriginalName();
			Input::file('layout')->move('assets/dokumen', $file_name);

			$report_generator = [
				'report_code' => Input::get('report_code'),
				'short_desc' => Input::get('short_desc'),
				'long_desc' => Input::get('long_desc'),
				'layout' => $file_name,
				'trperizinan_id' => Input::get('trperizinan_id'),
				'report_type' => Input::get('report_type')
			];

			ReportGenerators::where('id', '=', Input::get('id'))->update($report_generator);

			foreach($wrapper as $wk => $wv) {
				ReportGroupDatas::where('id', '=', $wv['id'])->update($wv);
			}

			echo 'isi';
		}

		public function report_report_generator_ganda() {

			$file_name = Input::file('layout')->getClientOriginalName();
			Input::file('layout')->move('assets/dokumen', $name);

			$data = [
				'report_code' => Input::get('report_code'),
				'short_desc' => Input::get('short_desc'),
				'long_desc' => Input::get('long_desc'),
				'layout' => $file_name,
				'trperizinan_id' => Input::get('trperizinan_id'),
				'report_type' => Input::get('report_type')
			];

			ReportGenerators::create($data);
		}

		public function report_report_generator_delete() {
			return ReportGenerators::where('id', '=', Input::get('id'))->delete();
		}


		# Bagian Report / Report Component

		public function report_report_component() {
			return View::make('konfigurasi.pages.report_report_component');
		}

		public function report_report_component_data() {
			return ReportComponents::fetch_data(['report_component_code', 'short_desc', 'id']);
		}

		public function report_report_component_edit_data($id) {
			$report_component = ReportComponents::find_data($id);

			$result = [];

			foreach($report_component as $rcomk => $rcomv) {
				foreach($rcomv as $rck => $rcv) {
					$result[$rck] = $rcv;
				}
			}

			return $result;

		}

		public function report_report_component_opsi_trperizinan($id = null) {
			if(empty($id)) {
				return Trperizinan::fetch_data_opsi();
			}
			else {
				$trperizinan = Trperizinan::fetch_data_opsi();

				$result = [];

				foreach($trperizinan as $tperk => $tperv) {
					if($tperv['id'] == $id) {
						$tperv['selected'] = true;
					}
					else {
						$tperv['selected'] = false;
					}

					array_push($result, $tperv);
				}

				return $result;
			}
		}

		public function report_report_component_opsi_report_types($id = null) {
			if(empty($id)) {
				return ReportTypes::fetch_data_opsi();
			}
			else {
				$report_types = ReportTypes::fetch_data_opsi();;

				$result = [];

				foreach($report_types as $reptk => $reptv) {
					if($reptv['report_type_code'] == $id) {
						$reptv['selected'] = true;
					}
					else {
						$reptv['selected'] = false;
					}

					array_push($result, $reptv);
				}

				return $result;
			}
		}
		public function report_report_edit() {
			$data = [
				'report_component_code' => Input::get('report_component_code'),
				'short_desc' => Input::get('short_desc'),
				'format_nomor' => Input::get('format_nomor'),
				'last_num_seq' => Input::get('last_num_seq'),
				'trperizinan_id' => Input::get('trperizinan_id'),
				'report_type' => Input::get('report_type'),
				'nama_penandatangan' => Input::get('nama_penandatangan'),
				'jabatan' => Input::get('jabatan'),
				'nip' => Input::get('nip'),
				'nama_kantor' => Input::get('nama_kantor')
			];

			return ReportComponents::where('id', '=', Input::get('id'))->update($data);
		}

		public function report_report_ganda() {
			$data = [
				'report_component_code' => Input::get('report_component_code'),
				'short_desc' => Input::get('short_desc'),
				'format_nomor' => Input::get('format_nomor'),
				'last_num_seq' => Input::get('last_num_seq'),
				'trperizinan_id' => Input::get('trperizinan_id'),
				'report_type' => Input::get('report_type'),
				'nama_penandatangan' => Input::get('nama_penandatangan'),
				'jabatan' => Input::get('jabatan'),
				'nip' => Input::get('nip'),
				'nama_kantor' => Input::get('nama_kantor')
			];

			return ReportComponents::create($data);
		}

		public function report_report_delete() {
			return ReportComponents::where('id', '=', Input::get('id'))->delete();
		}

		public function report_report_insert() {
			$data = [
				'report_component_code' => Input::get('report_component_code'),
				'short_desc' => Input::get('short_desc'),
				'format_nomor' => Input::get('format_nomor'),
				'last_num_seq' => Input::get('last_num_seq'),
				'trperizinan_id' => Input::get('trperizinan_id'),
				'report_type' => Input::get('report_type'),
				'nama_penandatangan' => Input::get('nama_penandatangan'),
				'jabatan' => Input::get('jabatan'),
				'nip' => Input::get('nip'),
				'nama_kantor' => Input::get('nama_kantor')
			];

			return ReportComponents::create($data);
		}
	}
