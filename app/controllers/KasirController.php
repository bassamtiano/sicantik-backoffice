<?php

	class KasirController extends BaseController {

		public function __construct() {
			$this->auth_kasir();


		}

		# Kasir Authentication 	==============================================================================================

		private function auth_kasir() {

			$this->beforeFilter(function(){

				$user_type = 'kasir';

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

		# Pembayaran Retribusi 	==============================================================================================

		public function pembayaran_retribusi() {
			Session::put('current_page', 'kasir/pembayaran_retribusi');
			return View::make('kasir.pages.pembayaran_retribusi');
		}

		public function pembayaran_retribusi_data($date_start = null, $date_finish = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trjenis_permohonan_trperizinan_tmsk_for_pembayaran_retribusi($date_start, $date_finish);
		}

		public function pembayaran_retribusi_rincian_data($id) {

			$result = [];

			$permohonan = Tmpermohonan::fetch_with_tmpemohon_tmbap_trperizinan_tmsk_tmkerigananretribusi_for_pembayaran_retribusi_rincian($id);

			foreach($permohonan as $perkey => $perval) {
				foreach($perval as $k => $v) {
					$result[$k] = $v;
				}
			}

			if(!empty($result['nilai_bap_awal'])) {
				$result['nilai_retribusi'] = $result['nilai_bap_awal'] - ($result['nilai_bap_awal'] * ($result['v_prosentase_retribusi'] / 100));
			}

			else if($result['nilai_bap_awal'] == "") {
				$result['nilai_retribusi'] = 0;
			}

			return $result;
		}

		public function pembayaran_retribusi_dokumen($id) {
			$result = [];

			$permohonan = Tmpermohonan::fetch_with_tmpemohon_tmbap_trperizinan_tmsk_tmkerigananretribusi_for_pembayaran_retribusi_rincian($id);

			foreach($permohonan as $perkey => $perval) {
				foreach($perval as $k => $v) {
					$result[$k] = $v;
				}
			}

			if(!empty($result['nilai_bap_awal'])) {
				$result['nilai_retribusi'] = $result['nilai_bap_awal'] - ($result['nilai_bap_awal'] * ($result['v_prosentase_retribusi'] / 100));
			}

			else if($result['nilai_bap_awal'] == "") {
				$result['nilai_retribusi'] = 0;
			}

			return $result;

			// return View::make('kasir/dokumen/pembayaran_retribusi_dokumen', ['data' => 'aw']);
		}

	}
