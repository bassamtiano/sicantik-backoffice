<?php

	class Trperizinan extends BaseModel {

		protected $table = 'trperizinan';
		protected $guarded = ['id'];
		protected $fillable = ['n_perizinan,v_hari,v_berlaku_tahun,v_berlaku_satuan,v_perizinan,c_foto,c_berlaku,c_keputusan,c_judul,d_entry'];

		public static function get_id($n_perizinan) {
			return Trperizinan::where('n_perizinan', '=', $n_perizinan)->get(['id']);
		}

		public static function fetch_data($column) {
			return Trperizinan::get($column);
		}

		public static function fetch_data_opsi() {
			return Trperizinan::select('id', 'n_perizinan')
			->get();
		}


		# Modul Reporting ==========================================================================================================================================================================================

		public static function fetch_with_tmpermohonan_for_realisasi_penerimaan() {
			$data_perizinan = DB::table('trperizinan')
			->select(['id', 'n_perizinan', 'v_perizinan'])
			->get();

			return $data_perizinan;
		}

		public static function fetch_with_tmpermohonan_tmbap_for_realisasi_penerimaan($id) {

			$data_ealisasi_pendapatan = DB::table('trperizinan')

			->join('tmpermohonan_trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->join('tmpermohonan', 'tmpermohonan_trperizinan.tmpermohonan_id', '=', 'tmpermohonan.id')

			->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
			->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

			->select(DB::raw('tmpermohonan.id as tmpermohonan_id, tmbap.nilai_bap_awal'))
			->where('trperizinan.id', '=', $id)
			->get();

			return $data_ealisasi_pendapatan;

		}

		public static function fetch_with_tmpermohonan_for_rekapitulasi_pendaftaran() {

			return DB::table('trperizinan')

			->leftjoin('tmpermohonan_trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->leftjoin('tmpermohonan', 'tmpermohonan_trperizinan.tmpermohonan_id', '=', 'tmpermohonan.id')

			->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
			->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

			->select(DB::raw('trperizinan.id, trperizinan.n_perizinan, count(trperizinan.id) as jumlah_perizinan'))
			->groupBy('trperizinan.id')
			->get();
		}

		public static function fetch_with_tmpermohon_for_rekapitulasi_perizinan() {


		}

		public static function fetch_with_trkelompok_perizinan_for_rekapitulasi_retribusi() {
			return DB::table('trperizinan')

			->join('trkelompok_perizinan_trperizinan','trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->join('trkelompok_perizinan','trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

			//->join('tmpermohonan_trperizinan', 'trperizinan.id','=','tmpermohonan_trperizinan.trperizinan_id')
			//->join('tmpermohonan', 'tmpermohonan_trperizinan.tmpermohonan_id', '=' , 'tmpermohonan.id')

			->where('trkelompok_perizinan.id','=', 4)
			->select(['trperizinan.n_perizinan','trperizinan.id'])
			//->groupBy('trperizinan.id')

			->get();
		}

		public static function fetch_with_tmpermohon_for_rekapitulasi_tinjauan_lapangan() {
			return DB::table('trperizinan');
		}

		public static function fetch_with_tmpermohon_for_rekapitulasi_berkas_kembali() {
			return DB::table('trperizinan');
		}

		public static function fetch_with_tmpermohon_for_rekapitulasi_izin_tercetak() {
			return DB::table('trperizinan');

		}

		# Modul Pelayanan ==========================================================================================================================================================================================

		public static function fetch_data_for_customer_service_informasi_perizinan(){
			return Trperizinan::get(['id','n_perizinan','v_hari','v_berlaku_tahun','v_berlaku_satuan']);
		}

		public static function fetch_with_trkelompok_perizinan_by_id_for_customer_service($id) {
			return DB::table('trperizinan')
			->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')
			->select(['trperizinan.id as perizinan_id', 'trperizinan.n_perizinan', 'trkelompok_perizinan.n_kelompok', 'trperizinan.v_hari', 'trperizinan.v_berlaku_tahun', 'trperizinan.v_berlaku_satuan'])
			->where('trperizinan.id', '=', $id)
			->get();
		}


///////////////////////////////////////////////////////////////////////////////////FUNGSI FETCH/////////////////////////////////////////////////////////////
		public static function fetch_with_trkelompok_perizinan() {
			return DB::table('trperizinan')
			->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')
			->orderBy('trperizinan.id')
			->get(['trperizinan.id', 'trperizinan.n_perizinan', 'trkelompok_perizinan.n_kelompok', 'trperizinan.v_hari', 'trperizinan.v_berlaku_tahun', 'trperizinan.v_berlaku_satuan', 'trperizinan.c_foto', 'trperizinan.c_keputusan']);
		}

		public static function fetch_with_trkelompok_perizinan_trsyarat_perizinan() {
		return DB::table('trperizinan')
			->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')
			->join('trperizinan_trsyarat_perizinan', 'trperizinan.id', '=', 'trperizinan_trsyarat_perizinan.trperizinan_id')
			->join('trsyarat_perizinan', 'trsyarat_perizinan.id', '=', 'trperizinan_trsyarat_perizinan.trsyarat_perizinan_id')
			->select(DB::raw('trperizinan.id, trperizinan.n_perizinan, trkelompok_perizinan.n_kelompok, count(trsyarat_perizinan.id) as jumlah_persyaratan'))
			// ->select(DB::raw('trperizinan.id, trperizinan.n_perizinan, trkelompok_perizinan.n_kelompok, trsyarat_perizinan.id as jumlah_persyaratan'))
			->groupBy('trperizinan.id')
			->orderBy('trperizinan.id')
			->get();
		}

		public static function fetch_with_trsyarat_perizinan($id) {
			return DB::table('trperizinan')
			->join('trperizinan_trsyarat_perizinan', 'trperizinan.id', '=', 'trperizinan_trsyarat_perizinan.trperizinan_id')
			->join('trsyarat_perizinan', 'trsyarat_perizinan.id', '=', 'trperizinan_trsyarat_perizinan.trsyarat_perizinan_id')
			->select(DB::raw('trsyarat_perizinan.id, trsyarat_perizinan.v_syarat, trsyarat_perizinan.status, trperizinan_trsyarat_perizinan.c_show_type'))
			->orderBy('trsyarat_perizinan.id')
			->where('trperizinan.id', '=', $id)
			->get();

		}


		public static function fetch_with_trkelompok_perizinan_trproperty() {

			#not finished

			return DB::table('trperizinan')

			->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')
			->join('trperizinan_trproperty', 'trperizinan.id', '=', 'trperizinan_trproperty.trperizinan_id')
			->join('trproperty', 'trperizinan_trproperty.trproperty_id', '=', 'trproperty.id')
			->select(DB::raw('trperizinan.id, trperizinan.n_perizinan, trkelompok_perizinan.n_kelompok, count(trperizinan_trproperty.c_parent) as jumlah_property'))
			// ->select(DB::raw('trperizinan.id, trperizinan.n_perizinan, trkelompok_perizinan.n_kelompok, trproperty.n_property as jumlah_property'))
			->groupBy('trperizinan.id')
			->where(function($query) {
				$query->where('trperizinan_trproperty.c_order', '!=', '0');
			})
			->where('c_parent_order', '!=', '0')
			// ->where('trperizinan_trproperty.c_parent', '=', 'trproperty.c_type')

			// ->where('trperizinan.id', '=', '9')
			->orderBy('trperizinan.id')
			->get();
		}

		public static function fetch_with_trretribusi() {
			return DB::table('trperizinan')
			->join('trperizinan_trretribusi', 'trperizinan.id', '=', 'trperizinan_trretribusi.trperizinan_id')
			->join('trretribusi', 'trperizinan_trretribusi.trretribusi_id', '=', 'trretribusi.id')
			->select(DB::raw('trperizinan.id, trperizinan.n_perizinan, trretribusi.v_retribusi, trretribusi.v_denda, trretribusi.d_sk_terbit, trretribusi.d_sk_berakhir, trretribusi.m_perhitungan'))
			->get();
		}

		public static function fetch_with_trproperty_trkoefisien_retribusi() {

			#not finished

			return DB::table('trperizinan')

			->join('trperizinan_trproperty', 'trperizinan.id', '=', 'trperizinan_trproperty.trperizinan_id')
			->join('trproperty', 'trperizinan_trproperty.trproperty_id', '=', 'trproperty.id')

			->join('trkoefesientarifretribusi_trproperty', 'trproperty.id', '=', 'trkoefesientarifretribusi_trproperty.trproperty_id')
			->join('trkoefesientarifretribusi', 'trkoefesientarifretribusi_trproperty.trkoefesientarifretribusi_id', '=', 'trkoefesientarifretribusi.id')
			->select(DB::raw('trperizinan.id, trperizinan.n_perizinan, trproperty.id'))
			// ->groupBy('trperizinan.id')
			->get();
		}

		public static function fetch_with_trperizinan_trretribusi($id) {
			return DB::table('trperizinan')
			->join('trperizinan_trretribusi', 'trperizinan.id', '=', 'trperizinan_trretribusi.trperizinan_id')
			->join('trretribusi', 'trperizinan_trretribusi.trretribusi_id', '=', 'trretribusi.id')
			->select(DB::raw('trperizinan.id, trperizinan.n_perizinan, trretribusi.m_perhitungan, trretribusi.v_retribusi, trretribusi.v_denda, trretribusi.c_account, trretribusi.d_sk_terbit, trretribusi.d_sk_berakhir'))
			->where('trperizinan.id', '=', $id)
			->get();
		}
		public static function fetch_with_trparalel($id) {
			return DB::table('trperizinan')
			->join('trparalel_trperizinan', 'trperizinan.id', '=', 'trparalel_trperizinan.trperizinan_id')
			->join('trparalel', 'trparalel_trperizinan.trparalel_id', '=', 'trparalel.id')
			->select(DB::raw('trparalel.id, trperizinan.id, trperizinan.n_perizinan'))
			->where('trparalel.id', '=', $id)
			->get();
		}
		public static function fetch_with_trkelompok_perizinan_trunitkerja($id) {

			return DB::table('trperizinan')
			->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

			->join('trperizinan_trunitkerja', 'trperizinan.id', '=', 'trperizinan_trunitkerja.trperizinan_id')
			->join('trunitkerja', 'trperizinan_trunitkerja.trunitkerja_id', '=', 'trunitkerja.id')
			->groupBy('trperizinan.id')
			->select(DB::raw('trperizinan.id, trperizinan.n_perizinan, trperizinan.v_hari, trperizinan.v_berlaku_tahun, trperizinan.v_perizinan, trunitkerja.n_unitkerja, trperizinan.is_open, trkelompok_perizinan.n_kelompok, trperizinan.c_foto, trperizinan.c_keputusan, trperizinan.c_berlaku'))
			->where('trperizinan.id', '=', $id)
			->get();
		}

		public static function fetch_with_trproperty_trperizinan() {

			#not finished

			return DB::table('trperizinan')

			->join('trperizinan_trproperty', 'trperizinan.id', '=', 'trperizinan_trproperty.trperizinan_id')
			->join('trproperty', 'trperizinan_trproperty.trproperty_id', '=', 'trproperty.id')

			// ->join('trkoefesientarifretribusi_trproperty', 'trproperty.id', '=', 'trkoefesientarifretribusi_trproperty.trproperty_id')
			// ->join('trkoefesientarifretribusi', 'trkoefesientarifretribusi_trproperty.trkoefesientarifretribusi_id', '=', 'trkoefesientarifretribusi.id')
			->groupBy('trperizinan.id')
			->select(DB::raw('trperizinan.id, trperizinan.n_perizinan, count(trproperty.id) as jumlah_property'))
			->get();
		}

		public static function fetch_with_trproperty(){

			return DB::table('trproperty')

			->join('trperizinan_trproperty', 'trproperty.id', '=', 'trperizinan_trproperty.trproperty_id')
			->join('trperizinan', 'trperizinan_trproperty.trperizinan_id', '=', 'trperizinan.id')

			->groupBy('trproperty.id')
			->select(DB::raw('trproperty.id, trproperty.n_property, trperizinan_trproperty.c_retribusi_id, trperizinan_trproperty.c_parent, trperizinan_trproperty.c_order, trperizinan_trproperty.c_parent_order, trproperty.c_type'))
			->get();
		}

		public static function fetch_with_trproperty_trkoefisientarifretribusi(){

			return DB::table('trproperty')

			->join('trkoefesientarifretribusi_trproperty', 'trproperty.id', '=', 'trkoefesientarifretribusi_trproperty.trproperty_id')
			->join('trkoefesientarifretribusi', 'trkoefesientarifretribusi_trproperty.trkoefesientarifretribusi_id', '=', 'trkoefesientarifretribusi.id')

			->groupBy('trproperty.id')
			->select(DB::raw('trkoefesientarifretribusi.id, trkoefesientarifretribusi.kategori, trkoefesientarifretribusi.index_kategori, trkoefesientarifretribusi.d_mulai_efektif, trkoefesientarifretribusi.d_selesai, trkoefesientarifretribusi.i_entry, trkoefesientarifretribusi.d_entry'))
			->get();
		}

		public static function fetch_with_tmpermohonan() {

			return DB::table('trperizinan')

			->join('tmpermohonan_trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->join('tmpermohonan', 'tmpermohonan_trperizinan.tmpermohonan_id', '=', 'tmpermohonan.id')

			->join('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
			->join('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

			->groupBy('trperizinan.id')
			->select(DB::raw('trperizinan.n_perizinan, count(tmpermohonan_trstspermohonan.tmpermohonan_id)'))
			->get();

		}

		public static function fetch_with_trkelompok_perizinan_trunitkerja_edit($id) {

			return DB::table('trperizinan')
			->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

			->join('trperizinan_trunitkerja', 'trperizinan.id', '=', 'trperizinan_trunitkerja.trperizinan_id')
			->join('trunitkerja', 'trperizinan_trunitkerja.trunitkerja_id', '=', 'trunitkerja.id')
			->groupBy('trperizinan.id')
			->select(DB::raw('trperizinan.id, trperizinan.n_perizinan, trperizinan.v_hari, trperizinan.v_berlaku_tahun, trperizinan.v_berlaku_satuan, trperizinan.v_perizinan, trkelompok_perizinan.n_kelompok, trunitkerja.n_unitkerja, trperizinan.is_open, trperizinan.c_foto, trperizinan.c_keputusan, trperizinan.c_berlaku'))
			->where('trperizinan.id', '=', $id)
			->get();
		}


//////////////////////////////////////////////////////////////////////////FUNGSI INSERT//////////////////////////////////////////////////////////////////////////

		public static function insert_data($data) {
			Trperizinan::create($data);
			return $this->get_id($n_perizinan);
		}

		# Modul Portal =============================================================================================================================================================================================

		public static function fetch_for_portal_by_id($id) {
			return DB::table('trperizinan')

			->join('trperizinan_trsyarat_perizinan', 'trperizinan.id', '=', 'trperizinan_trsyarat_perizinan.trperizinan_id')
			->join('trsyarat_perizinan', 'trperizinan_trsyarat_perizinan.trsyarat_perizinan_id', '=', 'trsyarat_perizinan.id')
			->where('trperizinan.id', '=', $id)
			->get();
		}







	}
