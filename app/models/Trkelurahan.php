<?php
class Trkelurahan extends BaseModel {

	protected $table = 'trkelurahan';
    protected $guarded = ['id'];
    protected $fillable = ['n_kelurahan'];

	public static function fetch_data() {
		return Trkelurahan::get();
	}

	public static function fetch_with_kecamatan_kabupaten_propinsi() {
		return DB::table('trkelurahan')
		->join('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
		->join('trkecamatan', 'trkecamatan_trkelurahan.trkecamatan_id', '=', 'trkecamatan.id')
		->join('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
		->join('trkabupaten', 'trkabupaten_trkecamatan.trkabupaten_id', '=', 'trkabupaten.id')
		->join('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
		->join('trpropinsi', 'trkabupaten_trpropinsi.trpropinsi_id', '=', 'trpropinsi.id')
		->orderBy('trkelurahan.id')
		->get(['trkelurahan.id', 'trkelurahan.n_kelurahan', 'trkecamatan.n_kecamatan', 'trkabupaten.n_kabupaten', 'trpropinsi.n_propinsi']);
	}

	public static function search_with_kecamatan_kabupaten_propinsi($id) {
		return DB::table('trkelurahan')
		->join('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
		->join('trkecamatan', 'trkecamatan_trkelurahan.trkecamatan_id', '=', 'trkecamatan.id')
		->join('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
		->join('trkabupaten', 'trkabupaten_trkecamatan.trkabupaten_id', '=', 'trkabupaten.id')
		->join('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
		->join('trpropinsi', 'trkabupaten_trpropinsi.trpropinsi_id', '=', 'trpropinsi.id')
		->select(DB::raw('trkelurahan.id, trkelurahan.n_kelurahan, trkecamatan.id as trkecamatan_id, trkabupaten.id as trkabupaten_id, trpropinsi.id as trpropinsi_id'))
		->where('trkelurahan.id', '=', $id)
		->orderBy('trkelurahan.id')
		->get();
	}

	public static function fetch_with_trkecamatan_by_id($id) {
		return DB::table('trkelurahan')
		->join('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
		->where('trkecamatan_trkelurahan.trkecamatan_id', '=', $id)
		->orderBy('trkelurahan.id')
		->get(['trkelurahan.id', 'trkelurahan.n_kelurahan']);
	}

}
