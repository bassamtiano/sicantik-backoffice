
var fetch_limit = 100;

function clear_iframe() {
	$('#target_edit').attr('src','');
}

$app = angular.module('sicantik_backoffice', [])


////////////////////////////////////KONFIGURASI START//////////////////////////////

//////////////////////////////SETTING PERIZINAN/////////////////////

.controller('KonfigurasiSettingPerizinanJenisPerizinanCtrl', ['$scope', '$http', 

	function ($scope, $http) {
		/* # Prepare Data ============================================================================================= */
		$scope.show_all = function(){
			$http.get('jenis_perizinan/data').success(function(spjp_data) {
				$scope.setting_perizinan_jenis_perizinan_data = spjp_data;
			});
		}

		$scope.opsi_kelompok = function(){ 
			$http.get('jenis_perizinan/opsi_kelompok').success(function(jpok_data) { 
				$scope.jenis_perizinan_opsi_kelompok = jpok_data;
			});
		}

		$scope.opsi_unitkerja = function(){ 
			$http.get('jenis_perizinan/opsi_unitkerja').success(function(jpou_data) { 
				$scope.jenis_perizinan_opsi_unitkerja = jpou_data;
			});
		}

		$scope.opsi_kelompok();
		$scope.opsi_unitkerja();

		$scope.show_all();

		/* # Filter Data ============================================================================================== */

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		$scope.setting_perizinan_jenis_perizinan_data;

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
			$http.get('jenis_perizinan/edit/data/' + id).success(function(jped) {
				$scope.jenis_perizinan_edit_data = jped;
			});
		}

		/* Define Tab Name */

		$scope.tab = [];

		$scope.tab.tambah_data_jenis_perizinan = true;
		$scope.tab.edit_data_jenis_perizinan = true;

		$scope.show_tab = function(tab_name, button_id) {

			$scope.tab.tambah_data_jenis_perizinan = false;
			$scope.tab.edit_data_jenis_perizinan = false;

			eval('$scope.' + tab_name + "= true");

			$('.tab-nav-item').removeClass('enable');
			$('#' + button_id).addClass('enable');

		}

		$scope.filter_konfigurasi = function(){
			$http.get('jenis_perizinan/data/' + $scope.konfigurasi_id).success(function(spjp_data){
				$scope.setting_perizinan_jenis_perizinan_data = spjp_data;
			});
		}

		$scope.modal_tambah_submit = function() {

		}

		$scope.modal_edit_submit = function() {

		}

	}
])

.controller('KonfigurasiSettingPerizinanPerizinanParalelCtrl', ['$scope', '$http', 
	function ($scope, $http) {
		
		$scope.show_all = function(){
			$http.get('perizinan_paralel/data').success(function(sppp_data) {
				$scope.setting_perizinan_perizinan_paralel_data = sppp_data;
			});
		}

		$scope.show_all();

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		$scope.setting_perizinan_perizinan_paralel_data;

		$scope.filter_konfigurasi = function(){
			$http.get('perizinan_paralel/data/' + $scope.konfigurasi_id).success(function(sppp_data){
				$scope.setting_perizinan_perizinan_paralel_data = sppp_data;
			});
		}
	}
])

.controller('KonfigurasiSettingPerizinanPersyaratanIzinCtrl', ['$scope', '$http', 
	function ($scope, $http) {

		$scope.show_all = function(){
			$http.get('persyaratan_izin/data').success(function(sppi_data) {
				$scope.setting_perizinan_persyaratan_izin_data = sppi_data;
			});
		}

		$scope.show_all();

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		$scope.setting_perizinan_persyaratan_izin_data;

		$scope.filter_konfigurasi = function(){
			$http.get('persyaratan_izin/data/' + $scope.konfigurasi_id).success(function(sppi_data){
				$scope.setting_perizinan_persyaratan_izin_data = sppi_data;
			});
		}
	}
])

.controller('KonfigurasiSettingPerizinanPropertyPendataanCtrl', ['$scope', '$http', 
	function ($scope, $http) {

		$scope.show_all = function(){
			$http.get('property_pendataan/data').success(function(sppp_data) {
				$scope.setting_perizinan_property_pendataan_data = sppp_data;
			});
		}

		$scope.show_all();

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		$scope.setting_perizinan_property_pendataan_data;

		$scope.filter_konfigurasi = function(){
			$http.get('property_pendataan/data/' + $scope.konfigurasi_id).success(function(sppp_data){
				$scope.setting_perizinan_property_pendataan_data = sppp_data;
			});
		}
	}
])

