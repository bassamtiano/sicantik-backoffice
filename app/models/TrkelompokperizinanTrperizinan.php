<?php

	class TrkelompokperizinanTrperizinan extends BaseModel {
		protected $table = 'trkelompok_perizinan_trperizinan';

		public static function fetch_with_trkelompok_perizinan() {
			return DB::table('trperizinan')
			->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')
			->orderBy('trperizinan.id')
			->get(['trperizinan.id', 'trperizinan.n_perizinan', 'trkelompok_perizinan.n_kelompok', 'trperizinan.v_hari', 'trperizinan.v_berlaku_tahun', 'trperizinan.v_berlaku_satuan', 'trperizinan.c_foto', 'trperizinan.c_keputusan']);
		}

	}
