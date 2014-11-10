<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Data Awal</h2><a class="button-close" href ng-click="close_modal('modal_edit')">X</a>
        </div>
        <div class="modal-body">
            <div class="body-summary">
                
                <div class="summary-title">
                    <h3>Data Perizinan</h3>
                </div>
                <div class="body-summary-left">
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Nama Izin
                        </div>
                        <div class="summary-item-value">
                            @{{ perpanjangan_izin_edit_data.n_perizinan }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Kelompok Izin
                        </div>
                        <div class="summary-item-value">
                            @{{ perpanjangan_izin_edit_data.n_kelompok }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            No Pendaftaran
                        </div>
                        <div class="summary-item-value">
                            @{{ perpanjangan_izin_edit_data.pendaftaran_id }}
                        </div>
                    </div>
                </div>
                <div class="body-summary-right">
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Jenis Permohonan
                        </div>
                        <div class="summary-item-value">
                            @{{ perpanjangan_izin_edit_data.n_permohonan }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Tanggal Perpanjangan Izin
                        </div>
                        <div class="summary-item-value">
                            <input type="date" value="@{{ perpanjangan_izin_edit_data.d_perpanjangan }}" />
                        </div>
                    </div>
                     <div class="summary-item">
                        <div class="summary-item-label">
                            No Surat Izin Lama
                        </div>
                        <div class="summary-item-value">
                            @{{ perpanjangan_izin_edit_data.no_surat }}
                        </div>
                    </div>
                </div>


            </div>

            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                        <li class="tab-nav-item enable" id="tab_nav_data_pemohon" ng-click="show_tab('tab.data_awal_tab_data_pemohon', 'tab_nav_data_pemohon')">Data Pemohon</li>
                        <li class="tab-nav-item" id="tab_nav_data_perusahaan" ng-click="show_tab('tab.data_awal_tab_data_perusahaan', 'tab_nav_data_perusahaan')">Data Perusahaan</li>
                        <li class="tab-nav-item" id="tab_nav_persyaratan" ng-click="show_tab('tab.data_awal_tab_persyaratan', 'tab_nav_persyaratan')">Persyaratan</li>
                    <ul>
                </div>
                <div class="tab-content-wrapper">

                    <div class="tab-content" ng-show="tab.data_awal_tab_data_pemohon">

                        <div class="tab-content-left">
                            <div class="tab-content-form">
                                <div class="content-form-label">Sumber Identitas</div>
                                <div class="content-form-input">@{{ perpanjangan_izin_edit_data.sumber_identitas }}</div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">ID</div>
                                <div class="content-form-input"><input type="text" value="@{{ perpanjangan_izin_edit_data.no_referensi }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Pemohon</div>
                                <div class="content-form-input"><input type="text" value="@{{ perpanjangan_izin_edit_data.n_pemohon }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">No Telp / HP</div>
                                <div class="content-form-input"><input type="text" value="@{{ perpanjangan_izin_edit_data.telp_pemohon }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Tanggal Survey</div>
                                <div class="content-form-input"><input type="text" value="@{{ perpanjangan_izin_edit_data.d_survey }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Lokasi Izin</div>
                                <div class="content-form-input">
                                    <textarea rows="4">@{{ perpanjangan_izin_edit_data.a_izin }}</textarea>
                                </div>
                            </div>
                             <div class="tab-content-form">
                                <div class="content-form-label">Keterangan</div>
                                <div class="content-form-input">
                                    <textarea rows="4">@{{ perubahan_izin_edit_data.keterangan }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Propinsi</div>
                                <div class="content-form-input">
                                    @{{ perpanjangan_izin_edit_data.propinsi_pemohon }}
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kabupaten</div>
                                <div class="content-form-input">
                                    @{{ perpanjangan_izin_edit_data.kabupaten_pemohon }}
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kecamatan</div>
                                <div class="content-form-input">
                                    @{{ perpanjangan_izin_edit_data.kecamatan_pemohon }}
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kelurahan</div>
                                <div class="content-form-input">
                                    @{{ perpanjangan_izin_edit_data.kelurahan_pemohon }}
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Pemohon</div>
                                <div class="content-form-input">
                                    <textarea rows="4">@{{ perpanjangan_izin_edit_data.a_pemohon }}</textarea>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Pemohon di Luar Negeri (Isikan jika ada)</div>
                                <div class="content-form-input">
                                    <textarea rows="4">@{{ perpanjangan_izin_edit_data.a_pemohon_luar }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-content" ng-show="tab.data_awal_tab_data_perusahaan">

                        <div class="tab-content-left">

                            <div class="tab-content-form">
                                <div class="content-form-label">NPWP</div>
                                <div class="content-form-input">@{{ perpanjangan_izin_edit_data.npwp }}</div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Perusahaan</div>
                                <div class="content-form-input"><input type="text" value="@{{ perpanjangan_izin_edit_data.nama_perusahaan }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Telp Perusahaan</div>
                                <div class="content-form-input"><input type="text" value="@{{ perpanjangan_izin_edit_data.telp_perusahaan }}" /></div>
                            </div>
                            <!-- <div class="tab-content-form">
                                <div class="content-form-label">Fax</div>
                                <div class="content-form-input"><input type="text" value="@{{ perpanjangan_izin_edit_data.fax_perusahaan }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Email</div>
                                <div class="content-form-input"><input type="text" value="@{{ perpanjangan_izin_edit_data.email_perusahaan }}" /></div>
                            </div> -->
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Perusahaan</div>
                                <div class="content-form-input">
                                    <textarea rows="4">@{{ perpanjangan_izin_edit_data.alamat_perusahaan }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Propinsi</div>
                                <div class="content-form-input">
                                    @{{ perpanjangan_izin_edit_data.propinsi_perusahaan }}
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kabupaten</div>
                                <div class="content-form-input">
                                    @{{ perpanjangan_izin_edit_data.kabupaten_perusahaan }}
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kecamatan</div>
                                <div class="content-form-input">
                                    @{{ perpanjangan_izin_edit_data.kecamatan_perusahaan }}
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kelurahan</div>
                                <div class="content-form-input">
                                    @{{ perpanjangan_izin_edit_data.kelurahan_perusahaan }}
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Jenis Kegiatan</div>
                                <div class="content-form-input">
                                    <select class="form-option" ng-model="kegiatan_id" ng-options="piok.id as piok.n_kegiatan for piok in perpanjangan_izin_opsi_kegiatan">
                                        <option value=""> @{{ perpanjangan_izin_edit_data.n_kegiatan }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Jenis Investasi</div>
                                <div class="content-form-input">
                                    <select class="form-option" ng-model="investasi_id" ng-options="pioi.id as pioi.n_investasi for pioi in perpanjangan_izin_opsi_investasi">
                                        <option value=""> @{{ perpanjangan_izin_edit_data.n_investasi }}</option>
                                    </select>
                                </div>
                            </div>  
                        </div>

                    </div>

                    <div class="tab-content" ng-show="tab.data_awal_tab_persyaratan">
                        <div class="tab-content-table">

                            <style>
                                .c_modal_no {
                                    width:10%;
                                    text-align:center;
                                }
                                .c_modal_syarat {
                                    width:50%;
                                }
                                .c_modal_terpenuhi {
                                    width:20%;
                                    text-align:center;
                                }
                                .c_modal_status {
                                    width:25%;
                                    text-align:center;

                                    font-family:roboto_condensed_regular;
                                }
                            </style>

                            <table>
                                <tr class="table-legend">
                                    <th class="c_modal_no" >No</th>
                                    <th class="c_modal_syarat" >Syarat</th>
                                    <th class="c_modal_terpenuhi" >Terpenuhi</th>
                                    <th class="c_modal_status" >Status</th>
                                </tr>

                                <tr ng-repeat="syarat in perpanjangan_izin_edit_data.syarat">
                                    <td class="c_modal_no" >@{{$index+1}}</td>
                                    <td class="c_modal_syarat" >@{{ syarat.persyaratan }}</td>
                                    <td class="c_modal_terpenuhi" >
                                        <input type="checkbox" ng-model="syarat.terpenuhi">
                                    </td>
                                    <td class="c_modal_status" >@{{ syarat.status }}</td>
                                </tr>
                            </table>
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

    </div>
</div>
