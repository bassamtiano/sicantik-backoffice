<form id="form_selesai" method="post" target="target_selesai" action="{{ URL::to('pelayanan/pendaftaran/daftar_ulang_izin/selesai') }}">
    <div class="modal" ng-show={{ $modal_name }}>
        <div class="modal-container large">
            <div class="modal-header update">
                <h2>Verifikasi</h2><a class="button-close" href ng-click="close_modal('modal_selesai')">X</a>
            </div>
            <div class="modal-body">
                <div class="body-summary">
                        <div class="tab-content-form">
                            <div class="content-form-input"><input type="hidden" name="permohonan_id" value="@{{ permohonan_izin_baru_setujui_data.permohonan_id }}"/></div>
                        </div>
                </div>

                <div class="body-tab-wrapper">
                    <center><h3>Apakah Anda yakin permohonan izin telah selesai?</h3></center>
                    <div class="tab-content-wrapper">

                        <input type="hidden" name="id_permohonan" value="@{{ daftar_ulang_izin_edit_data.permohonan_id }}">
                        Nama : @{{ daftar_ulang_izin_edit_data.n_pemohon }}<br />
                        ID Pendaftaran : @{{ daftar_ulang_izin_edit_data.pendaftaran_id }}

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="modal-footer-left">
                    &nbsp;
                </div>
                <div class="modal-footer-right">
                    <button type="submit" class="button-green" ng-click="modal_data_daftar_ulang_selesai_submit()">Simpan</button>
                    <a class="btn button-red" href ng-click="close_modal('modal_selesai')">Keluar</a>
                </div>
            </div>
        <iframe id="target_selesai" name="target_selesai" style="width:100; height:100; position:relative; visibility:hidden; background:#fff;"></iframe>
     </div>
    </div>
 </form>