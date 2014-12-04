<form id="form_setujui" method="post" target="target_setujui" action="{{ URL::to('pelayanan/pendaftaran/permohonan_izin_baru/setujui') }}">
    <div class="modal" ng-show={{ $modal_name }}>

        <div class="modal-container large">
            <div class="modal-header update">
                <h2>Verifikasi</h2><a class="button-close" href ng-click="close_modal('modal_setujui')">X</a>
            </div>
            <div class="modal-body">
                <div class="body-summary">
                    
                   <!--  <div class="summary-title">
                        <h3>Data Perizinan</h3>
                    </div>
                    <div class="body-summary-left"> -->
                        <div class="tab-content-form">
                            <div class="content-form-input"><input type="hidden" name="permohonan_id" value="@{{ permohonan_izin_baru_setujui_data.permohonan_id }}"/></div>
                        </div>
        
                        <!-- <div class="summary-item">
                            <div class="summary-item-label">
                                Nama Izin
                            </div>
                            <div class="summary-item-value">
                                @{{ permohonan_izin_baru_tambah_data.n_perizinan }}
                            </div>
                        </div> -->
            
                    <!-- </div> -->


                </div>

                <div class="body-tab-wrapper">
                    <center><h3>Apakah Anda yakin permohonan izin telah selesai?</h3></center>
                    <div class="tab-content-wrapper">

                        <div class="tab-content">

                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="modal-footer-left">
                    &nbsp;
                </div>
                <div class="modal-footer-right">
                    <!-- <button type="submit" class="button-red" >Simpan</button> -->
                    <input type="submit" value="Simpan" class="button-green" ng-click="modal_setujui_submit()"/>
                    <!-- <button type="submit" class="button-yellow" >Batal</button> -->
                    <button class="button-red" href ng-click="close_modal('modal_tambah_pemohon')">Keluar</button>

                </div>
            </div>

        </div>
       <!--  <iframe id="target_tambah" name="target_tambah" style="width:100; height:100; visibility:hidden; position:relative; background:#fff;">

        </iframe> -->
    </div>
</form>