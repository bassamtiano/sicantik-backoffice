angular.module('sicantik_backoffice', []);
////////////////////////////////////KONFIGURASI START//////////////////////////////
///////////////////////////////////////////////////////////////////////////////////

//////////////////////////////SETTING PERIZINAN/////////////////////
function PengaduanDaftarPengaduanSaranCtrl($scope, $http) {
	$http.get('daftar_pengaduan_saran/data').success(function(pdps_data) {
		$scope.pengaduan_daftar_pengaduan_saran_data = pdps_data;
	});
}

function PengaduanPersetujuanResponPengaduanCtrl($scope, $http) {
	$http.get('persetujuan_respon_pengaduan/data').success(function(pprp_data) {
		$scope.pengaduan_persetujuan_respon_pengaduan_data = pprp_data;
	});
}

function PengaduanPengirimanResponPengaduanCtrl($scope, $http) {
	$http.get('pengiriman_respon_pengaduan/data').success(function(pprp_data) {
		$scope.pengaduan_pengiriman_respon_pengaduan_data = pprp_data;
	});
}