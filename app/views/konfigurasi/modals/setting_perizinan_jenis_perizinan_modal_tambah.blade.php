<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Tambah Jenis Perizinan</h2><a class="button-close" href ng-click="close_modal('modal_tambah')">X</a>
        </div>
        <div class="modal-body">
            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                        <li class="tab-nav-item enable" id="tab_nav_data_jenis_perizinan" ng-click="show_tab('tab.tambah_data_jenis_perizinan', 'tab_nav_data_jenis_perizinan')">Data Jenis Perizinan</li>
                    <ul>
                </div>
                <div class="tab-content-wrapper">

                    <div class="tab-content" ng-show="tab.tambah_data_jenis_perizinan"> <!-- ng-show="tab.edit_jenis_perizinan" -->

                        <div class="tab-content-left">
                            <div class="tab-content-form">
                                <div class="content-form-label">Jenis Perizinan</div>
                                <div class="content-form-input"><input type="text" value="" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Durasi Lama Pengerjaan (Hari)</div>
                                <div class="content-form-input"><input type="text" value="" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Lama Berlaku Izin</div>
                                <div class="content-form-input"><input type="text" value="" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Satuan</div>
                                <div class="content-form-input"><input type="text" value="" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Target Anggaran</div>
                                <div class="content-form-input"><input type="text" value="" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kelompok Perizinan</div>
                                <div class="content-form-input">
                                    <!-- <input type="text" value="@{{ jenis_perizinan_edit_data.n_kelompok }}" /> -->
                                    <select class="form-option" ng-model="kelompok_id" ng-options="jpok.id as jpok.n_kelompok for jpok in jenis_perizinan_opsi_kelompok">
                                        <option value="">Kelompok Perizinan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Unit Kerja</div>
                                <div class="content-form-input">
                                    <!-- <input type="text" value="@{{ jenis_perizinan_edit_data.n_kelompok }}" /> -->
                                    <select class="form-option" ng-model="unitkerja_id" ng-options="jpou.id as jpou.n_unitkerja for jpou in jenis_perizinan_opsi_unitkerja">
                                        <option value="">Unit Kerja</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Jenis Izin Terbuka</div>
                                <div class="content-form-input"><input type="text" value="" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Tanda Tangan Pemohon</div>
                                <div class="content-form-input"><input type="text" value="" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Surat Keputusan</div>
                                <div class="content-form-input"><input type="text" value="" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Tampilkan Masa Berlaku</div>
                                <div class="content-form-input"><input type="text" value="" /></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            
        </div>

    </div>
</div>
