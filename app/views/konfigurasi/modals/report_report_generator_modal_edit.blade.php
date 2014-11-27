<form method="post" target="target_edit" action="{{ URL::to('konfigurasi/report/report_generator/edit') }}">
<!-- <form method="post" action="{{ URL::to('konfigurasi/report/report_generator/edit') }}"> -->


<input type="hidden" name="id" value="@{{report_generator_edit_data.id}}">

<div class="modal" ng-show={{ $modal_name }}>

    <div class="modal-container large">
        <div class="modal-header update">
            <h2>Edit Report Generator</h2><a class="button-close" href ng-click="close_modal('modal_edit')">x</a>
        </div>
        <div class="modal-body">
            <div class="body-tab-wrapper">
                <div class="tab-nav">
                    <ul class="tab-nav-wrapper">
                        <li class="tab-nav-item enable" id="tab_nav_report_generator" ng-click="show_edit_tab('tab.edit_tab_report_generator', 'tab_nav_report_generator')">Report Generator</li>
                        <li class="tab-nav-item" id="tab_nav_report_group_data" ng-click="show_edit_tab('tab.edit_tab_report_group_data', 'tab_nav_report_group_data')">Report Group Data</li>
                    <ul>
                </div>

                <div class="tab-content-wrapper">

                    <div class="tab-content" ng-show="tab.edit_tab_report_generator">

                        <div class="tab-content-left">
                            <div class="tab-content-form">
                                <div class="content-form-label">ID Laporan</div>
                                <div class="content-form-input">
                                    <input type="text" name="report_code" ng-model="report_generator_edit_data.report_code">
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Deskripsi Singkat</div>
                                <div class="content-form-input">
                                    <input type="text" name="short_desc" ng-model="report_generator_edit_data.short_desc">
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Deskripsi Lengkap</div>
                                <div class="content-form-input">
                                    <input type="text" name="long_desc" ng-model="report_generator_edit_data.long_desc">
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Rancangan Laporan</div>
                                <div class="content-form-input">
                                    <input type="text" name="layout" ng-model="report_generator_edit_data.layout">
                                </div>
                            </div>
                        </div>

                        <div class="tab-content-right">
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
                                <div class="content-form-label">Group Code</div>
                                <div class="content-form-input">
                                    <input type="text" ng-model="edit_add_group_code">
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Deskripsi Singkat</div>
                                <div class="content-form-input">
                                    <input type="text" ng-model="edit_add_deskripsi_singkat">
                                </div>
                            </div>
                        </div>

                        <div class="tab-content-right">
                            <div class="tab-content-form">
                                <div class="content-form-label">Type</div>
                                <div class="content-form-input">
                                    <select ng-model="edit_add_type">
                                        <option>Table Vertical</option>
                                        <option>Table Horizontal</option>
                                        <option>List</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab-content-form">
                                <div class="content-form-label">Query</div>
                                <div class="content-form-input">
                                    <textarea name="npwp"rows="4" ng-model="edit_add_query">
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content-button">
                            <a class="green" ng-click="edit_add_group_data(report_generator_edit_data.id)">Tambah</a>
                        </div>

                        <div class="tab-content-table">

                            <style>
                                .c_modal_no {
                                    width:5%;
                                    text-align:center;
                                }
                                .c_modal_group_code {
                                    width:20%;
                                }
                                .c_modal_short_desc {
                                    width:20%;
                                }
                                .c_modal_type {
                                    width:10%;
                                }
                                .c_modal_query {
                                    width:10%;
                                }
                                .c_modal_aksi {
                                    width:35%;
                                }
                            </style>

                            <table>
                                <tr class="table-legend">
                                    <th class="c_modal_no" >No</th>
                                    <th class="c_modal_group_code" >Group Code</th>
                                    <th class="c_modal_short_desc" >Short Desc</th>
                                    <th class="c_modal_type" >Type</th>
                                    <th class="c_modal_query" >Query</th>
                                    <th class="c_modal_aksi" >Aksi</th>
                                </tr>

                                <tr ng-repeat="rgd in report_generator_edit_data.report_group_data">
                                    <td class="c_modal_no" >@{{$index+1}}</td>
                                    <td class="c_group_code" >
                                        <input name="report_group_id[]" style="display:none" type="text" value="@{{ rgd.id }}" />
                                        <input name="report_group_code[]" type="text" value="@{{ rgd.report_group_code }}" />
                                    </td>
                                    <td class="c_modal_short_desc" >
                                        <input name="report_group_short_desc[]" type="text" value="@{{ rgd.short_desc }}" />
                                    </td>
                                    <td class="c_modal_type" >
                                        <select name="report_group_type[]">
                                            <option ng-if="rgd.type == 'T'" selected>Table Vertical</option>
                                            <option ng-if="rgd.type != 'T'">Table Vertical</option>
                                            <option ng-if="rgd.type == 'F'" selected>Table Horizontal</option>
                                            <option ng-if="rgd.type != 'F'">Table Horizontal</option>
                                            <option ng-if="rgd.type == 'P'" selected>List</option>
                                            <option ng-if="rgd.type != 'P'">List</option>
                                        </select>
                                    </td>
                                    <td class="c_modal_query" >
                                        <textarea name="report_group_query[]">@{{ rgd.group_query }}</textarea>
                                    </td>
                                    <td class="c_modal_aksi" >
                                        <span class="button-group group-1">
                                            <a href ng-click="delete_group_data(report_generator_edit_data.id, rgd.id)" class="delete">Delete</a>
                                        </span>
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
                <input type="submit" value="Simpan" class="btn button-green" ng-click="modal_edit_submit()"/>
                <a class="btn button-red" ng-click="close_modal('modal_edit')">Batal</a>
            </div>
        </div>

    </div>



<iframe id="target_edit" name="target_edit" style="width:100; height:100; visibility:hidden; position:relative; background:#fff;">

</iframe>

</div>

</form>
