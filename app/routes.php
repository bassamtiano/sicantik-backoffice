<?php

/*


	Tambahan

	1. Konfiguras / Report / *
	2. Portal / *


*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::get('testpdf', ['as' => 'test_pdf', 'uses' => 'HomeController@testpdf']);

/*

	Route Modul Dokumen Generator

*/

Route::get('dokumen', array('as' => 'dokumen', 'uses' => 'DokumenController@index'));

/*

	Route Modul Login

*/

Route::get('/login', ['as' => 'login', 'uses' => 'AdminController@login']);

/*

	Route Modul Home

*/

Route::get('home', array('as' => 'home', 'uses' => 'HomeController@index'));

/*

	Route Modul Reporting done

*/

# Reporting / Realisasi Penerimaan

Route::get('reporting/realisasi_penerimaan', ['as' => 'reporting_relisasi_penerimaan', 'uses' => 'ReportingController@realisasi_penerimaan']);

Route::get('reporting/realisasi_penerimaan/data/{date_start}/{date_finish}', ['as' => 'reporting_realisasi_penerimaan_data', 'uses' => 'ReportingController@realisasi_penerimaan_data']);

Route::get('reporting/realisasi_penerimaan/cetak/{date_start}/{date_finish}', ['as' => 'reporting_realisasi_penerimaan_cetak', 'uses' => 'ReportingController@realisasi_penerimaan_cetak']);

# Reporting / Rekapitulasi Pendaftaran

Route::get('reporting/rekapitulasi_pendaftaran', ['as' => 'reporting_rekapitulasi__pendaftaran', 'uses' => 'ReportingController@rekapitulasi_pendaftaran']);

Route::get('reporting/rekapitulasi_pendaftaran/data/{date_start}/{date_finish}', ['as' => 'reporting_rekapitulasi__pendaftaran_data', 'uses' => 'ReportingController@rekapitulasi_pendaftaran_data']);

Route::get('reporting/rekapitulasi_pendaftaran/cetak', ['as' => 'reporting_rekapitulasi__pendaftaran_cetak', 'uses' => 'ReportingController@rekapitulasi_pendaftaran_cetak']);

Route::get('reporting/rekapitulasi_pendaftaran/data/detail/{id}/{date_start}/{date_finish}', ['as' => 'reporting_rekapitulasi_perizinan_data_detail', 'uses' => 'ReportingController@rekapitulasi_pendaftaran_detail_data']);

# Reporting / Rekapitulasi Perizinan

Route::get('reporting/rekapitulasi_perizinan', ['as' => 'reporting_rekapitulasi_perizinan', 'uses' => 'ReportingController@rekapitulasi_perizinan']);

Route::get('reporting/rekapitulasi_perizinan/data', ['as' => 'reporting_rekapitulasi_perizinan_data', 'uses' => 'ReportingController@rekapitulasi_perizinan_data']);

Route::get('reporting/rekapitulasi_perizinan/data/{date_start}/{date_finish}', ['as' => 'reporting_rekapitulasi_perizinan_data', 'uses' => 'ReportingController@rekapitulasi_perizinan_data']);

Route::get('reporting/rekapitulasi_perizinan/cetak', ['as' => 'reporting_rekapitulasi_perizinan_cetak', 'uses' => 'ReportingController@rekapitulasi_perizinan_cetak']);

# Reporting / Rekapitulasi Retribusi

Route::get('reporting/rekapitulasi_retribusi', ['as' => 'reporting_rekapitulasi_retribusi', 'uses' => 'ReportingController@rekapitulasi_retribusi']);

Route::get('reporting/rekapitulasi_retribusi/data/{date_start}/{date_finish}', ['as' => 'reporting_rekapitulasi_retribusi/data', 'uses' => 'ReportingController@rekapitulasi_retribusi_data']);

Route::get('reporting/rekapitulasi_retribusi/cetak', ['as' => 'reporting_rekapitulasi_retribusi/cetak', 'uses' => 'ReportingController@rekapitulasi_retribusi_cetak']);

# Reporting / Rekapitulasi Tinjauan Lapangan

Route::get('reporting/rekapitulasi_tinjauan_lapangan', ['as' => 'reporting_rekapitulasi_tinjauan_lapangan', 'uses' => 'ReportingController@rekapitulasi_tinjauan_lapangan']);

Route::get('reporting/rekapitulasi_tinjauan_lapangan/data', ['as' => 'reporting_rekapitulasi_tinjauan_lapangan_data', 'uses' => 'ReportingController@rekapitulasi_tinjauan_lapangan_data']);

Route::get('reporting/rekapitulasi_tinjauan_lapangan/data/{tanggal_awal}/{tanggal_akhir}', ['as' => 'reporting_rekapitulasi_tinjauan_lapangan_data', 'uses' => 'ReportingController@rekapitulasi_tinjauan_lapangan_data']);

Route::get('reporting/rekapitulasi_tinjauan_lapangan/cetak', ['as' => 'reporting_rekapitulasi_tinjauan_lapangan_cetak', 'uses' => 'ReportingController@rekapitulasi_tinjauan_lapangan_cetak']);

# Reporting / Rekapitulasi Berkas Kembali

Route::get('reporting/rekapitulasi_berkas_kembali', ['as' => 'reporting_rekapitulasi_berkas_kembali', 'uses' => 'ReportingController@rekapitulasi_berkas_kembali']);

Route::get('reporting/rekapitulasi_berkas_kembali/data', ['as' => 'reporting_rekapitulasi_berkas_kembali_data', 'uses' => 'ReportingController@rekapitulasi_berkas_kembali_data']);

Route::get('reporting/rekapitulasi_berkas_kembali/data/{tanggal_awal}/{tanggal_akhir}', ['as' => 'reporting_rekapitulasi_berkas_kembali_data', 'uses' => 'ReportingController@rekapitulasi_berkas_kembali_data']);

Route::get('reporting/rekapitulasi_berkas_kembali/cetak', ['as' => 'reporting_rekapitulasi_berkas_kembali_cetak', 'uses' => 'ReportingController@rekapitulasi_berkas_kembali_cetak']);

# Reporting / Rekapitulasi Izin Cetak

Route::get('reporting/rekapitulasi_izin_tercetak', ['as' => 'reporting_rekapitulasi_izin_cetak', 'uses' => 'ReportingController@rekapitulasi_izin_tercetak']);

Route::get('reporting/rekapitulasi_izin_tercetak/data', ['as' => 'reporting_rekapitulasi_izin_tercetak_data', 'uses' => 'ReportingController@rekapitulasi_izin_tercetak_data']);

Route::get('reporting/rekapitulasi_izin_tercetak/data/{tanggal_awal}/{tanggal_akhir}', ['as' => 'reporting_rekapitulasi_izin_tercetak_data', 'uses' => 'ReportingController@rekapitulasi_izin_tercetak_data']);

Route::get('reporting/rekapitulasi_izin_tercetak/cetak', ['as' => 'reporting_rekapitulasi_izin_tercetak_cetak', 'uses' => 'ReportingController@rekapitulasi_izin_tercetak_cetak']);

/*

	Route Modul Monitoring done

*/

# Monitoring / Per Jenis Perizinan (Rubah Controller) (Data Belum Muncul)

Route::get('monitoring/per_jenis_perizinan', ['as' => 'monitoring_per_jenis_perizinan', 'uses' => 'MonitoringController@per_jenis_perizinan']);

Route::get('monitoring/per_jenis_perizinan/data', ['as' => 'monitoring_per_jenis_perizinan_data', 'uses' => 'MonitoringController@per_jenis_perizinan_data']);

Route::get('monitoring/per_jenis_perizinan/data/{date_start}/{date_finish}/{id}', ['as' => 'monitoring_per_jenis_perizinan_data', 'uses' => 'MonitoringController@per_jenis_perizinan_data']);

Route::get('monitoring/per_jenis_perizinan/datacombo', ['as' => 'monitoring_per_jenis_perizinan_datacombo', 'uses' => 'MonitoringController@per_jenis_perizinan_datacombo']);

# Monitoring / Per Jangka Waktu (Data Belum Muncul)

Route::get('monitoring/per_jangka_waktu', ['as' => 'monitoring_per_jangka_waktu', 'uses' => 'MonitoringController@per_jangka_waktu']);

Route::get('monitoring/per_jangka_waktu/data', ['as' => 'monitoring_per_jangka_waktu_data', 'uses' => 'MonitoringController@per_jangka_waktu_data']);

Route::get('monitoring/per_jangka_waktu/data/{date_start}/{date_finish}', ['as' => 'monitoring_per_jangka_waktu_data', 'uses' => 'MonitoringController@per_jangka_waktu_data']);

# Monitoring / Per Desa dan Kecamatan (Rubah Controller) (Belum Bisa Sorting)

Route::get('monitoring/per_desa_dan_kecamatan', ['as' => 'monitoring_per_desa_dan_kecamatan', 'uses' => 'MonitoringController@per_desa_dan_kecamatan']);

Route::get('monitoring/per_desa_dan_kecamatan/data', ['as' => 'monitoring_per_desa_dan_kecamatan_data', 'uses' => 'MonitoringController@per_desa_dan_kecamatan_data']);

# Monitoring / Perizinan Belum Sudah Jadi Kadaluarsa (Filter Masih Belum Bekerja)

Route::get('monitoring/perizinan_belum_sudah_jadi_kadaluarsa', ['as' => 'monitoring_perizinan_belum_sudah_jadi_kadaluarsa', 'uses' => 'MonitoringController@perizinan_belum_sudah_jadi_kadaluarsa']);

Route::get('monitoring/perizinan_belum_sudah_jadi_kadaluarsa/data', ['as' => 'monitoring_perizinan_belum_sudah_jadi_kadaluarsa_data', 'uses' => 'MonitoringController@perizinan_belum_sudah_jadi_kadaluarsa_data']);

