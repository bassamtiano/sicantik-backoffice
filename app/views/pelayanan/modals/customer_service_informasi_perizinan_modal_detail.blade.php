<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Informasi Persyaratan Izin</h2><a class="button-close" href ng-click="close_modal('modal_cs_detail_perizinan')">x</a>
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
                            @{{ informasi_perizinan_detail_data.n_perizinan }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Kelompok Izin
                        </div>
                        <div class="summary-item-value">
                            @{{ informasi_perizinan_detail_data.n_kelompok }}
                        </div>
                    </div>
                </div>
                <div class="body-summary-right">
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Durasi Pengerjaan
                        </div>
                        <div class="summary-item-value">
                            @{{ informasi_perizinan_detail_data.v_hari }} Hari
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Masa Berlaku
                        </div>
                        <div class="summary-item-value">
                            @{{ informasi_perizinan_detail_data.v_berlaku_tahun}} @{{ informasi_perizinan_detail_data.v_berlaku_satuan}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                        <li class="tab-nav-item enable" id="tab_nav_persyaratan"editg-click="show_tab('tab.informasi_perizinan_tab_detail_syarat', 'tab_nav_persyaratan')">Persyaratan</li>
                    <ul>
                </div>
                <div class="tab-content-wrapper">
                    <div class="tab-content" ng-show="tab.informasi_perizinan_tab_detail_syarat">
                        <div class="tab-content-table">

                            <style>
                                .c_modal_no {
                                    width:10%;
                                    text-align:center;
                                }
                                .c_modal_syarat {
                                    width:50%;
                                }
                                .c_modal_status {
                                    width:25%;
                                    text-align:center;
                                }
                                .c_modal_izin_baru{
                                    width:10%;
                                    text-align:center;
                                }
                                .c_modal_perpanjangan{
                                    width:10%;
                                    text-align:center;
                                }
                                .c_modal_perubahan{
                                     width:10%;
                                    text-align:center;                                  
                                }
                            </style>

                            <table>
                                <tr class="table-legend">
                                    <th class="c_modal_no" >No</th>
                                    <th class="c_modal_syarat" >Nama Syarat Izin</th>
                                    <th class="c_modal_status">Status</th>
                                    <th class="c_modal_izin_baru" >Izin Baru</th>
                                    <th class="c_modal_perpanjangan" >Perpanjangan</th>
                                    <th class="c_modal_perubahan" >Perubahan</th>
                                </tr>

                                <tr ng-repeat="persyaratan in informasi_perizinan_detail_data.persyaratan">
                                    <td class="c_modal_no" >@{{$index+1}}</td>
                                    <td class="c_modal_syarat" >@{{ persyaratan.v_syarat }}</td>
                                    <td class="c_modal_status" >
                                        <p ng-if="persyaratan.status == 1" class="row-item ya">
                                         Wajib
                                        </p>
                                        <p ng-if="persyaratan.status == 2" class="row-item tidak">
                                         Tidak Wajib
                                        </p> 
                                    </td>
                                    <td class="c_modal_izin_baru" >
                                        <p ng-if="persyaratan.izin_baru == 1" class="row-item ya">
                                         Ya
                                        </p>
                                        <p ng-if="persyaratan.izin_baru == 0" class="row-item tidak">
                                         Tidak
                                        </p>
                                    </td>
                                    <td class="c_modal_perpanjangan" >
                                        <p ng-if="persyaratan.perpanjangan == 1" class="row-item ya">
                                         Ya
                                        </p>
                                        <p ng-if="persyaratan.perpanjangan == 0" class="row-item tidak">
                                         Tidak
                                        </p>
                                    </td>
                                    <td class="c_modal_perubahan" >
                                        <p ng-if="persyaratan.perubahan == 1" class="row-item ya">
                                         Ya
                                        </p>
                                        <p ng-if="persyaratan.perubahan == 0" class="row-item tidak">
                                         Tidak
                                        </p>
                                    </td>
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
                <button class="button-red" href ng-click="close_modal('modal_cs_detail_perizinan')">Keluar</button>
            </div>
        </div>

    </div>
</div>
