$app = angular.module('sicantik_backoffice', []);
<<<<<<< HEAD


var fetch_limit = 15;
////////////////////////////////////KONFIGURASI START//////////////////////////////
=======
fetch_limit = 100;


>>>>>>> origin/master
//////////////////////////////SETTING PERIZINAN/////////////////////
function PelayananPendaftaranPermohonanSementaraCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('permohonan_sementara/data').success(function(ppps_data) {
			$scope.pelayanan_pendaftaran_permohonan_sementara_data = ppps_data;
		});
	}
<<<<<<< HEAD
=======

>>>>>>> origin/master
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
<<<<<<< HEAD
=======

>>>>>>> origin/master
}

function PelayananPendaftaranPermohonanIzinBaruCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('permohonan_izin_baru/data').success(function(pppib_data) {
			$scope.pelayanan_pendaftaran_permohonan_izin_baru_data = pppib_data;
		});
	}

	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.pelayanan_pendaftaran_permohonan_izin_baru_data;

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
		$http.get('permohonan_izin_baru/edit/data/' + id).success(function(pibed) {
			$scope.permohonan_izin_baru_edit_data = pibed;
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
		$http.get('permohonan_izin_baru/data/' + $scope.pelayanan_id).success(function(pppib_data) {
			$scope.pelayanan_pendaftaran_permohonan_izin_baru_data = pppib_data;
		});
	}

	$scope.modal_edit_submit = function() {

	}
<<<<<<< HEAD
=======

>>>>>>> origin/master
}

function PelayananPendaftaranPermohonanPerubahanIzinCtrl($scope, $http) {

	$scope.show_all = function(){
		$http.get('perubahan_izin/data').success(function(pppi_data) {
			$scope.pelayanan_pendaftaran_permohonan_perubahan_izin_data = pppi_data;
		});
	}

<<<<<<< HEAD
=======

>>>>>>> origin/master
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
<<<<<<< HEAD
=======

>>>>>>> origin/master
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

<<<<<<< HEAD
=======

>>>>>>> origin/master
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

<<<<<<< HEAD
=======

>>>>>>> origin/master
	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.pelayanan_pendaftaran_permohonan_daftar_ulang_izin_data;
<<<<<<< HEAD
=======

>>>>>>> origin/master
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

	$scope.opsi_pelayanan = function(){
		$http.get('data_pemohon/opsi').success(function(ppdpo_data) {
			$scope.pelayanan_pendaftaran_data_pemohon_opsi = ppdpo_data;
		});
	}

	$scope.opsi_pelayanan();
<<<<<<< HEAD
=======

>>>>>>> origin/master
	$scope.show_all();

	$scope.opsi_cari = '$';
	$scope.search = {};
	$scope.displayed = fetch_limit;

	$scope.loadMore = function(){
		$scope.displayed += fetch_limit;
	}

	$scope.pelayanan_pendaftaran_data_pemohon_data;
<<<<<<< HEAD
=======

>>>>>>> origin/master
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
		$http.get('data_pemohon/edit/data/' + id).success(function(dped) {
			$scope.data_pemohon_edit_data = dped;
		});
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
<<<<<<< HEAD
=======

>>>>>>> origin/master
	$scope.filter_pelayanan = function(){
		$http.get('data_pemohon/data/' + $scope.pelayanan_id).success(function(ppdp_data) {
			$scope.pelayanan_pendaftaran_data_pemohon_data = ppdp_data;
		});
	}
<<<<<<< HEAD
=======

>>>>>>> origin/master
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
