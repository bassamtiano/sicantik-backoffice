<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Edit Pesan</h2><a class="button-close" href ng-click="close_modal('modal_edit')">X</a>
        </div>
        <div class="modal-body">
             <div class="body-summary">
                
                <div class="summary-title">
                    <h3>Data Perizinan</h3>
                </div>
                <div class="body-summary-left">
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Nama
                        </div>
                        <div class="summary-item-value">
                            @{{ persetujuan_respon_pengaduan_edit_data.nama }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Alamat
                        </div>
                        <div class="summary-item-value">
                            @{{ persetujuan_respon_pengaduan_edit_data.alamat }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Kelurahan
                        </div>
                        <div class="summary-item-value">
                            @{{ persetujuan_respon_pengaduan_edit_data.kelurahan }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Kecamatan
                        </div>
                        <div class="summary-item-value">
                            @{{ persetujuan_respon_pengaduan_edit_data.kecamatan}}
                        </div>
                    </div>
                </div>
                <div class="body-summary-right">
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Isi Pesan
                        </div>
                        <div class="summary-item-value">
                            @{{ persetujuan_respon_pengaduan_edit_data.e_pesan}}  [@{{ (persetujuan_respon_pengaduan_edit_data.d_entry) }}] 
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Koreksi Pesan
                        </div>
                        <div class="summary-item-value">
                            @{{ persetujuan_respon_pengaduan_edit_data.e_pesan_koreksi}}
                        </div>
                    </div>
                </div>


            </div>
            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                        <li class="tab-nav-item enable" id="tab_nav_data_pengirim" ng-click="show_tab('tab.edit_data_tab_data_pengirim', 'tab_nav_data_pengirim')">Respon Persetujuan Pengaduan</li>
                    </ul>
                </div>
                <div class="tab-content-wrapper">
                    <div class="tab-content" ng-show="tab.edit_data_tab_data_pengirim">
                        <div class="tab-content-left">
                            <div class="tab-content-form">
                                <div class="content-form-label">Ditunjukan untuk</div>
                                <div class="content-form-input">
                                    <select class="form-option" ng-model="unitkerja_id" ng-options="pprpod.id as pprpod.n_unitkerja for pprpod in pengaduan_persetujuan_respon_pengaduan_opsi_dinas">
                                        <option value="">Ditunjukan untuk</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Disetujui</div>
                                <div class="content-form-input">
                                    <!-- <input type="text" value="@{{ persetujuan_respon_pengaduan_edit_data.c_sts_setuju}}" /> -->
                                    <input type="radio" name="status" id="status" value="" checked>
                                        Ya
                                    <input type="radio" name="status" id="status" value="" checked>
                                        Tidak
                                </div>
                            </div>
                        </div>
                    </div> <!--isi biodata-->
                </div>
            </div>
        </div>

        <div class="modal-footer">
            
        </div>
    </div>
</div>