.controller('KonfigurasiSettingPerizinanNilaiRetribusiCtrl', ['$scope', '$http', 
	function ($scope, $http) {

		$scope.show_all = function(){
			$http.get('nilai_retribusi/data').success(function(spnr_data) {
				$scope.setting_perizinan_nilai_retribusi_data = spnr_data;
			});
		}

		$scope.show_all();

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		$scope.setting_perizinan_nilai_retribusi_data;

		$scope.filter_konfigurasi = function(){
			$http.get('property_pendataan/data/' + $scope.konfigurasi_id).success(function(sppp_data){
				$scope.setting_perizinan_nilai_retribusi_data = sppp_data;
			});
		}
	}
])

.controller('KonfigurasiSettingPerizinanKoefisienTarifCtrl', ['$scope', '$http', 
	function ($scope, $http) {

		$scope.show_all = function(){
			$http.get('koefisien_tarif/data').success(function(spkt_data) {
				$scope.setting_perizinan_koefisien_tarif_data = spkt_data;
			});
		}

		$scope.show_all();

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		$scope.setting_perizinan_koefisien_tarif_data;

		$scope.filter_konfigurasi = function(){
			$http.get('koefisien_tarif/data/' + $scope.konfigurasi_id).success(function(spkt_data){
				$scope.setting_perizinan_koefisien_tarif_data = spkt_data;
			});
		}
	}
])

///////////////////////////////////SETTING UMUM/////////////////////////////////////////
.controller('KonfigurasiSettingUmumHariLiburCtrl', ['$scope', '$http', 
	function ($scope, $http){

		$scope.show_all = function(){
			$http.get('hari_libur/data').success(function(suhl_data){
				$scope.setting_umum_hari_libur_data = suhl_data;
			});
		}

		$scope.show_all();

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		$scope.setting_umum_hari_libur_data;

		$scope.filter_konfigurasi = function(){
			$http.get('hari_libur/data/' + $scope.konfigurasi_id).success(function(suhl_data){
				$scope.setting_umum_hari_libur_data = suhl_data;
			});
		}
	}
])

.controller('KonfigurasiSettingUmumInstansiCtrl', ['$scope', '$http', 
	function ($scope, $http) {

		$http.get('instansi/opsi/wilayah/data').success(function(suiowd_data){
			$scope.setting_umum_instansi_opsi_wilayah_data = suiowd_data;
		});
	}
])

//////////////////////////////SETTING USER///////////////////////////////////////
.controller('KonfigurasiSettingUserPegawaiCtrl', ['$scope', '$http', 
	function ($scope, $http){

		$scope.show_all = function(){
			$http.get('pegawai/data').success(function(sup_data){
				$scope.setting_user_pegawai_data = sup_data;
			});
		}

		$scope.show_all();

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		$scope.setting_user_pegawai_data;

		$scope.filter_konfigurasi = function(){
			$http.get('pegawai/data/' + $scope.konfigurasi_id).success(function(sup_data){
				$scope.setting_user_pegawai_data = sup_data;
			});
		}
	}
])

.controller('KonfigurasiSettingUserUnitKerjaCtrl', ['$scope', '$http', 
	function ($scope, $http){
		
		$scope.show_all = function(){
			$http.get('unit_kerja/data').success(function(suuk_data){
				$scope.setting_user_unit_kerja_data = suuk_data;
			});
		}

		$scope.show_all();

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		$scope.setting_user_pegawai_data;

		$scope.filter_konfigurasi = function(){
			$http.get('unit_kerja/data/' + $scope.konfigurasi_id).success(function(suuk_data){
				$scope.setting_user_unit_kerja_data = suuk_data;
			});
		}
	}
])

.controller('KonfigurasiSettingUserPenggunaCtrl', ['$scope', '$http', 
	function ($scope, $http){

		$scope.show_all = function(){
			$http.get('pengguna/data').success(function(sup_data){
				$scope.setting_user_pengguna_data = sup_data;
			});
		}

		$scope.show_all();

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		$scope.setting_user_pegawai_data;

		$scope.filter_konfigurasi = function(){
			$http.get('pengguna/data/' + $scope.konfigurasi_id).success(function(sup_data){
				$scope.setting_user_pengguna_data = sup_data;
			});
		}
	}
])

