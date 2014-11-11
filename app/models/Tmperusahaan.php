<?php
	
	class Tmperusahaan extends BaseModel {

		protected $table = "tmperusahaan";
		protected $guarded = array('id');
		protected $fillable = array('n_perusahaan', 'npwp', 'a_perusahaan', 'd_tgl_berdiri', 'i_telp_perusahaan', 'no_reg_perusahaan', 'rt', 'rw', 'i_user', 'd_entry', 'fax', 'email');

		// public static function get_test() {

		// 	return tmperusahaan::all();

		// }

		public static function fetch_data() {
			return Tmperusahaan::get();
		}

//-------------------------------------------------------- PELAYANAN / PENDAFTARAN / DATA PERUSAHAAN -------------------------//

		public static function fetch_data_perusahaan($id){

			return DB::table('tmperusahaan')

			->select(DB::raw('tmperusahaan.id, tmperusahaan.n_perusahaan, tmperusahaan.npwp, tmperusahaan.a_perusahaan'))

			->groupBy('tmperusahaan.id')
			->orderBy('tmperusahaan.id')

			->get();
		}

		public static function fetch_data_perusahaan_edit_data($id){

			return DB::table('tmperusahaan')

			->leftjoin('tmperusahaan_trkelurahan', 'tmperusahaan.id', '=', 'tmperusahaan_trkelurahan.tmperusahaan_id')
			->leftjoin('trkelurahan as perusahaan_kelurahan', 'perusahaan_kelurahan.id', '=', 'tmperusahaan_trkelurahan.trkelurahan_id')

			->leftjoin('trkecamatan_trkelurahan as trkecamatan_trkelurahan_perusahaan', 'perusahaan_kelurahan.id', '=', 'trkecamatan_trkelurahan_perusahaan.trkelurahan_id')
			->leftjoin('trkecamatan as perusahaan_kecamatan', 'perusahaan_kecamatan.id', '=', 'trkecamatan_trkelurahan_perusahaan.trkecamatan_id')

			->leftjoin('trkabupaten_trkecamatan as trkabupaten_trkecamatan_perusahaan', 'perusahaan_kecamatan.id', '=', 'trkabupaten_trkecamatan_perusahaan.trkecamatan_id')
			->leftjoin('trkabupaten as perusahaan_kabupaten', 'perusahaan_kabupaten.id', '=', 'trkabupaten_trkecamatan_perusahaan.trkabupaten_id')

			->leftjoin('trkabupaten_trpropinsi as trkabupaten_trpropinsi_perusahaan', 'perusahaan_kabupaten.id', '=', 'trkabupaten_trpropinsi_perusahaan.trkabupaten_id')
			->leftjoin('trpropinsi as perusahaan_propinsi', 'perusahaan_propinsi.id', '=', 'trkabupaten_trpropinsi_perusahaan.trpropinsi_id')

			->leftjoin('tmperusahaan_trkegiatan', 'tmperusahaan.id', '=', 'tmperusahaan_trkegiatan.tmperusahaan_id')
			->leftjoin('trkegiatan', 'trkegiatan.id', '=', 'tmperusahaan_trkegiatan.trkegiatan_id')

			->leftjoin('tmperusahaan_trinvestasi', 'tmperusahaan.id', '=', 'tmperusahaan_trinvestasi.tmperusahaan_id')
			->leftjoin('trinvestasi', 'trinvestasi.id', '=', 'tmperusahaan_trinvestasi.trinvestasi_id')

			->select(DB::raw('tmperusahaan.id, tmperusahaan.n_perusahaan, perusahaan_kelurahan.n_kelurahan as perusahaan_kelurahan, perusahaan_kecamatan.n_kecamatan as perusahaan_kecamatan, perusahaan_kabupaten.n_kabupaten as perusahaan_kabupaten, perusahaan_propinsi.n_propinsi as perusahaan_propinsi, tmperusahaan.npwp, tmperusahaan.i_telp_perusahaan, tmperusahaan.a_perusahaan, trkegiatan.n_kegiatan, trinvestasi.n_investasi'))

			->where('tmperusahaan.id', '=', $id)
			->groupBy('tmperusahaan.id')
			->orderBy('tmperusahaan.id')
			->get();
		}

		public static function fetch_with_trkelurahan(){
		return DB::table('tmperusahaan_sementara')

			->leftjoin('tmperusahaan_sementara_trkelurahan', 'tmperusahaan_sementara.id', '=', 'tmperusahaan_sementara_trkelurahan.tmperusahaan_sementara_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmperusahaan_sementara_trkelurahan.trkelurahan_id')

			->leftjoin('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
			->leftjoin('trkecamatan', 'trkecamatan.id', '=', 'trkecamatan_trkelurahan.trkecamatan_id')

			->leftjoin('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->leftjoin('trkabupaten', 'trkabupaten.id', '=', 'trkabupaten_trkecamatan.trkabupaten_id')

			->leftjoin('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->leftjoin('trpropinsi', 'trpropinsi.id', '=', 'trkabupaten_trpropinsi.trpropinsi_id')

			->select(DB::raw('tmperusahaan_sementara.id, tmperusahaan_sementara.n_perusahaan, trkelurahan.n_kelurahan, trkecamatan.n_kecamatan, trkabupaten.n_kabupaten, trpropinsi.n_propinsi'))

			->orderBy('tmperusahaan_sementara.id')
			->get();

		}

//-------------------------------------------------------- FUNGSI INSERT -------------------------//

		public static function insert_data($data) {
			Tmperusahaan::create($data);

		}

		public static function update_data($id, $data){
			Tmperusahaan::where('id', '=', $id) -> update($data);
		}

	}