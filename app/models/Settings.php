<?php

	class Settings extends BaseModel {

		protected $table = 'settings';

		public static function setting_satuan_get() {
			return Settings::where('name', '=', 'app_enum_satuan')->get();
		}

		public static function setting_instansi_get() {
			return Settings::whereIn('name', ['app_kantor', 'app_city', 'app_tlp', 'app_fax', 'app_logo_kop', 'app_alamat'])->get();
		}

		public static function setting_web_service_get() {
			return Settings::whereIn('name', ['app_web_service', 'web_service_penduduk'])->get();
		}

		# Modul Reporting ==========================================================================================================================================================================================

		public static function get_data_cetak() {
			return Settings::whereIn('name', ['app_kantor', 'app_city', 'app_alamat', 'app_tlp', 'app_fax'])->get(['name', 'value']);
		}

	}