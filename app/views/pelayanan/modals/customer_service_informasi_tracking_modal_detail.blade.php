<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Informasi Tracking Izin</h2><a class="button-close" href ng-click="close_modal('modal_cs_detail_tracking')">x</a>
        </div>
        <div class="modal-body">
            <div class="body-summary">
                
                <div class="summary-title">
                    <h3>Informasi Permohonan</h3>
                </div>
                <div class="body-summary-left">
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Nomor Pendaftaran
                        </div>
                        <div class="summary-item-value">
                            @{{ informasi_tracking_detail_data.pendaftaran_id }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Nama Pemohon
                        </div>
                        <div class="summary-item-value">
                            @{{ informasi_tracking_detail_data.n_pemohon }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Durasi Pengerjaan
                        </div>
                        <div class="summary-item-value">
                            @{{ informasi_tracking_detail_data.v_hari }} Hari
                        </div>
                    </div>
                </div>
                <div class="body-summary-right">
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Jenis Izin
                        </div>
                        <div class="summary-item-value">
                            @{{ informasi_tracking_detail_data.n_perizinan }}
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-item-label">
                            Jenis Permohonan
                        </div>
                        <div class="summary-item-value">
                            @{{ informasi_tracking_detail_data.n_permohonan}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                        <li class="tab-nav-item enable" id="tab_nav_status_permohonan"editg-click="show_tab('tab.informasi_tracking_tab_detail_status_permohonan', 'tab_nav_tracking')">Status Permohonan</li>
                    <ul>
                </div>
                <div class="tab-content-wrapper">
                    <div class="tab-content" ng-show="tab.informasi_tracking_tab_detail_status_permohonan">
                        <div class="tab-content-table">

                            <style>
                                .c_modal_no {
                                    width:10%;
                                    text-align:center;
                                }
                                .c_modal_status_permohonan {
                                    width:30%;
                                }
                                .c_modal_durasi {
                                    width:25%;
                                    text-align:center;
                                }
                                .c_modal_waktu_awal{
                                    width:20%;
                                    text-align:center;
                                }
                                .c_modal_waktu_akhir{
                                    width:20%;
                                    text-align:center;
                                }
                            </style>

                            <table>
                                <tr class="table-legend">
                                    <th class="c_modal_no" >No</th>
                                    <th class="c_modal_status_permohonan" >Status Permohonan</th>
                                    <th class="c_modal_durasi">Durasi Pengerjaan</th>
                                    <th class="c_modal_waktu_awal" >Waktu Awal</th>
                                    <th class="c_modal_waktu_akhir" >Waktu Akhir</th>
                                </tr>

                                <tr ng-repeat="statuspermohonan in informasi_tracking_detail_data.statuspermohonan">
                               	    <td class="c_modal_no" >@{{$index+1}}</td>
                                    <td class="c_modal_status_permohonan" >@{{ statuspermohonan.n_sts_permohonan }}</td>
                                    <td class="c_modal_durasi"> @{{ statuspermohonan.span}}</td>
                                    <td class="c_modal_waktu_awal"> @{{ statuspermohonan.d_entry_awal }}</td>
                                    <td class="c_modal-waktu_akhir">@{{ statuspermohonan.d_entry }}</td>
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
                <button class="button-red" href ng-click="close_modal('modal_cs_detail_tracking')">Keluar</button>
            </div>
        </div>

    </div>
</div>
