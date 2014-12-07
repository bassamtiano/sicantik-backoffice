<form id="form_tambah" method="post" target="target_tambah" action="{{ URL::to('pelayanan/pendaftaran/permohonan_izin_baru/tambah') }}">
    <div class="modal" ng-show={{ $modal_name }}>

        <div class="modal-container large">
            <div class="modal-header update">
                <h2>Data Awal</h2><a class="button-close" href ng-click="close_modal('modal_tambah')">X</a>
            </div>
            <div class="modal-body">
                <div class="body-summary">
                    
                    <div class="summary-title">
                        <h3>Data Perizinan</h3>
                    </div>
                    <div class="body-summary-left">
                        <div class="tab-content-form">
                            
                            <div class="content-form-input"><input type="hidden" name="perizinan_id" value="@{{ permohonan_izin_baru_tambah_data.perizinan_id }}"/></div>
                        </div>
                        <div class="tab-content-form">
                            
                            <div class="content-form-input"><input type="hidden" name="jenis_permohonan_id" value="@{{ permohonan_izin_baru_tambah_data.jenis_permohonan_id }}"/></div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Nama Izin
                            </div>
                            <div class="summary-item-value">
                                @{{ permohonan_izin_baru_tambah_data.n_perizinan }}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Kelompok Izin
                            </div>
                            <div class="summary-item-value">
                                @{{ permohonan_izin_baru_tambah_data.n_kelompok }}
                            </div>
                        </div>
                    </div>
                    <div class="body-summary-right">
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Jenis Permohonan
                            </div>
                            <div class="summary-item-value" name="trjenis_permohonan_id">
                                @{{ permohonan_izin_baru_tambah_data.n_permohonan }}
                            </div>
                        </div>
                        <!-- <div class="summary-item">
                            <div class="summary-item-label">
                                No Pendaftaran
                            </div>
                            <div class="summary-item-value">
                                @{{ permohonan_izin_baru_edit_data.pendaftaran_id }}
                            </div>
                        </div> -->
                    </div>


                </div>

                <div class="body-tab-wrapper">
                    <div class="tab-nav">
                        <ul class="tab-nav-wrapper">
                            <li class="tab-nav-item enable" id="tab_nav_tambah_data_pemohon" ng-click="show_tab('tab.izin_baru_tab_data_pemohon', 'tab_nav_tambah_data_pemohon')">Data Pemohon</li>
                            <li class="tab-nav-item" id="tab_nav_tambah_data_perusahaan" ng-click="show_tab('tab.izin_baru_tab_data_perusahaan', 'tab_nav_tambah_data_perusahaan')">Data Perusahaan</li>
                            <li class="tab-nav-item" id="tab_nav_tambah_persyaratan" ng-click="show_tab('tab.izin_baru_tab_persyaratan', 'tab_nav_tambah_persyaratan')">Persyaratan</li>
                        <ul>
                    </div>
                    <div class="tab-content-wrapper">

                        <div class="tab-content" ng-show="tab.izin_baru_tab_data_pemohon">

                            <div class="tab-content-left">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Pendaftaran ID</div>
                                    <div class="content-form-input"><input type="text" name="pendaftaran_id" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Sumber Identitas</div>
                                    <div class="content-form-input">

                                    <select name="source" >
                                        <option ng-repeat="a in items"  ng-if="a.selected == true" selected ng-value="a.source" >@{{ a.Title }}</option>
                                        <option ng-repeat="a in items"  ng-if="a.selected == false" ng-value="a.source" >@{{ a.Title }}</option>
                                    </select>
                                    <!-- <select ng-model="entry_data_perizinan_data_awal_data.source" ng-options="item.Title for item in items track by item.ID"> -->
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">ID</div>
                                    <div class="content-form-input"><input type="text" name="no_referensi" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama Pemohon</div>
                                    <div class="content-form-input"><input type="text" name="n_pemohon" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">No Telp / HP</div>
                                    <div class="content-form-input"><input type="text" name="telp_pemohon" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Tanggal Terima Berkas</div>
                                    <div class="content-form-input"><input type="date" name="d_terima_berkas"/></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Tanggal Peninjauan</div>
                                    <div class="content-form-input"><input type="date" name="tanggal_peninjauan"/></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Lokasi Izin</div>
                                    <div class="content-form-input">
                                        <textarea rows="4" name="a_izin"></textarea>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Keterangan</div>
                                    <div class="content-form-input">
                                        <textarea rows="4" name="keterangan"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content-right">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Propinsi</div>
                                    <div class="content-form-input">
                                       <select name="propinsi_pemohon" ng-model="pemohon_propinsi_id" ng-options="prop.n_propinsi for prop in pemohon_propinsi_data track by prop.id">
                                            <option value="">Pilih Propinsi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kabupaten</div>
                                    <div class="content-form-input">
                                        <select name="kabupaten_pemohon" ng-model="pemohon_kabupaten_id" ng-options="kab.n_kabupaten for kab in pemohon_kabupaten_data track by kab.id">
                                            <option value="">Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kecamatan</div>
                                    <div class="content-form-input">
                                        <select name="kecamatan_pemohon" ng-model="pemohon_kecamatan_id" ng-options="kec.n_kecamatan for kec in pemohon_kecamatan_data track by kec.id">
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kelurahan</div>
                                    <div class="content-form-input">
                                        <select name="kelurahan_pemohon" ng-model="pemohon_kelurahan_id" ng-options="kel.n_kelurahan for kel in pemohon_kelurahan_data track by kel.id">
                                            <option value="">Pilih Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat Pemohon</div>
                                    <div class="content-form-input">
                                        <textarea rows="4" name="a_pemohon"></textarea>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat Pemohon di Luar Negeri (Isikan jika ada)</div>
                                    <div class="content-form-input">
                                        <textarea rows="4" name="a_pemohon_luar"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-content" ng-show="tab.izin_baru_tab_data_perusahaan">

                            <div class="tab-content-left">

                                <div class="tab-content-form">
                                    <div class="content-form-label">NPWP</div>
                                    <div class="content-form-input"><input type="text" name="npwp" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama Perusahaan</div>
                                    <div class="content-form-input"><input type="text" name="n_perusahaan" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Telp Perusahaan</div>
                                    <div class="content-form-input"><input type="text" name="telp_perusahaan" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Fax</div>
                                    <div class="content-form-input"><input type="text" name="fax_perusahaan" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Email</div>
                                    <div class="content-form-input"><input type="text" name="email_perusahaan" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Alamat Perusahaan</div>
                                    <div class="content-form-input">
                                        <textarea rows="4" name="a_perusahaan"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content-right">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Propinsi</div>
                                    <div class="content-form-input">
                                        <select name="propinsi_perusahaan" ng-model="perusahaan_propinsi_id" ng-options="prop.n_propinsi for prop in perusahaan_propinsi_data track by prop.id">
                                            <option value="">Pilih Propinsi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kabupaten</div>
                                    <div class="content-form-input">
                                        <select name="kabupaten_perusahaan" ng-model="perusahaan_kabupaten_id" ng-options="kab.n_kabupaten for kab in perusahaan_kabupaten_data track by kab.id">
                                            <option value="">Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kecamatan</div>
                                    <div class="content-form-input">
                                        <select name="kecamatan_perusahaan" ng-model="perusahaan_kecamatan_id" ng-options="kec.n_kecamatan for kec in perusahaan_kecamatan_data track by kec.id">
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Kelurahan</div>
                                    <div class="content-form-input">
                                        <select name="kelurahan_perusahaan" ng-model="perusahaan_kelurahan_id" ng-options="kel.n_kelurahan for kel in perusahaan_kelurahan_data track by kel.id">
                                            <option value="">Pilih Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                               <!--  <div class="tab-content-form">
                                    <div class="content-form-label">Jenis Kegiatan</div>
                                    <div class="content-form-input"><input type="text" name="n_kegiatan" value="" /></div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Jenis Investasi</div>
                                    <div class="content-form-input"><input type="text" name="n_investasi" value="" /></div>
                                </div> -->
                                
                            </div>

                        </div>

                        <div class="tab-content" ng-show="tab.izin_baru_tab_persyaratan">
                            <div class="tab-content-table">

                                <style>
                                    .c_modal_no {
                                        width:10%;
                                        text-align:center;
                                    }
                                    .c_modal_id_syarat{
                                        width::2%;
                                    }
                                    .c_modal_syarat {
                                        width:48%;
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
                                        <th class="c_modal_id_syarat" ></th>
                                        <th class="c_modal_syarat" >Syarat</th>
                                        <th class="c_modal_terpenuhi" >Terpenuhi</th>
                                        <th class="c_modal_status" >Status</th>
                                    </tr>

                                    <tr ng-repeat="syarat in permohonan_izin_baru_tambah_data.syarat">
                                        <td class="c_modal_no" >@{{$index+1}}</td>
                                        <td class="c_modal_id_syarat" >
                                           <!--  <input type="text" name="syarat_perizinan_id[]" value="@{{ syarat.id_persyaratan }}"/> -->
                                        </td>
                                        <td class="c_modal_syarat" >@{{ syarat.persyaratan }}</td>
                                        <td class="c_modal_terpenuhi" >
                                            <input type="checkbox" name="syarat_perizinan_id[]" ng-value="@{{ syarat.id_persyaratan }}" ng-model="syarat.id_persyaratan">
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
                    <input type="submit" value="Simpan" class="button-green" ng-click="modal_tambah_submit()"/>
                    <button class="button-red" href ng-click="close_modal('modal_tambah')">Keluar</button>
                </div>
            </div>

        </div>
        <iframe id="target_tambah" name="target_tambah" style="width:100; height:100; visibility:hidden; position:relative; background:#fff;">

        </iframe>
    </div>
</form>