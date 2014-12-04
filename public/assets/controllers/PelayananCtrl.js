$app = angular.module('sicantik_backoffice', []);

var fetch_limit = 15;
////////////////////////////////////KONFIGURASI START//////////////////////////////

////////////////////////////////////KONFIGURASI START/////////////////////////////

//////////////////////////////SETTING PERIZINAN/////////////////////
function PelayananPendaftaranPermohonanSementaraCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('permohonan_sementara/data').success(function(ppps_data) {
			$scope.pelayanan_pendaftaran_permohonan_sementara_data = ppps_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.pelayanan_pendaftaran_permohonan_sementara_data;

	/* # Modal ==================================================================================================== */

	/* Define Modal Name */

	$scope.modal_edit = false;
	$scope.modal_data_awal = false;

	/* Define Open & Close Handler */

	$scope.open_modal = function(modal_name, id) {

		eval("$scope." + modal_name + "= true");
		eval("$scope." + modal_name + "_data(" + id + ")");
	}

	$scope.close_modal = function(modal_name) {
		eval("$scope." + modal_name + "= false");
	}

	/*  Construct Modal Function */

	$scope.modal_edit_data = function(id) {
		$http.get('permohonan_sementara/edit/data/' + id).success(function(psed) {
			$scope.permohonan_sementara_edit_data = psed;
		});
	}


	/* Define Tab Name */

	$scope.tab = [];

	$scope.tab.data_awal_tab_data_pemohon = true;
	$scope.tab.data_awal_tab_data_perusahaan = false;
	$scope.tab.data_awal_tab_persyaratan = false;

	$scope.show_tab = function(tab_name, button_id) {

		$scope.tab.data_awal_tab_data_pemohon = false;
		$scope.tab.data_awal_tab_data_perusahaan = false;
		$scope.tab.data_awal_tab_persyaratan = false;

		eval('$scope.' + tab_name + "= true");

		$('.tab-nav-item').removeClass('enable');
		$('#' + button_id).addClass('enable');

	}

	/* # Submit =================================================================================================== */

	$scope.filter_pelayanan = function(){
		$http.get('permohonan_sementara/data/' + $scope.pelayanan_id).success(function(ppps_data) {
			$scope.pelayanan_pendaftaran_permohonan_sementara_data = ppps_data;
		});
	}

	$scope.modal_edit_submit = function() {

	}

}

function PelayananPendaftaranPermohonanIzinBaruCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('permohonan_izin_baru/data').success(function(pppib_data) {
			$scope.pelayanan_pendaftaran_permohonan_izin_baru_data = pppib_data;
		});
	}

	$scope.opsi_perizinan = function(){
		$http.get('permohonan_izin_baru/opsi_perizinan').success(function(pibop_data) {
			$scope.permohonan_izin_baru_opsi_perizinan = pibop_data;
		});
	}

	$scope.opsi_perizinan();

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
		$scope.pelayanan_pendaftaran_permohonan_izin_baru_data.length - 5;
	}

	$scope.pelayanan_pendaftaran_permohonan_izin_baru_data;

	$scope.select_iseng = 'KTP';

		$scope.items = [
		   {source: 'KTP', Title: 'KTP', selected: true},
		   {source: 'SIM', Title: 'SIM', selected: false},
		   {source: 'PASSPORT', Title: 'PASSPORT', selected:false},
		];

	/* # Modal ==================================================================================================== */

	/* Define Modal Name */

	$scope.modal_edit = false;
	$scope.modal_tambah = false;
	$scope.modal_setujui = false;

	/* Define Open & Close Handler */

	$scope.open_modal = function(modal_name, id) {

		eval("$scope." + modal_name + "= true");
		eval("$scope." + modal_name + "_data(" + id + ")");
	}

	$scope.close_modal = function(modal_name) {
		eval("$scope." + modal_name + "= false");
	}

	/*  Construct Modal Function */

		$scope.modal_tambah_data = function() {
			
			$http.get('permohonan_izin_baru/tambah/data/' + $scope.perizinan_id).success(function(pibtd) {
				$scope.permohonan_izin_baru_tambah_data = pibtd;
			});
		}

		$scope.modal_setujui_data = function(id) {

			$http.get('permohonan_izin_baru/setujui/data/' + id).success(function(pibsd) {
				$scope.permohonan_izin_baru_setujui_data = pibsd;
			});
		}

		$scope.modal_edit_data = function(id) {

			$scope.loading_dialog = true;

			$http.get('permohonan_izin_baru/edit/data/' + id).success(function(pibed) {
				$scope.permohonan_izin_baru_edit_data = pibed;

				$scope.opsi_pemohon_propinsi($scope.permohonan_izin_baru_edit_data.propinsi_pemohon);
				$scope.opsi_pemohon_kabupaten($scope.permohonan_izin_baru_edit_data.propinsi_pemohon, $scope.permohonan_izin_baru_edit_data.kabupaten_pemohon);
				$scope.opsi_pemohon_kecamatan($scope.permohonan_izin_baru_edit_data.kabupaten_pemohon, $scope.permohonan_izin_baru_edit_data.kecamatan_pemohon);
				$scope.opsi_pemohon_kelurahan($scope.permohonan_izin_baru_edit_data.kecamatan_pemohon, $scope.permohonan_izin_baru_edit_data.kelurahan_pemohon);

				$scope.opsi_perusahaan_propinsi($scope.permohonan_izin_baru_edit_data.propinsi_perusahaan);
				$scope.opsi_perusahaan_kabupaten($scope.permohonan_izin_baru_edit_data.propinsi_perusahaan, $scope.permohonan_izin_baru_edit_data.kabupaten_perusahaan);
				$scope.opsi_perusahaan_kecamatan($scope.permohonan_izin_baru_edit_data.kabupaten_perusahaan, $scope.permohonan_izin_baru_edit_data.kecamatan_perusahaan);
				$scope.opsi_perusahaan_kelurahan($scope.permohonan_izin_baru_edit_data.kecamatan_perusahaan, $scope.permohonan_izin_baru_edit_data.kelurahan_perusahaan);

			}).success(function() {
				$scope.loading_dialog = false;
			});

		}

	/* Prepare Opsi */

		$scope.opsi_pemohon_kelurahan = function(id_kecamatan, id) {
			$http.get('permohonan_izin_baru/edit/opsi/pemohon_kelurahan/' + id_kecamatan + '/' + id).success(function(kel_pemohon) {
				$scope.opsi_kel_pemohon = kel_pemohon;
			});
		}

		$scope.opsi_pemohon_kecamatan = function(id_kabupaten, id) {
			$http.get('permohonan_izin_baru/edit/opsi/pemohon_kecamatan/' + id_kabupaten + '/' + id).success(function(kec_pemohon) {
				$scope.opsi_kec_pemohon = kec_pemohon;
			});
		}

		$scope.opsi_pemohon_kabupaten = function(id_propinsi, id) {
			$http.get('permohonan_izin_baru/edit/opsi/pemohon_kabupaten/' + id_propinsi + '/' + id).success(function(kab_pemohon) {
				$scope.opsi_kab_pemohon = kab_pemohon;
			});
		}

		$scope.opsi_pemohon_propinsi = function(id) {
			$http.get('permohonan_izin_baru/edit/opsi/pemohon_propinsi/' + id).success(function(prop_pemohon) {
				$scope.opsi_prop_pemohon = prop_pemohon;
			});
		}

		$scope.opsi_perusahaan_kelurahan = function(id_kecamatan, id) {
			$http.get('permohonan_izin_baru/edit/opsi/perusahaan_kelurahan/' + id_kecamatan + '/' + id).success(function(kel_perusahaan) {
				$scope.opsi_kel_perusahaan = kel_perusahaan;
			});
		}

		$scope.opsi_perusahaan_kecamatan = function(id_kabupaten, id) {
			$http.get('permohonan_izin_baru/edit/opsi/perusahaan_kecamatan/' + id_kabupaten + '/' + id).success(function(kec_perusahaan) {
				$scope.opsi_kec_perusahaan = kec_perusahaan;
			});
		}

		$scope.opsi_perusahaan_kabupaten = function(id_propinsi, id) {
			$http.get('permohonan_izin_baru/edit/opsi/perusahaan_kabupaten/' + id_propinsi + '/' + id).success(function(kab_perusahaan) {
				$scope.opsi_kab_perusahaan = kab_perusahaan;
			});
		}

		$scope.opsi_perusahaan_propinsi = function(id) {
			$http.get('permohonan_izin_baru/edit/opsi/perusahaan_propinsi/' + id).success(function(prop_perusahaan) {
				$scope.opsi_prop_perusahaan = prop_perusahaan;
			});
		}

		$scope.get_pemohon_propinsi = function() {
			$http.get('permohonan_izin_baru/edit/opsi/pemohon_propinsi').success(function(prop_pemohon_data) {
				$scope.pemohon_propinsi_data = prop_pemohon_data;
			});
		}

		$scope.get_pemohon_propinsi();

		$scope.$watch('pemohon_propinsi_id', function() { //alert($scope.pemohon_propinsi_id.id);
			$http.get('permohonan_izin_baru/edit/opsi/pemohon_kabupaten/' + $scope.pemohon_propinsi_id.id ).success(function(kab_pemohon_data) {
				$scope.pemohon_kabupaten_data = kab_pemohon_data;
			});

			$scope.pemohon_kecamatan_data = "";
			$scope.pemohon_kelurahan_data = "";
		});

		$scope.$watch('pemohon_kabupaten_id', function(){
			$http.get('permohonan_izin_baru/edit/opsi/pemohon_kecamatan/' + $scope.pemohon_kabupaten_id.id).success(function(kec_pemohon_data){
				$scope.pemohon_kecamatan_data = kec_pemohon_data;
			});
			
			$scope.pemohon_kelurahan_data = "";		
		});

		$scope.$watch('pemohon_kecamatan_id', function(){
			$http.get('permohonan_izin_baru/edit/opsi/pemohon_kelurahan/' + $scope.pemohon_kecamatan_id.id).success(function(kel_pemohon_data){
				$scope.pemohon_kelurahan_data = kel_pemohon_data;
			});
				
		});

		$scope.get_perusahaan_propinsi = function() {
			$http.get('permohonan_izin_baru/edit/opsi/perusahaan_propinsi').success(function(prop_perusahaan_data) {
				$scope.perusahaan_propinsi_data = prop_perusahaan_data;
			});
		}

		$scope.get_perusahaan_propinsi();

		$scope.$watch('perusahaan_propinsi_id', function() { 
			$http.get('permohonan_izin_baru/edit/opsi/perusahaan_kabupaten/' + $scope.perusahaan_propinsi_id.id ).success(function(kab_perusahaan_data) {
				$scope.perusahaan_kabupaten_data = kab_perusahaan_data;
			});

			$scope.perusahaan_kecamatan_data = "";
			$scope.perusahaan_kelurahan_data = "";
		});

		$scope.$watch('perusahaan_kabupaten_id', function(){
			$http.get('permohonan_izin_baru/edit/opsi/perusahaan_kecamatan/' + $scope.perusahaan_kabupaten_id.id).success(function(kec_perusahaan_data){
				$scope.perusahaan_kecamatan_data = kec_perusahaan_data;
			});
			
			$scope.perusahaan_kelurahan_data = "";		
		});

		$scope.$watch('perusahaan_kecamatan_id', function(){
			$http.get('permohonan_izin_baru/edit/opsi/perusahaan_kelurahan/' + $scope.perusahaan_kecamatan_id.id).success(function(kel_perusahaan_data){
				$scope.perusahaan_kelurahan_data = kel_perusahaan_data;
			});
				
		});

		$scope.get_perizinan = function() {
			$http.get('permohonan_izin_baru/opsi_perizinan').success(function(perizinan_data) {
				$scope.opsi_perizinan_data = perizinan_data;
			});
		}

		

	

	// $scope.modal_edit_data = function(id) {
	// 	$http.get('permohonan_izin_baru/edit/data/' + id).success(function(pibed) {
	// 		$scope.permohonan_izin_baru_edit_data = pibed;
	// 	});
	// }


	/* Define Tab Name */

	$scope.tab = [];

	$scope.tab.izin_baru_tab_data_pemohon = true;
	$scope.tab.izin_baru_tab_data_perusahaan = false;
	$scope.tab.izin_baru_tab_persyaratan = false;

	$scope.show_tab = function(tab_name, button_id) {

		$scope.tab.izin_baru_tab_data_pemohon = false;
		$scope.tab.izin_baru_tab_data_perusahaan = false;
		$scope.tab.izin_baru_tab_persyaratan = false;

		eval('$scope.' + tab_name + "= true");

		$('.tab-nav-item').removeClass('enable');
		$('#' + button_id).addClass('enable');

	}

	$scope.filter_pelayanan = function(){
		$http.get('permohonan_izin_baru/data/' + $scope.pelayanan_id).success(function(pppib_data) {
			$scope.pelayanan_pendaftaran_permohonan_izin_baru_data = pppib_data;
		});
	}

	$scope.modal_tambah_submit = function() {

			setTimeout(function() {
				result = $('#target_tambah').contents().find('body').html(); // Nama Iframe
				if(result == '') {
					$scope.modal_tambah_submit();
				}
				else if(result === undefined) {
					$scope.modal_tambah_submit();
				}
				else {
					clear_iframe();
					$scope.modal_tambah = false;
				}

			}, 1);
			$scope.show_all();

		}

	$scope.modal_edit_submit = function() {


			setTimeout(function() {
				result = $('#target_edit').contents().find('body').html(); // Nama Iframe
				if(result == '') {
					$scope.modal_edit_submit();
				}
				else if(result === undefined) {
					$scope.modal_edit_submit();
				}
				else {
					clear_iframe();
					$scope.modal_edit = false;
				}

			}, 1);

			$scope.show_all();
		}

	$scope.modal_setujui_submit = function() {

			setTimeout(function() {
				result = $('#target_setujui').contents().find('body').html(); // Nama Iframe
				if(result == '') {
					$scope.modal_setujui_submit();
				}
				else if(result === undefined) {
					$scope.modal_setujui_submit();
				}
				else {
					clear_iframe();
					$scope.modal_setujui = false;
				}

			}, 1);
			$scope.show_all();

		}


}