Route::get('monitoring/perizinan_belum_sudah_jadi_kadaluarsa/data/{dt}/{date_start}/{date_finish}', ['as' => 'monitoring_perizinan_belum_sudah_jadi_kadaluarsa_data', 'uses' => 'MonitoringController@perizinan_belum_sudah_jadi_kadaluarsa_data']);

# Monitoring / Per Status Perizinan (/datacombo diganti jadi /opsi_perizinan) (Filter Masih Belum Bekerja)

Route::get('monitoring/per_status_perizinan', ['as' => 'monitoring_per_status_perizinan', 'uses' => 'MonitoringController@per_status_perizinan']);

Route::get('monitoring/per_status_perizinan/data', ['as' => 'monitoring_per_status_perizinan_data', 'uses' => 'MonitoringController@per_status_perizinan_data']);

Route::get('monitoring/per_status_perizinan/datacombo', ['as' => 'monitoring_per_status_perizinan_datacombo', 'uses' => 'MonitoringController@per_status_perizinan_datacombo']);

Route::get('monitoring/per_status_perizinan/data/{id}/{date_start}/{date_finish}', ['as' => 'monitoring_per_status_perizinan_data', 'uses' => 'MonitoringController@per_status_perizinan_data']);

# Monitoring / Per Nama Pemohon

Route::get('monitoring/per_nama_pemohon', ['as' => 'monitoring_per_nama_pemohon', 'uses' => 'MonitoringController@per_nama_pemohon']);

Route::get('monitoring/per_nama_pemohon/data', ['as' => 'monitoring_per_nama_pemohon_data', 'uses' => 'MonitoringController@per_nama_pemohon_data']);

Route::get('monitoring/per_nama_pemohon/data/{n_pemohon}/{date_start}/{date_finish}', ['as' => 'monitoring_per_nama_pemohon_data', 'uses' => 'MonitoringController@per_nama_pemohon_data']);

# Monitoring / Per Nama Perusahaan (Belum ada Filter)

Route::get('monitoring/per_nama_perusahaan', ['as' => 'monitoring_per_nama_perusahaan', 'uses' => 'MonitoringController@per_nama_perusahaan']);

Route::get('monitoring/per_nama_perusahaan/data', ['as' => 'monitoring_per_nama_perusahaan_data', 'uses' => 'MonitoringController@per_nama_perusahaan_data']);

Route::get('monitoring/per_nama_perusahaan/data/{n_perusahaan}/{date_start}/{date_finish}', ['as' => 'monitoring_per_nama_perusahaan_data', 'uses' => 'MonitoringController@per_nama_perusahaan_data']);

# Monitoring / Per Bulan Pengambilan Izin (di perjelas opsi untuk siapa)

Route::get('monitoring/per_bulan_pengambilan_izin', ['as' => 'monitoring_per_bulan_pengambilan_izin', 'uses' => 'MonitoringController@per_bulan_pengambilan_izin']);

Route::get('monitoring/per_bulan_pengambilan_izin/data', ['as' => 'monitoring_per_bulan_pengambilan_izin_data', 'uses' => 'MonitoringController@per_bulan_pengambilan_izin_data']);

Route::get('monitoring/per_bulan_pengambilan_izin/data/{id}/{date_start}/{date_finish}', ['as' => 'monitoring_per_bulan_pengambilan_izin_data', 'uses' => 'MonitoringController@per_bulan_pengambilan_izin_data']);

Route::get('monitoring/per_bulan_pengambilan_izin/opsi', ['as' => 'monitoring_per_bulan_pengambilan_izin_opsi', 'uses' => 'MonitoringController@per_bulan_pengambilan_izin_opsi']);

/*

	Route Modul Konfigurasi done

*/

# Konfigurasi / Setting Perizinan / Jenis Perizinan

/*

	Detail Done

*/

Route::get('konfigurasi/setting_perizinan/jenis_perizinan', ['as' => 'konfigurasi_setting_perizinan_jenis_perizinan', 'uses' => 'KonfigurasiController@setting_perizinan_jenis_perizinan']);

Route::get('konfigurasi/setting_perizinan/jenis_perizinan/data', ['as' => 'konfigurasi_setting_perizinan_jenis_perizinan_data', 'uses' => 'KonfigurasiController@setting_perizinan_jenis_perizinan_data']);

Route::get('konfigurasi/setting_perizinan/jenis_perizinan/data/{id}', ['as' => 'konfigurasi_setting_perizinan_jenis_perizinan_data', 'uses' => 'KonfigurasiController@setting_perizinan_jenis_perizinan_data']);

Route::get('konfigurasi/setting_perizinan/jenis_perizinan/insert', ['as' => 'konfigurasi_setting_perizinan_jenis_perizinan_data', 'uses' => 'KonfigurasiController@setting_perizinan_jenis_perizinan_insert']);

Route::get('konfigurasi/setting_perizinan/jenis_perizinan/opsi_kelompok', ['as' => 'konfigurasi_setting_perizinan_jenis_perizinan_opsi_kelompok', 'uses' => 'KonfigurasiController@setting_perizinan_jenis_perizinan_opsi_kelompok']);

Route::get('konfigurasi/setting_perizinan/jenis_perizinan/opsi_unitkerja', ['as' => 'konfigurasi_setting_perizinan_jenis_perizinan_opsi_unitkerja', 'uses' => 'KonfigurasiController@setting_perizinan_jenis_perizinan_opsi_unitkerja']);

Route::get('konfigurasi/setting_perizinan/jenis_perizinan/edit', ['as' => 'konfigurasi_setting_perizinan_jenis_perizinan_edit', 'uses' => 'KonfigurasiController@setting_perizinan_jenis_perizinan_edit']);

Route::get('konfigurasi/setting_perizinan/jenis_perizinan/edit/data/{id}', ['as' => 'konfigurasi_setting_perizinan_jenis_perizinan_edit_data', 'uses' => 'KonfigurasiController@setting_perizinan_jenis_perizinan_edit_data']);

Route::get('konfigurasi/setting_perizinan/jenis_perizinan/delete', ['as' => 'konfigurasi_setting_perizinan_jenis_perizinan_data', 'uses' => 'KonfigurasiController@setting_perizinan_jenis_perizinan_delete']);

# Konfigurasi / Setting Perizinan / Perizinan Paralel

Route::get('konfigurasi/setting_perizinan/perizinan_paralel', ['as' => 'konfigurasi_setting_perizinan_perizinan_paralel', 'uses' => 'KonfigurasiController@setting_perizinan_perizinan_paralel']);

Route::get('konfigurasi/setting_perizinan/perizinan_paralel/data', ['as' => 'konfigurasi_setting_perizinan_perizinan_paralel', 'uses' => 'KonfigurasiController@setting_perizinan_perizinan_paralel_data']);

Route::get('konfigurasi/setting_perizinan/perizinan_paralel/data/{id}', ['as' => 'konfigurasi_setting_perizinan_perizinan_paralel', 'uses' => 'KonfigurasiController@setting_perizinan_perizinan_paralel_data']);

Route::get('konfigurasi/setting_perizinan/perizinan_paralel/insert', ['as' => 'konfigurasi_setting_perizinan_perizinan_paralel', 'uses' => 'KonfigurasiController@setting_perizinan_perizinan_paralel_insert']);

Route::get('konfigurasi/setting_perizinan/perizinan_paralel/update', ['as' => 'konfigurasi_setting_perizinan_perizinan_paralel', 'uses' => 'KonfigurasiController@setting_perizinan_perizinan_paralel_update']);

Route::get('konfigurasi/setting_perizinan/perizinan_paralel/delete', ['as' => 'konfigurasi_setting_perizinan_perizinan_paralel', 'uses' => 'KonfigurasiController@setting_perizinan_perizinan_paralel_delete']);

# Konfigurasi / Setting Perizinan / Persyaratan Izin

Route::get('konfigurasi/setting_perizinan/persyaratan_izin', ['as' => 'konfigurasi_setting_perizinan_persyaratan_izin', 'uses' => 'KonfigurasiController@setting_perizinan_persyaratan_izin']);

Route::get('konfigurasi/setting_perizinan/persyaratan_izin/data', ['as' => 'konfigurasi_setting_perizinan_persyaratan_izin', 'uses' => 'KonfigurasiController@setting_perizinan_persyaratan_izin_data']);

Route::get('konfigurasi/setting_perizinan/persyaratan_izin/insert', ['as' => 'konfigurasi_setting_perizinan_persyaratan_izin', 'uses' => 'KonfigurasiController@setting_perizinan_persyaratan_izin_insert']);

Route::get('konfigurasi/setting_perizinan/persyaratan_izin/update', ['as' => 'konfigurasi_setting_perizinan_persyaratan_izin', 'uses' => 'KonfigurasiController@setting_perizinan_persyaratan_izin_update']);

Route::get('konfigurasi/setting_perizinan/persyaratan_izin/update/data/{id}', ['as' => 'konfigurasi_setting_perizinan_persyaratan_izin', 'uses' => 'KonfigurasiController@setting_perizinan_persyaratan_izin_update_data']);

Route::get('konfigurasi/setting_perizinan/persyaratan_izin/update/data/update/data/{trsyarat_perizinan_id}/{trperizinan_id}', ['as' => 'konfigurasi_setting_perizinan_persyaratan_izin', 'uses' => 'KonfigurasiController@setting_perizinan_persyaratan_izin_update_data_update_data']);

Route::get('konfigurasi/setting_perizinan/persyaratan_izin/delete', ['as' => 'konfigurasi_setting_perizinan_persyaratan_izin', 'uses' => 'KonfigurasiController@setting_perizinan_persyaratan_izin_delete']);

# Konfigurasi / Setting Perizinan / Property Pendataan

Route::get('konfigurasi/setting_perizinan/property_pendataan', ['as' => 'konfigurasi_setting_perizinan_property_pendataan', 'uses' => 'KonfigurasiController@setting_perizinan_property_pendataan']);

