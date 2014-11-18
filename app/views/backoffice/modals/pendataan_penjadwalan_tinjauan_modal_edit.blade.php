

<div class="modal" ng-show={{ $modal_name }}>

    <!-- <form method="post" target="target_edit" action="{{ URL::to('backoffice/pendataan/penjadwalan_tinjauan/edit') }}"> -->
    <form method="post" action="{{ URL::to('backoffice/pendataan/penjadwalan_tinjauan/edit') }}">
        <input type="hidden" name="id" value="@{{ peninjauan_tinjauan_edit_data.id }}">
        <div class="modal-container large">

            <div class="modal-header update">
                <h2>Edit Tinjauan Lapangan</h2><a class="button-close" href ng-click="close_modal('modal_edit')">x</a>
            </div>
            <div class="modal-body">
                <div class="body-tab-wrapper">
                    <div class="tab-nav">
                        <ul class="tab-nav-wrapper">
                            <li class="tab-nav-item enable" id="tab_nav_entry_tinjauan_lapangan" ng-click="show_tab('tab.entry_tinjauan_lapangan', 'tab_nav_entry_tinjauan_lapangan')">Entry Tinjauan Lapangan</li>
                        <ul>
                    </div>
                    <div class="tab-content-wrapper">

                        <div class="tab-content" ng-show="tab.entry_tinjauan_lapangan">

                            <div class="tab-content-left">
                                <div class="tab-content-form">
                                    <div class="content-form-label">ID Pendaftaran</div>
                                    <div class="content-form-input">
                                        @{{  peninjauan_tinjauan_edit_data.pendaftaran_id }}
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama</div>
                                    <div class="content-form-input">
                                        @{{ peninjauan_tinjauan_edit_data.n_pemohon }}
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Nama Perizinan</div>
                                    <div class="content-form-input">
                                            @{{ peninjauan_tinjauan_edit_data.n_perizinan }}
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Tanggal Terima Berkas</div>
                                    <div class="content-form-input">
                                        <input type="text" name="d_terima_berkas" data-provide="datepicker" class="tanggal_input" ng-model=" peninjauan_tinjauan_edit_data.d_terima_berkas " />
                                    </div>
                                </div>

                            </div>
                            <div class="tab-content-right">
                                <div class="tab-content-form">
                                    <div class="content-form-label">Tanggal Peninjauan</div>
                                    <div class="content-form-input">
                                        @{{ peninjauan_tinjauan_edit_data.d_survey }}
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">No Surat</div>
                                    <div class="content-form-input">
                                        @{{ peninjauan_tinjauan_edit_data.no_surat }}
                                    </div>
                                </div>
                                <div class="tab-content-form">
                                    <div class="content-form-label">Penandatangan Surat</div>
                                    <div class="content-form-input">
                                        <select name="nama_ttd" >
                                            <option ng-repeat="opttd in opsi_penandatangan"  ng-if="opttd.selected == true" selected ng-value="opttd.n_pegawai" >@{{ opttd.n_pegawai }}</option>
                                            <option ng-repeat="opttd in opsi_penandatangan"  ng-if="opttd.selected == false" ng-value="opttd.n_pegawai" >@{{ opttd.n_pegawai }}</option>
                                        </select>
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
                    <button type="submit" class="button-red" >Simpan</button>
                    <button type="submit" class="button-yellow" >Batal</button>
                </div>
            </div>

            <!-- Iframe for post -->


        </div>

    </form>

    <iframe id="target_post" name="target_edit" style="width:100; height:100; background:#fff;"></iframe>
</div>
