<form method="post" target="target_edit" action="{{ URL::to('pengaduan/pengiriman_respon_pengaduan/edit') }}">
    <div class="modal" ng-show={{ $modal_name }}>

        <input type="hidden" value="@{{ pengiriman_respon_pengaduan_edit_data.id }}" name="tmpesan_id">

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
                                @{{ pengiriman_respon_pengaduan_edit_data.nama }}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Alamat
                            </div>
                            <div class="summary-item-value">
                                @{{ pengiriman_respon_pengaduan_edit_data.alamat }}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Kelurahan
                            </div>
                            <div class="summary-item-value">
                                @{{ pengiriman_respon_pengaduan_edit_data.kelurahan }}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Kecamatan
                            </div>
                            <div class="summary-item-value">
                                @{{ pengiriman_respon_pengaduan_edit_data.kecamatan}}
                            </div>
                        </div>
                    </div>
                    <div class="body-summary-right">
                        <div class="summary-item">
                            <div class="summary-item-label">
                                No Telp / HP
                            </div>
                            <div class="summary-item-value">
                                @{{ pengiriman_respon_pengaduan_edit_data.telp}}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Tindak Lanjut
                            </div>
                            <div class="summary-item-value">
                                @{{ pengiriman_respon_pengaduan_edit_data.c_tindak_lanjut}}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Tanggal Pengiriman Pesan
                            </div>
                            <div class="summary-item-value">
                                @{{ pengiriman_respon_pengaduan_edit_data.d_entry}}
                            </div>
                        </div>
                    </div>


                </div>
                <div class="body-tab-wrapper">
                    <div class="tab-nav">
                        <ul class="tab-nav-wrapper">
                            <li class="tab-nav-item enable" id="tab_nav_pesan_pengaduan" ng-click="show_tab('tab.edit_data_tab_pesan_pengaduan', 'tab_nav_pesan_pengaduan')">Pesan Pengaduan</li>
                            <li class="tab-nav-item" id="tab_nav_detail_tindak_lanjut" ng-click="show_tab('tab.edit_data_tab_detail_tindak_lanjut', 'tab_nav_detail_tindak_lanjut')">Detail Tindak Lanjut</li>
                            <li class="tab-nav-item" id="tab_nav_respon_pengaduan" ng-click="show_tab('tab.edit_data_tab_respon_pengaduan', 'tab_nav_respon_pengaduan')">Respon Pengaduan</li>
                        </ul>
                    </div>
                    <div class="tab-content-wrapper">
                        <div class="tab-content" ng-show="tab.edit_data_tab_pesan_pengaduan">
                            <div class="tab-content-left">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Pesan Pengaduan</div>
                                    <div class="content-form-input">
                                        <textarea class="form-control" rows="4" cols="15" id="pesan" name="pesan" placeholder="Pesan Pengaduan">@{{ pengiriman_respon_pengaduan_edit_data.e_pesan }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content-right">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Koreksi Pesan Pengaduan</div>
                                    <div class="content-form-input">
                                        <textarea class="form-control" rows="4" cols="15" id="koreksi" name="koreksi" placeholder="Koreksi Pesan Pengaduan">@{{ pengiriman_respon_pengaduan_edit_data.e_pesan_koreksi }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div> <!--pesan pengaduan-->
                        <div class="tab-content" ng-show="tab.edit_data_tab_detail_tindak_lanjut">
                            <div class="tab-content-left">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Dinas</div>
                                    <div class="content-form-input">
                                        <input type="text" name="c_skpd_tindaklanjut" value="@{{ pengiriman_respon_pengaduan_edit_data.c_skpd_tindaklanjut }}" />
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Tanggal</div>
                                    <div class="content-form-input">
                                        <input type="date" name="d_tindak_lanjut" value="@{{ pengiriman_respon_pengaduan_edit_data.d_tindak_lanjut }}" />
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Tanggal Tindak Lanjut Selesai</div>
                                    <div class="content-form-input">
                                        <input type="date" name="d_tindaklanjut_selesai" value="@{{ pengiriman_respon_pengaduan_edit_data.d_tindaklanjut_selesai }}" />
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama Penanggung Jawab</div>
                                    <div class="content-form-input">
                                        <input type="text" name="nama_penanggungjawab" value="@{{ pengiriman_respon_pengaduan_edit_data.nama_penanggungjawab }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" ng-show="tab.edit_data_tab_respon_pengaduan">
                            <div class="tab-content-left">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Isi Balasan Pengaduan</div>
                                    <div class="content-form-input">
                                        <textarea class="form-control" rows="4" cols="15" name="e_tindak_lanjut" placeholder="Isi Balasan Pengaduan">@{{ pengiriman_respon_pengaduan_edit_data.e_tindak_lanjut }}</textarea>
                                    </div>
                                </div>
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
                    <input type="submit" value="Simpan" class="button-green" ng-click="modal_edit_submit('modal_edit')"/>
                    <a class="btn button-red" ng-click="close_modal('modal_edit')">Batal</a>
                    <!-- <button type="submit" class="button-yellow" >Batal</button> -->
                </div>
            </div>
            <!-- <iframe src="#" id="target_edit" name="target_edit" style="width:0; height:0; visibility:hidden; position:relative; background:#fff;"></iframe> -->
        </div>
    </div>
</form>