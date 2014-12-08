function clear_iframe(iframe_id) {
	$('#' + iframe_id ).attr('src', '');
}
var fetch_limit = 15;
$app = angular.module('sicantik_backoffice', [])
////////////////////////////////////KONFIGURASI START//////////////////////////////

////////////////////////////////////KONFIGURASI START/////////////////////////////

//////////////////////////////SETTING PERIZINAN/////////////////////
.controller('PelayananPendaftaranPermohonanSementaraCtrl', ['$scope', '$http',
	function ($scope, $http){
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

	/* # Opsi ===================================================================================================== */

	$scope.opsi_pemohon_propinsi = '';

	$scope.pelayanan_pendaftaran_permohonan_sementara_opsi_kelurahan_selected = function(id, id_kecamatan) {
		$http.get('permohonan_sementara/opsi/kelurahan/' + id + '/' + id_kecamatan).success(function(psokel_data) {
			$scope.permohonan_sementara_opsi_kelurahan_data = psokel_data;
		});
	}

	$scope.pelayanan_pendaftaran_permohonan_sementara_opsi_kecamatan_selected = function(id, id_kabupaten) {
		$http.get('permohonan_sementara/opsi/kecamatan/' + id + '/' + id_kabupaten).success(function(psokec_data) {
			$scope.permohonan_sementara_opsi_kecamatan_data = psokec_data;
		});
	}

	$scope.pelayanan_pendaftaran_permohonan_sementara_opsi_kabupaten_selected = function(id, id_propinsi) {
		$http.get('permohonan_sementara/opsi/kabupaten/' + id + '/' + id_propinsi).success(function(psokab_data) {
			$scope.permohonan_sementara_opsi_kabupaten_data = psokab_data;
		});
	}

	$scope.pelayanan_pendaftaran_permohonan_sementara_opsi_propinsi_selected = function(id) {
		$http.get('permohonan_sementara/opsi/propinsi/' + id).success(function(psop_data) {
			$scope.permohonan_sementara_opsi_propinsi_data = psop_data;
		});
	}

	$scope.aw = function() {
		alert('aw');
	}
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

			$scope.pelayanan_pendaftaran_permohonan_sementara_opsi_propinsi_selected($scope.permohonan_sementara_edit_data.propinsi_pemohon);
			$scope.pelayanan_pendaftaran_permohonan_sementara_opsi_kabupaten_selected($scope.permohonan_sementara_edit_data.kabupaten_pemohon, $scope.permohonan_sementara_edit_data.propinsi_pemohon);
			$scope.pelayanan_pendaftaran_permohonan_sementara_opsi_kecamatan_selected($scope.permohonan_sementara_edit_data.kecamatan_pemohon, $scope.permohonan_sementara_edit_data.kabupaten_pemohon);
			$scope.pelayanan_pendaftaran_permohonan_sementara_opsi_kelurahan_selected($scope.permohonan_sementara_edit_data.kelurahan_pemohon, $scope.permohonan_sementara_edit_data.kecamatan_pemohon);
		});
	}

	$scope.modal_delete_data = function(id) {
		$scope.delete_id = id;
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
])

.controller('PelayananPendaftaranPermohonanIzinBaruCtrl', ['$scope', '$http',
	function ($scope, $http){
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
	}
])

