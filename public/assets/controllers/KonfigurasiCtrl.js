$app = angular.module('sicantik_backoffice', []);

var fetch_limit = 100;
////////////////////////////////////KONFIGURASI START//////////////////////////////

//////////////////////////////SETTING PERIZINAN/////////////////////
function KonfigurasiSettingPerizinanJenisPerizinanCtrl($scope, $http) {
	/* # Prepare Data ============================================================================================= */
	$scope.show_all = function(){
		$http.get('jenis_perizinan/data').success(function(spjp_data) {
			$scope.setting_perizinan_jenis_perizinan_data = spjp_data;
		});
	}

	$scope.opsi_kelompok = function(){ 
		$http.get('jenis_perizinan/opsi_kelompok').success(function(jpok_data) { 
			$scope.jenis_perizinan_opsi_kelompok = jpok_data;
		});
	}

	$scope.opsi_unitkerja = function(){ 
		$http.get('jenis_perizinan/opsi_unitkerja').success(function(jpou_data) { 
			$scope.jenis_perizinan_opsi_unitkerja = jpou_data;
		});
	}

	$scope.opsi_kelompok();
	$scope.opsi_unitkerja();

	$scope.show_all();

	/* # Filter Data ============================================================================================== */

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_perizinan_jenis_perizinan_data;

	/* # Modal ==================================================================================================== */

	/* Define Modal Name */

	$scope.modal_tambah = false;
	$scope.modal_edit = false;

	/* Define Open & Close Handler */

	$scope.open_modal = function(modal_name, id) {

		eval("$scope." + modal_name + "= true");
		eval("$scope." + modal_name + "_data(" + id + ")");
	}

	$scope.close_modal = function(modal_name) {
		eval("$scope." + modal_name + "= false");
	}

	/*  Construct Modal Function */

	// $scope.modal_data_awal_data = function(id) {
	// 	$http.get('entry_data_perizinan/data_awal/data/' + id).success(function(edpdad) {
	// 		$scope.entry_data_perizinan_data_awal_data = edpdad;
	// 	});
	// }

	$scope.modal_edit_data = function(id) {
		$http.get('jenis_perizinan/edit/data/' + id).success(function(jped) {
			$scope.jenis_perizinan_edit_data = jped;
		});
	}

	/* Define Tab Name */

	$scope.tab = [];

	$scope.tab.tambah_data_jenis_perizinan = true;
	$scope.tab.edit_data_jenis_perizinan = true;

	$scope.show_tab = function(tab_name, button_id) {

		$scope.tab.tambah_data_jenis_perizinan = false;
		$scope.tab.edit_data_jenis_perizinan = false;

		eval('$scope.' + tab_name + "= true");

		$('.tab-nav-item').removeClass('enable');
		$('#' + button_id).addClass('enable');

	}

	$scope.filter_konfigurasi = function(){
		$http.get('jenis_perizinan/data/' + $scope.konfigurasi_id).success(function(spjp_data){
			$scope.setting_perizinan_jenis_perizinan_data = spjp_data;
		});
	}

	$scope.modal_tambah_submit = function() {

	}

	$scope.modal_edit_submit = function() {

	}

}

