<?php

	class Tmpermohonan extends BaseModel {

		protected $table = "tmpermohonan";
		protected $guarded = ['id'];
		protected $fillable = ['pendaftaran_id', 'd_terima_berkas', 'd_survey', 'd_selesai_proses', 'd_bukti', 'd_tahun', 'd_berlaku_izin', 'd_berlaku_keputusan', 'd_ambil_izin', 'd_izin_dicabut', 'i_urut', 'a_izin', 'c_paralel', 'c_pendaftaran', 'c_tinjauan', 'c_izin_selesai', 'c_izin_dicabut', 'id_lama', 'id_lama', 'd_perubahan', 'd_perpanjangan', 'd_daftarulang', 'i_entry', 'd_entry', 'c_status_bayar', 'no_akta', 'd_akta', 'notaris', 'd_ajuan_cabut', 'ket_cabut', 'nip_ttd', 'nama_ttd', 'file_ttd', 'keterangan'];

		public static function get_test() {

			return tmpermohonan::all();

		}

		public static function fetch_with_trperizinan_trkelompok_perizinan_tmbap_tmkeringanan_retribusi() {

			#not finished

			return DB::table('tmpermohonan')
			->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')
			->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

			->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
			->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

			->join('tmkeringananretribusi_tmpermohonan', 'tmpermohonan.id', '=', 'tmkeringananretribusi_tmpermohonan.tmpermohonan_id')
			->join('tmkeringananretribusi', 'tmkeringananretribusi_tmpermohonan.tmkeringananretribusi_id', '=', 'tmkeringananretribusi.id')

			->select(DB::raw('trperizinan.n_perizinan'))

			->get();

		}

		# Modul Reporting ==========================================================================================================================================================================================

		public static function fetch_with_tmkeringananretribusi_for_realisasi_penerimaan($id, $date_start, $date_finish) {
			return DB::table('tmpermohonan')
			->join('tmkeringananretribusi_tmpermohonan', 'tmpermohonan.id', '=', 'tmkeringananretribusi_tmpermohonan.tmpermohonan_id')
			->join('tmkeringananretribusi', 'tmkeringananretribusi_tmpermohonan.tmkeringananretribusi_id', '=', 'tmkeringananretribusi.id')
			->whereBetween('d_terima_berkas', [$date_start, $date_finish])
			->where('tmpermohonan.id', '=', $id)
			->select(['v_prosentase_retribusi'])
			->get();
		}

		public static function fetch_with_tmkeringananretribusi_for_rekapitulasi_retribusi($id) {
			return DB::table('tmpermohonan')
			->join('tmkeringananretribusi_tmpermohonan', 'tmpermohonan.id', '=', 'tmkeringananretribusi_tmpermohonan.tmpermohonan_id')
			->join('tmkeringananretribusi', 'tmkeringananretribusi_tmpermohonan.tmkeringananretribusi_id', '=', 'tmkeringananretribusi.id')
			->where('tmpermohonan.id', '=', $id)
			->select(['v_prosentase_retribusi'])
			->get();
		}
public static function fetch_trperizinan_for_rekapitulasi_pendaftaran($id, $date_start, $date_finish){
			if (!empty($date_start) && !empty($date_finish) && !empty($id)) {
			return DB::table('trperizinan')
			->join('tmpermohonan_trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->join('tmpermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
			->join('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')
			->where('trstspermohonan.id','!=', 1)
			->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
			->where('trperizinan.id', '=', $id)
			->select(DB::raw('count(tmpermohonan.id) as total_perizinan'))
			->get();
			}
			else {
			return DB::table('trperizinan')
			->join('tmpermohonan_trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->join('tmpermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
			->join('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')
			->where('trstspermohonan.id','!=', 1)
			->select(DB::raw('count(tmpermohonan.id) as total_perizinan'))
			->get();
			}
		}

		public static function fetch_with_trperizinan_trstspermohonan_for_rekapitulasi_pendaftaran_detail($id, $date_start, $date_finish){
			return DB::table('trperizinan')
			->join('tmpermohonan_trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->join('tmpermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')

			->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->join('tmpemohon', 'tmpemohon.id', '=', 'tmpemohon_tmpermohonan.tmpemohon_id')

			->leftjoin('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
			->leftjoin('tmperusahaan', 'tmperusahaan.id', '=', 'tmpermohonan_tmperusahaan.tmperusahaan_id')

			->join('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
			->join('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

			->where('trstspermohonan.id','!=', 1)
			->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
			->where('trperizinan.id', '=', $id)
			->select(['tmpemohon.n_pemohon','tmpermohonan.pendaftaran_id','tmpermohonan.d_terima_berkas','trstspermohonan.n_sts_permohonan', 'trperizinan.n_perizinan', 'tmperusahaan.n_perusahaan'])
			->get();
		}

public static function fetch_with_tmbap_trperizinan_for_rekapitulasi_retribusi($id,$date_start,$date_finish){
				return DB::table('trperizinan')
			->join('tmpermohonan_trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->join('tmpermohonan','tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')

			->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
			->join('tmbap', 'tmbap.id', '=', 'tmbap_tmpermohonan.tmbap_id')

			//->join('tmkeringananretribusi_tmpermohonan', 'tmpermohonan.id', '=', 'tmkeringananretribusi_tmpermohonan.tmpermohonan_id')
			//->join('tmkeringananretribusi','tmkeringananretribusi.id','=','tmkeringananretribusi_tmpermohonan.tmkeringananretribusi_id')

			->where('tmbap.c_penetapan', '=' ,1)
			->where('tmbap.status_bap','=',1)
			->whereBetween('tmpermohonan.d_terima_berkas',[$date_start,$date_finish])
			->where('trperizinan.id','=',$id)
			->select(DB::raw('round(sum(tmbap.nilai_retribusi)) as bayar,count(tmpermohonan.id) as izin_jadi'))
			->get();
		}

		public static function fetch_with_tmpermohonan_trperizinan_bayar_for_rekapitulasi_retribusi($id,$date_start,$date_finish){
			if (!empty($date_start) && !empty($date_finish) && !empty($id)){
			return DB::table('trperizinan')
			->join('tmpermohonan_trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->join('tmpermohonan','tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')

			->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
			->join('tmbap', 'tmbap.id', '=', 'tmbap_tmpermohonan.tmbap_id')

			//->join('tmkeringananretribusi_tmpermohonan', 'tmpermohonan.id', '=', 'tmkeringananretribusi_tmpermohonan.tmpermohonan_id')
			//->join('tmkeringananretribusi','tmkeringananretribusi.id','=','tmkeringananretribusi_tmpermohonan.tmkeringananretribusi_id')

			->where('tmbap.c_penetapan', '=' ,1)
			->where('tmbap.status_bap','=',1)
			->whereBetween('tmpermohonan.d_terima_berkas',[$date_start,$date_finish])
			->where('trperizinan.id','=',$id)
			->where('tmpermohonan.c_status_bayar','=',1)
			->select(DB::raw('sum(ifnull(tmbap.nilai_retribusi,0)) as retribusi'))
			->get();
			}
			else{
			return DB::table('trperizinan')
			->join('tmpermohonan_trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->join('tmpermohonan','tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')

			->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
			->join('tmbap', 'tmbap.id', '=', 'tmbap_tmpermohonan.tmbap_id')

			//->join('tmkeringananretribusi_tmpermohonan', 'tmpermohonan.id', '=', 'tmkeringananretribusi_tmpermohonan.tmpermohonan_id')
			//->join('tmkeringananretribusi','tmkeringananretribusi.id','=','tmkeringananretribusi_tmpermohonan.tmkeringananretribusi_id')

			->where('tmbap.c_penetapan', '=' ,1)
			->where('tmbap.status_bap','=',1)
			->where('tmpermohonan.c_status_bayar','=',1)
			->select(DB::raw('sum(ifnull(tmbap.nilai_retribusi,0)) as retribusi'))
			->get();
			}

		}

		public static function fetch_with_tmpemohon_trperizinan_tmperusahaan_for_rekapitulasi_tinjauan_lapangan($tanggal_awal, $tanggal_akhir) {
			if(!empty($tanggal_awal) && !empty($tanggal_akhir)) {
				return DB::table('tmpermohonan')

				->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
				->leftjoin('tmperusahaan', 'tmpermohonan_tmperusahaan.tmperusahaan_id', '=', 'tmperusahaan.id')

				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_tinjauan', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->whereBetween('tmpermohonan.d_terima_berkas', [$tanggal_awal, $tanggal_akhir])
				->orderBy('tmpermohonan.id', 'desc')
				->select(['tmpermohonan.pendaftaran_id', 'tmpermohonan.d_terima_berkas', 'tmpermohonan.d_survey', 'tmpemohon.n_pemohon', 'tmpemohon.a_pemohon', 'trperizinan.n_perizinan', 'tmperusahaan.n_perusahaan', 'tmpermohonan.a_izin'])
				->get();

			}
			else {
				return DB::table('tmpermohonan')

				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
				->join('tmperusahaan', 'tmpermohonan_tmperusahaan.tmperusahaan_id', '=', 'tmperusahaan.id')

				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_tinjauan', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')

				->select(['tmpermohonan.pendaftaran_id', 'tmpermohonan.d_terima_berkas', 'tmpermohonan.d_survey', 'tmpemohon.n_pemohon', 'tmpemohon.a_pemohon', 'trperizinan.n_perizinan', 'tmperusahaan.n_perusahaan', 'tmpermohonan.a_izin'])
				->get();
			}
		}

		public static function fetch_with_tmpemohon_tmperizinan_tmbap_for_rekapitulasi_berkas_kembali($tanggal_awal, $tanggal_akhir) {

			if(!empty($tanggal_awal) && !empty($tanggal_akhir)) {
				return DB::table('tmpermohonan')

				->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
				->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

				->join('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
				->join('trkecamatan', 'trkecamatan.id', '=', 'trkecamatan_trkelurahan.trkecamatan_id')

				->join('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
				->join('trkabupaten', 'trkabupaten.id', '=', 'trkabupaten_trkecamatan.trkabupaten_id')

				->join('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
				->join('trpropinsi', 'trpropinsi.id', '=', 'trkabupaten_trpropinsi.trpropinsi_id')

				->join('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
				->join('tmperusahaan', 'tmpermohonan_tmperusahaan.tmperusahaan_id', '=', 'tmperusahaan.id')

				->leftjoin('tmperusahaan_trkelurahan', 'tmperusahaan.id', '=', 'tmperusahaan_trkelurahan.tmperusahaan_id')
				->leftjoin('trkelurahan as perusahaan_kelurahan', 'perusahaan_kelurahan.id', '=', 'tmperusahaan_trkelurahan.trkelurahan_id')

				// ->join('trkecamatan_trkelurahan as trkecamatan_trkelurahan_perusahaan', 'perusahaan_kelurahan.id', '=', 'trkecamatan_trkelurahan_perusahaan.trkelurahan_id')
				// ->join('trkecamatan as perusahaan_kecamatan', 'perusahaan_kecamatan.id', '=', 'trkecamatan_trkelurahan_perusahaan.trkecamatan_id')
				//
				// ->join('trkabupaten_trkecamatan as trkabupaten_trkecamatan_perusahaan', 'perusahaan_kecamatan.id', '=', 'trkabupaten_trkecamatan_perusahaan.trkecamatan_id')
				// ->join('trkabupaten as perusahaan_kabupaten', 'perusahaan_kabupaten.id', '=', 'trkabupaten_trkecamatan_perusahaan.trkabupaten_id')
				//
				// ->join('trkabupaten_trpropinsi as trkabupaten_trpropinsi_perusahaan', 'perusahaan_kabupaten.id', '=', 'trkabupaten_trpropinsi_perusahaan.trkabupaten_id')
				// ->join('trpropinsi as perusahaan_propinsi', 'perusahaan_propinsi.id', '=', 'trkabupaten_trpropinsi_perusahaan.trpropinsi_id')

				->where('tmpermohonan.c_izin_selesai', '=', 1)
				->where('tmbap.status_bap', '=', 2)
				->where('tmpermohonan.c_izin_dicabut', '=', 0)
				->whereBetween('tmpermohonan.d_terima_berkas', [$tanggal_awal, $tanggal_akhir])
				->orderBy('tmpermohonan.d_terima_berkas')
				->groupBy('tmpermohonan.pendaftaran_id')

				->select(['tmpermohonan.id', 'tmpermohonan.pendaftaran_id', 'tmpermohonan.d_survey', 'tmpemohon.n_pemohon', 'tmpemohon.a_pemohon', 'trkelurahan.n_kelurahan as pemohon_kelurahan',  'trkecamatan.n_kecamatan as pemohon_kecamatan',  'trkabupaten.n_kabupaten as pemohon_kabupaten', 'trpropinsi.n_propinsi as pemohon_propinsi', 'tmperusahaan.n_perusahaan', 'tmpermohonan.a_izin', 'tmpermohonan.d_terima_berkas', 'tmpermohonan.a_izin', 'tmpermohonan.d_ambil_izin', 'tmbap.c_pesan','trperizinan.n_perizinan'])

				->get();
			}

			else {
				return DB::table('tmpermohonan')

				->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
				->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

				->join('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
				->join('trkecamatan', 'trkecamatan.id', '=', 'trkecamatan_trkelurahan.trkecamatan_id')

				->join('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
				->join('trkabupaten', 'trkabupaten.id', '=', 'trkabupaten_trkecamatan.trkabupaten_id')

				->join('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
				->join('trpropinsi', 'trpropinsi.id', '=', 'trkabupaten_trpropinsi.trpropinsi_id')

				->join('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
				->join('tmperusahaan', 'tmpermohonan_tmperusahaan.tmperusahaan_id', '=', 'tmperusahaan.id')

				->leftjoin('tmperusahaan_trkelurahan', 'tmperusahaan.id', '=', 'tmperusahaan_trkelurahan.tmperusahaan_id')
				->leftjoin('trkelurahan as perusahaan_kelurahan', 'perusahaan_kelurahan.id', '=', 'tmperusahaan_trkelurahan.trkelurahan_id')

				// ->join('trkecamatan_trkelurahan as trkecamatan_trkelurahan_perusahaan', 'perusahaan_kelurahan.id', '=', 'trkecamatan_trkelurahan_perusahaan.trkelurahan_id')
				// ->join('trkecamatan as perusahaan_kecamatan', 'perusahaan_kecamatan.id', '=', 'trkecamatan_trkelurahan_perusahaan.trkecamatan_id')
				//
				// ->join('trkabupaten_trkecamatan as trkabupaten_trkecamatan_perusahaan', 'perusahaan_kecamatan.id', '=', 'trkabupaten_trkecamatan_perusahaan.trkecamatan_id')
				// ->join('trkabupaten as perusahaan_kabupaten', 'perusahaan_kabupaten.id', '=', 'trkabupaten_trkecamatan_perusahaan.trkabupaten_id')
				//
				// ->join('trkabupaten_trpropinsi as trkabupaten_trpropinsi_perusahaan', 'perusahaan_kabupaten.id', '=', 'trkabupaten_trpropinsi_perusahaan.trkabupaten_id')
				// ->join('trpropinsi as perusahaan_propinsi', 'perusahaan_propinsi.id', '=', 'trkabupaten_trpropinsi_perusahaan.trpropinsi_id')

				->where('tmpermohonan.c_izin_selesai', '=', 1)
				->where('tmbap.status_bap', '=', 2)
				->where('tmpermohonan.c_izin_dicabut', '=', 0)
				->orderBy('tmpermohonan.d_terima_berkas', 'desc')

				->select(['tmpermohonan.id', 'tmpermohonan.pendaftaran_id', 'tmpermohonan.d_survey', 'tmpemohon.n_pemohon', 'tmpemohon.a_pemohon', 'trkelurahan.n_kelurahan as pemohon_kelurahan',  'trkecamatan.n_kecamatan as pemohon_kecamatan',  'trkabupaten.n_kabupaten as pemohon_kabupaten', 'trpropinsi.n_propinsi as pemohon_propinsi', 'tmperusahaan.n_perusahaan', 'tmpermohonan.a_izin', 'tmpermohonan.d_terima_berkas', 'tmpermohonan.a_izin', 'tmpermohonan.d_ambil_izin', 'tmbap.c_pesan','trperizinan.n_perizinan'])

				->get();
			}

		}

		public static function fetch_with_tmpemohon_tmperusahaan_tmperizinan_for_rekapitulasi_izin_cetak($tanggal_awal, $tanggal_akhir) {
			if(!empty($tanggal_awal) && !empty($tanggal_akhir)) {
				return DB::table('tmpermohonan')

				->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->leftjoin('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
				->leftjoin('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

				->leftjoin('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
				->leftjoin('tmperusahaan', 'tmpermohonan_tmperusahaan.tmperusahaan_id', '=', 'tmperusahaan.id')

				->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->where('tmbap.c_penetapan', '=', 1)
				->where('tmbap.status_bap', '=', 1)
				->where('tmpermohonan.c_izin_dicabut', '=', 0)
				->whereBetween('tmpermohonan.d_terima_berkas', [$tanggal_awal, $tanggal_akhir])

				->orderBy('tmpermohonan.id','desc')

				->select(['tmpermohonan.pendaftaran_id', 'tmpermohonan.d_survey as tanggal_peninjauan', 'tmsk.tgl_surat as tanggal_penetapan', 'tmpemohon.n_pemohon', 'tmpemohon.a_pemohon', 'tmperusahaan.n_perusahaan', 'tmpermohonan.a_izin', 'tmsk.c_cetak', 'trperizinan.n_perizinan'])
				->get();

			}

			else {
				return DB::table('tmpermohonan')

				->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->leftjoin('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
				->leftjoin('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

				->leftjoin('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
				->leftjoin('tmperusahaan', 'tmpermohonan_tmperusahaan.tmperusahaan_id', '=', 'tmperusahaan.id')

				->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->where('tmbap.c_penetapan', '=', 1)
				->where('tmbap.status_bap', '=', 1)
				->where('tmpermohonan.c_izin_dicabut', '=', 0)

				->orderBy('tmpermohonan.id', 'desc')

				->select(['tmpermohonan.pendaftaran_id', 'tmpermohonan.d_survey as tanggal_peninjauan', 'tmsk.tgl_surat as tanggal_penetapan', 'tmpemohon.n_pemohon', 'tmpemohon.a_pemohon', 'tmperusahaan.n_perusahaan', 'tmpermohonan.a_izin', 'tmsk.c_cetak', 'trperizinan.n_perizinan'])
				->get();

			}


		}

		public static function fetch_with_trperizinan_trstspermohonan_for_rekapitulasi_perizinan_jumlah_proses($id_perizinan, $date_start, $date_finish) {
			/*disini */

			if(isset($date_start) && isset($date_start)) {
				return DB::table('tmpermohonan')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				// ->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
				->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				// ->whereBetween('tmpermohonan.d_terima_berkas', ['2013-11-16', '2013-11-20'])

				->where('tmpermohonan_trperizinan.trperizinan_id', '=', $id_perizinan)
				->where('tmbap.c_penetapan', '=', '1')
				->where('trstspermohonan.id', '<>', '1')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])

				->select(['tmpermohonan_trperizinan.id','tmpermohonan.id as id_permohonan', 'tmpermohonan.c_izin_selesai', 'tmbap.c_penetapan', 'tmbap.status_bap'])
				->get();
			}

			else {
				return DB::table('tmpermohonan')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				// ->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
				->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				// ->whereBetween('tmpermohonan.d_terima_berkas', ['2013-11-16', '2013-11-20'])

				->where('tmpermohonan_trperizinan.trperizinan_id', '=', $id_perizinan)
				->where('tmbap.c_penetapan', '=', '1')
				->where('trstspermohonan.id', '<>', '1')

				->select(['tmpermohonan_trperizinan.id','tmpermohonan.id as id_permohonan', 'tmpermohonan.c_izin_selesai', 'tmbap.c_penetapan', 'tmbap.status_bap'])
				->get();
			}


		}

		public static function fetch_with_trperzinan_trstspermohonan_for_rekapitulasi_perizinan_jumlah_masuk($id_perizinan) {
			return DB::table('tmpermohonan')

			->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
			->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

			// ->whereBetween('tmpermohonan.d_terima_berkas', ['2013-11-16', '2013-11-20'])

			->where('tmpermohonan_trperizinan.trperizinan_id', '=', $id_perizinan)
			->where('trstspermohonan.id', '<>', '1')

			->select(DB::raw('count(tmpermohonan_trperizinan.tmpermohonan_id) as jumlah_masuk'))
			->get();

		}

		# Modul Monitoring =========================================================================================================================================================================================

		public static function fetch_with_tmpermohonan_trperizinan_tmpemohon_trstspermohonan_trkelurahan_tmbap_for_per_jenis_perizinan($date_start, $date_finish, $id) {

			if(!empty($date_start) && !empty($date_finish) && !empty($id)) {
				return DB::table('tmpermohonan')

				->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
				->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

				->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
				->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, trstspermohonan.n_sts_permohonan, tmpemohon.a_pemohon, trkelurahan.n_kelurahan, tmbap.nilai_bap_awal'))
				->where('trperizinan.id', '=', $id)
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->get();
			}
			else {
				return DB::table('tmpermohonan')

				->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
				->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

				->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
				->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, trstspermohonan.n_sts_permohonan, tmpemohon.a_pemohon, trkelurahan.n_kelurahan, tmbap.nilai_bap_awal'))
				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->get();
			}
		}

		public static function fetch_with_tmpermohonan_trperizinan_tmpemohon_trstspermohonan_trkelurahan_tmbap_filterby_jangka_waktu($date_start, $date_finish) {
			if(!empty($date_start) && !empty($date_finish)){
				return DB::table('tmpermohonan')
				->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
				->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

				->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
				->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')


				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, trstspermohonan.n_sts_permohonan, tmpemohon.a_pemohon, trkelurahan.n_kelurahan'))
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->groupBy('tmpermohonan.pendaftaran_id')
				->get();
			}
			else {
				return DB::table('tmpermohonan')
				->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
				->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

				->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
				->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')
				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, trstspermohonan.n_sts_permohonan, tmpemohon.a_pemohon, trkelurahan.n_kelurahan'))
				->groupBy('tmpermohonan.pendaftaran_id')
				->get();
			}
		}


		public static function fetch_with_tmpermohonan_trperizinan_tmpemohon_trstspermohonan_trkelurahan_tmbap_filterby_jangka_waktu_for_per_jangka_waktu($data) {

			return DB::table('tmpermohonan')

			->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

			->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
			->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

			->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')


			->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, trstspermohonan.n_sts_permohonan, tmpemohon.a_pemohon, trkelurahan.n_kelurahan'))
			->whereBetween('tmpermohonan.d_terima_berkas', [$data['date_start'], $data['date_finish']])
			->orderBy('tmpermohonan.id')
			->get();
		}

		public static function fetch_with_tmpermohonan_trperizinan_tmpemohon_trstspermohonan_trkelurahan_tmbap_filterby_wilayah_for_per_desa_dan_kecamatan($prop,$kab,$kec,$kel,$date_start,$date_finish) {

			if(!empty($prop) && !empty($kab) && !empty($kec) && !empty($kel) && !empty($date_start) && !empty($date_finish)){
			return DB::table('tmpermohonan')

			->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

			->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
			->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

			->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

			->join('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
			->join('trkecamatan', 'trkecamatan.id', '=', 'trkecamatan_trkelurahan.trkecamatan_id')

			->join('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->join('trkabupaten', 'trkabupaten.id', '=', 'trkabupaten_trkecamatan.trkabupaten_id')

			->join('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->join('trpropinsi', 'trpropinsi.id', '=', 'trkabupaten_trpropinsi.trpropinsi_id')


			->select(DB::raw('trkelurahan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, trstspermohonan.n_sts_permohonan, tmpemohon.a_pemohon, trkelurahan.n_kelurahan'))
			->where('trpropinsi.id', '=', $prop)
			->where('trkabupaten.id', '=', $kab)
			->where('trkecamatan.id', '=', $kec)
			->where('trkelurahan.id', '=', $kel)
			->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
			->orderBy('trkelurahan.id')
			->get();
			}
			else{
			return DB::table('tmpermohonan')

			->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

			->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
			->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

			->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

			->join('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
			->join('trkecamatan', 'trkecamatan.id', '=', 'trkecamatan_trkelurahan.trkecamatan_id')

			->join('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->join('trkabupaten', 'trkabupaten.id', '=', 'trkabupaten_trkecamatan.trkabupaten_id')

			->join('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->join('trpropinsi', 'trpropinsi.id', '=', 'trkabupaten_trpropinsi.trpropinsi_id')


			->select(DB::raw('trkelurahan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, trstspermohonan.n_sts_permohonan, tmpemohon.a_pemohon, trkelurahan.n_kelurahan'))
			->orderBy('trkelurahan.id')
			->get();

			}
		}
		public static function fetch_combo() {
				return DB::table('trstspermohonan')

				->select(DB::raw('trstspermohonan.id, trstspermohonan.n_sts_permohonan'))
				->orderBy('trstspermohonan.id')
				->get();

			}

		public static function fetch_with_tmpermohonan_trperizinan_tmpemohon_trstspermohonan_trkelurahan_tmbap_filterby_status_for_perizinan_belum_sudah_jadi_kadaluarsa($dt, $date_start, $date_finish) {

			if (!empty($dt) && !empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')

				->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
				->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

				->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
				->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, trstspermohonan.n_sts_permohonan, tmpemohon.a_pemohon, trkelurahan.n_kelurahan'))
				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_izin_selesai', '=', $dt)
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->get();
				}
			else {
				return DB::table('tmpermohonan')

				->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
				->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

				->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
				->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, trstspermohonan.n_sts_permohonan, tmpemohon.a_pemohon, trkelurahan.n_kelurahan'))
				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->get();
			}

		}

		public static function fetch_with_trstspermohonan_tmpemohon_trperizinan_trkelurahan_filterby_status_perizinan_for_per_status_perizinan($id, $date_start, $date_finish) {

			if(!empty($id) && !empty($date_start) && !empty($date_finish)) {

			return DB::table('tmpermohonan')

			->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon', 'tmpemohon.id', '=', 'tmpemohon_tmpermohonan.tmpemohon_id')

			->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
			->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

			->select(DB::raw('trstspermohonan.id, tmpermohonan.d_terima_berkas as periode_awal, tmpermohonan.d_terima_berkas as periode_akhir, trstspermohonan.n_sts_permohonan, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, trstspermohonan.n_sts_permohonan, tmpemohon.a_pemohon, trkelurahan.n_kelurahan'))
			->where('trstspermohonan.id', '=', [$id])
			->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
			->orderBy('trstspermohonan.id')
			->get();
		}

		else {

			return DB::table('tmpermohonan')

			->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon', 'tmpemohon.id', '=', 'tmpemohon_tmpermohonan.tmpemohon_id')

			->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
			->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

			->select(DB::raw('trstspermohonan.id, tmpermohonan.d_terima_berkas as periode_awal, tmpermohonan.d_terima_berkas as periode_akhir, trstspermohonan.n_sts_permohonan, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, trstspermohonan.n_sts_permohonan, tmpemohon.a_pemohon, trkelurahan.n_kelurahan'))
			->orderBy('trstspermohonan.id')
			->get();
		}
	}

		public static function fetch_with_trstspermohonan_tmpemohon_trperizinan_trkelurahan_filterby_nama_pemohon_for_per_nama_pemohon($n_pemohon, $date_start, $date_finish) {

			if(!empty($n_pemohon) && !empty($date_start) && !empty($date_finish)) {

			return DB::table('tmpermohonan')

			->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon', 'tmpemohon.id', '=', 'tmpemohon_tmpermohonan.tmpemohon_id')

			->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
			->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

			->select(DB::raw('tmpemohon.id, tmpermohonan.d_terima_berkas as periode_awal, tmpermohonan.d_terima_berkas as periode_akhir, trstspermohonan.n_sts_permohonan, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, trstspermohonan.n_sts_permohonan, tmpemohon.a_pemohon, trkelurahan.n_kelurahan'))
			->where('tmpemohon.n_pemohon', 'LIKE', '%'.$n_pemohon.'%' )
			->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
			->orderBy('tmpemohon.n_pemohon')
			->get();
		}
		 else {
		 	return DB::table('tmpermohonan')

			->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon', 'tmpemohon.id', '=', 'tmpemohon_tmpermohonan.tmpemohon_id')

			->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
			->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

			->select(DB::raw('tmpemohon.id, tmpermohonan.d_terima_berkas as periode_awal, tmpermohonan.d_terima_berkas as periode_akhir, trstspermohonan.n_sts_permohonan, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, trstspermohonan.n_sts_permohonan, tmpemohon.a_pemohon, trkelurahan.n_kelurahan'))
			->orderBy('tmpemohon.n_pemohon')
			->get();
		 }
		}

		public static function fetch_with_trstspermohonan_tmperusahaan_trperizinan_trkelurahan_for_per_nama_perusahaan($nm, $date_start, $date_finish) {
			if(!empty($date_start) && !empty($date_finish) && !empty($nm)){
				return DB::table('tmpermohonan')

				->leftjoin('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
				->leftjoin('tmperusahaan', 'tmperusahaan.id', '=', 'tmpermohonan_tmperusahaan.tmperusahaan_id')

				->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
				->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

				->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmperusahaan_trkelurahan', 'tmperusahaan.id', '=', 'tmperusahaan_trkelurahan.tmperusahaan_id')
				->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmperusahaan_trkelurahan.trkelurahan_id')

				->select(DB::raw('tmperusahaan.id, tmpermohonan.d_terima_berkas as periode_awal, tmpermohonan.d_terima_berkas as periode_akhir, trstspermohonan.n_sts_permohonan, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmperusahaan.n_perusahaan, trstspermohonan.n_sts_permohonan, tmperusahaan.a_perusahaan, trkelurahan.n_kelurahan'))
				->where('tmperusahaan.n_perusahaan', 'LIKE', '%'.$nm.'%')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->groupBy('tmpermohonan.pendaftaran_id')
				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->get();
				}
			else{
				return DB::table('tmpermohonan')
				->leftjoin('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
				->leftjoin('tmperusahaan', 'tmperusahaan.id', '=', 'tmpermohonan_tmperusahaan.tmperusahaan_id')

				->leftjoin('tmpermohonan_trstspermohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trstspermohonan.tmpermohonan_id')
				->leftjoin('trstspermohonan', 'tmpermohonan_trstspermohonan.trstspermohonan_id', '=', 'trstspermohonan.id')

				->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->leftjoin('tmperusahaan_trkelurahan', 'tmperusahaan.id', '=', 'tmperusahaan_trkelurahan.tmperusahaan_id')
				->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmperusahaan_trkelurahan.trkelurahan_id')

				->select(DB::raw('tmperusahaan.id, tmpermohonan.d_terima_berkas as periode_awal, tmpermohonan.d_terima_berkas as periode_akhir, trstspermohonan.n_sts_permohonan, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmperusahaan.n_perusahaan, trstspermohonan.n_sts_permohonan, tmperusahaan.a_perusahaan, trkelurahan.n_kelurahan'))
				->groupBy('tmpermohonan.pendaftaran_id')
				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->get();
			}

		}

		public static function fetch_with_tmpemohon_trperizinan_trkelurahan_filterby_bulan_pengambilan_izin_for_per_bulan_pengambilan_izin($data) {
			return DB::table('tmpermohonan')

			->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->join('tmpemohon', 'tmpemohon.id', '=', 'tmpemohon_tmpermohonan.tmpemohon_id')

			->join('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
			->join('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

			->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->join('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->join('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

			->select(DB::raw('trperizinan.id, tmpermohonan.d_terima_berkas as periode_awal, tmpermohonan.d_terima_berkas as periode_akhir, tmpermohonan.pendaftaran_id, trperizinan.id as trperizinan_id, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmpemohon.n_pemohon, tmsk.no_surat, tmsk.tgl_surat, tmpemohon.a_pemohon, trkelurahan.n_kelurahan'))
			->where('trperizinan.id', '=', $data['id'])
			->where('c_pendaftaran', '=', 1)
			->where('c_tinjauan', '=', 1)
			->where('c_izin_selesai', '=', 1)
			->whereBetween('tmpermohonan.d_terima_berkas', [$data['date_start'], $data['date_finish']])
			->orderBy('trperizinan.id')
			->get();
		}

		# Modul Pelayanan ==========================================================================================================================================================================================

		public static function fetch_with_tmpemohon_sementara_tmpermohonan_for_pendaftaran_permohonan_sementara(){
			return DB::table('tmpermohonan')
			->join('tmpemohon_sementara_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_sementara_tmpermohonan.tmpermohonan_id')
			->join('tmpemohon_sementara', 'tmpemohon_sementara_tmpermohonan.tmpemohon_sementara_id', '=', 'tmpemohon_sementara.id')
			->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon_sementara.no_referensi, tmpemohon_sementara.n_pemohon, trperizinan.n_perizinan, tmpemohon_sementara.a_pemohon, tmpermohonan.d_terima_berkas'))
			->where('tmpermohonan.c_pendaftaran', '=', '2')
			->groupBy('tmpermohonan.id')
			->orderBy('tmpermohonan.id')
			->get();
		}

		public static function fetch_with_tmpemohon_tmpermohonan(){

			return DB::table('tmpermohonan')

			->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')
			->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
			->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

			->select(DB::raw('tmpermohonan.id, tmpermohonan.c_paralel, tmpermohonan.pendaftaran_id, tmpemohon.no_referensi, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, trjenis_permohonan.n_permohonan'))

			->where('tmpermohonan.c_pendaftaran','=', '0')
			->where('trjenis_permohonan.id','=', '1')
			// ->groupBy('tmpemohon.id')
			->orderBy('tmpermohonan.id')
			->groupBy('tmpermohonan.id')
			->get();

		}

		public static function fetch_with_tmpermohonan_perubahan_izin_for_pendaftaran_perubahan_izin(){

			return DB::table('tmpermohonan')

			->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')
			->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
			->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

			->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpemohon.n_pemohon, tmpemohon.a_pemohon'))
			->where('tmpermohonan.d_perubahan','!=', 'null')
			->where('tmpermohonan.c_pendaftaran','=', '0')
			->orderBy('tmpermohonan.id')
			->get();
		}

		public static function fetch_with_tmpermohonan_perpanjangan_izin_for_pendaftaran_perpanjangan_izin(){

			return DB::table('tmpermohonan')

			->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')
			->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
			->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

			->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpemohon.n_pemohon, tmpemohon.a_pemohon'))
			->where('tmpermohonan.d_perpanjangan','!=', 'null')
			->where('tmpermohonan.c_pendaftaran','=', '0')
			// ->groupBy('tmpermohonan.id')
			->orderBy('tmpermohonan.id')
			->get();
		}

		public static function fetch_with_tmpermohonan_daftar_ulang_izin_for_pendaftaran_daftar_ulang_izin(){

			return DB::table('tmpermohonan')

			->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')
			->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan', 'trperizinan.id', '=', 'tmpermohonan_trperizinan.trperizinan_id')
			->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
			->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

			->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpemohon.n_pemohon, tmpemohon.a_pemohon'))
			->where('tmpermohonan.d_daftarulang','!=', 'null')
			->where('tmpermohonan.c_pendaftaran','=', '0')
			// ->groupBy('tmpemohon.id')
			->orderBy('tmpermohonan.id')
			->get();
		}

		public static function fetch_with_tmpemohon_for_permohonan_sementara_edit_data($tmpermohonan_id) {

			return DB::table('tmpermohonan')

			->leftjoin('tmpemohon_sementara_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_sementara_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon_sementara', 'tmpemohon_sementara_tmpermohonan.tmpemohon_sementara_id', '=', 'tmpemohon_sementara.id')

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->leftjoin('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

			->leftjoin('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
			->leftjoin('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

			->leftjoin('tmpemohon_sementara_trkelurahan', 'tmpemohon_sementara.id', '=', 'tmpemohon_sementara_trkelurahan.tmpemohon_sementara_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_sementara_trkelurahan.trkelurahan_id')

			->leftjoin('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
			->leftjoin('trkecamatan', 'trkecamatan.id', '=', 'trkecamatan_trkelurahan.trkecamatan_id')

			->leftjoin('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->leftjoin('trkabupaten', 'trkabupaten.id', '=', 'trkabupaten_trkecamatan.trkabupaten_id')

			->leftjoin('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->leftjoin('trpropinsi', 'trpropinsi.id', '=', 'trkabupaten_trpropinsi.trpropinsi_id')

			->leftjoin('tmpermohonan_tmperusahaan_sementara', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan_sementara.tmpermohonan_id')
			->leftjoin('tmperusahaan_sementara', 'tmpermohonan_tmperusahaan_sementara.tmperusahaan_sementara_id', '=', 'tmperusahaan_sementara.id')

			->leftjoin('tmperusahaan_sementara_trkelurahan', 'tmperusahaan_sementara.id', '=', 'tmperusahaan_sementara_trkelurahan.tmperusahaan_sementara_id')
			->leftjoin('trkelurahan as perusahaan_kelurahan', 'perusahaan_kelurahan.id', '=', 'tmperusahaan_sementara_trkelurahan.trkelurahan_id')

			->leftjoin('trkecamatan_trkelurahan as trkecamatan_trkelurahan_perusahaan', 'perusahaan_kelurahan.id', '=', 'trkecamatan_trkelurahan_perusahaan.trkelurahan_id')
			->leftjoin('trkecamatan as perusahaan_kecamatan', 'perusahaan_kecamatan.id', '=', 'trkecamatan_trkelurahan_perusahaan.trkecamatan_id')

			->leftjoin('trkabupaten_trkecamatan as trkabupaten_trkecamatan_perusahaan', 'perusahaan_kecamatan.id', '=', 'trkabupaten_trkecamatan_perusahaan.trkecamatan_id')
			->leftjoin('trkabupaten as perusahaan_kabupaten', 'perusahaan_kabupaten.id', '=', 'trkabupaten_trkecamatan_perusahaan.trkabupaten_id')

			->leftjoin('trkabupaten_trpropinsi as trkabupaten_trpropinsi_perusahaan', 'perusahaan_kabupaten.id', '=', 'trkabupaten_trpropinsi_perusahaan.trkabupaten_id')
			->leftjoin('trpropinsi as perusahaan_propinsi', 'perusahaan_propinsi.id', '=', 'trkabupaten_trpropinsi_perusahaan.trpropinsi_id')

			->select(['tmpermohonan.id',
					'trperizinan.id as perizinan_id',
					'trperizinan.n_perizinan',
					'trkelompok_perizinan.n_kelompok',
					'trjenis_permohonan.n_permohonan',
					'tmpermohonan.pendaftaran_id',
					'trperizinan.n_perizinan',
					'tmpemohon_sementara.source',
					'tmpemohon_sementara.no_referensi',
					'tmpemohon_sementara.n_pemohon',
					'tmpemohon_sementara.telp_pemohon',
					'tmpermohonan.d_terima_berkas',
					'tmpermohonan.d_survey',
					'tmpermohonan.a_izin',
					'tmpermohonan.keterangan',
					'trpropinsi.id as propinsi_pemohon',
					'trkabupaten.id as kabupaten_pemohon',
					'trkecamatan.id as kecamatan_pemohon',
					'trkelurahan.id as kelurahan_pemohon',
					'tmpemohon_sementara.a_pemohon',
					'tmpemohon_sementara.a_pemohon_luar',
					'tmperusahaan_sementara.npwp',
					'tmperusahaan_sementara.n_perusahaan as nama_perusahaan',
					'tmperusahaan_sementara.i_telp_perusahaan as telp_perusahaan',
					'tmperusahaan_sementara.fax as fax_perusahaan',
					'tmperusahaan_sementara.email as email_perusahaan',
					'perusahaan_propinsi.id as propinsi_perusahaan',
					'perusahaan_kabupaten.id as kabupaten_perusahaan',
					'perusahaan_kecamatan.id as kecamatan_perusahaan',
					'perusahaan_kelurahan.id as kelurahan_perusahaan',
					'tmperusahaan_sementara.a_perusahaan as alamat_perusahaan'])

			->where('tmpermohonan.id', '=', $tmpermohonan_id)
			->groupBy('tmpermohonan.id')
			->orderBy('tmpermohonan.id')
			->get();

		}

		public static function fetch_with_tmpemohon_for_coba_data($tmpermohonan_id) {

			return DB::table('tmpermohonan')

			->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('tmpermohonan_trsyarat_perizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trsyarat_perizinan.tmpermohonan_id')
			->leftjoin('trsyarat_perizinan', 'tmpermohonan_trsyarat_perizinan.trsyarat_perizinan_id', '=', 'trsyarat_perizinan.id')

			->leftjoin('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->leftjoin('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

			->leftjoin('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
			->leftjoin('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

			->leftjoin('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
			->leftjoin('tmsk', 'tmsk.id', '=', 'tmpermohonan_tmsk.tmsk_id')

			->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

			->leftjoin('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
			->leftjoin('trkecamatan', 'trkecamatan.id', '=', 'trkecamatan_trkelurahan.trkecamatan_id')

			->leftjoin('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->leftjoin('trkabupaten', 'trkabupaten.id', '=', 'trkabupaten_trkecamatan.trkabupaten_id')

			->leftjoin('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->leftjoin('trpropinsi', 'trpropinsi.id', '=', 'trkabupaten_trpropinsi.trpropinsi_id')

			->leftjoin('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
			->leftjoin('tmperusahaan', 'tmpermohonan_tmperusahaan.tmperusahaan_id', '=', 'tmperusahaan.id')

			->leftjoin('tmperusahaan_trkelurahan', 'tmperusahaan.id', '=', 'tmperusahaan_trkelurahan.tmperusahaan_id')
			->leftjoin('trkelurahan as perusahaan_kelurahan', 'perusahaan_kelurahan.id', '=', 'tmperusahaan_trkelurahan.trkelurahan_id')

			->leftjoin('trkecamatan_trkelurahan as trkecamatan_trkelurahan_perusahaan', 'perusahaan_kelurahan.id', '=', 'trkecamatan_trkelurahan_perusahaan.trkelurahan_id')
			->leftjoin('trkecamatan as perusahaan_kecamatan', 'perusahaan_kecamatan.id', '=', 'trkecamatan_trkelurahan_perusahaan.trkecamatan_id')

			->leftjoin('trkabupaten_trkecamatan as trkabupaten_trkecamatan_perusahaan', 'perusahaan_kecamatan.id', '=', 'trkabupaten_trkecamatan_perusahaan.trkecamatan_id')
			->leftjoin('trkabupaten as perusahaan_kabupaten', 'perusahaan_kabupaten.id', '=', 'trkabupaten_trkecamatan_perusahaan.trkabupaten_id')

			->leftjoin('trkabupaten_trpropinsi as trkabupaten_trpropinsi_perusahaan', 'perusahaan_kabupaten.id', '=', 'trkabupaten_trpropinsi_perusahaan.trkabupaten_id')
			->leftjoin('trpropinsi as perusahaan_propinsi', 'perusahaan_propinsi.id', '=', 'trkabupaten_trpropinsi_perusahaan.trpropinsi_id')

			->leftjoin('tmperusahaan_trinvestasi', 'tmperusahaan.id', '=', 'tmperusahaan_trinvestasi.tmperusahaan_id')
			->leftjoin('trinvestasi', 'trinvestasi.id', '=', 'tmperusahaan_trinvestasi.trinvestasi_id')

			->leftjoin('tmperusahaan_trkegiatan', 'tmperusahaan.id', '=', 'tmperusahaan_trkegiatan.tmperusahaan_id')
			->leftjoin('trkegiatan', 'trkegiatan.id', '=', 'tmperusahaan_trkegiatan.trkegiatan_id')

			->select(['tmpermohonan.id as permohonan_id',
					'trperizinan.id as perizinan_id',
					'trperizinan.n_perizinan',
					'trkelompok_perizinan.n_kelompok',
					'trjenis_permohonan.n_permohonan',
					'tmpermohonan.pendaftaran_id',
					'trperizinan.n_perizinan',
					'tmsk.no_surat',
					'tmpemohon.source as sumber_identitas',
					'tmpemohon.no_referensi',
					'tmpemohon.n_pemohon',
					'tmpemohon.telp_pemohon',
					'tmpermohonan.d_terima_berkas',
					'tmpermohonan.d_survey as tanggal_peninjauan',
					'tmpermohonan.d_perubahan',
					'tmpermohonan.d_perpanjangan',
					'tmpermohonan.d_daftarulang',
					'tmpermohonan.a_izin',
					'tmpermohonan.keterangan',
					'trpropinsi.id as propinsi_pemohon',
					'trkabupaten.id as kabupaten_pemohon',
					'trkecamatan.id as kecamatan_pemohon',
					'trkelurahan.id as kelurahan_pemohon',
					'tmpemohon.a_pemohon',
					'tmpemohon.a_pemohon_luar',
					'tmperusahaan.npwp',
					'tmperusahaan.n_perusahaan as nama_perusahaan',
					'tmperusahaan.i_telp_perusahaan as telp_perusahaan',
					'tmperusahaan.fax as fax_perusahaan',
					'tmperusahaan.email as email_perusahaan',
					'perusahaan_propinsi.id as propinsi_perusahaan',
					'perusahaan_kabupaten.id as kabupaten_perusahaan',
					'perusahaan_kecamatan.id as kecamatan_perusahaan',
					'perusahaan_kelurahan.id as kelurahan_perusahaan',
					'tmperusahaan.a_perusahaan',
					'trinvestasi.n_investasi',
					'trkegiatan.n_kegiatan'
					])

			->where('tmpermohonan.id', '=', $tmpermohonan_id)
			->groupBy('tmpermohonan.id')
			->orderBy('tmpermohonan.id')
			->get();

		}

		public static function fetch_with_trjenis_permohonan_trkelompok_perizinan($trperizinan_id){
			return DB::table('tmpermohonan')			

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
			->leftjoin('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

			->leftjoin('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->leftjoin('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

			->select(['trperizinan.id as perizinan_id', 'trjenis_permohonan.id as jenis_permohonan_id ', 'trperizinan.n_perizinan', 'trkelompok_perizinan.n_kelompok', 'trjenis_permohonan.n_permohonan'])
			->where('trperizinan.id', '=', $trperizinan_id)
			->groupBy('trperizinan.id')
			->orderBy('trperizinan.id')
			->get();
		}
		
		public static function fetch_tracking_for_customer_service_informasi_tracking(){
			return DB::table('tmpermohonan')
			->leftjoin('tmpermohonan_trperizinan','tmpermohonan.id','=','tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan','tmpermohonan_trperizinan.trperizinan_id','=','trperizinan.id')
			->leftjoin('tmpemohon_tmpermohonan','tmpermohonan.id','=','tmpemohon_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon','tmpemohon_tmpermohonan.tmpemohon_id','=','tmpemohon.id')
			->leftjoin('tmpermohonan_trstspermohonan','tmpermohonan.id','=','tmpermohonan_trstspermohonan.tmpermohonan_id')
			->leftjoin('trstspermohonan','tmpermohonan_trstspermohonan.trstspermohonan_id','=','trstspermohonan.id')
			->leftjoin('tmpemohon_trkelurahan','tmpemohon.id','=','tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan','tmpemohon_trkelurahan.trkelurahan_id','=','trkelurahan.id')
			->leftjoin('tmpermohonan_tmperusahaan','tmpermohonan.id','=','tmpermohonan_tmperusahaan.tmpermohonan_id')
			->leftjoin('tmperusahaan','tmpermohonan_tmperusahaan.tmperusahaan_id','=','tmperusahaan.id')
			->leftjoin('tmpermohonan_trjenis_permohonan','tmpermohonan.id','=','tmpermohonan_trjenis_permohonan.tmpermohonan_id')
			->leftjoin('trjenis_permohonan','tmpermohonan_trjenis_permohonan.trjenis_permohonan_id','=','trjenis_permohonan.id')
			->leftjoin('tmpemohon_sementara_tmpermohonan','tmpermohonan.id','=','tmpemohon_sementara_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon_sementara','tmpemohon_sementara_tmpermohonan.tmpemohon_sementara_id','=','tmpemohon_sementara.id')
			->leftjoin('tmpermohonan_tmperusahaan_sementara','tmpermohonan.id','=','tmpermohonan_tmperusahaan_sementara.tmpermohonan_id')
			->leftjoin('tmperusahaan_sementara','tmpermohonan_tmperusahaan_sementara.tmperusahaan_sementara_id','=','tmperusahaan_sementara.id')
			->where('tmpermohonan.c_izin_dicabut','=',0)
			->where('tmpermohonan.c_izin_selesai','=',0)
			->orderBy('tmpermohonan.id','desc')
			->get(['tmpermohonan.pendaftaran_id','trperizinan.n_perizinan','trstspermohonan.n_sts_permohonan','trjenis_permohonan.n_permohonan','tmpemohon.n_pemohon','tmpermohonan.a_izin','tmpermohonan.id']);
		}

		public static function fetch_with_trperizinan_trjenis_permohonan_tmpermohonan_for_info_tracking_detail($permohonan_id){
			return DB::table('tmpermohonan')
			->join('tmpermohonan_trperizinan','tmpermohonan.id','=','tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan','tmpermohonan_trperizinan.trperizinan_id','=','trperizinan.id')
			->join('tmpemohon_tmpermohonan','tmpermohonan.id','=','tmpemohon_tmpermohonan.tmpermohonan_id')
			->join('tmpemohon','tmpemohon_tmpermohonan.tmpemohon_id','=','tmpemohon.id')
			->join('tmpermohonan_trjenis_permohonan','tmpermohonan.id','=','tmpermohonan_trjenis_permohonan.tmpermohonan_id')
			->join('trjenis_permohonan','tmpermohonan_trjenis_permohonan.trjenis_permohonan_id','=','trjenis_permohonan.id')
			->where('tmpermohonan.id','=', $permohonan_id)
			->get(['tmpermohonan.id as id_permohonan','tmpermohonan.pendaftaran_id','trperizinan.n_perizinan','tmpemohon.n_pemohon','trjenis_permohonan.n_permohonan','trperizinan.v_hari']);
		}

		public static function fetch_with_tmpermohonan_trstspermohonan_for_informasi_tracking_detail($id){
			return DB::table('tmpermohonan')
			->join('tmpermohonan_tmtrackingperizinan','tmpermohonan.id','=', 'tmpermohonan_tmtrackingperizinan.tmpermohonan_id')
			->join('tmtrackingperizinan','tmtrackingperizinan.id','=','tmpermohonan_tmtrackingperizinan.tmtrackingperizinan_id')

			->join('tmtrackingperizinan_trstspermohonan','tmtrackingperizinan.id','=','tmtrackingperizinan_trstspermohonan.tmtrackingperizinan_id')
			->join('trstspermohonan','trstspermohonan.id','=','tmtrackingperizinan_trstspermohonan.trstspermohonan_id')
			->where('tmpermohonan.id','=', $id)
			->select(DB::raw('trstspermohonan.id,trstspermohonan.n_sts_permohonan,tmtrackingperizinan.d_entry_awal,tmtrackingperizinan.d_entry,timediff(tmtrackingperizinan.d_entry,tmtrackingperizinan.d_entry_awal) as span'))
			->get();
		}

		public static function fetch_with_trperizinan_trjenis_permohonan_tmpermohonan_for_customer_service_informasi_masa_berlaku(){
			return DB::table('tmpermohonan')
			->join('tmpermohonan_trperizinan','tmpermohonan.id','=','tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan','tmpermohonan_trperizinan.trperizinan_id','=','trperizinan.id')
			->join('tmpemohon_tmpermohonan','tmpermohonan.id','=','tmpemohon_tmpermohonan.tmpermohonan_id')
			->join('tmpemohon','tmpemohon_tmpermohonan.tmpemohon_id','=','tmpemohon.id')
			->join('tmpermohonan_trjenis_permohonan','tmpermohonan.id','=','tmpermohonan_trjenis_permohonan.tmpermohonan_id')
			->join('trjenis_permohonan','tmpermohonan_trjenis_permohonan.trjenis_permohonan_id','=','trjenis_permohonan.id')
			->get(['tmpermohonan.pendaftaran_id','trperizinan.n_perizinan','tmpemohon.n_pemohon','trjenis_permohonan.n_permohonan','tmpermohonan.d_berlaku_izin']);
		}

		# Modul Backoffice =========================================================================================================================================================================================

		# Bagian Pendataan / Entry Data Perizinan

		public static function fetch_with_tmpemohon_trperizinan_trjenis_permohonan_for_entry_data_perizinan($date_start, $date_finish) {

			if(!empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')
				->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')
				->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')
				->leftjoin('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->leftjoin('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')
				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, trjenis_permohonan.n_permohonan, tmpermohonan.d_terima_berkas, tmpermohonan.c_pendaftaran'))
				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->whereBetween('d_terima_berkas', [$date_start, $date_finish])
				->get();
			}
			else {
				return DB::table('tmpermohonan')
				->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')
				->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')
				->leftjoin('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->leftjoin('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')
				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, trjenis_permohonan.n_permohonan, tmpermohonan.d_terima_berkas, tmpermohonan.c_pendaftaran'))
				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->get();
			}
		}

		public static function fetch_with_tmpemohon_tmperusahaan_for_pendataan_entry_data_perizinan_edit($id) {
			return DB::table('tmpermohonan')
			->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

			->leftjoin('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
			->leftjoin('tmperusahaan', 'tmpermohonan_tmperusahaan.tmperusahaan_id', '=', 'tmperusahaan.id')

			->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan', 'tmpemohon_trkelurahan.trkelurahan_id', '=', 'trkelurahan.id')

			->leftjoin('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
			->leftjoin('trkecamatan', 'trkecamatan_trkelurahan.trkecamatan_id', '=', 'trkecamatan.id')

			->leftjoin('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->leftjoin('trkabupaten', 'trkabupaten_trkecamatan.trkabupaten_id', '=', 'trkabupaten.id')

			->leftjoin('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->leftjoin('trpropinsi', 'trkabupaten_trpropinsi.trpropinsi_id', '=', 'trpropinsi.id')

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')


			->select(['tmpermohonan.id', 'tmpermohonan.pendaftaran_id', 'tmpemohon.n_pemohon', 'tmpemohon.a_pemohon', 'trkelurahan.n_kelurahan', 'trkecamatan.n_kecamatan', 'trkabupaten.n_kabupaten', 'trpropinsi.n_propinsi', 'trperizinan.n_perizinan', 'tmpermohonan.a_izin'])
			->where('tmpermohonan.id', '=', $id)
			->get();

		}

		public static function edit_data_perizinan_for_entry_data_perizinan($data) {

		}

		public static function fetch_with_tmpemohon_for_pendataan_entry_data_perizinan_data_awal_data($tmpermohonan_id) {
			return DB::table('tmpermohonan')
			->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
			->leftjoin('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

			->leftjoin('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
			->leftjoin('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

			->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

			->leftjoin('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
			->leftjoin('trkecamatan', 'trkecamatan.id', '=', 'trkecamatan_trkelurahan.trkecamatan_id')

			->leftjoin('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->leftjoin('trkabupaten', 'trkabupaten.id', '=', 'trkabupaten_trkecamatan.trkabupaten_id')

			->leftjoin('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->leftjoin('trpropinsi', 'trpropinsi.id', '=', 'trkabupaten_trpropinsi.trpropinsi_id')

			->leftjoin('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
			->leftjoin('tmperusahaan', 'tmpermohonan_tmperusahaan.tmperusahaan_id', '=', 'tmperusahaan.id')

			->leftjoin('tmperusahaan_trkelurahan', 'tmperusahaan.id', '=', 'tmperusahaan_trkelurahan.tmperusahaan_id')
			->leftjoin('trkelurahan as perusahaan_kelurahan', 'perusahaan_kelurahan.id', '=', 'tmperusahaan_trkelurahan.trkelurahan_id')

			->leftjoin('trkecamatan_trkelurahan as trkecamatan_trkelurahan_perusahaan', 'perusahaan_kelurahan.id', '=', 'trkecamatan_trkelurahan_perusahaan.trkelurahan_id')
			->leftjoin('trkecamatan as perusahaan_kecamatan', 'perusahaan_kecamatan.id', '=', 'trkecamatan_trkelurahan_perusahaan.trkecamatan_id')

			->leftjoin('trkabupaten_trkecamatan as trkabupaten_trkecamatan_perusahaan', 'perusahaan_kecamatan.id', '=', 'trkabupaten_trkecamatan_perusahaan.trkecamatan_id')
			->leftjoin('trkabupaten as perusahaan_kabupaten', 'perusahaan_kabupaten.id', '=', 'trkabupaten_trkecamatan_perusahaan.trkabupaten_id')

			->leftjoin('trkabupaten_trpropinsi as trkabupaten_trpropinsi_perusahaan', 'perusahaan_kabupaten.id', '=', 'trkabupaten_trpropinsi_perusahaan.trkabupaten_id')
			->leftjoin('trpropinsi as perusahaan_propinsi', 'perusahaan_propinsi.id', '=', 'trkabupaten_trpropinsi_perusahaan.trpropinsi_id')

			->select(['tmpermohonan.id', 'trperizinan.id as perizinan_id','trperizinan.n_perizinan', 'trkelompok_perizinan.n_kelompok', 'trjenis_permohonan.n_permohonan', 'tmpermohonan.pendaftaran_id', 'trperizinan.n_perizinan', 'tmpemohon.source', 'tmpemohon.no_referensi', 'tmpemohon.n_pemohon', 'tmpemohon.telp_pemohon', 'tmpermohonan.d_terima_berkas', 'tmpermohonan.d_survey', 'tmpermohonan.a_izin', 'tmpermohonan.keterangan', 'trpropinsi.id as propinsi_pemohon', 'trkabupaten.id as kabupaten_pemohon', 'trkecamatan.id as kecamatan_pemohon', 'trkelurahan.id as kelurahan_pemohon', 'tmpemohon.a_pemohon', 'tmpemohon.a_pemohon_luar', 'tmperusahaan.npwp', 'tmperusahaan.n_perusahaan as nama_perusahaan', 'tmperusahaan.i_telp_perusahaan as telp_perusahaan', 'tmperusahaan.fax as fax_perusahaan', 'tmperusahaan.email as email_perusahaan', 'perusahaan_propinsi.id as propinsi_perusahaan', 'perusahaan_kabupaten.id as kabupaten_perusahaan', 'perusahaan_kecamatan.id as kecamatan_perusahaan', 'perusahaan_kelurahan.id as kelurahan_perusahaan', 'tmperusahaan.a_perusahaan as alamat_perusahaan'])
			->where('tmpermohonan.id', '=', $tmpermohonan_id)
			->get();

		}

		public static function fetch_with_tmproperty_jenisperizinan_for_pendataan_entry_data_perizinan_edit($id) {
			return DB::table('tmpermohonan')
			->join('tmpermohonan_tmproperty_jenisperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_tmproperty_jenisperizinan.tmpermohonan_id')
			->join('tmproperty_jenisperizinan', 'tmpermohonan_tmproperty_jenisperizinan.tmproperty_jenisperizinan_id', '=', 'tmproperty_jenisperizinan.id')

			->select(['tmproperty_jenisperizinan.id' ,'tmproperty_jenisperizinan.v_property', 'tmproperty_jenisperizinan.k_property'])
			->where('tmpermohonan.id', '=', $id)
			->get();
		}

		# Bagian Pendataan / Penjadwalan Tinjauan

		public static function fetch_with_tmpemohon_trperizinan_trjenis_permohonan_for_penjadwalan_tinjauan($date_start, $date_finish) {

			if(!empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')
				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')
				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')
				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpermohonan.a_izin, trjenis_permohonan.n_permohonan, tmpermohonan.d_terima_berkas, tmpermohonan.d_survey'))
				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->get();
			}
			else {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')
				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')
				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')
				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpermohonan.a_izin, trjenis_permohonan.n_permohonan, tmpermohonan.d_terima_berkas, tmpermohonan.d_survey'))
				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->get();
			}
		}

		public static function fetch_with_tmpemohon_trperizinan_tmsk_tmpegawai_trtanggal_survey_for_pendataan_penjadwalan_tinjauan_edit_data($id) {



			return DB::table('tmpermohonan')

			->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
			->leftjoin('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

			->leftjoin('tmpermohonan_trtanggal_survey', 'tmpermohonan.id', '=', 'tmpermohonan_trtanggal_survey.tmpermohonan_id')
			->leftjoin('trtanggal_survey', 'tmpermohonan_trtanggal_survey.trtanggal_survey_id', '=', 'trtanggal_survey.id')

			// ->join('tmpegawai_trtanggal_survey', 'trtanggal_survey.id', '=', 'tmpegawai_trtanggal_survey.trtanggal_survey_id')
			// ->join('tmpegawai', 'tmpegawai_trtanggal_survey.tmpegawai_id', '=', 'tmpegawai.id')

			->select(['tmpermohonan.id', 'tmpermohonan.pendaftaran_id', 'tmpemohon.n_pemohon', 'trperizinan.n_perizinan', 'tmpermohonan.d_terima_berkas', 'tmpermohonan.d_survey', 'tmsk.no_surat', 'tmpermohonan.nama_ttd'])
			->where('tmpermohonan.id', '=', $id)

			->get();

		}

		# Bagian Tim Teknis / Entry Hasil Tinjauan

		public static function fetch_with_tmpemohon_trperizinan_trjenis_permohonan_for_entry_hasil_tinjauan($date_start, $date_finish) {

			if(!empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')
				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')
				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')
				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, trjenis_permohonan.n_permohonan, tmpermohonan.d_terima_berkas, tmpermohonan.d_survey, tmpermohonan.c_tinjauan'))
				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->get();

			}

			else {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')
				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')
				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')
				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, trjenis_permohonan.n_permohonan, tmpermohonan.d_terima_berkas, tmpermohonan.d_survey, tmpermohonan.c_tinjauan'))
				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->get();

			}

		}

		# * Modal ==================================================

		public static function fetch_with_tmpemohon_trperizinan_trjenis_perizinan_tmperusahaan_for_entry_hasil_tinjauan_edit_data($id) {

			return DB::table('tmpermohonan')
			->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')
			->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')
			->join('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
			->join('tmperusahaan', 'tmpermohonan_tmperusahaan.tmperusahaan_id', '=', 'tmperusahaan.id')

			->select(['tmpermohonan.id', 'tmpermohonan.pendaftaran_id','tmpemohon.n_pemohon', 'tmpemohon.a_pemohon', 'trperizinan.n_perizinan', 'tmpermohonan.a_izin', 'tmperusahaan.n_perusahaan', 'tmperusahaan.a_perusahaan'])
			->where('tmpermohonan.id', '=', $id)

			->get();

		}

		public static function fetch_width_tmproperty_jenisperizinan_for_entry_hasil_tinjauan_edit_data($id) {
			return DB::table('tmpermohonan')
			->join('tmpermohonan_tmproperty_jenisperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_tmproperty_jenisperizinan.tmpermohonan_id')
			->join('tmproperty_jenisperizinan', 'tmpermohonan_tmproperty_jenisperizinan.tmproperty_jenisperizinan_id', '=', 'tmproperty_jenisperizinan.id')

			->select(['tmproperty_jenisperizinan.id' ,'tmproperty_jenisperizinan.v_property', 'tmproperty_jenisperizinan.k_property'])
			->where('tmpermohonan.id', '=', $id)
			->get();
		}

		# Bagian Tim Teknis / Pembuatan Berita Acara Pemeriksaan

		public static function fetch_with_tmpemohon_trperizinan_trjenis_permohonan_for_pembuatan_berita_acara_pemeriksaan($date_start, $date_finish) {

			if(!empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')

				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, trjenis_permohonan.n_permohonan, tmpermohonan.d_terima_berkas, tmpermohonan.d_survey, tmpermohonan.c_tinjauan'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '1')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->get();
			}
			else {
				return DB::table('tmpermohonan')

				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, trjenis_permohonan.n_permohonan, tmpermohonan.d_terima_berkas, tmpermohonan.d_survey, tmpermohonan.c_tinjauan'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '1')
				->get();
			}


		}

		# * Modal ==================================================

		public static function fetch_with_tmpemohon_trperizinan_tmperusahaan_tmbap_for_pembayaran_berita_acara_pemeriksaan_edit_data($id) {
			return DB::table('tmpermohonan')

			->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

			->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->join('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
			->join('tmperusahaan', 'tmpermohonan_tmperusahaan.tmperusahaan_id', '=', 'tmperusahaan.id')

			->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
			->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

			->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

			->join('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
			->join('trkecamatan', 'trkecamatan.id', '=', 'trkecamatan_trkelurahan.trkecamatan_id')

			->join('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->join('trkabupaten', 'trkabupaten.id', '=', 'trkabupaten_trkecamatan.trkabupaten_id')

			->join('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->join('trpropinsi', 'trpropinsi.id', '=', 'trkabupaten_trpropinsi.trpropinsi_id')

			->select(['tmpermohonan.pendaftaran_id', 'trperizinan.n_perizinan', 'tmpemohon.n_pemohon', 'tmpemohon.a_pemohon', 'trkelurahan.n_kelurahan', 'trkecamatan.n_kecamatan', 'trkabupaten.n_kabupaten', 'trpropinsi.n_propinsi', 'tmperusahaan.n_perusahaan', 'tmpermohonan.d_survey', 'tmbap.bap_id', 'tmbap.c_pesan'])

			->where('tmpermohonan.id','=', $id)

			->get();

		}

		public static function fetch_width_tmproperty_jenisperizinan_for_pembayaran_berita_acara_pemeriksaan_edit_data($id) {
			return DB::table('tmpermohonan')
			->join('tmpermohonan_tmproperty_jenisperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_tmproperty_jenisperizinan.tmpermohonan_id')
			->join('tmproperty_jenisperizinan', 'tmpermohonan_tmproperty_jenisperizinan.tmproperty_jenisperizinan_id', '=', 'tmproperty_jenisperizinan.id')

			->select(['tmproperty_jenisperizinan.id', 'tmproperty_jenisperizinan.v_property', 'tmproperty_jenisperizinan.k_property', 'tmproperty_jenisperizinan.v_tinjauan', 'tmproperty_jenisperizinan.k_tinjauan'])
			->where('tmpermohonan.id', '=', $id)
			->get();
		}

		# Bagian Tim Teknis / Penetapan Izin

		public static function fetch_with_tmpemohon_tmperizinan_tmbap_for_penetapan_izin($date_start, $date_finish) {

			if(!empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')
				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmbap.bap_id, tmpermohonan.d_terima_berkas, tmbap.status_bap'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->get();
			}
			else {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')
				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmbap.bap_id, tmpermohonan.d_terima_berkas, tmbap.status_bap'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->get();
			}

		}

		# * Modal ==================================================

		public static function fetch_with_tmpemohon_trperizinan_tmperusahaan_tmbap_for_penetapan_izin_edit_data($id) {
			return DB::table('tmpermohonan')
			->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

			->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->join('tmpermohonan_tmperusahaan', 'tmpermohonan.id', '=', 'tmpermohonan_tmperusahaan.tmpermohonan_id')
			->join('tmperusahaan', 'tmpermohonan_tmperusahaan.tmperusahaan_id', '=', 'tmperusahaan.id')

			->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
			->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

			->leftjoin('tmpemohon_trkelurahan', 'tmpemohon.id', '=', 'tmpemohon_trkelurahan.tmpemohon_id')
			->leftjoin('trkelurahan', 'trkelurahan.id', '=', 'tmpemohon_trkelurahan.trkelurahan_id')

			->join('trkecamatan_trkelurahan', 'trkelurahan.id', '=', 'trkecamatan_trkelurahan.trkelurahan_id')
			->join('trkecamatan', 'trkecamatan.id', '=', 'trkecamatan_trkelurahan.trkecamatan_id')

			->join('trkabupaten_trkecamatan', 'trkecamatan.id', '=', 'trkabupaten_trkecamatan.trkecamatan_id')
			->join('trkabupaten', 'trkabupaten.id', '=', 'trkabupaten_trkecamatan.trkabupaten_id')

			->join('trkabupaten_trpropinsi', 'trkabupaten.id', '=', 'trkabupaten_trpropinsi.trkabupaten_id')
			->join('trpropinsi', 'trpropinsi.id', '=', 'trkabupaten_trpropinsi.trpropinsi_id')

			->select(['tmpermohonan.id', 'tmpermohonan.pendaftaran_id', 'trperizinan.n_perizinan', 'tmpemohon.n_pemohon', 'tmpemohon.a_pemohon', 'trkelurahan.n_kelurahan', 'trkecamatan.n_kecamatan', 'trkabupaten.n_kabupaten', 'trpropinsi.n_propinsi', 'tmperusahaan.n_perusahaan', 'tmbap.c_pesan', 'tmbap.bap_id', 'tmpermohonan.d_survey', 'tmbap.status_bap'])
			->where('tmpermohonan.id', '=', $id)
			->get();



		}

		public static function fetch_width_tmproperty_jenisperizinan_for_penetapan_izin_edit_data($id) {
			return DB::table('tmpermohonan')
			->join('tmpermohonan_tmproperty_jenisperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_tmproperty_jenisperizinan.tmpermohonan_id')
			->join('tmproperty_jenisperizinan', 'tmpermohonan_tmproperty_jenisperizinan.tmproperty_jenisperizinan_id', '=', 'tmproperty_jenisperizinan.id')

			->select(['tmproperty_jenisperizinan.id', 'tmproperty_jenisperizinan.v_property', 'tmproperty_jenisperizinan.k_property', 'tmproperty_jenisperizinan.v_tinjauan', 'tmproperty_jenisperizinan.k_tinjauan'])
			->where('tmpermohonan.id', '=', $id)
			->get();


		}

		public static function fetch_with_tmpemohon_trperizinan_trjenis_perizinan_tmbap_for_pembuatan_skrd($date_start, $date_finish) {

			if(!empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, trjenis_permohonan.n_permohonan, tmpermohonan.d_terima_berkas, tmpermohonan.d_survey, tmbap.c_skrd'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->get();
			}

			else {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, trjenis_permohonan.n_permohonan, tmpermohonan.d_terima_berkas, tmpermohonan.d_survey, tmbap.c_skrd'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->get();
			}

		}

		# Tim Teknis / Hitung Retribusi

		public static function fetch_with_tmpemohon_trperizinan_retribusi_for_hitung_retribusi($date_start, $date_finish) {

			if(!empty($date_start) && !empty($date_finish)) {

				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('retribusi', 'tmpermohonan.id', '=', 'retribusi.tmpermohonan_id')
				//->join('tmpermohonan', 'retribusi.tmpermohonan_id', '=', 'tmpermohonan.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, retribusi.nilai_retribusi'))
				//->select(DB::raw('tmpemohon.n_pemohon'))
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->get();
			}
			else {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('retribusi', 'tmpermohonan.id', '=', 'retribusi.tmpermohonan_id')
				// ->join('tmpermohonan', 'retribusi.tmpermohonan_id', '=', 'tmpermohonan.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, retribusi.nilai_retribusi'))
				->get();
			}

		}

		# Tim Teknis / Rekomendasi

		public static function fetch_with_tmpemohon_trperizinan_trjenis_permohonan_trunitkerja_tim_teknis($date_start, $date_finish) {

			if (!empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')

				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->join('tmpermohonan_trtanggal_survey', 'tmpermohonan.id', '=', 'tmpermohonan_trtanggal_survey.tmpermohonan_id')
				->join('trtanggal_survey', 'tmpermohonan_trtanggal_survey.trtanggal_survey_id', '=', 'trtanggal_survey.id')

				->join('tim_teknis', 'tim_teknis.trtanggal_survey_id', '=', 'trtanggal_survey.id')

				->join('trunitkerja', 'trunitkerja.id', '=', 'tim_teknis.trunitkerja_id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, trjenis_permohonan.n_permohonan, tmpermohonan.d_survey, trunitkerja.n_unitkerja, tim_teknis.rekomendasi, tim_teknis.status_tinjauan'))
				->orderBy('tmpermohonan.d_survey', 'desc')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->get();
			}

			else {
				return DB::table('tmpermohonan')

				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->join('tmpermohonan_trtanggal_survey', 'tmpermohonan.id', '=', 'tmpermohonan_trtanggal_survey.tmpermohonan_id')
				->join('trtanggal_survey', 'tmpermohonan_trtanggal_survey.trtanggal_survey_id', '=', 'trtanggal_survey.id')

				->join('tim_teknis', 'tim_teknis.trtanggal_survey_id', '=', 'trtanggal_survey.id')

				->join('trunitkerja', 'trunitkerja.id', '=', 'tim_teknis.trunitkerja_id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, trjenis_permohonan.n_permohonan, tmpermohonan.d_survey, trunitkerja.n_unitkerja, tim_teknis.rekomendasi, tim_teknis.status_tinjauan'))
				->orderBy('tmpermohonan.d_survey', 'desc')
				->get();
			}

		}

		# Bagian Penetapan / Pembuatan SKRD

		public static function fetch_with_tmpemohon_tmperizinan_tmsk_tmbap_for_pembuatan_izin($date_start, $date_finish) {

			if(!empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
				->join('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmsk.no_surat, tmsk.tgl_surat, tmsk.c_cetak'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->where('tmbap.status_bap', '=', '1')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->get();
			}
			else {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
				->join('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmsk.no_surat, tmsk.tgl_surat, tmsk.c_cetak'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->where('tmbap.status_bap', '=', '1')
				->get();
			}

		}

		# Bagian Penetapan / Penetapan Izin

		public static function fetch_with_tmpemohon_trperizinan_trjenis_permohonan_tmkeringananretribusi($id) {
			return DB::table('tmpermohonan')
			->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

			->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
			->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

			->join('tmkeringananretribusi_tmpermohonan', 'tmpermohonan.id', '=', 'tmkeringananretribusi_tmpermohonan.tmpermohonan_id')
			->join('tmkeringananretribusi', 'tmkeringananretribusi_tmpermohonan.tmkeringananretribusi_id', '=', 'tmkeringananretribusi.id')

			->select(['tmpermohonan.id', 'tmpermohonan.pendaftaran_id', 'trperizinan.n_perizinan', 'trjenis_permohonan.n_permohonan', 'tmpemohon.n_pemohon', 'tmkeringananretribusi.e_berdasarkan', 'tmkeringananretribusi.e_surat', 'tmkeringananretribusi.d_entry', 'tmkeringananretribusi.i_nomor_surat', 'tmkeringananretribusi.n_pemohon as keringanan_n_pemohon','tmkeringananretribusi.v_prosentase_retribusi', 'tmkeringananretribusi.i_entry'])
			->where('tmpermohonan.id', '=', $id)
			->get();


		}

		# Bagian Penetapan / Layanan Ditolak

		public static function fetch_with_tmpemohon_trperizinan_for_layanan_ditolak($date_start, $date_finish) {

			if(!empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpemohon.a_pemohon, tmpermohonan.d_terima_berkas, trperizinan.c_keputusan'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->where('trperizinan.c_keputusan', '=', '0')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->get();
			}
			else {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpemohon.a_pemohon, tmpermohonan.d_terima_berkas, trperizinan.c_keputusan'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->where('trperizinan.c_keputusan', '=', '0')
				->get();
			}

		}

		# Bagian Penetapan / Pencabutan Izin

		public static function fetch_with_tmpemohon_trperizinan_trjenis_permohonan_for_pencabutan_izin($date_start, $date_finish) {

			if(!empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpemohon.n_pemohon, tmpemohon.a_pemohon, trjenis_permohonan.n_permohonan'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->where('tmpermohonan.c_izin_dicabut', '=', '1')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])
				->get();
			}
			else {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, trperizinan.n_perizinan, tmpemohon.n_pemohon, tmpemohon.a_pemohon, trjenis_permohonan.n_permohonan'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->where('tmpermohonan.c_izin_dicabut', '=', '1')
				->get();
			}

		}



		# Modul Kasir ==============================================================================================================================================================================================

		public static function fetch_with_tmpemohon_trjenis_permohonan_trperizinan_tmsk_for_pembayaran_retribusi($date_start, $date_finish) {

			if(!empty($date_start) && !empty($date_finish)) {

				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
				->join('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmsk.no_surat, tmpermohonan.c_status_bayar'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->where('tmbap.c_skrd', '<>', '0')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])

				->get();
			}

			else {
				return DB::table('tmpermohonan')
				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
				->join('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmsk.no_surat, tmpermohonan.c_status_bayar'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->where('tmbap.c_skrd', '<>', '0')

				->get();
			}



		}

		public static function fetch_with_tmpemohon_tmbap_trperizinan_tmsk_tmkerigananretribusi_for_pembayaran_retribusi_rincian($id) {
			return DB::table('tmpermohonan')
			->leftjoin('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

			->leftjoin('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
			->leftjoin('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

			->leftjoin('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

			->leftjoin('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
			->leftjoin('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

			->leftjoin('tmkeringananretribusi_tmpermohonan', 'tmpermohonan.id', '=', 'tmkeringananretribusi_tmpermohonan.tmpermohonan_id')
			->leftjoin('tmkeringananretribusi', 'tmkeringananretribusi_tmpermohonan.tmkeringananretribusi_id', '=', 'tmkeringananretribusi.id')

			->select(['tmpermohonan.id', 'tmpermohonan.pendaftaran_id', 'tmpemohon.n_pemohon', 'tmsk.no_surat', 'trperizinan.n_perizinan', 'tmbap.nilai_bap_awal', 'tmkeringananretribusi.v_prosentase_retribusi'])
			->where('tmpermohonan.id', '=', $id)
			->get();



		}

		# Modul Penyerahan =========================================================================================================================================================================================


		public static function fetch_with_tmpemohon_trperizinan_trjenis_permohonan_tmsk_tmbap_trkelompok_perizinan_for_penyerahan_izin($date_start, $date_finish) {

			if(!empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')

				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->join('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
				->join('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
				->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmsk.no_surat, tmsk.tgl_surat, tmsk.c_status'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')


				->where('tmpermohonan.c_izin_selesai', '=', '0')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])

				->get();
			}
			else {
				return DB::table('tmpermohonan')

				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->join('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
				->join('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
				->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmsk.no_surat, tmsk.tgl_surat, tmsk.c_status'))

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')


				->where('tmpermohonan.c_izin_selesai', '=', '0')

				->get();
			}

		}

		public static function fetch_with_tmpemohon_trperizinan_trjenis_permohonan_tmsk_tmbap_trkelompok_perizinan_for_pengajuan_salinan($date_start, $date_finish) {
			if(!empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')

				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->join('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
				->join('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
				->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '1')
				->where('tmsk.c_is_requested', '=', '0')
				->where('tmbap.status_bap', '=', '1')

				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmsk.no_surat, tmsk.tgl_surat'))
				->get();
			}
			else {
				return DB::table('tmpermohonan')

				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->join('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
				->join('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
				->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '1')
				->where('tmsk.c_is_requested', '=', '0')
				->where('tmbap.status_bap', '=', '1')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, trperizinan.n_perizinan, tmpermohonan.d_terima_berkas, tmsk.no_surat, tmsk.tgl_surat'))
				->get();

			}


		}

		public static function fetch_with_tmpemohon_trperizinan_trjenis_permohonan_tmsk_tmbap_trkelompok_perizinan_for_penyerahan_salinan($date_start, $date_finish) {
			if(!empty($date_start) && !empty($date_finish)) {
				return DB::table('tmpermohonan')

				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->join('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
				->join('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
				->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '1')
				->where('tmsk.c_is_requested', '=', '1')
				->where('tmsk.c_status_salinan', '!=', '0')
				->where('tmbap.status_bap', '=', '1')
				->whereBetween('tmpermohonan.d_terima_berkas', [$date_start, $date_finish])

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, tmpermohonan.d_terima_berkas, trperizinan.n_perizinan, tmsk.no_surat, tmsk.c_status_salinan'))
				->get();
			}
			else {
				return DB::table('tmpermohonan')

				->join('tmpemohon_tmpermohonan', 'tmpermohonan.id', '=', 'tmpemohon_tmpermohonan.tmpermohonan_id')
				->join('tmpemohon', 'tmpemohon_tmpermohonan.tmpemohon_id', '=', 'tmpemohon.id')

				->join('tmpermohonan_trperizinan', 'tmpermohonan.id', '=', 'tmpermohonan_trperizinan.tmpermohonan_id')
				->join('trperizinan', 'tmpermohonan_trperizinan.trperizinan_id', '=', 'trperizinan.id')

				->join('tmpermohonan_trjenis_permohonan', 'tmpermohonan.id', '=', 'tmpermohonan_trjenis_permohonan.tmpermohonan_id')
				->join('trjenis_permohonan', 'tmpermohonan_trjenis_permohonan.trjenis_permohonan_id', '=', 'trjenis_permohonan.id')

				->join('tmpermohonan_tmsk', 'tmpermohonan.id', '=', 'tmpermohonan_tmsk.tmpermohonan_id')
				->join('tmsk', 'tmpermohonan_tmsk.tmsk_id', '=', 'tmsk.id')

				->join('tmbap_tmpermohonan', 'tmpermohonan.id', '=', 'tmbap_tmpermohonan.tmpermohonan_id')
				->join('tmbap', 'tmbap_tmpermohonan.tmbap_id', '=', 'tmbap.id')

				->join('trkelompok_perizinan_trperizinan', 'trperizinan.id', '=', 'trkelompok_perizinan_trperizinan.trperizinan_id')
				->join('trkelompok_perizinan', 'trkelompok_perizinan_trperizinan.trkelompok_perizinan_id', '=', 'trkelompok_perizinan.id')

				->orderBy('tmpermohonan.d_terima_berkas', 'desc')
				->where('tmpermohonan.c_pendaftaran', '=', '1')
				->where('tmpermohonan.c_izin_dicabut', '=', '0')
				->where('tmpermohonan.c_izin_selesai', '=', '1')
				->where('tmsk.c_is_requested', '=', '1')
				->where('tmsk.c_status_salinan', '!=', '0')
				->where('tmbap.status_bap', '=', '1')

				->select(DB::raw('tmpermohonan.id, tmpermohonan.pendaftaran_id, tmpemohon.n_pemohon, tmpermohonan.d_terima_berkas, trperizinan.n_perizinan, tmsk.no_surat, tmsk.c_status_salinan'))
				->get();
			}

		}

		# Modul Portal =============================================================================================================================================================================================

		public static function generate_id_for_layanan_online_pendaftaran_online($date) {

			return DB::table('tmpermohonan')
			->where('d_terima_berkas', '=', $date)
			->select(DB::raw('count(id) as records'))
			->get();

		}

		public static function insert_data($data) {
			Tmpermohonan::create($data);
			return Tmpermohonan::where('pendaftaran_id', '=', $data['pendaftaran_id'])->where('d_terima_berkas', '=', $data['d_terima_berkas'])->get(['id']);

		}

	}