/////////////////////////////////SETTING WILAYAH/////////////////////////////////////////////
.controller('KonfigurasiSettingWilayahPropinsi', ['$scope', '$http', 
	function ($scope, $http) {

		$scope.show_all = function() {
			$http.get('propinsi/data').success(function(swp_data) {
				$scope.setting_wilayah_propinsi = swp_data;
			});	
		}

		$scope.show_all();

		/* # Filter Data ============================================================================================== */

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		/* # Modal =================================================================== */

		/* Define Modal Name */

		$scope.modal_edit = false;

		/* Define Open & Close Handler */

		$scope.open_modal = function(modal_name, id) {

			eval("$scope." + modal_name + "= true");
			eval("$scope." + modal_name + "_data(" + id + ")");
		}

		$scope.close_modal = function(modal_name) {

			$scope.show_all();

			setTimeout(function() {
				$scope.show_all();
			}, 100);

			eval("$scope." + modal_name + "= false");

		}

		
		/*  Construct Modal Function */

		$scope.modal_edit_data = function(id) {
			$http.get('provinsi/edit/data/' + id).success(function(ped) {
				$scope.provinsi_edit_data = ped;
			});
		}

		/* # Submit =================================================================================================== */

		$scope.modal_edit_submit = function(modal_name){

			$scope.show_all();
			$scope.close_modal(modal_name);

		}
	}
])

.controller('KonfigurasiSettingWilayahKabupaten', ['$scope', '$http', 
	function ($scope, $http) {
		$http.get('kabupaten/data').success(function(swk_data) {
			$scope.setting_wilayah_kabupaten = swk_data;
		});

		/* # Filter Data ============================================================================================== */

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		/* # Modal ========================================================================= */

		/* Define Modal Name */

		$scope.modal_edit = false;

		/* Define Open & Close Handler */

		$scope.open_modal = function(modal_name, id) {

			eval("$scope." + modal_name + "= true");
			eval("$scope." + modal_name + "_data(" + id + ")");
		}

		$scope.close_modal = function(modal_name) {
			eval("$scope." + modal_name + "= false");
		}

		/* Prepare Opsi */

		$scope.opsi_propinsi = function(id) {
			$http.get('kabupaten/opsi/propinsi/' + id).success(function(prop) {
				$scope.opsi_prop = prop;
			});
		}
		
		/*  Construct Modal Function */

		$scope.modal_edit_data = function(id) {
			$http.get('kabupaten/edit/data/' + id).success(function(ped) {
				$scope.kabupaten_edit_data = ped;
				$scope.opsi_propinsi($scope.kabupaten_edit_data.trpropinsi_id);
			});
		}

		/* Define Tab Name */

		$scope.get_propinsi = function() {
			$http.get('kabupaten/opsi/propinsi').success(function(prop_data) {
				$scope.propinsi_data = prop_data;
			});
		}

		$scope.get_propinsi();
	}
])

.controller('KonfigurasiSettingWilayahKecamatanCtrl', ['$scope', '$http', 
	function ($scope, $http){
		$http.get('kecamatan/data').success(function(swkc_data){
			$scope.setting_wilayah_kecamatan = swkc_data;
		});

		/* # Filter Data ============================================================================================== */

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		/* # Modal =================================================================== */

		/* Define Modal Name */

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

		$scope.modal_edit_data = function(id) {
			$http.get('kecamatan/edit/data/' + id).success(function(ped) {
				$scope.kecamatan_edit_data = ped;
				$scope.opsi_propinsi($scope.kecamatan_edit_data.trpropinsi_id);
				$scope.opsi_kabupaten($scope.kecamatan_edit_data.trpropinsi_id, $scope.kecamatan_edit_data.trkabupaten_id);
			});
		}

		/* Prepare Opsi */

		$scope.opsi_propinsi = function(id) {
			$http.get('kecamatan/opsi/propinsi/' + id).success(function(prop) {
				$scope.opsi_prop = prop;
			});
		}

		$scope.opsi_kabupaten = function(id_propinsi, id) {
			$http.get('kecamatan/opsi/kabupaten/' + id_propinsi + '/' + id).success(function(kab) {
				$scope.opsi_kab = kab;
			});
		}

		/* Define Tab Name */

		$scope.get_propinsi = function() {
			$http.get('kecamatan/opsi/propinsi').success(function(prop_data) {
				$scope.propinsi_data = prop_data;
			});
		}

		$scope.get_propinsi();

		$scope.$watch('propinsi_id', function() {
			$http.get('kecamatan/opsi/kabupaten/' + $scope.propinsi_id.id ).success(function(kab_data) {
				$scope.kabupaten_data = kab_data;
			});

			$scope.kecamatan_data = "";
			$scope.kelurahan_data = "";
		});

	}
])

