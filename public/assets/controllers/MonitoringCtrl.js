var fetch_limit = 10;
$app = angular.module('sicantik_backoffice',[])

.controller('MonitoringPerJenisPerizinanCtrl', ['$scope', '$http',
	function ($scope, $http){
		
		$scope.show_all = function() {
		$http.get('per_jenis_perizinan/data').success(function(mpjp_data){
			$scope.monitoring_per_jenis_perizinan_data = mpjp_data;
		});
	}

	$scope.show_all();

		$scope.date = [];
		$scope.date.id = "null";

		$scope.per_jenis_perizinan_datacombo = function() {
		$http.get('per_jenis_perizinan/datacombo').success(function(mpjpc_datacombo){
			$scope.monitoring_per_jenis_perizinan_datacombo = mpjpc_datacombo;
		});
	}
	$scope.per_jenis_perizinan_datacombo();

	/* # Filter Data ============================================================================================== */

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function() {
			$scope.displayed += fetch_limit;
		}

		$scope.monitoring_per_jenis_perizinan_data;

		/* # Modal ==================================================================================================== */



		/* # Submit =================================================================================================== */

		$scope.filter_date = function() {
			$http.get('per_jenis_perizinan/data/' + $scope.date.id + '/' + $scope.date.start + '/' + $scope.date.finish).success(function(mpjp_data) {
				$scope.monitoring_per_jenis_perizinan_data = mpjp_data;
			});
		}		
	}
])

