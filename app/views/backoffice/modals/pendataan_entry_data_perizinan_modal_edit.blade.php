<div class="modal" ng-show={{ $modal_name }}>

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
                                <div class="content-form-input"><input type="text" name="" value="@{{ entry_data_perizinan_edit_data.nama_perusahaan }}" placeholder="Nama Perusahaan" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Perusahaan / Perorangan</div>
                                <div class="content-form-input"><input type="text" name="" value="@{{ entry_data_perizinan_edit_data.alamat_perusahaan_perorangan }}" placeholder="Alamat Perusahaan / Perorangan" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Penanggung Jawab</div>
                                <div class="content-form-input"><input type="text" name="" value="@{{ entry_data_perizinan_edit_data.nama_penanggung_jawab }}" placeholder="Nama Penanggung Jawab" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Penanggung Jawab</div>
                                <div class="content-form-input"><input type="text" name="" value="@{{ entry_data_perizinan_edit_data.alamat_penanggung_jawab }}" placeholder="Alamat Penanggung Jawab" /></div>
                            </div>
                        </div>
                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Jenis Usaha</div>
                                <div class="content-form-input"><input type="text" name="" value="@{{ entry_data_perizinan_edit_data.jenis_usaha }}" placeholder="Jenis Usaha" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Pemilik</div>
                                <div class="content-form-input"><input type="text" name="" value="@{{ entry_data_perizinan_edit_data.nama_pemilik }}" placeholder="Nama Pemilik" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Letak Usaha</div>
                                <div class="content-form-input"><input type="text" name="" value="@{{ entry_data_perizinan_edit_data.letak_usaha }}" placeholder="Letak Usaha" /></div>
                            </div>
                        </div>

                        <div class="tab-content-title">
                            Data Teknis
                        </div>
                        <div class="tab-content-left">
                            <div class="tab-content-form">
                                <div class="content-form-label">Tenaga Kerja (Orang)</div>
                                <div class="content-form-input"><input type="text" name="" value="@{{ entry_data_perizinan_edit_data.tenaga_kerja_orang }}" placeholder="Tenaga Kerja (Orang)" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Luas Ruang Tempat Usaha</div>
                                <div class="content-form-input"><input type="text" name="" value="@{{ entry_data_perizinan_edit_data.luas_ruang_tempat_usaha }}" placeholder="Luas Ruang Tempat Usaha" /></div>
                            </div>
                        </div>
                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Indeks Gangguan</div>
                                <div class="content-form-input"><input type="text" name="" value="@{{ entry_data_perizinan_edit_data.indeks_gangguan }}" placeholder="Indeks Gangguan" /></div>
                            </div>
                        </div>

                        <div class="tab-content-title">
                            Data Retribusi
                        </div>
                        <div class="tab-content-left">
                            <div class="tab-content-form">
                                <div class="content-form-label">Nilai Retribusi</div>
                                <div class="content-form-input"><input type="text" name="" value="@{{ entry_data_perizinan_edit_data.nilai_retribusi }}" placeholder="Nilai Retribusi" /></div>
                            </div>
                        </div>
                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Rumus Perhitungan</div>
                                <div class="content-form-input"><input type="text" name="" value="@{{ entry_data_perizinan_edit_data.rumus_perhitungan }}" placeholder="Rumus Perhitungan" /></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            as
        </div>

        <!-- Iframe for post -->
        <iframe src="#" id="target_post" name="target_frame" style="width:0; height:0; position:relative; background:#fff;"></iframe>

    </div>
</div>
