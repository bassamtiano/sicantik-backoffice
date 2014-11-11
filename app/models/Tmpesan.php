<?php
	
	class tmpesan extends BaseModel {

		protected $table = "tmpesan";
		protected $guarded = array('id');
		protected $fillable = array('e_pesan', 'c_tindak_lanjut', 'nama', 'telp', 'alamat', 'kelurahan', 'kecamatan', 'i_entry', 'd_entry', 'e_tindak_lanjut', 'c_skpd_tindaklanjut', 'd_tindak_lanjut', 'nama_penanggungjawab', 'e_pesan_koreksi', 'c_sts_setuju');
		
		public static function get_test() {

			return tmpesan::all();

		}

		# Modul Pengaduan ==========================================================================================================================================================================================

		public static function fetch_with_tmpesan_trsts_pesan_trsumber_pesan($id){

			if (!empty($id)) {

				return DB::table('tmpesan')

				->join('tmpesan_trstspesan', 'tmpesan.id', '=', 'tmpesan_trstspesan.tmpesan_id')
				->join('trstspesan', 'tmpesan_trstspesan.trstspesan_id', '=', 'trstspesan.id')
				->join('tmpesan_trsumber_pesan', 'tmpesan.id', '=', 'tmpesan_trsumber_pesan.tmpesan_id')
				->join('trsumber_pesan', 'trsumber_pesan.id', '=', 'tmpesan_trsumber_pesan.trsumber_pesan_id')

				->select(DB::raw('tmpesan.id, tmpesan.nama, tmpesan.alamat, tmpesan.kelurahan, tmpesan.kecamatan, trstspesan.n_sts_pesan, tmpesan.c_tindak_lanjut, tmpesan.d_entry, trsumber_pesan.name'))
				->where('trstspesan.sts_pesan_id', '=', $id)
				->orderBy('tmpesan.d_entry', 'dsc')
				->get();
			}

			else {
				return DB::table('tmpesan')
				->join('tmpesan_trstspesan', 'tmpesan.id', '=', 'tmpesan_trstspesan.tmpesan_id')
				->join('trstspesan', 'tmpesan_trstspesan.trstspesan_id', '=', 'trstspesan.id')
				->join('tmpesan_trsumber_pesan', 'tmpesan.id', '=', 'tmpesan_trsumber_pesan.tmpesan_id')
				->join('trsumber_pesan', 'trsumber_pesan.id', '=', 'tmpesan_trsumber_pesan.trsumber_pesan_id')

				->select(DB::raw('tmpesan.id, tmpesan.e_pesan, tmpesan.nama, tmpesan.alamat, tmpesan.kelurahan, tmpesan.kecamatan, trstspesan.n_sts_pesan, tmpesan.c_tindak_lanjut, tmpesan.d_entry, trsumber_pesan.name'))
				->orderBy('tmpesan.d_entry', 'dsc')
				->get();	
			}
		}

		public static function fetch_with_tmpesan_trsts_pesan_trsumber_pesan_for_edit_data($id){

			return DB::table('tmpesan')

			->join('tmpesan_trstspesan', 'tmpesan.id', '=', 'tmpesan_trstspesan.tmpesan_id')
			->join('trstspesan', 'tmpesan_trstspesan.trstspesan_id', '=', 'trstspesan.id')
			->join('tmpesan_trsumber_pesan', 'tmpesan.id', '=', 'tmpesan_trsumber_pesan.tmpesan_id')
			->join('trsumber_pesan', 'trsumber_pesan.id', '=', 'tmpesan_trsumber_pesan.trsumber_pesan_id')

			->select(DB::raw('tmpesan.id, tmpesan.nama, tmpesan.email, tmpesan.telp, tmpesan.alamat, tmpesan.kelurahan, tmpesan.kecamatan, tmpesan.e_pesan, tmpesan.e_pesan_koreksi, tmpesan.d_entry, tmpesan.e_tindak_lanjut, trsumber_pesan.name, trstspesan.n_sts_pesan, tmpesan.c_tindak_lanjut'))

			->where('tmpesan.id', '=', $id)
			->get();
		}
































		public static function fetch_with_tmpesan_trsts_pesan_trsumber_pesan_for_daftar_pengaduan_saran(){

			return DB::table('tmpesan')

			->join('tmpesan_trstspesan', 'tmpesan.id', '=', 'tmpesan_trstspesan.tmpesan_id')
			->join('trstspesan', 'tmpesan_trstspesan.trstspesan_id', '=', 'trstspesan.id')
			->join('tmpesan_trsumber_pesan', 'tmpesan.id', '=', 'tmpesan_trsumber_pesan.tmpesan_id')
			->join('trsumber_pesan', 'trsumber_pesan.id', '=', 'tmpesan_trsumber_pesan.trsumber_pesan_id')

			->select(DB::raw('tmpesan.id, tmpesan.e_pesan, tmpesan.nama, tmpesan.alamat, tmpesan.kelurahan, tmpesan.kecamatan, trstspesan.n_sts_pesan, tmpesan.c_tindak_lanjut, tmpesan.d_entry, trsumber_pesan.name'))

			->orderBy('tmpesan.id', 'dsc')
			->get();
		}

		public static function fetch_with_tmpesan_trsts_pesan_trsumber_pesan_persetujuan_respon_pengaduan_for_persetujuan_respon_pengaduan(){

			return DB::table('tmpesan')

			->join('tmpesan_trstspesan', 'tmpesan.id', '=', 'tmpesan_trstspesan.tmpesan_id')
			->join('trstspesan', 'tmpesan_trstspesan.trstspesan_id', '=', 'trstspesan.id')
			->join('tmpesan_trsumber_pesan', 'tmpesan.id', '=', 'tmpesan_trsumber_pesan.tmpesan_id')
			->join('trsumber_pesan', 'trsumber_pesan.id', '=', 'tmpesan_trsumber_pesan.trsumber_pesan_id')

			->select(DB::raw('tmpesan.id, tmpesan.e_pesan_koreksi, tmpesan.nama, tmpesan.alamat, tmpesan.kelurahan, tmpesan.kecamatan, trstspesan.n_sts_pesan, tmpesan.c_tindak_lanjut, tmpesan.d_entry, trsumber_pesan.name'))

			->where('tmpesan.c_tindak_lanjut', '=', 'Ya')
			->where('tmpesan.e_pesan_koreksi', '!=', 'null')
			->where('tmpesan.c_sts_setuju', '=', 'Tidak')
			->orderBy('tmpesan.id', 'dsc')
			->get();
		}

		public static function fetch_with_tmpesan_trsts_pesan_trsumber_pesan_persetujuan_respon_pengaduan_for_edit_data($id){

			return DB::table('tmpesan')

			->join('tmpesan_trstspesan', 'tmpesan.id', '=', 'tmpesan_trstspesan.tmpesan_id')
			->join('trstspesan', 'tmpesan_trstspesan.trstspesan_id', '=', 'trstspesan.id')
			->join('tmpesan_trsumber_pesan', 'tmpesan.id', '=', 'tmpesan_trsumber_pesan.tmpesan_id')
			->join('trsumber_pesan', 'trsumber_pesan.id', '=', 'tmpesan_trsumber_pesan.trsumber_pesan_id')

			->select(DB::raw('tmpesan.id, tmpesan.e_pesan, tmpesan.c_skpd_tindaklanjut, tmpesan.e_pesan_koreksi, tmpesan.nama, tmpesan.alamat, tmpesan.kelurahan, tmpesan.kecamatan, tmpesan.c_sts_setuju, trstspesan.n_sts_pesan, tmpesan.c_tindak_lanjut, tmpesan.d_entry, trsumber_pesan.name'))

			->where('tmpesan.id', '=', $id)
			->get();
		}


		public static function fetch_with_tmpesan_trsts_pesan_trsumber_pesan_pengiriman_respon_pengaduan_for_pengiriman_respon_pengaduan($id){

			return DB::table('tmpesan')

			->join('tmpesan_trstspesan', 'tmpesan.id', '=', 'tmpesan_trstspesan.tmpesan_id')
			->join('trstspesan', 'tmpesan_trstspesan.trstspesan_id', '=', 'trstspesan.id')
			->join('tmpesan_trsumber_pesan', 'tmpesan.id', '=', 'tmpesan_trsumber_pesan.tmpesan_id')
			->join('trsumber_pesan', 'trsumber_pesan.id', '=', 'tmpesan_trsumber_pesan.trsumber_pesan_id')

			->select(DB::raw('tmpesan.id, tmpesan.e_pesan_koreksi, tmpesan.nama, tmpesan.alamat, tmpesan.telp, trstspesan.n_sts_pesan, tmpesan.d_entry'))

			->where('tmpesan.c_tindak_lanjut', '=', 'Ya')
			// ->where('tmpesan.e_pesan_koreksi', '!=', 'null')
			->where('tmpesan.c_sts_setuju', '=', 'Ya')
			// ->orderBy('tmpesan.id')
			->get();
		}

		public static function fetch_with_tmpesan_trsts_pesan_trsumber_pesan_pengiriman_respon_pengaduan_for_edit_data($id){

			return DB::table('tmpesan')

			->join('tmpesan_trstspesan', 'tmpesan.id', '=', 'tmpesan_trstspesan.tmpesan_id')
			->join('trstspesan', 'tmpesan_trstspesan.trstspesan_id', '=', 'trstspesan.id')
			->join('tmpesan_trsumber_pesan', 'tmpesan.id', '=', 'tmpesan_trsumber_pesan.tmpesan_id')
			->join('trsumber_pesan', 'trsumber_pesan.id', '=', 'tmpesan_trsumber_pesan.trsumber_pesan_id')

			->select(DB::raw('tmpesan.id, tmpesan.e_pesan_koreksi, tmpesan.e_pesan, tmpesan.c_skpd_tindaklanjut, tmpesan.d_tindak_lanjut, tmpesan.d_tindaklanjut_selesai, tmpesan.e_tindak_lanjut, tmpesan.nama_penanggungjawab, tmpesan.nama, tmpesan.alamat, tmpesan.telp, tmpesan.c_tindak_lanjut, tmpesan.kelurahan, tmpesan.kecamatan, trstspesan.n_sts_pesan, tmpesan.d_entry'))

			// ->where('tmpesan.c_tindak_lanjut', '=', 'Ya')
			// ->where('tmpesan.e_pesan_koreksi', '!=', 'null')
			// ->where('tmpesan.c_sts_setuju', '=', 'Ya')
			// ->orderBy('tmpesan.id')
			->where('tmpesan.id', '=', $id)
			->get();
		}

		public static function fetch_with_tmpesan_trsts_pesan_trsumber_pesan_daftar_balasan($date_start, $date_finish){

			if(!empty($date_start) && !empty($date_finish)){
				return DB::table('tmpesan')

				->join('tmpesan_trstspesan', 'tmpesan.id', '=', 'tmpesan_trstspesan.tmpesan_id')
				->join('trstspesan', 'tmpesan_trstspesan.trstspesan_id', '=', 'trstspesan.id')
				->join('tmpesan_trsumber_pesan', 'tmpesan.id', '=', 'tmpesan_trsumber_pesan.tmpesan_id')
				->join('trsumber_pesan', 'trsumber_pesan.id', '=', 'tmpesan_trsumber_pesan.trsumber_pesan_id')

				->select(DB::raw('tmpesan.id, tmpesan.nama, tmpesan.e_pesan, tmpesan.e_pesan_koreksi,  trsumber_pesan.name, tmpesan.e_tindak_lanjut, tmpesan.c_skpd_tindaklanjut, tmpesan.nama_penanggungjawab'))

				->whereBetween('tmpesan.d_entry', [$date_start, $date_finish])
				->where('tmpesan.c_tindak_lanjut', '=', 'Ya')
				// ->where('tmpesan.e_pesan_koreksi', '!=', 'null')
				->where('tmpesan.c_sts_setuju', '=', 'Ya')
				// ->orderBy('tmpesan.id')
				->get();
			}
			else {
				return DB::table('tmpesan')

				->join('tmpesan_trstspesan', 'tmpesan.id', '=', 'tmpesan_trstspesan.tmpesan_id')
				->join('trstspesan', 'tmpesan_trstspesan.trstspesan_id', '=', 'trstspesan.id')
				->join('tmpesan_trsumber_pesan', 'tmpesan.id', '=', 'tmpesan_trsumber_pesan.tmpesan_id')
				->join('trsumber_pesan', 'trsumber_pesan.id', '=', 'tmpesan_trsumber_pesan.trsumber_pesan_id')

				->select(DB::raw('tmpesan.nama, tmpesan.e_pesan, tmpesan.e_pesan_koreksi,  trsumber_pesan.name, tmpesan.e_tindak_lanjut, tmpesan.c_skpd_tindaklanjut, tmpesan.nama_penanggungjawab'))

				->where('tmpesan.c_tindak_lanjut', '=', 'Ya')
				// ->where('tmpesan.e_pesan_koreksi', '!=', 'null')
				->where('tmpesan.c_sts_setuju', '=', 'Ya')
				// ->orderBy('tmpesan.id')
				->get();
			}
		}



	}