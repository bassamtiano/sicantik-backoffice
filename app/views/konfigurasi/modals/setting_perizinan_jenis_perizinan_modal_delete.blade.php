<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container small">
        <div class="modal-header delete">
            <h2>Hapus Jenis Perizinan</h2><a class="button-close" href ng-click="close_modal('modal_delete')">X</a>
        </div>
        <div class="modal-body">

            <ul ng-repat="edped in entry_data_perizinan_edit_data">
                Apakah Anda Yakin ingin menghapus data ini?
                <li> @{{ edped.id }} </li>
            </ul>

            
        </div>
        <div class="modal-footer">
            
        </div>

    </div>
</div>