.controller('MonitoringPerJangkaWaktuCtrl', ['$scope', '$http',
	function ($scope, $http){
		/* # Prepare Data ============================================================================================= */
		$scope.date = [];

		$scope.show_all = function() {
			$http.get('per_jangka_waktu/data').success(function(mpjw_data){
				$scope.monitoring_per_jangka_waktu_data = mpjw_data;
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

		$scope.monitoring_per_jangka_waktu_data;

		/* # Modal ==================================================================================================== */



		/* # Submit =================================================================================================== */

		$scope.filter_date = function() {
			if($scope.date.start == null || $scope.date.finish == null){
				alert("Isi terlebih dahulu tanggal awal dan tanggal akhir")
			}
			else{
				$http.get('per_jangka_waktu/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(mpjw_data) {
				$scope.monitoring_per_jangka_waktu_data = mpjw_data;
			});
			}
		}
	}
])

.controller('MonitoringPerBulanPengambilanIzinCtrl', ['$scope', '$http',
	function ($scope, $http){
			$scope.show_all = function() {
				$http.get('per_bulan_pengambilan_izin/data').success(function(mpbpi_data) {
				$scope.monitoring_per_bulan_pengambilan_izin_data = mpbpi_data;
				});
			}
			
			$scope.show_all();

			/* #Ambil Opsi ================================================================================================ */

			$scope.date = [];
			
			$scope.date.id = "null";
			
			$scope.opsi_jenis_perizinan = function() {
				$http.get('per_bulan_pengambilan_izin/opsi').success(function(mpbpi_opsi) {
					$scope.monitoring_per_bulan_pengambilan_izin_opsi = mpbpi_opsi;
				});
			}

			$scope.opsi_jenis_perizinan();

			/* # Filter Data ============================================================================================== */

			$scope.opsi_cari = "$";
			$scope.search = {};
			$scope.displayed = fetch_limit;

			$scope.loadMore = function() {
				$scope.displayed += fetch_limit;
			}

			$scope.monitoring_per_bulan_pengambilan_izin_data;

			/* # Modal ==================================================================================================== 



			/* # Submit =================================================================================================== */
			
			$scope.filter_date = function() {
				if ($scope.date.id == "nul" || $scope.date.start == null || $scope.date.finish == null){
					alert('Jenis Perizinan belum ditentukan. Pilih salah satu Jenis Perizinan!');
				}
				else {
					$http.get('per_bulan_pengambilan_izin/data/' + $scope.date.id + '/' + $scope.date.start + '/' + $scope.date.finish).success(function(mpbpi_data) {
						$scope.monitoring_per_bulan_pengambilan_izin_data = mpbpi_data;
					});
				}
				
			}
	}
])

.controller('MonitoringPerStatusPerizinanCtrl', ['$scope', '$http',
	function ($scope, $http){
		$scope.show_all = function() {
		$http.get('per_status_perizinan/data').success(function(mpsp_data){
			$scope.monitoring_per_status_perizinan_data = mpsp_data;
		});
	}

		$scope.show_all();

		$scope.date = [];
		$scope.date.id = "null";

		$scope.per_status_perizinan_datacombo = function() {
		$http.get('per_status_perizinan/datacombo').success(function(mpspc_datacombo){
			$scope.monitoring_per_status_perizinan_datacombo = mpspc_datacombo;
		});
	}
	$scope.per_status_perizinan_datacombo();

	/* # Filter Data ============================================================================================== */

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function() {
			$scope.displayed += fetch_limit;
		}

		$scope.monitoring_per_status_perizinan_data;

		/* # Modal ==================================================================================================== */



		/* # Submit =================================================================================================== */

		$scope.filter_date = function() {
			$http.get('per_status_perizinan/data/' + $scope.date.id + '/' + $scope.date.start + '/' + $scope.date.finish).success(function(mpsp_data) {
				$scope.monitoring_per_status_perizinan_data = mpsp_data;
			});
		}
	}
])

.controller('MonitoringPerNamaPemohonCtrl', ['$scope', '$http',
	function ($scope, $http){
		$scope.show_all = function() {
		$http.get('per_nama_pemohon/data').success(function(mpnp_data){
			$scope.monitoring_per_nama_pemohon_data = mpnp_data;
		});
		}

		$scope.show_all();
		$scope.date = [];
		
		$scope.date.n_pemohon = null;

	/* # Filter Data ============================================================================================== */

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function() {
			$scope.displayed += fetch_limit;
		}

		$scope.monitoring_per_nama_pemohon_data;

		/* # Modal ==================================================================================================== */



		/* # Submit =================================================================================================== */

		$scope.filter_date = function() {
			$http.get('per_nama_pemohon/data/' + $scope.date.n_pemohon + '/' + $scope.date.start + '/' + $scope.date.finish).success(function(mpnp_data) {
				$scope.monitoring_per_nama_pemohon_data = mpnp_data;
			});
		}
	}
])

.controller('MonitoringPerDesaKecamatanCtrl', ['$scope', '$http',
	function ($scope, $http){
		/* # Prepare Data ============================================================================================= */
	    $scope.date = [];

	    $scope.date.prop = "";
	    $scope.date.kab = "";
	    $scope.date.kec = "";
	    $scope.date.kel = "";
		$scope.show_all = function() {
			$http.get('per_desa_dan_kecamatan/data').success(function(mpdk_data){
				$scope.monitoring_per_desa_dan_kecamatan_data = mpdk_data;
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

		$scope.monitoring_per_desa_dan_kecamatan_data;

		/* # Modal ==================================================================================================== */



		/* # Submit =================================================================================================== */

		$scope.get_propinsi = function() {
			$scope.aaa = $scope.propinsi_pemohon;
			$http.get('per_desa_dan_kecamatan/opsi/propinsi').success(function(pjp_data) {
				$scope.portal_propinsi_data = pjp_data;
			});
		}

		$scope.get_propinsi();

		$scope.$watch('date.prop', function() {
			$http.get('per_desa_dan_kecamatan/opsi/kabupaten/' + $scope.date.prop.id ).success(function(kab_data) {
				$scope.portal_kabupaten_data = kab_data;
			});
			$scope.date.kec = "";
			$scope.date.kel = "";
		});

		$scope.$watch('date.kab', function(){
			$http.get('per_desa_dan_kecamatan/opsi/kecamatan/' + $scope.date.kab.id).success(function(kec_data){
				$scope.portal_kecamatan_data = kec_data;
			});
			$scope.date.kel = "";		
		});

		$scope.$watch('date.kec', function(){
			$http.get('per_desa_dan_kecamatan/opsi/kelurahan/' + $scope.date.kec.id).success(function(kel_data){
				$scope.portal_kelurahan_data = kel_data;
			});
		});

		$scope.filter_date = function() {
			if($scope.date.prop == null || $scope.date.kab == null || $scope.date.kec == null || $scope.date.kel == null || $scope.date.start == null || $scope.date.finish == null){
				alert("Isi Terlebih Dahulu Kolom");
			}
			else{
				$http.get('per_desa_dan_kecamatan/data/' + $scope.date.prop + '/' + $scope.date.kab + '/' + $scope.date.kec + '/' + $scope.date.kel + '/' + $scope.date.start + '/' + $scope.date.finish).success(function(mpdk_data) {
				$scope.monitoring_per_desa_dan_kecamatan_data = mpdk_data;
			});			
			}
		}
	}
])

.controller('MonitoringPerNamaPerusahaanCtrl', ['$scope', '$http',
	function ($scope, $http){
		/* # Prepare Data ============================================================================================= */
	    $scope.date = [];

	    $scope.date.nm = null;
		$scope.show_all = function() {
			$http.get('per_nama_perusahaan/data').success(function(mpnu_data){
				$scope.monitoring_per_nama_perusahaan_data = mpnu_data;
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

		$scope.monitoring_per_nama_perusahaan_data;

		/* # Modal ==================================================================================================== */



		/* # Submit =================================================================================================== */

		$scope.filter_date = function() {
			if($scope.date.start == null || $scope.date.finish == null || $scope.date.nm == null){
				alert("Isi Terlebih Dahulu Kolom Nama Perusahaan,Tanggal Awal, dan Tangal Akhir")
			}
			else{
				$http.get('per_nama_perusahaan/data/' + $scope.date.nm + '/' + $scope.date.start + '/' + $scope.date.finish).success(function(mpnu_data) {
				$scope.monitoring_per_nama_perusahaan_data = mpnu_data;
			});			
			}
		}
	}
])

.controller('MonitoringPerBelumSudahJadiKadaluarsaCtrl', ['$scope', '$http',
	function ($http, $scope){
		$scope.show_all = function() {
			$http.get('perizinan_belum_sudah_jadi_kadaluarsa/data').success(function(mpbjk_data){
				$scope.monitoring_per_belum_jadi_kadaluarsa_data = mpbjk_data;
			});
		}


		$scope.show_all();
		$scope.date = [];
		$scope.date.dt = "null";

		/* # Filter Data ============================================================================================== */

		$scope.opsi_cari = "$";

		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function() {
			$scope.displayed += fetch_limit;
		}

		$scope.monitoring_per_belum_jadi_kadaluarsa_data;

		/* # Modal ==================================================================================================== 



		/* # Submit =================================================================================================== */

		$scope.filter_date = function() {

			if($scope.date.dt == "null" || $scope.date.start == null || $scope.date.finish == null) {
				alert("Status belum ditentukan. Pilih salah satu Status!");
			}

			else {
				$http.get('perizinan_belum_sudah_jadi_kadaluarsa/data/' + $scope.date.dt + '/' + $scope.date.start + '/' + $scope.date.finish).success(function(mpbjk_data) {
					$scope.monitoring_per_belum_jadi_kadaluarsa_data = mpbjk_data;
				});
			}

			
		}
	}
])