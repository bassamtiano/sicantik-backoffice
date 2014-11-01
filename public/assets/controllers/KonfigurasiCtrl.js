angular.module('sicantik_backoffice', []);
////////////////////////////////////KONFIGURASI START//////////////////////////////
///////////////////////////////////////////////////////////////////////////////////

//////////////////////////////SETTING PERIZINAN/////////////////////
function KonfigurasiSettingPerizinanJenisPerizinanCtrl($scope, $http) {
	$http.get('jenis_perizinan/data').success(function(spjp_data) {
		$scope.setting_perizinan_jenis_perizinan_data = spjp_data;
	});

	$scope.modal_edit = false;
	$scope.modal_delete = false;

	$scope.open_modal = function(modal_name) {
		eval("$scope." + modal_name + "= true");
	}

	$scope.close_modal = function(modal_name) {
		eval("$scope." + modal_name + "= false");
	}

}

function KonfigurasiSettingPerizinanPerizinanParalelCtrl($scope, $http) {
	$http.get('perizinan_paralel/data').success(function(sppp_data) {
		$scope.setting_perizinan_perizinan_paralel_data = sppp_data;
	});
}

function KonfigurasiSettingPerizinanPersyaratanIzinCtrl($scope, $http) {
	$http.get('persyaratan_izin/data').success(function(sppi_data) {
		$scope.setting_perizinan_persyaratan_izin_data = sppi_data;
	});
}

function KonfigurasiSettingPerizinanPropertyPendataanCtrl($scope, $http) {
	$http.get('property_pendataan/data').success(function(sppp_data) {
		$scope.setting_perizinan_property_pendataan_data = sppp_data;
	});
}

function KonfigurasiSettingPerizinanNilaiRetribusiCtrl($scope, $http) {
	$http.get('nilai_retribusi/data').success(function(spnr_data) {
		$scope.setting_perizinan_nilai_retribusi_data = spnr_data;
	});
}

function KonfigurasiSettingPerizinanKoefisienTarifCtrl($scope, $http) {
	$http.get('koefisein_tarif/data').success(function(spkt_data) {
		$scope.setting_perizinan_koefisien_tarif_data = spkt_data;
	});
}

///////////////////////////////////SETTING UMUM/////////////////////////////////////////
function KonfigurasiSettingUmumHariLiburCtrl($scope, $http){
	$http.get('hari_libur/data').success(function(suhl_data){
		$scope.setting_umum_hari_libur = suhl_data;
	});
}

function KonfigurasiSettingUmumInstansiCtrl($scope, $http) {

	$http.get('instansi/opsi/wilayah/data').success(function(suiowd_data){
		$scope.setting_umum_instansi_opsi_wilayah_data = suiowd_data;
	});
}

//////////////////////////////SETTING USER///////////////////////////////////////
function KonfigurasiSettingUserPegawaiCtrl($scope, $http){
	$http.get('pegawai/data').success(function(susp_data){
		$scope.setting_user_pegawai = susp_data;
	});
}

function KonfigurasiSetingUserUnitKerjaCtrl($scope, $http){
	$http.get('unit_kerja/data').success(function(sukj_data){
		$scope.setting_user_unit_kerja = sukj_data;
	});
}

function KonfigurasiSettingUserPenggunaCtrl($scope, $http){
	$http.get('pengguna/data').success(function(sup_data){
		$scope.setting_user_pengguna = sup_data;
	});
}

/////////////////////////////////SETTING WILAYAH/////////////////////
function KonfigurasiSettingWilayahKecamatanCtrl($scope, $http){
	$http.get('kecamatan/data').success(function(swkc_data){
		$scope.setting_wilayah_kecamatan = swkc_data;
	});
}

function KonfigurasiSettingWilayahKelurahanCtrl($scope, $http){
	$http.get('kelurahan/data').success(function(swkl_data){
		$scope.setting_wilayah_kelurahan = swkl_data;
	});
}

function KonfigurasiSettingWilayahPropinsi($scope, $http) {
	$http.get('propinsi/data').success(function(swp_data) {
		$scope.setting_wilayah_propinsi = swp_data;
	});
}

function KonfigurasiSettingWilayahKabupaten($scope, $http) {
	$http.get('kabupaten/data').success(function(swk_data) {
		$scope.setting_wilayah_kabupaten = swk_data;
	});
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
