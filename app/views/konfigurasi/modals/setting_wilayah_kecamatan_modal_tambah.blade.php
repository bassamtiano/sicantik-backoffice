<div class="modal" ng-show={{ $modal_name }}> 

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Tambah Kecamatan</h2><a class="button-close" href ng-click="close_modal('modal_tambah')">x</a>
        </div>
        <div class="modal-body">
            
            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                       <li class="tab-nav-item" id="tab_nav_tambah_kecamatan" ng-click="show_tab('tab.data_awal_tab_persyaratan', 'tab_nav_tambah_kecamatan')">Data Kecamatan</li>
                    <ul>
                </div>
                <div class="tab-content-wrapper">

                    <div class="tab-content"> 

                        <div class="tab-content-left">

                            <div class="tab-content-form">
                                <div class="content-form-label">Provinsi</div>
                                    <select name="id" ng-model="propinsi_id" ng-options="prop.n_propinsi for prop in propinsi_data track by prop.id">
                                        <option value="">Pilih Propinsi</option>
                                    </select>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kabupaten</div>
                                    <select name="id" ng-model="kabupaten_id" ng-options="kab.n_kabupaten for kab in kabupaten_data track by kab.id">
                                        <option value="">Pilih Kabupaten</option>
                                    </select>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Kecamatan</div>
                                <div class="content-form-input"><input type="text" name="n_kecamatan" /></div>
                            </div>
                            
                        </div>

                        <div class="tab-content-right">
                           
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <div class="modal-footer">
            <div class="modal-footer-left">
                &nbsp;
            </div>
            <div class="modal-footer-right">
                <input type="submit" value="Simpan" class="btn button-green" ng-click="close_modal('modal_edit')"></button>
                <a class="btn button-red" ng-click="close_modal('modal_tambah')">Batal</a>
            </div>
        </div>

    </div>
</div>
