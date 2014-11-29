<div class="modal" ng-show={{ $modal_name }}> 

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Edit Kelurahan</h2><a class="button-close" href ng-click="close_modal('modal_edit')">x</a>
        </div>
        <div class="modal-body">
            
            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                       <li class="tab-nav-item" id="tab_nav_edit_kelurahan" ng-click="show_tab('tab.data_awal_tab_persyaratan', 'tab_nav_edit_kelurahan')">Data Kelurahan</li>
                    <ul>
                </div>
                <div class="tab-content-wrapper">

                    <div class="tab-content"> 

                        <div class="tab-content-left">

                            <div class="tab-content-form">
                                <div class="content-form-label">Provinsi</div>
                                    <select name="propinsi">
                                        <option ng-repeat="oprop in opsi_prop"  ng-if="oprop.selected == true" selected value="@{{ oprop.id }}" >@{{ oprop.n_propinsi }}</option>
                                        <option ng-repeat="oprop in opsi_prop"  ng-if="oprop.selected == false" value="@{{ oprop.id }}" >@{{ oprop.n_propinsi }}</option>
                                    </select>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kabupaten</div>
                                    <select name="kabupaten">
                                        <option ng-repeat="okab in opsi_kab"  ng-if="okab.selected == true" selected value="@{{ okab.id }}" >@{{ okab.n_kabupaten }}</option>
                                        <option ng-repeat="okab in opsi_kab"  ng-if="okab.selected == false" value="@{{ okab.id }}" >@{{ okab.n_kabupaten }}</option>
                                    </select>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kecamatan</div>
                                    <select name="kecamatan">
                                        <option ng-repeat="okec in opsi_kec"  ng-if="okec.selected == true" selected value="@{{ okec.id }}" >@{{ okec.n_kecamatan }}</option>
                                        <option ng-repeat="okec in opsi_kec"  ng-if="okec.selected == false" value="@{{ okec.id }}" >@{{ okec.n_kecamatan }}</option>
                                    </select>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Kelurahan</div>
                                <div class="content-form-input"><input type="text" value="@{{ kelurahan_edit_data.n_kelurahan }}" /></div>
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
                <a class="btn button-red" ng-click="close_modal('modal_edit')" >Batal</a>
            </div>
        </div>

    </div>
</div>
