<div class="modal" ng-show={{ $modal_name }}>

<form target="target_edit" method="post" action="{{ URL::to('backoffice/pendataan/entry_data_perizinan/edit') }}">
<!-- <form method="post" action="{{ URL::to('backoffice/pendataan/entry_data_perizinan/edit') }}"> -->

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Edit</h2><a class="button-close" href ng-click="close_modal('modal_edit')">x</a>
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
                            @{{ entry_data_perizinan_edit_data.pendaftaran_id }}   @{{ entry_data_perizinan_edit_data.id }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Nama Pemohon
                        </div>
                        <div class="summary-item-value">
                            @{{ entry_data_perizinan_edit_data.n_pemohon }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Alamat
                        </div>
                        <div class="summary-item-value">
                            @{{ entry_data_perizinan_edit_data.a_pemohon }}
                        </div>
                    </div>
                </div>
                <div class="body-summary-right">
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Jenis Izin
                        </div>
                        <div class="summary-item-value">
                            @{{ entry_data_perizinan_edit_data.n_perizinan }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Lokasi Izin
                        </div>
                        <div class="summary-item-value">
                            @{{ entry_data_perizinan_edit_data.a_izin }}
                        </div>
                    </div>
                </div>

            </div>
            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                        <li class="tab-nav-item enable" id="tab_nav_data_entry" ng-click="show_tab('tab.edit_tab_data_entry', 'tab_nav_data_entry')">Data Entry</li>
                    <ul>
                </div>
                <div class="tab-content-wrapper">
                    <div class="tab-content" ng-show="tab.edit_tab_data_entry">
                        <div class="tab-content-title">
                            Data Perusahaan
                        </div>
                        <div class="tab-content-left">
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Perusahaan</div>
                                <div class="content-form-input">
                                    <input type="text" name="property_perizinan[]" ng-model="entry_data_perizinan_edit_data.nama_perusahaan" placeholder="Nama Perusahaan" />
                                    <!-- <input type="text" name="id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.nama_perusahaan_id"/> -->
                                    <input type="text" style="display:none" name="id_property_perizinan[]" value="16"/>
                                    <input type="text" style="display:none" name="old_id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.nama_perusahaan_old_id"/>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Perusahaan / Perorangan</div>
                                <div class="content-form-input">
                                    <input type="text" name="property_perizinan[]" ng-model="entry_data_perizinan_edit_data.alamat_perusahaan_perorangan" placeholder="Alamat Perusahaan / Perorangan" />
                                    <!-- <input type="text" name="id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.alamat_perusahaan_perorangan_id" /> -->
                                    <input type="text" style="display:none" name="id_property_perizinan[]" value="17" />
                                    <input type="text" style="display:none" name="old_id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.alamat_perusahaan_perorangan_old_id" />
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Penanggung Jawab</div>
                                <div class="content-form-input">
                                    <input type="text" name="property_perizinan[]" ng-model="entry_data_perizinan_edit_data.nama_penanggung_jawab" placeholder="Nama Penanggung Jawab" />
                                    <!-- <input type="text" name="id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.nama_penanggung_jawab_id"/> -->
                                    <input type="text" style="display:none" name="id_property_perizinan[]" value="18" />
                                    <input type="text" style="display:none" name="old_id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.nama_penanggung_jawab_old_id"/>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Penanggung Jawab</div>
                                <div class="content-form-input">
                                    <input type="text" name="property_perizinan[]" ng-model="entry_data_perizinan_edit_data.alamat_penanggung_jawab" placeholder="Alamat Penanggung Jawab" />
                                    <!-- <input type="text" name="id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.alamat_penanggung_jawab_id" /> -->
                                    <input type="text" style="display:none" name="id_property_perizinan[]" value="128" />
                                    <input type="text" style="display:none" name="old_id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.alamat_penanggung_jawab_old_id" />
                                </div>
                            </div>
                        </div>
                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Jenis Usaha</div>
                                <div class="content-form-input">
                                    <input type="text" name="property_perizinan[]" ng-model="entry_data_perizinan_edit_data.jenis_usaha" placeholder="Jenis Usaha" />
                                    <!-- <input type="text" name="id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.jenis_usaha_id"/> -->
                                    <input type="text" style="display:none" name="id_property_perizinan[]" value="20" />
                                    <input type="text" style="display:none" name="old_id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.jenis_usaha_old_id"/>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Pemilik</div>
                                <div class="content-form-input">
                                    <input type="text" name="property_perizinan[]" ng-model="entry_data_perizinan_edit_data.nama_pemilik" placeholder="Nama Pemilik" />
                                    <!-- <input type="text" name="id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.nama_pemilik_id"/> -->
                                    <input type="text" style="display:none" name="id_property_perizinan[]" value="21" />
                                    <input type="text" style="display:none" name="old_id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.nama_pemilik_old_id"/>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Letak Usaha</div>
                                <div class="content-form-input">
                                    <input type="text" name="property_perizinan[]" ng-model="entry_data_perizinan_edit_data.letak_usaha" placeholder="Letak Usaha" />
                                    <!-- <input type="text" name="id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.letak_usaha_id"/> -->
                                    <input type="text" style="display:none" name="id_property_perizinan[]" value="22" />
                                    <input type="text" style="display:none" name="old_id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.letak_usaha_old_id"/>
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
                                    <input type="text" name="property_perizinan[]" ng-model="entry_data_perizinan_edit_data.tenaga_kerja_orang" placeholder="Tenaga Kerja (Orang)" />
                                    <!-- <input type="text" name="id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.tenaga_kerja_orang_id" /> -->
                                    <input type="text" style="display:none" name="id_property_perizinan[]" value="24" />
                                    <input type="text" style="display:none" name="old_id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.tenaga_kerja_orang_old_id" />
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Luas Ruang Tempat Usaha</div>
                                <div class="content-form-input">
                                    <input type="text" name="property_perizinan[]" ng-model="entry_data_perizinan_edit_data.luas_ruang_tempat_usaha" placeholder="Luas Ruang Tempat Usaha" />
                                    <!-- <input type="text" name="id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.luas_ruang_tempat_usaha_id"/> -->
                                    <input type="text" style="display:none" name="id_property_perizinan[]" value="25" />
                                    <input type="text" style="display:none" name="old_id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.luas_ruang_tempat_usaha_old_id"/>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Indeks Gangguan</div>
                                <div class="content-form-input">
                                    <input type="text" name="property_perizinan[]" ng-model="entry_data_perizinan_edit_data.indeks_gangguan" placeholder="Indeks Gangguan" />
                                    <!-- <input type="text" name="id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.indeks_gangguan_id"/> -->
                                    <input type="text" style="display:none" name="id_property_perizinan[]" value="26" />
                                    <input type="text" style="display:none" name="old_id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.indeks_gangguan_old_id"/>
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
                                    <input type="text" name="property_perizinan[]" ng-model="entry_data_perizinan_edit_data.nilai_retribusi" placeholder="Nilai Retribusi" />
                                    <!-- <input type="text" name="id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.nilai_retribusi_id"/> -->
                                    <input type="text" style="display:none" name="id_property_perizinan[]" value="45" />
                                    <input type="text" style="display:none" name="old_id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.nilai_retribusi_old_id"/>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Rumus Perhitungan</div>
                                <div class="content-form-input">
                                    <input type="text" name="property_perizinan[]" ng-model="entry_data_perizinan_edit_data.rumus_perhitungan" placeholder="Rumus Perhitungan" />
                                    <!-- <input type="text" name="id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.rumus_perhitungan_id"/> -->
                                    <input type="text" style="display:none" name="id_property_perizinan[]" value="414" />
                                    <input type="text" style="display:none" name="old_id_property_perizinan[]" ng-model="entry_data_perizinan_edit_data.rumus_perhitungan_old_id"/>
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
                <input type="submit" value="Simpan" class="btn button-green" ng-click="modal_edit_submit()">
                <a class="btn button-red" ng-click="close_modal('modal_edit')">Batal</a>
            </div>
        </div>

        <!-- Iframe for post -->


    </div>

</form>

<iframe id="target_edit" name="target_edit" style="width:100; height:100; visibility:hidden; background:#fff;"></iframe>

</div>