Route::get('konfigurasi/setting_perizinan/property_pendataan/data', ['as' => 'konfigurasi_setting_perizinan_property_pendataan', 'uses' => 'KonfigurasiController@setting_perizinan_property_pendataan_data']);

Route::get('konfigurasi/setting_perizinan/property_pendataan/insert', ['as' => 'konfigurasi_setting_perizinan_property_pendataan', 'uses' => 'KonfigurasiController@setting_perizinan_property_pendataan_insert']);

Route::get('konfigurasi/setting_perizinan/property_pendataan/update', ['as' => 'konfigurasi_setting_perizinan_property_pendataan', 'uses' => 'KonfigurasiController@setting_perizinan_property_pendataan_update']);

Route::get('konfigurasi/setting_perizinan/property_pendataan/delete', ['as' => 'konfigurasi_setting_perizinan_property_pendataan', 'uses' => 'KonfigurasiController@setting_perizinan_property_pendataan_update']);

# Konfigurasi / Setting Perizinan / Nilai Retribusi

Route::get('konfigurasi/setting_perizinan/nilai_retribusi', ['as' => 'konfigurasi_setting_perizinan_nilai_retribusi', 'uses' => 'KonfigurasiController@setting_perizinan_nilai_retribusi']);

Route::get('konfigurasi/setting_perizinan/nilai_retribusi/data', ['as' => 'konfigurasi_setting_perizinan_nilai_retribusi', 'uses' => 'KonfigurasiController@setting_perizinan_nilai_retribusi_data']);

Route::get('konfigurasi/setting_perizinan/nilai_retribusi/insert', ['as' => 'konfigurasi_setting_perizinan_nilai_retribusi', 'uses' => 'KonfigurasiController@setting_perizinan_nilai_retribusi_insert']);

Route::get('konfigurasi/setting_perizinan/nilai_retribusi/update', ['as' => 'konfigurasi_setting_perizinan_nilai_retribusi', 'uses' => 'KonfigurasiController@setting_perizinan_nilai_retribusi_update']);

Route::get('konfigurasi/setting_perizinan/nilai_retribusi/delete', ['as' => 'konfigurasi_setting_perizinan_nilai_retribusi', 'uses' => 'KonfigurasiController@setting_perizinan_nilai_retribusi_delete']);

# Konfigurasi / Setting Perizinan / Koefisien Tarif (Belum)

Route::get('konfigurasi/setting_perizinan/koefisien_tarif', ['as' => 'konfigurasi_setting_perizinan_koefisien_tarif', 'uses' => 'KonfigurasiController@setting_perizinan_koefisien_tarif']);

Route::get('konfigurasi/setting_perizinan/koefisien_tarif/data', ['as' => 'konfigurasi_setting_perizinan_koefisien_tarif', 'uses' => 'KonfigurasiController@setting_perizinan_koefisien_tarif_data']);

Route::get('konfigurasi/setting_perizinan/koefisien_tarif/insert', ['as' => 'konfigurasi_setting_perizinan_koefisien_tarif', 'uses' => 'KonfigurasiController@setting_perizinan_koefisien_tarif_insert']);

Route::get('konfigurasi/setting_perizinan/koefisien_tarif/update', ['as' => 'konfigurasi_setting_perizinan_koefisien_tarif', 'uses' => 'KonfigurasiController@setting_perizinan_koefisien_tarif_update']);

Route::get('konfigurasi/setting_perizinan/koefisien_tarif/delete', ['as' => 'konfigurasi_setting_perizinan_koefisien_tarif', 'uses' => 'KonfigurasiController@setting_perizinan_koefisien_tarif_delete']);

# Konfigurasi / Setting Umum / Instansi (Belum)

Route::get('konfigurasi/setting_umum/instansi', ['as' => 'konfigurasi_setting_umum_instansi', 'uses' => 'KonfigurasiController@setting_umum_instansi']);

Route::get('konfigurasi/setting_umum/instansi/data', ['as' => 'konfigurasi_setting_umum_instansi', 'uses' => 'KonfigurasiController@setting_umum_instansi_data']);

Route::get('konfigurasi/setting_umum/instansi/opsi/wilayah/data', ['as' => 'konfigurasi_setting_umum_instansi', 'uses' => 'KonfigurasiController@setting_umum_instansi_opsi_wilayah_data']);

Route::get('konfigurasi/setting_umum/instansi/insert', ['as' => 'konfigurasi_setting_umum_instansi', 'uses' => 'KonfigurasiController@setting_umum_instansi_insert']);

Route::get('konfigurasi/setting_umum/instansi/update', ['as' => 'konfigurasi_setting_umum_instansi', 'uses' => 'KonfigurasiController@setting_umum_instansi_update']);

Route::get('konfigurasi/setting_umum/instansi/delete', ['as' => 'konfigurasi_setting_umum_instansi', 'uses' => 'KonfigurasiController@setting_umum_instansi_delete']);

# Konfigurasi / Setting Umum / Hari Libur

Route::get('konfigurasi/setting_umum/hari_libur', ['as' => 'konfigurasi_setting_umum_hari_libur', 'uses' => 'KonfigurasiController@setting_umum_hari_libur']);

Route::get('konfigurasi/setting_umum/hari_libur/data', ['as' => 'konfigurasi_setting_umum_hari_libur', 'uses' => 'KonfigurasiController@setting_umum_hari_libur_data']);

Route::get('konfigurasi/setting_umum/hari_libur/insert', ['as' => 'konfigurasi_setting_umum_hari_libur', 'uses' => 'KonfigurasiController@setting_umum_hari_libur_insert']);

Route::get('konfigurasi/setting_umum/hari_libur/update', ['as' => 'konfigurasi_setting_umum_hari_libur', 'uses' => 'KonfigurasiController@setting_umum_hari_libur_update']);

Route::get('konfigurasi/setting_umum/hari_libur/update/data/{id}', ['as' => 'konfigurasi_setting_umum_hari_libur', 'uses' => 'KonfigurasiController@setting_umum_hari_libur_update_data']);

Route::get('konfigurasi/setting_umum/hari_libur/delete', ['as' => 'konfigurasi_setting_umum_hari_libur', 'uses' => 'KonfigurasiController@setting_umum_hari_libur_delete']);

# Konfigurasi / Setting Umum / Satuan (Belum)

Route::get('konfigurasi/setting_umum/satuan', ['as' => 'konfigurasi_setting_umum_satuan', 'uses' => 'KonfigurasiController@setting_umum_satuan']);

Route::get('konfigurasi/setting_umum/satuan/data', ['as' => 'konfigurasi_setting_umum_satuan_data', 'uses' => 'KonfigurasiController@setting_umum_satuan_data']);

Route::get('konfigurasi/setting_umum/satuan/insert', ['as' => 'konfigurasi_setting_umum_satuan_insert', 'uses' => 'Konfigurasi@setting_umum_satuan_insert']);

Route::get('konfigurasi/setting_umum/satuan/update', ['as' => 'konfigurasi_setting_umum_satuan_update', 'uses' => 'Konfigurasi@setting_umum_satuan_update']);

Route::get('konfigurasi/setting_umum/satuan/delete', ['as' => 'konfigurasi_setting_umum_satuan_delete', 'uses' => 'Konfigurasi@setting_umum_satuan_delete']);

# Konfigurasi / Setting Umum / Web Service (Belum)

Route::get('konfigurasi/setting_umum/web_service', ['as' => 'konfigurasi_setting_umum_web_service', 'uses' => 'KonfigurasiController@setting_umum_web_service']);

Route::get('konfigurasi/setting_umum/web_service/data', ['as' => 'konfigurasi_setting_umum_web_service', 'uses' => 'KonfigurasiController@setting_umum_web_service_data']);

Route::get('konfigurasi/setting_umum/web_service/update', ['as' => 'konfigurasi_setting_umum_web_service', 'uses' => 'KonfigurasiController@setting_umum_web_service_update']);

# Konfigurasi / Setting User / Pegawai

Route::get('konfigurasi/setting_user/pegawai', ['as' => 'konfigurasi_setting_user_pegawai', 'uses' => 'KonfigurasiController@setting_user_pegawai']);

Route::get('konfigurasi/setting_user/pegawai/data', ['as' => 'konfigurasi_setting_user_pegawai', 'uses' => 'KonfigurasiController@setting_user_pegawai_data']);

Route::get('konfigurasi/setting_user/pegawai/insert', ['as' => 'konfigurasi_setting_user_pegawai', 'uses' => 'KonfigurasiController@setting_user_pegawai_insert']);

Route::get('konfigurasi/setting_user/pegawai/update', ['as' => 'konfigurasi_setting_user_pegawai', 'uses' => 'KonfigurasiController@setting_user_pegawai_update']);

Route::get('konfigurasi/setting_user/pegawai/delete', ['as' => 'konfigurasi_setting_user_pegawai', 'uses' => 'KonfigurasiController@setting_user_pegawai_delete']);

# Konfigurasi / Setting User / Unit Kerja

Route::get('konfigurasi/setting_user/unit_kerja', ['as' => 'konfigurasi_setting_user_unit_kerja', 'uses' => 'KonfigurasiController@setting_user_unit_kerja']);

Route::get('konfigurasi/setting_user/unit_kerja/data', ['as' => 'konfigurasi_setting_user_unit_kerja', 'uses' => 'KonfigurasiController@setting_user_unit_kerja_data']);

Route::get('konfigurasi/setting_user/unit_kerja/insert', ['as' => 'konfigurasi_setting_user_unit_kerja', 'uses' => 'KonfigurasiController@setting_user_unit_kerja_insert']);

Route::get('konfigurasi/setting_user/unit_kerja/update', ['as' => 'konfigurasi_setting_user_unit_kerja', 'uses' => 'KonfigurasiController@setting_user_unit_kerja_update']);

