<form id="form_tambah" method="post" target="target_tambah" action="{{ URL::to('pelayanan/pendaftaran/data_pemohon/tambah') }}">
    <div class="modal" ng-show={{ $modal_name }}>

        <div class="modal-container large">
            <div class="modal-header update">
                <h2>Tambah Data Pemohon</h2><a class="button-close" href ng-click="close_modal('modal_tambah_pemohon')">X</a>
            </div>
            <div class="modal-body">

                <div class="body-tab-wrapper">
                    <div class="tab-nav">
                        <ul class="tab-nav-wrapper">
                            <li class="tab-nav-item enable" id="tab_nav_data_pemohon" ng-click="show_tab('tab.data_awal_tab_data_pemohon', 'tab_nav_data_pemohon')">Data Pemohon</li>
                        <ul>
                    </div>
                    <div class="tab-content-wrapper">

                        <div class="tab-content" ng-show="tab.data_awal_tab_data_pemohon">

                            <div class="tab-content-left">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Sumber Identitas</div>
                                    <div class="content-form-input">
                                         <select name="source" name="source">
                                            <option ng-repeat="a in items"  ng-if="a.selected == true" selected ng-value="a.source" >@{{ a.Title }}</option>
                                            <option ng-repeat="a in items"  ng-if="a.selected == false" ng-value="a.source" >@{{ a.Title }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">ID</div>
                                    <div class="content-form-input"><input type="text" name="no_referensi" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama Pemohon</div>
                                    <div class="content-form-input"><input type="text" name="n_pemohon" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">No Telp / HP</div>
                                    <div class="content-form-input"><input type="text" name="telp_pemohon" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Propinsi</div>
                                    <div class="content-form-input">
                                        <select name="propinsi_pemohon" ng-model="pemohon_propinsi_id" ng-options="prop.n_propinsi for prop in pemohon_propinsi_data track by prop.id">
                                            <option value="">Pilih Propinsi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kabupaten</div>
                                    <div class="content-form-input">
                                        <select name="kabupaten_pemohon" ng-model="pemohon_kabupaten_id" ng-options="kab.n_kabupaten for kab in pemohon_kabupaten_data track by kab.id">
                                            <option value="">Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kecamatan</div>
                                    <div class="content-form-input">
                                        <select name="kecamatan_pemohon" ng-model="pemohon_kecamatan_id" ng-options="kec.n_kecamatan for kec in pemohon_kecamatan_data track by kec.id">
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kelurahan</div>
                                    <div class="content-form-input">
                                        <select name="kelurahan_pemohon" ng-model="pemohon_kelurahan_id" ng-options="kel.n_kelurahan for kel in pemohon_kelurahan_data track by kel.id">
                                            <option value="">Pilih Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content-right">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat Pemohon</div>
                                    <div class="content-form-input">
                                        <textarea rows="4" name="a_pemohon"></textarea>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat Pemohon di Luar Negeri (Isikan jika ada)</div>
                                    <div class="content-form-input">
                                        <textarea rows="4" name="a_pemohon_luar"></textarea>
                                    </div>
                                </div>
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
                    <input type="submit" value="Simpan" class="button-green" ng-click="modal_tambah_submit()"/>
                    <button class="button-red" href ng-click="close_modal('modal_tambah_pemohon')">Keluar</button>
                </div>
            </div>

        </div>

        <iframe id="target_tambah" name="target_tambah" style="width:100; height:100; visibility:hidden; position:relative; background:#fff;">

        </iframe>
    </div>
</form>