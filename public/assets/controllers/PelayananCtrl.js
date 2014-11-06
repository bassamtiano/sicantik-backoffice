angular.module('sicantik_backoffice', []);

function PelayananPendaftaranPermohonanSementaraCtrl($scope, $http) {
	$http.get('permohonan_sementara/data').success(function(ppps_data) {
		$scope.pelayanan_pendaftaran_permohonan_sementara_data = ppps_data;
	});
}

function PelayananPendaftaranPermohonanIzinBaruCtrl($scope, $http) {
	$http.get('pelayanan/pendaftaran/permohonan_izin_baru/table_permohonan_izin_baru').success(function(pppib_data) {
		$scope.pelayanan_pendaftaran_permohonan_izni_baru_data = pppib_data;
	});
}

function PelayananPendaftaranPerubahanIzinCtrl($scope, $http) {
	$http.get('perubahan_izin/data').success(function(pppi_data) {
		$scope.pelayanan_pendaftaran_perubahan_izin_data = pppi_data;
	});
}

function PelayananPendaftaranPerpanjanganIzinCtrl($scope, $http) {
	$http.get('perpanjangan_izin/data').success(function(pppi_data) {
		$scope.pelayanan_pendaftaran_perpanjangan_izin_data = pppi_data;
	});
}

function PelayananPendaftaranDaftarUlangIzinCtrl($scope, $http) {
	$http.get('daftar_ulang_izin/data').success(function(ppdui_data) {
		$scope.pelayanan_pendaftaran_daftar_ulang_izin_data = ppdui_data;
	});
}

function PelayananPendaftaranDataPemohonCtrl($scope, $http) {
	$http.get('pelayanan/pendaftaran/data_pemohon/table_data_pemohon').success(function(ppdp_data) {
		$scope.pelayanan_pendaftaran_data_pemohon_data = ppdp_data;
	});
}

function PelayananPendaftaranDataPerusahaanCtrl($scope, $http) {
	$http.get('pelayanan/pendaftaran/data_perusahaan/table_data_perusahaan').success(function(ppdp_data) {
		$scope.pelayanan_pendaftaran_data_perusahaan_data = ppdp_data;
	});
}


function PelayananCustomerServiceInformasiPerizinanCtrl($scope, $http){
	$scope.customer_service_informasi_perizinan_data = " ";
	$scope.show_all = function(){
		$http.get('informasi_perizinan/data').success(function(csip_data) {
			$scope.customer_service_informasi_perizinan_data = csip_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.customer_service_informasi_perizinan_data;
/* # Modal ==================================================================================================== */

		/* Define Modal Name */

		$scope.modal_cs_detail_perizinan = false;

		/* Define Open & Close Handler */

		$scope.open_modal = function(modal_name, id) {

			eval("$scope." + modal_name + "= true");
			eval("$scope." + modal_name + "_data(" + id + ")");
		}

		$scope.close_modal = function(modal_name) {
			eval("$scope." + modal_name + "= false");
		}

		/*  Construct Modal Function */

		$scope.modal_cs_detail_perizinan_data = function(id) {
			$http.get('informasi_perizinan/detail/data/' + id).success(function(ipdd) {
				$scope.informasi_perizinan_detail_data = ipdd;
			});
		}


		/* Define Tab Name */

		$scope.tab = [];

		$scope.tab.informasi_perizinan_tab_detail_syarat = true;

		$scope.show_tab = function(tab_name, button_id) {

		$scope.tab.informasi_perizinan_tab_detail_syarat = false;

			eval('$scope.' + tab_name + "= true");

			$('.tab-nav-item').removeClass('enable');
			$('#' + button_id).addClass('enable');

		}
}

function PelayananCustomerServiceInformasiTrackingCtrl($scope, $http){
	$scope.show_all = function(){
		$http.get('informasi_tracking/data').success(function(csit_data) {
			$scope.customer_service_informasi_tracking_data = csit_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;
/* # Modal ==================================================================================================== */

		/* Define Modal Name */

		$scope.modal_cs_detail_tracking = false;

		/* Define Open & Close Handler */

		$scope.open_modal = function(modal_name, id) {

			eval("$scope." + modal_name + "= true");
			eval("$scope." + modal_name + "_data(" + id + ")");
		}

		$scope.close_modal = function(modal_name) {
			eval("$scope." + modal_name + "= false");
		}

		/*  Construct Modal Function */

		$scope.modal_cs_detail_tracking_data = function(id) {
			$http.get('informasi_tracking/detail/data/' + id).success(function(itdd) {
				$scope.informasi_tracking_detail_data = itdd;
			});


		}


		/* Define Tab Name */

		$scope.tab = [];

		$scope.tab.informasi_tracking_tab_detail_status_permohonan = true;

		$scope.show_tab = function(tab_name, button_id) {

		$scope.tab.informasi_tracking_tab_detail_status_permohonan = false;

			eval('$scope.' + tab_name + "= true");

			$('.tab-nav-item').removeClass('enable');
			$('#' + button_id).addClass('enable');

		}
	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}
}

function PelayananCustomerServiceInformasiMasaBerlakuCtrl($scope, $http){
	$scope.show_all = function(){
		$http.get('informasi_masa_berlaku/data').success(function(csimb_data) {
			$scope.customer_service_informasi_masa_berlaku_data = csimb_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}
}


