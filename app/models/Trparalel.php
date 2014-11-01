<?php

	class Trparalel extends BaseModel {

		protected $table = 'trparalel';

		public static function fetch_with_trperizinan() {
			return DB::table('trparalel')
			->join('trparalel_trperizinan', 'trparalel.id', '=', 'trparalel_trperizinan.trparalel_id')
			->join('trperizinan', 'trparalel_trperizinan.trperizinan_id', '=', 'trperizinan.id')
			->select(DB::raw('trparalel.id, trparalel.n_paralel, count(trparalel_trperizinan.trperizinan_id) as jumlah_perizinan'))
			->groupBy('trparalel.id')
			->orderBy('trparalel.id')
			->get();
		}

	}