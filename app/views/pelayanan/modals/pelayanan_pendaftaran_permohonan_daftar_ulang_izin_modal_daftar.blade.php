<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Pilih Daftar Ulang Izin</h2><a class="button-close" href ng-click="close_modal('modal_pilih')">X</a>
        </div>
        <div class="modal-body">

            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                        <li class="tab-nav-item enable" id="tab_nav_data_pemohon" ng-click="show_tab('tab.data_awal_tab_data_pemohon', 'tab_nav_data_pemohon')">Data Pendaftar</li>
                    <ul>
                </div>
                <div class="tab-content-wrapper">

                    <div class="tab-content" ng-show="tab.data_awal_tab_data_pemohon">
                        <div class="tab-content-table">
                            <style>
                                .c_modal_no {
                                    width:10%;
                                    text-align:center;
                                }
                                .c_modal_no_surat {
                                    width:20%;
                                }
                                .c_modal_nama {
                                    width:20%;
                                }
                                .c_modal_n_izin {
                                    width:25%;
                                }
                                .c_modal_aksi {
                                    width:10%;
                                    text-align: center;
                                }
                            </style>

                            <table>
                                <tr class="table-legend">
                                    <th class="c_modal_no" >No</th>
                                    <th class="c_modal_no_surat" ng-click="predicate='no_surat'; reverse=!reverse" >Nomor Surat Lama</th>
                                    <th class="c_modal_nama" ng-click="predicate='n_pemohon'; reverse=!reverse">Nama Pemohon</th>
                                    <th class="c_modal_n_izin" ng-click="predicate='n_perizinan'; reverse=!reverse">Nama Izin</th>
                                    <th class="c_modal_aksi">Aksi</th>
                                </tr>

                                <tr ng-repeat="daftar in pelayanan_pendaftaran_permohonan_daftar_ulang_izin_daftar_data | orderBy:predicate:reverse | filter:search | limitTo:displayed">
                                    <td class="c_modal_no" >@{{$index+1}}</td>
                                    <td class="c_modal_no_surat" >@{{ daftar.no_surat }}</td>
                                    <td class="c_modal_nama" > @{{ daftar.n_pemohon }}</td>
                                    <td class="c_modal_n_izin" >@{{ daftar.n_perizinan }}</td>
                                    <td class="c_modal_aksi"><a href ng-click="open_modal_pilih(daftar.id)" class="row-item ya">Pilih</a></td>
                                </tr>
                                <tr>
                                    <td colspan="12" style="text-align:center">
                                        <button ng-click="loadMore()" class="btn-load-more">Load More</button>
                                    </td>
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
                <button class="button-red" href ng-click="close_modal('modal_pilih')">Keluar</button>
            </div>
        </div>

    </div>
</div>