<div class="modal" ng-show={{ $modal_name }}>

    <form method="post" target="target_edit" action="{{ URL::to('backoffice/tim_teknis/entry_hasil_tinjauan/edit') }}">

        <div class="modal-container large">

            <div class="modal-header update">
                <h2>Edit Tinjauan Lapangan</h2><a class="button-close" href ng-click="close_modal('modal_edit')">x</a>
            </div>
            <div class="modal-body">

                <div class="body-summary">



                    <div class="summary-title">
                        <h3>Data Permohonan</h3>
                    </div>
                    <div class="body-summary-left">
                        <div class="summary-item">
                            <div class="summary-item-label">
                                No Pendaftaran
                            </div>
                            <div class="summary-item-value">
                                @{{ entry_hasil_tinjauan_edit_data.pendaftaran_id }}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Nama Pemohon
                            </div>
                            <div class="summary-item-value">
                                @{{ entry_hasil_tinjauan_edit_data.n_pemohon }}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Alamat
                            </div>
                            <div class="summary-item-value">
                                @{{ entry_hasil_tinjauan_edit_data.a_pemohon }}
                            </div>
                        </div>
                    </div>
                    <div class="body-summary-right">
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Jenis Izin
                            </div>
                            <div class="summary-item-value">
                                @{{ entry_hasil_tinjauan_edit_data.n_perizinan }}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Lokasi Izin
                            </div>
                            <div class="summary-item-value">
                                @{{ entry_hasil_tinjauan_edit_data.a_izin }}
                            </div>
                        </div>
                    </div>

                </div>


                <div class="body-tab-wrapper">
                    <div class="tab-nav">
                        <ul class="tab-nav-wrapper">
                            <li class="tab-nav-item enable" id="tab_nav_entry_tinjauan_lapangan" ng-click="show_tab('tab.entry_tinjauan_lapangan', 'tab_nav_entry_tinjauan_lapangan')">Entry Tinjauan Lapangan</li>
                        <ul>
                    </div>
                    <div class="tab-content-wrapper">

                        <div class="tab-content" ng-show="tab.entry_tinjauan_lapangan">

                            <div class="tab-content-title">
                                Data Perusahaan
                            </div>

                            <div class="tab-content-left">

                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama Perusahaan</div>
                                    <div class="content-form-input">
                                        <input type="text" name="property_value[]" ng-model=" entry_hasil_tinjauan_edit_data.nama_perusahaan "/>
                                        <input type="text" style="display:none" name="jenis_id[]" ng-model=" entry_hasil_tinjauan_edit_data.nama_perusahaan_property "/>
                                        <input type="text" style="display:none" name="property_id[]" ng-model=" entry_hasil_tinjauan_edit_data.nama_perusahaan_id "/>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat Perusahaan / Perorangan</div>
                                    <div class="content-form-input">
                                        <input type="text" name="property_value[]" ng-model=" entry_hasil_tinjauan_edit_data.alamat_perusahaan_perorangan " />
                                        <input type="text" style="display:none" name="jenis_id[]" ng-model=" entry_hasil_tinjauan_edit_data.alamat_perusahaan_perorangan_property " />
                                        <input type="text" style="display:none" name="property_id[]" ng-model=" entry_hasil_tinjauan_edit_data.alamat_perusahaan_perorangan_id " />
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama Penanggung Jawab</div>
                                    <div class="content-form-input">
                                        <input type="text" name="property_value[]" ng-model=" entry_hasil_tinjauan_edit_data.nama_penanggung_jawab " />
                                        <input type="text" style="display:none" name="jenis_id[]" ng-model=" entry_hasil_tinjauan_edit_data.nama_penanggung_jawab_property " />
                                        <input type="text" style="display:none" name="property_id[]" ng-model=" entry_hasil_tinjauan_edit_data.nama_penanggung_jawab_id " />
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat Penanggung Jawab</div>
                                    <div class="content-form-input">
                                        <input type="text" name="property_value[]" ng-model=" entry_hasil_tinjauan_edit_data.alamat_penanggung_jawab " />
                                        <input type="text" style="display:none" name="jenis_id[]" ng-model=" entry_hasil_tinjauan_edit_data.alamat_penanggung_jawab_property " />
                                        <input type="text" style="display:none" name="property_id[]" ng-model=" entry_hasil_tinjauan_edit_data.alamat_penanggung_jawab_id " />
                                    </div>
                                </div>

                            </div>
                            <div class="tab-content-right">

                                <div class="tab-content-form">
                                    <div class="content-form-label">Jenis Usaha</div>
                                    <div class="content-form-input">
                                        <input type="text" name="property_value[]" ng-model=" entry_hasil_tinjauan_edit_data.jenis_usaha " />
                                        <input type="text" style="display:none" name="jenis_id[]" ng-model=" entry_hasil_tinjauan_edit_data.jenis_usaha_property " />
                                        <input type="text" style="display:none" name="property_id[]" ng-model=" entry_hasil_tinjauan_edit_data.jenis_usaha_id " />
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama Pemilik</div>
                                    <div class="content-form-input">
                                        <input type="text" name="property_value[]" ng-model=" entry_hasil_tinjauan_edit_data.nama_pemilik " />
                                        <input type="text" style="display:none" name="jenis_id[]" ng-model=" entry_hasil_tinjauan_edit_data.nama_pemilik_property " />
                                        <input type="text" style="display:none" name="property_id[]" ng-model=" entry_hasil_tinjauan_edit_data.nama_pemilik_id " />
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Letak Usaha</div>
                                    <div class="content-form-input">
                                        <input type="text" name="property_value[]" ng-model=" entry_hasil_tinjauan_edit_data.letak_usaha " />
                                        <input type="text" style="display:none" name="jenis_id[]" ng-model=" entry_hasil_tinjauan_edit_data.letak_usaha_property " />
                                        <input type="text" style="display:none" name="property_id[]" ng-model=" entry_hasil_tinjauan_edit_data.letak_usaha_id " />
                                    </div>
                                </div>

                            </div>

                            <div class="tab-content-title">
                                Data Teknis
                            </div>

                            <div class="tab-content-left">

                                <div class="tab-content-form">
                                    <div class="content-form-label">Tenaga Kerja (Orang)</div>
                                    <div class="content-form-input">
                                        <input type="text" name="property_value[]" ng-model=" entry_hasil_tinjauan_edit_data.tenaga_kerja_orang "/>
                                        <input type="text" style="display:none" name="jenis_id[]" ng-model=" entry_hasil_tinjauan_edit_data.tenaga_kerja_orang_property "/>
                                        <input type="text" style="display:none" name="property_id[]" ng-model=" entry_hasil_tinjauan_edit_data.tenaga_kerja_orang_id "/>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Luas Ruang Tempat Usaha</div>
                                    <div class="content-form-input">
                                        <input type="text" name="property_value[]" ng-model=" entry_hasil_tinjauan_edit_data.luas_ruang_tempat_usaha " />
                                        <input type="text" style="display:none" name="jenis_id[]" ng-model=" entry_hasil_tinjauan_edit_data.luas_ruang_tempat_usaha_property " />
                                        <input type="text" style="display:none" name="property_id[]" ng-model=" entry_hasil_tinjauan_edit_data.luas_ruang_tempat_usaha_id " />
                                    </div>
                                </div>

                            </div>
                            <div class="tab-content-right">

                                <div class="tab-content-form">
                                    <div class="content-form-label">Indeks Gangguan</div>
                                    <div class="content-form-input">
                                        <input type="text" name="property_value[]" ng-model=" entry_hasil_tinjauan_edit_data.indeks_gangguan " />
                                        <input type="text" style="display:none" name="jenis_id[]" ng-model=" entry_hasil_tinjauan_edit_data.indeks_gangguan_property " />
                                        <input type="text" style="display:none" name="property_id[]" ng-model=" entry_hasil_tinjauan_edit_data.indeks_gangguan_id " />
                                    </div>
                                </div>

                            </div>

                            <div class="tab-content-title">
                                Data Retribusi
                            </div>

                            <div class="tab-content-left">

                                <div class="tab-content-form">
                                    <div class="content-form-label">Nilai Retribusi</div>
                                    <div class="content-form-input">
                                        <input type="text" name="property_value[]" ng-model=" entry_hasil_tinjauan_edit_data.nilai_retribusi "/>
                                        <input type="text" style="display:none" name="jenis_id[]" ng-model=" entry_hasil_tinjauan_edit_data.nilai_retribusi_property "/>
                                        <input type="text" style="display:none" name="property_id[]" ng-model=" entry_hasil_tinjauan_edit_data.nilai_retribusi_id "/>
                                    </div>
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
                    <input type="submit" class="btn button-green" value="Simpan" ng-click="modal_edit_submit()"/>
                    <a type="submit" class="btn button-red" ng-click="close_modal('modal_edit')">Batal</a>
                </div>
            </div>

        </div>

    </form>

    <iframe id="target_edit" name="target_edit" style="width:100; height:100; visibility:hidden; position:relative; background:#fff;"></iframe>
</div>
