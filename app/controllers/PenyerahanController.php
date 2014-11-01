<?php

	class PenyerahanController extends BaseController {
		
		# Penyerahan Izin 	==================================================================================================

		public function penyerahan_izin() {
			return View::make('penyerahan.pages.penyerahan_izin');
		}

		public function penyerahan_izin_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_permohonan_tmsk_tmbap_trkelompok_perizinan_for_penyerahan_izin($date_start, $date_finish);
		}
		
		# Pengajuan Izin 	==================================================================================================

		public function pengajuan_salinan() {
			return View::make('penyerahan.pages.pengajuan_salinan');
		}

		public function pengajuan_salinan_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_permohonan_tmsk_tmbap_trkelompok_perizinan_for_pengajuan_salinan($date_start, $date_finish);
		}

		# Penyerahan Salinan 	==============================================================================================

		public function penyerahan_salinan() {
			return View::make('penyerahan.pages.penyerahan_salinan');
		}

		public function penyerahan_salinan_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_permohonan_tmsk_tmbap_trkelompok_perizinan_for_penyerahan_salinan($date_start, $date_finish);
		}


	}