<div class="modal" ng-show={{ $modal_name }}>
    <form method="post" action="{{ URL::to('pelayanan/pendaftaran/data_perusahaan/ubah') }}">

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Data Awal</h2><a class="button-close" href ng-click="close_modal('modal_edit')">X</a>
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
    <input type="hidden" name="id_perusahaan" value="@{{ data_perusahaan_edit_data.id }}">
                            <div class="tab-content-form">
                                <div class="content-form-label">Nomor Registrasi</div>
                                <div class="content-form-input"><input name="no_reg" type="text" value="@{{ data_perusahaan_edit_data.no_reg_perusahaan}}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">NPWP</div>
                                <div class="content-form-input"><input name="i_npwp" type="text" value="@{{ data_perusahaan_edit_data.npwp}}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Perusahaan</div>
                                <div class="content-form-input"><input name="perusahaan" type="text" value="@{{ data_perusahaan_edit_data.n_perusahaan}}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nomor Telepon</div>
                                <div class="content-form-input"><input name="tel" type="text" value="@{{ data_perusahaan_edit_data.i_telp_perusahaan}}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Perusahaan</div>
                                <div class="content-form-input">
                                    <textarea rows="4" name="al_perusahaan">@{{ data_perusahaan_edit_data.a_perusahaan}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Propinsi</div>
                                <div class="content-form-input">
                                    <select name="propinsi" ng-model="prope" ng-options="pjp.n_propinsi for pjp in portal_propinsi_data track by pjp.id">
                                        <option selected value="@{{ data_perusahaan_edit_data.perusahaan_propinsi }}">@{{ data_perusahaan_edit_data.n_propinsi }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kabupaten</div>
                                <div class="content-form-input">
                                    <select name="kabupaten" ng-model="kabe" ng-options="kkp.n_kabupaten for kkp in portal_kabupaten_data track by kkp.id">
                                        <option selected value="@{{ data_perusahaan_edit_data.perusahaan_kabupaten }}">@{{ data_perusahaan_edit_data.n_kabupaten }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kecamatan</div>
                                <div class="content-form-input">
                                    <select name="kecamatan" ng-model="kece" ng-options="kkc.n_kecamatan for kkc in portal_kecamatan_data track by kkc.id">
                                    <option selected value="@{{ data_perusahaan_edit_data.perusahaan_kecamatan }}">@{{ data_perusahaan_edit_data.n_kecamatan }}</option>
<!--                                         <option ng-repeat="okec in opsi_kecer"  ng-if="okec.selected == true" selected value="@{{ okec.id }}" >@{{ okec.n_kecamatan }}</option>
                                        <option ng-repeat="okec in opsi_kecer"  ng-if="okec.selected == false" value="@{{ okec.id }}" >@{{ okec.n_kecamatan }}</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kelurahan</div>
                                <div class="content-form-input">
                                    <select name="kelurahan" ng-model="kele" ng-options="kkl.n_kelurahan for kkl in portal_kelurahan_data track by kkl.id">
                                        <option selected value="@{{ data_perusahaan_edit_data.perusahaan_kelurahan }}">@{{ data_perusahaan_edit_data.n_kelurahan }}</option>
                                        <!--  <option ng-repeat="okel in opsi_keler"  ng-if="okel.selected == true" selected value="@{{ okel.id }}" >@{{ okel.n_kelurahan }}</option>
                                        <option ng-repeat="okel in opsi_keler"  ng-if="okel.selected == false" value="@{{ okel.id }}" >@{{ oke.n_kelurahan }}</option>
 -->                                    </select>
                                </div>
                            </div>



                            <div class="tab-content-form">
                                <div class="content-form-label">Jenis Kegiatan</div>
                                <div class="content-form-input">
                                    <select name="kegiatan" class="form-option" ng-model="kegiatan_id" ng-options="dpok.n_kegiatan for dpok in data_perusahaan_opsi_kegiatan track by dpok.id">
                                        <option value=""> @{{ data_perusahaan_edit_data.n_kegiatan }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Jenis Investasi</div>
                                <div class="content-form-input">
                                    <select name="investasi" class="form-option" ng-model="investasi_id" ng-options="dpoi.n_investasi for dpoi in data_perusahaan_opsi_investasi track by dpoi.id">
                                        <option value=""> @{{ data_perusahaan_edit_data.n_investasi }}</option>
                                    </select>
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
                <a class="btn button-red" href ng-click="close_modal('modal_edit')">Batal</a>
            </div>
        </div>

        </div>
    </form>
 <iframe id="target_post" name="target_edit" style="visibility:hidden; width:100; height:100; background:#fff;"></iframe> 
</div>
