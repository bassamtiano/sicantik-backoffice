<?php
class TrparalelTrperizinan extends BaseModel {
	protected $table = 'trparalel_trperizinan';

	public static function fetch_data() {
		return DB::table('trperizinan')
		->join('trparalel_trperizinan', 'trperizinan.id', '=', 'trparalel_trperizinan.id')
		->join('trparalel', 'trparalel_trperizinan.trparalel_id', '=', 'trparalel.id')
		->select('trparalel.n_paralel')
		->get();

	}
	
	public static function search_data() {

	}
}