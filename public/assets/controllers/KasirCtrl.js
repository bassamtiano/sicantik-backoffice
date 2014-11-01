var fetch_limit = 100;

$app = angular.module('sicantik_backoffice', [])
.controller('KasirPembayaranRetribusiCtrl', ['$http', '$scope',

	function($http, $scope) {

		/* # Prepare Data ============================================================================================= */

		$scope.show_all = function() {
			$http.get('pembayaran_retribusi/data').success(function(kpr_data) {
				$scope.kasir_pembayaran_retribusi = kpr_data;
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

		$scope.kasir_pembayaran_retribusi;

		/* # Modal ==================================================================================================== */

		/* Define Modal Name */

		$scope.modal_rincian = false;

		/* Define Open & Close Handler */

		$scope.open_modal = function(modal_name, id) {

			eval("$scope." + modal_name + "= true");
			eval("$scope." + modal_name + "_data(" + id + ")");
		}

		$scope.close_modal = function(modal_name) {
			eval("$scope." + modal_name + "= false");
		}

		/*  Construct Modal Function */

		$scope.modal_rincian_data = function(id) {
			$http.get('pembayaran_retribusi/rincian/data/' + id).success(function(prrd) {
				$scope.pembayaran_retribusi_rincian_data = prrd;
			});
		}


		/* Define Tab Name */

		$scope.tab = [];

		$scope.tab.data_pemohon = true;

		/* # Submit =================================================================================================== */

		$scope.filter_date = function() {
			$http.get('pembayaran_retribusi/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(kpr_data) {
				$scope.kasir_pembayaran_retribusi = kpr_data;
			});
		}
	}

]);