.controller('KonfigurasiSettingWilayahKelurahanCtrl', ['$scope', '$http', 
	function ($scope, $http){
		$http.get('kelurahan/data').success(function(swkl_data){
			$scope.setting_wilayah_kelurahan = swkl_data;
		});

		/* # Filter Data ============================================================================================== */

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = fetch_limit;

		$scope.loadMore = function(){
			$scope.displayed += fetch_limit;
		}

		/* # Modal =================================================================== */

		/* Define Modal Name */

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

		$scope.modal_edit_data = function(id) {
			$http.get('kelurahan/edit/data/' + id).success(function(ped) {
				$scope.kelurahan_edit_data = ped;
				$scope.opsi_propinsi($scope.kelurahan_edit_data.trpropinsi_id);
				$scope.opsi_kabupaten($scope.kelurahan_edit_data.trpropinsi_id, $scope.kelurahan_edit_data.trkabupaten_id);
				$scope.opsi_kecamatan($scope.kelurahan_edit_data.trkabupaten_id, $scope.kelurahan_edit_data.trkecamatan_id);
			});
		}

		/* Prepare Opsi */

		$scope.opsi_propinsi = function(id) {
			$http.get('kecamatan/opsi/propinsi/' + id).success(function(prop) {
				$scope.opsi_prop = prop;
			});
		}

		$scope.opsi_kabupaten = function(id_propinsi, id) {
			$http.get('kecamatan/opsi/kabupaten/' + id_propinsi + '/' + id).success(function(kab) {
				$scope.opsi_kab = kab;
			});
		}

		$scope.opsi_kecamatan = function(id_kabupaten, id) {
			$http.get('kelurahan/opsi/kecamatan/' + id_kabupaten + '/' + id).success(function(kec) {
				$scope.opsi_kec = kec;
			});
		}


		/* Define Tab Name */

		$scope.get_propinsi = function() {
			$http.get('kelurahan/opsi/propinsi').success(function(prop_data) {
				$scope.propinsi_data = prop_data;
			});
		}

		$scope.get_propinsi();

		$scope.$watch('propinsi_id', function() {
			$http.get('kelurahan/opsi/kabupaten/' + $scope.propinsi_id.id ).success(function(kab_data) {
				$scope.kabupaten_data = kab_data;
			});

			$scope.kecamatan_data = "";
			$scope.kelurahan_data = "";
		});

		$scope.$watch('kabupaten_id', function(){
			$http.get('kelurahan/opsi/kecamatan/' + $scope.kabupaten_id.id).success(function(kec_data){
				$scope.kecamatan_data = kec_data;
			});
			$scope.kecamatan_data = "";		
		});

	}
])

.controller('KonfigurasiKeamananDataLogActivity', ['$scope', '$http', 
	function ($scope, $http) {

		/* # Prepare Data ============================================================================================= */

		$scope.show_all = function() {
			$http.get('log_activity/data').success(function(kdla_data) {
				$scope.keamanan_data_log_activity = kdla_data;
			});
		}

		$scope.show_all();

		/* # Filter Data ============================================================================================== */

		$scope.opsi_cari = '$';
		$scope.search = {};
		$scope.displayed = 100;

		$scope.loadMore = function() {
			$scope.displayed += 100;
		}

		$scope.keamanan_data_log_activity;

		/* # Modal ==================================================================================================== */

		$scope.modal_delete = function(id) {
			alert(id);
		}

		/* # Submit =================================================================================================== */

		$scope.filter_date = function() {
			$http.get('log_activity/data/' + $scope.date.start + '/' + $scope.date.finish).success(function(kdla_data) {
				$scope.keamanan_data_log_activity = kdla_data;
			});
		}

	}

])

.controller('KonfigurasiReportReportGenerator', ['$http', '$scope', 
	function ($http, $scope) {
		/* # Prepare Data ============================================================================================= */

		$scope.show_all = function() {
			$http.get('report_generator/data').success(function(rg_data) {
				$scope.report_generator_data = rg_data;
			});
		}

		$scope.show_all();

		/* # Filter Data ============================================================================================== */

		$scope.displayed = 100;

		$scope.loadMore = function() {
			$scope.displayed += 100;
		}

		$scope.report_generator_data;
	}
])

.controller('KonfigurasiReportReportComponent', ['$http', '$scope', 
	function ($http, $scope) {
		/* # Prepare Data ============================================================================================= */

		$scope.show_all = function() {
			$http.get('report_component/data').success(function(rc_data) {
				$scope.report_component_data = rc_data;
			});
		}

		$scope.show_all();

		/* # Filter Data ============================================================================================== */

		$scope.displayed = 100;

		$scope.loadMore = function() {
			$scope.displayed += 100;
		}

		$scope.report_component_data;
	}
])
////////////////////////////////////KONFIGURASI END////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
