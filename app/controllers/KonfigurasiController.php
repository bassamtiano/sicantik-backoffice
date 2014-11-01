<?php

	class KonfigurasiController extends BaseController {

		# Bagian Setting Perizinan / Jenis Perizinan

		public function setting_perizinan_jenis_perizinan() {
			return View::make('konfigurasi.pages.setting_perizinan_jenis_perizinan');	
		}

		public function setting_perizinan_jenis_perizinan_data() {
			return TrkelompokperizinanTrperizinan::fetch_with_trkelompok_perizinan();
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

		public function setting_perizinan_jenis_perizinan_update_data($id) {
			return Trperizinan::fetch_with_trkelompok_perizinan_trunitkerja($id);
			
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
			return Trperizinan::fetch_with_trproperty();

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

		}

		public function setting_wilayah_provinsi_update() {

		}

		public function setting_wilayah_provinsi_update_data($id) {
			return Trpropinsi::search_data($id);
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

		}

		public function setting_wilayah_kabupaten_update() {

		}

		public function setting_wilayah_kabupaten_update_data($id) {
			return Trkabupaten::search_with_propinsi($id);
		}

		public function setting_wilayah_kabupaten_delete() {

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

		public function setting_wilayah_kecamatan_update() {

		}

		public function setting_wilayah_kecamatan_update_data($id) {
			return Trkecamatan::search_with_kabupaten_propinsi($id);
		}

		public function setting_wilayah_kecamatan_delete() {

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

		public function setting_wilayah_kelurahan_update() {

		}

		public function setting_wilayah_kelurahan_update_data($id) {
			return Trkelurahan::search_with_kecamatan_kabupaten_propinsi($id);
		}

		public function setting_wilayah_kelurahan_delete() {

		}

		# Bagian Keamanan Data / Log Activity


		public function keamanan_data_log_activity() {
			return View::make('konfigurasi.pages.keamanan_data_log_activity');
		}

		public function keamanan_data_log_activity_data($date_start = null, $date_finish = null) {
			return Tmlogactivity::fetch_data($date_start, $date_finish);
		}

		public function keamanan_data_log_activity_insert() {

		}

		public function keamanan_data_log_activity_delete() {

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

		# Bagian Report / Report Component

		public function report_report_component() {
			return View::make('konfigurasi.pages.report_report_component');
		}

		public function report_report_component_data() {
			return ReportComponents::fetch_data(['report_component_code', 'short_desc', 'id']);
		}
	}
