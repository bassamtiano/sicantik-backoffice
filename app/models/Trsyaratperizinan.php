<?php

	class Trsyaratperizinan extends BaseModel {

		protected $table = 'trsyarat_perizinan';

		public static function fetch_with_trperizinan_trsyarat_perizinan($trperizinan_id, $trsyarat_perizinan_id) {
			return DB::table('trsyarat_perizinan')
			->join('trperizinan_trsyarat_perizinan', 'trsyarat_perizinan.id', '=', 'trperizinan_trsyarat_perizinan.trsyarat_perizinan_id')
			->select(DB::raw('trsyarat_perizinan.id, trsyarat_perizinan.v_syarat, trsyarat_perizinan.status, trperizinan_trsyarat_perizinan.c_show_type'))
			->orderBy('trsyarat_perizinan.id')
			->where('trsyarat_perizinan.id', '=', $trsyarat_perizinan_id)
			->where('trperizinan_trsyarat_perizinan.trperizinan_id', '=', $trperizinan_id)
			->get();
		}

		public static function fetch_with_tmpermohonan_for_pendataan_entry_data_perizinan_data_awal_data($tmpermohonan_id, $trsyarat_perizinan_id) {

			$persyaratan = DB::table('trsyarat_perizinan')
			->join('tmpermohonan_trsyarat_perizinan', 'trsyarat_perizinan.id', '=', 'tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id')
			->where('tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id', '=', $trsyarat_perizinan_id)
			->where('tmpermohonan_trsyarat_perizinan.tmpermohonan_id', '=', $tmpermohonan_id)
			->get(['tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id']);

			if(!empty($persyaratan)) {
				return true;
			}
			else {
				return false;
			}


		}

		public static function fetch_with_tmperizinan_for_pendataan_entry_data_perizinan_data_awal_data($trperizinan_id) {
			return DB::table('trsyarat_perizinan')
			->join('trperizinan_trsyarat_perizinan', 'trsyarat_perizinan.id', '=', 'trperizinan_trsyarat_perizinan.trsyarat_perizinan_id')
			->where('trperizinan_trsyarat_perizinan.trperizinan_id', '=', $trperizinan_id)
			->orderBy('trsyarat_perizinan.status')
			->orderBy('trsyarat_perizinan.id')
			->get(['trsyarat_perizinan.id' ,'trsyarat_perizinan.v_syarat', 'trsyarat_perizinan.status', 'trsyarat_perizinan.i_urut']);

		}

		public static function fetch_with_tmpermohonan_for_izin_baru_edit_data($tmpermohonan_id, $trsyarat_perizinan_id) {

			$persyaratan = DB::table('trsyarat_perizinan')
			->join('tmpermohonan_trsyarat_perizinan', 'trsyarat_perizinan.id', '=', 'tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id')
			->where('tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id', '=', $trsyarat_perizinan_id)
			->where('tmpermohonan_trsyarat_perizinan.tmpermohonan_id', '=', $tmpermohonan_id)

			->orderBy('trsyarat_perizinan.status')
			->orderBy('trsyarat_perizinan.id')
			->get(['trsyarat_perizinan.id', 'tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id']);

			if(!empty($persyaratan)) {
				return true;
			}
			else {
				return false;
			}
			
		}

		public static function fetch_with_tmperizinan_for_izin_baru_edit_data($trperizinan_id) {
			return DB::table('trsyarat_perizinan')
			->join('trperizinan_trsyarat_perizinan', 'trsyarat_perizinan.id', '=', 'trperizinan_trsyarat_perizinan.trsyarat_perizinan_id')
			->where('trperizinan_trsyarat_perizinan.trperizinan_id', '=', $trperizinan_id)
			->where('trperizinan_trsyarat_perizinan.c_show_type', '!=', '1')
			->orderBy('trsyarat_perizinan.status')
			->get(['trsyarat_perizinan.id' ,'trsyarat_perizinan.v_syarat', 'trsyarat_perizinan.status', 'trsyarat_perizinan.i_urut']);

		}

		public static function fetch_with_tmpermohonan_for_perubahan_izin_edit_data($tmpermohonan_id, $trsyarat_perizinan_id) {

			$persyaratan = DB::table('trsyarat_perizinan')
			->join('tmpermohonan_trsyarat_perizinan', 'trsyarat_perizinan.id', '=', 'tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id')
			->where('tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id', '=', $trsyarat_perizinan_id)
			->where('tmpermohonan_trsyarat_perizinan.tmpermohonan_id', '=', $tmpermohonan_id)

			->orderBy('trsyarat_perizinan.status')
			->orderBy('trsyarat_perizinan.id')
			->get(['trsyarat_perizinan.id', 'tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id']);

			if(!empty($persyaratan)) {
				return true;
			}
			else {
				return false;
			}
			
		}

		public static function fetch_with_tmperizinan_for_perubahan_izin_edit_data($trperizinan_id) {
			return DB::table('trsyarat_perizinan')
			->join('trperizinan_trsyarat_perizinan', 'trsyarat_perizinan.id', '=', 'trperizinan_trsyarat_perizinan.trsyarat_perizinan_id')
			->where('trperizinan_trsyarat_perizinan.trperizinan_id', '=', $trperizinan_id)
			->where('trperizinan_trsyarat_perizinan.c_show_type', '!=', '12')
			->orderBy('trsyarat_perizinan.status')
			->get(['trsyarat_perizinan.id' ,'trsyarat_perizinan.v_syarat', 'trsyarat_perizinan.status', 'trsyarat_perizinan.i_urut']);

		}

		public static function fetch_with_tmpermohonan_for_perpanjangan_izin_edit_data($tmpermohonan_id, $trsyarat_perizinan_id) {

			$persyaratan = DB::table('trsyarat_perizinan')
			->join('tmpermohonan_trsyarat_perizinan', 'trsyarat_perizinan.id', '=', 'tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id')
			->where('tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id', '=', $trsyarat_perizinan_id)
			->where('tmpermohonan_trsyarat_perizinan.tmpermohonan_id', '=', $tmpermohonan_id)

			->orderBy('trsyarat_perizinan.status')
			->orderBy('trsyarat_perizinan.id')
			->get(['trsyarat_perizinan.id', 'tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id']);

			if(!empty($persyaratan)) {
				return true;
			}
			else {
				return false;
			}
			
		}

		public static function fetch_with_tmperizinan_for_perpanjangan_izin_edit_data($trperizinan_id) {
			return DB::table('trsyarat_perizinan')
			->join('trperizinan_trsyarat_perizinan', 'trsyarat_perizinan.id', '=', 'trperizinan_trsyarat_perizinan.trsyarat_perizinan_id')
			->where('trperizinan_trsyarat_perizinan.trperizinan_id', '=', $trperizinan_id)
			->where('trperizinan_trsyarat_perizinan.c_show_type', '=', '7')
			->orderBy('trsyarat_perizinan.status')
			->get(['trsyarat_perizinan.id' ,'trsyarat_perizinan.v_syarat', 'trsyarat_perizinan.status', 'trsyarat_perizinan.i_urut']);

		}

		public static function fetch_with_tmpermohonan_for_daftar_ulang_izin_edit_data($tmpermohonan_id, $trsyarat_perizinan_id) {

			$persyaratan = DB::table('trsyarat_perizinan')
			->join('tmpermohonan_trsyarat_perizinan', 'trsyarat_perizinan.id', '=', 'tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id')
			->where('tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id', '=', $trsyarat_perizinan_id)
			->where('tmpermohonan_trsyarat_perizinan.tmpermohonan_id', '=', $tmpermohonan_id)
			->orderBy('trsyarat_perizinan.status')
			->get(['trsyarat_perizinan.id', 'tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id']);

			if(!empty($persyaratan)) {
				return true;
			}
			else {
				return false;
			}
			
		}

		public static function fetch_with_tmperizinan_for_daftar_ulang_izin_edit_data($trperizinan_id) {
			return DB::table('trsyarat_perizinan')
			->join('trperizinan_trsyarat_perizinan', 'trsyarat_perizinan.id', '=', 'trperizinan_trsyarat_perizinan.trsyarat_perizinan_id')
			->where('trperizinan_trsyarat_perizinan.trperizinan_id', '=', $trperizinan_id)
			->orderBy('trsyarat_perizinan.status')
			->get(['trsyarat_perizinan.id' ,'trsyarat_perizinan.v_syarat', 'trsyarat_perizinan.status', 'trsyarat_perizinan.i_urut']);

		}
	}
