<div class="modal" ng-show={{ $modal_name }}>

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
                                <div class="content-form-input"><input type="text" value="@{{ entry_hasil_tinjauan_edit_data.nama_perusahaan }}"/></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Perusahaan / Perorangan</div>
                                <div class="content-form-input"><input type="text" value="@{{ entry_hasil_tinjauan_edit_data.alamat_perusahaan_perorangan }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Penanggung Jawab</div>
                                <div class="content-form-input"><input type="text" value="@{{ entry_hasil_tinjauan_edit_data.nama_penanggung_jawab }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Penanggung Jawab</div>
                                <div class="content-form-input"><input type="text" value="@{{ entry_hasil_tinjauan_edit_data.alamat_penanggung_jawab }}" /></div>
                            </div>

                        </div>
                        <div class="tab-content-right">

                            <div class="tab-content-form">
                                <div class="content-form-label">Jenis Usaha</div>
                                <div class="content-form-input">
                                    <input type="text" value="@{{ entry_hasil_tinjauan_edit_data.jenis_usaha }}" />
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Pemilik</div>
                                <div class="content-form-input">
                                    <input type="text" value="@{{ entry_hasil_tinjauan_edit_data.nama_pemilik }}" />
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Letak Usaha</div>
                                <div class="content-form-input">
                                    <input type="text" value="@{{ entry_hasil_tinjauan_edit_data.letak_usaha }}" />
                                </div>
                            </div>

                        </div>

                        <div class="tab-content-title">
                            Data Teknis
                        </div>

                        <div class="tab-content-left">

                            <div class="tab-content-form">
                                <div class="content-form-label">Tenaga Kerja (Orang)</div>
                                <div class="content-form-input"><input type="text" value="@{{ entry_hasil_tinjauan_edit_data.tenaga_kerja_orang }}"/></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Luas Ruang Tempat Usaha</div>
                                <div class="content-form-input"><input type="text" value="@{{ entry_hasil_tinjauan_edit_data.luas_ruang_tempat_usaha }}" /></div>
                            </div>

                        </div>
                        <div class="tab-content-right">

                            <div class="tab-content-form">
                                <div class="content-form-label">Indeks Gangguan</div>
                                <div class="content-form-input">
                                    <input type="text" value="@{{ entry_hasil_tinjauan_edit_data.indeks_gangguan }}" />
                                </div>
                            </div>

                        </div>

                        <div class="tab-content-title">
                            Data Retribusi
                        </div>

                        <div class="tab-content-left">

                            <div class="tab-content-form">
                                <div class="content-form-label">Nilai Retribusi</div>
                                <div class="content-form-input"><input type="text" value="@{{ entry_hasil_tinjauan_edit_data.nilai_retribusi }}"/></div>
                            </div>

                        </div>
                        <div class="tab-content-right">



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
                <button type="submit" class="button-red" >Simpan</button>
                <button type="submit" class="button-yellow" >Batal</button>
            </div>
        </div>

        <!-- Iframe for post -->
        <iframe src="#" id="target_post" name="target_frame" style="width:0; height:0; position:relative; background:#fff;"></iframe>

    </div>
</div>
