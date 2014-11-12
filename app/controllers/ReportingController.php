<?php

	class ReportingController extends BaseController {

		# Realisasi Penerimaan 		====================================================================================================

		public function realisasi_penerimaan() {
			return View::make('reporting.pages.realisasi_penerimaan');
		}

		public function realisasi_penerimaan_data($date_start, $date_finish) {

			$result = [];

			$trperizinan_detail = Trperizinan::fetch_with_tmpermohonan_for_realisasi_penerimaan();

			foreach ($trperizinan_detail as $k) {
				$retribusi = Trperizinan::fetch_with_tmpermohonan_tmbap_for_realisasi_penerimaan($k->id);

				if(empty($retribusi)) {
					$jumlah_retribusi = 0;
				}
				else {

					$jumlah_retribusi = 0;

					foreach ($retribusi as $k1) {

						$keringanan = Tmpermohonan::fetch_with_tmkeringananretribusi_for_realisasi_penerimaan($k1->tmpermohonan_id, $date_start, $date_finish);

						if(empty($keringanan)) {
							$jumlah_retribusi+=$k1->nilai_bap_awal;
						}
						else {
							foreach ($keringanan as $k2) {
								$prosentase_keringanan = $k2->v_prosentase_retribusi * 0.01;
								$keringanan_retribusi = $k1->nilai_bap_awal - ($k1->nilai_bap_awal *  $prosentase_keringanan);

								$jumlah_retribusi+=$keringanan_retribusi;
							}
						}
					}
				}

				$wrapper = [
					'id' => $k->id,
					'n_perizinan' => $k->n_perizinan,
					'target_anggaran' => $k->v_perizinan,
					'realisasi_pendapatan' => $jumlah_retribusi
				];

				array_push($result, $wrapper);

			}

			return $result;
		}

		public function realisasi_penerimaan_cetak($date_start, $date_finish) {

			$surat_title = 'Laporan Realisasi Penerimaan Pertanggal ' . $date_start . ' - ' . $date_finish;
			$result = [];

			$trperizinan_detail = Trperizinan::fetch_with_tmpermohonan_for_realisasi_penerimaan();

			foreach ($trperizinan_detail as $k) {
				$retribusi = Trperizinan::fetch_with_tmpermohonan_tmbap_for_realisasi_penerimaan($k->id);

				if(empty($retribusi)) {
					$jumlah_retribusi = 0;
				}
				else {

					$jumlah_retribusi = 0;

					foreach ($retribusi as $k1) {

						$keringanan = Tmpermohonan::fetch_with_tmkeringananretribusi_for_realisasi_penerimaan($k1->tmpermohonan_id, $date_start, $date_finish);

						if(empty($keringanan)) {
							$jumlah_retribusi+=$k1->nilai_bap_awal;
						}
						else {
							foreach ($keringanan as $k2) {
								$prosentase_keringanan = $k2->v_prosentase_retribusi * 0.01;
								$keringanan_retribusi = $k1->nilai_bap_awal - ($k1->nilai_bap_awal *  $prosentase_keringanan);

								$jumlah_retribusi+=$keringanan_retribusi;
							}
						}
					}
				}

				$wrapper = [
					'id' => $k->id,
					'n_perizinan' => $k->n_perizinan,
					'target_anggaran' => $k->v_perizinan,
					'realisasi_pendapatan' => $jumlah_retribusi
				];

				array_push($result, $wrapper);

			}

			$settings = Settings::get_data_cetak();
			$header = [];

			foreach ($settings as $key) {
				$header[$key['name']] = $key['value'];
			}

			$title_kabupaten = Trkabupaten::get_nama_kabupaten($header['app_city']);

			$data = [
				'logo' => 'assets/img/logo.png',
				'title_nama' => $header['app_kantor'],
				'title_kabupaten' => $title_kabupaten,
				'title_alamat' => $header['app_alamat'],
				'title_tlp' => $header['app_tlp'],
				'title_fax' => $header['app_fax'],
				'result' => $result,
				'surat_title' => $surat_title

			];
	        $pdf = PDF::loadView('reporting.dokumen.realisasi_penerimaan', $data);
	        return $pdf->setPaper('a4')->setOrientation('portrait')->download($surat_title . '.pdf');

		}

		# Rekapitulasi Pendaftaran 	====================================================================================================

		public function rekapitulasi_pendaftaran() {
			return View::make('reporting.pages.rekapitulasi_pendaftaran');
		}

		public function rekapitulasi_pendaftaran_data($date_start = null, $date_finish = null) {
			$result = [];
			$izin = Trperizinan::fetch_data_opsi();
			foreach ($izin as $k => $v) {
				$id_perizinan = $v->id;
				$nm_perizinan = $v->n_perizinan;
				$mohon = Tmpermohonan::fetch_trperizinan_for_rekapitulasi_pendaftaran($id_perizinan,$date_start,$date_finish);
				foreach ($mohon as $ik) {
						$total = $ik->total_perizinan;
				}
			$wrapper = [
			'id' => $id_perizinan,
			'nama_perizinan' => $nm_perizinan,
			'total' => $total
			];

			array_push($result, $wrapper);
			}
			return $result;
		}

		public function rekapitulasi_pendaftaran_cetak($date_start = null, $date_finish = null ){
			$surat_title = 'Laporan Rekapitulasi Pendaftaran Per tanggal ' . $date_start . ' - ' . $date_finish;
			$result = [];
			$izin = Trperizinan::fetch_data_opsi();
			foreach ($izin as $k => $v) {
				$id_perizinan = $v->id;
				$nm_perizinan = $v->n_perizinan;
				$mohon = Tmpermohonan::fetch_trperizinan_for_rekapitulasi_pendaftaran($id_perizinan,$date_start,$date_finish);
				foreach ($mohon as $ik) {
						$total = $ik->total_perizinan;
				}
			$wrapper = [
			'id' => $id_perizinan,
			'nama_perizinan' => $nm_perizinan,
			'total' => $total
			];

			array_push($result, $wrapper);
			}

		$settings = Settings::get_data_cetak();
		$header = [];

			foreach ($settings as $key) {
			$header[$key['name']] = $key['value'];
			}
		$title_kabupaten = Trkabupaten::get_nama_kabupaten($header['app_city']);
		
		$data = [
				'logo' => 'assets/img/logo.png',
				'title_nama' => $header['app_kantor'],
				'title_kabupaten' => $title_kabupaten,
				'title_alamat' => $header['app_alamat'],
				'title_tlp' => $header['app_tlp'],
				'title_fax' => $header['app_fax'],
				'result' => $result,
				'surat_title' => $surat_title

			];
			// return View::make('reporting.dokumen.realisasi_penerimaan', $data);



	    $pdf = PDF::loadView('reporting.dokumen.rekapitulasi_pendaftaran', $data);
	    return $pdf->setPaper('a4')->setOrientation('portrait')->download($surat_title . '.pdf');

		}

		public function rekapitulasi_pendaftaran_detail_data($id,$date_start,$date_finish){
			$result = [];
			$izin = Tmpermohonan::fetch_with_trperizinan_trstspermohonan_for_rekapitulasi_pendaftaran_detail($id,$date_start,$date_finish);
			foreach ($izin as $k => $v) {
				$tanggal = $v->d_terima_berkas;
				foreach ($v as $key => $value) {
					$format = '';
					if ($key == 'd_terima_berkas') {
						$wrapper['d_terima_berkas'] = $this->IDDate($value);
					}
					else{
						$wrapper[$key] = $value;
					}
				}
				array_push($result, $wrapper);
			}
			return $result;
		}

		# Rekapitulasi Perizinan 	====================================================================================================

		public function rekapitulasi_perizinan() {
			return View::make('reporting.pages.rekapitulasi_perizinan');
		}

		public function rekapitulasi_perizinan_data($date_start = null, $date_finish = null) {
			/* disini */


			$jumlah_terbit = 0;
			$jumlah_tolak = 0;
			$terbit_ambil = 0;
			$tolak_ambil = 0;
			$terbit_proses = 0;
			$tolak_proses = 0;

			$wrapper = [];
			$result = [];

			$perizinan = Trperizinan::fetch_data(['id', 'n_perizinan', 'v_perizinan']);
			foreach($perizinan as $pkey => $pval) {
				$id_perizinan = $pval['id'];
				$wrapper['id_perizinan'] = $id_perizinan;
				$wrapper['n_perizinan'] = $pval['n_perizinan'];

				$jumlah_masuk = Tmpermohonan::fetch_with_trperzinan_trstspermohonan_for_rekapitulasi_perizinan_jumlah_masuk($id_perizinan);
				foreach($jumlah_masuk as $jmk => $jmv) {
					$wrapper['izin_masuk'] = $jmv->jumlah_masuk;
				}

				$jumlah_proses = Tmpermohonan::fetch_with_trperizinan_trstspermohonan_for_rekapitulasi_perizinan_jumlah_proses($id_perizinan, $date_start, $date_finish);

				if(!empty($jumlah_proses)) {
					foreach($jumlah_proses as $jpk => $jpv) {
						foreach($jpv as $k => $v) {
							if($jpv->status_bap == '1') {

								// echo 'kesatu ';

								$jumlah_terbit++;

								if($jpv->c_izin_selesai == '1') {
									// echo 'yes 1 <br>';
									$terbit_ambil++;
								}
								else {
									// echo 'yes 2 <br>';
									$terbit_proses++;
								}
							}
							else if($jpv->status_bap == '2') {

								// echo 'kedua ';

								$jumlah_tolak++;

								if($jpv->c_izin_selesai == '1') {
									// echo 'no 1 <br>';
									$tolak_ambil++;
								}
								else {
									// echo 'no 2 <br>';
									$tolak_proses++;
								}
							}

							$wrapper['terbit_jumlah'] = $jumlah_terbit;
							$wrapper['terbit_diambil'] = $terbit_ambil;
							$wrapper['terbit_belum_diambil'] = $terbit_proses;

							$wrapper['tolak_jumlah'] = $jumlah_tolak;
							$wrapper['tolak_ambil'] = $tolak_ambil;
							$wrapper['tolak_belum_diambil'] = $tolak_proses;
						}


					}
				}
				else {
					$wrapper['terbit_jumlah'] = 0;
					$wrapper['terbit_diambil'] = 0;
					$wrapper['terbit_belum_diambil'] = 0;

					$wrapper['tolak_jumlah'] = 0;
					$wrapper['tolak_ambil'] = 0;
					$wrapper['tolak_belum_diambil'] = 0;
				}

				$wrapper['izin_dalam_proses'] = $wrapper['izin_masuk'] - ($wrapper['terbit_jumlah'] + $wrapper['tolak_jumlah']);

				array_push($result, $wrapper);


				$jumlah_terbit = 0;
				$jumlah_tolak = 0;
				$terbit_ambil = 0;
				$tolak_ambil = 0;
				$terbit_proses = 0;
				$tolak_proses = 0;
			}

			return $result;
		}

		public function rekapitulasi_perizinan_cetak() {

		}

	# Rekapitulasi Retribusi 	====================================================================================================

		public function rekapitulasi_retribusi() {
			return View::make('reporting.pages.rekapitulasi_retribusi');
		}

		public function rekapitulasi_retribusi_data($date_start = null, $date_finish = null) {
			$result = [];
			$terbayar = 0;
			$retribusi = 0;
			$izin = Trperizinan::fetch_with_trkelompok_perizinan_for_rekapitulasi_retribusi();
			foreach ($izin as $k => $v) {
				$id_izin = $v->id;
				$n_izin = $v->n_perizinan;
				//$izin_jadi = $v->izin_jadi;
				$mohon = Tmpermohonan::fetch_with_tmbap_trperizinan_for_rekapitulasi_retribusi($id_izin,$date_start,$date_finish);
				foreach ($mohon as $ik) {

						if (empty($ik->bayar)) {
							$retribusi = 0;
						}
						else{
							$retribusi = $ik->bayar;
						}

						$izin_jadi = $ik->izin_jadi;
						$bayar = Tmpermohonan::fetch_with_tmpermohonan_trperizinan_bayar_for_rekapitulasi_retribusi($id_izin,$date_start,$date_finish);
						foreach ($bayar as $in) {
						//$terbayar = $in->retribusi;
							if (empty($in->retribusi)) {
								$terbayar = 0;
							}
							else{
								$terbayar = $in->retribusi;
							}
						}
						$terhutang = $retribusi - $terbayar;

				}

			 $wrapper = [
			 'nama_perizinan' => $n_izin,
			 'izin_jadi' => $izin_jadi,
			 'retribusi_total' => $retribusi,
			 'terbayarkan' => $terbayar,
			 'terhutangkan' => $terhutang
			 ];

			 array_push($result, $wrapper);
			}
			return $result;
		}

		public function rekapitulasi_retribusi_cetak($date_start = null, $date_finish = null) {
			$surat_title = 'Laporan Rekapitulasi Retribusi Per tanggal ' . $date_start . ' - ' . $date_finish;
			$result = [];
			$terbayar = 0;
			$retribusi = 0;
			$izin = Trperizinan::fetch_with_trkelompok_perizinan_for_rekapitulasi_retribusi();
			foreach ($izin as $k => $v) {
				$id_izin = $v->id;
				$n_izin = $v->n_perizinan;
				//$izin_jadi = $v->izin_jadi;
				$mohon = Tmpermohonan::fetch_with_tmbap_trperizinan_for_rekapitulasi_retribusi($id_izin,$date_start,$date_finish);
				foreach ($mohon as $ik) {

						if (empty($ik->bayar)) {
							$retribusi = 0;
						}
						else{
							$retribusi = $ik->bayar;
						}

						$izin_jadi = $ik->izin_jadi;
						$bayar = Tmpermohonan::fetch_with_tmpermohonan_trperizinan_bayar_for_rekapitulasi_retribusi($id_izin,$date_start,$date_finish);
						foreach ($bayar as $in) {
						//$terbayar = $in->retribusi;
							if (empty($in->retribusi)) {
								$terbayar = 0;
							}
							else{
								$terbayar = $in->retribusi;
							}
						}
						$terhutang = $retribusi - $terbayar;

				}

			 $wrapper = [
			 'nama_perizinan' => $n_izin,
			 'izin_jadi' => $izin_jadi,
			 'retribusi_total' => $retribusi,
			 'terbayarkan' => $terbayar,
			 'terhutangkan' => $terhutang
			 ];
			 array_push($result, $wrapper);
			}
		$settings = Settings::get_data_cetak();
		$header = [];
			foreach ($settings as $key) {
				$header[$key['name']] = $key['value'];
			}
		$title_kabupaten = Trkabupaten::get_nama_kabupaten($header['app_city']);
		$data = [
				'logo' => 'assets/img/logo.png',
				'title_nama' => $header['app_kantor'],
				'title_kabupaten' => $title_kabupaten,
				'title_alamat' => $header['app_alamat'],
				'title_tlp' => $header['app_tlp'],
				'title_fax' => $header['app_fax'],
				'result' => $result,
				'surat_title' => $surat_title

			];
			// return View::make('reporting.dokumen.realisasi_penerimaan', $data);
	    $pdf = PDF::loadView('reporting.dokumen.rekapitulasi_retribusi', $data);
	    return $pdf->setPaper('a4')->setOrientation('portrait')->download($surat_title . '.pdf');

		}

		# Rekaputulasi Tinjuanan Lapangan 	============================================================================================

		public function rekapitulasi_tinjauan_lapangan() {
			return View::make('reporting.pages.rekapitulasi_tinjauan_lapangan');
		}

		public function rekapitulasi_tinjauan_lapangan_data($tanggal_awal = null, $tanggal_akhir = null) {
			return Tmpermohonan::fetch_with_tmpemohon_trperizinan_tmperusahaan_for_rekapitulasi_tinjauan_lapangan($tanggal_awal, $tanggal_akhir);
		}

		public function rekapitulasi_tinjauan_lapangan_cetak($tanggal_awal, $tanggal_akhir) {
			$surat_title = 'Laporan Rekapitulasi Tinjauan Lapangan Per tanggal ' . $tanggal_awal . ' - ' . $tanggal_akhir;
			$result = Tmpermohonan::fetch_with_tmpemohon_trperizinan_tmperusahaan_for_rekapitulasi_tinjauan_lapangan($tanggal_awal, $tanggal_akhir);
			$settings = Settings::get_data_cetak();
			$header = [];
				foreach ($settings as $key) {
					$header[$key['name']] = $key['value'];
				}
			$title_kabupaten = Trkabupaten::get_nama_kabupaten($header['app_city']);
			$data = [
				'logo' => 'assets/img/logo.png',
				'title_nama' => $header['app_kantor'],
				'title_kabupaten' => $title_kabupaten,
				'title_alamat' => $header['app_alamat'],
				'title_tlp' => $header['app_tlp'],
				'title_fax' => $header['app_fax'],
				'result' => $result,
				'surat_title' => $surat_title

			];
			// return View::make('reporting.dokumen.realisasi_penerimaan', $data);
	    	$pdf = PDF::loadView('reporting.dokumen.rekapitulasi_tinjauan_lapangan', $data);
	    	return $pdf->setPaper('a4')->setOrientation('portrait')->download($surat_title . '.pdf');
		}

		# Rekapitulasi Berkas Kembali 	================================================================================================

		public function rekapitulasi_berkas_kembali() {
			return View::make('reporting.pages.rekapitulasi_berkas_kembali');
		}

		public function rekapitulasi_berkas_kembali_data($tanggal_awal = null, $tanggal_akhir = null) {
			return Tmpermohonan::fetch_with_tmpemohon_tmperizinan_tmbap_for_rekapitulasi_berkas_kembali($tanggal_awal, $tanggal_akhir);
		}

		public function rekapitulasi_berkas_kembali_cetak() {
			$surat_title = 'Laporan Rekapitulasi Berkas Kembali Per tanggal ' . $tanggal_awal . ' - ' . $tanggal_akhir;
			$result = Tmpermohonan::fetch_with_tmpemohon_tmperizinan_tmbap_for_rekapitulasi_berkas_kembali($tanggal_awal, $tanggal_akhir);
			$settings = Settings::get_data_cetak();
			$header = [];
				foreach ($settings as $key) {
					$header[$key['name']] = $key['value'];
				}
			$title_kabupaten = Trkabupaten::get_nama_kabupaten($header['app_city']);
			$data = [
				'logo' => 'assets/img/logo.png',
				'title_nama' => $header['app_kantor'],
				'title_kabupaten' => $title_kabupaten,
				'title_alamat' => $header['app_alamat'],
				'title_tlp' => $header['app_tlp'],
				'title_fax' => $header['app_fax'],
				'result' => $result,
				'surat_title' => $surat_title

			];
			// return View::make('reporting.dokumen.realisasi_penerimaan', $data);
	    	$pdf = PDF::loadView('reporting.dokumen.rekapitulasi_berkas_kembali', $data);
	    	return $pdf->setPaper('a4')->setOrientation('portrait')->download($surat_title . '.pdf');
		}

		# Rekapitulasi Izin Tercetak	================================================================================================

		public function rekapitulasi_izin_tercetak() {
			return View::make('reporting.pages.rekapitulasi_izin_tercetak');
		}

		public function rekapitulasi_izin_tercetak_data($tanggal_awal = null, $tanggal_akhir = null) {
			// $tanggal_awal = '2005-01-01';
			// $tanggal_akhir = '2014-10-01';



			// return Tmpermohonan::fetch_with_tmpemohon_tmperusahaan_tmperizinan_for_rekapitulasi_izin_cetak($tanggal_awal, $tanggal_akhir);
			return Tmpermohonan::fetch_with_tmpemohon_tmperusahaan_tmperizinan_for_rekapitulasi_izin_cetak($tanggal_awal, $tanggal_akhir);
		}

		public function rekapitulasi_izin_tercetak_cetak() {

		}

	}
