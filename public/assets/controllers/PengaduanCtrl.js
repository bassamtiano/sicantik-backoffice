
var fetch_limit = 100;
////////////////////////////////////KONFIGURASI START//////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
$app = angular.module('sicantik_backoffice', [])

//////////////////////////////SETTING PERIZINAN/////////////////////
function PengaduanDaftarPengaduanSaranCtrl($scope, $http) {

	/* # Prepare Data ============================================================================================= */

	$scope.show_all = function(){
		$http.get('daftar_pengaduan_saran/data').success(function(pdps_data) {
			$scope.pengaduan_daftar_pengaduan_saran_data = pdps_data;
		});
	}

	$scope.opsi_pengaduan = function(){ 
		$http.get('daftar_pengaduan_saran/opsi').success(function(pdpsop_data) { 
			$scope.pengaduan_daftar_pengaduan_saran_opsi_pengaduan = pdpsop_data;
		});
	}

	$scope.opsi_sumber_pengaduan = function(){ 
		$http.get('daftar_pengaduan_saran/opsi_sumber_pengaduan').success(function(pdpsosp_data) { 
			$scope.pengaduan_daftar_pengaduan_saran_opsi_sumber_pengaduan = pdpsosp_data;
		});
	}

	$scope.opsi_pengaduan();
	$scope.opsi_sumber_pengaduan();
	$scope.show_all();

	/* # Filter Data ============================================================================================== */
	
	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;
	

	$scope.loadMore = function() {
		$scope.displayed += fetch_limit;
	}

	$scope.pengaduan_daftar_pengaduan_saran_data;

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
		$http.get('daftar_pengaduan_saran/edit/data/' + id).success(function(dpsed) {
			$scope.daftar_pengaduan_saran_edit_data = dpsed;
		});
	}

	/* Define Tab Name */

	$scope.tab = [];

	$scope.tab.tambah_data_tab_isi_biodata = true;
	$scope.tab.tambah_data_tab_pesan_pengaduan = false;
	$scope.tab.tambah_data_tab_info_pengaduan = false;

	$scope.show_tab = function(tab_name, button_id) {

		$scope.tab.tambah_data_tab_isi_biodata = false;
		$scope.tab.tambah_data_tab_pesan_pengaduan = false;
		$scope.tab.tambah_data_tab_info_pengaduan = false;

		eval('$scope.' + tab_name + "= true");

		$('.tab-nav-item').removeClass('enable');
		$('#' + button_id).addClass('enable');

	}

	$scope.filter_pengaduan = function(){
		$http.get('daftar_pengaduan_saran/data/' + $scope.pengaduan_id).success(function(pdps_data) {
			$scope.pengaduan_daftar_pengaduan_saran_data = pdps_data;
		});
	}

	$scope.modal_tambah_submit = function() {

	}

	$scope.modal_edit_submit = function() {

	}
	
}

function PengaduanPersetujuanResponPengaduanCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('persetujuan_respon_pengaduan/data').success(function(pprp_data) {
			$scope.pengaduan_persetujuan_respon_pengaduan_data = pprp_data;
		});
	}

	$scope.opsi_dinas = function(){ 
		$http.get('persetujuan_respon_pengaduan/opsi_dinas').success(function(pprpod_data) { 
			$scope.pengaduan_persetujuan_respon_pengaduan_opsi_dinas = pprpod_data;
		});
	}

	$scope.opsi_dinas();
	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;
	

	$scope.loadMore = function() {
		$scope.displayed += fetch_limit;
	}

	$scope.pengaduan_persetujuan_respon_pengaduan_data;

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
		$http.get('persetujuan_respon_pengaduan/edit/data/' + id).success(function(prped) {
			$scope.persetujuan_respon_pengaduan_edit_data = prped;
		});
	}

	/* Define Tab Name */

	$scope.tab = [];

	$scope.tab.edit_data_tab_data_pengirim = true;

	$scope.show_tab = function(tab_name, button_id) {

		$scope.tab.edit_data_tab_data_pengirim = false;

		eval('$scope.' + tab_name + "= true");

		$('.tab-nav-item').removeClass('enable');
		$('#' + button_id).addClass('enable');

	}

	$scope.filter_pengaduan = function(){
		$http.get('persetujuan_respon_pengaduan/data/' + $scope.pengaduan_id).success(function(pprps_data) {
			$scope.pengaduan_persetujuan_respon_pengaduan_saran_data = pprps_data;
		});
	}

}

function PengaduanPengirimanResponPengaduanCtrl($scope, $http) {
	
	$scope.show_all = function(){
		$http.get('pengiriman_respon_pengaduan/data').success(function(pprp_data) {
			$scope.pengaduan_pengiriman_respon_pengaduan_data = pprp_data;
		});
	}

	// $scope.opsi_pengaduan = function(){ 
	// 	$http.get('pengiriman_respon_pengaduan/opsi').success(function(pprpop_data) { 
	// 		$scope.pengaduan_pengiriman_respon_pengaduan_opsi_pengaduan = pprpop_data;
	// 	});
	// }

	// $scope.opsi_pengaduan();
	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;
	

	$scope.loadMore = function() {
		$scope.displayed += fetch_limit;
	}

	$scope.pengaduan_pengiriman_respon_pengaduan_data;

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
		$http.get('pengiriman_respon_pengaduan/edit/data/' + id).success(function(prped) {
			$scope.pengiriman_respon_pengaduan_edit_data = prped;
		});
	}

	/* Define Tab Name */

	$scope.tab = [];

	$scope.tab.edit_data_tab_pesan_pengaduan = true;
	$scope.tab.edit_data_tab_detail_tindak_lanjut = false;
	$scope.tab.edit_data_tab_respon_pengaduan = false;

	$scope.show_tab = function(tab_name, button_id) {

		$scope.tab.edit_data_tab_pesan_pengaduan = false;
		$scope.tab.edit_data_tab_detail_tindak_lanjut = false;
		$scope.tab.edit_data_tab_respon_pengaduan = false;

		eval('$scope.' + tab_name + "= true");

		$('.tab-nav-item').removeClass('enable');
		$('#' + button_id).addClass('enable');

	}

	$scope.filter_pengaduan = function(){
		$http.get('pengiriman_respon_pengaduan/data/' + $scope.pengaduan_id).success(function(pdps_data) {
			$scope.pengaduan_pengiriman_respon_pengaduan_saran_data = pdps_data;
		});
	}
}

function PengaduanDaftarBalasanCtrl($scope, $http) {
	
	$scope.show_all = function(){
		$http.get('daftar_balasan/data').success(function(pdb_data) {
			$scope.pengaduan_daftar_balasan_data = pdb_data;
		});
	}

	// $scope.opsi_pengaduan = function(){ 
	// 	$http.get('daftar_balasan/opsi').success(function(pdbo_data) { 
	// 		$scope.pengaduan_daftar_balasan_opsi = pdbo_data;
	// 	});
	// }

	// $scope.opsi_pengaduan();
	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = 100;
	

	$scope.loadMore = function() {
		$scope.displayed += 100;
	}

	$scope.pengaduan_daftar_balasan_data;

	$scope.filter_date = function(){
		$http.get('daftar_balasan/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(pdb_data) {
			$scope.pengaduan_daftar_balasan_data = pdb_data;
		});
	}
}