function KonfigurasiSettingPerizinanPerizinanParalelCtrl($scope, $http) {
	
	$scope.show_all = function(){
		$http.get('perizinan_paralel/data').success(function(sppp_data) {
			$scope.setting_perizinan_perizinan_paralel_data = sppp_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_perizinan_perizinan_paralel_data;

	$scope.filter_konfigurasi = function(){
		$http.get('perizinan_paralel/data/' + $scope.konfigurasi_id).success(function(sppp_data){
			$scope.setting_perizinan_perizinan_paralel_data = sppp_data;
		});
	}
}

function KonfigurasiSettingPerizinanPersyaratanIzinCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('persyaratan_izin/data').success(function(sppi_data) {
			$scope.setting_perizinan_persyaratan_izin_data = sppi_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_perizinan_persyaratan_izin_data;

	$scope.filter_konfigurasi = function(){
		$http.get('persyaratan_izin/data/' + $scope.konfigurasi_id).success(function(sppi_data){
			$scope.setting_perizinan_persyaratan_izin_data = sppi_data;
		});
	}
}

function KonfigurasiSettingPerizinanPropertyPendataanCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('property_pendataan/data').success(function(sppp_data) {
			$scope.setting_perizinan_property_pendataan_data = sppp_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_perizinan_property_pendataan_data;

	$scope.filter_konfigurasi = function(){
		$http.get('property_pendataan/data/' + $scope.konfigurasi_id).success(function(sppp_data){
			$scope.setting_perizinan_property_pendataan_data = sppp_data;
		});
	}
}

function KonfigurasiSettingPerizinanNilaiRetribusiCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('nilai_retribusi/data').success(function(spnr_data) {
			$scope.setting_perizinan_nilai_retribusi_data = spnr_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_perizinan_nilai_retribusi_data;

	$scope.filter_konfigurasi = function(){
		$http.get('property_pendataan/data/' + $scope.konfigurasi_id).success(function(sppp_data){
			$scope.setting_perizinan_nilai_retribusi_data = sppp_data;
		});
	}
}

function KonfigurasiSettingPerizinanKoefisienTarifCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('koefisien_tarif/data').success(function(spkt_data) {
			$scope.setting_perizinan_koefisien_tarif_data = spkt_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_perizinan_koefisien_tarif_data;

	$scope.filter_konfigurasi = function(){
		$http.get('koefisien_tarif/data/' + $scope.konfigurasi_id).success(function(spkt_data){
			$scope.setting_perizinan_koefisien_tarif_data = spkt_data;
		});
	}
}

///////////////////////////////////SETTING UMUM/////////////////////////////////////////
function KonfigurasiSettingUmumHariLiburCtrl($scope, $http){

	$scope.show_all = function(){
		$http.get('hari_libur/data').success(function(suhl_data){
			$scope.setting_umum_hari_libur_data = suhl_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_umum_hari_libur_data;

	$scope.filter_konfigurasi = function(){
		$http.get('hari_libur/data/' + $scope.konfigurasi_id).success(function(suhl_data){
			$scope.setting_umum_hari_libur_data = suhl_data;
		});
	}
}

function KonfigurasiSettingUmumInstansiCtrl($scope, $http) {

	$http.get('instansi/opsi/wilayah/data').success(function(suiowd_data){
		$scope.setting_umum_instansi_opsi_wilayah_data = suiowd_data;
	});
}

//////////////////////////////SETTING USER///////////////////////////////////////
function KonfigurasiSettingUserPegawaiCtrl($scope, $http){

	$scope.show_all = function(){
		$http.get('pegawai/data').success(function(sup_data){
			$scope.setting_user_pegawai_data = sup_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_user_pegawai_data;

	$scope.filter_konfigurasi = function(){
		$http.get('pegawai/data/' + $scope.konfigurasi_id).success(function(sup_data){
			$scope.setting_user_pegawai_data = sup_data;
		});
	}
}

function KonfigurasiSetingUserUnitKerjaCtrl($scope, $http){
	
	$scope.show_all = function(){
		$http.get('unit_kerja/data').success(function(suuk_data){
			$scope.setting_user_unit_kerja_data = suuk_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_user_pegawai_data;

	$scope.filter_konfigurasi = function(){
		$http.get('unit_kerja/data/' + $scope.konfigurasi_id).success(function(suuk_data){
			$scope.setting_user_unit_kerja_data = suuk_data;
		});
	}
}

function KonfigurasiSettingUserPenggunaCtrl($scope, $http){

	$scope.show_all = function(){
		$http.get('pengguna/data').success(function(sup_data){
			$scope.setting_user_pengguna_data = sup_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_user_pegawai_data;

	$scope.filter_konfigurasi = function(){
		$http.get('pengguna/data/' + $scope.konfigurasi_id).success(function(sup_data){
			$scope.setting_user_pengguna_data = sup_data;
		});
	}
}

/////////////////////////////////SETTING WILAYAH/////////////////////
function KonfigurasiSettingWilayahPropinsi($scope, $http) {

	$scope.show_all = function(){
		$http.get('propinsi/data').success(function(swp_data) {
			$scope.setting_wilayah_propinsi_data = swp_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_wilayah_propinsi_data;

	$scope.filter_konfigurasi = function(){
		$http.get('propinsi/data/' + $scope.konfigurasi_id).success(function(swp_data){
			$scope.setting_wilayah_propinsi_data = swp_data;
		});
	}
}

function KonfigurasiSettingWilayahKabupaten($scope, $http) {

	$scope.show_all = function(){
		$http.get('kabupaten/data').success(function(swk_data) {
			$scope.setting_wilayah_kabupaten_data = swk_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_wilayah_kabupaten_data;

	$scope.filter_konfigurasi = function(){
		$http.get('kabupaten/data/' + $scope.konfigurasi_id).success(function(swk_data){
			$scope.setting_wilayah_kabupaten_data = swk_data;
		});
	}
}

function KonfigurasiSettingWilayahKecamatanCtrl($scope, $http){

	$scope.show_all = function(){
		$http.get('kecamatan/data').success(function(swkc_data){
			$scope.setting_wilayah_kecamatan_data = swkc_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_wilayah_kecamatan_data;

	$scope.filter_konfigurasi = function(){
		$http.get('kecamatan/data/' + $scope.konfigurasi_id).success(function(swkc_data){
			$scope.setting_wilayah_kecamatan_data = swkc_data;
		});
	}
}

function KonfigurasiSettingWilayahKelurahanCtrl($scope, $http){

	$scope.show_all = function(){
		$http.get('kelurahan/data').success(function(swkl_data){
			$scope.setting_wilayah_kelurahan_data = swkl_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.setting_wilayah_kecamatan_data;

	$scope.filter_konfigurasi = function(){
		$http.get('kelurahan/data/' + $scope.konfigurasi_id).success(function(swkl_data){
			$scope.setting_wilayah_kelurahan_data = swkl_data;
		});
	}
}

function KonfigurasiKeamananDataLogActivity($scope, $http) {

	/* # Prepare Data ============================================================================================= */

	$scope.show_all = function() {
		$http.get('log_activity/data').success(function(kdla_data) {
			$scope.keamanan_data_log_activity = kdla_data;
		});
	}

	$scope.show_all();

	/* # Filter Data ============================================================================================== */

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = 100;

	$scope.loadMore = function() {
		$scope.displayed += 100;
	}

	$scope.keamanan_data_log_activity;

	/* # Modal ==================================================================================================== */

	$scope.modal_delete = function(id) {
		alert(id);
	}

	/* # Submit =================================================================================================== */

	$scope.filter_date = function() {
		$http.get('log_activity/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(kdla_data) {
			$scope.keamanan_data_log_activity = kdla_data;
		});
	}

}

function KonfigurasiReportReportGenerator($http, $scope) {
	/* # Prepare Data ============================================================================================= */

	$scope.show_all = function() {
		$http.get('report_generator/data').success(function(rg_data) {
			$scope.report_generator_data = rg_data;
		});
	}

	$scope.show_all();

	/* # Filter Data ============================================================================================== */

	$scope.displayed = 100;

	$scope.loadMore = function() {
		$scope.displayed += 100;
	}

	$scope.report_generator_data;
}

function KonfigurasiReportReportComponent($http, $scope) {
	/* # Prepare Data ============================================================================================= */

	$scope.show_all = function() {
		$http.get('report_component/data').success(function(rc_data) {
			$scope.report_component_data = rc_data;
		});
	}

	$scope.show_all();

	/* # Filter Data ============================================================================================== */

	$scope.displayed = 100;

	$scope.loadMore = function() {
		$scope.displayed += 100;
	}

	$scope.report_component_data;
}

////////////////////////////////////KONFIGURASI END////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
