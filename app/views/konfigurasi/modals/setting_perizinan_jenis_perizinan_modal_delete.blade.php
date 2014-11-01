<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container small">
        <div class="modal-header delete">
            <h3>Delete</h3><a href ng-click="close_modal('modal_delete')">Close</a>
        </div>
        <div class="modal-body">

            <ul ng-repat="edped in entry_data_perizinan_edit_data">
                <li> @{{ edped.id }} </li>
            </ul>

            
        </div>
        <div class="modal-footer">
            as
        </div>

    </div>
</div>
