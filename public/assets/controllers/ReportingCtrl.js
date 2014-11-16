var fetch_limit = 20;

$app = angular.module('sicantik_backoffice', [])

.controller('ReportingRealisasiPenerimaanCtrl', ['$http','$scope',
	function($http, $scope) {

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
			$scope.reporting_realisasi_penerimaan = pps_data;
		});
	}
}
])



.controller('ReportingRekapitulasiPendaftaranCtrl', ['$http', '$scope',
	function ($http, $scope){
	/* # Prepare Data ============================================================================================= */

	$scope.reporting_rekapitulasi_pendaftaran = "";

	$scope.show_all = function() {
		$http.get('rekapitulasi_pendaftaran/data/0000-00-00/0000-00-00').success(function(rpd_data) {
			$scope.reporting_rekapitulasi_pendaftaran = rpd_data;
		});
	}
	$scope.show_all();

	/* # Filter Data ============================================================================================== */
	$scope.date = [];
	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function() {

		$scope.displayed += fetch_limit;
		$scope.sisa -= fetch_limit;
	}

	$scope.reporting_rekapitulasi_pendaftaran;

	/* # Submit =================================================================================================== */
	$scope.filter_date = function() {
		$http.get('rekapitulasi_pendaftaran/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(rpd_data) {
			$scope.reporting_rekapitulasi_pendaftaran = rpd_data;
		});
	}
}
])

.controller('ReportingRekapitulasiPerizinanCtrl',['$http','$scope',
	function ($http, $scope) {

	/* # Prepare Data ============================================================================================= */

	$scope.show_all = function() {
		$http.get('rekapitulasi_perizinan/data').success(function(rpd_data) {
			$scope.reporting_rekapitulasi_perizinan = rpd_data;
		});
	}

	$scope.show_all();

	/* # Filter Data ============================================================================================== */

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function() {

		$scope.displayed += fetch_limit;
		$scope.sisa -= fetch_limit;
	}

	/* # Submit =================================================================================================== */
	$scope.filter_date = function() {
		$http.get('rekapitulasi_perizinan/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(rpd_data) {
			$scope.reporting_rekapitulasi_perizinan = rpd_data;
		});
	}
}
])


.controller('ReportingRekapitulasiRetribusiCtrl', ['$http', '$scope',
	function ($http, $scope){
	/* # Prepare Data ============================================================================================= */

	$scope.reporting_rekapitulasi_retribusi = "";

	$scope.show_all = function() {
		$http.get('rekapitulasi_retribusi/data/0000-00-00/0000-00-00').success(function(rrt_data) {
			$scope.reporting_rekapitulasi_retribusi = rrt_data;
		});
	}
	$scope.show_all();
	/* # Filter Data ============================================================================================== */

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function() {

		$scope.displayed += fetch_limit;
		$scope.sisa -= fetch_limit;
	}

	$scope.reporting_rekapitulasi_retribusi;

	/* # Submit =================================================================================================== */
	$scope.filter_date = function() {
		$http.get('rekapitulasi_retribusi/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(rpd_data) {
			$scope.reporting_rekapitulasi_retribusi = rpd_data;
		});
	}
}
])


.controller('RekapitulasiTinjauanLapanganCtrl', ['$http', '$scope',
	function ($http, $scope) {
	/* # Prepare Data ============================================================================================= */

	$scope.show_all = function() {
		$http.get('rekapitulasi_tinjauan_lapangan/data/0000-00-00/0000-00-00').success(function(rtld) {
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
		$http.get('rekapitulasi_tinjauan_lapangan/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(rtld_data) {
			$scope.rekapitulasi_tinjauan_lapangan_data = rtld_data;
		});
	}

}
])

.controller('ReportingBerkasKembaliCtrl', ['$http', '$scope' ,
	function ($http, $scope) {

	/* # Prepare Data ============================================================================================= */

	$scope.show_all = function() {
		$http.get('rekapitulasi_berkas_kembali/data/0000-00-00/0000-00-00').success(function(rbkd) {
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
		$http.get('rekapitulasi_berkas_kembali/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(rbkd_data) {
			$scope.rekapitulasi_berkas_kembali_data = rbkd_data;
		});
	}
}
])

.controller('ReportingRekapitulasiIzinTercetakCtrl', ['$http', '$scope' ,
	function ($http, $scope) {

	/* # Prepare Data ============================================================================================= */

	$scope.show_all = function() {
		$http.get('rekapitulasi_izin_tercetak/data/0000-00-00/0000-00-00').success(function(ritd) {
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
		$http.get('rekapitulasi_izin_tercetak/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(ritd_data) {
			$scope.rekapitulasi_izin_tercetak_data = ritd_data;
		});
	}
}
])