<?php

	class Tmpemohon extends BaseModel {

		protected $table = "tmpemohon";
		protected $guarded = ['id'];
		protected $fillable = ['no_referensi', 'n_pemohon', 'telp_pemohon', 'a_pemohon', 'a_pemohon_luar', 'i_user', 'd_entry', 'cek_prop', 'source'];

		// public static function get_test() {

		// 	return tmpemohon::all();

		// }

        # Modul Backoffice =========================================================================================================================================================================================

        // public static function edit_pemohon_for_pendataan_entry_data_perizinan_data_awal($id, $data) {

        //     'tmpemohon.source', 'tmpemohon.no_referensi', 'tmpemohon.n_pemohon', 'tmpemohon.telp_pemohon';

        //     Tmpemohon::where('id', '=', $id)->update(['n_pemohon' => $data['n_pemohon']]);

        // }


		public static function fetch_data() {
			return Tmpemohon::get();
		}

//-------------------------------------------------------- PELAYANAN / PENDAFTARAN / DATA PEMOHON -------------------------//

		public static function fetch_data_pemohon($id){

			return DB::table('tmpemohon')

			->select(DB::raw('tmpemohon.id, tmpemohon.no_referensi, tmpemohon.n_pemohon, tmpemohon.a_pemohon'))

			->groupBy('tmpemohon.id')
			->orderBy('tmpemohon.id')
			->get();
		}


		public static function fetch_data_pemohon_edit_data($id){

			return DB::table('tmpemohon')

			->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

			->leftjoin('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
			->leftjoin('trkecamatan', 'trkecamatan.id', '=', 'trkecamatan_trkelurahan.trkecamatan_id')

			->leftjoin('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->leftjoin('trkabupaten', 'trkabupaten.id', '=', 'trkabupaten_trkecamatan.trkabupaten_id')

			->leftjoin('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->leftjoin('trpropinsi', 'trpropinsi.id', '=', 'trkabupaten_trpropinsi.trpropinsi_id')

			->select(DB::raw('tmpemohon.id, tmpemohon.no_referensi, trkelurahan.n_kelurahan as kelurahan_pemohon, trkecamatan.n_kecamatan as kecamatan_pemohon, trkabupaten.n_kabupaten as kabupaten_pemohon, trpropinsi.n_propinsi as propinsi_pemohon, tmpemohon.telp_pemohon, tmpemohon.source, tmpemohon.n_pemohon, tmpemohon.a_pemohon, tmpemohon.a_pemohon_luar'))

			->where('tmpemohon.id', '=', $id)
			->groupBy('tmpemohon.id')
			->orderBy('tmpemohon.id')
			->get();
		}


//-------------------------------------------------------- FUNGSI INSERT -------------------------//

		public static function insert_data($data) {
			Tmpemohon::create($data);

		}

		public static function update_data($id, $data){
			Tmpemohon::where('id', '=', $id) -> update($data);

		}

	}