Route::get('konfigurasi/setting_user/unit_kerja/update/data/{id}', ['as' => 'konfigurasi_setting_user_unit_kerja', 'uses' => 'KonfigurasiController@setting_user_unit_kerja_update_data']);

Route::get('konfigurasi/setting_user/unit_kerja/delete', ['as' => 'konfigurasi_setting_user_unit_kerja', 'uses' => 'KonfigurasiController@setting_user_unit_kerja_delete']);

# Konfigurasi / Setting User / Pengguna

Route::get('konfigurasi/setting_user/pengguna', ['as' => 'konfigurasi_setting_user_pengguna', 'uses' => 'KonfigurasiController@setting_user_pengguna']);

Route::get('konfigurasi/setting_user/pengguna/data', ['as' => 'konfigurasi_setting_user_pengguna', 'uses' => 'KonfigurasiController@setting_user_pengguna_data']);

Route::get('konfigurasi/setting_user/pengguna/insert', ['as' => 'konfigurasi_setting_user_pengguna', 'uses' => 'KonfigurasiController@setting_user_pengguna_insert']);

Route::get('konfigurasi/setting_user/pengguna/update', ['as' => 'konfigurasi_setting_user_pengguna', 'uses' => 'KonfigurasiController@setting_user_pengguna_update']);

Route::get('konfigurasi/setting_user/pengguna/delete', ['as' => 'konfigurasi_setting_user_pengguna', 'uses' => 'KonfigurasiController@setting_user_pengguna_delete']);

# Konfigurasi / Setting Wilayah / Provinsi

Route::get('konfigurasi/setting_wilayah/propinsi', ['as' => 'konfigurasi_setting_wilayah_provinsi', 'uses' => 'KonfigurasiController@setting_wilayah_provinsi']);

Route::get('konfigurasi/setting_wilayah/propinsi/data', ['as' => 'konfigurasi_setting_wilayah_provinsi', 'uses' => 'KonfigurasiController@setting_wilayah_provinsi_data']);

Route::post('konfigurasi/setting_wilayah/provinsi/insert', ['uses' => 'KonfigurasiController@setting_wilayah_provinsi_insert']);

Route::post('konfigurasi/setting_wilayah/provinsi/edit', ['uses' => 'KonfigurasiController@setting_wilayah_provinsi_edit']);

Route::get('konfigurasi/setting_wilayah/provinsi/edit/data/{id}', ['as' => 'konfigurasi_setting_wilayah_provinsi_edit_data', 'uses' => 'KonfigurasiController@setting_wilayah_provinsi_edit_data']);

Route::get('konfigurasi/setting_wilayah/propinsi/delete', ['as' => 'konfigurasi_setting_wilayah_provinsi', 'uses' => 'KonfigurasiController@setting_wilayah_provinsi_delete']);

# Konfigurasi / Setting Wilayah / Kabupaten

Route::get('konfigurasi/setting_wilayah/kabupaten', ['as' => 'konfigurasi_setting_wilayah_kabupaten', 'uses' => 'KonfigurasiController@setting_wilayah_kabupaten']);

Route::get('konfigurasi/setting_wilayah/kabupaten/data', ['as' => 'konfigurasi_setting_wilayah_kabupaten', 'uses' => 'KonfigurasiController@setting_wilayah_kabupaten_data']);

Route::get('konfigurasi/setting_wilayah/kabupaten/insert', ['as' => 'konfigurasi_setting_wilayah_kabupaten', 'uses' => 'KonfigurasiController@setting_wilayah_kabupaten_insert']);

Route::get('konfigurasi/setting_wilayah/kabupaten/edit', ['as' => 'konfigurasi_setting_wilayah_kabupaten_edit', 'uses' => 'KonfigurasiController@setting_wilayah_kabupaten_edit']);

Route::get('konfigurasi/setting_wilayah/kabupaten/edit/data/{id}', ['as' => 'konfigurasi_setting_wilayah_kabupaten_edit_data', 'uses' => 'KonfigurasiController@setting_wilayah_kabupaten_edit_data']);

Route::get('konfigurasi/setting_wilayah/kabupaten/delete', ['as' => 'konfigurasi_setting_wilayah_kabupaten', 'uses' => 'KonfigurasiController@setting_wilayah_kabupaten_delete']);

Route::get('konfigurasi/setting_wilayah/kabupaten/opsi/propinsi', ['as' => 'konfigurasi_setting_wilayah_kabupaten_opsi_propinsi', 'uses' => 'KonfigurasiController@setting_wilayah_kabupaten_opsi_propinsi']);

# Konfigurasi / Setting Wilayah / Kecamatan

Route::get('konfigurasi/setting_wilayah/kecamatan', ['as' => 'konfigurasi_setting_wilayah_kecamatan', 'uses' => 'KonfigurasiController@setting_wilayah_kecamatan']);

Route::get('konfigurasi/setting_wilayah/kecamatan/data', ['as' => 'konfigurasi_setting_wilayah_kecamatan', 'uses' => 'KonfigurasiController@setting_wilayah_kecamatan_data']);

Route::get('konfigurasi/setting_wilayah/kecamatan/insert', ['as' => 'konfigurasi_setting_wilayah_kecamatan', 'uses' => 'KonfigurasiController@setting_wilayah_kecamatan_insert']);

Route::get('konfigurasi/setting_wilayah/kecamatan/edit', ['as' => 'konfigurasi_setting_wilayah_kecamatan_edit', 'uses' => 'KonfigurasiController@setting_wilayah_kecamatan_edit']);

Route::get('konfigurasi/setting_wilayah/kecamatan/edit/data/{id}', ['as' => 'konfigurasi_setting_wilayah_kecamatan_edit_data', 'uses' => 'KonfigurasiController@setting_wilayah_kecamatan_edit_data']);

Route::get('konfigurasi/setting_wilayah/kecamatan/delete', ['as' => 'konfigurasi_setting_wilayah_kecamatan', 'uses' => 'KonfigurasiController@setting_wilayah_kecamatan_delete']);

Route::get('konfigurasi/setting_wilayah/kecamatan/opsi/propinsi', ['as' => 'konfigurasi_setting_wilayah_kecamatan_opsi_propinsi', 'uses' => 'KonfigurasiController@setting_wilayah_kecamatan_opsi_propinsi']);

Route::get('konfigurasi/setting_wilayah/kecamatan/opsi/kabupaten', ['as' => 'konfigurasi_setting_wilayah_kecamatan_opsi_kabupaten', 'uses' => 'KonfigurasiController@setting_wilayah_kecamatan_opsi_kabupaten']);

Route::get('konfigurasi/setting_wilayah/kecamatan/opsi/kabupaten/{id}', ['as' => 'konfigurasi_setting_wilayah_kecamatan_opsi_kabupaten', 'uses' => 'KonfigurasiController@setting_wilayah_kecamatan_opsi_kabupaten']);

# Konfigurasi / Setting Wilayah / Kelurahan

Route::get('konfigurasi/setting_wilayah/kelurahan', ['as' => 'konfigurasi_setting_wilayah_kelurahan', 'uses' => 'KonfigurasiController@setting_wilayah_kelurahan']);

Route::get('konfigurasi/setting_wilayah/kelurahan/data', ['as' => 'konfigurasi_setting_wilayah_kelurahan', 'uses' => 'KonfigurasiController@setting_wilayah_kelurahan_data']);

Route::get('konfigurasi/setting_wilayah/kelurahan/insert', ['as' => 'konfigurasi_setting_wilayah_kelurahan', 'uses' => 'KonfigurasiController@setting_wilayah_kelurahan_insert']);

Route::get('konfigurasi/setting_wilayah/kelurahan/edit', ['as' => 'konfigurasi_setting_wilayah_kelurahan_edit', 'uses' => 'KonfigurasiController@setting_wilayah_kelurahan_edit']);

Route::get('konfigurasi/setting_wilayah/kelurahan/edit/data/{id}', ['as' => 'konfigurasi_setting_wilayah_kelurahan_edit_data', 'uses' => 'KonfigurasiController@setting_wilayah_kelurahan_edit_data']);

Route::get('konfigurasi/setting_wilayah/kelurahan/delete', ['as' => 'konfigurasi_setting_wilayah_kelurahan', 'uses' => 'KonfigurasiController@setting_wilayah_kelurahan_delete']);

Route::get('konfigurasi/setting_wilayah/kelurahan/opsi/propinsi', ['as' => 'konfigurasi_setting_wilayah_kelurahan_opsi_propinsi', 'uses' => 'KonfigurasiController@setting_wilayah_kelurahan_opsi_propinsi']);

Route::get('konfigurasi/setting_wilayah/kelurahan/opsi/kabupaten', ['as' => 'konfigurasi_setting_wilayah_kelurahan_opsi_kabupaten', 'uses' => 'KonfigurasiController@setting_wilayah_kelurahan_opsi_kabupaten']);

Route::get('konfigurasi/setting_wilayah/kelurahan/opsi/kabupaten/{id}', ['as' => 'konfigurasi_setting_wilayah_kelurahan_opsi_kabupaten', 'uses' => 'KonfigurasiController@setting_wilayah_kelurahan_opsi_kabupaten']);

Route::get('konfigurasi/setting_wilayah/kelurahan/opsi/kecamatan', ['as' => 'konfigurasi_setting_wilayah_kelurahan_opsi_kecamatan', 'uses' => 'KonfigurasiController@setting_wilayah_kelurahan_opsi_kecamatan']);

Route::get('konfigurasi/setting_wilayah/kelurahan/opsi/kecamatan/{id}', ['as' => 'konfigurasi_setting_wilayah_kelurahan_opsi_kecamatan', 'uses' => 'KonfigurasiController@setting_wilayah_kelurahan_opsi_kecamatan']);

# Konfigurasi / Keamanan Data / Log Activity

Route::get('konfigurasi/keamanan_data/log_activity', ['as' => 'konfigurasi_keamanan_data_log_activity', 'uses' => 'KonfigurasiController@keamanan_data_log_activity']);

