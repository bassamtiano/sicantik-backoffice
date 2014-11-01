var fetch_limit = 100;

$app = angular.module('sicantik_backoffice', [])

.controller('PenyerahanPenyerahanIzinCtrl', ['$http', '$scope',

	function($http, $scope) {

		/* # Prepare Data ============================================================================================= */

		$scope.show_all = function() {
			$http.get('penyerahan_izin/data').success(function(ppi_data) {
				$scope.penyerahan_penyerahan_izin = ppi_data;
			});
		}

		$scope.show_all();

		/* # Filter Data ============================================================================================== */

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function() {
			$scope.displayed += fetch_limit;
		}

		$scope.penyerahan_penyerahan_izin;

		/* # Modal ==================================================================================================== */

		$scope.modal_penyerahan = false;
		$scope.modal_email = false;

		/* Define Open & Close Handler */

		$scope.open_modal = function(modal_name, id) {

			eval("$scope." + modal_name + "= true");
			eval("$scope." + modal_name + "_data(" + id + ")");
		}

		$scope.close_modal = function(modal_name) {
			eval("$scope." + modal_name + "= false");
		}

		/*  Construct Modal Function */

		/* # Submit =================================================================================================== */

		$scope.filter_date = function() {
			$http.get('penyerahan_izin/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(ppi_data) {
				$scope.penyerahan_penyerahan_izin = ppi_data;
			});
		}
	}

])

.controller('PenyerahanPengajuanSalinanCtrl', ['$http', '$scope',

	function($http, $scope) {

		/* # Prepare Data ============================================================================================= */

		$scope.show_all = function() {
			$http.get('pengajuan_salinan/data').success(function(pps_data) {
				$scope.penyerahan_pengajuan_salinan = pps_data;
			});
		}

		$scope.show_all();

		/* # Filter Data ============================================================================================== */

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function() {
			$scope.displayed += fetch_limit;
		}

		$scope.penyerahan_pengajuan_salinan;

		/* # Modal ==================================================================================================== */



		/* # Submit =================================================================================================== */

		$scope.filter_date = function() {
			$http.get('pengajuan_salinan/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(pps_data) {
				$scope.penyerahan_pengajuan_salinan = pps_data;
			});
		}

	}

])


.controller('PenyerahanPenyerahanSalinanCtrl', ['$http', '$scope',

	function($http, $scope) {

		/* # Prepare Data ============================================================================================= */

		$scope.show_all = function() {
			$http.get('penyerahan_salinan/data').success(function(pps_data) {
				$scope.penyerahan_penyerahan_salinan = pps_data;
			});
		}

		$scope.show_all();

		/* # Filter Data ============================================================================================== */

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function() {
			$scope.displayed += fetch_limit;
		}

		$scope.penyerahan_penyerahan_salinan;

		/* # Modal ==================================================================================================== */



		/* # Submit =================================================================================================== */

		$scope.filter_date = function() {
			$http.get('penyerahan_salinan/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(pps_data) {
				$scope.penyerahan_penyerahan_salinan = pps_data;
			});
		}

	}

]);