function PelayananPendaftaranPermohonanPerubahanIzinCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('perubahan_izin/data').success(function(pppi_data) {
			$scope.pelayanan_pendaftaran_permohonan_perubahan_izin_data = pppi_data;
		});
	}

	$scope.opsi_kegiatan = function(){
		$http.get('perubahan_izin/opsi_kegiatan').success(function(piok_data) {
			$scope.perubahan_izin_opsi_kegiatan = piok_data;
		});
	}

	$scope.opsi_investasi = function(){
		$http.get('perubahan_izin/opsi_investasi').success(function(pioi_data) {
			$scope.perubahan_izin_opsi_investasi = pioi_data;
		});
	}

	$scope.opsi_investasi();
	$scope.opsi_kegiatan();

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function() {
		$scope.displayed += fetch_limit;
	}

	$scope.pelayanan_pendaftaran_permohonan_perubahan_izin_data;

	/* # Modal ==================================================================================================== */

	/* Define Modal Name */

	$scope.modal_edit = false;
	$scope.modal_data_awal = false;

	/* Define Open & Close Handler */

	$scope.open_modal = function(modal_name, id) {

		eval("$scope." + modal_name + "= true");
		eval("$scope." + modal_name + "_data(" + id + ")");
	}

	$scope.close_modal = function(modal_name) {
		eval("$scope." + modal_name + "= false");
	}

	/*  Construct Modal Function */

	$scope.modal_edit_data = function(id) {
		$http.get('perubahan_izin/edit/data/' + id).success(function(pied) {
			$scope.perubahan_izin_edit_data = pied;
		});
	}


	/* Define Tab Name */

	$scope.tab = [];

	$scope.tab.data_awal_tab_data_pemohon = true;
	$scope.tab.data_awal_tab_data_perusahaan = false;
	$scope.tab.data_awal_tab_persyaratan = false;

	$scope.show_tab = function(tab_name, button_id) {

		$scope.tab.data_awal_tab_data_pemohon = false;
		$scope.tab.data_awal_tab_data_perusahaan = false;
		$scope.tab.data_awal_tab_persyaratan = false;

		eval('$scope.' + tab_name + "= true");

		$('.tab-nav-item').removeClass('enable');
		$('#' + button_id).addClass('enable');

	}

	$scope.filter_pelayanan = function(){
		$http.get('perubahan_izin/data/' + $scope.pelayanan_id).success(function(pppi_data) {
			$scope.pelayanan_pendaftaran_permohonan_perubahan_izin_data = pppi_data;
		});
	}

}