Route::get('konfigurasi/keamanan_data/log_activity/data', ['as' => 'konfigurasi_keamanan_data_log_activity', 'uses' => 'KonfigurasiController@keamanan_data_log_activity_data']);

Route::get('konfigurasi/keamanan_data/log_activity/data/{date_start}/{date_finish}', ['as' => 'konfigurasi_keamanan_data_log_activity', 'uses' => 'KonfigurasiController@keamanan_data_log_activity_data']);

Route::get('konfigurasi/keamanan_data/log_activity/insert', ['as' => 'konfigurasi_keamanan_data_log_activity', 'uses' => 'KonfigurasiController@keamanan_data_log_activity_insert']);

Route::get('konfigurasi/keamanan_data/log_activity/delete', ['as' => 'konfigurasi_keamanan_data_log_activity', 'uses' => 'KonfigurasiController@keamanan_data_log_activity_delete']);


Route::get('konfigurasi/keamanan_data/backup_database', ['as' => 'konfigurasi_keamanan_data_backup_database', 'uses' => 'KonfigurasiController@keamanan_data_backup_database']);

Route::get('konfigurasi/keamanan_data/restore_database', ['as' => 'konfigurasi_keamanan_data_restore_database', 'uses' => 'KonfigurasiController@keamanan_data_restore_database']);

# Konfigurasi / Keamanan Data / Report Generator

Route::get('konfigurasi/report/report_generator', ['as' => 'konfigurasi_report_report_generator', 'uses' => 'KonfigurasiController@report_report_generator']);

Route::get('konfigurasi/report/report_generator/data', ['as' => 'konfigurasi_report_report_generator_data', 'uses' => 'KonfigurasiController@report_report_generator_data']);

# Konfigurasi / Keamanan Data / Report Component

Route::get('konfigurasi/report/report_component', ['as' => 'konfigurasi_report_report_component', 'uses' => 'KonfigurasiController@report_report_component']);

Route::get('konfigurasi/report/report_component/data', ['as' => 'konfigurasi_report_report_component_data', 'uses' => 'KonfigurasiController@report_report_component_data']);

/*

	Route Modul Pelayanan done ( Belum Model : Permohonan Izin Baru, Data Pemohon, Data Perusahaan, Simulasi Tarif Retribusi)

*/

# Pelayanan / Pendaftaran / Permohonan Sementara

Route::get('pelayanan/pendaftaran/permohonan_sementara', array('as' => 'pelayanan_pendaftaran_pelayanan_sementara', 'uses' => 'PelayananController@pendaftaran_permohonan_sementara'));

Route::get('pelayanan/pendaftaran/permohonan_sementara/data', array('as' => 'pelayanan_pendaftaran_pelayanan_sementara_data', 'uses' => 'PelayananController@pendaftaran_permohonan_sementara_data'));

Route::get('pelayanan/pendaftaran/permohonan_sementara/data/{id}', array('as' => 'pelayanan_pendaftaran_pelayanan_sementara_data', 'uses' => 'PelayananController@pendaftaran_permohonan_sementara_data'));

Route::get('pelayanan/pendaftaran/permohonan_sementara/edit', array('as' => 'pelayanan_pendaftaran_pelayanan_sementara_edit', 'uses' => 'PelayananController@pendaftaran_permohonan_sementara_edit'));

Route::get('pelayanan/pendaftaran/permohonan_sementara/edit/data/{id}', array('as' => 'pelayanan_pendaftaran_pelayanan_sementara_edit_data', 'uses' => 'PelayananController@pendaftaran_permohonan_sementara_edit_data'));


# Pelayanan / Pendaftaran / Permohonan Izin Baru ( Belum )

Route::get('pelayanan/pendaftaran/permohonan_izin_baru', array('as' => 'pelayanan_pendaftaran_permohonan_izin', 'uses' => 'PelayananController@pendaftaran_permohonan_izin_baru'));

Route::get('pelayanan/pendaftaran/permohonan_izin_baru/data', array('as' => 'pelayanan_pendaftaran_permohonan_izin_data', 'uses' => 'PelayananController@pendaftaran_permohonan_izin_baru_data'));

Route::get('pelayanan/pendaftaran/permohonan_izin_baru/data/{id}', array('as' => 'pelayanan_pendaftaran_permohonan_izin_data', 'uses' => 'PelayananController@pendaftaran_permohonan_izin_baru_data'));

Route::get('pelayanan/pendaftaran/permohonan_izin_baru/edit', array('as' => 'pelayanan_pendaftaran_permohonan_izin_edit', 'uses' => 'PelayananController@pendaftaran_permohonan_izin_baru_edit'));

Route::get('pelayanan/pendaftaran/permohonan_izin_baru/edit/data/{id}', array('as' => 'pelayanan_pendaftaran_permohonan_izin_edit_data', 'uses' => 'PelayananController@pendaftaran_permohonan_izin_baru_edit_data'));

# Pelayanan / Pendaftaran / Perubahan Izin

Route::get('pelayanan/pendaftaran/perubahan_izin', array('as' => 'pelayanan_pendaftaran_perubahan_izin', 'uses' => 'PelayananController@pendaftaran_perubahan_izin'));

Route::get('pelayanan/pendaftaran/perubahan_izin/data', array('as' => 'pelayanan_pendaftaran_perubahan_izin_table_perubahan_izin', 'uses' => 'PelayananController@pendaftaran_perubahan_izin_data'));

Route::get('pelayanan/pendaftaran/perubahan_izin/data/{id}', array('as' => 'pelayanan_pendaftaran_perubahan_izin_data', 'uses' => 'PelayananController@pendaftaran_perubahan_izin_data'));

Route::get('pelayanan/pendaftaran/perubahan_izin/opsi_kegiatan', array('as' => 'pelayanan_pendaftaran_perubahan_izin_opsi_kegiatan', 'uses' => 'PelayananController@pendaftaran_perubahan_izin_opsi_kegiatan'));

Route::get('pelayanan/pendaftaran/perubahan_izin/opsi_investasi', array('as' => 'pelayanan_pendaftaran_perubahan_izin_opsi_investasi', 'uses' => 'PelayananController@pendaftaran_perubahan_izin_opsi_investasi'));

Route::get('pelayanan/pendaftaran/perubahan_izin/edit', array('as' => 'pelayanan_pendaftaran_perubahan_izin_edit', 'uses' => 'PelayananController@pendaftaran_perubahan_izin_edit'));

Route::get('pelayanan/pendaftaran/perubahan_izin/edit/data/{id}', array('as' => 'pelayanan_pendaftaran_perubahan_izin_edit_data', 'uses' => 'PelayananController@pendaftaran_perubahan_izin_edit_data'));

# Pelayanan / Pendaftaran / Perpanjangan Izin

Route::get('pelayanan/pendaftaran/perpanjangan_izin', array('as' => 'pelayanan_pendaftaran_perpanjanan_izin', 'uses' => 'PelayananController@pendaftaran_perpanjangan_izin'));

Route::get('pelayanan/pendaftaran/perpanjangan_izin/data', array('as' => 'pelayanan_pendaftaran_perpanjanan_izin_table_perpanjangan_izin', 'uses' => 'PelayananController@pendaftaran_perpanjangan_izin_data'));

Route::get('pelayanan/pendaftaran/perpanjangan_izin/data/{id}', array('as' => 'pelayanan_pendaftaran_perpanjangan_izin_data', 'uses' => 'PelayananController@pendaftaran_perpanjangan_izin_data'));

Route::get('pelayanan/pendaftaran/perpanjangan_izin/opsi_kegiatan', array('as' => 'pelayanan_pendaftaran_perpanjangan_izin_opsi_kegiatan', 'uses' => 'PelayananController@pendaftaran_perpanjangan_izin_opsi_kegiatan'));

Route::get('pelayanan/pendaftaran/perpanjangan_izin/opsi_investasi', array('as' => 'pelayanan_pendaftaran_perpanjangan_izin_opsi_investasi', 'uses' => 'PelayananController@pendaftaran_perpanjangan_izin_opsi_investasi'));

Route::get('pelayanan/pendaftaran/perpanjangan_izin/edit', array('as' => 'pelayanan_pendaftaran_perpanjangan_izin_edit', 'uses' => 'PelayananController@pendaftaran_perpanjangan_izin_edit'));

Route::get('pelayanan/pendaftaran/perpanjangan_izin/edit/data/{id}', array('as' => 'pelayanan_pendaftaran_perpanjangan_izin_edit_data', 'uses' => 'PelayananController@pendaftaran_perpanjangan_izin_edit_data'));

# Pelayanan / Pendaftaran / Daftar Ulang Izin

Route::get('pelayanan/pendaftaran/daftar_ulang_izin', array('as' => 'pelayanan_pendaftaran_daftar_ulang_izin', 'uses' => 'PelayananController@pendaftaran_daftar_ulang_izin'));

Route::get('pelayanan/pendaftaran/daftar_ulang_izin/data', array('as' => 'pelayanan_pendaftaran_daftar_ulang_izin_table_daftar_ulang_izin', 'uses' => 'PelayananController@pendaftaran_daftar_ulang_izin_data'));

Route::get('pelayanan/pendaftaran/daftar_ulang_izin/data/{id}', array('as' => 'pelayanan_pendaftaran_daftar_ulang_izin_data', 'uses' => 'PelayananController@pendaftaran_daftar_ulang_izin_data'));

Route::get('pelayanan/pendaftaran/daftar_ulang_izin/opsi_kegiatan', array('as' => 'pelayanan_pendaftaran_daftar_ulang_izin_opsi_kegiatan', 'uses' => 'PelayananController@pendaftaran_daftar_ulang_izin_opsi_kegiatan'));

Route::get('pelayanan/pendaftaran/daftar_ulang_izin/opsi_investasi', array('as' => 'pelayanan_pendaftaran_daftar_ulang_izin_opsi_investasi', 'uses' => 'PelayananController@pendaftaran_daftar_ulang_izin_opsi_investasi'));

