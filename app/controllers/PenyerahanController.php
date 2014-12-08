<?php

	class PenyerahanController extends BaseController {

		public function __construct() {
			$this->auth_penyerahan();
		}

		# Penyerahan Authentication 	======================================================================================

		private function auth_penyerahan() {

			$this->beforeFilter(function(){

				$user_type = 'penyerahan';

				if(!empty(Auth::user()->id)) {
					if(Session::get($user_type) == true || Session::get('administrator') == true) {
						$id = Auth::user()->id;
						$auth_id = UserUserAuth::where('user_id', '=', $id)->get(['user_auth_id']);

						$status = '';

						foreach($auth_id as $k => $v) {
							$description = UserAuth::where('id', '=', $v->user_auth_id)->get(['description']);
							foreach($description as $dk => $dv) {
								if(strtolower($dv->description) == $user_type) {
									$status = true;
								}
								else {

								}
							}
						}

						if(empty($status) && $status !== true) {
							return Redirect::intended(Session::get('current_page'));
						}
					}
					else {
						return Redirect::intended(Session::get('current_page'));
					}
				}
				else {
					return Redirect::intended('login');
				}
			});

		}

		# Penyerahan Izin 	==================================================================================================

		public function penyerahan_izin() {
			return View::make('penyerahan.pages.penyerahan_izin');
		}

		public function penyerahan_izin_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_permohonan_tmsk_tmbap_trkelompok_perizinan_for_penyerahan_izin($date_start, $date_finish);
		}

		public function penyerahan_izin_penyerahan_cetak() {
			echo 'cetak';
		}

		public function penyerahan_izin_email() {
			echo 'email to';
		}

		# Pengajuan Izin 	==================================================================================================

		public function pengajuan_salinan() {
			return View::make('penyerahan.pages.pengajuan_salinan');
		}

		public function pengajuan_salinan_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_permohonan_tmsk_tmbap_trkelompok_perizinan_for_pengajuan_salinan($date_start, $date_finish);
		}

		public function pengajuan_salinan_setujui() {

		}

		# Penyerahan Salinan 	==============================================================================================

		public function penyerahan_salinan() {
			return View::make('penyerahan.pages.penyerahan_salinan');
		}

		public function penyerahan_salinan_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_trjenis_permohonan_tmsk_tmbap_trkelompok_perizinan_for_penyerahan_salinan($date_start, $date_finish);
		}

		public function penyerahan_salinan_cetak() {

		}

	}
