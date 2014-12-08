<?php

	class Trkecamatan extends BaseModel {

		protected $table = 'trkecamatan';
        protected $guarded = ['id'];
        protected $fillable = ['n_kecamatan'];

		public static function fetch_data() {
			return Trkecamatan::get();
		}

		public static function fetch_with_trkabupaten_propinsi() {
			return DB::table('trkecamatan')
			->join('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->join('trkabupaten', 'trkabupaten_trkecamatan.trkabupaten_id', '=', 'trkabupaten.id')
			->join('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->join('trpropinsi', 'trkabupaten_trpropinsi.trpropinsi_id', '=', 'trpropinsi.id')
			->orderBy('trkecamatan.id')
			->get(['trkecamatan.id', 'trkecamatan.n_kecamatan', 'trkabupaten.n_kabupaten', 'trpropinsi.n_propinsi']);
		}

		public static function search_with_kabupaten_propinsi($id) {
			return DB::table('trkecamatan')
			->join('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->join('trkabupaten', 'trkabupaten_trkecamatan.trkabupaten_id', '=', 'trkabupaten.id')
			->join('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->join('trpropinsi', 'trkabupaten_trpropinsi.trpropinsi_id', '=', 'trpropinsi.id')
			->select(DB::raw('trkecamatan.id, trkecamatan.n_kecamatan, trkabupaten.id as trkabupaten_id, trpropinsi.id as trpropinsi_id'))
			->where('trkecamatan.id', '=', $id)
			->get();
		}

		public static function search_data($id_kecamatan) {
			return Trkecamatan::where('id', '=', $id_kecamatan);
		}

		public static function fetch_with_trkabupaten_by_id($id) {
			return DB::table('trkecamatan')
			->leftjoin('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->where('trkabupaten_trkecamatan.trkabupaten_id', '=', $id)
			->orderBy('trkecamatan.id')
			->get(['trkecamatan.id', 'trkecamatan.n_kecamatan']);
		}

<<<<<<< HEAD
	}
=======
		public static function fetch_with_trkabupaten() {
			return DB::table('trkecamatan')
			->leftjoin('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->orderBy('trkecamatan.id')
			->get(['trkecamatan.id', 'trkecamatan.n_kecamatan']);
		}

	}
>>>>>>> pr/16