Route::get('pelayanan/pendaftaran/daftar_ulang_izin/edit', array('as' => 'pelayanan_pendaftaran_daftar_ulang_izin_edit', 'uses' => 'PelayananController@pendaftaran_daftar_ulang_izin_edit'));

Route::get('pelayanan/pendaftaran/daftar_ulang_izin/edit/data/{id}', array('as' => 'pelayanan_pendaftaran_daftar_ulang_izin_edit_data', 'uses' => 'PelayananController@pendaftaran_daftar_ulang_izin_edit_data'));

# Pelayanan / Pendaftaran / Data Pemohon (Belum)

Route::get('pelayanan/pendaftaran/data_pemohon', array('as' => 'pelayanan_pendaftaran_data_pemohon', 'uses' => 'PelayananController@pendaftaran_data_pemohon'));

Route::get('pelayanan/pendaftaran/data_pemohon/data', array('as' => 'pelayanan_pendaftaran_data_pemohon_data', 'uses' => 'PelayananController@pendaftaran_data_pemohon_data'));

Route::get('pelayanan/pendaftaran/data_pemohon/data/{id}', array('as' => 'pelayanan_pendaftaran_data_pemohon_data', 'uses' => 'PelayananController@pendaftaran_data_pemohon_data'));

Route::get('pelayanan/pendaftaran/data_pemohon/edit', array('as' => 'pelayanan_pendaftaran_data_pemohon_edit', 'uses' => 'PelayananController@pendaftaran_data_pemohon_edit'));

Route::get('pelayanan/pendaftaran/data_pemohon/edit/data/{id}', array('as' => 'pelayanan_pendaftaran_data_pemohon_edit_data', 'uses' => 'PelayananController@pendaftaran_data_pemohon_edit_data'));

# Pelayanan / Pendaftaran / Data Perusahaan (Belum)

Route::get('pelayanan/pendaftaran/data_perusahaan', array('as' => 'pelayanan_pendaftaran_data_perusahaan', 'uses' => 'PelayananController@pendaftaran_data_perusahaan'));

Route::get('pelayanan/pendaftaran/data_perusahaan/data', array('as' => 'pelayanan_pendaftaran_data_pemohon_data', 'uses' => 'PelayananController@pendaftaran_data_perusahaan_data'));

Route::get('pelayanan/pendaftaran/data_perusahaan/data/{id}', array('as' => 'pelayanan_pendaftaran_data_perusahaan_data', 'uses' => 'PelayananController@pendaftaran_data_perusahaan_data'));

Route::get('pelayanan/pendaftaran/data_perusahaan/opsi_kegiatan', array('as' => 'pelayanan_pendaftaran_data_perusahaan_opsi_kegiatan', 'uses' => 'PelayananController@pendaftaran_data_perusahaan_opsi_kegiatan'));

Route::get('pelayanan/pendaftaran/data_perusahaan/opsi_investasi', array('as' => 'pelayanan_pendaftaran_data_perusahaan_opsi_investasi', 'uses' => 'PelayananController@pendaftaran_data_perusahaan_opsi_investasi'));

Route::get('pelayanan/pendaftaran/data_perusahaan/edit', array('as' => 'pelayanan_pendaftaran_data_perusahaan_edit', 'uses' => 'PelayananController@pendaftaran_data_perusahaan_edit'));

Route::get('pelayanan/pendaftaran/data_perusahaan/edit/data/{id}', array('as' => 'pelayanan_pendaftaran_data_perusahaan_edit_data', 'uses' => 'PelayananController@pendaftaran_data_perusahaan_edit_data'));

# Customer Service / Informasi Perizinan

Route::get('pelayanan/customer_service/informasi_perizinan', array('as' => 'pelayanan_customer_service_informasi_perizinan', 'uses' => 'PelayananController@customer_service_informasi_perizinan'));

Route::get('pelayanan/customer_service/informasi_perizinan/data', array('as' => 'pelayanan_customer_service_informasi_perizinan_data', 'uses' => 'PelayananController@customer_service_informasi_perizinan_data'));

Route::get('pelayanan/customer_service/informasi_perizinan/detail/data/{id}', array('as' => 'pelayanan_customer_service_informasi_perizinan_detail_data', 'uses' => 'PelayananController@customer_service_informasi_perizinan_detail'));

# Customer Service / Simulasi Tarif Retribusi (Belum)

Route::get('pelayanan/customer_service/simulasi_tarif_retribusi', array('as' => 'pelayanan_customer_service_simuasi_tarif_retribusi', 'uses' => 'PelayananController@customer_service_simulasi_tarif_retribusi'));

Route::get('pelayanan/customer_service/simulasi_tarif_retribusi/form_simulasi_tarif_retribusi', array('as' => 'pelayanan_customer_service_simuasi_tarif_retribusi_form_simulasi_tarif_retribusi', 'uses' => 'PelayananController@form_simulasi_tarif_retribusi'));

# Customer Service / Informasi Tracking

Route::get('pelayanan/customer_service/informasi_tracking', array('as' => 'pelayanan_customer_service_informasi_tracking', 'uses' => 'PelayananController@customer_service_informasi_tracking'));

Route::get('pelayanan/customer_service/informasi_tracking/data', array('as' => 'pelayanan_customer_service_informasi_tracking_data', 'uses' => 'PelayananController@customer_service_informasi_tracking_data'));

Route::get('pelayanan/customer_service/informasi_tracking/detail/data/{id}' , array('as' => 'pelayanan_customer_service_informasi_tracking_detail_data', 'uses' => 'PelayananController@customer_service_informasi_tracking_detail_data'));
# Customer Service / Informasi Masa Berlaku

Route::get('pelayanan/customer_service/informasi_masa_berlaku', array('as' => 'pelayanan_customer_service_informasi_masa_berlaku', 'uses' => 'PelayananController@customer_service_informasi_masa_berlaku'));

Route::get('pelayanan/customer_service/informasi_masa_berlaku/data', array('as' => 'pelayanan_customer_service_informasi_masa_berlaku_data', 'uses' => 'PelayananController@customer_service_informasi_masa_berlaku_data'));

/*

	Route Modul Pencetakan done

*/

Route::get('pencetakan/penetapan/penetapan_izin', ['as' => 'pencetakan_penetapan_penetapan_izin', 'uses' => 'PencetakanController@penetapan_penetapan_izin']);

Route::get('pencetakan/penetapan/penetapan_izin/data', ['as' => 'pencetakan_penetapan_penetapan_izin_data', 'uses' => 'PencetakanController@penetapan_penetapan_izin_data']);

Route::get('pencetakan/penetapan/penetapan_izin/cetak', ['as' => 'pencetakan_penetapan_penetapan_izin_cetak', 'uses' => 'PencetakanController@penetapan_penetapan_izin_cetak']);

/*

	Route Modul Backoffice done

*/

# Backoffice / Pendataan / Entry Data Perizinan

Route::get('backoffice/pendataan/entry_data_perizinan', ['as' => 'backoffice_pendataan_entry_data_perizinan', 'uses' => 'BackofficeController@pendataan_entry_data_perizinan']);

Route::get('backoffice/pendataan/entry_data_perizinan/data', ['as' => 'backoffice_pendataan_entry_data_perizinan_data', 'uses' => 'BackofficeController@pendataan_entry_data_perizinan_data']);

Route::get('backoffice/pendataan/entry_data_perizinan/data/{date_start}/{date_finish}', ['as' => 'backoffice_pendataan_entry_data_perizinan_data', 'uses' => 'BackofficeController@pendataan_entry_data_perizinan_data']);

Route::post('backoffice/pendataan/entry_data_perizinan/edit', ['uses' => 'BackofficeController@pendataan_entry_data_perizinan_edit']);

Route::get('backoffice/pendataan/entry_data_perizinan/edit/data/{id}', ['as' => 'backoffice_pendataan_entry_data_perizinan_edit_data', 'uses' => 'BackofficeController@pendataan_entry_data_perizinan_edit_data']);

Route::post('backoffice/pendataan/entry_data_perizinan/data_awal', ['uses' => 'BackofficeController@pendataan_entry_data_perizinan_data_awal']);


Route::get('backoffice/pendataan/entry_data_perizinan/data_awal/opsi/pemohon_kelurahan/{id}', ['uses' => 'BackofficeController@pendataan_entry_data_perizinan_data_awal_opsi_pemohon_kelurahan']);

Route::get('backoffice/pendataan/entry_data_perizinan/data_awal/opsi/pemohon_kecamatan/{id}', ['uses' => 'BackofficeController@pendataan_entry_data_perizinan_data_awal_opsi_pemohon_kecamatan']);

Route::get('backoffice/pendataan/entry_data_perizinan/data_awal/opsi/pemohon_kabupaten/{id}', ['uses' => 'BackofficeController@pendataan_entry_data_perizinan_data_awal_opsi_pemohon_kabupaten']);

Route::get('backoffice/pendataan/entry_data_perizinan/data_awal/opsi/pemohon_propinsi/{id}', ['uses' => 'BackofficeController@pendataan_entry_data_perizinan_data_awal_opsi_pemohon_propinsi']);

Route::get('backoffice/pendataan/entry_data_perizinan/data_awal/opsi/perusahaan_kelurahan/{id}', ['uses' => 'BackofficeController@pendataan_entry_data_perizinan_data_awal_opsi_perusahaan_kelurahan']);

Route::get('backoffice/pendataan/entry_data_perizinan/data_awal/opsi/perusahaan_kecamatan/{id}', ['uses' => 'BackofficeController@pendataan_entry_data_perizinan_data_awal_opsi_perusahaan_kecamatan']);

Route::get('backoffice/pendataan/entry_data_perizinan/data_awal/opsi/perusahaan_kabupaten/{id}', ['uses' => 'BackofficeController@pendataan_entry_data_perizinan_data_awal_opsi_perusahaan_kabupaten']);

