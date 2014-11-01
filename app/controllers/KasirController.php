<?php

	class KasirController extends BaseController {

		public function pembayaran_retribusi() {
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

	}
