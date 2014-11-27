<form method="post" target="target_delete" action="{{ URL::to('konfigurasi/report/report_generator/delete') }}">


<input type="hidden" name="id" value="@{{delete_id}}">


<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container small">
        <div class="modal-header delete">
            <h2>Hapus Jenis Perizinan</h2><a class="button-close" href ng-click="close_modal('modal_delete')">X</a>
        </div>
        <div class="modal-body">

            <ul ng-repat="edped in entry_data_perizinan_edit_data">
                Apakah Anda Yakin ingin menghapus data ini?
                <li> @{{ delete_id }} </li>
            </ul>


        </div>
        <div class="modal-footer">
            <div class="modal-footer-left">
                &nbsp;
            </div>
            <div class="modal-footer-right">
                <input type="submit" value="Hapus" class="btn button-red" ng-click="modal_delete_submit()"/>
                <a class="btn button-yellow" ng-click="close_modal('modal_delete')">Batal</a>
            </div>
        </div>

    </div>

    <iframe id="target_delete" name="target_delete" style="width:100; height:100; visibility:hidden; position:relative; background:#fff;">

    </iframe>

</div>

</form>
