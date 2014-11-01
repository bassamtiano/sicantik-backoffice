$app = angular.module('sicantik_backoffice', []);

var fetch_limit = 20;

function ReportingRealisasiPenerimaanCtrl($scope, $http) {

	/* # Prepare Data ============================================================================================= */

	$scope.reporting_realisasi_penerimaan = "";

	$scope.show_all = function() {
		$http.get('realisasi_penerimaan/data/2004-10-10/2014-10-10').success(function(rrp_data) {
			$scope.reporting_realisasi_penerimaan = rrp_data;
		});
	}

	$scope.show_all();

	/* # Filter Data ============================================================================================== */

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;


	// alert($scope.sisa = reporting_realisasi_penerimaan.length);

	$scope.loadMore = function() {

		$scope.displayed += fetch_limit;
		$scope.sisa -= fetch_limit;
	}

	$scope.reporting_realisasi_penerimaan;

	/* # Modal ==================================================================================================== */



	/* # Submit =================================================================================================== */

	$scope.filter_date = function() {
		$http.get('realisasi_penerimaan/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(pps_data) {
			$scope.penyerahan_pengajuan_salinan = pps_data;
		});
	}

}


function RekapitulasiTinjauanLapanganCtrl($http, $scope) {

	/* # Prepare Data ============================================================================================= */

	$scope.show_all = function() {
		$http.get('rekapitulasi_tinjauan_lapangan/data').success(function(rtld) {
			$scope.rekapitulasi_tinjauan_lapangan_data = rtld;
		});
	}

	$scope.show_all();

	/* # Filter Data ============================================================================================== */

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;


	// alert($scope.sisa = reporting_realisasi_penerimaan.length);

	$scope.loadMore = function() {
		$scope.displayed += fetch_limit;
		$scope.sisa -= fetch_limit;
	}

	/* # Modal ==================================================================================================== */



	/* # Submit =================================================================================================== */

	$scope.filter_date = function() {
		$http.get('rekapitulasi_tinjauan_lapangan/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(pps_data) {
			$scope.rekapitulasi_tinjauan_lapangan_data = rtld;
		});
	}

}

function ReportingBerkasKembaliCtrl($http, $scope) {

	/* # Prepare Data ============================================================================================= */

	$scope.show_all = function() {
		$http.get('rekapitulasi_berkas_kembali/data').success(function(rbkd) {
			$scope.rekapitulasi_berkas_kembali_data = rbkd;
		});
	}

	$scope.show_all();

	/* # Filter Data ============================================================================================== */

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;


	// alert($scope.sisa = reporting_realisasi_penerimaan.length);

	$scope.loadMore = function() {
		$scope.displayed += fetch_limit;
		$scope.sisa -= fetch_limit;
	}

	/* # Modal ==================================================================================================== */



	/* # Submit =================================================================================================== */

	$scope.filter_date = function() {
		$http.get('rekapitulasi_tinjauan_lapangan/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(pps_data) {
			$scope.rekapitulasi_tinjauan_lapangan_data = rtld;
		});
	}

}

function ReportingRekapitulasiIzinTercetakCtrl($http, $scope) {

	/* # Prepare Data ============================================================================================= */

	$scope.show_all = function() {
		$http.get('rekapitulasi_izin_tercetak/data').success(function(ritd) {
			$scope.rekapitulasi_izin_tercetak_data = ritd;
		});
	}

	$scope.show_all();

	/* # Filter Data ============================================================================================== */

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;


	// alert($scope.sisa = reporting_realisasi_penerimaan.length);

	$scope.loadMore = function() {
		$scope.displayed += fetch_limit;
		$scope.sisa -= fetch_limit;
	}

	/* # Modal ==================================================================================================== */



	/* # Submit =================================================================================================== */

	$scope.filter_date = function() {
		$http.get('rekapitulasi_tinjauan_lapangan/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(pps_data) {
			$scope.rekapitulasi_tinjauan_lapangan_data = rtld;
		});
	}

}
