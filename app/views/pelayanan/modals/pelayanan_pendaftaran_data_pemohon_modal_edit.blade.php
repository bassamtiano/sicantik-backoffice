<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Data Awal</h2><a class="button-close" href ng-click="close_modal('modal_edit')">X</a>
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
                                <div class="content-form-input">@{{ data_pemohon_edit_data.source }}</div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">ID</div>
                                <div class="content-form-input"><input type="text" value="@{{ data_pemohon_edit_data.no_referensi }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Pemohon</div>
                                <div class="content-form-input"><input type="text" value="@{{ data_pemohon_edit_data.n_pemohon }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">No Telp / HP</div>
                                <div class="content-form-input"><input type="text" value="@{{ data_pemohon_edit_data.telp_pemohon }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Propinsi</div>

                                <!-- <div class="content-form-input">@{{ entry_data_perizinan_data_awal_data.propinsi_pemohon }}</div> -->
                                <div class="content-form-input">
                                    <!-- @{{ entry_data_perizinan_data_awal_data.propinsi_pemohon }} -->
                                    <select name="propinsi_pemohon">
                                        <option ng-repeat="oprop_pemohon in opsi_prop_pemohon"  ng-if="oprop_pemohon.selected == true" selected value="@{{ oprop_pemohon.id }}" >@{{ oprop_pemohon.n_propinsi }}</option>
                                        <option ng-repeat="oprop_pemohon in opsi_prop_pemohon"  ng-if="oprop_pemohon.selected == false" value="@{{ oprop_pemohon.id }}" >@{{ oprop_pemohon.n_propinsi }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kabupaten</div>
                                <div class="content-form-input">
                                    <!-- @{{ entry_data_perizinan_data_awal_data.kabupaten_pemohon }} -->
                                    <select name="source" >
                                        <option ng-repeat="okab_pemohon in opsi_kab_pemohon"  ng-if="okab_pemohon.selected == true" selected value="@{{ okab_pemohon.id }}" >@{{ okab_pemohon.n_kabupaten }}</option>
                                        <option ng-repeat="okab_pemohon in opsi_kab_pemohon"  ng-if="okab_pemohon.selected == false" value="@{{ okab_pemohon.id }}" >@{{ okab_pemohon.n_kabupaten }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kecamatan</div>
                                <div class="content-form-input">
                                    <!-- @{{ entry_data_perizinan_data_awal_data.kecamatan_pemohon }} -->
                                    <select name="source" >
                                        <option ng-repeat="okec_pemohon in opsi_kec_pemohon"  ng-if="okec_pemohon.selected == true" selected value="@{{ okec_pemohon.id }}" >@{{ okec_pemohon.n_kecamatan }}</option>
                                        <option ng-repeat="okec_pemohon in opsi_kec_pemohon"  ng-if="okec_pemohon.selected == false" value="@{{ okec_pemohon.id }}" >@{{ okec_pemohon.n_kecamatan }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kelurahan</div>
                                <div class="content-form-input">
                                    <!-- @{{ entry_data_perizinan_data_awal_data.kelurahan_pemohon }} -->
                                    <select name="source" >
                                        <option ng-repeat="okel_pemohon in opsi_kel_pemohon"  ng-if="okel_pemohon.selected == true" selected value="@{{ okel_pemohon.id }}" >@{{ okel_pemohon.n_kelurahan }}</option>
                                        <option ng-repeat="okel_pemohon in opsi_kel_pemohon"  ng-if="okel_pemohon.selected == false" value="@{{ okel_pemohon.id }}" >@{{ okel_pemohon.n_kelurahan }}</option>
                                    </select>
                                </div>
                            </div>        
                           <!--  <div class="tab-content-form">
                                <div class="content-form-label">Propinsi</div>
                                <div class="content-form-input">
                                    @{{ data_pemohon_edit_data.propinsi_pemohon }}
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kabupaten</div>
                                <div class="content-form-input">
                                    @{{ data_pemohon_edit_data.kabupaten_pemohon }}
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kecamatan</div>
                                <div class="content-form-input">
                                    @{{ data_pemohon_edit_data.kecamatan_pemohon }}
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kelurahan</div>
                                <div class="content-form-input">
                                    @{{ data_pemohon_edit_data.kelurahan_pemohon }}
                                </div>
                            </div> -->
                        </div>
                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Pemohon</div>
                                <div class="content-form-input">
                                    <textarea rows="4">@{{ data_pemohon_edit_data.a_pemohon }}</textarea>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Pemohon di Luar Negeri (Isikan jika ada)</div>
                                <div class="content-form-input">
                                    <textarea rows="4">@{{ data_pemohon_edit_data.a_pemohon_luar }}</textarea>
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
                <button type="submit" class="button-green" >Simpan</button>
                <button class="button-red" href ng-click="close_modal('modal_edit')" >Batal</button>
            </div>
        </div>

    </div>
</div>