Route::get('backoffice/pendataan/entry_data_perizinan/data_awal/opsi/perusahaan_propinsi/{id}', ['uses' => 'BackofficeController@pendataan_entry_data_perizinan_data_awal_opsi_perusahaan_propinsi']);


Route::get('backoffice/pendataan/entry_data_perizinan/data_awal/data/{id}', ['as' => 'backoffice_pendataan_entry_data_perizinan_pendaftaran_edit_data', 'uses' => 'BackofficeController@pendataan_entry_data_perizinan_data_awal_data']);

# Backoffice / Pendataan / Penjadwalan Tinjauan

Route::get('backoffice/pendataan/penjadwalan_tinjauan', array('as' => 'backoffice_pendataan_penjadwalan_tinjauan', 'uses' => 'BackofficeController@pendataan_penjadwalan_tinjauan'));

Route::get('backoffice/pendataan/penjadwalan_tinjauan/data', ['as' => 'backoffice_pendataan_penjadwalan_tinjauan_data', 'uses' => 'BackofficeController@pendataan_penjadwalan_tinjauan_data']);

Route::get('backoffice/pendataan/penjadwalan_tinjauan/data/{date_start}/{date_finish}', ['as' => 'backoffice_pendataan_penjadwalan_tinjauan_data', 'uses' => 'BackofficeController@pendataan_penjadwalan_tinjauan_data']);

Route::get('backoffice/pendataan/penjadwalan_tinjauan/edit/data/{id}', ['as' => 'backoffice_pendataan_penjadwalan_tinjauan_edit_data', 'uses' => 'BackofficeController@pendataan_penjadwalan_tinjauan_edit_data']);

# Backoffice / Tim Teknis / Entry Hasil Tinjauan

Route::get('backoffice/tim_teknis/entry_hasil_tinjauan', array('as' => 'backoffice_tim_teknis_entry_hasil_tinjauan', 'uses' => 'BackofficeController@tim_teknis_entry_hasil_tinjauan'));

Route::get('backoffice/tim_teknis/entry_hasil_tinjauan/data', array('as' => 'backoffice_tim_teknis_entry_hasil_tinjauan_data', 'uses' => 'BackofficeController@tim_teknis_entry_hasil_tinjauan_data'));

Route::get('backoffice/tim_teknis/entry_hasil_tinjauan/data/{date_start}/{date_finish}', array('as' => 'backoffice_tim_teknis_entry_hasil_tinjauan_data', 'uses' => 'BackofficeController@tim_teknis_entry_hasil_tinjauan_data'));

Route::get('backoffice/tim_teknis/entry_hasil_tinjauan/edit/data/{id}', array('as' => 'backoffice_tim_teknis_entry_hasil_tinjauan_edit_data', 'uses' => 'BackofficeController@tim_teknis_entry_hasil_tinjauan_edit_data'));

# Backoffice / Tim Teknis / Pembuatan Berita Acara Pemeriksaan

Route::get('backoffice/tim_teknis/pembuatan_berita_acara_pemeriksaan', array('as' => 'backoffice_tim_teknis_pembuatan_berita_acara_pemeriksaan', 'uses' => 'BackofficeController@tim_teknis_pembuatan_berita_acara_pemeriksaan'));

Route::get('backoffice/tim_teknis/pembuatan_berita_acara_pemeriksaan/data', array('as' => 'backoffice_tim_teknis_pembuatan_berita_acara_pemeriksaan_data', 'uses' => 'BackofficeController@tim_teknis_pembuatan_berita_acara_pemeriksaan_data'));

Route::get('backoffice/tim_teknis/pembuatan_berita_acara_pemeriksaan/data/{date_start}/{date_finish}', array('as' => 'backoffice_tim_teknis_pembuatan_berita_acara_pemeriksaan_data', 'uses' => 'BackofficeController@tim_teknis_pembuatan_berita_acara_pemeriksaan_data'));

Route::get('backoffice/tim_teknis/pembuatan_berita_acara_pemeriksaan/edit/data/{id}', array('as' => 'backoffice_tim_teknis_pembuatan_berita_acara_pemeriksaan_edit_data', 'uses' => 'BackofficeController@tim_teknis_pembuatan_berita_acara_pemeriksaan_edit_data'));

# Backoffice / Tim Teknis / Hitung Retribusi

Route::get('backoffice/tim_teknis/hitung_retribusi', array('as' => 'backoffice_tim_teknis_pembuatan_berita_acara_pemeriksaan', 'uses' => 'BackofficeController@tim_teknis_hitung_retribusi'));

Route::get('backoffice/tim_teknis/hitung_retribusi/data', array('as' => 'backoffice_tim_teknis_pembuatan_berita_acara_pemeriksaan_data', 'uses' => 'BackofficeController@tim_teknis_hitung_retribusi_data'));

Route::get('backoffice/tim_teknis/hitung_retribusi/data/{date_start}/{date_finish}', array('as' => 'backoffice_tim_teknis_pembuatan_berita_acara_pemeriksaan_data', 'uses' => 'BackofficeController@tim_teknis_hitung_retribusi_data'));

# Backoffice / Tim Teknis / Rekomendasi

Route::get('backoffice/tim_teknis/rekomendasi', array('as' => 'backoffice_tim_teknis_pembuatan_berita_acara_pemeriksaan', 'uses' => 'BackofficeController@tim_teknis_rekomendasi'));

Route::get('backoffice/tim_teknis/rekomendasi/data', array('as' => 'backoffice_tim_teknis_pembuatan_berita_acara_pemeriksaan', 'uses' => 'BackofficeController@tim_teknis_rekomendasi_data'));

Route::get('backoffice/tim_teknis/rekomendasi/data/{date_start}/{date_finish}', array('as' => 'backoffice_tim_teknis_pembuatan_berita_acara_pemeriksaan', 'uses' => 'BackofficeController@tim_teknis_rekomendasi_data'));

# Backoffice / Penetapan / Penetapan Izin

Route::get('backoffice/penetapan/penetapan_izin', array('as' => 'backoffice_penetapan_penetapan_izin', 'uses' => 'BackofficeController@penetapan_penetapan_izin'));

Route::get('backoffice/penetapan/penetapan_izin/data', array('as' => 'backoffice_penetapan_penetapan_izin_data', 'uses' => 'BackofficeController@penetapan_penetapan_izin_data'));

Route::get('backoffice/penetapan/penetapan_izin/data/{date_start}/{date_finish}', array('as' => 'backoffice_penetapan_penetapan_izin_data', 'uses' => 'BackofficeController@penetapan_penetapan_izin_data'));

Route::get('backoffice/penetapan/penetapan_izin/edit/data/{id}', array('as' => 'backoffice_penetapan_penetapan_izin_edit_data', 'uses' => 'BackofficeController@penetapan_penetapan_izin_edit_data'));

# Backoffice / Penetapan / Pembuatan SKRD

Route::get('backoffice/penetapan/pembuatan_skrd', array('as' => 'backoffice_penetapan_pembuatan_skrd', 'uses' => 'BackofficeController@penetapan_pembuatan_skrd'));

Route::get('backoffice/penetapan/pembuatan_skrd/data', array('as' => 'backoffice_penetapan_pembuatan_skrd_data', 'uses' => 'BackofficeController@penetapan_pembuatan_skrd_data'));

Route::get('backoffice/penetapan/pembuatan_skrd/data/{date_start}/{date_finish}', array('as' => 'backoffice_penetapan_pembuatan_skrd_data', 'uses' => 'BackofficeController@penetapan_pembuatan_skrd_data'));

Route::get('backoffice/penetapan/pembuatan_skrd/edit/data/{id}', array('as' => 'backoffice_penetapan_pembuatan_skrd_edit_data', 'uses' => 'BackofficeController@penetapan_pembuatan_skrd_edit_data'));

# Backoffice / Penetapan / Pembuatan Izin

Route::get('backoffice/penetapan/pembuatan_izin', array('as' => 'backoffice_penetapan_pembuatan_izin', 'uses' => 'BackofficeController@penetapan_pembuatan_izin'));

Route::get('backoffice/penetapan/pembuatan_izin/data', array('as' => 'backoffice_penetapan_pembuatan_izin_data', 'uses' => 'BackofficeController@penetapan_pembuatan_izin_data'));

Route::get('backoffice/penetapan/pembuatan_izin/data/{date_start}/{date_finish}', array('as' => 'backoffice_penetapan_pembuatan_izin_data', 'uses' => 'BackofficeController@penetapan_pembuatan_izin_data'));

# Backoffice / Penetapan / Layanan Ditolak

Route::get('backoffice/penetapan/layanan_ditolak', array('as' => 'backoffice_penetapan_layanan_ditolak', 'uses' => 'BackofficeController@penetapan_layanan_ditolak'));

Route::get('backoffice/penetapan/layanan_ditolak/data', array('as' => 'backoffice_penetapan_layanan_ditolak_data', 'uses' => 'BackofficeController@penetapan_layanan_ditolak_data'));

Route::get('backoffice/penetapan/layanan_ditolak/data/{date_start}/{date_finish}', array('as' => 'backoffice_penetapan_layanan_ditolak_data', 'uses' => 'BackofficeController@penetapan_layanan_ditolak_data'));

# Backoffice / Penetapan / Pencabutan Izin

Route::get('backoffice/penetapan/pencabutan_izin', array('as' => 'backoffice_penetapan_pencabutan_izin', 'uses' => 'BackofficeController@penetapan_pencabutan_izin'));

Route::get('backoffice/penetapan/pencabutan_izin/data', array('as' => 'backoffice_penetapan_pencabutan_izin_data', 'uses' => 'BackofficeController@penetapan_pencabutan_izin_data'));

Route::get('backoffice/penetapan/pencabutan_izin/data/{date_start}/{date_finish}', array('as' => 'backoffice_penetapan_pencabutan_izin_data', 'uses' => 'BackofficeController@penetapan_pencabutan_izin_data'));

