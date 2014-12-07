<form method="post" target="target_edit" action="{{ URL::to('pengaduan/daftar_pengaduan_saran/edit') }}">
    <div class="modal" ng-show={{ $modal_name }}>

        <input type="hidden" value="@{{ daftar_pengaduan_saran_edit_data.id }}" name="tmpesan_id">

        <div class="modal-container large">
            <div class="modal-header update">
                <h2>Edit Pengaduan</h2><a class="button-close" href ng-click="close_modal('modal_edit')">X</a>
            </div>
            <div class="modal-body">
                <div class="body-tab-wrapper">
                    <div class="tab-nav">
                        <ul class="tab-nav-wrapper">
                            <li class="tab-nav-item enable" id="tab_edit_nav_isi_biodata" ng-click="show_tab('tab.tambah_data_tab_isi_biodata', 'tab_edit_nav_isi_biodata')">Isi Biodata</li>
                            <li class="tab-nav-item" id="tab_edit_nav_pesan_pengaduan" ng-click="show_tab('tab.tambah_data_tab_pesan_pengaduan', 'tab_edit_nav_pesan_pengaduan')">Pesan Pengaduan</li>
                            <li class="tab-nav-item" id="tab_edit_nav_info_pengaduan" ng-click="show_tab('tab.tambah_data_tab_info_pengaduan', 'tab_edit_nav_info_pengaduan')">Informasi Pengaduan</li>
                        </ul>
                    </div>
                    <div class="tab-content-wrapper">
                        <div class="tab-content" ng-show="tab.tambah_data_tab_isi_biodata">
                            <div class="tab-content-left">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama</div>
                                    <div class="content-form-input">
                                        <input type="text" name="nama" value="@{{ daftar_pengaduan_saran_edit_data.nama }}" />
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat Email</div>
                                    <div class="content-form-input">
                                        <input type="text" name="email" value="@{{ daftar_pengaduan_saran_edit_data.email }}" />
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">No Telp</div>
                                    <div class="content-form-input">
                                        <input type="text" name="telp" value="@{{ daftar_pengaduan_saran_edit_data.telp }}" />
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat</div>
                                    <div class="content-form-input">
                                        <textarea class="form-control" rows="4" cols="15" name="alamat" placeholder="Alamat">@{{ daftar_pengaduan_saran_edit_data.alamat }}</textarea>
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
                                        <select name="propinsi" ng-model="propinsi_id" ng-options="prop.n_propinsi for prop in propinsi_data track by prop.id">
                                            <option  value="" ng-model="daftar_pengaduan_saran_edit_data.propinsi_id">@{{ daftar_pengaduan_saran_edit_data.n_propinsi }}</option>
                                            <!-- <option ng-repeat="oprop_pemohon in opsi_prop_pemohon"  ng-if="oprop_pemohon.selected == false" ng-value="oprop_pemohon.id">@{{ permohonan_izin_baru_edit_data.n_propinsi_pemohon }}</option> -->
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
                                            <option  value="" ng-model="daftar_pengaduan_saran_edit_data.kabupaten_id">@{{ daftar_pengaduan_saran_edit_data.n_kabupaten }}</option>
                                            <!-- <option ng-repeat="oprop_pemohon in opsi_prop_pemohon"  ng-if="oprop_pemohon.selected == false" ng-value="oprop_pemohon.id">@{{ permohonan_izin_baru_edit_data.n_propinsi_pemohon }}</option> -->
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
                                            <option value="" ng-model="daftar_pengaduan_saran_edit_data.kecamatan_id">@{{ daftar_pengaduan_saran_edit_data.n_kecamatan }}</option>
                                            <!-- <option ng-repeat="oprop_pemohon in opsi_prop_pemohon"  ng-if="oprop_pemohon.selected == false" ng-value="oprop_pemohon.id">@{{ permohonan_izin_baru_edit_data.n_propinsi_pemohon }}</option> -->
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
                                            <option value="" ng-model="daftar_pengaduan_saran_edit_data.kelurahan_id">@{{ daftar_pengaduan_saran_edit_data.n_kelurahan }}</option>
                                            <!-- <option ng-repeat="oprop_pemohon in opsi_prop_pemohon"  ng-if="oprop_pemohon.selected == false" ng-value="oprop_pemohon.id">@{{ permohonan_izin_baru_edit_data.n_propinsi_pemohon }}</option> -->
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
                                        <textarea disabled class="form-control" rows="4" cols="15" name="e_pesan" placeholder="Pesan Pengaduan">@{{ daftar_pengaduan_saran_edit_data.e_pesan }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Tanggal Penulisan Pesan</div>
                                    <div class="content-form-input">
                                        <input type="date" name="d_entry" value="@{{ daftar_pengaduan_saran_edit_data.d_entry }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content-right">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Koreksi Pesan</div>
                                    <div class="content-form-input">
                                        <textarea class="form-control" rows="4" cols="15" name="e_pesan_koreksi" placeholder="Koreksi Pesan Pengaduan">@{{ daftar_pengaduan_saran_edit_data.e_pesan_koreksi }}</textarea>
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
                                            <option value="">@{{ daftar_pengaduan_saran_edit_data.name }}</option>
                                        </select>
                                    </div>
                                </div>  
                                <div class="tab-content-form">
                                    <div class="content-form-label">Status Pengaduan</div>
                                    <div class="content-form-input">
                                        <select class="form-option" name="status_pesan_pengaduan" ng-model="status_id" ng-options="pdpsop.n_sts_pesan for pdpsop in pengaduan_daftar_pengaduan_saran_opsi_pengaduan track by pdpsop.id">
                                            <option value="">@{{ daftar_pengaduan_saran_edit_data.n_sts_pesan }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Tindak Lanjut</div>
                                    <div class="content-form-input">
                                        <!-- <select name="sumber_identitas" >
                                            <option ng-repeat="a in items"  ng-if="a.selected == true" selected ng-value="a.source" >@{{ permohonan_izin_baru_edit_data.sumber_identitas }}</option>
                                            <option ng-repeat="a in items"  ng-if="a.selected == false" ng-value="a.source" >@{{ a.Title }}</option>
                                        </select> -->
                                        <input type="radio" name="c_tindak_lanjut" value="Ya" checked>
                                            Ya
                                        <input type="radio" name="c_tindak_lanjut" value="Tidak">
                                            Tidak
                                    </div>
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
                    <input type="submit" value="Simpan" class="button-green" ng-click="modal_edit_submit('modal_edit')"/>
                    <a class="btn button-red" ng-click="close_modal('modal_edit')">Batal</a>
                    <!-- <button type="submit" class="button-yellow" >Batal</button> -->
                </div>
            </div>
            <iframe src="#" id="target_edit" name="target_edit" style="width:0; height:0; visibility:hidden; position:relative; background:#fff;"></iframe>
        </div>
    </div>
</form>