function PelayananPendaftaranPermohonanPerpanjanganIzinCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('perpanjangan_izin/data').success(function(pppi_data) {
			$scope.pelayanan_pendaftaran_permohonan_perpanjangan_izin_data = pppi_data;
		});
	}

	$scope.opsi_kegiatan = function(){
		$http.get('perpanjangan_izin/opsi_kegiatan').success(function(piok_data) {
			$scope.perpanjangan_izin_opsi_kegiatan = piok_data;
		});
	}

	$scope.opsi_investasi = function(){
		$http.get('perpanjangan_izin/opsi_investasi').success(function(pioi_data) {
			$scope.perpanjangan_izin_opsi_investasi = pioi_data;
		});
	}

	$scope.opsi_kegiatan();
	$scope.opsi_investasi();
	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.pelayanan_pendaftaran_permohonan_perpanjangan_izin_data;

	/* # Modal ==================================================================================================== */

	/* Define Modal Name */

	$scope.modal_edit = false;
	$scope.modal_data_awal = false;

	/* Define Open & Close Handler */

	$scope.open_modal = function(modal_name, id) {

		eval("$scope." + modal_name + "= true");
		eval("$scope." + modal_name + "_data(" + id + ")");
	}

	$scope.close_modal = function(modal_name) {
		eval("$scope." + modal_name + "= false");
	}

	/*  Construct Modal Function */

	$scope.modal_edit_data = function(id) {
		$http.get('perpanjangan_izin/edit/data/' + id).success(function(pied) {
			$scope.perpanjangan_izin_edit_data = pied;
		});
	}


	/* Define Tab Name */

	$scope.tab = [];

	$scope.tab.data_awal_tab_data_pemohon = true;
	$scope.tab.data_awal_tab_data_perusahaan = false;
	$scope.tab.data_awal_tab_persyaratan = false;

	$scope.show_tab = function(tab_name, button_id) {

		$scope.tab.data_awal_tab_data_pemohon = false;
		$scope.tab.data_awal_tab_data_perusahaan = false;
		$scope.tab.data_awal_tab_persyaratan = false;

		eval('$scope.' + tab_name + "= true");

		$('.tab-nav-item').removeClass('enable');
		$('#' + button_id).addClass('enable');

	}

	/* # Submit =================================================================================================== */

	$scope.filter_pelayanan = function(){
		$http.get('perpanjangan_izin/data/' + $scope.pelayanan_id).success(function(pppi_data) {
			$scope.pelayanan_pendaftaran_permohonan_perpanjangan_izin_data = pppi_data;
		});
	}


}

