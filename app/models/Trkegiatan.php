<?php
	
	class Trkegiatan extends BaseModel {

		protected $table = "trkegiatan";
		protected $guarded = array('id');
		protected $fillable = array('n_kegiatan');

		// public static function get_test() {

		// 	return tmpemohon::all();

		// }

		public static function fetch_data() {
			return Trkegiatan::get();
		}

//-------------------------------------------------------- PELAYANAN / PENDAFTARAN / DATA PEMOHON -------------------------//

		public static function fetch_data_pemohon($id){

			return DB::table('tmpemohon')

			->select(DB::raw('tmpemohon.id, tmpemohon.no_referensi, tmpemohon.n_pemohon, tmpemohon.a_pemohon'))

			->groupBy('tmpemohon.id')
			->orderBy('tmpemohon.id')
			->get();
		}

	}