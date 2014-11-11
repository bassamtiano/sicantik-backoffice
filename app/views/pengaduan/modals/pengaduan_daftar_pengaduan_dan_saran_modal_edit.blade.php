<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Edit Pengaduan</h2><a class="button-close" href ng-click="close_modal('modal_edit')">X</a>
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
                                    <input type="text" value="@{{ daftar_pengaduan_saran_edit_data.nama }}" />
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Email</div>
                                <div class="content-form-input">
                                    <input type="email" value="@{{ daftar_pengaduan_saran_edit_data.email }}" />
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">No Telp</div>
                                <div class="content-form-input">
                                    <input type="text" value="@{{ daftar_pengaduan_saran_edit_data.telp }}" />
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat</div>
                                <div class="content-form-input">
                                    <textarea class="form-control" rows="4" cols="15" id="alamat" name="alamat" placeholder="Alamat">@{{ daftar_pengaduan_saran_edit_data.alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Propinsi</div>
                                <div class="content-form-input">                                    
                                    <select class="form-option" ng-model="propinsi_id" ng-options="">
                                        <option value="">Propinsi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kabupaten</div>
                                <div class="content-form-input">                                    
                                    <select class="form-option" ng-model="kabupaten_id" ng-options="">
                                        <option value="">Kabupaten</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kecamatan</div>
                                <div class="content-form-input">                                    
                                    <select class="form-option" ng-model="kecamatan_id" ng-options="">
                                        <option value="">Kecamatan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kelurahan</div>
                                <div class="content-form-input">                                    
                                    <select class="form-option" ng-model="kelurahan_id" ng-options="">
                                        <option value="">Kelurahan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!--isi biodata-->
                    <div class="tab-content" ng-show="tab.tambah_data_tab_pesan_pengaduan">
                        <div class="tab-content-left">
                            <div class="tab-content-form">
                                <div class="content-form-label">Isi Pesan Pengaduan</div>
                                <div class="content-form-input">
                                    <textarea class="form-control" rows="4" cols="15" id="pesan" name="pesan" placeholder="Pesan Pengaduan">@{{ daftar_pengaduan_saran_edit_data.e_pesan }}</textarea>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Tanggal Penulisan Pesan</div>
                                <div class="content-form-input">
                                    <input type="text" value="@{{ daftar_pengaduan_saran_edit_data.d_entry }}" />
                                </div>
                            </div>
                        </div>
                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Koreksi Pesan</div>
                                <div class="content-form-input">
                                    <textarea class="form-control" rows="4" cols="15" id="pesan" name="pesan" placeholder="Pesan Pengaduan">@{{ daftar_pengaduan_saran_edit_data.e_pesan_koreksi }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div> <!--pesan pengaduan-->
                    <div class="tab-content" ng-show="tab.tambah_data_tab_info_pengaduan">
                        <div class="tab-content-left">
                            <div class="tab-content-form">
                                <div class="content-form-label">Sumber Pengaduan</div>
                                <div class="content-form-input">
                                    <select class="form-option" ng-model="sumber_id" ng-options="pdpsosp.id as pdpsosp.name for pdpsosp in pengaduan_daftar_pengaduan_saran_opsi_sumber_pengaduan">
                                        <option value="">@{{ daftar_pengaduan_saran_edit_data.name }}</option>
                                    </select>
                                </div>
                            </div>  
                            <div class="tab-content-form">
                                <div class="content-form-label">Status Pengaduan</div>
                                <div class="content-form-input">
                                    <select class="form-option" ng-model="status_id" ng-options="pdpsop.sts_pesan_id as pdpsop.n_sts_pesan for pdpsop in pengaduan_daftar_pengaduan_saran_opsi_pengaduan">
                                        <option value="">@{{ daftar_pengaduan_saran_edit_data.n_sts_pesan }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Tanggal Peninjauan</div>
                                <div class="content-form-input"><input type="date" value="@{{ daftar_pengaduan_saran_edit_data.d_entry }}" /></div>
                            </div>
                        </div>
                    </div> <!--info pengaduan-->

                </div>
            </div>
        </div>

        <div class="modal-footer">
            
        </div>
    </div>
</div>
