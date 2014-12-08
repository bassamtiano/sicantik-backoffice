
    <div class="modal" ng-show={{ $modal_name }}>

        <form target="target_edit" id="form_edit" method="post" action="{{ URL::to('pelayanan/pendaftaran/daftar_ulang_izin/ubah') }}">

        <div class="modal-container large">
            <div class="modal-header update">
                <h2>Edit Daftar Ulang Izin</h2><a class="button-close" href ng-click="close_modal('modal_edit')">X</a>
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
                                @{{ daftar_ulang_izin_edit_data.n_perizinan }}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Kelompok Izin
                            </div>
                            <div class="summary-item-value">
                                @{{ daftar_ulang_izin_edit_data.n_kelompok }}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                No Pendaftaran
                            </div>
                            <div class="summary-item-value">
                                @{{ daftar_ulang_izin_edit_data.pendaftaran_id }}
                            </div>
                        </div>
                    </div>
                    <div class="body-summary-right">
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Jenis Permohonan
                            </div>
                            <div class="summary-item-value">
                                @{{ daftar_ulang_izin_edit_data.n_permohonan }}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Tanggal Daftar Ulang Izin
                            </div>
                            <div class="summary-item-value">
                                <input type="text" name="d_daful" data-provide="datepicker" class="tanggal_input" ng-model=" daftar_ulang_izin_edit_data.d_daftarulang " />
                                <!-- <input type="date" value="@{{ daftar_ulang_izin_edit_data.d_daftarulang }}" /> -->
                            </div>
                        </div>
                         <div class="summary-item">
                            <div class="summary-item-label">
                                No Surat Izin Lama
                            </div>
                            <div class="summary-item-value">
                                @{{ daftar_ulang_izin_edit_data.no_surat }}
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
                                <input type="hidden" name="id_permohonan" value="@{{ daftar_ulang_izin_edit_data.permohonan_id}}"> 
                                <input type="hidden" name="id_perusahaan" value="@{{ daftar_ulang_izin_edit_data.id_perusahaan}}">
                                <input type="hidden" name="id_pemohon" value="@{{ daftar_ulang_izin_edit_data.id_pemohon}}">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Sumber Identitas</div>
                                    <div class="content-form-input">@{{ daftar_ulang_izin_edit_data.sumber_identitas }}</div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">ID</div>
                                    <div class="content-form-input"><input name="nomor_ref" type="text" value="@{{ daftar_ulang_izin_edit_data.no_referensi }}" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama Pemohon</div>
                                    <div class="content-form-input"><input name="pemohon_n" type="text" value="@{{ daftar_ulang_izin_edit_data.n_pemohon }}" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">No Telp / HP</div>
                                    <div class="content-form-input"><input name="tel" type="text" value="@{{ daftar_ulang_izin_edit_data.telp_pemohon }}" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Tanggal Survey</div>
                                    <input type="text" name="d_sur" data-provide="datepicker" class="tanggal_input" ng-model=" daftar_ulang_izin_edit_data.d_survey  " />
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Lokasi Izin</div>
                                    <div class="content-form-input">
                                        <textarea name="lokasi" rows="4">@{{ daftar_ulang_izin_edit_data.a_izin }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Keterangan</div>
                                    <div class="content-form-input">
                                        <textarea name="ket" rows="4">@{{ daftar_ulang_izin_edit_data.keterangan }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content-right">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Propinsi</div>
                                    <div class="content-form-input">
                                        <select name="propinsi_pemohon" ng-model="prohon" ng-options="pmp.n_propinsi for pmp in portal_propinsi_pemohon_data track by pmp.id">
                                            <option selected value="">@{{ daftar_ulang_izin_edit_data.propinsi_pemohon }}</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kabupaten</div>
                                    <div class="content-form-input">
                                        <select name="kabupaten_pemohon" ng-model="kahon" ng-options="pkp.n_kabupaten for pkp in portal_kabupaten_pemohon_data track by pkp.id">
                                            <option selected value="">@{{ daftar_ulang_izin_edit_data.kabupaten_pemohon }}</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kecamatan</div>
                                    <div class="content-form-input">
                                        <select name="kecamatan_pemohon" ng-model="kecon" ng-options="pcp.n_kecamatan for pcp in portal_kecamatan_pemohon_data track by pcp.id">
                                            <option selected value="">@{{ daftar_ulang_izin_edit_data.kecamatan_pemohon }}</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kelurahan</div>
                                    <div class="content-form-input">
                                        <select name="kelurahan_pemohon" ng-model="kebon" ng-options="plp.n_kelurahan for plp in portal_kelurahan_pemohon_data track by plp.id">
                                            <option selected value="">@{{ daftar_ulang_izin_edit_data.kelurahan_pemohon }}</option>
                                        </select>
                                     
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat Pemohon</div>
                                    <div class="content-form-input">
                                        <textarea name="al_pemohon" rows="4">@{{ daftar_ulang_izin_edit_data.a_pemohon }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat Pemohon di Luar Negeri (Isikan jika ada)</div>
                                    <div class="content-form-input">
                                        <textarea name="al_pemohon_luar" rows="4">@{{ daftar_ulang_izin_edit_data.a_pemohon_luar }}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-content" ng-show="tab.data_awal_tab_data_perusahaan">
                            <div class="tab-content-left">
                                <input type="hidden" name="id_perusahaan" value="@{{ daftar_ulang_izin_edit_data.id_perusahaan }}">
                                <div class="tab-content-form">
                                    <div class="content-form-label">NPWP</div>
                                    <div class="content-form-input"><input name="per_npwp" type="text" value="@{{ daftar_ulang_izin_edit_data.npwp }}" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama Perusahaan</div>
                                    <div class="content-form-input"><input name="per_nama" type="text" value="@{{ daftar_ulang_izin_edit_data.nama_perusahaan }}" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Telp Perusahaan</div>
                                    <div class="content-form-input"><input name="per_tel" type="text" value="@{{ daftar_ulang_izin_edit_data.telp_perusahaan }}" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat Perusahaan</div>
                                    <div class="content-form-input">
                                        <textarea name="per_al" rows="4">@{{ daftar_ulang_izin_edit_data.alamat_perusahaan }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content-right">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Provinsi</div>
                                    <div class="content-form-input">
                                        <select name="per_propinsi" ng-model="prope" ng-options="pjp.n_propinsi for pjp in portal_propinsi_data track by pjp.id">
                                            <option selected value="">@{{daftar_ulang_izin_edit_data.propinsi_perusahaan}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kabupaten</div>
                                    <div class="content-form-input">
                                        <select name="per_kabupaten" ng-model="kabe" ng-options="kkp.n_kabupaten for kkp in portal_kabupaten_data track by kkp.id">
                                            <option selected value=""> @{{ daftar_ulang_izin_edit_data.kabupaten_perusahaan }}</option>
                                        </select>
                                       
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kecamatan</div>
                                    <div class="content-form-input">
                                        <select name="per_kecamatan" ng-model="kece" ng-options="kkc.n_kecamatan for kkc in portal_kecamatan_data track by kkc.id">
                                        <option selected value="">@{{ daftar_ulang_izin_edit_data.kecamatan_perusahaan }}</option>                                
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kelurahan</div>
                                    <div class="content-form-input">
                                        <select name="per_kelurahan" ng-model="kele" ng-options="kkl.n_kelurahan for kkl in portal_kelurahan_data track by kkl.id">
                                            <option selected value="">@{{ daftar_ulang_izin_edit_data.kelurahan_perusahaan }}</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Jenis Kegiatan</div>
                                    <div class="content-form-input">
                                        <select name="kegiatan" class="form-option" ng-model="kegiatan_id" ng-options="duiok.id as duiok.n_kegiatan for duiok in daftar_ulang_izin_opsi_kegiatan">
                                            <option value=""> @{{ daftar_ulang_izin_opsi_kegiatan.n_kegiatan }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Jenis Investasi</div>
                                    <div class="content-form-input">
                                        <select name="investasi" class="form-option" ng-model="investasi_id" ng-options="duioi.id as duioi.n_investasi for duioi in daftar_ulang_izin_opsi_investasi">
                                            <option value=""> @{{ daftar_ulang_izin_opsi_investasi.n_investasi }}</option>
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

                                    <tr ng-repeat="syarat in daftar_ulang_izin_edit_data.syarat">
                                        <td class="c_modal_no" >@{{$index+1}}</td>
                                        <td class="c_modal_syarat" >@{{ syarat.persyaratan }}</td>
                                        <td class="c_modal_terpenuhi" >
                                            <input type="checkbox" name="syarat_perizinan_id[]" ng-value="@{{ syarat.id_persyaratan }}" ng-model="syarat.terpenuhi">
                                        </td>
                                        <td class="c_modal_status" >@{{ syarat.status }}</td>
                                    </tr>
                                </table>
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
                    <button type="submit" class="button-green" ng-click="modal_data_daftar_ulang_ubah_submit()">Simpan</button>
                     <a class="btn button-red" href ng-click="close_modal('modal_edit')">Batal</a>
                </div>
            </div>
                
        </div>

        </form>

        <iframe id="target_edit" name="target_edit" style="visibility:hidden; width:100; height:100; background:#fff;"></iframe>
    </div>