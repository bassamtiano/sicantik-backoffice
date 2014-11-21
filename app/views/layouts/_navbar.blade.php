<div class="nav-row-wrapper">
	<ul class="nav-item-wrapper">
		<a class="nav-item" href="{{ URL::to('/') }}">
			<li>
				Home
			</li>
		</a>

		@if (Session::get('reporting') == true)

			<a class="nav-item">
				<li class="nav-item-sub">
					</a>Reporting</a>
					<ul class="sub-nav-item-wrapper">
						<a class="sub-nav-item" href="{{ URL::to('reporting/realisasi_penerimaan') }}"><li>Realisasi Penerimaan</li></a>
						<a class="sub-nav-item" href="{{ URL::to('reporting/rekapitulasi_pendaftaran') }}"><li>Rekapitulasi Pendaftaran</li></a>
						<a class="sub-nav-item" href="{{ URL::to('reporting/rekapitulasi_perizinan') }}"><li>Rekapitulasi Perizinan</li></a>
						<a class="sub-nav-item" href="{{ URL::to('reporting/rekapitulasi_retribusi') }}"><li>Rekapitulasi Retribusi</li></a>
						<a class="sub-nav-item" href="{{ URL::to('reporting/rekapitulasi_tinjauan_lapangan') }}"><li>Rekapitulasi Tinjauan Lapangan</li></a>
						<a class="sub-nav-item" href="{{ URL::to('reporting/rekapitulasi_berkas_kembali') }}"><li>Rekapitulasi Berkas Kembali</li></a>
						<a class="sub-nav-item" href="{{ URL::to('reporting/rekapitulasi_izin_tercetak') }}"><li>Rekapitulasi Izin Tercetak</li></a>
					</ul>
				</li>
			</a>

		@endif

		@if (Session::get('monitoring') == true)

		<a class="nav-item">
			<li class="nav-item-sub">
				<a>Monitoring</a>
				<ul class="sub-nav-item-wrapper">
					<a class="sub-nav-item" href="{{ URL::to('monitoring/per_jenis_perizinan') }}"><li>Per Jenis Perizinan</li></a>
					<a class="sub-nav-item" href="{{ URL::to('monitoring/per_jangka_waktu') }}"><li>Per Jangka Waktu</li></a>
					<a class="sub-nav-item" href="{{ URL::to('monitoring/per_desa_dan_kecamatan') }}"><li>Per Desa Dan Kecamatan</li></a>
					<a class="sub-nav-item" href="{{ URL::to('monitoring/perizinan_belum_sudah_jadi_kadaluarsa') }}"><li>Perizinan Belum/Sudah Jadi Kadaluarsa</li></a>
					<a class="sub-nav-item" href="{{ URL::to('monitoring/per_status_perizinan') }}"><li>Per Status Perizinan</li></a>
					<a class="sub-nav-item" href="{{ URL::to('monitoring/per_nama_pemohon') }}"><li>Per Nama Pemohon</li></a>
					<a class="sub-nav-item" href="{{ URL::to('monitoring/per_nama_perusahaan') }}"><li>Per Nama Perusahaan</li></a>
					<a class="sub-nav-item" href="{{ URL::to('monitoring/per_bulan_pengambilan_izin') }}"><li>Per Bulan Pengambilan Izin</li></a>
				</ul>
			</li>
		</a>

		@endif

		@if (Session::get('konfigurasi') == true)

		<a class="nav-item">
			<li class="nav-item-sub">
				<a>Konfigurasi</a>
				<ul class="sub-nav-item-wrapper">
					<a class="sub-nav-item">
						<li class="sub-nav-branch">
							<a>Setting Perizinan</a>
							<ul class="sub-nav-branch-wrapper">
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_perizinan/jenis_perizinan') }}"><li>Jenis Perizinan</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_perizinan/perizinan_paralel') }}"><li>Perizinan Paralel</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_perizinan/persyaratan_izin') }}"><li>Persyaratan Izin</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_perizinan/property_pendataan') }}"><li>Property Pendataan</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_perizinan/nilai_retribusi') }}"><li>Nilai Retribusi</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_perizinan/koefisien_tarif') }}"><li>Koefisien Tarif</li></a>

								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_perizinan/nilai_retribusi') }}"><li>Setting Tarif Retribusi</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_perizinan/koefisien_tarif') }}"><li>Setting Formula Retribusi</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_perizinan/koefisien_tarif') }}"><li>Properti Tim Teknis</li></a>
							</ul>
						</li>
					</a>
					<a class="sub-nav-item">
						<li class="sub-nav-branch">
							<a>Setting Umum</a>
							<ul class="sub-nav-branch-wrapper">
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_umum/instansi') }}"><li>Instansi</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_umum/hari_libur') }}"><li>Hari Libur</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_umum/satuan') }}"><li>Satuan</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_umum/web_service') }}"><li>Web Service</li></a>

								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_umum/web_service') }}"><li>Jenis Kegiatan</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_umum/web_service') }}"><li>Jenis Investasi</li></a>
							</ul>
						</li>
					</a>
					<a class="sub-nav-item">
						<li class="sub-nav-branch">
							<a>Setting User</a>
							<ul class="sub-nav-branch-wrapper">
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_user/pegawai') }}"><li>Pegawai</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_user/unit_kerja') }}"><li>Unit Kerja</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_user/pengguna') }}"><li>Pengguna</li></a>
							</ul>
						</li>
					</a>
					<a class="sub-nav-item">
						<li class="sub-nav-branch">
							<a>Setting Wilayah</a>
							<ul class="sub-nav-branch-wrapper">
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_wilayah/propinsi') }}"><li>Provinsi</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_wilayah/kabupaten') }}"><li>Kabupaten</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_wilayah/kecamatan') }}"><li>Kecamatan</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/setting_wilayah/kelurahan') }}"><li>Kelurahan</li></a>
							</ul>
						</li>
					</a>
					<a class="sub-nav-item">
						<li class="sub-nav-branch">
							<a>Kemanan Data</a>
							<ul class="sub-nav-branch-wrapper">
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/keamanan_data/log_activity') }}"><li>Log Activity</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/keamanan_data/backup_database') }}"><li>Backup Database</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/keamanan_data/restore_database') }}"><li>Restore Database</li></a>
							</ul>
						</li>
					</a>
					<a class="sub-nav-item">
						<li class="sub-nav-branch">
							<a>Report</a>
							<ul class="sub-nav-branch-wrapper">
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/report/report_generator') }}"><li>Report Generator</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('konfigurasi/report/report_component') }}"><li>Report Component</li></a>
							</ul>
						</li>
					</a>
				</ul>
			</li>
		</a>

		@endif

		@if (Session::get('pelayanan') == true)

		<a class="nav-item">
			<li class="nav-item-sub">
				<a>Pelayanan</a>
				<ul class="sub-nav-item-wrapper">

					<a class="sub-nav-item">
						<li class="sub-nav-branch">
							<a>Pendaftaran</a>
							<ul class="sub-nav-branch-wrapper">
								<a class="sub-nav-branch-item" href="{{ URL::to('pelayanan/pendaftaran/permohonan_sementara') }}"><li>Permohonan Sementara</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('pelayanan/pendaftaran/permohonan_izin_baru') }}"><li>Permohonan Izin Baru</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('pelayanan/pendaftaran/perubahan_izin') }}"><li>Perubahan Izin</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('pelayanan/pendaftaran/perpanjangan_izin') }}"><li>Perpanjangan Izin</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('pelayanan/pendaftaran/daftar_ulang_izin') }}"><li>Daftar Ulang Izin</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('pelayanan/pendaftaran/data_pemohon') }}"><li>Data Pemohon</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('pelayanan/pendaftaran/data_perusahaan') }}"><li>Data Perusahaan</li></a>
							</ul>
						</li>
					</a>

					<a class="sub-nav-item">
						<li class="sub-nav-branch">
							<a>Customer Service</a>
							<ul class="sub-nav-branch-wrapper">
								<a class="sub-nav-branch-item" href="{{ URL::to('pelayanan/customer_service/informasi_perizinan') }}"><li>Informasi Perizinan</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('pelayanan/customer_service/informasi_tracking') }}"><li>Informasi Tracking</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('pelayanan/customer_service/informasi_masa_berlaku') }}"><li>Informasi Masa Berlaku</li></a>
							</ul>
						</li>
					</a>

				</ul>
			</li>
		</a>

		@endif

		@if (Session::get('backoffice') == true)

		<a class="nav-item">
			<li class="nav-item-sub">
				<a>Backoffice</a>
				<ul class="sub-nav-item-wrapper">
					<a class="sub-nav-item">
						<li class="sub-nav-branch">
							<a>Pendataan</a>
							<ul class="sub-nav-branch-wrapper">
								<a class="sub-nav-branch-item" href="{{ URL::to('backoffice/pendataan/entry_data_perizinan') }}"><li>Entry Data Perizinan</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('backoffice/pendataan/penjadwalan_tinjauan') }}"><li>Penjadwalan Tinjauan</li></a>
							</ul>
						</li>
					</a>

					<a class="sub-nav-item">
						<li class="sub-nav-branch">
							<a>Tim Teknis</a>
							<ul class="sub-nav-branch-wrapper">
								<a class="sub-nav-branch-item" href="{{ URL::to('backoffice/tim_teknis/entry_hasil_tinjauan') }}"><li>Entry Hasil Tinjauan</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('backoffice/tim_teknis/pembuatan_berita_acara_pemeriksaan') }}"><li>Pembuatan Berita Acara Pemeriksaan</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('backoffice/tim_teknis/hitung_retribusi') }}"><li>Hitung Retribusi</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('backoffice/tim_teknis/rekomendasi') }}"><li>Rekomendasi</li></a>
							</ul>
						</li>
					</a>

					<a class="sub-nav-item">
						<li class="sub-nav-branch">
							<a>Penetapan</a>
							<ul class="sub-nav-branch-wrapper">
								<a class="sub-nav-branch-item" href="{{ URL::to('backoffice/penetapan/penetapan_izin') }}"><li>Penetapan Izin</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('backoffice/penetapan/pembuatan_skrd') }}"><li>Pembuatan SKRD</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('backoffice/penetapan/pembuatan_izin') }}"><li>Pembuatan Izin</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('backoffice/penetapan/layanan_ditolak') }}"><li>Layanan Ditolak</li></a>
								<a class="sub-nav-branch-item" href="{{ URL::to('backoffice/penetapan/pencabutan_izin') }}"><li>Pencabutan Izin</li></a>
							</ul>
						</li>
					</a>
				</ul>
			</li>
		</a>

		@endif

		@if (Session::get('kasir') == true)

		<a class="nav-item">
			<li class="nav-item-sub">
				<a>Kasir</a>
				<ul class="sub-nav-item-wrapper">
					<a class="sub-nav-item" href="{{ URL::to('kasir/pembayaran_retribusi') }}"><li>Pembayaran Retribusi</li></a>
				</ul>
			</li>
		</a>

		@endif

		@if (Session::get('penyerahan') == true)

		<a class="nav-item">
			<li class="nav-item-sub">
				<a>Penyerahan</a>
				<ul class="sub-nav-item-wrapper">
					<a class="sub-nav-item" href="{{ URL::to('penyerahan/penyerahan_izin') }}"><li>Penyerahan Izin</li></a>
					<a class="sub-nav-item" href="{{ URL::to('penyerahan/pengajuan_salinan') }}"><li>Pengajuan Salinan</li></a>
					<a class="sub-nav-item" href="{{ URL::to('penyerahan/penyerahan_salinan') }}"><li>Penyerahan Salinan</li></a>
				</ul>
			</li>
		</a>

		@endif

		@if (Session::get('pengaduan') == true)

		<a class="nav-item">
			<li class="nav-item-sub">
				<a>Pengaduan</a>
				<ul class="sub-nav-item-wrapper">
					<a class="sub-nav-item" href="{{ URL::to('pengaduan/daftar_pengaduan_saran') }}"><li>Daftar Pengaduan / Saran</li></a>
					<a class="sub-nav-item" href="{{ URL::to('pengaduan/persetujuan_respon_pengaduan') }}"><li>Persetujuan Respon Pengaduan</li></a>
					<a class="sub-nav-item" href="{{ URL::to('pengaduan/pengiriman_respon_pengaduan') }}"><li>Pengiriman Respon Pengaduan</li></a>
					<a class="sub-nav-item" href="{{ URL::to('pengaduan/daftar_balasan') }}"><li>Daftar Balasan</li></a>
				</ul>
			</li>
		</a>

		@endif

		<a class="nav-item" href="{{ URL::to('do_logout') }}">
			<li>
				Log Out
			</li>
		</a>
	</ul>


</div>
