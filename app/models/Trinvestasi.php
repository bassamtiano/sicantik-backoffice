<?php
	
	class Trinvestasi extends BaseModel {

		protected $table = "trinvestasi";
		protected $guarded = array('id');
		protected $fillable = array('n_investasi', 'keterangan');

		// public static function get_test() {

		// 	return tmpemohon::all();

		// }

		public static function fetch_data() {
			return Trinvestasi::get();
		}
	}