.controller('PelayananPendaftaranPermohonanPerubahanIzinCtrl', ['$scope', '$http',
	function ($scope, $http){
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
])

.controller('PelayananPendaftaranPermohonanPerpanjanganIzinCtrl', ['$scope', '$http',
	function ($scope, $http){
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
])

.controller('PelayananPendaftaranPermohonanDaftarUlangIzinCtrl', ['$scope', '$http',
	function ($scope, $http){
			$scope.prope = "";
		    $scope.kabe = "";
		    $scope.kece = "";
		    $scope.kele = "";

		    $scope.prohon = "";
		    $scope.kahon = "";
		    $scope.kecon = "";
		    $scope.kebon = "";

		    $scope.items = [
		   {source: 'KTP', Title: 'KTP', selected: true},
		   {source: 'SIM', Title: 'SIM', selected: false},
	   	   {source: 'PASSPORT', Title: 'PASSPORT', selected:false},
			];

				$scope.show_all = function(){
					$http.get('daftar_ulang_izin/data').success(function(ppdui_data){
						$scope.pelayanan_pendaftaran_permohonan_daftar_ulang_izin_data = ppdui_data;
					});
				}

				$scope.show_daftar = function() {
					$http.get('daftar_ulang_izin/daftar/data').success(function(df_data){
						$scope.pelayanan_pendaftaran_permohonan_daftar_ulang_izin_daftar_data = df_data;
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

	$scope.modal_tambah_data = function() {

	}

	$scope.modal_edit_data = function(id) {
		$http.get('daftar_ulang_izin/edit/data/' + id).success(function(duied) {
			$scope.daftar_ulang_izin_edit_data = duied;
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
			$scope.get_propinsi = function() {
				$scope.aaa = $scope.propinsi_perusahaan;
				$http.get('data_perusahaan/opsi/perusahaan_propinsi').success(function(pjp_data) {
					$scope.portal_propinsi_data = pjp_data;
				});
			}

			$scope.get_propinsi();


			$scope.$watch('prope', function() {
				$http.get('data_perusahaan/opsi/perusahaan_kabupaten/' + $scope.prope.id ).success(function(kab_data) {
					$scope.portal_kabupaten_data = kab_data;
				});
				$scope.kabe = "Pilih Kabupaten";
				$scope.kece = "Pilih Kecamatan";
			});

			$scope.$watch('kabe', function(){
				$http.get('data_perusahaan/opsi/perusahaan_kecamatan/' + $scope.kabe.id).success(function(kec_data){
					$scope.portal_kecamatan_data = kec_data;
				});
				$scope.kece = "Pilih Kecamatan";
			});

			$scope.$watch('kece', function(){
				$http.get('data_perusahaan/opsi/perusahaan_kelurahan/' + $scope.kece.id).success(function(kel_data){
					$scope.portal_kelurahan_data = kel_data;
				});
			});

			$scope.get_propinsi_pemohon = function() {
				$scope.aaa = $scope.propinsi_perusahaan;
				$http.get('data_perusahaan/opsi/perusahaan_propinsi').success(function(pjp_data) {
					$scope.portal_propinsi_pemohon_data = pjp_data;
				});
			}

			$scope.get_propinsi_pemohon();


			$scope.$watch('prohon', function() {
				$http.get('data_perusahaan/opsi/perusahaan_kabupaten/' + $scope.prohon.id ).success(function(kab_data) {
					$scope.portal_kabupaten_pemohon_data = kab_data;
				});
				$scope.kabe = "Pilih Kabupaten";
				$scope.kece = "Pilih Kecamatan";
			});

			$scope.$watch('kahon', function(){
				$http.get('data_perusahaan/opsi/perusahaan_kecamatan/' + $scope.kahon.id).success(function(kec_data){
					$scope.portal_kecamatan_pemohon_data = kec_data;
				});
				$scope.kece = "Pilih Kecamatan";
			});

			$scope.$watch('kecon', function(){
				$http.get('data_perusahaan/opsi/perusahaan_kelurahan/' + $scope.kecon.id).success(function(kel_data){
					$scope.portal_kelurahan_pemohon_data = kel_data;
				});
			});
				/* Define Modal Name */

				$scope.modal_edit = false;
				$scope.modal_pilih = false;
				$scope.modal_daftar = false;
				$scope.modal_selesai = false;
				$scope.modal_hapus = false;
				/* Define Open & Close Handler */

				$scope.modal_pilih_data = function() {
					$scope.show_daftar();
				}

				$scope.open_modal = function(modal_name, id) {
					if(id == null) {
						eval("$scope." + modal_name + "= true");
						// $scope.close_modal_pilih();
					}
					else {
						eval("$scope." + modal_name + "= true");
						eval("$scope." + modal_name + "_data(" + id + ")");
					}
				}

				$scope.open_modal_pilih = function(id){
					if(id == null) {
						eval("$scope.modal_daftar= false");
						// $scope.close_modal_pilih();
					}
					else {
						eval("$scope.modal_daftar= true");
						eval("$scope.modal_daftar_data(" + id + ")");
						eval("$scope.modal_pilih= false");
					}
				}


				// $scope.close_modal_pilih = function(){
				// 	eval("$scope.modal_pilih= false");
				// }
				$scope.close_modal = function(modal_name) {
					eval("$scope." + modal_name + "= false");
				}



				/*  Construct Modal Function */

				$scope.modal_edit_data = function(id) {
					$http.get('daftar_ulang_izin/edit/data/' + id).success(function(duied) {
						$scope.daftar_ulang_izin_edit_data = duied;
					});
				}

				$scope.modal_daftar_data = function(id){
					$http.get('daftar_ulang_izin/daftar/data/' + id).success(function(m){
						$scope.daftar_ulang_izin_daftar_data = m;
					});
				}

				$scope.modal_selesai_data = function(id){
					$http.get('daftar_ulang_izin/edit/data/' + id).success(function(duid) {
						$scope.daftar_ulang_izin_edit_data = duid;
					});
				}

				$scope.modal_hapus_data = function(id){
					$http.get('daftar_ulang_izin/edit/data/' + id).success(function(dued) {
						$scope.daftar_ulang_izin_edit_data = dued;
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

				$scope.modal_data_daftar_ulang_ubah_submit = function() {
					setTimeout(function() {
						result = $('#target_edit').contents().find('body').html(); // Nama Iframe
						if(result == '') {
							$scope.modal_data_daftar_ulang_ubah_submit();
						}
						else if(result === undefined) {
							$scope.modal_data_daftar_ulang_ubah_submit();
						}
						else {
							clear_iframe('target_edit');
							$scope.modal_edit = false;
							$scope.show_all();
						}

					}, 1);
				}

				$scope.modal_data_daftar_ulang_tambah_submit = function() {
					setTimeout(function() {
						result = $('#target_insert').contents().find('body').html(); // Nama Iframe
						if(result == '') {
							$scope.modal_data_daftar_ulang_tambah_submit();
						}
						else if(result === undefined) {
							$scope.modal_data_daftar_ulang_tambah_submit();
						}
						else {
							clear_iframe('target_insert');
							$scope.modal_daftar = false;
							$scope.show_all();
						}

					}, 1);
				}

				$scope.modal_data_daftar_ulang_selesai_submit = function() {
					setTimeout(function() {
						result = $('#target_selesai').contents().find('body').html(); // Nama Iframe
						if(result == '') {
							$scope.modal_data_daftar_ulang_selesai_submit();
						}
						else if(result === undefined) {
							$scope.modal_data_daftar_ulang_selesai_submit();
						}
						else {
							clear_iframe();
							$scope.modal_selesai = false;
						}
						$scope.show_all();
					}, 1);
				}

				$scope.modal_data_daftar_ulang_hapus_submit = function() {
					setTimeout(function() {
						result = $('#target_delete').contents().find('body').html(); // Nama Iframe
						if(result == '') {
							$scope.modal_data_daftar_ulang_hapus_submit();
						}
						else if(result === undefined) {
							$scope.modal_data_daftar_ulang_hapus_submit();
						}
						else {
							clear_iframe();
							$scope.modal_hapus = false;

						}
					$scope.show_all();
					}, 1);
				}

	}
])

.controller('PelayananPendaftaranDataPemohonCtrl', ['$scope', '$http',
	function ($scope, $http){
		/* # Prepare Data ============================================================================================= */
			$scope.date = [];

		    $scope.date.prop = "";
		    $scope.date.kab = "";
		    $scope.date.kec = "";
		    $scope.date.kel = "";
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

			/* # Modal ==================================================================================================== */

			/*  Construct Modal Function */
				$scope.modal_edit_data = function(id) {
					$http.get('data_pemohon/edit/data/' + id).success(function(ped) {
						$scope.pemohon_edit_data = ped;
						$scope.opsi_propinsi($scope.kelurahan_edit_data.trpropinsi_id);
						$scope.opsi_kabupaten($scope.kelurahan_edit_data.trpropinsi_id, $scope.kelurahan_edit_data.trkabupaten_id);
						$scope.opsi_kecamatan($scope.kelurahan_edit_data.trkabupaten_id, $scope.kelurahan_edit_data.trkecamatan_id);
					});
				}

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
				$http.get('data_pemohon/edit/data/' + id).success(function(dped) {
					$scope.data_pemohon_edit_data = dped;
				});
			}

			$scope.modal_insert_data = function(id){

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
])


.controller('PelayananPendaftaranDataPerusahaanCtrl', ['$scope', '$http',
	function ($scope,$http){
			$scope.date = [];

		    $scope.propba = "";
		    $scope.kabba = "";
		    $scope.kecba = "";
		    $scope.kelba = "";
		    $scope.prope = "";
		    $scope.kabe = "";
		    $scope.kece = "";
		    $scope.kele = "";
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

			$scope.get_propinsi = function() {
				$scope.aaa = $scope.propinsi_perusahaan;
				$http.get('data_perusahaan/opsi/perusahaan_propinsi').success(function(pjp_data) {
					$scope.portal_propinsi_data = pjp_data;
				});
			}

			$scope.get_propinsi();

			$scope.$watch('propba', function() {
				$http.get('data_perusahaan/opsi/perusahaan_kabupaten/' + $scope.propba.id ).success(function(kab_data) {
					$scope.portal_kabupaten_data = kab_data;
				});
				$scope.kecba = "";
				$scope.kelba = "";
			});

			$scope.$watch('kabba', function(){
				$http.get('data_perusahaan/opsi/perusahaan_kecamatan/' + $scope.kabba.id).success(function(kec_data){
					$scope.portal_kecamatan_data = kec_data;
				});
				$scope.kelba = "";
			});

			$scope.$watch('kecba', function(){
				$http.get('data_perusahaan/opsi/perusahaan_kelurahan/' + $scope.kecba.id).success(function(kel_data){
					$scope.portal_kelurahan_data = kel_data;
				});
			});

			$scope.$watch('prope', function() {
				$http.get('data_perusahaan/opsi/perusahaan_kabupaten/' + $scope.prope.id ).success(function(kab_data) {
					$scope.portal_kabupaten_data = kab_data;
				});
				$scope.kabe = "Pilih Kabupaten";
				$scope.kece = "Pilih Kecamatan";
			});

			$scope.$watch('kabe', function(){
				$http.get('data_perusahaan/opsi/perusahaan_kecamatan/' + $scope.kabe.id).success(function(kec_data){
					$scope.portal_kecamatan_data = kec_data;
				});
				$scope.kece = "Pilih Kecamatan";
			});

			$scope.$watch('kece', function(){
				$http.get('data_perusahaan/opsi/perusahaan_kelurahan/' + $scope.kece.id).success(function(kel_data){
					$scope.portal_kelurahan_data = kel_data;
				});
			});

			/* Define Modal Name */

			$scope.modal_edit = false;
			$scope.modal_tambah_perusahaan = false;

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
				$http.get('data_perusahaan/edit/data/' + id).success(function(dped) {
					$scope.data_perusahaan_edit_data = dped;
					$scope.perusahaan_opsi_propinsi($scope.data_perusahaan_edit_data.perusahaan_propinsi);
					$scope.perusahaan_opsi_kabupaten($scope.data_perusahaan_edit_data.perusahaan_propinsi, $scope.data_perusahaan_edit_data.perusahaan_kabupaten);
					$scope.perusahaan_opsi_kecamatan($scope.data_perusahaan_edit_data.perusahaan_kabupaten, $scope.data_perusahaan_edit_data.perusahaan_kecamatan);
					$scope.perusahaan_opsi_kelurahan($scope.data_perusahaan_edit_data.perusahaan_kecamatan, $scope.data_perusahaan_edit_data.perusahaan_kelurahan);
				});
			}

			/* Prepare Opsi */

				$scope.perusahaan_opsi_propinsi = function(id) {
					$http.get('data_perusahaan/opsi/perusahaan_propinsi/' + id).success(function(prope) {
						$scope.opsi_proper = prope;
					});
				}

				$scope.perusahaan_opsi_kabupaten = function(id_propinsi, id) {
					$http.get('data_perusahaan/opsi_edit/perusahaan_kabupaten/' + id_propinsi + '/' + id).success(function(kabe) {
						$scope.opsi_kaber = kabe;
					});
				}

				$scope.perusahaan_opsi_kecamatan = function(id_kabupaten, id) {
					$http.get('data_perusahaan/opsi_edit/perusahaan_kecamatan/' + id_kabupaten + '/' + id).success(function(kece) {
						$scope.opsi_kecer = kece;
					});
				}

				$scope.perusahaan_opsi_kelurahan = function(id_kecamatan, id){
					$http.get('data_perusahaan/opsi_edit/perusahaan_kelurahan/' + id_kecamatan + '/' + id).success(function(kele) {
						$scope.opsi_keler = kele;
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

			$scope.modal_data_perusahaan_tambah_submit = function() {
					setTimeout(function() {
						result = $('#target_tambah_perusahaan').contents().find('body').html(); // Nama Iframe
						if(result == '') {
							$scope.modal_data_perusahaan_tambah_submit();
						}
						else if(result === undefined) {
							$scope.modal_data_perusahaan_tambah_submit();
						}
						else {
							clear_iframe('target_tambah_perusahaan');
							$scope.modal_tambah_perusahaan = false;
							$scope.show_all();
						}

					}, 1);
			}

			$scope.modal_data_perusahaan_ubah_submit = function() {
					setTimeout(function() {
						result = $('#target_ubah_perusahaan').contents().find('body').html(); // Nama Iframe
						if(result == '') {
							$scope.modal_data_perusahaan_ubah_submit();
						}
						else if(result === undefined) {
							$scope.modal_data_perusahaan_ubah_submit();
						}
						else {
							clear_iframe('target_ubah_perusahaan');
							$scope.modal_edit = false;
							$scope.show_all();
						}

					}, 1);
			}
	}
])

.controller('PelayananCustomerServiceInformasiPerizinanCtrl', ['$scope', '$http',
	function ($scope, $http){
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
])

.controller('PelayananCustomerServiceInformasiTrackingCtrl', ['$scope', '$http',
	function ($scope, $http){
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
])

.controller('PelayananCustomerServiceInformasiMasaBerlakuCtrl', ['$scope', '$http',
	function ($scope, $http){
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
])
