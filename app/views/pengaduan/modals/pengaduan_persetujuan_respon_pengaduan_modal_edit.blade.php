<form method="post" target="target_edit" action="{{ URL::to('pengaduan/persetujuan_respon_pengaduan/edit') }}">
    <div class="modal" ng-show={{ $modal_name }}>

        <input type="hidden" value="@{{ persetujuan_respon_pengaduan_edit_data.id }}" name="tmpesan_id">

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
                                @{{ persetujuan_respon_pengaduan_edit_data.e_pesan}} , [@{{ (persetujuan_respon_pengaduan_edit_data.d_entry) }}] 
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
                                        <select class="form-option" name="c_skpd_tindaklanjut" ng-model="unitkerja_id" ng-options="pprpod.n_unitkerja for pprpod in pengaduan_persetujuan_respon_pengaduan_opsi_dinas track by pprpod.n_unitkerja">
                                            <option value="">Ditunjukan untuk</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Disetujui</div>
                                    <div class="content-form-input">
                                        <!-- <input type="text" value="@{{ persetujuan_respon_pengaduan_edit_data.c_sts_setuju}}" /> -->
                                        <input type="radio" name="c_sts_setuju" value="Ya">
                                            Ya
                                        <input type="radio" name="c_sts_setuju" value="Tidak" checked>
                                            Tidak
                                    </div>
                                </div>
                            </div>
                        </div> <!--isi biodata-->
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
            <!-- <iframe src="#" id="target_edit" name="target_edit" style="width:0; height:0; visibility:hidden; position:relative; background:#fff;"></iframe> -->
        </div>
    </div>
</form>