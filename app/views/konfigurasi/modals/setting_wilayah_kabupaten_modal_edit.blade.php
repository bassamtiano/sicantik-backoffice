<div class="modal" ng-show={{ $modal_name }}> 

    <div class="modal-container small">
        <div class="modal-header update">
            <h2>Edit Kabupaten</h2><a class="button-close" href ng-click="close_modal('modal_edit')">x</a>
        </div>
        <div class="modal-body">
            
            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                       <li class="tab-nav-item" id="tab_nav_edit_kabupaten" ng-click="show_tab('tab.data_awal_tab_persyaratan', 'tab_nav_edit_kabupaten')">Data Kabupaten</li>
                    <ul>
                </div>
                <div class="tab-content-wrapper">

                    <div class="tab-content"> 

                        <div class="tab-content-left">

                            <div class="tab-content-form">
                                <div class="content-form-label">Propinsi</div>
                                <div class="content-form-input">
                                    <select name="propinsi">
                                        <option ng-repeat="oprop in opsi_prop"  ng-if="oprop.selected == true" selected value="@{{ oprop.id }}" >@{{ oprop.n_propinsi }}</option>
                                        <option ng-repeat="oprop in opsi_prop"  ng-if="oprop.selected == false" value="@{{ oprop.id }}" >@{{ oprop.n_propinsi }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Kabupaten</div>
                                <div class="content-form-input"><input type="text" value="@{{ kabupaten_edit_data.n_kabupaten }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Ibu Kota</div>
                                <div class="content-form-input"><input type="text" value="@{{ kabupaten_edit_data.ibukota }}" /></div>
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
                <input type="submit" value="Simpan" class="button-red" ng-click="close_modal('modal_edit')"></button>
                <a class="btn button-red" ng-click="close_modal('modal_edit')" >Batal</a>
            </div>
        </div>

    </div>
</div>
