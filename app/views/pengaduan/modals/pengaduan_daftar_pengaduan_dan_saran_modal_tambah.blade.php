<form method="post" target="target_tambah" action="{{ URL::to('pengaduan/daftar_pengaduan_saran/tambah') }}">
    <div class="modal" ng-show={{ $modal_name }}>

        <div class="modal-container large">
            <div class="modal-header update">
                <h2>Tambah Pengaduan</h2><a class="button-close" href ng-click="close_modal('modal_tambah')">X</a>
            </div>
            <div class="modal-body">
                <div class="body-tab-wrapper">
                    <div class="tab-nav">
                        <ul class="tab-nav-wrapper">
                            <li class="tab-nav-item enable" id="tab_nav_isi_biodata" ng-click="show_tab('tab.tambah_data_tab_isi_biodata', 'tab_nav_isi_biodata')">Isi Biodata</li>
                            <li class="tab-nav-item" id="tab_nav_pesan_pengaduan" ng-click="show_tab('tab.tambah_data_tab_pesan_pengaduan', 'tab_nav_pesan_pengaduan')">Pesan Pengaduan</li>
                            <li class="tab-nav-item" id="tab_nav_info_pengaduan" ng-click="show_tab('tab.tambah_data_tab_info_pengaduan', 'tab_nav_info_pengaduan')">Informasi Pengaduan</li>
                        </ul>
                    </div>
                    <div class="tab-content-wrapper">
                        <div class="tab-content" ng-show="tab.tambah_data_tab_isi_biodata">
                            <div class="tab-content-left">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama</div>
                                    <div class="content-form-input">
                                        <input type="text" name="nama" value="" placeholder="Nama Lengkap"/>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat Email</div>
                                    <div class="content-form-input">
                                        <input type="text" name="email" value="" placeholder="Alamat Email"/>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">No Telp</div>
                                    <div class="content-form-input">
                                        <input type="text" name="telp" value="" placeholder="No Telepon"/>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat</div>
                                    <div class="content-form-input">
                                        <textarea class="form-control" rows="4" cols="15" name="alamat" placeholder="Alamat"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content-right">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Propinsi</div>
                                    <div class="content-form-input">                                    
                                        <!-- <select class="form-option" ng-model="propinsi_id" ng-options="">
                                            <option value="">Propinsi</option>
                                        </select> -->
                                    <!-- <select name="propinsi_pengaduan" >
                                        <option ng-repeat="prop_data in propinsi_data"  ng-if="prop_data.selected == true" selected ng-value="prop_data.id" >@{{ prop_data.n_propinsi }}</option>
                                        <option ng-repeat="prop_data in propinsi_data"  ng-if="prop_data.selected == false" ng-value="prop_data.id" >@{{ prop_data.n_propinsi }}</option>
                                    </select> -->
                                    <select name="propinsi" ng-model="propinsi_id" ng-options="prop.n_propinsi for prop in propinsi_data track by prop.id">
                                        <option value="">Pilih Propinsi</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kabupaten</div>
                                    <div class="content-form-input">                                    
                                        <!-- <select class="form-option" ng-model="kabupaten_id" ng-options="">
                                            <option value="">Kabupaten</option>
                                        </select> -->
                                    <select name="kabupaten" ng-model="kabupaten_id" ng-options="kab.n_kabupaten for kab in kabupaten_data track by kab.id">
                                        <option value="">Pilih Kabupaten</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kecamatan</div>
                                    <div class="content-form-input">                                    
                                        <!-- <select class="form-option" ng-model="kecamatan_id" ng-options="">
                                            <option value="">Kecamatan</option>
                                        </select> -->
                                    <select name="kecamatan" ng-model="kecamatan_id" ng-options="kec.n_kecamatan for kec in kecamatan_data track by kec.id">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kelurahan</div>
                                    <div class="content-form-input">                                    
                                        <!-- <select class="form-option" ng-model="kelurahan_id" ng-options="">
                                            <option value="">Kelurahan</option>
                                        </select> -->
                                    <select name="kelurahan" ng-model="kelurahan_id" ng-options="kel.n_kelurahan for kel in kelurahan_data track by kel.id">
                                        <option value="">Pilih Propinsi</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div> <!--isi biodata-->
                        <div class="tab-content" ng-show="tab.tambah_data_tab_pesan_pengaduan">
                            <div class="tab-content-left">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Pesan Pengaduan</div>
                                    <div class="content-form-input">
                                        <textarea class="form-control" rows="4" cols="15" id="pesan" name="e_pesan" placeholder="Pesan Pengaduan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div> <!--pesan pengaduan-->
                        <div class="tab-content" ng-show="tab.tambah_data_tab_info_pengaduan">
                            <div class="tab-content-left">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Sumber Pengaduan</div>
                                    <div class="content-form-input">
                                        <select class="form-option" name="sumber_pesan_pengaduan" ng-model="sumber_id" ng-options="pdpsosp.name for pdpsosp in pengaduan_daftar_pengaduan_saran_opsi_sumber_pengaduan track by pdpsosp.id">
                                            <option value="">Sumber Pengaduan</option>
                                        </select>
                                    </div>
                                </div>  
                                <div class="tab-content-form">
                                    <div class="content-form-label">Status Pengaduan</div>
                                    <div class="content-form-input">
                                        <select class="form-option" name="status_pesan" ng-model="status_id" ng-options="pdpsop.n_sts_pesan for pdpsop in pengaduan_daftar_pengaduan_saran_opsi_pengaduan track by pdpsop.id">
                                            <option value="">Status Pengaduan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Tanggal Penulisan</div>
                                    <div class="content-form-input"><input type="date" name="d_entry"/></div>
                                </div>
                            </div>
                        </div> <!--info pengaduan-->

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="modal-footer-left">
                    &nbsp;
                </div>
                <div class="modal-footer-right">
                    <input type="submit" value="Simpan" class="btn button-green" ng-click="modal_tambah_submit()"/>
                    <a class="btn button-red" ng-click="close_modal('modal_tambah')">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>