/*

	Route Modul Kasir done

*/

Route::get('kasir/pembayaran_retribusi', ['as' => 'kasir_pembayaran_retribusi', 'uses' => 'KasirController@pembayaran_retribusi']);

Route::get('kasir/pembayaran_retribusi/data', ['as' => 'kasir_pembayaran_retribusi_data', 'uses' => 'KasirController@pembayaran_retribusi_data']);

Route::get('kasir/pembayaran_retribusi/data/{date_start}/{date_finish}', ['as' => 'kasir_pembayaran_retribusi_data', 'uses' => 'KasirController@pembayaran_retribusi_data']);

Route::get('kasir/pembayaran_retribusi/rincian/data/{id}', ['as' => 'kasir_pembayaran_retribusi_rincian_data', 'uses' => 'KasirController@pembayaran_retribusi_rincian_data']);

/*

	Route Modul Penyerahan

*/

# Penyerahan / Penyerahan Izin

Route::get('penyerahan/penyerahan_izin', ['as' => 'penyerahan_penyerahan_izin', 'uses' => 'PenyerahanController@penyerahan_izin']);

Route::get('penyerahan/penyerahan_izin/data', ['as' => 'penyerahan_penyerahan_izin_data', 'uses' => 'PenyerahanController@penyerahan_izin_data']);

Route::get('penyerahan/penyerahan_izin/data/{date_start}/{date_finish}', ['as' => 'penyerahan_penyerahan_izin_data', 'uses' => 'PenyerahanController@penyerahan_izin_data']);

# Penyerahan / Pengajuan Salinan

Route::get('penyerahan/pengajuan_salinan', array('as' => 'penyerahan_pengajuan_salinan', 'uses' => 'PenyerahanController@pengajuan_salinan'));

Route::get('penyerahan/pengajuan_salinan/data', ['as' => 'penyerahan_pengajuan_salinan_data', 'uses' => 'PenyerahanController@pengajuan_salinan_data']);

Route::get('penyerahan/pengajuan_salinan/data/{date_start}/{date_finish}', ['as' => 'penyerahan_pengajuan_salinan_data', 'uses' => 'PenyerahanController@pengajuan_salinan_data']);

# Penyerahan / Penyerahan Salinan

Route::get('penyerahan/penyerahan_salinan', array('as' => 'penyerahan_penyerahan_salinan', 'uses' => 'PenyerahanController@penyerahan_salinan'));

Route::get('penyerahan/penyerahan_salinan/data', ['as' => 'penyerahan_penyerahan_salinan_data', 'uses' => 'PenyerahanController@penyerahan_salinan_data']);

Route::get('penyerahan/penyerahan_salinan/data/{date_start}/{date_finish}', ['as' => 'penyerahan_penyerahan_salinan_data', 'uses' => 'PenyerahanController@penyerahan_salinan_data']);

/*

	Route Modul Pengaduan done ( Belum Dibuat 1 : Daftar Balasan )

*/

# Pengaduan / Daftar Pengaduan Saran

Route::get('pengaduan/daftar_pengaduan_saran', array('as' => 'pengaduan_daftar_pengaduan_saran', 'uses' => 'PengaduanController@daftar_pengaduan_saran'));

Route::get('pengaduan/daftar_pengaduan_saran/data', array('as' => 'pengaduan_daftar_pengaduan_saran_data', 'uses' => 'PengaduanController@daftar_pengaduan_saran_data'));

Route::get('pengaduan/daftar_pengaduan_saran/data/{id}', array('as' => 'pengaduan_daftar_pengaduan_saran_data', 'uses' => 'PengaduanController@daftar_pengaduan_saran_data'));

Route::get('pengaduan/daftar_pengaduan_saran/opsi', array('as' => 'pengaduan_daftar_pengaduan_saran_opsi_pengaduan', 'uses' => 'PengaduanController@daftar_pengaduan_saran_opsi_pengaduan'));

Route::get('pengaduan/daftar_pengaduan_saran/opsi_sumber_pengaduan', array('as' => 'pengaduan_daftar_pengaduan_saran_opsi_sumber_pengaduan', 'uses' => 'PengaduanController@daftar_pengaduan_saran_opsi_sumber_pengaduan'));

Route::get('pengaduan/daftar_pengaduan_saran/edit', array('as' => 'pengaduan_daftar_pengaduan_saran_edit', 'uses' => 'PengaduanController@daftar_pengaduan_saran_edit'));

Route::get('pengaduan/daftar_pengaduan_saran/edit/data/{id}', array('as' => 'pengaduan_daftar_pengaduan_saran_edit_data', 'uses' => 'PengaduanController@daftar_pengaduan_saran_edit_data'));

# Pengaduan / Persetujuan Respon Pengaduan

Route::get('pengaduan/persetujuan_respon_pengaduan', array('as' => 'pengaduan_persetujuan_respon_pengaduan', 'uses' => 'PengaduanController@persetujuan_respon_pengaduan'));

Route::get('pengaduan/persetujuan_respon_pengaduan/data', array('as' => 'pengaduan_persetujuan_respon_pengaduan_data', 'uses' => 'PengaduanController@persetujuan_respon_pengaduan_data'));

Route::get('pengaduan/persetujuan_respon_pengaduan/edit', array('as' => 'persetujuan_respon_pengaduan_edit', 'uses' => 'PengaduanController@persetujuan_respon_pengaduan_edit'));

Route::get('pengaduan/persetujuan_respon_pengaduan/edit/data/{id}', array('as' => 'persetujuan_respon_pengaduan_edit_data', 'uses' => 'PengaduanController@persetujuan_respon_pengaduan_edit_data'));

Route::get('pengaduan/persetujuan_respon_pengaduan/opsi_dinas', array('as' => 'persetujuan_respon_pengaduan_opsi_dinas', 'uses' => 'PengaduanController@persetujuan_respon_pengaduan_opsi_dinas'));

# Pengaduan / Pengiriman Respon Pengaduan

Route::get('pengaduan/pengiriman_respon_pengaduan', array('as' => 'pengaduan_pengiriman_respon_pengaduan', 'uses' => 'PengaduanController@pengiriman_respon_pengaduan'));

Route::get('pengaduan/pengiriman_respon_pengaduan/data', array('as' => 'pengaduan_pengiriman_respon_pengaduan_data', 'uses' => 'PengaduanController@pengiriman_respon_pengaduan_data'));

Route::get('pengaduan/pengiriman_respon_pengaduan/data/{id}', array('as' => 'pengaduan_pengiriman_respon_pengaduan_data', 'uses' => 'PengaduanController@pengiriman_respon_pengaduan_data'));

Route::get('pengaduan/pengiriman_respon_pengaduan/edit', array('as' => 'pengaduan_pengiriman_respon_pengaduan_edit', 'uses' => 'PengaduanController@pengiriman_respon_pengaduan_edit'));

Route::get('pengaduan/pengiriman_respon_pengaduan/edit/data/{id}', array('as' => 'pengaduan_pengiriman_respon_pengaduan_edit_data', 'uses' => 'PengaduanController@pengiriman_respon_pengaduan_edit_data'));

# Pengaduan / Daftar Balasan (Belum)

Route::get('pengaduan/daftar_balasan', array('as' => 'pengaduan_daftar_balasan', 'uses' => 'PengaduanController@daftar_balasan'));

Route::get('pengaduan/daftar_balasan/data', array('as' => 'pengaduan_daftar_balasan_data', 'uses' => 'PengaduanController@daftar_balasan_data'));

Route::get('pengaduan/daftar_balasan/data/{date_start}/{date_finish}', array('as' => 'pengaduan_daftar_balasan_data', 'uses' => 'PengaduanController@daftar_balasan_data'));

/*

	Route Portal

*/

# Portal / Data Provider

Route::get('portal/jenis_pengaduan/data', ['as' => 'portal_jenis_pengaduan_data', 'uses' => 'PortalController@jenis_pegaduan_data']);

Route::get('portal/jenis_perizinan/data', ['as' => 'portal_jenis_pengaduan_data', 'uses' => 'PortalController@jenis_perizinan_data']);

Route::get('portal/kelurahan/data/{id}', ['as' => 'portal_jenis_pengaduan_data', 'uses' => 'PortalController@kelurahan_data']);

Route::get('portal/kecamatan/data/{id}', ['as' => 'portal_jenis_pengaduan_data', 'uses' => 'PortalController@kecamatan_data']);

Route::get('portal/kabupaten/data/{id}', ['as' => 'portal_jenis_pengaduan_data', 'uses' => 'PortalController@kabupaten_data']);

Route::get('portal/propinsi/data', ['as' => 'portal_jenis_pengaduan_data', 'uses' => 'PortalController@propinsi_data']);

Route::get('portal/jenis_perizinan/data', ['as' => 'portal_jenis_perizinan_data', 'uses' => 'PortalController@jenis_perizinan_data']);

Route::get('portal/jenis_perizinan/persyaratan/data/{id}', ['as' => 'portal_jenis_perizinan_persyaratan_data', 'uses' => 'PortalController@jenis_perizinan_persyaratan_data']);

# Portal / Layanan Online / Pendaftaran Online

Route::post('portal/layanan_online/test', ['uses' => 'PortalController@test_post']);

Route::get('portal/layanan_online/pendaftaran_online', ['uses' => 'PortalController@layanan_online_pendaftaran_online']);

# Portal / Layanan Online / Pengaduan Online

Route::get('portal/layanan_online/pengaduan_online', ['uses' => 'PortalController@layanan_online_pengaduan_online']);


/*

	Prototype

*/

Route::get('prototype/interface', ['uses' => 'PrototypeController@home']);

Route::post('prototype/submit_data', ['uses' => 'PrototypeController@submit_data']);

Route::get('prototype/load_file', ['uses' => 'PrototypeController@load_file']);
