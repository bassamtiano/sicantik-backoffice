<div class="modal" ng-show={{ $modal_name }}> 

    <div class="modal-container small">
        <div class="modal-header update">
            <h2>Tambah Provinsi</h2><a class="button-close" href ng-click="close_modal('modal_tambah')">x</a>
        </div>

        <form target="target_insert" method="post" action="{{ URL::to('konfigurasi/setting_wilayah/provinsi/insert') }}">

        <div class="modal-body">

            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                       <li class="tab-nav-item" id="tab_nav_tambah_propinsi" ng-click="show_tab('tab.data_awal_tab_persyaratan', 'tab_nav_tambah_propinsi')">Data Propinsi</li>
                    <ul>
                </div>
                <div class="tab-content-wrapper">
                    <div class="tab-content"> 

                        <div class="tab-content-left">
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Propinsi</div>
                                <div class="content-form-input"><input type="text" name="n_propinsi"></div>
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
                <input type="submit" value="Simpan" class="button-green" ng-click="close_modal('modal_tambah')"></button>
                <a class="btn button-red" ng-click="close_modal('modal_edit')" >Batal</a>
            </div>
        </div>

    </form>

        <iframe src="#" id="target_insert" name="target_insert" style="width:0; height:0; position:relative; background:#fff;"></iframe>

    </div>
</div>
