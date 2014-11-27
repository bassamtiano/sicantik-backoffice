<form id="form_data_awal" method="post" target="target_edit" action="{{ URL::to('konfigurasi/report/report_component/edit') }}">
<!-- <form id="form_data_awal" method="post" action="{{ URL::to('konfigurasi/report/report_component/edit') }}"> -->


<input type="hidden" name="id" value="@{{report_component_edit_data.id}}">

<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Edit Report Component</h2><a class="button-close" href ng-click="close_modal('modal_edit')">x</a>
        </div>
        <div class="modal-body">
            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                        <li class="tab-nav-item enable" id="tab_nav_report_generator" ng-click="show_edit_tab('tab.edit_tab_report_generator', 'tab_nav_report_generator')">No Surat</li>
                        <li class="tab-nav-item" id="tab_nav_report_group_data" ng-click="show_edit_tab('tab.edit_tab_report_group_data', 'tab_nav_report_group_data')">Penandatangan</li>
                    <ul>
                </div>

                <div class="tab-content-wrapper">

                    <div class="tab-content" ng-show="tab.edit_tab_report_generator">

                        <div class="tab-content-left">
                            <div class="tab-content-form">
                                <div class="content-form-label">ID Report Component</div>
                                <div class="content-form-input"><input type="text" name="report_component_code" ng-model="report_component_edit_data.report_component_code" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Deskripsi Singkat</div>
                                <div class="content-form-input"><input type="text" name="short_desc" ng-model="report_component_edit_data.short_desc" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Format Nomor</div>
                                <div class="content-form-input"><input type="text" name="format_nomor" ng-model="report_component_edit_data.format_nomor" /></div>
                            </div>
                        </div>

                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Nomor Urut Terakhir</div>
                                <div class="content-form-input"><input type="text" name="last_num_seq" ng-model="report_component_edit_data.last_num_seq" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Perizinan</div>
                                <div class="content-form-input">
                                    <select name="trperizinan_id" >
                                        <option ng-repeat="tp in trperizinan"  ng-if="tp.selected == true" selected ng-value="tp.id" >@{{ tp.n_perizinan }}</option>
                                        <option ng-repeat="tp in trperizinan"  ng-if="tp.selected == false" ng-value="tp.id" >@{{ tp.n_perizinan }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Tipe Laporan</div>
                                <div class="content-form-input">
                                    <select name="report_type" >
                                        <option ng-repeat="rt in report_types"  ng-if="rt.selected == true" selected ng-value="rt.report_type_code" >@{{ rt.report_type_desc }}</option>
                                        <option ng-repeat="rt in report_types"  ng-if="rt.selected == false" ng-value="rt.report_type_code" >@{{ rt.report_type_desc }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-content" ng-show="tab.edit_tab_report_group_data">

                        <div class="tab-content-left">
                            <div class="tab-content-form">
                                <div class="content-form-label">Nama Penandatangan</div>
                                <div class="content-form-input"><input type="text" name="nama_penandatangan" ng-model="report_component_edit_data.nama_penandatangan"></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Jabatan</div>
                                <div class="content-form-input"><input type="text" name="jabatan" ng-model="report_component_edit_data.jabatan" /></div>
                            </div>

                        </div>

                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">NIP</div>
                                <div class="content-form-input"><input type="text" name="nip" ng-model="report_component_edit_data.nip" /></div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Kantor</div>
                                <div class="content-form-input"><input type="text" name="nama_kantor" ng-model="report_component_edit_data.nama_kantor" /></div>
                            </div>
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
                <input type="submit" value="Simpan" class="btn button-green" ng-click="modal_edit_submit()"/>
                <a class="btn button-red" ng-click="close_modal('modal_edit')">Batal</a>
            </div>
        </div>

    </div>



<iframe id="target_edit" name="target_edit" style="width:100; height:100; visibility:hidden; position:relative; background:#fff;">

</iframe>

</div>

</form>
