<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container small">

        <div class="modal-header update">
            <h2>Rincian Pembayaran Retribusi</h2><a class="button-close" href ng-click="close_modal('modal_rincian')">x</a>
        </div>
        <div class="modal-body">

            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                        <li class="tab-nav-item enable" id="tab_nav_data_pemohon" ng-click="show_tab('tab.data_pemohon', 'tab_nav_data_pemohon')">Data Pemohon</li>
                    <ul>
                </div>
                <div class="tab-content-wrapper">

                    <div class="tab-content" ng-show="tab.data_pemohon">

                        <div class="tab-content-left">

                            <div class="tab-content-form">
                                <div class="content-form-label">No Pendaftaran</div>
                                <div class="content-form-input"><input type="text" value="@{{ pembayaran_retribusi_rincian_data.pendaftaran_id }}"/></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Pemohon</div>
                                <div class="content-form-input"><input type="text" value="@{{ pembayaran_retribusi_rincian_data.n_pemohon }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">No Surat</div>
                                <div class="content-form-input"><input type="text" value="@{{ pembayaran_retribusi_rincian_data.no_surat }}" /></div>
                            </div>

                        </div>
                        <div class="tab-content-right">

                            <div class="tab-content-form">
                                <div class="content-form-label">Jenis Perizinan</div>
                                <div class="content-form-input">
                                    <input type="text" value="@{{ pembayaran_retribusi_rincian_data.n_perizinan }}" />@{{ entry_data_perizinan_data_awal_data.propinsi_pemohon }}
                                </div>
                            </div>

                            <div class="tab-content-form">
                                <div class="content-form-label">Biaya Retribusi</div>
                                <div class="content-form-input">
                                    <input type="text" value="@{{ pembayaran_retribusi_rincian_data.nilai_retribusi }}" />@{{ entry_data_perizinan_data_awal_data.kabupaten_pemohon }}
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
                <button type="submit" class="button-red" >Cetak</button>
                <button type="submit" class="button-yellow" >Batal</button>
            </div>
        </div>

    </div>
</div>
