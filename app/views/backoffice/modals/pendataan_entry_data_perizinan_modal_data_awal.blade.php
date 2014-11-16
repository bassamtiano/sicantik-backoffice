<form id="form_data_awal" method="post" target="target_edit" action="{{ URL::to('backoffice/pendataan/entry_data_perizinan/data_awal') }}">
<!-- <form id="form_data_awal" method="post" action="{{ URL::to('backoffice/pendataan/entry_data_perizinan/data_awal') }}"> -->


<input type="hidden" name="id" value="@{{ entry_data_perizinan_data_awal_data.id }}">

<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Data Awal</h2><a class="button-close" href ng-click="close_modal('modal_data_awal')">x</a>
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
                            @{{ entry_data_perizinan_data_awal_data.n_perizinan }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Kelompok Izin
                        </div>
                        <div class="summary-item-value">
                            @{{ entry_data_perizinan_data_awal_data.n_kelompok }}
                        </div>
                    </div>
                </div>
                <div class="body-summary-right">
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Jenis Permohonan
                        </div>
                        <div class="summary-item-value">
                            @{{ entry_data_perizinan_data_awal_data.n_permohonan }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            No Pendaftaran
                        </div>
                        <div class="summary-item-value">
                            @{{ entry_data_perizinan_data_awal_data.pendaftaran_id }}
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
                                <div class="content-form-input">

                                    <select name="source" >
                                        <option ng-repeat="a in items"  ng-if="a.selected == true" selected value="@{{ a.source }}" >@{{ a.Title }}</option>
                                        <option ng-repeat="a in items"  ng-if="a.selected == false" value="@{{ a.source }}" >@{{ a.Title }}</option>
                                    </select>
                                    <!-- <select ng-model="entry_data_perizinan_data_awal_data.source" ng-options="item.Title for item in items track by item.ID"> -->
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">ID</div>
                                <div class="content-form-input"><input type="text" name="no_referensi" value="@{{ entry_data_perizinan_data_awal_data.no_referensi }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Pemohon</div>
                                <div class="content-form-input"><input type="text" name="n_pemohon" value="@{{ entry_data_perizinan_data_awal_data.n_pemohon }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">No Telp / HP</div>
                                <div class="content-form-input"><input type="text" name="telp_pemohon" value="@{{ entry_data_perizinan_data_awal_data.telp_pemohon }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Tanggal Terima Berkas</div>
                                <div class="content-form-input"><input type="text" name="d_terima_berkas" value="@{{ entry_data_perizinan_data_awal_data.d_terima_berkas }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Tanggal Peninjauan</div>
                                <div class="content-form-input"><input type="text" name="d_survey" value="@{{ entry_data_perizinan_data_awal_data.d_survey }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Lokasi Izin</div>
                                <div class="content-form-input">
                                    <textarea name="a_izin" rows="4">@{{ entry_data_perizinan_data_awal_data.a_izin }}</textarea>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Keterangan</div>
                                <div class="content-form-input">
                                    <textarea name="keterangan" rows="4">@{{ entry_data_perizinan_data_awal_data.keterangan }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Propinsi</div>

                                <!-- <div class="content-form-input">@{{ entry_data_perizinan_data_awal_data.propinsi_pemohon }}</div> -->
                                <div class="content-form-input">
                                    <!-- @{{ entry_data_perizinan_data_awal_data.propinsi_pemohon }} -->
                                    <select name="propinsi_pemohon">
                                        <option ng-repeat="oprop_pemohon in opsi_prop_pemohon"  ng-if="oprop_pemohon.selected == true" selected value="@{{ oprop_pemohon.id }}" >@{{ oprop_pemohon.n_propinsi }}</option>
                                        <option ng-repeat="oprop_pemohon in opsi_prop_pemohon"  ng-if="oprop_pemohon.selected == false" value="@{{ oprop_pemohon.id }}" >@{{ oprop_pemohon.n_propinsi }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kabupaten</div>
                                <div class="content-form-input">
                                    <!-- @{{ entry_data_perizinan_data_awal_data.kabupaten_pemohon }} -->
                                    <select name="kabupaten_pemohon" >
                                        <option ng-repeat="okab_pemohon in opsi_kab_pemohon"  ng-if="okab_pemohon.selected == true" selected value="@{{ okab_pemohon.id }}" >@{{ okab_pemohon.n_kabupaten }}</option>
                                        <option ng-repeat="okab_pemohon in opsi_kab_pemohon"  ng-if="okab_pemohon.selected == false" value="@{{ okab_pemohon.id }}" >@{{ okab_pemohon.n_kabupaten }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kecamatan</div>
                                <div class="content-form-input">
                                    <!-- @{{ entry_data_perizinan_data_awal_data.kecamatan_pemohon }} -->
                                    <select name="kecamatan_pemohon" >
                                        <option ng-repeat="okec_pemohon in opsi_kec_pemohon"  ng-if="okec_pemohon.selected == true" selected value="@{{ okec_pemohon.id }}" >@{{ okec_pemohon.n_kecamatan }}</option>
                                        <option ng-repeat="okec_pemohon in opsi_kec_pemohon"  ng-if="okec_pemohon.selected == false" value="@{{ okec_pemohon.id }}" >@{{ okec_pemohon.n_kecamatan }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kelurahan</div>
                                <div class="content-form-input">
                                    <!-- @{{ entry_data_perizinan_data_awal_data.kelurahan_pemohon }} -->
                                    <select name="kelurahan_pemohon" >
                                        <option ng-repeat="okel_pemohon in opsi_kel_pemohon"  ng-if="okel_pemohon.selected == true" selected value="@{{ okel_pemohon.id }}" >@{{ okel_pemohon.n_kelurahan }}</option>
                                        <option ng-repeat="okel_pemohon in opsi_kel_pemohon"  ng-if="okel_pemohon.selected == false" value="@{{ okel_pemohon.id }}" >@{{ okel_pemohon.n_kelurahan }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Pemohon</div>
                                <div class="content-form-input">
                                    <textarea rows="4" name="alamat_pemohon">@{{ entry_data_perizinan_data_awal_data.a_pemohon }}</textarea>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Pemohon di Luar Negeri (Isikan jika ada)</div>
                                <div class="content-form-input">
                                    <textarea rows="4" name="alamat_luar_pemohon">@{{ entry_data_perizinan_data_awal_data.a_pemohon_luar }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-content" ng-show="tab.data_awal_tab_data_perusahaan">

                        <div class="tab-content-left">

                            <div class="tab-content-form">
                                <div class="content-form-label">NPWP</div>
                                <div class="content-form-input"><input type="text" name="npwp" value="@{{ entry_data_perizinan_data_awal_data.npwp }}"></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Perusahaan</div>
                                <div class="content-form-input"><input type="text" name="n_perusahaan" value="@{{ entry_data_perizinan_data_awal_data.nama_perusahaan }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Telp Perusahaan</div>
                                <div class="content-form-input"><input type="text" name="telp_perusahaan" value="@{{ entry_data_perizinan_data_awal_data.telp_perusahaan }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Fax</div>
                                <div class="content-form-input"><input type="text" name="fax_perusahaan" value="@{{ entry_data_perizinan_data_awal_data.fax_perusahaan }}" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Email</div>
                                <div class="content-form-input"><input type="text" name="email_perusahaan" value="@{{ entry_data_perizinan_data_awal_data.email_perusahaan }}" /></div>
                            </div>

                        </div>

                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Propinsi</div>
                                <div class="content-form-input">
                                    <!-- @{{ data_propinsi_test(entry_data_perizinan_data_awal_data.propinsi_perusahaan) }} -->
                                    <!-- @{{ entry_data_perizinan_data_awal_data.propinsi_perusahaan }} -->

                                    <select name="propinsi_perusahaan" >
                                        <option ng-repeat="oprop_perusahaan in opsi_prop_perusahaan"  ng-if="oprop_perusahaan.selected == true" selected value="@{{ oprop_perusahaan.id }}" >@{{ oprop_perusahaan.n_propinsi }}</option>
                                        <option ng-repeat="oprop_perusahaan in opsi_prop_perusahaan"  ng-if="oprop_perusahaan.selected == false" value="@{{ oprop_perusahaan.id }}" >@{{ oprop_perusahaan.n_propinsi }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kabupaten</div>
                                <div class="content-form-input">
                                    <!-- @{{ entry_data_perizinan_data_awal_data.kabupaten_perusahaan }} -->
                                    <select name="kabupaten_perusahaan" >
                                        <option ng-repeat="okab_perusahaan in opsi_kab_perusahaan"  ng-if="okab_perusahaan.selected == true" selected value="@{{ okab_perusahaan.id }}" >@{{ okab_perusahaan.n_kabupaten }}</option>
                                        <option ng-repeat="okab_perusahaan in opsi_kab_perusahaan"  ng-if="okab_perusahaan.selected == false" value="@{{ okab_perusahaan.id }}" >@{{ okab_perusahaan.n_kabupaten }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kecamatan</div>
                                <div class="content-form-input">
                                    <!-- @{{ entry_data_perizinan_data_awal_data.kecamatan_perusahaan }} -->
                                    <select name="kecamatan_perusahaan" >
                                        <option ng-repeat="okec_perusahaan in opsi_kec_perusahaan"  ng-if="okec_perusahaan.selected == true" selected value="@{{ okec_perusahaan.id }}" >@{{ okec_perusahaan.n_kecamatan }}</option>
                                        <option ng-repeat="okec_perusahaan in opsi_kec_perusahaan"  ng-if="okec_perusahaan.selected == false" value="@{{ okec_perusahaan.id }}" >@{{ okec_perusahaan.n_kecamatan }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kelurahan</div>
                                <div class="content-form-input">
                                    <!-- @{{ entry_data_perizinan_data_awal_data.kelurahan_perusahaan }} -->
                                    <select name="keluarahan_perusahaan" >
                                        <option ng-repeat="okel_perusahaan in opsi_kel_perusahaan"  ng-if="okel_perusahaan.selected == true" selected value="@{{ okel_perusahaan.id }}" >@{{ okel_perusahaan.n_kelurahan }}</option>
                                        <option ng-repeat="okel_perusahaan in opsi_kel_perusahaan"  ng-if="okel_perusahaan.selected == false" value="@{{ okel_perusahaan.id }}" >@{{ okel_perusahaan.n_kelurahan }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Alamat Perusahaan</div>
                                <div class="content-form-input">
                                    <textarea rows="4" name="alamat_perusahaan" >@{{ entry_data_perizinan_data_awal_data.alamat_perusahaan }}</textarea>
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

                                <tr ng-repeat="syarat in entry_data_perizinan_data_awal_data.syarat">
                                    <td class="c_modal_no" >@{{$index+1}}</td>
                                    <td class="c_modal_syarat" >@{{ syarat.persyaratan }}</td>
                                    <td class="c_modal_terpenuhi" >
                                        <input type="checkbox" name="@{{syarat.persyaratan}}" ng-model="syarat.terpenuhi">
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
                <input type="submit" value="Simpan" class="btn button-green" ng-click="modal_data_awal_submit()"/>
                <a class="btn button-red" ng-click="close_modal('modal_data_awal')">Batal</a>
                <a class="btn button-red" ng-click="modal('modal_data_awal')">Batal</a>
            </div>
        </div>

    </div>



<iframe id="target_edit" name="target_edit" style="width:100; height:100;  position:relative; background:#fff;">

</iframe>

</div>

</form>
