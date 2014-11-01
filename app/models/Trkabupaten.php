<?php

	class Trkabupaten extends BaseModel {

		protected $table = 'trkabupaten';

		public static function fetch_data($data) {
			return Trkabupaten::get($data);
		}

		public static function search_with_propinsi($id) {
			return DB::table('trkabupaten')
			->join('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->join('trpropinsi', 'trkabupaten_trpropinsi.trpropinsi_id', '=', 'trpropinsi.id')
			->select(DB::raw('trkabupaten.id, trpropinsi.id as trpropinsi_id, trkabupaten.n_kabupaten, trkabupaten.ibukota'))
			->orderBy('trpropinsi.id')
			->where('trkabupaten.id', '=', $id)
			->get();
		}

		public static function fetch_with_propinsi() {
			return DB::table('trkabupaten')
			->join('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->join('trpropinsi', 'trkabupaten_trpropinsi.trpropinsi_id', '=', 'trpropinsi.id')
			->orderBy('trpropinsi.id')
			->get(['trkabupaten.id', 'trkabupaten.n_kabupaten', 'trkabupaten.ibukota', 'trpropinsi.n_propinsi']);
		}

		public static function fetch_with_propinsi_by_id($id) {
			return DB::table('trkabupaten')
			->join('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->orderBy('trkabupaten.id')
			->where('trkabupaten_trpropinsi.trpropinsi_id', '=', $id)
			->get(['trkabupaten.id', 'trkabupaten.n_kabupaten']);
		}

		# Modul Reporting ==========================================================================================================================================================================================

		public static function get_nama_kabupaten($id) {
			$n_kabupaten = Trkabupaten::where('id', '=', $id)->get(['n_kabupaten']);
			foreach ($n_kabupaten as $key) {
				return $key['n_kabupaten'];
			}
		}

	}