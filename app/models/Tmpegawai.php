<?php

	class Tmpegawai extends BaseModel {

		protected $table = 'tmpegawai';

		public static function fetch_data() {
			return Tmpegawai::get();
		}

		public static function fetch_with_user() {
			return DB::table('tmpegawai')
			->leftJoin('tmpegawai_user', 'tmpegawai.id', '=', 'tmpegawai_user.tmpegawai_id')
			->leftJoin('user', 'tmpegawai_user.user_id', '=', 'user.id')
			->select(DB::raw('tmpegawai.id, tmpegawai.n_pegawai, tmpegawai.nip, tmpegawai.n_jabatan, tmpegawai.status, user.username'))
			->orderBy('tmpegawai.id')
			->get();
		}

		public static function fetch_with_trrunitkerja($id) {
			return DB::table('tmpegawai')
			->join('tmpegawai_trunitkerja', 'tmpegawai.id', '=', 'tmpegawai_trunitkerja.tmpegawai_id')
			->join('trunitkerja', 'tmpegawai_trunitkerja.trunitkerja_id', '=', 'trunitkerja.id')
			->select(DB::raw('tmpegawai.id, tmpegawai.n_pegawai, tmpegawai.nip, tmpegawai.n_jabatan, trunitkerja.n_unitkerja, tmpegawai.status'))
			->where('tmpegawai.id', '=', $id)
			->get();
		}

	}
