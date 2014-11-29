<form id="form_tambah" method="post" target="target_tambah_perusahaan" action="{{ URL::to('pelayanan/pendaftaran/data_perusahaan/tambah') }}">
    <div class="modal" ng-show={{ $modal_name }}>

        <div class="modal-container large">
            <div class="modal-header update">
                <h2>Input Data Perusahaan</h2><a class="button-close" href ng-click="close_modal('modal_tambah_perusahaan')">X</a>
            </div>

            <div class="modal-body">

                <div class="body-tab-wrapper">
                    <div class="tab-nav">
                        <ul class="tab-nav-wrapper">
                            <li class="tab-nav-item enable" id="tab_nav_data_perusahaan" ng-click="show_tab('tab.data_awal_tab_data_perusahaan', 'tab_nav_data_perusahaan')">Data Perusahaan</li>
                        <ul>
                    </div>

                    <div class="tab-content-wrapper">

                        <div class="tab-content" ng-show="tab.data_awal_tab_data_perusahaan">

                            <div class="tab-content-left">

                                <div class="tab-content-form">
                                    <div class="content-form-label">Nomor Registrasi</div>
                                    <div class="content-form-input"><input name="no_reg"type="text" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">NPWP</div>
                                    <div class="content-form-input"><input name="i_npwp" type="text" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama Perusahaan</div>
                                    <div class="content-form-input"><input name="perusahaan" type="text" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nomor Telepon</div>
                                    <div class="content-form-input"><input name="tel" type="text" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Jenis Kegiatan</div>
                                    <div class="content-form-input">
                                        <select name="kegiatan" class="form-option" ng-model="kegiatan_id" ng-options="dpok.n_kegiatan for dpok in data_perusahaan_opsi_kegiatan track by dpok.id">
                                            <option value="">Jenis Kegiatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Jenis Investasi</div>
                                    <div class="content-form-input">
                                        <select name="investasi" class="form-option" ng-model="investasi_id" ng-options="dpoi.n_investasi for dpoi in data_perusahaan_opsi_investasi track by dpoi.id">
                                            <option value="">Jenis Investasi</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-content-right">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Propinsi</div>
                                    <div class="content-form-input">
                                        <select name="propinsi" ng-model="propba" ng-options="pjp.n_propinsi for pjp in portal_propinsi_data track by pjp.id">
                                            <option value="">Pilih Propinsi</option>
                                        </select>    
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kabupaten</div>
                                    <div class="content-form-input">
                                        <select name="kabupaten" ng-model="kabba" ng-options="kab.n_kabupaten for kab in portal_kabupaten_data track by kab.id">
                                            <option value="">Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kecamatan</div>
                                    <div class="content-form-input">
                                        <select name="kecamatan" ng-model="kecba" ng-options="kec.n_kecamatan for kec in portal_kecamatan_data track by kec.id">
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kelurahan</div>
                                    <div class="content-form-input">
                                        <select name="kelurahan" ng-model="kelba" ng-options="kel.n_kelurahan for kel in portal_kelurahan_data track by kel.id">
                                            <option value="">Pilih Kelurahan</option>
                                        </select>  
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat Perusahaan</div>
                                    <div class="content-form-input">
                                        <textarea rows="4" name="al_perusahaan"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- <ul ng-repeat="syarat in entry_data_perizinan_data_awal_data.syarat">
                    <li>@{{ syarat.persyaratan }} , @{{ syarat.status }}, @{{ syarat.terpenuhi }}, urutan @{{ syarat.urut }}</li>
                </ul> -->

            </div>
            <div class="modal-footer">
                <div class="modal-footer-left">
                    &nbsp;
                </div>
                <div class="modal-footer-right">
                    <button type="submit" class="button-green" ng-click="modal_data_perusahaan_tambah_submit()" >Simpan</button>
                    <a class="btn button-red" href ng-click="close_modal('modal_tambah_perusahaan')">Keluar</a>
                </div>
            </div>
            <iframe id="target_tambah_perusahaan" name="target_tambah_perusahaan" style="width:100; height:100; visibility:hidden; position:relative; background:#fff;">

            </iframe>
        </div>
    </div>
</form>