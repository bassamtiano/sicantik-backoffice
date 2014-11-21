<div class="modal" ng-show={{ $modal_name }}>

    <form method="post" target="target_edit" action="{{ URL::to('backoffice/penetapan/pembuatan_skrd/edit') }}">

        <input type="hidden" name="id_keringanan_retribusi" value="@{{ pembuatan_skrd_edit_data.id_keringananretribusi }}">

        <div class="modal-container large">

            <div class="modal-header update">
                <h2>Edit Keringanan Retribusi</h2><a class="button-close" href ng-click="close_modal('modal_edit')">x</a>
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
                                @{{ pembuatan_skrd_edit_data.pendaftaran_id }}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Jenis Layanan
                            </div>
                            <div class="summary-item-value">
                                @{{ pembuatan_skrd_edit_data.n_perizinan }}
                            </div>
                        </div>
                    </div>
                    <div class="body-summary-right">
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Jenis Permohonan
                            </div>
                            <div class="summary-item-value">
                                @{{ pembuatan_skrd_edit_data.n_permohonan }}
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-item-label">
                                Nama Pemohon
                            </div>
                            <div class="summary-item-value">
                                @{{ pembuatan_skrd_edit_data.n_pemohon }}
                            </div>
                        </div>
                    </div>

                </div>


                <div class="body-tab-wrapper">
                    <div class="tab-nav">
                        <ul class="tab-nav-wrapper">
                            <li class="tab-nav-item enable" id="tab_nav_keringanan_retribusi" ng-click="show_tab('tab.keringanan_retribusi', 'tab_nav_keringanan_retribusi')">Keringanan Retribusi</li>
                        <ul>
                    </div>
                    <div class="tab-content-wrapper">

                        <div class="tab-content" ng-show="tab.keringanan_retribusi">

                            <div class="tab-content-left">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Berdasarkan</div>
                                    <div class="content-form-input">
                                        <input type="text" name="e_berdasarkan" ng-model=" pembuatan_skrd_edit_data.e_berdasarkan "/>
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Isi Surat</div>
                                    <div class="content-form-input">
                                        <input type="text" name="e_surat" ng-model=" pembuatan_skrd_edit_data.e_surat " />
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Tanggal Entry</div>
                                    <div class="content-form-input">@{{ pembuatan_skrd_edit_data.d_entry }}</div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nomor Surat</div>
                                    <div class="content-form-input">
                                        <input type="text" name="i_nomor_surat" ng-model=" pembuatan_skrd_edit_data.i_nomor_surat " />
                                    </div>
                                </div>

                            </div>
                            <div class="tab-content-right">

                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama Pemohon</div>
                                    <div class="content-form-input">
                                        <input type="text" name="keringanan_n_pemohon" ng-model=" pembuatan_skrd_edit_data.keringanan_n_pemohon " />
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Presentasi</div>
                                    <div class="content-form-input">
                                        <input type="text" name="v_prosentase_retribusi" ng-model=" pembuatan_skrd_edit_data.v_prosentase_retribusi " />
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama Entry</div>
                                    <div class="content-form-input">
                                        <input type="text" name="i_entry" ng-model=" pembuatan_skrd_edit_data.i_entry " />
                                    </div>
                                </div>

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
                    <input type="submit" class="btn button-green" value="Simpan" ng-click="modal_edit_submit()"/>
                    <a type="submit" class="btn button-red" ng-click="close_modal('modal_edit')">Batal</a>
                </div>
            </div>

        </div>

    </form>

    <iframe id="target_edit" name="target_edit" style="width:100; height:100; display:none; position:relative; background:#fff;"></iframe>

</div>
