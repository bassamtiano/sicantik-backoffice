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
	$http.get('informasi_perizinan/data').success(function(csip_data){
		$scope.customer_service_informasi_perizinan_data = csip_data;
	});
}

function PelayananCustomerServiceInformasiTrackingCtrl($scope, $http){
	$http.get('informasi_tracking/data').success(function(csit_data){
		$scope.customer_service_informasi_tracking_data = csit_data;
	});
}

function PelayananCustomerServiceInformasiMasaBerlakuCtrl($scope, $http){
	$http.get('informasi_masa_berlaku/data').success(function(csimb_data){
		$scope.customer_service_informasi_masa_berlaku_data = csimb_data;
	});
}


