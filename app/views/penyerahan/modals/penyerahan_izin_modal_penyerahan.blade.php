<div class="modal" ng-show={{ $modal_name }}>

<form method="post" action="{{ URL::to('penyerahan/pengajuan_salinan/setujui') }}">

    <div class="modal-container small">

        <div class="modal-header update">
            <h2>Verifikasi Penyerahan Izin</h2><a class="button-close" href ng-click="close_modal('modal_penyerahan')">x</a>
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
                <input type="submit" class="button-red" value="Cetak" />
                <a type="submit" class="button-yellow" ng-click="close_modal('modal_penyerahan')">Batal</a>
            </div>
        </div>

    </div>

</form>


</div>