function PelayananPendaftaranPermohonanDaftarUlangIzinCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('daftar_ulang_izin/data').success(function(ppdui_data){
			$scope.pelayanan_pendaftaran_permohonan_daftar_ulang_izin_data = ppdui_data;
		});
	}

	$scope.opsi_kegiatan = function(){
		$http.get('daftar_ulang_izin/opsi_kegiatan').success(function(duiok_data) {
			$scope.daftar_ulang_izin_opsi_kegiatan = duiok_data;
		});
	}

	$scope.opsi_investasi = function(){
		$http.get('daftar_ulang_izin/opsi_investasi').success(function(duioi_data) {
			$scope.daftar_ulang_izin_opsi_investasi = duioi_data;
		});
	}

	$scope.opsi_investasi();
	$scope.opsi_kegiatan();

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.pelayanan_pendaftaran_permohonan_daftar_ulang_izin_data;

	/* # Modal ==================================================================================================== */

	/* Define Modal Name */

	$scope.modal_edit = false;
	$scope.modal_data_awal = false;

	/* Define Open & Close Handler */

	$scope.open_modal = function(modal_name, id) {

		eval("$scope." + modal_name + "= true");
		eval("$scope." + modal_name + "_data(" + id + ")");
	}

	$scope.close_modal = function(modal_name) {
		eval("$scope." + modal_name + "= false");
	}

	/*  Construct Modal Function */

	$scope.modal_edit_data = function(id) {
		$http.get('daftar_ulang_izin/edit/data/' + id).success(function(duied) {
			$scope.daftar_ulang_izin_edit_data = duied;
		});
	}


	/* Define Tab Name */

	$scope.tab = [];

	$scope.tab.data_awal_tab_data_pemohon = true;
	$scope.tab.data_awal_tab_data_perusahaan = false;
	$scope.tab.data_awal_tab_persyaratan = false;

	$scope.show_tab = function(tab_name, button_id) {

		$scope.tab.data_awal_tab_data_pemohon = false;
		$scope.tab.data_awal_tab_data_perusahaan = false;
		$scope.tab.data_awal_tab_persyaratan = false;

		eval('$scope.' + tab_name + "= true");

		$('.tab-nav-item').removeClass('enable');
		$('#' + button_id).addClass('enable');

	}

	/* # Submit =================================================================================================== */

	$scope.filter_pelayanan = function(){
		$http.get('daftar_ulang_izin/data/' + $scope.pelayanan_id).success(function(ppdui_data) {
			$scope.pelayanan_pendaftaran_permohonan_daftar_ulang_izin_data = ppdui_data;
		});
	}


}


function PelayananPendaftaranDataPemohonCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('data_pemohon/data').success(function(ppdp_data) {
			$scope.pelayanan_pendaftaran_data_pemohon_data = ppdp_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.pelayanan_pendaftaran_data_pemohon_data;

	$scope.select_iseng = 'KTP';

		$scope.items = [
		   {source: 'KTP', Title: 'KTP', selected: true},
		   {source: 'SIM', Title: 'SIM', selected: false},
		   {source: 'PASSPORT', Title: 'PASSPORT', selected:false},
		];

	/* # Modal ==================================================================================================== */

	/* Define Modal Name */

	$scope.modal_edit = false;
	$scope.modal_tambah_pemohon = false;

	/* Define Open & Close Handler */

	$scope.open_modal = function(modal_name, id) {
		if(id == null) {
			eval("$scope." + modal_name + "= true");

		}
		else {
			eval("$scope." + modal_name + "= true");
			eval("$scope." + modal_name + "_data(" + id + ")");
		}
	}

	$scope.close_modal = function(modal_name) {
		eval("$scope." + modal_name + "= false");
	}

	/*  Construct Modal Function */

		$scope.modal_edit_data = function(id) {

			$scope.loading_dialog = true;

			$http.get('data_pemohon/edit/data/' + id).success(function(pibed) {
			$scope.data_pemohon_edit_data = pibed;

				$scope.opsi_pemohon_propinsi($scope.data_pemohon_edit_data.propinsi_pemohon);
				$scope.opsi_pemohon_kabupaten($scope.data_pemohon_edit_data.propinsi_pemohon, $scope.data_pemohon_edit_data.kabupaten_pemohon);
				$scope.opsi_pemohon_kecamatan($scope.data_pemohon_edit_data.kabupaten_pemohon, $scope.data_pemohon_edit_data.kecamatan_pemohon);
				$scope.opsi_pemohon_kelurahan($scope.data_pemohon_edit_data.kecamatan_pemohon, $scope.data_pemohon_edit_data.kelurahan_pemohon);

				// $scope.opsi_perusahaan_propinsi($scope.permohonan_izin_baru_edit_data.propinsi_perusahaan);
				// $scope.opsi_perusahaan_kabupaten($scope.permohonan_izin_baru_edit_data.propinsi_perusahaan, $scope.permohonan_izin_baru_edit_data.kabupaten_perusahaan);
				// $scope.opsi_perusahaan_kecamatan($scope.permohonan_izin_baru_edit_data.kabupaten_perusahaan, $scope.permohonan_izin_baru_edit_data.kecamatan_perusahaan);
				// $scope.opsi_perusahaan_kelurahan($scope.permohonan_izin_baru_edit_data.kecamatan_perusahaan, $scope.permohonan_izin_baru_edit_data.kelurahan_perusahaan);

			}).success(function() {
				$scope.loading_dialog = false;
			});

		}

	/* Prepare Opsi */

		$scope.opsi_pemohon_propinsi = function(id) {
			$http.get('data_pemohon/opsi/propinsi/' + id).success(function(prop_pemohon) {
				$scope.opsi_prop_pemohon = prop_pemohon;
			});
		}

		$scope.opsi_pemohon_kabupaten = function(id_propinsi, id) {
			$http.get('data_pemohon/opsi/kabupaten/' + id_propinsi + '/' + id).success(function(kab_pemohon) {
				$scope.opsi_kab_pemohon = kab_pemohon;
			});
		}

		$scope.opsi_pemohon_kecamatan = function(id_kabupaten, id) {
			$http.get('data_pemohon/opsi/kecamatan/' + id_kabupaten + '/' + id).success(function(kec_pemohon) {
				$scope.opsi_kec_pemohon = kec_pemohon;
			});
		}

		$scope.opsi_pemohon_kelurahan = function(id_kecamatan, id) {
			$http.get('data_pemohon/opsi/kelurahan/' + id_kecamatan + '/' + id).success(function(kel_pemohon) {
				$scope.opsi_kel_pemohon = kel_pemohon;
			});
		}


		$scope.get_pemohon_propinsi = function() {
			$http.get('data_pemohon/opsi/propinsi').success(function(prop_pemohon_data) {
				$scope.pemohon_propinsi_data = prop_pemohon_data;
			});
		}

		$scope.get_pemohon_propinsi();

		$scope.$watch('pemohon_propinsi_id', function() { 
			$http.get('data_pemohon/opsi/kabupaten/' + $scope.pemohon_propinsi_id.id ).success(function(kab_pemohon_data) {
				$scope.pemohon_kabupaten_data = kab_pemohon_data;
			});

			$scope.pemohon_kecamatan_data = "";
			$scope.pemohon_kelurahan_data = "";
		});

		$scope.$watch('pemohon_kabupaten_id', function(){
			$http.get('data_pemohon/opsi/kecamatan/' + $scope.pemohon_kabupaten_id.id).success(function(kec_pemohon_data){
				$scope.pemohon_kecamatan_data = kec_pemohon_data;
			});
			
			$scope.pemohon_kelurahan_data = "";		
		});

		$scope.$watch('pemohon_kecamatan_id', function(){
			$http.get('data_pemohon/opsi/kelurahan/' + $scope.pemohon_kecamatan_id.id).success(function(kel_pemohon_data){
				$scope.pemohon_kelurahan_data = kel_pemohon_data;
			});
				
		});

	/*  Construct Modal Function */

	$scope.modal_tambah_submit = function() {

			setTimeout(function() {
				result = $('#target_tambah').contents().find('body').html(); // Nama Iframe
				if(result == '') {
					$scope.modal_tambah_submit();
				}
				else if(result === undefined) {
					$scope.modal_tambah_submit();
				}
				else {
					clear_iframe();
					$scope.modal_tambah = false;
				}

			}, 1);
			$scope.show_all();

		}

	$scope.modal_edit_submit = function() {

			setTimeout(function() {
				result = $('#target_edit').contents().find('body').html(); // Nama Iframe
				if(result == '') {
					$scope.modal_edit_submit();
				}
				else if(result === undefined) {
					$scope.modal_edit_submit();
				}
				else {
					clear_iframe();
					$scope.modal_edit = false;
				}

			}, 1);
			$scope.show_all();

		}

	/* Define Tab Name */

	$scope.tab = [];

	$scope.tab.data_awal_tab_data_pemohon = true;

	$scope.show_tab = function(tab_name, button_id) {

		$scope.tab.data_awal_tab_data_pemohon = false;

		eval('$scope.' + tab_name + "= true");

		$('.tab-nav-item').removeClass('enable');
		$('#' + button_id).addClass('enable');

	}

	/* # Submit =================================================================================================== */

	$scope.filter_pelayanan = function(){
		$http.get('data_pemohon/data/' + $scope.pelayanan_id).success(function(ppdp_data) {
			$scope.pelayanan_pendaftaran_data_pemohon_data = ppdp_data;
		});
	}
}


function PelayananPendaftaranDataPerusahaanCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('data_perusahaan/data').success(function(ppdp_data) {
			$scope.pelayanan_pendaftaran_data_perusahaan_data = ppdp_data;
		});
	}

	$scope.opsi_kegiatan = function(){
		$http.get('data_perusahaan/opsi_kegiatan').success(function(dpok_data) {
			$scope.data_perusahaan_opsi_kegiatan = dpok_data;
		});
	}

	$scope.opsi_investasi = function(){
		$http.get('data_perusahaan/opsi_investasi').success(function(dpoi_data) {
			$scope.data_perusahaan_opsi_investasi = dpoi_data;
		});
	}

	$scope.opsi_investasi();
	$scope.opsi_kegiatan();
	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.pelayanan_pendaftaran_data_perusahaan_data;

	/* # Modal ==================================================================================================== */

	/* Define Modal Name */

	$scope.modal_edit = false;
	$scope.modal_tambah = false;

	/* Define Open & Close Handler */

	$scope.open_modal = function(modal_name, id) {

		eval("$scope." + modal_name + "= true");
		eval("$scope." + modal_name + "_data(" + id + ")");
	}

	$scope.close_modal = function(modal_name) {
		eval("$scope." + modal_name + "= false");
	}

	/*  Construct Modal Function */

	$scope.modal_edit_data = function(id) {
		$http.get('data_perusahaan/edit/data/' + id).success(function(dped) {
			$scope.data_perusahaan_edit_data = dped;
		});
	}


	/* Define Tab Name */

	$scope.tab = [];

	$scope.tab.data_awal_tab_data_perusahaan = true;

	$scope.show_tab = function(tab_name, button_id) {

		$scope.tab.data_awal_tab_data_perusahaan = false;

		eval('$scope.' + tab_name + "= true");

		$('.tab-nav-item').removeClass('enable');
		$('#' + button_id).addClass('enable');

	}

	/* # Submit =================================================================================================== */

	$scope.filter_pelayanan = function(){
		$http.get('data_perusahaan/data/' + $scope.pelayanan_id).success(function(ppdp_data) {
			$scope.pelayanan_pendaftaran_data_perusahaan_data = ppdp_data;
		});
	}

}


function PelayananPendaftaranDataPerusahaanCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('data_perusahaan/data').success(function(ppdp_data) {
			$scope.pelayanan_pendaftaran_data_perusahaan_data = ppdp_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.pelayanan_pendaftaran_data_perusahaan_data;

	$scope.filter_pelayanan = function(){
		$http.get('data_perusahaan/data/' + $scope.pelayanan_id).success(function(ppdp_data) {
			$scope.pelayanan_pendaftaran_data_perusahaan_data = ppdp_data;
		});
	}

}

function PelayananCustomerServiceInformasiPerizinanCtrl($scope, $http){
	$scope.show_all = function(){
		$http.get('informasi_perizinan/data').success(function(csip_data) {
			$scope.customer_service_informasi_perizinan_data = csip_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

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

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
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
