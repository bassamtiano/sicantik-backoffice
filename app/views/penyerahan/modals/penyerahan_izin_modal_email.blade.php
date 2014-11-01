<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container small">

        <div class="modal-header update">
            <h2>Verifikasi Pengiriman Email</h2><a class="button-close" href ng-click="close_modal('modal_email')">x</a>
        </div>
        <div class="modal-body">

            <div class="body-tab-wrapper">
                Apakah Anda Ingin Melakukan verifikasi pada permohonan dengan nomor pendaftaran @{{ modal.penyerahan.pendaftaran_id }} dan nama @{{ modal.penyerahan.nama }}
            </div>

        </div>
        <div class="modal-footer">
            <div class="modal-footer-left">
                &nbsp;
            </div>
            <div class="modal-footer-right">
                <button type="submit" class="button-red" >Cetak</button>
                <button type="submit" class="button-yellow" >Batal</button>
            </div>
        </div>

    </div>
</div>
